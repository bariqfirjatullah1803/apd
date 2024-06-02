<?php

class C_dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
	}

	public function index()
	{
		$data['pageTitle'] = "Dashboard";

		if (isset($_SESSION['idBagian'])) {
			//Get Session Data
			$data['idBagian'] = $_SESSION['idBagian'];
			$data['username'] = $_SESSION['namabagian'];

			$data['jumlahPerdin']   = $this->M_dashboard->countTotalPerSection($_SESSION['idBagian']);
			$data['totalRealisasi'] = $this->M_dashboard->countTotalPerSection($_SESSION['idBagian']);

			// $data['jumlahPerdinTitipan'] = $this->M_dashboard->countPerdinTitipan($_SESSION['idBagian']);
			// $data['totalRealisasiTitipan'] = $this->M_dashboard->countSumOfMoneyTitipan($_SESSION['idBagian']);

			$data['countAll'] = $this->M_dashboard->countAllPerSection($_SESSION['idBagian']);

			$data['jumlahPerdinAll']   = $this->M_dashboard->showAllAmountOfPerdin();
			$data['totalRealisasiAll'] = $this->M_dashboard->showAllSumOfMoney();

			$data['dataGrafikPerdin']    = $this->M_dashboard->countAllPerSectionGlobal();
			$data['dataGrafikRealisasi'] = $this->M_dashboard->dataGrafikRealisasiPerdin();

			$data['recapGlobal'] = $this->M_dashboard->getRecapGlobal();

			$this->load->view('_layouts/header', $data);
			$this->load->view('V_dashboard', $data);
			$this->load->view('_layouts/footer');
		} else {
			redirect('C_login');
		}
	}
}
