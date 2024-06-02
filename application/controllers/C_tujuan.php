<?php

class C_tujuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tujuan');
    }
    public function index()
    {
        $data['pageTitle'] = "Data Uang Transport";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['tujuan'] = $this->M_tujuan->getTujuanAndNominalTransport();

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_tujuan_display', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

    public function displayDalamDaerah(){
        $data['pageTitle'] = "Data Uang Transport";
        $data['pageHeader'] = "Perjalanan Dinas Dalam Daerah";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['tujuan'] = $this->M_tujuan->getTujuanDD();

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_tujuan_display', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

    public function displayLuarDaerah(){
        $data['pageTitle'] = "Data Uang Transport";
        $data['pageHeader'] = "Perjalanan Dinas Luar Daerah";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['tujuan'] = $this->M_tujuan->getTujuanLD();

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_tujuan_display', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

    public function displayLuarProvinsi(){
        $data['pageTitle'] = "Data Uang Transport";
        $data['pageHeader'] = "Perjalanan Dinas Luar Provinsi";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['tujuan'] = $this->M_tujuan->getTujuanLP();

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_tujuan_display', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }
}
