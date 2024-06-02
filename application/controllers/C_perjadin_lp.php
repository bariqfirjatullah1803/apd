<?php

class C_perjadin_lp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tujuan');
        $this->load->model('M_perjadin_lp');
        $this->load->model('M_pegawai');
        $this->load->model('M_kode_program');
    }

    // {PERJADIN lp INPUT}
    // {perjadin_input_index, tambahData}
        public function perjadin_input_index()
        {
            $data['pageTitle'] = "Perjalanan Dinas Luar Provinsi";

            if (isset($_SESSION['idBagian'])) {
                //Get Session Data
                $data['idBagian'] = $_SESSION['idBagian'];
                $data['username'] = $_SESSION['namabagian'];
                $data['kodebagian'] = $_SESSION['kodebagian'];
                $data['kodekwt'] = $_SESSION['kodekwt'];

                $data['kodekegiatan'] = $this->M_kode_program->getKodeKegiatan($_SESSION['idBagian']);
                $data['tujuan_lp'] = $this->M_tujuan->getTujuanLP();
                $data['pegawaiData'] = $this->M_pegawai->getPegawaiData($_SESSION['idBagian']);
                $data['penandatangan'] = $this->M_pegawai->getPenandaTangan($_SESSION['idBagian']);

                $this->load->view('_layouts/header', $data);
                $this->load->view('V_perjadin_lp_input', $data);
                $this->load->view('_layouts/footer');
            } else {
                redirect('C_login');
            }
        }

        public function tambahData()
        {
            $data['hasil'] = $this->M_perjadin_lp->insertDataAndGenerate($_SESSION['idBagian']);
            $this->session->set_flashdata('notifikasiTambah', ' Data berhasil ditambahkan');
            redirect('C_perjadin_lp/perjadin_recap_index');
        }

        public function rincian($stamp)
        {
            $this->M_perjadin_ld->downloadRincian($stamp);
        }
    // 

    // {PERJADIN lp RECAP}
    // {perjadin_recap_index, hapus, download document}

        public function perjadin_recap_index()
        {
            $data['pageTitle'] = "Recap";

            if (isset($_SESSION['idBagian'])) {
                //Get Session Data
                $data['idBagian'] = $_SESSION['idBagian'];
                $data['username'] = $_SESSION['namabagian'];

                $data['dataRecap'] = $this->M_perjadin_lp->getRecapFromOneSection($_SESSION['idBagian']);

                // $data['dataRecapAll'] = $this->M_perjadin_lp->getAllRecap();

                $this->load->view('_layouts/header', $data);
                $this->load->view('V_perjadin_lp_recap', $data);
                $this->load->view('_layouts/footer');
            } else {
                redirect('C_login');
            }
        }

        public function hapus($idSubmit)
        {
            $this->M_perjadin_dd->hapusDataRecap($idSubmit);
            $this->session->set_flashdata('notifikasiHapus', 'Data berhasil dihapus');
            redirect('C_perjadin_lp/perjadin_recap_index');
        }

        public function dst($stamp)
        {
            $this->M_perjadin_dd->downloadSuratTugas($stamp);
        }

        public function dsppd($stamp)
        {
            $this->M_perjadin_dd->downloadSPPD($stamp);
        }

        public function dsppdlembar2($stamp)
        {
            $this->M_perjadin_dd->downloadSPPDLembar2($stamp);
        }

        public function dkwt($stamp)
        {
            $this->M_perjadin_dd->downloadKwitansi($stamp);
        }

        public function dtt($stamp)
        {
            $this->M_perjadin_dd->downloadTandaTerima($stamp);
        }
    // 
}
