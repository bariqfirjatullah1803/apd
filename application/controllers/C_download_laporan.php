<?php

class C_download_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tujuan');
        $this->load->model('M_perjadin_dd');
        $this->load->model('M_pegawai');
        $this->load->model('M_kode_program');
        $this->load->model('M_download_laporan');
    }

    public function index(){
        $data['pageTitle'] = "Download Laporan";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];
            $data['kodebagian'] = $_SESSION['kodebagian'];
            $data['kodekwt'] = $_SESSION['kodekwt'];

            $data['kodekegiatan'] = $this->M_kode_program->getKodeKegiatan($_SESSION['idBagian']);

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_download_laporan', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

    public function sendData($param){
        /**
         * TODO
         * 1. decode the data using base64_decode()
         * 2. use php explode() to split it
         * 3. clear the previous session
         * 4. set new session
         * 5. redirect to another function that display the requested data
         */

        //  {1. decode the data using base64_decode()}
        $decodedParam = base64_decode(rawurldecode($param));

        // {2. use php explode() to split it}
        $explodedParam = explode("|", $decodedParam);

        // {3. Clear the previous session}
        unset(
            $_SESSION['paramKategoriPerjadin'],
            $_SESSION['paramDownload'],
            $_SESSION['paramKodeKegiatan'],
            $_SESSION['paramKodeSubKegiatan'],
            $_SESSION['paramBulan'],
            $_SESSION['paramBulanEn']
        );

        // {4. set new session param}
        $setParamAsSession = array(
            'paramKategoriPerjadin' => $explodedParam[0],
            'paramDownload' => $explodedParam[1],
            'paramKodeKegiatan' => $explodedParam[2],
            'paramKodeSubKegiatan' => $explodedParam[3],
            'paramBulan' => $explodedParam[4],
            'paramBulanEn' => $explodedParam[5]
        );

        // Set the session again
        $this->session->set_userdata($setParamAsSession);  

        // {5. redirect to another function that display the requested data}
        redirect('C_download_laporan/showData');
    }

    public function showData(){
        $data['pageTitle'] = "Download Laporan";

        if (isset($_SESSION['idBagian'])) {

            $data['result'] = $this->M_download_laporan->getRequestedData();

            $this->load->view('_layouts/header', $data);
            $this->load->view('V_download_laporan_display', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

}