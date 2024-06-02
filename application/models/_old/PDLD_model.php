<?php

class PDLD_model extends CI_Model{
    
    public function getPegawai($idBag)
    {
        $this->db->select('namaPegawai, nip, jabatan');
        $this->db->from('pegawai_table');
        $this->db->where('idBagian', $idBag);
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }

    public function tambahData($idBag){

        $databaseName = 'recap_luar_daerah';
        // For Debugging
        // echo "<pre>";
        // print_r($_POST);
        // echo "<pre>";

    // #region Initialize ===========================================================================

        // #region For Database
            $timestamp = $idBag . time();
            $idSubmit = $timestamp;
            $idBagian = $idBag;
            $dateSorter = $this->input->post('');
            $subBagian = $this->input->post('sub-bagian-top-container');
        // #endRegion

        $nomorSuratTugas = $this->input->post('nomor-surat-tugas-top-container');
        $nomorSPPD = '';
        $tanggalSPPD = '';

        $dasarSurat = $this->input->post('dasar-surat-top-container');

        // #region Tanggal - Durasi - Tujuan - Acara
            $tglBerangkat = $this->input->post('startDates');
            $tglPulang = $this->input->post('endDates');
            $durasiDenganHari = $this->input->post('durasi-dengan-hari-top-container');
            $durasiTanpaHari = $this->input->post('durasi-tanpa-hari-top-container');
            $durasiTerbilang = $this->input->post('durasi-terbilang-top-container');
            $namaTujuan = $this->input->post('nama-tujuan-top-container');
            $kota = $this->input->post('kota-tujuan-top-container');
            $acara = $this->input->post('acara-top-container');
        // #endRegion

        // #region Data Pegawai
            $jumlahPegawaiYangBerangkat = $this->input->post('jumlah-pegawai-container');
            $namaSeluruhPegawaiYangBerangkat = $this->input->post('nama-seluruh-pegawai-container');
            $nipSeluruhPegawaiYangBerangkat = $this->input->post('nip-seluruh-pegawai-container');
            $golSeluruhPegawaiYangBerangkat = $this->input->post('gol-seluruh-pegawai-container');
            $panSeluruhPegawaiYangBerangkat = $this->input->post('pan-seluruh-pegawai-container');
            $jabSeluruhPegawaiYangBerangkat = $this->input->post('jab-seluruh-pegawai-container');
        // endRegion

        $alatAngkutYangDigunakan = $this->input->post('alat-angkut-top-container');
        
        // #region Uang Harian dll
            $uangHarian = $this->input->post('uang-harian-top-container');
            $uangHarianTotal = $this->input->post('');
            $uangTransport = $this->input->post('uang-transport-top-container');
            $uangTransportUdara = '';
            $uangTransportDarat = '';
            $uangEToll = '';

            $uangTiketPP = $this->input->post('');
            $uangPenginapan = $this->input->post('uang-penginapan-top-container');

            $uangRepresentasi = '';

            $subtotal = '';
            $grandTotal = $this->input->post('');
        // #endRegion

        // #region Data Maskapai
            $berangkatNamaMaskapai = '';
            $berangkatKodeBooking = '';
            $berangkatNomorTiket = '';
            $berangkatNomorKursi = '';
            $berangkatNomorPenerbangan = '';
            $berangkatAsal = '';
            $berangkatTujuan = '';
            $berangkatTanggalPenerbangan = '';
            $berangkatJamKeberangkatan = '';
            $berangkatHarga = '';

            $kembaliNamaMaskapai = '';
            $kembaliKodeBooking = '';
            $kembaliNomorTiket = '';
            $kembaliNomorKursi = '';
            $kembaliNomorPenerbangan = '';
            $kembaliAsal = '';
            $kembaliTujuan = '';
            $kembaliTanggalPenerbangan = '';
            $kembaliJamKekembalian = '';
            $kembaliHarga = '';
        // endRegion

    // #endregion ===================================================================================

    // #region Insert into Database
        $dataToBeInserted = [
            "idSubmit" => $idSubmit,
            "idBagian" => $idBag,
            "subBagian" => $subBagian,
            "dateSorter" => $dateSorter,
            "nomorSuratTugas" => $nomorSuratTugas,
            "dasarSurat" => $dasarSurat,
            "namaPegawai" => $namaSeluruhPegawaiYangBerangkat,
            "nipPegawai" => $nipSeluruhPegawaiYangBerangkat,
            "golPegawai" => $golSeluruhPegawaiYangBerangkat,
            "jmlPegawai" => $jumlahPegawaiYangBerangkat,
            "nomorSPPD" => $nomorSPPD,
            "tanggalSPPD" => $tanggalSPPD,
            "tujuanNamaTujuanDanKota" => $namaTujuan . " " . $kota,
            "durasi" => $durasiTanpaHari,
            "tanggalBerangkat" => $tglBerangkat,
            "tanggalKembali" => $tglPulang,
            "uangHarian" => $uangHarian,
            "uangPenginapan" => $uangPenginapan,
            "uangRepresentasi" => $uangRepresentasi,
            "uangTransportUdara" => $uangTransportUdara,
            "uangTransportDarat" => $uangTransportDarat,
            "uangEToll" => $uangEToll,
            "subtotal" => $subtotal,
            "berangkatNamaMaskapai" => $berangkatNamaMaskapai,
            "berangkatKodeBooking" => $berangkatKodeBooking,
            "berangkatNomorTiket" => $berangkatNomorTiket,
            "berangkatNomorKursi" => $berangkatNomorKursi,
            "berangkatNomorPenerbangan" => $berangkatNomorPenerbangan,
            "berangkatAsal" => $berangkatAsal,
            "berangkatTujuan" => $berangkatTujuan,
            "berangkatTanggalPenerbangan" => $berangkatTanggalPenerbangan,
            "berangkatJamKeberangkatan" => $berangkatJamKeberangkatan,
            "berangkatHarga" => $berangkatHarga,
            "kembaliNamaMaskapai" => $kembaliNamaMaskapai,
            "kembaliKodeBooking" => $kembaliKodeBooking,
            "kembaliNomorTiket" => $kembaliNomorTiket,
            "kembaliNomorKursi" => $kembaliNomorKursi,
            "kembaliNomorPenerbangan" => $kembaliNomorPenerbangan,
            "kembaliAsal" => $kembaliAsal,
            "kembaliTujuan" => $kembaliTujuan,
            "kembaliTanggalPenerbangan" => $kembaliTanggalPenerbangan,
            "kembaliJamKekembalian" => $kembaliJamKekembalian,
            "kembaliHarga" => $kembaliHarga,
            "grandTotal" =>$grandTotal
        ];
    // #endregion

        $this->db->insert($databaseName, $dataToBeInserted);    

    }
}