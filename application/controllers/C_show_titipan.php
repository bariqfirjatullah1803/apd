<?php

class C_show_titipan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_show_titipan');
    }

    public function index()
    {
        $data['pageTitle'] = "Rincian";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['rincian'] = $this->M_show_titipan->showCountTitipan($_SESSION['idBagian']);

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_show_titipan', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }
}