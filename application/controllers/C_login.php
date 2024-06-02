<?php

class C_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('V_login');
	}

	public function createSession()
	{
		$data['sessionData'] = $this->M_login->setSession();

		$idsession  = $data['sessionData']['idBagian'];
		$namabagian = $data['sessionData']['namaBagian'];
		$kodebagian = $data['sessionData']['kodeBagian'];
		$kodeKwt    = $data['sessionData']['kodeKwt'];
		$role       = $data['sessionData']['role'];


		$sessionData = [
			//'idBagian'  => $this->input->post('idbag'),
			'idBagian'   => $idsession,
			'namabagian' => $namabagian,
			'kodebagian' => $kodebagian,
			'kodekwt'    => $kodeKwt,
			'debugmode'  => 0,
			'role'       => $role,
		];

		$this->session->set_userdata($sessionData);

		redirect('C_dashboard');
	}

	public function logout()
	{
		$this->M_login->removeSession();
		redirect('C_login');
	}
}
