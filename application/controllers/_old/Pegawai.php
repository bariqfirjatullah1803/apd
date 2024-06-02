<?php

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
    }
    public function index()
    {
        $data['pageTitle'] = "Pegawai";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['pegawai'] = $this->Pegawai_model->getDataPegawaiFromOneSubSection($_SESSION['idBagian']);
            $data['pegawaiAll'] = $this->Pegawai_model->getAllDataPegawai();

            $this->load->view('layouts/header', $data);
            $this->load->view('pegawai', $data);
            $this->load->view('layouts/footer');
        } else {
            redirect('login');
        }
    }
}
