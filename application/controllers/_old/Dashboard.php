<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }
    public function index()
    {
        $data['pageTitle'] = "Dashboard";

        if (isset($_SESSION['idBagian'])) {
            //Get Session Data
            $data['idBagian'] = $_SESSION['idBagian'];
            $data['username'] = $_SESSION['namabagian'];

            $data['jumlahPerdin'] = $this->Dashboard_model->countAmountOfPerdinFromOneSubSection($_SESSION['idBagian']);
            $data['totalRealisasi'] = $this->Dashboard_model->countSumOfMoneyFromOneSubSection($_SESSION['idBagian']);

            $data['jumlahPerdinAll'] = $this->Dashboard_model->showAllAmountOfPerdin();
            $data['totalRealisasiAll'] = $this->Dashboard_model->showAllSumOfMoney();

            $data['dataGrafikPerdin'] = $this->Dashboard_model->dataGrafikJumlahPerdin();
            $data['dataGrafikRealisasi'] = $this->Dashboard_model->dataGrafikRealisasiPerdin();

            $this->load->view('layouts/header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('layouts/footer');
        } else {
            redirect('login');
        }
    }
}
