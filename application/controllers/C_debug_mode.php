<?php

class C_debug_mode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_login');
    }
    public function index()
    {
        $debugStatus = $_SESSION['debugmode'];
        $newDebugStatus = '';

        if ($debugStatus == 1) {
            $newDebugStatus = 0;
        } elseif ($debugStatus == 0) {
            $newDebugStatus = 1;
        }

        $sessionData = array(
            'debugmode' => $newDebugStatus
        );

        $this->session->set_userdata($sessionData);

        redirect('C_dashboard');
    }
}
