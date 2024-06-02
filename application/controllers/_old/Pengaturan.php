<?php

class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaturan_model');
    }
    public function index()
    {
        $data['pageTitle'] = "Pengaturan";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['pegawai'] = $this->Pengaturan_model->getPegawai($_SESSION['idBagian']);

            $this->load->view('layouts/header', $data);
            $this->load->view('pengaturan', $data);
            $this->load->view('layouts/footer');
        } else {
            redirect('login');
        }
    }

    public function updateData(){
        $data['update'] = $this->Pengaturan_model->updateDataPegawai();
        $this->session->set_flashdata('notifikasiUbah', ' Data berhasil diubah');
        redirect('pegawai');

    }
}
    