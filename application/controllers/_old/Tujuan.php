<?php


class Tujuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tujuan_model');
    }
    public function index()
    {
        $data['pageTitle'] = "Tujuan";

        $data['tujuan'] = $this->Tujuan_model->getAllTujuan();
        $data['tujuanlddp'] = $this->Tujuan_model->getTujuanLuarDaerahDalamProvinsi();

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $this->load->view('layouts/header', $data);
            $this->load->view('tujuan', $data);
            $this->load->view('layouts/footer');
        } else {
            redirect('login');
        }
    }
}
