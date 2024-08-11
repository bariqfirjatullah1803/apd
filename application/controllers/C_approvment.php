<?php

class C_approvment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_approvment');
	}

	public function index()
	{
		$data['idBagian']  = $_SESSION['idBagian'];
		$data['username']  = $_SESSION['namabagian'];
		$data['pageTitle'] = "Persetujuan";
		$data['items']     = $this->M_approvment->getAll();

		$this->load->view('_layouts/header', $data);
		$this->load->view('V_approvment', $data);
		$this->load->view('_layouts/footer');
	}

	public function show($id)
	{
		$data['idBagian']  = $_SESSION['idBagian'];
		$data['username']  = $_SESSION['namabagian'];
		$data['pageTitle'] = "Detail Persetujuan";
		$data['item']      = $this->M_approvment->getById($id);
		$data['images']    = $this->M_approvment->getAllImageById($id);

		$this->load->view('_layouts/header', $data);
		$this->load->view('V_approvment_detail', $data);
		$this->load->view('_layouts/footer');
	}

	public function update($id, $status)
	{
		if ($status == 'Spprove' || $status == 'Reject' || $status == 'Revisi' || $status == 'Selesai') {
			$this->M_approvment->update($id, $status);
		}
		redirect('C_approvment/show/' . $id);
	}

	public function update_keterangan($id, $ket)
	{
		$this->M_approvment->update($id, "Revisi");
		$this->M_approvment->update_keterangan($id, $ket);
		redirect('C_approvment/show/' . $id);
	}
}
