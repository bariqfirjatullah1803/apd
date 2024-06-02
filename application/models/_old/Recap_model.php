<?php

class Recap_model extends CI_Model
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
        $this->db->select('nomorSuratTugas,tglPulang,
        idSubmit, dasarSurat, tglBerangkat, durasi, 
        lokasi, tujuan_nama, acara, jmlPegawai, 
        namaPegawai, totalPembayaran');

        $this->db->from('recap');
        $this->db->where('bagian_id', $idBag);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function hapusDataRecap($idSubmit)
    {
        $this->db->where('idSubmit', $idSubmit);
        $this->db->delete('recap');

        unlink('docs/SURAT-TUGAS-' . $idSubmit . '.docx');
        unlink('docs/SPPD-' . $idSubmit . '.docx');
        unlink('docs/TANDA-TERIMA-' . $idSubmit . '.xls');
        unlink('docs/KWITANSI-' . $idSubmit . '.xls');
    }

    public function downloadSuratTugas($stamp)
    {
        $filename = 'docs/SURAT-TUGAS-' . $stamp . '.docx';
        force_download($filename, null);
    }

    public function downloadSPPD($stamp)
    {
        $filename = 'docs/SPPD-' . $stamp . '.docx';
        force_download($filename, null);
    }

    public function downloadSPPDLembar2($stamp)
    {
        $filename = 'docs/SPPD2-' . $stamp . '.xls';
        force_download($filename, null);
    }

    public function downloadTandaTerima($stamp)
    {
        $filename = 'docs/TANDA-TERIMA-' . $stamp . '.xls';
        force_download($filename, null);
    }

    public function downloadKwitansi($stamp)
    {
        $filename = 'docs/KWITANSI-' . $stamp . '.xls';
        force_download($filename, null);
    }
}
