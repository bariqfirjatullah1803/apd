<?php

class C_patch_notes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['pageTitle'] = "Patch Notes";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_patch_notes', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }
}