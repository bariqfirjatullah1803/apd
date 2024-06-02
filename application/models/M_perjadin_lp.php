<?php
error_reporting(0);
ini_set('display_errors', 0);

class M_perjadin_lp extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
    }

    // ==========
    // {RECAP}
    // ==========

    public function getRecapFromOneSection($idBag)
    {
        $sql = "select 
        gi.idSubmit, assoc.idBagian,
        dur.tanggalBerangkat, dur.durasiDenganHari, 
        dest.lokasi, dest.kotaKecamatan, dest.dasarSurat, dest.acara,
        peg.jmlAll, peg.namaAll,
        mon.nominalGtAll
        
        from recap_all_general_information as gi
        INNER JOIN recap_all_date_and_durations as dur
            on gi.idSubmit = dur.idSubmit
        INNER JOIN recap_all_destination_information as dest
            on gi.idSubmit = dest.idSubmit
        INNER JOIN recap_all_pegawai as peg
            on gi.idSubmit = peg.idSubmit
        INNER JOIN recap_all_money_details as mon
            on gi.idSubmit = mon.idSubmit
        INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
            on gi.idSubmit = assoc.idSubmit 
        
        where assoc.idBagian = '".$idBag."' and gi.idKategori = 'lp'";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function hapusDataRecap($idSubmit)
    {

        $deleteAsBag = "DELETE FROM ". RECAP_ASSOC_BAG ." WHERE idSubmit = " . $idSubmit;
        $query = $this->db->query($deleteAsBag);

        $monTrans = "DELETE FROM ". RECAP_MON_TRANS ." WHERE idSubmit = " . $idSubmit;
        $query = $this->db->query($monTrans);

        $monLod = "DELETE FROM ". RECAP_MON_LOD ." WHERE idSubmit = " . $idSubmit;
        $query = $this->db->query($monLod);

        $deletePegawai = "DELETE FROM ". RECAP_PEG ." WHERE idSubmit = " . $idSubmit;
        $query = $this->db->query($deletePegawai);

        $deleteMoney = "DELETE FROM ". RECAP_MON ." WHERE idSubmit = " . $idSubmit;
        $query = $this->db->query($deleteMoney);

        $deleteDestination = "DELETE FROM ". RECAP_DEST ." WHERE idSubmit = " . $idSubmit;
        $query = $this->db->query($deleteDestination);

        $deleteDate = "DELETE FROM ". RECAP_DUR ." WHERE idSubmit = " . $idSubmit;
        $query = $this->db->query($deleteDate);

        unlink('docs/SURAT-TUGAS-' . $idSubmit . '.docx');
        unlink('docs/SPPD-' . $idSubmit . '.docx');
        unlink('docs/TANDA-TERIMA-' . $idSubmit . '.xls');
        unlink('docs/KWITANSI-' . $idSubmit . '.xls');

        $deleteGeneral = "DELETE FROM ". RECAP_GI ." WHERE idSubmit = " . $idSubmit;
        $query = $this->db->query($deleteGeneral);
    }

    // ====================
    // {To Database and Generate Docs}
    // ====================

    public function getDataFrom($containerName){
        return $this->input->post($containerName);
    }

    public function insertDataAndGenerate($idBag)
    {
        // ANCHOR @ Get Required Data @
            // {Initialize}
                    $timestamp = $idBag . time();
                    $idSubmit = $timestamp;
                    // {Get amount of 'special name'}
                    $spcNameAmount = $this->getDataFrom('spc-name-amount-container');
                    // {Get index bagian}
                    $indexBagian = $this->getDataFrom('index-bagian-container');
                    // {Get singkatan bagian for kodeKwt}
                    $kodeKwt = $this->getDataFrom('kodekwt-container');
                    $isSpecialNameExist = '';

                    if ($spcNameAmount>0) {
                        $isSpecialNameExist = TRUE;
                    }else{
                        $isSpecialNameExist = FALSE;
                    }
        
            // {General Informations} 
                $idKegiatan = $this->getDataFrom('kode-kegiatan-container');
                $idSubKegiatan = $this->getDataFrom('kode-kegiatan-container');;
                $idKategori = "lp";
                $idStatus = $this->getDataFrom('status-container');
            // 

            // {Date and Durations}
                $dateSorter = $this->getDataFrom('date-sorter-container');
                $durasiDenganHari = $this->getDataFrom('durasi-dengan-hari-container');
                $durasiTanpaHari = $this->getDataFrom('durasi-tanpa-hari-container');
                $durasiTerbilang = $this->getDataFrom('durasi-terbilang-container');
                $namaBulan = $this->getDataFrom('bulan-container');
                $namaHari = $this->getDataFrom('hari-container');
                $tahun = date("Y");
                $tanggalBerangkat = $this->getDataFrom('tanggal-berangkat-container');
                $tanggalKembali = $this->getDataFrom('tanggal-kembali-container');
            // 

            // {Destination}
                $acara = $this->getDataFrom('acara-input');
                $nomorSurat = $this->getDataFrom('nomor-surat-tugas-container');
                $dasarSurat = $this->getDataFrom('dasar-surat-container');
                $kotaKecamatan = $this->getDataFrom('kota-container');
                $lokasi = $this->getDataFrom('nama-tujuan-container');
                $nomorSuratTugas = $this->getDataFrom('nomor-surat-tugas-container');
            // 

            // {Money Details}
                $nominalGtAll = $this->getDataFrom('nominal-grand-total-all-container');
                $nominalGtAllTerbilang = $this->getDataFrom('nominal-grand-total-all-terbilang-container');

                $nominalRep = $this->getDataFrom('nominal-rep-container');
                $nominalRepTerbilang = $this->getDataFrom('nominal-rep-terbilang-container');

                $nominalUh = $this->getDataFrom('nominal-uh-container');
                $nominalUhAll = $this->getDataFrom('nominal-uh-all-container');
                $nominalUhAllTerbilang = $this->getDataFrom('nominal-uh-all-terbilang-container');

                $nominalUt = $this->getDataFrom('nominal-ut-container');
                $nominalUtAll = $this->getDataFrom('nominal-ut-all-container');
                $nominalUtAllTerbilang = $this->getDataFrom('nominal-ut-all-terbilang-container');
            // 

            // {Money Lodging Details}
                $nominalPenginapanPerHari = $this->getDataFrom('penginapan-input');
                $nominalPenginapanLainLain = $this->getDataFrom('');
                $descPenginapanLainLain = $this->getDataFrom('');
                $nominalPenginapanTotal = $this->getDataFrom('');
            // 

            // {Money Misc Details}
                $nominalMisc = $this->getDataFrom('');
                $descMisc = $this->getDataFrom('');
            // 

            // {Money Transport Details}
                $nominalBBM = $this->getDataFrom('bbm-input');
                $nominalEToll = $this->getDataFrom('biaya-tol-input');
                $nominalTransportSewaKendaraan = $this->getDataFrom('');
                $nominalTransportTaksiProvAsal = $this->getDataFrom('taksi-berangkat-input');
                $nominalTransportTaksiProvTujuan = $this->getDataFrom('taksi-tujuan-input');
                $nominalTransportTaksiProvAsalAtCost = $this->getDataFrom('taksi-berangkat-atcost-input');
                $nominalTransportTaksiProvTujuanAtCost = $this->getDataFrom('taksi-tujuan-atcost-input');
                $nominalTransportLainLain = $this->getDataFrom('biaya-transportasi-pp-atcost-input');
                $descTransportLainLain = $this->getDataFrom('desc-transport-lain-lain-container');
            // 

            // {Pegawai}
                $eslAll = $this->getDataFrom('esl-all-container');
                $golAll = $this->getDataFrom('gol-all-container');
                $jabAll = $this->getDataFrom('jab-all-container');
                $jmlAll = $this->getDataFrom('jml-all-container');
                $namaAll = $this->getDataFrom('nama-all-container');
                $nipAll = $this->getDataFrom('nip-all-container');
                $panAll = $this->getDataFrom('pan-all-container');
            // 

            // {Penandatangan}
                $namaTTD = $this->getDataFrom('nama-ttd-container');
                $nipTTD = $this->getDataFrom('nip-ttd-container');
                $panTTD = $this->getDataFrom('pan-ttd-container');
                $jabTTD = $this->getDataFrom('jab-ttd-container');
                $golTTD = $this->getDataFrom('gol-ttd-container');
            // 

            // {Kepala Bagian}
                $namaKabag = $this->getDataFrom('nama-kabag-container');
                $nipKabag = $this->getDataFrom('nip-kabag-container');
                $panKabag = $this->getDataFrom('pan-kabag-container');
                $jabKabag = $this->getDataFrom('jab-kabag-container');
                $golKabag = $this->getDataFrom('gol-kabag-container');
            // 

            // {Assoc IdSubmit IdBagian}
                $idBagian  = $this->getDataFrom('');
            // 

            // {Assoc IdSubmit IdPegawai}
                $idPegawai  = $this->getDataFrom('');
            // 

            // {Assoc IdSubmit IdTujuan}
                $idTujuan  = $this->getDataFrom('');
            // 

            // {Plane Arrival Details}
                $asal = $this->getDataFrom('');
                $jam  = $this->getDataFrom('');
                $kodeBooking = $this->getDataFrom('');
                $namaMaskapai = $this->getDataFrom('');
                $nomorKursi = $this->getDataFrom('');
                $nomorPenerbangan = $this->getDataFrom('');
                $nomorTiket = $this->getDataFrom('');
                $subtotal = $this->getDataFrom('');
                $tanggalPenerbangan = $this->getDataFrom('');
                $tujuan = $this->getDataFrom('');
            // 

            // {Plane Departure Details}
                $asal = $this->getDataFrom('');
                $jam  = $this->getDataFrom('');
                $kodeBooking = $this->getDataFrom('');
                $namaMaskapai = $this->getDataFrom('');
                $nomorKursi = $this->getDataFrom('');
                $nomorPenerbangan = $this->getDataFrom('');
                $nomorTiket = $this->getDataFrom('');
                $subtotal = $this->getDataFrom('');
                $tanggalPenerbangan = $this->getDataFrom('');
                $tujuan = $this->getDataFrom('');
            // 

        // 

        // ANCHOR @ Insert into Database @
            // {Insert Into Database - RECAP_GI} Checked And Verified Tested And Worked
                $generalInformation = [
                    "idSubmit" => $idSubmit,
                    "idKegiatan" => $idKegiatan,
                    "idSubKegiatan" => $idSubKegiatan,
                    "idKategori" => $idKategori,
                    "idStatus" => $idStatus
                ];
            // 
            $this->db->insert(RECAP_GI, $generalInformation);

            // {Insert into Database - recap_dur} Checked And Verified Tested And Worked
                $dateInformation = [
                    "idSubmit" => $idSubmit,

                    "dateSorter" => $dateSorter, 
                    "tanggalBerangkat" => $tanggalBerangkat, 
                    "tanggalKembali" => $tanggalKembali, 
                    "durasiTanpaHari" => $durasiTanpaHari, 
                    "durasiDenganHari" => $durasiDenganHari, 
                    "durasiTerbilang" => $durasiTerbilang, 
                    "namaHari" => $namaHari,
                    "namaBulan" => $namaBulan, 
                    "tahun" => $tahun
                ];
            // 
            $this->db->insert(RECAP_DUR, $dateInformation);

            // {Insert into Database - recap_dest} Checked And Verified Tested And Worked
                $destinationInformation = [
                    "idSubmit" => $idSubmit,

                    "nomorSurat" => $nomorSuratTugas,
                    "dasarSurat" => $dasarSurat,
                    "lokasi" => $lokasi,
                    "kotaKecamatan" => $kotaKecamatan,
                    "acara" => $acara,
                ];
            // 
            $this->db->insert(RECAP_DEST, $destinationInformation);

            // {Insert into Database - recap_money_details} Checked And Verified Tested And Worked
                $moneyInformation = [
                    "idSubmit" => $idSubmit,
                    
                    "isIt8Hours" => $apakah8jam,
                    "nominalUh" => $nominalUh,
                    "nominalUt" => $nominalUt,
                    "nominalUhAll" => $nominalUhAll,
                    "nominalUhAllTerbilang" =>$nominalUhAllTerbilang,
                    "nominalUtAll" =>$nominalUtAll,
                    "nominalUtAllTerbilang" => $nominalUtAllTerbilang,
                    "nominalRep" => $nominalRep,
                    "nominalRepTerbilang" => $nominalRepTerbilang,
                    "nominalGtAll" => $nominalGtAll,
                    "nominalGtAllTerbilang" => $nominalGtAllTerbilang
                ];
            // 
            $this->db->insert(RECAP_MON, $moneyInformation);

            // FIXME
            // {Insert into Database - recap_money_lodging_details} @ TESTING REQUIRED @
                $moneyLodgingInformation = [
                    "idSubmit" => $idSubmit,
                    "nominalPenginapanPimpinanRombongan" => '',
                    "nominalPenginapanPerHari" => $nominalPenginapanPerHari,
                    "nominalPenginapanTotal" =>$nominalPenginapanTotal,
                    "nominalPenginapanLainLain" =>$nominalPenginapanLainLain,
                    "descPenginapanLainLain" => $descPenginapanLainLain,
                ];
            // 
            $this->db->insert(RECAP_MON_LOD, $moneyLodgingInformation);

            // FIXME
            // {Insert into Database - recap_money_transport_details} @ TESTING REQUIRED @
                $moneyTransInformation = [
                    "idSubmit" => $idSubmit,
                    "nominalBBM" => $nominalBBM,
                    "nominalEToll" => $nominalEToll,
                    "nominalTransportSewaKendaraan" =>$nominalTransportSewaKendaraan,

                    "nominalTransportTaksiProvAsal" =>$nominalTransportTaksiProvAsal,
                    "nominalTransportTaksiProvTujuan" =>$nominalTransportTaksiProvTujuan,
                    "nominalTransportTaksiProvAsalAtCost" =>$nominalTransportTaksiProvAsalAtCost,
                    "nominalTransportTaksiProvTujuanAtCost" =>$nominalTransportTaksiProvTujuanAtCost,
                    
                    "nominalTransportLainLain" => $nominalTransportLainLain,
                    "descTransportLainLain" => $descTransportLainLain,
                ];
            // 
            $this->db->insert(RECAP_MON_TRANS, $moneyTransInformation);

            // {Insert into Database - recap_peg} Checked And Verified Tested And Worked
                $pegawaiInformation = [
                    "idSubmit" => $idSubmit,
                    "namaAll" => $namaAll,
                    "nipAll" => $nipAll,
                    "golAll" => $golAll,
                    "panAll" => $panAll,
                    "jabAll" => $jabAll,
                    "eslAll" => $eslAll,
                    "jmlAll" => $jmlAll,
                ];

            // 
            $this->db->insert(RECAP_PEG, $pegawaiInformation);

            // {Insert into Database - assoc idbagian} Checked And Verified Tested And Worked
                $assocBag = [
                    "idSubmit" => $idSubmit,
                    "idBagian" => $idBag
                ];
            // 
            $this->db->insert(RECAP_ASSOC_BAG, $assocBag);
        // 

        #region {Pre-processing data pegawai} // This is for when i generate documents
            /**
             * Explanations
             * 1st, the strings is "exploded", meaning it split the strings into array using ";" as parameter for separator
             * 2nd, the "exploded array" is filtered for removing empty array elements
             * 3rd, the "filtered array" is then "reindexed" again
             */
            $nama_processed = array_values(array_filter(explode(';',$namaAll)));
            $nip_processed = array_values(array_filter(explode(';',$nipAll)));
            $gol_processed = array_values(array_filter(explode(';',$golAll)));
            $pan_processed = array_values(array_filter(explode(';',$panAll)));
            $jab_processed = array_values(array_filter(explode(';',$jabAll)));
            $esl_processed = array_values(array_filter(explode(';',$eslAll)));
        #endregion

        // ANCHOR @ Generate Documents @

            // @=============================================================================@
            // {Generate Surat Tugas} @ Generate Surat Tugas @
                #region Initialize
                $tmp_surat_tugas_filename = "SURAT-TUGAS-".$timestamp.".docx";
                
                // {Check if nomor surat is not empty}
                if ($nomorSurat!='') {
                    if ($jmlAll == 1)$tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_1_W_NOMOR.docx";
                    if ($jmlAll == 2)$tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_2_W_NOMOR.docx";
                    if ($jmlAll == 3)$tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_3_W_NOMOR.docx";
                    if ($jmlAll  > 3)$tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_20_W_NOMOR.docx";
                }else{
                    if ($jmlAll == 1)$tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_1_WO_NOMOR.docx";
                    if ($jmlAll == 2)$tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_2_WO_NOMOR.docx";
                    if ($jmlAll == 3)$tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_3_WO_NOMOR.docx";
                    if ($jmlAll  > 3)$tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_20_WO_NOMOR.docx";
                }

                $tmp_surat_tugas_process = new \PhpOffice\PhpWord\TemplateProcessor($tmp_surat_tugas_location);
                #endregion

                #region Set Values
                // Fixed values
                $tmp_surat_tugas_process->setValues([
                    'KODE_BAGIAN' => $kodeBagian,
                    'TAHUN' => $tahun,
                    'DASAR_SURAT' => $dasarSurat,
                    'ACARA' => $acara,
                    'HARI' => $namaHari,
                    'TANGGAL_BERANGKAT' => $tanggalBerangkat,                    

                    'LOKASI' => $lokasi,
                    'KOTA' => $kotaKecamatan,
                    
                    'BULAN' =>$namaBulan,

                    'NAMA_KABAG' => $namaTTD,
                    'PAN_KABAG' => $panTTD,
                    'NIP_KABAG' => $nipTTD,
                    'JAB_KABAG' => $jabTTD,
                ]);

                // Dynamic values
                for ($i = 0; $i < $jmlAll; $i++) {

                    $tmp_surat_tugas_process->setValues([
                        'NAMA_' . ($i + 1) => $nama_processed[$i],
                        'NIP_' . ($i + 1) => $nip_processed[$i],
                        'JAB_' . ($i + 1) => $jab_processed[$i],
                        'GOL_' . ($i + 1) => $gol_processed[$i],
                        'PAN_' . ($i + 1) => $pan_processed[$i],
                    ]);
                }
                #endregion

                #region Placeholder

                // Processing Placeholder
                for ($i = $jmlAll+1; $i <= MAX_AMOUNT; $i++) { 
                    $tmp_surat_tugas_process->cloneBlock('block_ops'.$i, 0, true);
                }

                // Removing placeholder
                for ($i=1; $i <= MAX_AMOUNT; $i++) { 
                    $tmp_surat_tugas_process->setValues([
                        'block_ops'.$i => '',
                        '/block_ops'.$i => ''
                    ]);
                }
                #endregion
            //Save as file
            $tmp_surat_tugas_process->saveAs('docs/' . $tmp_surat_tugas_filename);

            // @=============================================================================@
            // {Generate SPPD} @ Generate SPPD @
                #region Initialize
                    $tmp_SPPD_filename = "SPPD-".$timestamp.".docx";

                    if ($nomorSurat!='') {
                        if ($jmlAll == 1)$tmp_SPPD_location = "assets/template/TMP_SPPD_1_W_NOMOR.docx";
                        if ($jmlAll == 2)$tmp_SPPD_location = "assets/template/TMP_SPPD_2_W_NOMOR.docx";
                        if ($jmlAll == 3)$tmp_SPPD_location = "assets/template/TMP_SPPD_3_W_NOMOR.docx";
                        if ($jmlAll  > 3)$tmp_SPPD_location = "assets/template/TMP_SPPD_20_W_NOMOR.docx";
                    }else{
                        if ($jmlAll == 1)$tmp_SPPD_location = "assets/template/TMP_SPPD_1_WO_NOMOR.docx";
                        if ($jmlAll == 2)$tmp_SPPD_location = "assets/template/TMP_SPPD_2_WO_NOMOR.docx";
                        if ($jmlAll == 3)$tmp_SPPD_location = "assets/template/TMP_SPPD_3_WO_NOMOR.docx";
                        if ($jmlAll  > 3)$tmp_SPPD_location = "assets/template/TMP_SPPD_20_WO_NOMOR.docx";
                    }

                    $tmp_SPPD_process = new \PhpOffice\PhpWord\TemplateProcessor($tmp_SPPD_location);
                #endregion

                #region Set Values
                    $tmp_SPPD_process->setValues([
                        'KODE_BAGIAN' => $kodeBagian,
                        'TAHUN' => $tahun,

                        'LOKASI' => $lokasi,
                        'KOTA' => $kotaKecamatan,

                        'DURASI' => $durasiDenganHari,

                        'TANGGAL_BERANGKAT' => $tanggalBerangkat,      
                        'TANGGAL_PULANG' => $tanggalKembali,      

                        'ACARA' => $acara,
                        'HARI' => $namaHari,
                        'BULAN' =>$namaBulan,

                        'NAMA_KABAG' => $namaTTD,
                        'PAN_KABAG' => $panTTD,
                        'NIP_KABAG' => $nipTTD,
                        'JAB_KABAG' => $jabTTD,   
                    ]);

                    // Dynamic values
                    for ($i = 0; $i < $jmlAll; $i++) {
                    $tmp_SPPD_process->setValues([
                        'NAMA_' . ($i + 1) => $nama_processed[$i],
                        'NIP_' . ($i + 1) => $nip_processed[$i],
                        'JAB_' . ($i + 1) => $jab_processed[$i],
                        'GOL_' . ($i + 1) => $gol_processed[$i],
                        'PAN_' . ($i + 1) => $pan_processed[$i],
                    ]);
                    }
                #endregion

                #region Placeholder
                    for ($i = $jmlAll+1 ; $i <= MAX_AMOUNT ; $i++) { 
                        $tmp_SPPD_process->cloneBlock('block_ops'.$i, 0, true);
                    }

                    // Removing placeholder
                    for ($i=1; $i <= MAX_AMOUNT ; $i++) { 
                        $tmp_SPPD_process->setValues([
                            'block_ops'.$i => '',
                            '/block_ops'.$i => ''
                        ]);
                    }
                #endregion

            
            // Save as File
            $tmp_SPPD_process->saveAs('docs/' . $tmp_SPPD_filename);

            // @=============================================================================@
            // {Generate Kwitansi} @ Generate Kwitansi @
                #region ANCHOR Generate Kwitansi Besar (Excel)
                        
                $tmp_kwt_filename = "KWT-".$timestamp.".xls";
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_KWITANSI_2022.xlsx');
                $worksheet = $spreadsheet->getActiveSheet();

                #region Modify Value

                //No Kwitansi
                // $worksheet->getCell('D2')->setValue('             /kwt/21.0.0.00.0.00.07.0000/' . date("Y"));
                $worksheet->getCell('D2')->setValue('             /kwt/'.$kodeKwt.'/'. date("Y"));

                //Terbilang
                $worksheet->getCell('D6')->setValue(strtoupper("# " . $nominalGtAllTerbilang . ' RUPIAH #'));

                //Untuk Pembayaran
                $deskripsi_untuk_pembayaran = 
                "Biaya Perjalanan Dinas Luar Provinsi dalam rangka " . $acara ." yang dilaksanakan pada hari " . $namaHari .
                    " tanggal " . $tanggalBerangkat . " bertempat di " . $lokasi . "," . $kotaKecamatan . " a.n "  . $nama_processed[0];

                $worksheet->getCell('D9')->setValue($deskripsi_untuk_pembayaran);

                //Nominal
                // $worksheet->getCell('D14')->setValue($this->input->post('totalBiaya'));
                $worksheet->getCell('D14')->setValue($nominalGtAll);

                //Nama + NIP Penerima
                $worksheet->getCell('G18')->setValue($nama_processed[0]);
                $worksheet->getCell('G19')->setValue('NIP. ' . $nip_processed[0]);    

                //NAMA PPTK
                $worksheet->getCell('E29')->setValue($namaKabag);
                $worksheet->getCell('E30')->setValue('NIP. ' .$nipKabag);

                //NAMA Kabag
                $worksheet->getCell('H29')->setValue('AHMAD ROFIQ, S.E., M.M.');
                $worksheet->getCell('H30')->setValue('NIP. 198511272010011012');

                // Lunar Dibayar
                $worksheet->getCell('H25')->setValue('Lunas Dibayar ..... '.$namaBulan. ' ' .$tahun);

                #endregion

                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');                
            #endregion
            // Save as File
            $writer->save('docs/' . $tmp_kwt_filename);

            // @=============================================================================@
            // {Generate Tanda Terima} @ Generate Tanda Terima @
                #region Tanda Terima =========================================================================================================================

                $tmp_tanda_terima_filename = "TANDA-TERIMA-" . $timestamp . ".xls";

                if($isSpecialNameExist == TRUE){
                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LP_W_REP.xlsx');
                }else{
                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LP.xlsx');
                }

                $worksheet = $spreadsheet->getActiveSheet();

                #region Modify Value
                // $worksheet->getCell('A2')->setValue('DALAM RANGKA ' . strtoupper($this->input->post('acara')));
                $worksheet->getCell('A3')->setValue('KE ' . strtoupper($lokasi) . ' ' . strtoupper($kotaKecamatan));
                $worksheet->getCell('A4')->setValue('TANGGAL ' . $tanggalBerangkat);

                #region Set Excel cell value

                $indexForProcessed = 0;
                $limit = ($worksheet->getHighestRow())-5;
                $initialIndex = 11;

                // {loops for filling excel}
                for ($i=$initialIndex; $i <=$limit;) {
                    $worksheet->getCell('B'.strval($i))->setValue($nama_processed[$indexForProcessed]);
                    $worksheet->getCell('B'.strval($i+1))->setValue($pan_processed[$indexForProcessed] . " " . $gol_processed[$indexForProcessed]);
                    $worksheet->getCell('B'.strval($i+2))->setValue('NIP. ' . $nip_processed[$indexForProcessed]);
                    // {Uang Harian}
                    $worksheet->getCell('C'.strval($i))->setValue($nominalUh);

                    // {UT}
                    // {Remove any text for biaya transportasi (Biaya Transportasi Pesawat/Kapal/Kereta/Bus)}
                    // {Then set it again}
                    $worksheet->getCell('D'.strval($i))->setValue('');
                    $worksheet->getCell('D'.strval($i))->setValue($nominalTransportLainLain);

                    // {Nominal Taksi Lump sum}
                    $worksheet->getCell('E'.strval($i))->setValue(intVal($nominalTransportTaksiProvAsal) + intVal($nominalTransportTaksiProvTujuan));

                    // {Nominal Taksi At cost}
                    $worksheet->getCell('F'.strval($i))->setValue(intVal($nominalTransportTaksiProvAsalAtCost) + intVal($nominalTransportTaksiProvTujuanAtCost));

                    // {Nominal Penginapan}
                    $worksheet->getCell('G'.strval($i))->setValue($nominalPenginapanPerHari);

                    // {Multiplier}
                    $worksheet->getCell('H'.strval($i))->setValue($durasiTanpaHari);
                    $worksheet->getCell('H'.strval($i+1))->setValue($durasiTerbilang);
                    $indexForProcessed = $indexForProcessed + 1;
                    $i = $i + 4;
                }

                // {Penandatangan Tanda Terima}
                $worksheet->getCell('F98')->setValue($namaKabag);
                $worksheet->getCell('F99')->setValue('NIP. '.$nipKabag);


                // {Loops for removing empty row}
                for ($i=0; $i <20-$jmlAll; $i++) { 
                    $worksheet->removeRow(($worksheet->getHighestRow())-12, 4);
                }
                
                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
                
            // Save as File
            $writer->save('docs/' . $tmp_tanda_terima_filename);

            // @=============================================================================@
            // {Generate Rincian}
                $tmp_rincian_filename = "RINCIAN-" . $timestamp . ".xls";

                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_RINCIAN_LP.xlsx');

                $worksheet = $spreadsheet->getActiveSheet();

                #region Modify Value
                // {Nomor Surat}
                $worksheet->getCell('D9')->setValue(' 094/            /35.07.'.$kodeBagian. '/'. $tahun);

                // {Nama nip dll}
                $worksheet->getCell('F11')->setValue($nama_processed[0]);
                $worksheet->getCell('F12')->setValue("'".$nip_processed[0]);
                $worksheet->getCell('F13')->setValue($pan_processed[0] . '/' .$gol_processed[0]);
                $worksheet->getCell('F14')->setValue($jab_processed[0]);

                $maksudPerjalananDinas = 
                'Biaya Perjalanan Dinas Biasa dalam rangka '.$acara.
                ' yang dilaksanakan pada hari '.$namaHari.
                ' tanggal '.$tanggalBerangkat.
                ' bertempat di '.$lokasi.' '.$kotaKecamatan;

                // {Acara}
                $worksheet->getCell('F15')->setValue($maksudPerjalananDinas);

                // {tujuan}
                $worksheet->getCell('F17')->setValue('Malang - '.$kotaKecamatan);
                $worksheet->getCell('F18')->setValue($kotaKecamatan . ' - Malang');

                // {durasi (terbilang) hari}
                $worksheet->getCell('F19')->setValue($durasiTanpaHari . ' ('.$durasiTerbilang.') hari');

                // {tanggal berangkat}
                $worksheet->getCell('F20')->setValue($tanggalBerangkat);
                $worksheet->getCell('F21')->setValue($tanggalKembali);

                // {Pimpinan Perjadin}
                    // {Jabatan Pimpinan}
                    $worksheet->getCell('B25')->setValue('1. '.$jab_processed[0]);

                    // {Uang harian}
                    $worksheet->getCell('F26')->setValue($nominalUh);
                    $worksheet->getCell('K26')->setValue($durasiTanpaHari);

                    // {Biaya Taksi Lumpsum}
                    $worksheet->getCell('F27')->setValue(intVal($nominalTransportTaksiProvAsal)+intVal($nominalTransportTaksiProvTujuan));
                    $worksheet->getCell('K27')->setValue($durasiTanpaHari);

                    // {Biaya Taksi At Cost}
                    $worksheet->getCell('F28')->setValue(intVal($nominalTransportTaksiProvAsalAtCost)+intVal($nominalTransportTaksiProvTujuanAtCost));
                    $worksheet->getCell('K28')->setValue($durasiTanpaHari);

                    // {Biaya Transport}
                    $worksheet->getCell('F29')->setValue($nominalTransportLainLain);

                    // {Biaya Penginapan}
                    $worksheet->getCell('F30')->setValue($nominalPenginapanPerHari);
                    $worksheet->getCell('K30')->setValue($durasiTanpaHari);
                // 

                // {Pengikut Perjadin}
                if($jmlAll >1){
                    // {Uang harian}
                    $worksheet->getCell('F33')->setValue($nominalUh);
                    $worksheet->getCell('H33')->setValue(($jmlAll-1));
                    $worksheet->getCell('K33')->setValue($durasiTanpaHari);

                    // {Biaya Taksi Lumpsum}
                    $worksheet->getCell('F34')->setValue(intVal($nominalTransportTaksiProvAsal)+intVal($nominalTransportTaksiProvTujuan));
                    $worksheet->getCell('H34')->setValue(($jmlAll-1));
                    $worksheet->getCell('K34')->setValue($durasiTanpaHari);

                    // {Biaya Taksi At Cost}
                    $worksheet->getCell('F35')->setValue(intVal($nominalTransportTaksiProvAsalAtCost)+intVal($nominalTransportTaksiProvTujuanAtCost));
                    $worksheet->getCell('H35')->setValue(($jmlAll-1));
                    $worksheet->getCell('K35')->setValue($durasiTanpaHari);
                    
                    // {Biaya Transport}
                    $worksheet->getCell('F36')->setValue($nominalTransportLainLain);
                    $worksheet->getCell('H36')->setValue(($jmlAll-1));

                    // {Biaya Penginapan}
                    $worksheet->getCell('F37')->setValue($nominalPenginapanPerHari);
                    $worksheet->getCell('H37')->setValue(($jmlAll-1));
                    $worksheet->getCell('K37')->setValue($durasiTanpaHari);
                }
                // 

                $worksheet->getCell('F44')->setValue('Malang,                                  '.$namaBulan.' '.$tahun);

                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            // 
            $writer->save('docs/' . $tmp_rincian_filename);
    }


}
