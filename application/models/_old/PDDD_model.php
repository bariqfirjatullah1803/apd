<?php



class PDDD_model extends CI_Model
{
    public function getTujuan()
    {
        $query = $this->db->get('tujuan');

        return $query->result_array();
    }

    public function getPegawai($idBag)
    {
        $this->db->select('namaPegawai, nip, jabatan');
        $this->db->from('pegawai_table');
        $this->db->where('idBagian', $idBag);
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }

    public function getKabag($idBag)
    {
        $this->db->select('namaPejabat, nip, gol, pangkat, jabatan');
        $this->db->from('pejabat');
        $this->db->where('idBagian', $idBag);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function tambahData($idBag)
    {
        $timestamp = $idBag . time();

        $dataForDatabase = [ // Database column
            "idSubmit" => $timestamp,
            // "kegiatan" => $this->input->post('kegiatan'),
            // "nomorSuratTugas" => $this->input->post('nomorSuratTugas'),
            "dasarSurat" => $this->input->post('dasarSurat'),
            // "noKwt" => $this->input->post('noKwt'),
            "tglBerangkat" => $this->input->post('startDate'),
            "tglPulang" => $this->input->post('endDate'),
            "durasi" => $this->input->post('durasi'),
            "lokasi" => $this->input->post('lokasi'),
            "tujuan_nama" => $this->input->post('koleksiTujuan'),
            "acara" => $this->input->post('acara'),
            "jmlPegawai" => $this->input->post('jmlPeg'),
            "namaPegawai" => $this->input->post('namaPeg'),
            // "nipPegawai" => $this->input->post('nipPeg'),
            // "golPegawai" => $this->input->post('golPeg'),
            "bagian_id" => $idBag,
            "totalPembayaran" => $this->input->post('totalBiaya')
            // "uangHarian" => $this->input->post('uangHarian'),
            // "uangHarianTotal" => $this->input->post('uangHarianTotal'),
            // "uangTransport" => $this->input->post('uangTransport'),
            // "uangTiketPP" => $this->input->post('uangTiketPP'),
            // "uangPenginapan" => $this->input->post('uangPenginapan'),
            // "grandTotal" => $this->input->post('grandTotal')
        ];

        /**
         * I'm Gonna do all my calculations over here :
         * - is it 8 hour?                  Yes              No             -> 8jamyatidak
         * - Uang Harian            :       160             125             -> nominalUH
         * - Uang Transport         :       highest val       0             -> nominalUT1, nominalUT2, nominalUT3
         * 
         * - Uang Harian Total      :       Uang harian * jumlah hari       -> nominalUH * durasinumonly
         * 
         */


        $apakah8jam = $this->input->post('8jamyatidak');
        $jumlahTujuan = $this->input->post('jumlahTujuan');

        $uangHarian = 0;
        $uangHarianTotal = 0;
        $durasinumonly = $this->input->post('durasinumonly');

        $jumlahPegawai = $this->input->post('jmlPeg');

        if ($apakah8jam == "Y") {
            $uangHarian = 160000;
            $highestUT = max($this->input->post('nominalUT1'), $this->input->post('nominalUT2'), $this->input->post('nominalUT3'));
        } else {
            $uangHarian = 125000;
            $uangHarianTotal = $uangHarian * $jumlahTujuan;
            $highestUT = 0;
        }

        $smallTotal = ($uangHarianTotal + $highestUT) * $durasinumonly;
        $grandTotal = (int)$smallTotal * (int)$jumlahPegawai;

        //$highestUT = max($this->input->post('nominalUT1'), $this->input->post('nominalUT2'), $this->input->post('nominalUT3'));

        $kodeBagian = $this->input->post('kodebagian');
        $tahun = date("Y");

        $nomorSuratTugas = $this->input->post('nomorSuratTugas');
        $kodeSuratTugas = "094/" . $nomorSuratTugas . "/35.07." . $kodeBagian . "/" . $tahun;

        $dataForRecap = [ // Database column
            "idSubmit" => $timestamp,
            "kegiatan" => $this->input->post('kegiatan'),
            "nomorSuratTugas" => $kodeSuratTugas,
            "dasarSurat" => $this->input->post('dasarSurat'),
            // "noKwt" => $this->input->post('noKwt'),
            "tglBerangkat" => $this->input->post('startDate'),
            "tglPulang" => $this->input->post('endDate'),
            "durasi" => $this->input->post('durasi'),
            "lokasi" => $this->input->post('lokasi'),
            "tujuan_nama" => $this->input->post('koleksiTujuan'),
            "acara" => $this->input->post('acara'),
            "jmlPegawai" => $this->input->post('jmlPeg'),
            "namaPegawai" => $this->input->post('namaPeg'),
            "nipPegawai" =>
            $this->input->post('nip1') . "; " . $this->input->post('nip2') . "; " .
                $this->input->post('nip3') . "; " . $this->input->post('nip4') . "; " .
                $this->input->post('nip5') . "; " . $this->input->post('nip6') . "; " .
                $this->input->post('nip7') . "; " . $this->input->post('nip8') . "; " .
                $this->input->post('nip9') . "; " . $this->input->post('nip10'),
            "golPegawai" =>
            $this->input->post('gol1') . "; " . $this->input->post('gol2') . "; " .
                $this->input->post('gol3') . "; " . $this->input->post('gol4') . "; " .
                $this->input->post('gol5') . "; " . $this->input->post('gol6') . "; " .
                $this->input->post('gol7') . "; " . $this->input->post('gol8') . "; " .
                $this->input->post('gol9') . "; " . $this->input->post('gol10'),
            "bagian_id" => $idBag,

            "totalPembayaran" => $this->input->post('totalBiaya'),

            "uangHarian" => $uangHarian,

            "uangHarianTotal" => $uangHarianTotal,

            "uangTransport" => $highestUT,

            // "uangTiketPP" => $this->input->post('uangTiketPP'),
            // "uangPenginapan" => $this->input->post('uangPenginapan'),
            "grandTotal" => $grandTotal
        ];

        $this->db->insert('recap', $dataForRecap);

        #region Surat Tugas

        if ($this->input->post('jmlPeg') <= 3) {
            #region Surat Tugas ===============================================================================================================================
            //Initialize
            $tmpST_filename = "SURAT-TUGAS-" . $timestamp . ".docx";
            $tmpST_process = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/TMP_SURAT_TUGAS.docx');

            #region Modify Values
            $tmpST_process->setValues([
                'KODE_BAGIAN' => $this->input->post('kodebagian'),
                'JABATAN_KABAG' => $this->input->post('jabkabag'),
                'NAMA_KABAG' => $this->input->post('namakabag'),
                'PANGKAT_KABAG' => $this->input->post('pankabag'),
                'NIP_KABAG' => $this->input->post('nipkabag'),

                'DASAR_SURAT' => $this->input->post('dasarSurat'),
                'TAHUN' => date("Y"),
                'HARI' => $this->input->post('hari'),
                'BULAN' => $this->input->post('bulan'),
                'ACARA' => $this->input->post('acara'),
                'TANGGAL' => $this->input->post('startDate'),
                'TUJUAN_S' => $this->input->post('lokasi'),
                'TUJUAN_K' => $this->input->post('koleksiTujuan')
            ]);

            for ($i = 1; $i <= $this->input->post('jmlPeg'); $i++) {
                $tmpST_process->setValues([
                    'NAMA_' . $i => $this->input->post('peg' . $i),
                    'NIP_' . $i => "NIP. " . $this->input->post('nip' . $i),
                    'JABATAN_' . $i => $this->input->post('jab' . $i)
                ]);
            }
            #endregion

            #region Check and Remove Empty Placeholder
            //Check if peg3 have value
            if ($this->input->post('peg3') == '') {
                //Clone the block 0 times to delete all inside block
                $tmpST_process->cloneBlock('block_ops1', 0, true);
            } else {
                //Else, only remove the marker
                $tmpST_process->setValues([
                    'block_ops1' => '',
                    '/block_ops1' => ''
                ]);
            }

            if ($this->input->post('peg2') == '') {
                $tmpST_process->cloneBlock('block_ops2', 0, true);
            } else {
                $tmpST_process->setValues([
                    'block_ops2' => '',
                    '/block_ops2' => ''
                ]);
            }
            #endregion

            //Save as file
            $tmpST_process->saveAs('docs/' . $tmpST_filename);
            #endregion

        } elseif ($this->input->post('jmlPeg') > 3) {
            #region Surat Tugas > 3
            //Initialize
            $tmpST_filename = "SURAT-TUGAS-" . $timestamp . ".docx";
            $tmpST_process = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/TMP_SURAT_TUGAS_DIATAS_3.docx');

            #region Modify Values
            $tmpST_process->setValues([
                'KODE_BAGIAN' => $this->input->post('kodebagian'),
                'JABATAN_KABAG' => $this->input->post('jabkabag'),
                'NAMA_KABAG' => $this->input->post('namakabag'),
                'PANGKAT_KABAG' => $this->input->post('pankabag'),
                'NIP_KABAG' => $this->input->post('nipkabag'),

                'DASAR_SURAT' => $this->input->post('dasarSurat'),
                'TAHUN' => date("Y"),
                'HARI' => $this->input->post('hari'),
                'BULAN' => $this->input->post('bulan'),
                'ACARA' => $this->input->post('acara'),
                'TANGGAL' => $this->input->post('startDate'),
                'TUJUAN_S' => $this->input->post('lokasi'),
                'TUJUAN_K' => $this->input->post('koleksitujuan')
            ]);

            for ($i = 1; $i <= $this->input->post('jmlPeg'); $i++) {
                $tmpST_process->setValues([
                    'NAMA_' . $i => $this->input->post('peg' . $i),
                    // 'NIP_' . $i => "NIP. " . $this->input->post('nip' . $i),
                    'GOL_' . $i => $this->input->post('gol' . $i),
                    'JABATAN_' . $i => $this->input->post('jab' . $i)
                ]);

                if ($this->input->post('nip' . $i) != NULL) {
                    $tmpST_process->setValues([
                        'NIP_' . $i => "NIP. " . $this->input->post('nip' . $i)
                    ]);
                } else {
                    $tmpST_process->setValues([
                        'NIP_' . $i => $this->input->post('nip' . $i)
                    ]);
                }
            }
            #endregion

            // #region Check and Remove Empty Placeholder
            $count = $this->input->post('jmlPeg');

            switch ($count) {
                case $count == 4:
                    //Clone the block 0 times to delete all inside block
                    $tmpST_process->cloneBlock('block_ops4', 0, true);
                    break;
                case $count == 5:
                    //Clone the block 0 times to delete all inside block
                    $tmpST_process->cloneBlock('block_ops5', 0, true);
                    break;
                case $count == 6:
                    //Clone the block 0 times to delete all inside block
                    $tmpST_process->cloneBlock('block_ops6', 0, true);
                    break;
                case $count == 7:
                    //Clone the block 0 times to delete all inside block
                    $tmpST_process->cloneBlock('block_ops7', 0, true);
                    break;
                case $count == 8:
                    //Clone the block 0 times to delete all inside block
                    $tmpST_process->cloneBlock('block_ops8', 0, true);
                    break;
                case $count == 9:
                    //Clone the block 0 times to delete all inside block
                    $tmpST_process->cloneBlock('block_ops9', 0, true);
                    break;
                case $count == 10:
                    //Clone the block 0 times to delete all inside block
                    $tmpST_process->cloneBlock('block_ops10', 0, true);
                    break;

                default:
                    break;
            }
            #endregion

            //removing block ops
            for ($i = 0; $i <= $count; $i++) {
                $tmpST_process->setValues([
                    'block_ops' . $i => '',
                    '/block_ops' . $i => ''
                ]);
            }

            //Save as file
            $tmpST_process->saveAs('docs/' . $tmpST_filename);
        }
        #endregion

        #region SPPD ===============================================================================================================================
        //Initialize
        $tmpSPPD_filename = "SPPD-" . $timestamp . ".docx";
        $tmpSPPD_process = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/TMP_SPPD.docx');
        $DD = "Kabupaten Malang";

        #region Modify Values
        $tmpSPPD_process->setValues([
            'KODE_BAGIAN' => $this->input->post('kodebagian'),
            'JABATAN_KABAG' => $this->input->post('jabkabag'),
            'NAMA_KABAG' => $this->input->post('namakabag'),
            'PANGKAT_KABAG' => $this->input->post('pankabag'),
            'NIP_KABAG' => $this->input->post('nipkabag'),

            'TAHUN' => date("Y"),

            'NAMA_1' => $this->input->post('peg1'),
            'JABATAN_1' => $this->input->post('jab1'),
            'NIP_1' => 'NIP. ' . $this->input->post('nip1'),
            'PANGKAT_1' => $this->input->post('pan1') . ' ',
            'GOL_1' => $this->input->post('gol1'),

            'NAMA_2' => $this->input->post('peg2'),
            'JABATAN_2' => $this->input->post('jab2'),
            'NIP_2' => 'NIP. ' . $this->input->post('nip2'),
            'PANGKAT_2' => $this->input->post('pan2') . ' ',
            'GOL_2' => $this->input->post('gol2'),

            'NAMA_3' => $this->input->post('peg3'),
            'JABATAN_3' => $this->input->post('jab3'),
            'NIP_3' => 'NIP. ' . $this->input->post('nip3'),
            'PANGKAT_3' => $this->input->post('pan3') . ' ',
            'GOL_3' => $this->input->post('gol3'),

            'TUJUAN_S' => $this->input->post('lokasi') . ' ',
            'TUJUAN_K' => $this->input->post('koleksitujuan'),

            'DURASI' => $this->input->post('durasi'),
            'TGL_BERANGKAT' => $this->input->post('startDate'),
            'TGL_PULANG' => $this->input->post('endDate'),
            'ACARA' => $this->input->post('acara'),
            'HARI' => $this->input->post('hari'),
            'BULAN' => $this->input->post('bulan'),
            'TUJUAN_S' => $this->input->post('lokasi'),
            'TUJUAN_K' => $this->input->post('koleksitujuan'),
            'IS_DD' => $DD
        ]);
        #endregion

        #region Check and Remove Empty Placeholders
        if ($this->input->post('peg3') == '') {
            $tmpSPPD_process->cloneBlock('block_ops1', 0, true);
        } else {
            $tmpSPPD_process->setValues([
                'block_ops1' => '',
                '/block_ops1' => ''
            ]);
        }
        if ($this->input->post('jab2') == '') {
            $tmpSPPD_process->cloneBlock('block_ops2', 0, true);
        } else {
            $tmpSPPD_process->setValues([
                'block_ops2' => '',
                '/block_ops2' => ''
            ]);
        }
        #endregion

        //Save as file
        $tmpSPPD_process->saveAs('docs/' . $tmpSPPD_filename);
        #endregion

        #region Kwitansi ===============================================================================================================================
        $ssKwt_filename = "KWITANSI-" . $timestamp . ".xls";

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_KWITANSI.xlsx');

        $worksheet = $spreadsheet->getActiveSheet();

        #region Modify Value
        //  @ FIX THIS, this is format from 2021 @
        if ($idBag < 10) {
            $worksheet->getCell('D2')->setValue('             /kwt/4.01.0.00.0.0086.000' . $idBag . '/' . date("Y"));
        } else {
            $worksheet->getCell('D2')->setValue('             /kwt/4.01.0.00.0.0086.00' . $idBag . '/' . date("Y"));
        }

        //No Kwitansi
        // $worksheet->getCell('D2')->setValue('             /kwt/4.01.0.00.0.0086.0009/' . date("Y"));
        //Terbilang
        $worksheet->getCell('D6')->setValue(strtoupper("#" . $this->input->post('totalBiayaTerbilang')) . ' RUPIAH #');

        //Untuk Pembayaran
        $textUP = "Biaya Perjalanan Dinas Dalam Daerah dalam rangka " . $this->input->post('acara') .
            " yang dilaksanakan pada hari " . $this->input->post('hari') .
            " tanggal " . $this->input->post('startDate') .
            " bertempat di " . $this->input->post('lokasi') . "," . $this->input->post('koleksitujuan') .
            " a.n "  . $this->input->post('peg1');

        $worksheet->getCell('D9')->setValue($textUP);

        //Nominal
        // $worksheet->getCell('D14')->setValue($this->input->post('totalBiaya'));
        $worksheet->getCell('D14')->setValue($grandTotal);

        //Nama Penerima
        $worksheet->getCell('G18')->setValue($this->input->post('peg1'));

        //NIP Penerima
        $worksheet->getCell('G19')->setValue('NIP. ' . $this->input->post('nip1'));

        //NAMA PPTK
        $worksheet->getCell('E29')->setValue($this->input->post('namakabag'));

        //NIP PPTK
        $worksheet->getCell('E30')->setValue('NIP. ' . $this->input->post('nipkabag'));

        //Nama Bendahara
        $worksheet->getCell('H29')->setValue('AHMAD ROFIQ, SE, MM.');

        //NIP Bendahara
        $worksheet->getCell('H30')->setValue('NIP. 19851127 201001 1 012');
        #endregion

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('docs/' . $ssKwt_filename);
        #endregion

        #region Tanda Terima =========================================================================================================================

        $ssTT_filename = "TANDA-TERIMA-" . $timestamp . ".xls";

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA.xlsx');

        $worksheet = $spreadsheet->getActiveSheet();

        #region Modify Value
        // $worksheet->getCell('A2')->setValue('DALAM RANGKA ' . strtoupper($this->input->post('acara')));
        $worksheet->getCell('A3')->setValue('KE ' . strtoupper($this->input->post('lokasi')) . ' ' . strtoupper($this->input->post('koleksitujuan')));
        $worksheet->getCell('A4')->setValue('TANGGAL ' . strtoupper($this->input->post('startDate')));

        #region Set Excel cell value

        //Nama - Pangkat GOL - NIP - UH - Durasi - Durasi Terbilang
        $worksheet->getCell('B11')->setValue($this->input->post('peg1'));
        $worksheet->getCell('B12')->setValue($this->input->post('pan1') . " " . $this->input->post('gol1'));
        $worksheet->getCell('B13')->setValue('NIP. ' . $this->input->post('nip1'));
        $worksheet->getCell('C11')->setValue($uangHarian);
        $worksheet->getCell('D11')->setValue($this->input->post('durasinumonly'));
        $worksheet->getCell('D12')->setValue($this->input->post('durasi'));

        if ($this->input->post('peg2') != '') {
            $worksheet->getCell('B15')->setValue($this->input->post('peg2'));
            $worksheet->getCell('B17')->setValue('NIP. ' . $this->input->post('nip2'));
            $worksheet->getCell('B16')->setValue($this->input->post('pan2') . " " . $this->input->post('gol2'));
            $worksheet->getCell('C15')->setValue($uangHarian);
            $worksheet->getCell('D15')->setValue($this->input->post('durasinumonly'));
            $worksheet->getCell('D16')->setValue($this->input->post('durasi'));
        } else {
            #region Emptying cell
            $worksheet->getCell('A15')->setValue('');
            $worksheet->getCell('B15')->setValue('');
            $worksheet->getCell('C15')->setValue('');
            $worksheet->getCell('D15')->setValue('');
            $worksheet->getCell('E15')->setValue('');
            $worksheet->getCell('F15')->setValue('');

            $worksheet->getCell('B16')->setValue('');
            $worksheet->getCell('D16')->setValue('');

            $worksheet->getCell('B17')->setValue('');
            #endregion
        }

        if ($this->input->post('peg3') != '') {
            $worksheet->getCell('B19')->setValue($this->input->post('peg3'));
            $worksheet->getCell('B20')->setValue($this->input->post('pan3') . " " . $this->input->post('gol3'));
            $worksheet->getCell('B21')->setValue('NIP. ' . $this->input->post('nip3'));
            $worksheet->getCell('C19')->setValue($uangHarian);
            $worksheet->getCell('D19')->setValue($this->input->post('durasinumonly'));
            $worksheet->getCell('D20')->setValue($this->input->post('durasi'));
        } else {
            #region Emptying Cell
            $worksheet->getCell('A19')->setValue('');
            $worksheet->getCell('B19')->setValue('');
            $worksheet->getCell('C19')->setValue('');
            $worksheet->getCell('D19')->setValue('');
            $worksheet->getCell('E19')->setValue('');
            $worksheet->getCell('F19')->setValue('');

            $worksheet->getCell('B20')->setValue('');
            $worksheet->getCell('D20')->setValue('');

            $worksheet->getCell('B21')->setValue('');
            #endregion
        }

        if ($this->input->post('peg4') != '') {
            $worksheet->getCell('B23')->setValue($this->input->post('peg4'));
            $worksheet->getCell('C23')->setValue($uangHarian);
            $worksheet->getCell('D23')->setValue($this->input->post('durasinumonly'));

            $worksheet->getCell('B24')->setValue($this->input->post('pan4') . " " . $this->input->post('gol4'));
            $worksheet->getCell('D24')->setValue($this->input->post('durasi'));

            $worksheet->getCell('B25')->setValue('NIP. ' . $this->input->post('nip4'));
        } else {
            #region Emptying Cell
            $worksheet->getCell('A23')->setValue('');
            $worksheet->getCell('B23')->setValue('');
            $worksheet->getCell('B24')->setValue('');
            $worksheet->getCell('B25')->setValue('');
            $worksheet->getCell('C23')->setValue('');
            $worksheet->getCell('D23')->setValue('');
            $worksheet->getCell('D24')->setValue('');
            $worksheet->getCell('E23')->setValue('');
            $worksheet->getCell('F23')->setValue('');
            #endregion
        }

        if ($this->input->post('peg5') != '') {
            $worksheet->getCell('B27')->setValue($this->input->post('peg5'));
            $worksheet->getCell('B28')->setValue($this->input->post('pan5') . " " . $this->input->post('gol5'));
            $worksheet->getCell('B29')->setValue('NIP. ' . $this->input->post('nip5'));
            $worksheet->getCell('C27')->setValue($uangHarian);
            $worksheet->getCell('D27')->setValue($this->input->post('durasinumonly'));
            $worksheet->getCell('D28')->setValue($this->input->post('durasi'));
        } else {
            #region Emptying Cell
            $worksheet->getCell('A27')->setValue('');
            $worksheet->getCell('B27')->setValue('');
            $worksheet->getCell('C27')->setValue('');
            $worksheet->getCell('D27')->setValue('');
            $worksheet->getCell('E27')->setValue('');
            $worksheet->getCell('F27')->setValue('');

            $worksheet->getCell('B28')->setValue('');
            $worksheet->getCell('D28')->setValue('');

            $worksheet->getCell('B29')->setValue('');
            #endregion
        }

        if ($this->input->post('peg6') != '') {
            $worksheet->getCell('B31')->setValue($this->input->post('peg6'));
            $worksheet->getCell('B32')->setValue($this->input->post('pan6') . " " . $this->input->post('gol6'));
            $worksheet->getCell('B33')->setValue('NIP. ' . $this->input->post('nip6'));
            $worksheet->getCell('C31')->setValue($uangHarian);
            $worksheet->getCell('D31')->setValue($this->input->post('durasinumonly'));
            $worksheet->getCell('D32')->setValue($this->input->post('durasi'));
        } else {
            #region Emptying Cell
            $worksheet->getCell('A31')->setValue('');
            $worksheet->getCell('B31')->setValue('');
            $worksheet->getCell('C31')->setValue('');
            $worksheet->getCell('D31')->setValue('');
            $worksheet->getCell('E31')->setValue('');
            $worksheet->getCell('F31')->setValue('');

            $worksheet->getCell('B32')->setValue('');
            $worksheet->getCell('D32')->setValue('');

            $worksheet->getCell('B33')->setValue('');
            #endregion
        }

        if ($this->input->post('peg7') != '') {
            $worksheet->getCell('B35')->setValue($this->input->post('peg7'));
            $worksheet->getCell('B36')->setValue($this->input->post('pan7') . " " . $this->input->post('gol7'));
            $worksheet->getCell('B37')->setValue('NIP. ' . $this->input->post('nip7'));
            $worksheet->getCell('C35')->setValue($uangHarian);
            $worksheet->getCell('D35')->setValue($this->input->post('durasinumonly'));
            $worksheet->getCell('D36')->setValue($this->input->post('durasi'));
        } else {
            #region Emptying Cell
            $worksheet->getCell('A35')->setValue('');
            $worksheet->getCell('B35')->setValue('');
            $worksheet->getCell('C35')->setValue('');
            $worksheet->getCell('D35')->setValue('');
            $worksheet->getCell('E35')->setValue('');
            $worksheet->getCell('F35')->setValue('');

            $worksheet->getCell('B36')->setValue('');
            $worksheet->getCell('D36')->setValue('');

            $worksheet->getCell('B37')->setValue('');
            #endregion
        }

        if ($this->input->post('peg8') != '') {
            $worksheet->getCell('B39')->setValue($this->input->post('peg8'));
            $worksheet->getCell('B40')->setValue($this->input->post('pan8') . " " . $this->input->post('gol8'));
            $worksheet->getCell('B41')->setValue('NIP. ' . $this->input->post('nip8'));
            $worksheet->getCell('C39')->setValue($uangHarian);
            $worksheet->getCell('D39')->setValue($this->input->post('durasinumonly'));
            $worksheet->getCell('D40')->setValue($this->input->post('durasi'));
        } else {
            #region Emptying Cell
            $worksheet->getCell('A39')->setValue('');
            $worksheet->getCell('B39')->setValue('');
            $worksheet->getCell('C39')->setValue('');
            $worksheet->getCell('D39')->setValue('');
            $worksheet->getCell('E39')->setValue('');
            $worksheet->getCell('F39')->setValue('');

            $worksheet->getCell('B40')->setValue('');
            $worksheet->getCell('D40')->setValue('');

            $worksheet->getCell('B41')->setValue('');
            #endregion
        }

        if ($this->input->post('peg9') != '') {
            $worksheet->getCell('B43')->setValue($this->input->post('peg9'));
            $worksheet->getCell('B44')->setValue($this->input->post('pan9') . " " . $this->input->post('gol9'));
            $worksheet->getCell('B45')->setValue('NIP. ' . $this->input->post('nip9'));
            $worksheet->getCell('C43')->setValue($uangHarian);
            $worksheet->getCell('D43')->setValue($this->input->post('durasinumonly'));
            $worksheet->getCell('D44')->setValue($this->input->post('durasi'));
        } else {
            #region Emptying Cell
            $worksheet->getCell('A43')->setValue('');
            $worksheet->getCell('B43')->setValue('');
            $worksheet->getCell('C43')->setValue('');
            $worksheet->getCell('D43')->setValue('');
            $worksheet->getCell('E43')->setValue('');
            $worksheet->getCell('F43')->setValue('');

            $worksheet->getCell('B44')->setValue('');
            $worksheet->getCell('D44')->setValue('');

            $worksheet->getCell('B45')->setValue('');
            #endregion
        }

        if ($this->input->post('peg10') != '') {
            $worksheet->getCell('B47')->setValue($this->input->post('peg10'));
            $worksheet->getCell('B48')->setValue($this->input->post('pan10') . " " . $this->input->post('gol10'));
            $worksheet->getCell('B49')->setValue('NIP. ' . $this->input->post('nip10'));
            $worksheet->getCell('C47')->setValue($uangHarian);
            $worksheet->getCell('D47')->setValue($this->input->post('durasinumonly'));
            $worksheet->getCell('D48')->setValue($this->input->post('durasi'));
        } else {
            #region Emptying Cell
            $worksheet->getCell('A47')->setValue('');
            $worksheet->getCell('B47')->setValue('');
            $worksheet->getCell('C47')->setValue('');
            $worksheet->getCell('D47')->setValue('');
            $worksheet->getCell('E47')->setValue('');
            $worksheet->getCell('F47')->setValue('');

            $worksheet->getCell('B48')->setValue('');
            $worksheet->getCell('D48')->setValue('');

            $worksheet->getCell('B49')->setValue('');
            #endregion
        }
        #endregion
        #endregion

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('docs/' . $ssTT_filename);
        #endregion

        #region SPPD Hal 2

        $sppd2_filename = "SPPD2-" . $timestamp . ".xls";

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_SPPD_2.xlsx');

        $worksheet = $spreadsheet->getActiveSheet();

        #region Modify Value
        if ($kodeBagian == "1" || $kodeBagian == "2" || $kodeBagian == "6" || $kodeBagian == "12") {
            $worksheet->getCell('C42')->setValue(strtoupper('Asisten Pemerintahan dan Kesejahteraan Rakyat'));
        } elseif ($kodeBagian == "4" || $kodeBagian == "5" || $kodeBagian == "10" || $kodeBagian == "11") {
            $worksheet->getCell('C42')->setValue(strtoupper('Asisten Perekonomian dan Pembangunan'));
        } elseif ($kodeBagian == "3" || $kodeBagian == "7" || $kodeBagian == "8" || $kodeBagian == "9") {
            $worksheet->getCell('C42')->setValue(strtoupper('Asisten Administrasi Umum'));
        }
        //$worksheet->getCell('C42')->setValue(strtoupper('Title Asisten'));
        $worksheet->getCell('C44')->setValue(strtoupper($this->input->post('jabkabag')));

        $worksheet->getCell('C48')->setValue($this->input->post('namakabag'));
        $worksheet->getCell('C49')->setValue('NIP. ' . $this->input->post('nipkabag'));

        #endregion
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('docs/' . $sppd2_filename);
        #endregion

    }
}
