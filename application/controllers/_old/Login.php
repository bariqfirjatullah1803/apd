<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }
    public function index()
    {
        $this->load->view('login');
    }

    public function createSession()
    {
        $data['sessionData'] = $this->Login_model->setSession();

        foreach ($data['sessionData'] as $querydatabase) {
            $idsession = $querydatabase['idBagian'];
            $namabagian = $querydatabase['namaBagian'];
            $kodebagian = $querydatabase['kodeBagian'];
        }

        $sessionData = array(
            //'idBagian'  => $this->input->post('idbag'),
            'idBagian' => $idsession,
            'namabagian' => $namabagian,
            'kodebagian' => $kodebagian
        );

        $this->session->set_userdata($sessionData);

        redirect('dashboard');
    }

    public function logout()
    {
        $this->Login_model->removeSession();
        redirect('login');
    }
}
