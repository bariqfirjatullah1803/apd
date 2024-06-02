<?php

class M_report extends CI_Model
{
    public function getAllreport(){
        // $sql = "select * from recap_bug_report_or_feature_request";
        $sql = "
        SELECT bag.namaBagian, bug.reportTitle, bug.descReport, bug.reportedDate, bug.repairedDate, bug.developmentStatus 
        FROM `recap_bug_report_or_feature_request` as bug 
        INNER JOIN resource_bagian as bag 
        ON bag.idBagian = bug.idBagian;";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function insertReport(){

        $idBag = $_SESSION['idBagian'];
        $idSubmit = $idBag . time();
        $reportTitle = '';

        // 0 -> saran pengembangan
        // 1 -> laporan bug
        if (($this->input->post('bug-or-advice-container')) == 0) {
            $reportTitle = "Fitur : " . $this->input->post('input-judul-container');
        }elseif (($this->input->post('bug-or-advice-container')) == 1) {
            $reportTitle = "Bug : " . $this->input->post('input-judul-container');
        }

        // {Get Data}
        $data = array(
            'idSubmit'      =>  $idSubmit,
            'idBagian'      =>  $idBag,
            'isBugReport'   =>  $this->input->post('bug-or-advice-container'),
            'reportTitle'   =>  $reportTitle,
            'descReport'    =>  $this->input->post('input-keterangan-container'),
            'reportedDate'  =>  $this->input->post('year-container') . '-' . 
                                $this->input->post('month-container') . '-' . 
                                $this->input->post('date-container'),

            'developmentStatus' => 1
        );
    // 
        $this->db->insert(RECAP_BUG, $data); 
    }

}