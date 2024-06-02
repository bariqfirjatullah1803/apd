<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_mt extends CI_Controller
{
    public function index()
    {
        $data['information'] = 'Sedang dilakukan maintenance s/d 12/09/2022 jam 12:00 WIB';
        $this->load->view('V_mt', $data);
        // $this->load->view('maintenance');
    }

    public function maintenanceHalamanPerjadin($typeOfPerjadin){
        if ($typeOfPerjadin == ISDD) {
            $data['information'] = '';    
            
        }
        if ($typeOfPerjadin == ISLD) {
            $data['information'] = 'Maintenance untuk halaman ini diperpanjang s/d 16/09/2022';
        }
        
        if ($typeOfPerjadin == ISLP) {
            $data['information'] = 'Maintenance';
        }

        $this->load->view('V_mt', $data);
    }
}
