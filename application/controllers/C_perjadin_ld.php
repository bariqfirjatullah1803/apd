<?php

class C_perjadin_ld extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_tujuan');
		$this->load->model('M_perjadin_ld');
		$this->load->model('M_pegawai');
		$this->load->model('M_approvment');
		$this->load->model('M_kode_program');
	}

	// {PERJADIN LD INPUT}
	// {perjadin_input_index, tambahData}
	public function perjadin_input_index()
	{
		$data['pageTitle'] = "Perjalanan Dinas Luar Daerah";

		if (isset($_SESSION['idBagian'])) {
			//Get Session Data
			$data['idBagian']   = $_SESSION['idBagian'];
			$data['username']   = $_SESSION['namabagian'];
			$data['kodebagian'] = $_SESSION['kodebagian'];
			$data['kodekwt']    = $_SESSION['kodekwt'];

			$data['kodekegiatan']  = $this->M_kode_program->getKodeKegiatan($_SESSION['idBagian']);
			$data['tujuan_ld']     = $this->M_tujuan->getTujuanLD();
			$data['pegawaiData']   = $this->M_pegawai->getPegawaiData($_SESSION['idBagian']);
			$data['penandatangan'] = $this->M_pegawai->getPenandaTangan($_SESSION['idBagian']);

			$this->load->view('_layouts/header', $data);
			$this->load->view('V_perjadin_ld_input', $data);
			$this->load->view('_layouts/footer');
		} else {
			redirect('C_login');
		}
	}

	public function tambahData()
	{
		$data['hasil'] = $this->M_perjadin_ld->insertDataAndGenerate($_SESSION['idBagian']);
		$this->session->set_flashdata('notifikasiTambah', ' Data berhasil ditambahkan');
		redirect('C_perjadin_ld/perjadin_recap_index');
	}
	//

	// {PERJADIN LD RECAP}
	// {perjadin_recap_index, hapus, download document}

	public function perjadin_recap_index()
	{
		$data['pageTitle'] = "Perjalanan Dinas Luar Daerah";

		if (isset($_SESSION['idBagian'])) {
			$data['idBagian'] = $_SESSION['idBagian'];
			$data['username'] = $_SESSION['namabagian'];
			$data['items']    = $this->M_approvment->getByCategory('ld');

			$this->load->view('_layouts/header', $data);
			$this->load->view('V_perjadin_ld_recap', $data);
			$this->load->view('_layouts/footer');
		} else {
			redirect('C_login');
		}
	}

	public function show($id)
	{
		if (isset($_SESSION['idBagian'])) {
			$data['idBagian']  = $_SESSION['idBagian'];
			$data['username']  = $_SESSION['namabagian'];
			$data['pageTitle'] = "Detail Surat Perjalanan Dinas Luar Daerah";
			$data['item']      = $this->M_approvment->getById($id);
			$data['images']    = $this->M_approvment->getAllImageById($id);

			$this->load->view('_layouts/header', $data);
			$this->load->view('V_perjadin_ld_detail', $data);
			$this->load->view('_layouts/footer');
		} else {
			redirect('C_login');
		}
	}

	public function do_upload($id)
	{
		$config['upload_path']   = './uploads/bukti-lapangan';
		$config['allowed_types'] = 'pdf';
		$config['encrypt_name']  = false;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			$data = [
				'image'    => $this->upload->data()['file_name'],
				'idSubmit' => $id,
			];

			$this->M_approvment->upload($data);
		}
		redirect('C_perjadin_ld/show/' . $id);
	}

	public function hapus($idSubmit)
	{
		$this->M_perjadin_ld->hapusDataRecap($idSubmit);
		$this->session->set_flashdata('notifikasiHapus', 'Data berhasil dihapus');
		redirect('C_perjadin_ld/perjadin_recap_index');
	}

	public function dst($stamp)
	{
		$this->M_perjadin_dd->downloadSuratTugas($stamp);
	}

	public function dsppd($stamp)
	{
		$this->M_perjadin_dd->downloadSPPD($stamp);
	}

	public function dsppdlembar2($stamp)
	{
		$this->M_perjadin_dd->downloadSPPDLembar2($stamp);
	}

	public function dkwt($stamp)
	{
		$this->M_perjadin_dd->downloadKwitansi($stamp);
	}

	public function dtt($stamp)
	{
		$this->M_perjadin_dd->downloadTandaTerima($stamp);
	}

	public function rincian($stamp)
	{
		$this->M_perjadin_ld->downloadRincian($stamp);
	}
	//
}
