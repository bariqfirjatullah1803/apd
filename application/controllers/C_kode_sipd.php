<?php

class C_kode_sipd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kode_sipd');
    }
    public function index()
    {
        $data['pageTitle'] = "Data Kode SIPD";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['kodesipd'] = $this->M_kode_sipd->getKodeSIPD($_SESSION['idBagian']);

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_sipd_display', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

    public function sipdUmum()
    {
        $data['pageTitle'] = "Data Kode SIPD";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['kodesipd'] = $this->M_kode_sipd->getSIPDUmum();

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_sipd_display', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }
}
