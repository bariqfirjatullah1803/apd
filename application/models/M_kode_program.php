<?php

class M_kode_program extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // ==========
    // {Get kode kegiatan}
    // ==========

    public function getKodeKegiatan($idBag)
    {
        $sql = "select * from resource_kegiatan where idBagian = '".$idBag."'";

        $query = $this->db->query($sql);

        return $query->result_array();
    }


}
