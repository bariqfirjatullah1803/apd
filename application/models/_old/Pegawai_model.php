<?php

class Pegawai_model extends CI_Model
{
    public function getAllDataPegawai()
    {

        $this->db->select('namaPegawai, nip, jabatan');
        $this->db->from('pegawai_table');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getDataPegawaiFromOneSubSection($idBag)
    {
        $this->db->select('namaPegawai, nip, jabatan');
        $this->db->from('pegawai_table');
        $this->db->where('idBagian', $idBag);
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }
}
