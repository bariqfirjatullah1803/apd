<?php

class Dashboard_model extends CI_Model
{

    public function showAllAmountOfPerdin()
    {
        $this->db->select('COUNT(idRecap) as JumlahPerdin');
        $this->db->from('recap');
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }

    public function showAllSumOfMoney()
    {
        $this->db->select('sum(totalPembayaran) as TotalBayar');
        $this->db->from('recap');
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }

    public function dataGrafikJumlahPerdin()
    {
        $this->db->select('count(*) as totalPerdin,
        count(case when bagian_id="1" then 1 else null end) as tapum,
        count(case when bagian_id="2" then 1 else null end) as hukum,
        count(case when bagian_id="3"then 1 else null end) as bagor,
        count(case when bagian_id="4" then 1 else null end) as ekonom,
        count(case when bagian_id="5" then 1 else null end) as barjas,
        count(case when bagian_id="6" then 1 else null end) as kerjas,
        count(case when bagian_id="7" then 1 else null end) as umum,
        count(case when bagian_id="8" then 1 else null end) as prokopim,
        count(case when bagian_id="9" then 1 else null end) as renkeu,
        count(case when bagian_id="10" then 1 else null end) as admpem,
        count(case when bagian_id="11" then 1 else null end) as sda,
        count(case when bagian_id="12" then 1 else null end) as kesra');
        $this->db->from('recap');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function dataGrafikRealisasiPerdin()
    {
        $this->db->select('sum(totalPembayaran) as totalRealisasi,
        sum(case when bagian_id="1" then totalPembayaran end) as tapum,
        sum(case when bagian_id="2" then totalPembayaran end) as hukum,
        sum(case when bagian_id="3" then totalPembayaran end) as bagor,
        sum(case when bagian_id="4" then totalPembayaran end) as ekonom,
        sum(case when bagian_id="5" then totalPembayaran end) as barjas,
        sum(case when bagian_id="6" then totalPembayaran end) as kerjas,
        sum(case when bagian_id="7" then totalPembayaran end) as umum,
        sum(case when bagian_id="8" then totalPembayaran end) as prokopim,
        sum(case when bagian_id="9" then totalPembayaran end) as renkeu,
        sum(case when bagian_id="10" then totalPembayaran end) as admpem,
        sum(case when bagian_id="11" then totalPembayaran end) as sda,
        sum(case when bagian_id="12" then totalPembayaran end) as kesra');

        $this->db->from('recap');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function countAmountOfPerdinFromOneSubSection($idBag)
    {
        $this->db->select('COUNT(idSubmit) as JumlahPerdin');
        $this->db->from('recap');
        $this->db->where('bagian_id', $idBag);
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }

    public function countSumOfMoneyFromOneSubSection($idBag)
    {
        $this->db->select('sum(totalPembayaran) as TotalBayar');
        $this->db->from('recap');
        $this->db->where('bagian_id', $idBag);
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }
}
