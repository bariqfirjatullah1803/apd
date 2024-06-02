<?php

class pddd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tujuan_model');
        $this->load->model('PDDD_model');
    }

    public function index()
    {
        $data['pageTitle'] = "Perjalanan Dinas Dalam Daerah";
        $data['tujuan'] = $this->Tujuan_model->getAllTujuan();

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            //get data pegawai for dropdown
            $data['pegawai'] = $this->PDDD_model->getPegawai($_SESSION['idBagian']);

            //get data kabag for all documents
            $data['kabag'] = $this->PDDD_model->getKabag($_SESSION['idBagian']);

            $this->load->view('layouts/header', $data);
            $this->load->view('pddd', $data);
            $this->load->view('layouts/footer');
        } else {
            redirect('login');
        }
    }
    public function tambahData()
    {
        $data['hasil'] = $this->PDDD_model->tambahData($_SESSION['idBagian']);
        $this->session->set_flashdata('notifikasiTambah', ' Data berhasil ditambahkan');
        redirect('recap');
    }
}
