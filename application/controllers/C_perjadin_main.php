<?php

class C_perjadin_main extends CI_Controller
{
    /**
     * NOTE NEED PROPER DOCS
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('M_tujuan');
        $this->load->model('M_perjadin_dd');
        $this->load->model('M_pegawai');
        $this->load->model('M_kode_program');

        $this->load->model('M_perjadin_main');
    }

    /**
     * public function loadPrerequisite
     * 
     * what this does :
     *  this function grab all required data  from multiple models for perjadin to works properly.
     * 
     * param :
     *  @typeOfPerjadin
     *      this param determine what data to be loaded
     * 
     * return :
     *  data idBagian
     *  data username
     *  data kodebagian
     *  data kodekwt
     *  data kodekegiatan
     *  data pegawaiData
     *  data penandatangan
     *  data tujuan
     *  load PerjadinInputViews();
     */

    public function loadPrerequisite($typeOfPerjadin){
        $data['idBagian'] = $_SESSION['idBagian'];
        $data['username'] = $_SESSION['namabagian'];
        $data['kodebagian'] = $_SESSION['kodebagian'];
        $data['kodekwt'] = $_SESSION['kodekwt'];
        $data['kodekegiatan'] = $this->M_kode_program->getKodeKegiatan($_SESSION['idBagian']);
        $data['pegawaiData'] = $this->M_pegawai->getPegawaiData($_SESSION['idBagian']);
        $data['penandatangan'] = $this->M_pegawai->getPenandaTangan($_SESSION['idBagian']);
        
        if ($typeOfPerjadin == ISDD) {
            $data['typeOfPerjadin'] = ISDD;    
            $data['pageTitle'] = "Perjalanan Dinas Dalam Daerah";
            $data['tujuan_dd'] = $this->M_tujuan->getTujuanDD();
            
        }
        if ($typeOfPerjadin == ISLD) {
            $data['typeOfPerjadin'] = ISLD;
            $data['pageTitle'] = "Perjalanan Dinas Luar Daerah";
            $data['tujuan_ld'] = $this->M_tujuan->getTujuanLD();
        }
        
        if ($typeOfPerjadin == ISLP) {
            $data['typeOfPerjadin'] = ISLP;
            $data['pageTitle'] = "Perjalanan Dinas Luar Provinsi";
            $data['tujuan_lp'] = $this->M_tujuan->getTujuanLP();
        }

        $this->loadPerjadinInputViews($data);
    }

    /**
     * public function loadPerjadinInputViews
     * 
     * what this does :
     *  load required views for user to input data and generate documents
     * 
     * param :
     *  @data
     *      contained in $data is :
     *           data idBagian
     *           data username
     *           data kodebagian
     *           data kodekwt
     *           data kodekegiatan
     *           data pegawaiData
     *           data penandatangan
     *           data tujuan
     *           data pageTitle
     *  
     * return :
     *  load views for user to input data and generate documents from it
     */
    public function loadPerjadinInputViews($data)
    {
        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
        
            $this->load->view('_layouts/header', $data);
            $this->load->view('modules_perjadin/V_perjadin_header', $data);

            $this->load->view('modules_perjadin/V_perjadin_view', $data);
            $this->load->view('modules_perjadin/V_perjadin_container', $data);
            $this->load->view('modules_perjadin/V_perjadin_javascript', $data);

            $this->load->view('modules_perjadin/V_perjadin_footer', $data);

            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

    /**
     * public function generateDocuments
     * 
     * what this does :
     *  run function for generating documents for users
     * 
     * param :
     *  none
     * 
     * return :
     *  - generated documents :
     *      surat tugas
     *      sppd
     *      kwitansi
     *      tanda terima
     *      rincian
     * 
     *  - data recorded in database
     */
    public function generateDocuments($typeOfPerjadin){
        $data['hasil'] = $this->M_perjadin_main->getValueAndInsertToDB();
        $this->session->set_flashdata('notifikasiTambah', ' Data berhasil ditambahkan');

        if ($typeOfPerjadin == ISDD) {
            redirect('C_perjadin_dd/perjadin_recap_index');
            
        }
        if ($typeOfPerjadin == ISLD) {
            redirect('C_perjadin_ld/perjadin_recap_index');
        }
        
        if ($typeOfPerjadin == ISLP) {
            redirect('C_perjadin_lp/perjadin_recap_index');
        }
    }
}
