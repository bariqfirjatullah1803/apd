<?php

class C_sandbox extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sandbox');
    }

    public function index()
    {
        $data['pageTitle'] = "Sandbox";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['kodekegiatan'] = $this->M_sandbox->getKodeKegiatan($_SESSION['idBagian']);

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_sandbox', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

    function getSubKegiatan()
    {
        if ($this->input->post('idKegiatan')) {
            echo $this->M_sandbox->getSubKegiatan($this->input->post('idKegiatan'));
        }
    }

}