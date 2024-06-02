<?php

class C_perjadin_dd extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_tujuan');
		$this->load->model('M_perjadin_dd');
		$this->load->model('M_pegawai');
		$this->load->model('M_kode_program');
	}

	// {PERJADIN DD INPUT}
	// {perjadin_input_index, tambahData}
	public function perjadin_input_index()
	{
		$data['pageTitle'] = "Perjalanan Dinas Dalam Daerah";

		if (isset($_SESSION['idBagian'])) {
			//Get Session Data
			$data['idBagian']   = $_SESSION['idBagian'];
			$data['username']   = $_SESSION['namabagian'];
			$data['kodebagian'] = $_SESSION['kodebagian'];
			$data['kodekwt']    = $_SESSION['kodekwt'];

			$data['kodekegiatan']  = $this->M_kode_program->getKodeKegiatan($_SESSION['idBagian']);
			$data['tujuan_dd']     = $this->M_tujuan->getTujuanDD();
			$data['pegawaiData']   = $this->M_pegawai->getPegawaiData($_SESSION['idBagian']);
			$data['penandatangan'] = $this->M_pegawai->getPenandaTangan($_SESSION['idBagian']);

			$this->load->view('_layouts/header', $data);
			$this->load->view('V_perjadin_dd_input', $data);
			$this->load->view('_layouts/footer');
		} else {
			redirect('C_login');
		}
	}

	public function tambahData()
	{
		$data['hasil'] = $this->M_perjadin_dd->insertDataAndGenerate($_SESSION['idBagian']);
		$this->session->set_flashdata('notifikasiTambah', ' Data berhasil ditambahkan');
		redirect('C_perjadin_dd/perjadin_recap_index');
	}
	//

	// {PERJADIN DD RECAP}
	// {perjadin_recap_index, hapus, download document}

	public function perjadin_recap_index()
	{
		$data['pageTitle'] = "Recap";

		if (isset($_SESSION['idBagian'])) {
			//Get Session Data
			$data['idBagian'] = $_SESSION['idBagian'];
			$data['username'] = $_SESSION['namabagian'];

			$data['dataRecap'] = ($_SESSION['role'] == 'admin') ? $data['dataRecapAll'] = $this->M_perjadin_dd->getAllRecap() : $data['dataRecap'] = $this->M_perjadin_dd->getRecapFromOneSection($_SESSION['idBagian']);

			$this->load->view('_layouts/header', $data);
			$this->load->view('V_perjadin_dd_recap', $data);
			$this->load->view('_layouts/footer');
		} else {
			redirect('C_login');
		}
	}

	public function hapus($idSubmit)
	{
		$this->M_perjadin_dd->hapusDataRecap($idSubmit);
		$this->session->set_flashdata('notifikasiHapus', 'Data berhasil dihapus');
		redirect('C_perjadin_dd/perjadin_recap_index');
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
	//

	// {PERJADIN DD DOWNLOAD}
	public function perjadin_download_index()
	{
		$data['pageTitle'] = "Download Rekapitulasi Perjalanan Dinas Dalam Daerah";

		if (isset($_SESSION['idBagian'])) {
			//Get Session Data
			$data['idBagian'] = $_SESSION['idBagian'];
			$data['username'] = $_SESSION['namabagian'];

			$data['kodekegiatan'] = $this->M_kode_program->getKodeKegiatan($_SESSION['idBagian']);

			$this->load->view('_layouts/header', $data);
			$this->load->view('V_perjadin_dd_download', $data);
			$this->load->view('_layouts/footer');
		} else {
			redirect('C_login');
		}
	}
	//
}
