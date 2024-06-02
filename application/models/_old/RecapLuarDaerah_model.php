<?php

class RecapLuarDaerah_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
    }
    public function getAllRecap()
    {
        $this->db->select('bagian_id, nomorSuratTugas,tglPulang,
        idSubmit, dasarSurat, tglBerangkat, durasi, 
        lokasi, tujuan_nama, acara, jmlPegawai, 
        namaPegawai, totalPembayaran');

        $this->db->from('recap');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRecapFromOneSubSection($idBag)
    {
        $this->db->select(
            'idRecap,
            nomorSuratTugas,
            dasarSurat,
            tujuanNamaTujuanDanKota,
            tanggalBerangkat,
            durasi,
            jmlPegawai,
            namaPegawai,
            grandTotal,
            idSubmit');

        $this->db->from('recap_luar_daerah');
        $this->db->where('idBagian', $idBag);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getRecapForBPK($idBag){
        $this->db->select(
            'idRecap,
            namaPegawai,
            jabPegawai,
            golPegawai,
            nomorSPPD,
            tanggalSPPD,
            tujuanNamaTujuanDanKota,
            durasi,
            uangHarian,
            uangPenginapan,
            uangRepresentasi,
            uangTransportUdara,
            uangTransportDarat,
            uangEToll,
            subtotal,
            berangkatNamaMaskapai,
            berangkatKodeBooking,
            berangkatNomorTiket,
            berangkatNomorKursi,
            berangkatNomorPenerbangan,
            berangkatAsal,
            berangkatTujuan,
            berangkatTanggalPenerbangan,
            berangkatJamKeberangkatan,
            berangkatHarga,
            kembaliNamaMaskapai,
            kembaliKodeBooking,
            kembaliNomorTiket,
            kembaliNomorKursi,
            kembaliNomorPenerbangan,
            kembaliAsal,
            kembaliTujuan,
            kembaliTanggalPenerbangan,
            kembaliJamKeberangkatan,
            kembaliHarga'
        );

        $this->db->from('recap_luar_daerah');
        $this->db->where('idBagian', $idBag);
        $query = $this->db->get();

        return $query->result_array();
    }
}
