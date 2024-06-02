<?php

class C_pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai');
    }
    public function index()
    {
        $data['pageTitle'] = "Pegawai";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['pegawai'] = $this->M_pegawai->getPegawaiData($_SESSION['idBagian']);
            $data['pegawaiAll'] = $this->M_pegawai->getAllPegawaiData();

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_pegawai_display', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

    
        public function crudPegawai(){
            $data['pageTitle'] = "Ubah Data Pegawai";

            if (isset($_SESSION['idBagian'])) {
                //Get Session Data
                $data['idBagian'] = $_SESSION['idBagian'];
                $data['username'] = $_SESSION['namabagian'];

                $data['pegawai'] = $this->M_pegawai->getPegawaiData($_SESSION['idBagian']);
                $data['pegawaiAll'] = $this->M_pegawai->getAllPegawaiData();

                $this->load->view('_layouts/header', $data);
                $this->load->view('V_pegawai_crud', $data);
                $this->load->view('_layouts/footer');
            } else {
                redirect('C_login');
            }
        }
    // {Update Pegawai}
        public function updatePegawaiData()
        {
            $data['hasil'] = $this->M_pegawai->updatePegawaiData($_SESSION['idBagian']);
            $this->session->set_flashdata('notifikasiUbah', ' Data berhasil diubah');
            redirect('C_pegawai');
        }
    // 

    // {Insert Pegawai}
        public function insertPegawaiData(){
            $data['hasil'] = $this->M_pegawai->insertPegawaiData($_SESSION['idBagian']);
            $this->session->set_flashdata('notifikasiTambah', ' Data berhasil ditambahkan');
            redirect('C_pegawai');
        }
    // 

    // {Soft delete pegawai}
        public function hapusPegawaiData(){
            $data['hasil'] = $this->M_pegawai->hapusPegawaiData();
            $this->session->set_flashdata('notifikasiHapus', ' Data berhasil dihapus');
            redirect('C_pegawai');
        }
    // 
}
