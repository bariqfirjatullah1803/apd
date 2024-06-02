<?php


class Tujuan_model extends CI_Model
{
    public function getAllTujuan()
    {
        $query = $this->db->get('tujuan');

        return $query->result_array();
    }

    public function getTujuanLuarDaerahDalamProvinsi(){
        $query = $this->db->get('tujuan_luar_daerah_dalam_provinsi');

        return $query->result_array();
    }
}
