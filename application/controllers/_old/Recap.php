<?php


class Recap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Recap_model');
    }
    public function index()
    {
        $data['pageTitle'] = "Recap";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['dataRecap'] = $this->Recap_model->getRecapFromOneSubSection($_SESSION['idBagian']);

            $data['dataRecapAll'] = $this->Recap_model->getAllRecap();

            $this->load->view('layouts/header', $data);
            $this->load->view('recap', $data);
            $this->load->view('layouts/footer');
        } else {
            redirect('login');
        }
    }

    public function hapus($idSubmit)
    {
        $this->Recap_model->hapusDataRecap($idSubmit);
        $this->session->set_flashdata('notifikasiHapus', 'Data berhasil dihapus');
        redirect('recap');
    }

    public function dst($stamp)
    {
        $this->Recap_model->downloadSuratTugas($stamp);
    }

    public function dsppd($stamp)
    {
        $this->Recap_model->downloadSPPD($stamp);
    }

    public function dsppdlembar2($stamp)
    {
        $this->Recap_model->downloadSPPDLembar2($stamp);
    }

    public function dkwt($stamp)
    {
        $this->Recap_model->downloadKwitansi($stamp);
    }

    public function dtt($stamp)
    {
        $this->Recap_model->downloadTandaTerima($stamp);
    }
}
