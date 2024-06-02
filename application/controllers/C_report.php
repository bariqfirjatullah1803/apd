<?php

class C_report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_report');
    }

    public function index()
    {
        $data['pageTitle'] = "Submit Bug/Feature";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $this->load->view('_layouts/header', $data);
            $this->load->view('modules_report/V_report_header', $data);
            $this->load->view('modules_report/V_report_view', $data);
            $this->load->view('modules_report/V_report_container', $data);
            $this->load->view('modules_report/V_report_javascript', $data);
            $this->load->view('modules_report/V_report_footer', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }

    // {Insert Pegawai}
    public function insertData(){
        $data['hasil'] = $this->M_report->insertReport();
        $this->session->set_flashdata('notifikasiTambah', ' Data berhasil ditambahkan');
        redirect('C_report/displayReport');
    }
// 

    public function displayReport()
    {
        $data['pageTitle'] = "Display Report";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['dataReport'] = $this->M_report->getAllreport();

            $this->load->view('_layouts/header', $data);
            $this->load->view('modules_report/V_report_display', $data);
            $this->load->view('_layouts/footer');
        } else {
            redirect('C_login');
        }
    }
}