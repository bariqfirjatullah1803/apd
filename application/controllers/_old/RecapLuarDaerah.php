<?php


class RecapLuarDaerah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RecapLuarDaerah_model');
    }
    public function index()
    {
        $data['pageTitle'] = "Rekapitulasi Luar Daerah";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['dataRecap'] = $this->RecapLuarDaerah_model->getRecapFromOneSubSection($_SESSION['idBagian']);
            $data['dataRecapBPK'] = $this->RecapLuarDaerah_model->getRecapForBPK($_SESSION['idBagian']);

            $data['dataRecapAll'] = $this->RecapLuarDaerah_model->getAllRecap();

            $this->load->view('layouts/header', $data);
            $this->load->view('recapLuarDaerah', $data);
            $this->load->view('layouts/footer');
        } else {
            redirect('login');
        }
    }

    public function hapus($idSubmit)
    {
        $this->RecapLuarDaerah_model->hapusDataRecap($idSubmit);
        $this->session->set_flashdata('notifikasiHapus', 'Data berhasil dihapus');
        redirect('recap');
    }

    public function dst($stamp)
    {
        $this->RecapLuarDaerah_model->downloadSuratTugas($stamp);
    }

    public function dsppd($stamp)
    {
        $this->RecapLuarDaerah_model->downloadSPPD($stamp);
    }

    public function dsppdlembar2($stamp)
    {
        $this->RecapLuarDaerah_model->downloadSPPDLembar2($stamp);
    }

    public function dkwt($stamp)
    {
        $this->RecapLuarDaerah_model->downloadKwitansi($stamp);
    }

    public function dtt($stamp)
    {
        $this->RecapLuarDaerah_model->downloadTandaTerima($stamp);
    }
}
