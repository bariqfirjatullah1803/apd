<?php
error_reporting(0);
ini_set('display_errors', 0);

class M_perjadin_main extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
	}

	/**
	 * ANCHOR [ getDataFrom(param) ]
	 * what this does :
	 *  this function works as shorthand for $this->input->post(id)
	 *
	 * param :
	 *  @ $containerName
	 *      get the name of container used in V_perjadin_container.php
	 *
	 * return :
	 *  return the data from container
	 *
	 */
	public function getDataFrom($containerName)
	{
		return $this->input->post($containerName);
	}

	/**
	 * ANCHOR [ getValueAndInsertToDB() ]
	 * what this does :
	 *  This function do many things, such as :
	 *  - get data (reffered as inputtedData) posted by V_perjadin_main.php
	 *  - insert inputtedData to the database
	 *  - generate docs based in inputtedData :
	 *      - surat tugas (docx)
	 *      - sppd (docx)
	 *      - kwitansi (xlsx)
	 *      - tanda terima (xlsx)
	 *      - rincian (xlsx)
	 *
	 * param :
	 *  none
	 *
	 * return :
	 *  - data recorded in database
	 *  - generate docs :
	 *      - surat tugas (docx)
	 *      - sppd (docx)
	 *      - kwitansi (xlsx)
	 *      - tanda terima (xlsx)
	 *      - rincian (xlsx)
	 *
	 */
	public function getValueAndInsertToDB()
	{

		/**
		 * SECTION getValueAndInsertToDB()
		 * ANCHOR [Collect data]
		 *
		 * This is section where data that posted by V_perjadin_main.php is received and then
		 * stored inside variable to be used in another section.
		 *
		 * This section use getDataFrom($containerName).
		 */

		// SECTION Collect Data
		// ANCHOR Initialize Global data
		$idBag = $_SESSION['idBagian'];
		$typeOfPerjadin = $this->getDataFrom('type-of-perjadin-container');
		$idSubmit       = $idBag . time();
		$indexBagian    = $this->getDataFrom('index-bagian-container');
		$kodeKwt        = $this->getDataFrom('kodekwt-container');
		$asisten1 = 'Asisten Pemerintahan dan Kesejahteraan Rakyat';
		$asisten2 = 'Asisten Perekonomian dan Pembangunan';
		$asisten3 = 'Asisten Administrasi Umum';

		$spcTitleAmount       = $this->getDataFrom('spc-title-amount-container');
		$politicalTitleAmount = $this->getDataFrom('political-title-amount-container');
		//

		// ANCHOR Initialize data Pejabat Bagian Umum
		$namaKabagUmum = 'ACHMAD SOVIE NURALAM, SSTP';
		$nipKabagUmum  = '19800228 199912 1 001';

		$namaKasubagUmum = 'EMMY PUJI ASTUTI, S.E., M.Si';
		$nipKasubagUmum  = '19681030 199803 2 003';

		// ANCHOR General Informations
		$idKegiatan    = $this->getDataFrom('kode-kegiatan-container');
		$idSubKegiatan = $this->getDataFrom('kode-sub-kegiatan-container');
		$idStatus      = $this->getDataFrom('status-container');
		//

		// ANCHOR Date and Durations
		$dateSorter       = $this->getDataFrom('date-sorter-container');
		$durasiDenganHari = $this->getDataFrom('durasi-dengan-hari-container');
		$durasiTanpaHari  = $this->getDataFrom('durasi-tanpa-hari-container');
		$durasiTerbilang  = $this->getDataFrom('durasi-terbilang-container');
		$namaBulan        = $this->getDataFrom('bulan-container');
		$namaHari         = $this->getDataFrom('hari-container');
		$tahun            = date("Y");
		$tanggalBerangkat = $this->getDataFrom('tanggal-berangkat-container');
		$tanggalKembali   = $this->getDataFrom('tanggal-kembali-container');

		$namaHariSampai = $this->getDataFrom('hari-sampai-container');
		//

		// ANCHOR Destination
		$acara           = $this->getDataFrom('acara-container');
		$nomorSurat      = $this->getDataFrom('nomor-surat-tugas-container');
		$dasarSurat      = $this->getDataFrom('dasar-surat-container');
		$kotaKecamatan   = $this->getDataFrom('kota-container');
		$lokasi          = $this->getDataFrom('nama-tujuan-container');
		$nomorSuratTugas = $this->getDataFrom('nomor-surat-tugas-container');
		//

		// ANCHOR Money Details
		$nominalGtAll          = $this->getDataFrom('nominal-grand-total-all-container');
		$nominalGtAllTerbilang = $this->getDataFrom('nominal-grand-total-all-terbilang-container');

		$nominalRep          = $this->getDataFrom('nominal-rep-container');
		$nominalRepTerbilang = $this->getDataFrom('nominal-rep-terbilang-container');

		$nominalUh             = $this->getDataFrom('nominal-uh-container');
		$nominalUhAll          = $this->getDataFrom('nominal-uh-all-container');
		$nominalUhAllTerbilang = $this->getDataFrom('nominal-uh-all-terbilang-container');

		$nominalUt             = $this->getDataFrom('nominal-ut-container');
		$nominalUtAll          = $this->getDataFrom('nominal-ut-all-container');
		$nominalUtAllTerbilang = $this->getDataFrom('nominal-ut-all-terbilang-container');
		//

		// ANCHOR Penginapan - Money Lodging Details
		$statusBiayaPenginapan = $this->getDataFrom('status-biaya-penginapan-container');

		// This is used if biaya penginapan is equal (setara)
		$nominalPenginapanPerHari  = $this->getDataFrom('penginapan-biaya-per-malam-input');
		$nominalPenginapanLainLain = $this->getDataFrom('');
		$descPenginapanLainLain    = $this->getDataFrom('');
		//This is Grand Total Value for penginapan
		$nominalPenginapanTotal = $this->getDataFrom('nominal-penginapan-all-container');

		$penginapanNamaAll = $this->getDataFrom('penginapan-nama-all-container');

		/**
		 * This is used if biaya penginapan is not equal (tidak setara)
		 * This is string contain nominal per person, dont confuse variable below with $nominalPenginapanTotal
		 */
		$penginapanNominalAll = $this->getDataFrom('penginapan-nominal-all-container');
		//

		// ANCHOR Money Misc Details
		$nominalMisc = $this->getDataFrom('');
		$descMisc    = $this->getDataFrom('');
		//

		// ANCHOR Money Transport Details

		$jenisTransportasi = $this->getDataFrom('jenis-transportasi-container');
		$modaTransportasi  = $this->getDataFrom('moda-transportasi-container');

		$nominalBBM   = $this->getDataFrom('bbm-input');
		$nominalEToll = $this->getDataFrom('biaya-tol-input');

		$nominalTransportSewaKendaraan = $this->getDataFrom('');
		$nominalTransportTaksi         = $this->getDataFrom('');
		$nominalTransportLainLain      = $this->getDataFrom('');
		$descTransportLainLain         = $this->getDataFrom('');
		//

		// ANCHOR Pegawai
		$eslAll  = $this->getDataFrom('esl-all-container');
		$golAll  = $this->getDataFrom('gol-all-container');
		$jabAll  = $this->getDataFrom('jab-all-container');
		$jmlAll  = $this->getDataFrom('jml-all-container');
		$namaAll = $this->getDataFrom('nama-all-container');
		$nipAll  = $this->getDataFrom('nip-all-container');
		$panAll  = $this->getDataFrom('pan-all-container');
		//

		// ANCHOR Penandatangan
		$namaTTD = $this->getDataFrom('nama-ttd-container');
		$nipTTD  = $this->getDataFrom('nip-ttd-container');
		$panTTD  = $this->getDataFrom('pan-ttd-container');
		$jabTTD  = $this->getDataFrom('jab-ttd-container');
		$golTTD  = $this->getDataFrom('gol-ttd-container');
		//

		// ANCHOR Kepala Bagian
		$namaKabag = $this->getDataFrom('nama-kabag-container');
		$nipKabag  = $this->getDataFrom('nip-kabag-container');
		$panKabag  = $this->getDataFrom('pan-kabag-container');
		$jabKabag  = $this->getDataFrom('jab-kabag-container');
		$golKabag  = $this->getDataFrom('gol-kabag-container');
		//

		// ANCHOR Assoc IdSubmit IdBagian
		$idBagian = $idBag;
		//

		// ANCHOR Assoc IdSubmit IdPegawai
		$idPegawai = $this->getDataFrom('');
		//

		// ANCHOR Assoc IdSubmit IdTujuan
		$idTujuan = $this->getDataFrom('');
		//

		// ANCHOR Plane Arrival Details
		$asal               = $this->getDataFrom('');
		$jam                = $this->getDataFrom('');
		$kodeBooking        = $this->getDataFrom('');
		$namaMaskapai       = $this->getDataFrom('');
		$nomorKursi         = $this->getDataFrom('');
		$nomorPenerbangan   = $this->getDataFrom('');
		$nomorTiket         = $this->getDataFrom('');
		$subtotal           = $this->getDataFrom('');
		$tanggalPenerbangan = $this->getDataFrom('');
		$tujuan             = $this->getDataFrom('');
		//

		// ANCHOR Plane Departure Details
		$asal               = $this->getDataFrom('');
		$jam                = $this->getDataFrom('');
		$kodeBooking        = $this->getDataFrom('');
		$namaMaskapai       = $this->getDataFrom('');
		$nomorKursi         = $this->getDataFrom('');
		$nomorPenerbangan   = $this->getDataFrom('');
		$nomorTiket         = $this->getDataFrom('');
		$subtotal           = $this->getDataFrom('');
		$tanggalPenerbangan = $this->getDataFrom('');
		$tujuan             = $this->getDataFrom('');
		//
		// !SECTION

		/**
		 * ANCHOR Pre-Processing data pegawai
		 *
		 * Explanations
		 * 1st, the strings is "exploded", meaning it split the strings into array using ";" as parameter for separator
		 * 2nd, the "exploded array" is filtered for removing empty array elements
		 * 3rd, the "filtered array" is then "reindexed" again
		 */
		//  Pre-Processing data pegawai
		$nama_processed = array_values(array_filter(explode(';', $namaAll)));
		$nip_processed  = array_values(array_filter(explode(';', $nipAll)));
		$gol_processed  = array_values(array_filter(explode(';', $golAll)));
		$pan_processed  = array_values(array_filter(explode(';', $panAll)));
		$jab_processed  = array_values(array_filter(explode(';', $jabAll)));
		$esl_processed  = array_values(array_filter(explode(';', $eslAll)));
		//

		// Pre-Processing data penginapan
		$penginapan_nama_processed    = array_values(array_filter(explode(';', $penginapanNamaAll)));
		$penginapan_nominal_processed = array_values(array_filter(explode(';', $penginapanNominalAll)));
		//

		/**
		 * ANCHOR [Generating Documents]
		 *
		 * This section is the MAIN FEATURE from this whole website.
		 *
		 * This section get data from [Collect data] section then generate documents from that.
		 *
		 * This section have 5 sub-sections :
		 *  - Generate Surat Tugas
		 *  - Generate SPPD
		 *  - Generate Kwitansi
		 *  - Generate Tanda Terima
		 *  - Generate Rincian (Luar daerah and Luar Provinsi only)
		 *
		 * Library used in this section is PhpOffice which contain PhpWord and PhpSpreadsheet
		 *  - PhpWord is used in
		 *      - Generate Surat Tugas
		 *      - Generate SPPD
		 *
		 *  - PhpSpreadsheet is used in
		 *      - Generate Kwitansi
		 *      - Generate Tanda Terima
		 *      - Generate Rincian
		 */

		// SECTION GENERATE DOCUMENTS

		/** SECTION [ Generate Surat Tugas ]
		 * ##################################################################################################
		 */
		// NOTE : Incomplete Docs

		/**
		 * Set filename for the finished docs
		 */
		$tmp_surat_tugas_filename = "SURAT-TUGAS-" . $idSubmit . ".docx";

		/**
		 * Check if $nomorSurat is empty, there are different templates whether nomorSurat is empty or not
		 * After checking $nomorSurat, check the amount of person stored inside $jmlAll.
		 *
		 * Then store the location of template inside of $tmp_surat_tugas_location.
		 *
		 */
		if ($nomorSurat != '') {
			if ($jmlAll == 1) $tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_1_W_NOMOR.docx";
			if ($jmlAll == 2) $tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_2_W_NOMOR.docx";
			if ($jmlAll == 3) $tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_3_W_NOMOR.docx";
			if ($jmlAll > 3) $tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_20_W_NOMOR.docx";
		} else {
			if ($jmlAll == 1) $tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_1_WO_NOMOR.docx";
			if ($jmlAll == 2) $tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_2_WO_NOMOR.docx";
			if ($jmlAll == 3) $tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_3_WO_NOMOR.docx";
			if ($jmlAll > 3) $tmp_surat_tugas_location = "assets/template/TMP_SURAT_TUGAS_20_WO_NOMOR.docx";
		}

		/**
		 * Generate new TemplateProcessor(location of docx).
		 * Use $tmp_surat_tugas_location from above as parameter for TemplateProcessor.
		 *
		 * Then assign the TemplateProcessor to variable.
		 */
		$tmp_surat_tugas_process = new \PhpOffice\PhpWord\TemplateProcessor($tmp_surat_tugas_location);

		/**
		 *
		 */
		$tmp_surat_tugas_process->setValues([
			'KODE_BAGIAN'       => $indexBagian,
			'NOMOR_SURAT'       => $nomorSurat,
			'TAHUN'             => $tahun,
			'DASAR_SURAT'       => $dasarSurat,
			'ACARA'             => $acara,
			'HARI'              => $namaHari,
			'TANGGAL_BERANGKAT' => $tanggalBerangkat,

			'LOKASI' => $lokasi,
			'KOTA'   => $kotaKecamatan,

			'BULAN' => $namaBulan,

			'NAMA_KABAG' => $namaTTD,
			'PAN_KABAG'  => $panTTD,
			'NIP_KABAG'  => $nipTTD,
			'JAB_KABAG'  => $jabTTD,
		]);

		// If $durasiTanpaHari > 1
		if ($durasiTanpaHari > 1) {
			$tmp_surat_tugas_process->setValues([
				'TANGGAL_BERANGKAT' => $tanggalBerangkat . ' s/d hari ' . $namaHariSampai . ' tanggal ' . $tanggalKembali . ' ',
			]);
		} else {
			$tmp_surat_tugas_process->setValues([
				'TANGGAL_BERANGKAT' => $tanggalBerangkat,
			]);
		}

		/**
		 * Generate Asisten based on idBagian
		 *  ID -> 1,2,6,12  =   $asisten1 (Asisten Pemerintahan dan Kesejahteraan Rakyat)
		 *  ID -> 4,5,10,11 =   $asisten2 (Asisten Perekonomian dan Pembangunan)
		 *  ID -> 3,7,8,9   =   $asisten3 (Asisten Administrasi Umum)
		 */
		if ($idBagian == 1 || $idBagian == 2 || $idBagian == 6 || $idBagian == 12) {
			$tmp_surat_tugas_process->setValues([
				'ASISTEN' => $asisten1,
			]);
		} else if ($idBagian == 4 || $idBagian == 5 || $idBagian == 10 || $idBagian == 11) {
			$tmp_surat_tugas_process->setValues([
				'ASISTEN' => $asisten2,
			]);
		} else if ($idBagian == 3 || $idBagian == 7 || $idBagian == 8 || $idBagian == 9) {
			$tmp_surat_tugas_process->setValues([
				'ASISTEN' => $asisten3,
			]);
		}

		// Dynamic values
		for ($i = 0; $i < $jmlAll; $i++) {

			$tmp_surat_tugas_process->setValues([
				'NAMA_' . ($i + 1) => $nama_processed[$i],
				'NIP_' . ($i + 1)  => $nip_processed[$i],
				'JAB_' . ($i + 1)  => $jab_processed[$i],
				'GOL_' . ($i + 1)  => $gol_processed[$i],
				'PAN_' . ($i + 1)  => $pan_processed[$i],
			]);
		}

		// Processing Placeholder
		// jmlAll +1 because if not, last people is deleted
		for ($i = $jmlAll + 1; $i <= MAX_AMOUNT; $i++) {
			$tmp_surat_tugas_process->cloneBlock('block_ops' . $i, 0, true);
		}

		// Removing placeholder
		for ($i = 1; $i <= MAX_AMOUNT; $i++) {
			$tmp_surat_tugas_process->setValues([
				'block_ops' . $i  => '',
				'/block_ops' . $i => '',
			]);
		}
		//Save as file
		$tmp_surat_tugas_process->saveAs('docs/' . $tmp_surat_tugas_filename);

		// !SECTION

		/** SECTION [ Generate SPPD ]
		 * ##################################################################################################
		 */
		// NOTE : SPPD Need Docs
		$tmp_SPPD_filename = "SPPD-" . $idSubmit . ".docx";

		if ($nomorSurat != '') {
			if ($jmlAll == 1) $tmp_SPPD_location = "assets/template/TMP_SPPD_1_W_NOMOR.docx";
			if ($jmlAll == 2) $tmp_SPPD_location = "assets/template/TMP_SPPD_2_W_NOMOR.docx";
			if ($jmlAll == 3) $tmp_SPPD_location = "assets/template/TMP_SPPD_3_W_NOMOR.docx";
			if ($jmlAll > 3) $tmp_SPPD_location = "assets/template/TMP_SPPD_20_W_NOMOR.docx";
		} else {
			if ($jmlAll == 1) $tmp_SPPD_location = "assets/template/TMP_SPPD_1_WO_NOMOR.docx";
			if ($jmlAll == 2) $tmp_SPPD_location = "assets/template/TMP_SPPD_2_WO_NOMOR.docx";
			if ($jmlAll == 3) $tmp_SPPD_location = "assets/template/TMP_SPPD_3_WO_NOMOR.docx";
			if ($jmlAll > 3) $tmp_SPPD_location = "assets/template/TMP_SPPD_20_WO_NOMOR.docx";
		}

		$tmp_SPPD_process = new \PhpOffice\PhpWord\TemplateProcessor($tmp_SPPD_location);

		$tmp_SPPD_process->setValues([
			'KODE_BAGIAN' => $indexBagian,
			'TAHUN'       => $tahun,

			'LOKASI' => $lokasi,
			'KOTA'   => $kotaKecamatan,

			'DURASI' => $durasiDenganHari,

			'TANGGAL_BERANGKAT' => $tanggalBerangkat,
			'TANGGAL_PULANG'    => $tanggalKembali,

			'ACARA' => $acara,
			'HARI'  => $namaHari,
			'BULAN' => $namaBulan,

			'NAMA_KABAG' => $namaTTD,
			'PAN_KABAG'  => $panTTD,
			'NIP_KABAG'  => $nipTTD,
			'JAB_KABAG'  => $jabTTD,
		]);

		// If $durasiTanpaHari > 1
		if ($durasiTanpaHari > 1) {
			$tmp_SPPD_process->setValues([
				'TANGGAL_BERANGKAT' => $tanggalBerangkat . ' s/d hari ' . $namaHariSampai . ' tanggal ' . $tanggalKembali . ' ',
			]);
		} else {
			$tmp_SPPD_process->setValues([
				'TANGGAL_BERANGKAT' => $tanggalBerangkat,
			]);
		}

		/**
		 * Generate Asisten based on idBagian
		 *  ID -> 1,2,6,12  =   $asisten1 (Asisten Pemerintahan dan Kesejahteraan Rakyat)
		 *  ID -> 4,5,10,11 =   $asisten2 (Asisten Perekonomian dan Pembangunan)
		 *  ID -> 3,7,8,9   =   $asisten3 (Asisten Administrasi Umum)
		 */
		if ($idBagian == 1 || $idBagian == 2 || $idBagian == 6 || $idBagian == 12) {
			$tmp_SPPD_process->setValues([
				'ASISTEN' => $asisten1,
			]);
		} else if ($idBagian == 4 || $idBagian == 5 || $idBagian == 10 || $idBagian == 11) {
			$tmp_SPPD_process->setValues([
				'ASISTEN' => $asisten2,
			]);
		} else if ($idBagian == 3 || $idBagian == 7 || $idBagian == 8 || $idBagian == 9) {
			$tmp_SPPD_process->setValues([
				'ASISTEN' => $asisten3,
			]);
		}

		for ($i = 0; $i < $jmlAll; $i++) {
			$tmp_SPPD_process->setValues([
				'NAMA_' . ($i + 1) => $nama_processed[$i],
				'NIP_' . ($i + 1)  => $nip_processed[$i],
				'JAB_' . ($i + 1)  => $jab_processed[$i],
				'GOL_' . ($i + 1)  => $gol_processed[$i],
				'PAN_' . ($i + 1)  => $pan_processed[$i],
			]);
		}

		#region Placeholder
		for ($i = $jmlAll + 1; $i <= MAX_AMOUNT; $i++) {
			$tmp_SPPD_process->cloneBlock('block_ops' . $i, 0, true);
		}

		// Removing placeholder
		for ($i = 1; $i <= MAX_AMOUNT; $i++) {
			$tmp_SPPD_process->setValues([
				'block_ops' . $i  => '',
				'/block_ops' . $i => '',
			]);
		}
		#endregion

		// Save as File
		$tmp_SPPD_process->saveAs('docs/' . $tmp_SPPD_filename);
		// !SECTION

		/** SECTION [ Generate KWITANSI ]
		 * ##################################################################################################
		 */
		// NOTE : Kwitansi Need Docs
		#region Generate Kwitansi Besar (Excel)

		$tmp_kwt_filename = "KWT-" . $idSubmit . ".xls";
		$spreadsheet      = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_KWITANSI_2022.xlsx');
		$worksheet        = $spreadsheet->getActiveSheet();

		#region Modify Value

		//No Kwitansi
		if ($idStatus == 0) {
			$worksheet->getCell('D2')->setValue('             /KWT/' . $kodeKwt . '/' . date("Y"));
		} else {
			$worksheet->getCell('D2')->setValue('             /KWT/UMUM/' . date("Y"));
		}
		// $worksheet->getCell('D2')->setValue('             /kwt/'.$kodeKwt.'/'. date("Y"));

		//Terbilang
		$worksheet->getCell('D6')->setValue(strtoupper("# " . $nominalGtAllTerbilang . ' RUPIAH #'));

		$textJenisPerjalananDinas = '';


		if ($typeOfPerjadin == ISDD) {
			$textJenisPerjalananDinas = 'Perjalanan Dinas Dalam Daerah';
		} else if ($typeOfPerjadin == ISLD) {
			$textJenisPerjalananDinas = 'Perjalanan Dinas Biasa';
			$worksheet->getCell('H2')->setValue('5.1.02.04.01.0001');
		} else if ($typeOfPerjadin == ISLP) {
			$textJenisPerjalananDinas = 'Perjalanan Dinas Biasa';
		}

		/**
		 * ANCHOR If $durasiTanpaHari > 1
		 */
		if ($durasiTanpaHari > 1) {
			// If more than one person
			if ($jmlAll > 1) {
				$deskripsi_untuk_pembayaran =
					"Biaya " . $textJenisPerjalananDinas . " dalam rangka " . $acara .
					" yang dilaksanakan pada hari " . $namaHari . " tanggal " . $tanggalBerangkat .
					" s/d hari " . $namaHariSampai . " tanggal " . $tanggalKembali .
					" bertempat di " . $lokasi . "," . $kotaKecamatan . " a.n " . $nama_processed[0] . " dkk.";
			} else {
				$deskripsi_untuk_pembayaran =
					"Biaya " . $textJenisPerjalananDinas . " dalam rangka " . $acara .
					" yang dilaksanakan pada hari " . $namaHari . " tanggal " . $tanggalBerangkat .
					" s/d hari " . $namaHariSampai . " tanggal " . $tanggalKembali .
					" bertempat di " . $lokasi . "," . $kotaKecamatan . " a.n " . $nama_processed[0];
			}
		} else {
			if ($jmlAll > 1) {
				$deskripsi_untuk_pembayaran =
					"Biaya " . $textJenisPerjalananDinas . " dalam rangka " . $acara . " yang dilaksanakan pada hari " . $namaHari .
					" tanggal " . $tanggalBerangkat . " bertempat di " . $lokasi . "," . $kotaKecamatan . " a.n " . $nama_processed[0] . " dkk.";
			} else {
				$deskripsi_untuk_pembayaran =
					"Biaya " . $textJenisPerjalananDinas . " dalam rangka " . $acara . " yang dilaksanakan pada hari " . $namaHari .
					" tanggal " . $tanggalBerangkat . " bertempat di " . $lokasi . "," . $kotaKecamatan . " a.n " . $nama_processed[0];
			}
		}

		$worksheet->getCell('D9')->setValue($deskripsi_untuk_pembayaran);
		//

		//Nominal
		// $worksheet->getCell('D14')->setValue($this->input->post('totalBiaya'));
		$worksheet->getCell('D14')->setValue($nominalGtAll);

		//Nama + NIP Penerima
		$worksheet->getCell('G18')->setValue($nama_processed[0]);
		$worksheet->getCell('G19')->setValue('NIP. ' . $nip_processed[0]);

		//NAMA PPTK
		if ($idStatus == 0) {
			$worksheet->getCell('E29')->setValue($namaKabag);
			$worksheet->getCell('E30')->setValue('NIP. ' . $nipKabag);
		} else {
			$worksheet->getCell('E29')->setValue($namaKabagUmum);
			$worksheet->getCell('E30')->setValue('NIP. ' . $nipKabagUmum);
		}

		//NAMA Bendahara
		$worksheet->getCell('H29')->setValue('AHMAD ROFIQ, S.E., M.M.');
		$worksheet->getCell('H30')->setValue('NIP. 198511272010011012');

		// Lunar Dibayar
		$worksheet->getCell('H25')->setValue('Lunas Dibayar ..... ' . $namaBulan . ' ' . $tahun);

		#endregion

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');


		#endregion
		// Save as File
		$writer->save('docs/' . $tmp_kwt_filename);
		// !SECTION

		/** SECTION [ Generate Tanda Terima ]
		 * ##################################################################################################
		 */
		// NOTE : Tanda terima Need Docs
		#region Tanda Terima =========================================================================================================================

		/**
		 * Set filename for the finished docs
		 */
		$tmp_tanda_terima_filename = "TANDA-TERIMA-" . $idSubmit . ".xls";

		/** REVIEW SELECT TEMPLATE
		 * Check if i need use template with "uang-representatif" column
		 */
		if ($spcTitleAmount > 0 || $politicalTitleAmount > 0) {
			if ($typeOfPerjadin == ISDD) {
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_DD_W_REP.xlsx');
			} else if ($typeOfPerjadin == ISLD) {
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LD_W_REP.xlsx');
			} else if ($typeOfPerjadin == ISLP) {
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LP_W_REP.xlsx');
			}
		} else {
			if ($typeOfPerjadin == ISDD) {
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_DD.xlsx');
			} else if ($typeOfPerjadin == ISLD) {
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LD.xlsx');
			} else if ($typeOfPerjadin == ISLP) {
				// Check if Jenis Transport PP sama
				if ($jenisTransportasi == 1) {

					// MOBIL PRIBADI
					if ($modaTransportasi == 1) {
						$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LP_MOBIL_PRIBADI.xlsx');

						// SEWA KENDARAAN
					} else if ($modaTransportasi == 2) {
						$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LP_SEWA_KENDARAAN.xlsx');

						// BUS
					} else if ($modaTransportasi == 3) {
						$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LP_BUS.xlsx');
					}
				}

			}
		}

		/**
		 * Get active sheet from template loaded to IOFactory
		 */
		$worksheet = $spreadsheet->getActiveSheet();

		#region Modify Value
		// $worksheet->getCell('A2')->setValue('DALAM RANGKA ' . strtoupper($this->input->post('acara')));
		$worksheet->getCell('A3')->setValue('KE ' . strtoupper($lokasi) . ' ' . strtoupper($kotaKecamatan));
		// If $durasiTanpaHari > 1
		if ($durasiTanpaHari > 1) {
			$worksheet->getCell('A4')->setValue('TANGGAL ' . $tanggalBerangkat . ' s/d ' . $tanggalKembali);
		} else {
			$worksheet->getCell('A4')->setValue('TANGGAL ' . $tanggalBerangkat);
		}

		#region Set Excel cell value

		#endregion

		/**
		 * For getting value in array : $namaProcessed, $panProcessed, $golProcessed, $nipProcessed
		 */
		$indexForProcessed = 0;

		/**
		 * For getting value in array : $penginapan_nominal_processed
		 */
		$indexForPenginapanProcessed = 0;

		/**
		 *
		 */
		$gapBetweenHighestRowAndLastName = 14;

		$limit        = ($worksheet->getHighestRow()) - $gapBetweenHighestRowAndLastName;
		$initialIndex = 11;

		// Set value for Tanda Terima contents
		/**
		 * SECTION Special Title Exist
		 */
		if ($spcTitleAmount > 0 || $politicalTitleAmount > 0) {
			// {loops for filling excel}
			for ($i = $initialIndex; $i <= $limit;) {

				$worksheet->getCell('B' . strval($i))->setValue($nama_processed[$indexForProcessed]);
				$worksheet->getCell('B' . strval($i + 1))->setValue($pan_processed[$indexForProcessed] . " " . $gol_processed[$indexForProcessed]);
				$worksheet->getCell('B' . strval($i + 2))->setValue('NIP. ' . $nip_processed[$indexForProcessed]);
				$worksheet->getCell('C' . strval($i))->setValue($nominalUhAll);
				$worksheet->getCell('D' . strval($i))->setValue($nominalUtAll);
				$worksheet->getCell('F' . strval($i))->setValue($durasiTanpaHari);
				$worksheet->getCell('F' . strval($i + 1))->setValue($durasiTerbilang);
				$indexForProcessed = $indexForProcessed + 1;
				$i                 = $i + 4;
			}

			/**
			 * Check if typeOfPerjadin is DD, LD, or LP
			 */
			if ($typeOfPerjadin == ISDD) {

				/**
				 * FIXME : PROGRESS TERAKHIR ->
				 *      DD : memasukkan nominal uang representasi kedalam kolom D, tinggal di uji coba saja.
				 *      LD : template dengan representatif belum ada.
				 *      LP : template dengan representatif belum ada.
				 */
				/**
				 * Uang Representatif
				 */
				$nominalUangRepresentatif = 0;
				if ($spcTitleAmount > 0) {
					$nominalUangRepresentatif = REPRESENTASI_DD_SEKDA_ASISTEN;
				} else if ($politicalTitleAmount > 0) {
					$nominalUangRepresentatif = REPRESENTASI_DD_BUPATI_WAKIL;
				}

				// Set uang Representatif
				for ($i = 0; $i < $spcTitleAmount; $i++) {
					$worksheet->getCell('E' . strval($initialIndex))->setValue($nominalUangRepresentatif);

					// $worksheet->getCell('E'.strval($initialIndex+1))->setValue('');
					$initialIndex = $initialIndex + 4;
				}

				/**
				 * Set penandatangan
				 */
				if ($idStatus == 0) {
					$worksheet->getCell('H' . strval($worksheet->getHighestRow() - 1))->setValue($namaKabag);
					$worksheet->getCell('H' . strval($worksheet->getHighestRow()))->setValue('NIP. ' . $nipKabag);
				} else {
					$worksheet->getCell('H' . strval($worksheet->getHighestRow() - 1))->setValue($namaKasubagUmum);
					$worksheet->getCell('H' . strval($worksheet->getHighestRow()))->setValue('NIP. ' . $nipKasubagUmum);
				}

			} else if ($typeOfPerjadin == ISLD) {

				for ($i = $initialIndex; $i <= $limit;) {

					/**
					 * Removing any text in these 2 column because Uang BBM and Biaya E-toll is only for Leader.
					 *
					 * Column D is Uang BBM
					 * Column E is Biaya E-toll
					 */
					$worksheet->getCell('D' . strval($i))->setValue('');
					$worksheet->getCell('E' . strval($i))->setValue('');

					/**
					 * Set value for Column F (Biaya Penginapan)
					 *
					 * Check if biaya pengiapan is equal or not equal
					 * 1 == Setara
					 * 0 == Tidak Setara
					 */
					if ($statusBiayaPenginapan == 1) {
						$worksheet->getCell('F' . strval($i))->setValue($nominalPenginapanPerHari);
					} else if ($statusBiayaPenginapan == 0) {
						$worksheet->getCell('F' . strval($i))->setValue($penginapan_nominal_processed[$indexForPenginapanProcessed]);
						$indexForPenginapanProcessed = $indexForPenginapanProcessed + 1;
					}

					/**
					 * Column G is Hari Kegiatan which have 2 part :
					 *      Durasi Angka, and
					 *      Durasi Terbilang
					 */

					$worksheet->getCell('G' . strval($i))->setValue($durasiTanpaHari);
					$worksheet->getCell('G' . strval($i + 1))->setValue($durasiTerbilang);

					/**
					 * For moving to next name in list
					 */
					$i = $i + 4;
				}

				/**
				 * Set value for column D11 and E11 because BBM and Etoll only valid for leader only
				 */
				$worksheet->getCell('D11')->setValue($nominalBBM);
				$worksheet->getCell('E11')->setValue($nominalEToll);

				/**
				 * Set penandatangan
				 */
				if ($idStatus == 0) {
					$worksheet->getCell('H' . strval($worksheet->getHighestRow() - 1))->setValue($namaKabag);
					$worksheet->getCell('H' . strval($worksheet->getHighestRow()))->setValue('NIP. ' . $nipKabag);
				} else {
					$worksheet->getCell('H' . strval($worksheet->getHighestRow() - 1))->setValue($namaKasubagUmum);
					$worksheet->getCell('H' . strval($worksheet->getHighestRow()))->setValue('NIP. ' . $nipKasubagUmum);
				}

			} else if ($typeOfPerjadin == ISLP) {

				// for ($i=$initialIndex; $i <=$limit;) {
				//     /**
				//      * Remove any text for Column D : biaya transportasi (Biaya Transportasi Pesawat/Kapal/Kereta/Bus)
				//      * Then set it again
				//      */
				//     $worksheet->getCell('D'.strval($i))->setValue('');
				//     $worksheet->getCell('D'.strval($i))->setValue($nominalTransportLainLain);

				//     /**
				//      * set value for column E : Biaya Taksi (Lumpsum)
				//      */
				//     $worksheet->getCell('E'.strval($i))->setValue(intVal($nominalTransportTaksiProvAsal) + intVal($nominalTransportTaksiProvTujuan));

				//     /**
				//      * set value for column F : Biaya Taksi (Atcost)
				//      */
				//     $worksheet->getCell('F'.strval($i))->setValue(intVal($nominalTransportTaksiProvAsalAtCost) + intVal($nominalTransportTaksiProvTujuanAtCost));

				//      /**
				//      * Set value for Column G (Biaya Penginapan)
				//      *
				//      * Check if biaya pengiapan is equal or not equal
				//      * 1 == Setara
				//      * 0 == Tidak Setara
				//      */
				//     if($statusBiayaPenginapan == 1){
				//         $worksheet->getCell('G'.strval($i))->setValue($nominalPenginapanPerHari);
				//     }

				//     /**
				//      * Column H is Hari Kegiatan which have 2 part :
				//      *      Durasi Angka, and
				//      *      Durasi Terbilang
				//      */
				//     $worksheet->getCell('H'.strval($i))->setValue($durasiTanpaHari);
				//     $worksheet->getCell('H'.strval($i+1))->setValue($durasiTerbilang);

				//     /**
				//      * For moving to next name in list
				//      */
				//     $i = $i + 4;
				// }
			}
			// !SECTION

			/**
			 * SECTION NON SPECIAL TITLE
			 */
		} else {

			/**
			 * These values are values that always exist in DD, LD or LP
			 * So these values are excluded from if else
			 */
			for ($i = $initialIndex; $i <= $limit;) {
				$worksheet->getCell('B' . strval($i))->setValue($nama_processed[$indexForProcessed]);
				$worksheet->getCell('B' . strval($i + 1))->setValue($pan_processed[$indexForProcessed] . " " . $gol_processed[$indexForProcessed]);
				$worksheet->getCell('B' . strval($i + 2))->setValue('NIP. ' . $nip_processed[$indexForProcessed]);
				$worksheet->getCell('C' . strval($i))->setValue($nominalUh);

				$indexForProcessed = $indexForProcessed + 1;
				$i                 = $i + 4;
			}

			/** ANCHOR ISDD
			 * Check if typeOfPerjadin is DD, LD, or LP
			 */
			if ($typeOfPerjadin == ISDD) {

				/**
				 * Set value for D and E
				 * Column D is Biaya transportasi
				 * Column E is Hari Kegiatan which have 2 part :
				 *      Durasi Angka, and
				 *      Durasi Terbilang
				 *
				 */
				for ($i = $initialIndex; $i <= $limit;) {
					$worksheet->getCell('C' . strval($i))->setValue($nominalUh);
					$worksheet->getCell('D' . strval($i))->setValue($nominalUtAll);
					$worksheet->getCell('E' . strval($i))->setValue($durasiTanpaHari);
					$worksheet->getCell('E' . strval($i + 1))->setValue($durasiTerbilang);

					/**
					 * For moving to next name in list
					 */
					$i = $i + 4;
				}

				/**
				 * Set penandatangan
				 */
				if ($idStatus == 0) {
					$worksheet->getCell('F' . strval($worksheet->getHighestRow() - 1))->setValue($namaKabag);
					$worksheet->getCell('F' . strval($worksheet->getHighestRow()))->setValue('NIP. ' . $nipKabag);
				} else {
					$worksheet->getCell('F' . strval($worksheet->getHighestRow() - 1))->setValue($namaKasubagUmum);
					$worksheet->getCell('F' . strval($worksheet->getHighestRow()))->setValue('NIP. ' . $nipKasubagUmum);
				}

				// ANCHOR ISLD
			} else if ($typeOfPerjadin == ISLD) {

				for ($i = $initialIndex; $i <= $limit;) {

					/**
					 * Removing any text in these 2 column because Uang BBM and Biaya E-toll is only for Leader.
					 *
					 * Column D is Uang BBM
					 * Column E is Biaya E-toll
					 */
					$worksheet->getCell('D' . strval($i))->setValue('');
					$worksheet->getCell('E' . strval($i))->setValue('');

					/**
					 * Set value for Column F (Biaya Penginapan)
					 *
					 * Check if biaya pengiapan is equal or not equal
					 * 1 == Setara
					 * 0 == Tidak Setara
					 */
					if ($statusBiayaPenginapan == 1) {
						$worksheet->getCell('F' . strval($i))->setValue($nominalPenginapanPerHari);
					} else if ($statusBiayaPenginapan == 0) {
						$worksheet->getCell('F' . strval($i))->setValue($penginapan_nominal_processed[$indexForPenginapanProcessed]);
						$indexForPenginapanProcessed = $indexForPenginapanProcessed + 1;
					}

					/**
					 * Column G is Hari Kegiatan which have 2 part :
					 *      Durasi Angka, and
					 *      Durasi Terbilang
					 */

					$worksheet->getCell('G' . strval($i))->setValue($durasiTanpaHari);
					$worksheet->getCell('G' . strval($i + 1))->setValue($durasiTerbilang);

					/**
					 * For moving to next name in list
					 */
					$i = $i + 4;
				}

				/**
				 * Set value for column D11 and E11 because BBM and Etoll only valid for leader only
				 */
				$worksheet->getCell('D11')->setValue($nominalBBM);
				$worksheet->getCell('E11')->setValue($nominalEToll);

				/**
				 * Set penandatangan
				 */
				if ($idStatus == 0) {
					$worksheet->getCell('H' . strval($worksheet->getHighestRow() - 1))->setValue($namaKabag);
					$worksheet->getCell('H' . strval($worksheet->getHighestRow()))->setValue('NIP. ' . $nipKabag);
				} else {
					$worksheet->getCell('H' . strval($worksheet->getHighestRow() - 1))->setValue($namaKasubagUmum);
					$worksheet->getCell('H' . strval($worksheet->getHighestRow()))->setValue('NIP. ' . $nipKasubagUmum);
				}
				// SECTION ISLP
			} else if ($typeOfPerjadin == ISLP) {

				if ($jenisTransportasi == 1) {
					// ANCHOR Mobil Pribadi
					if ($modaTransportasi == 1) {

						for ($i = $initialIndex; $i <= $limit;) {
							/**
							 * Remove any text for Column D : biaya BBM (Biaya Transportasi Pesawat/Kapal/Kereta/Bus)
							 */
							$worksheet->getCell('D' . strval($i))->setValue('');

							/**
							 * Set value for Column F (Biaya Penginapan)
							 *
							 * Check if biaya pengiapan is equal or not equal
							 * 1 == Setara
							 * 0 == Tidak Setara
							 */
							if ($statusBiayaPenginapan == 1) {
								$worksheet->getCell('F' . strval($i))->setValue($nominalPenginapanPerHari);
							}

							/**
							 * Column G is Hari Kegiatan which have 2 part :
							 *      Durasi Angka, and
							 *      Durasi Terbilang
							 */
							$worksheet->getCell('G' . strval($i))->setValue($durasiTanpaHari);
							$worksheet->getCell('G' . strval($i + 1))->setValue($durasiTerbilang);

							/**
							 * For moving to next name in list
							 */
							$i = $i + 4;
						}

						/**
						 * Set value for column D11 and E11 because BBM and Etoll only valid for leader only
						 */
						$worksheet->getCell('D11')->setValue($this->getDataFrom('moda-transportasi-input-sama-mobil-pribadi-bbm'));
						$worksheet->getCell('E11')->setValue($this->getDataFrom('moda-transportasi-input-sama-mobil-pribadi-etoll'));

						// ANCHOR Sewa Kendaraan
					} else if ($modaTransportasi == 2) {

						for ($i = $initialIndex; $i <= $limit;) {
							/**
							 * Remove any text for Column D : biaya BBM (Biaya Transportasi Pesawat/Kapal/Kereta/Bus)
							 */
							$worksheet->getCell('D' . strval($i))->setValue('');

							/**
							 * Set value for Column F (Biaya Penginapan)
							 *
							 * Check if biaya pengiapan is equal or not equal
							 * 1 == Setara
							 * 0 == Tidak Setara
							 */
							if ($statusBiayaPenginapan == 1) {
								$worksheet->getCell('F' . strval($i))->setValue($nominalPenginapanPerHari);
							}

							/**
							 * Column G is Hari Kegiatan which have 2 part :
							 *      Durasi Angka, and
							 *      Durasi Terbilang
							 */
							$worksheet->getCell('G' . strval($i))->setValue($durasiTanpaHari);
							$worksheet->getCell('G' . strval($i + 1))->setValue($durasiTerbilang);

							/**
							 * For moving to next name in list
							 */
							$i = $i + 4;
						}

						/**
						 * Set value for column D11 and E11 because BBM and Etoll only valid for leader only
						 */
						$worksheet->getCell('D11')->setValue($this->getDataFrom('moda-transportasi-input-sama-sewa-kendaraan-biaya-sewa'));
						$worksheet->getCell('E11')->setValue($this->getDataFrom('moda-transportasi-input-sama-sewa-kendaraan-etoll'));

						// ANCHOR Bus
					} else if ($modaTransportasi == 3) {

						for ($i = $initialIndex; $i <= $limit;) {
							/**
							 * Remove any text for Column D : biaya BBM (Biaya Transportasi Pesawat/Kapal/Kereta/Bus)
							 * Then fill it again
							 */
							$worksheet->getCell('D' . strval($i))->setValue('');
							$worksheet->getCell('D' . strval($i))->setValue($this->getDataFrom('total-biaya-bus-container'));

							/**
							 * Set value for Column E : taksi lumpsum
							 */
							$worksheet->getCell('E' . strval($i))->setValue(($this->getDataFrom('total-taksi-lumpsum-container')) * 2);

							/**
							 * Set value for Column F : taksi atcost
							 */
							$worksheet->getCell('F' . strval($i))->setValue($this->getDataFrom('total-taksi-atcost-container'));

							/**
							 * Set value for Column G (Biaya Penginapan)
							 *
							 * Check if biaya pengiapan is equal or not equal
							 * 1 == Setara
							 * 0 == Tidak Setara
							 */
							if ($statusBiayaPenginapan == 1) {
								$worksheet->getCell('G' . strval($i))->setValue($nominalPenginapanPerHari);
							}

							/**
							 * Column G is Hari Kegiatan which have 2 part :
							 *      Durasi Angka, and
							 *      Durasi Terbilang
							 */
							$worksheet->getCell('H' . strval($i))->setValue($durasiTanpaHari);
							$worksheet->getCell('H' . strval($i + 1))->setValue($durasiTerbilang);

							/**
							 * For moving to next name in list
							 */
							$i = $i + 4;
						}
					}
				}
			}
			// !SECTION
		}
		// !SECTION

		// Loops for removing empty row
		for ($i = 0; $i < 20 - $jmlAll; $i++) {
			$worksheet->removeRow(($worksheet->getHighestRow()) - $gapBetweenHighestRowAndLastName, 4);
		}

		/**
		 * Fix missing bottom border on column C on last name
		 *
		 * References :
		 *  https://phpspreadsheet.readthedocs.io/en/latest/topics/recipes/
		 *  Styles -> Formatting Cells
		 *
		 */
		$worksheet->getStyle('C' . strval($worksheet->getHighestRow() - 11))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');

		// Save as File
		$writer->save('docs/' . $tmp_tanda_terima_filename);
		// !SECTION

		/** SECTION [ Generate Rincian (Luar Daerah dan Luar Provinsi) ]
		 * ##################################################################################################
		 */

		$tmp_rincian_filename = "RINCIAN-" . $idSubmit . ".xls";

		// SECTION TEMPLATE SELECTION
		if ($spcTitleAmount > 0 || $politicalTitleAmount > 0) {
			if ($typeOfPerjadin == ISLD) {
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LD_W_REP.xlsx');
			} else if ($typeOfPerjadin == ISLP) {
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_TANDA_TERIMA_LP_W_REP.xlsx');
			}
		} else {
			if ($typeOfPerjadin == ISLD) {
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_RINCIAN_LD_REWORK.xlsx');
			} else if ($typeOfPerjadin == ISLP) {
				// Check if Jenis Transport PP sama
				if ($jenisTransportasi == 1) {

					// ANCHOR Mobil Pribadi
					if ($modaTransportasi == 1) {
						$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_RINCIAN_LP_MOBIL_PRIBADI.xlsx');

						// ANCHOR Sewa Kendaraan
					} else if ($modaTransportasi == 2) {
						$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_RINCIAN_LP_SEWA_KENDARAAN.xlsx');

						// ANCHOR Bus
					} else if ($modaTransportasi == 3) {
						$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/TMP_RINCIAN_LP_BUS.xlsx');
					}
				}

			}
		}
		// !SECTION

		$worksheet = $spreadsheet->getActiveSheet();

		/** STATIC COORDINATES These values coordinate wont changes
		 *
		 * These values coordinate wont changes
		 */
		// Nomor Surat
		$worksheet->getCell('D9')->setValue(' 094/            /35.07.' . $kodeBagian . '/' . $tahun);

		// Nama nip dll
		$worksheet->getCell('F11')->setValue($nama_processed[0]);
		$worksheet->getCell('F12')->setValue("'" . $nip_processed[0]);
		$worksheet->getCell('F13')->setValue($pan_processed[0] . '/' . $gol_processed[0]);
		$worksheet->getCell('F14')->setValue($jab_processed[0]);

		// If $durasiTanpaHari > 1
		if ($durasiTanpaHari > 1) {
			$maksudPerjalananDinas =
				"Biaya Perjalanan Dinas Biasa dalam rangka " . $acara .
				" yang dilaksanakan pada hari " . $namaHari .
				" tanggal " . $tanggalBerangkat . " s/d hari " . $namaHariSampai . " tanggal " . $tanggalKembali .
				" bertempat di " . $lokasi . " " . $kotaKecamatan;
		} else {
			$maksudPerjalananDinas =
				"Biaya Perjalanan Dinas Biasa dalam rangka " . $acara .
				" yang dilaksanakan pada hari " . $namaHari .
				" tanggal " . $tanggalBerangkat .
				" bertempat di " . $lokasi . " " . $kotaKecamatan;
		}

		// Acara
		$worksheet->getCell('F15')->setValue($maksudPerjalananDinas);

		// Set row height
		$worksheet->getRowDimension('15')->setRowHeight(60);

		// Acara
		$worksheet->getCell('F16')->setValue('Angkutan Darat');

		// tujuan
		$worksheet->getCell('F17')->setValue('Malang - ' . $kotaKecamatan);
		$worksheet->getCell('F18')->setValue($kotaKecamatan . ' - Malang');

		// durasi (terbilang) hari
		$worksheet->getCell('F19')->setValue($durasiTanpaHari . ' (' . $durasiTerbilang . ') hari');

		// tanggal berangkat
		$worksheet->getCell('F20')->setValue($tanggalBerangkat);
		$worksheet->getCell('F21')->setValue($tanggalKembali);
		//

		/**
		 * DYNAMIC COORDINATES
		 *
		 * These coordinates changes whether there are < 3 people in this trip.
		 */
		$rincianHighestRow = $worksheet->getHighestRow();

		$startingCoordinateForRincianBiaya = strval($rincianHighestRow - 26);

		$startingCoordinateForRincianBiaya_Bus = strval($rincianHighestRow - 30);

		/**
		 * Get people data for cell pengikut:
		 *  - nama, nip, pangkat, golongan, and jabatan
		 *
		 */
		if ($jmlAll <= 3) {
			for ($indexRincian = 1; $indexRincian < $jmlAll; $indexRincian++) {
				$pengikutAll = "" . $indexRincian .
					". Nama           : " . $nama_processed[$indexRincian] .
					"\n    NIP              : '" . $nip_processed[$indexRincian] .
					"\n    Pangkat/Gol : " . $pan_processed[$indexRincian] . '/' . $gol_processed[$indexRincian] .
					"\n    Jabatan        : " . $jab_processed[$indexRincian] . "\n";

				$worksheet->getCell('F' . strval(21 + $indexRincian))->setValue($pengikutAll);
				$worksheet->getStyle('F' . strval(21 + $indexRincian))->getAlignment()->setWrapText(true);
			}
		} else {
			$worksheet->getCell('F' . strval(22))->setValue("TERLAMPIR");
			$worksheet->getRowDimension('22')->setRowHeight(12);

			$worksheet->getStyle('A' . strval(23))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$worksheet->getStyle('B' . strval(23))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$worksheet->getStyle('C' . strval(23))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$worksheet->getStyle('D' . strval(23))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$worksheet->getStyle('E' . strval(23))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			// $worksheet->getStyle('F'.strval(22))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		}

		// ANCHOR ISLD
		if ($typeOfPerjadin == ISLD) {
			// Pimpinan Perjadin
			// Jabatan Pimpinan
			$worksheet->getCell('B' . strval($startingCoordinateForRincianBiaya))->setValue('1. ' . $jab_processed[0]);

			// Uang harian
			$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 1))->setValue($nominalUh);
			$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 1))->setValue($durasiTanpaHari);

			// Biaya BBM
			$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 2))->setValue($nominalBBM);

			// Biaya E-Toll
			$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 3))->setValue($nominalEToll);

			if ($nominalPenginapanPerHari > 0) {
				// Biaya Penginapan
				$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 4))->setValue($nominalPenginapanPerHari);
				$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 4))->setValue($durasiTanpaHari - 1);
			} else {
				$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 4))->setValue(0);
				$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 4))->setValue(0);
			}
			//

			// Pengikut Perjadin
			// Uang harian
			$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 7))->setValue($nominalUh);
			$worksheet->getCell('H' . strval($startingCoordinateForRincianBiaya + 7))->setValue(($jmlAll - 1));
			$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 7))->setValue($durasiTanpaHari);

			// Penginapan
			$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 8))->setValue($nominalPenginapanPerHari);
			$worksheet->getCell('H' . strval($startingCoordinateForRincianBiaya + 8))->setValue(($jmlAll - 1));
			$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 8))->setValue($durasiTanpaHari - 1);
			//

			// SECTION ISLP
		} else if ($typeOfPerjadin == ISLP) {

			if ($jenisTransportasi == 1) {
				// ANCHOR Mobil Pribadi
				if ($modaTransportasi == 1) {
					// Pimpinan Perjadin
					// Jabatan Pimpinan
					$worksheet->getCell('B' . strval($startingCoordinateForRincianBiaya))->setValue('1. ' . $jab_processed[0]);

					// Uang harian
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 1))->setValue($nominalUh);
					$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 1))->setValue($durasiTanpaHari);

					// Biaya BBM
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 2))->setValue($this->getDataFrom('moda-transportasi-input-sama-mobil-pribadi-bbm'));

					// Biaya E-Toll
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 3))->setValue($this->getDataFrom('moda-transportasi-input-sama-mobil-pribadi-etoll'));

					if ($nominalPenginapanPerHari > 0) {
						// Biaya Penginapan
						$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 4))->setValue($nominalPenginapanPerHari);
						$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 4))->setValue($durasiTanpaHari - 1);
					} else {
						$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 4))->setValue(0);
						$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 4))->setValue(0);
					}
					//

					// Pengikut Perjadin
					// Uang harian
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 7))->setValue($nominalUh);
					$worksheet->getCell('H' . strval($startingCoordinateForRincianBiaya + 7))->setValue(($jmlAll - 1));
					$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 7))->setValue($durasiTanpaHari);

					// Penginapan
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 8))->setValue($nominalPenginapanPerHari);
					$worksheet->getCell('H' . strval($startingCoordinateForRincianBiaya + 8))->setValue(($jmlAll - 1));
					$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 8))->setValue($durasiTanpaHari - 1);

					// ANCHOR Sewa Kendaraan
				} else if ($modaTransportasi == 2) {
					// Pimpinan Perjadin
					// Jabatan Pimpinan
					$worksheet->getCell('B' . strval($startingCoordinateForRincianBiaya))->setValue('1. ' . $jab_processed[0]);

					// Uang harian
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 1))->setValue($nominalUh);
					$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 1))->setValue($durasiTanpaHari);

					// Biaya BBM
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 2))->setValue($this->getDataFrom('moda-transportasi-input-sama-sewa-kendaraan-biaya-sewa'));

					// Biaya E-Toll
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 3))->setValue($this->getDataFrom('moda-transportasi-input-sama-sewa-kendaraan-etoll'));

					if ($nominalPenginapanPerHari > 0) {
						// Biaya Penginapan
						$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 4))->setValue($nominalPenginapanPerHari);
						$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 4))->setValue($durasiTanpaHari - 1);
					} else {
						$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 4))->setValue(0);
						$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 4))->setValue(0);
					}
					//

					// Pengikut Perjadin
					// Uang harian
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 7))->setValue($nominalUh);
					$worksheet->getCell('H' . strval($startingCoordinateForRincianBiaya + 7))->setValue(($jmlAll - 1));
					$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 7))->setValue($durasiTanpaHari);

					// Penginapan
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya + 8))->setValue($nominalPenginapanPerHari);
					$worksheet->getCell('H' . strval($startingCoordinateForRincianBiaya + 8))->setValue(($jmlAll - 1));
					$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya + 8))->setValue($durasiTanpaHari - 1);
					//

					// ANCHOR Bus
				} else if ($modaTransportasi == 3) {
					// Pimpinan Perjadin
					// Jabatan Pimpinan
					$worksheet->getCell('B' . strval($startingCoordinateForRincianBiaya_Bus))->setValue('1. ' . $jab_processed[0]);

					// Uang harian
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 1))->setValue($nominalUh);
					$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya_Bus + 1))->setValue($durasiTanpaHari);

					// Biaya Taksi Lumpsum
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 2))->setValue($this->getDataFrom('moda-transportasi-input-sama-taksi-berangkat-lumpsum') + $this->getDataFrom('moda-transportasi-input-sama-taksi-pulang-lumpsum'));

					// Biaya Taksi At Cost
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 3))->setValue($this->getDataFrom('moda-transportasi-input-sama-taksi-berangkat-atcost') + $this->getDataFrom('moda-transportasi-input-sama-taksi-pulang-atcost'));

					// Biaya Transportasi
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 4))->setValue($this->getDataFrom('moda-transportasi-input-sama-bus-berangkat') + $this->getDataFrom('moda-transportasi-input-sama-bus-pulang'));

					if ($nominalPenginapanPerHari > 0) {
						// Biaya Penginapan
						$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 5))->setValue($nominalPenginapanPerHari);
						$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya_Bus + 5))->setValue($durasiTanpaHari - 1);
					} else {
						$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 5))->setValue(0);
						$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya_Bus + 5))->setValue(0);
					}
					//

					// Pengikut Perjadin
					// Uang harian
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 8))->setValue($nominalUh);
					$worksheet->getCell('H' . strval($startingCoordinateForRincianBiaya_Bus + 8))->setValue(($jmlAll - 1));
					$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya_Bus + 8))->setValue($durasiTanpaHari);

					// Biaya Taksi Lumpsum
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 9))->setValue($this->getDataFrom('moda-transportasi-input-sama-taksi-berangkat-lumpsum') + $this->getDataFrom('moda-transportasi-input-sama-taksi-pulang-lumpsum'));

					// Biaya Taksi At Cost
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 10))->setValue($this->getDataFrom('moda-transportasi-input-sama-taksi-berangkat-atcost') + $this->getDataFrom('moda-transportasi-input-sama-taksi-pulang-atcost'));

					// Biaya Transportasi
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 11))->setValue($this->getDataFrom('moda-transportasi-input-sama-bus-berangkat') + $this->getDataFrom('moda-transportasi-input-sama-bus-pulang'));

					// Penginapan
					$worksheet->getCell('F' . strval($startingCoordinateForRincianBiaya_Bus + 12))->setValue($nominalPenginapanPerHari);
					$worksheet->getCell('H' . strval($startingCoordinateForRincianBiaya_Bus + 12))->setValue(($jmlAll - 1));
					$worksheet->getCell('K' . strval($startingCoordinateForRincianBiaya_Bus + 12))->setValue($durasiTanpaHari - 1);
					//
				}
			}
		}
		// !SECTION

		// Tanggal, bulan, tahun.
		$worksheet->getCell('F' . strval($rincianHighestRow - 10))->setValue('Malang,                                  ' . $namaBulan . ' ' . $tahun);
		$worksheet->getRowDimension(strval($rincianHighestRow - 12))->setRowHeight(27.75);


		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
		//
		$writer->save('docs/' . $tmp_rincian_filename);
		// !SECTION

		// !SECTION END OF GENERATE DOCUMENTS

		/**
		 * SECTION Prepare for database Insert
		 * ANCHOR [Prepare for database Insert]
		 *
		 * This section prepare data that will be recorded inside several table in the database.
		 * This section format the data such as :
		 *
		 *      customVariableName = [
		 *          "nameOfColumnInTable" => variable than contain the value to be recorded (from [CollectData] section),
		 *          ...
		 *      ]
		 */
		// Prepare for database Insert
		// Insert Into Database - RECAP_GI
		$generalInformation = [
			"idSubmit"      => $idSubmit,
			"idKegiatan"    => $idKegiatan,
			"idSubKegiatan" => $idSubKegiatan,
			"idKategori"    => $typeOfPerjadin,
			"idStatus"      => $idStatus,
		];
		//

		// Insert into Database - recap_dur
		$dateInformation = [
			"idSubmit" => $idSubmit,

			"dateSorter"       => $dateSorter,
			"tanggalBerangkat" => $tanggalBerangkat,
			"tanggalKembali"   => $tanggalKembali,
			"durasiTanpaHari"  => $durasiTanpaHari,
			"durasiDenganHari" => $durasiDenganHari,
			"durasiTerbilang"  => $durasiTerbilang,
			"namaHari"         => $namaHari,
			"namaBulan"        => $namaBulan,
			"tahun"            => $tahun,
		];
		//

		// Insert into Database - recap_dest
		$destinationInformation = [
			"idSubmit" => $idSubmit,

			"nomorSurat"    => $nomorSuratTugas,
			"dasarSurat"    => $dasarSurat,
			"lokasi"        => $lokasi,
			"kotaKecamatan" => $kotaKecamatan,
			"acara"         => $acara,
		];
		//

		// Insert into Database - recap_money_details
		$moneyInformation = [
			"idSubmit" => $idSubmit,

			"isIt8Hours"            => $apakah8jam,
			"nominalUh"             => $nominalUh,
			"nominalUt"             => $nominalUt,
			"nominalUhAll"          => $nominalUhAll,
			"nominalUhAllTerbilang" => $nominalUhAllTerbilang,
			"nominalUtAll"          => $nominalUtAll,
			"nominalUtAllTerbilang" => $nominalUtAllTerbilang,
			"nominalRep"            => $nominalRep,
			"nominalRepTerbilang"   => $nominalRepTerbilang,
			"nominalGtAll"          => $nominalGtAll,
			"nominalGtAllTerbilang" => $nominalGtAllTerbilang,
		];
		//

		// Insert into Database - recap_peg
		$pegawaiInformation = [
			"idSubmit" => $idSubmit,
			"namaAll"  => $namaAll,
			"nipAll"   => $nipAll,
			"golAll"   => $golAll,
			"panAll"   => $panAll,
			"jabAll"   => $jabAll,
			"eslAll"   => $eslAll,
			"jmlAll"   => $jmlAll,
		];
		//

		// Insert into Database - assoc idbagian
		$assocBag = [
			"idSubmit" => $idSubmit,
			"idBagian" => $idBag,
		];
		//
		//

		/**
		 * ANCHOR [Insert to Database using Transactions]
		 *
		 * This section execute an process for insert data to the database.
		 * In this section we use transaction to make sure all data is inserted properly.
		 *
		 * By default CodeIgniter runs all transactions in Strict Mode.
		 * When strict mode is enabled, if you are running multiple groups of transactions,
		 * if one group fails all groups will be rolled back
		 *
		 * $this->db->insert("nameOfTableInDatabase", customVariableName (From Prepare for database Insert section));
		 *
		 */
		// Insert to Database using Transactions

		// start the transaction
		$this->db->trans_start();

		// List of query that running in this transaction
		$this->db->insert(RECAP_GI, $generalInformation);
		$this->db->insert(RECAP_DUR, $dateInformation);
		$this->db->insert(RECAP_DEST, $destinationInformation);
		$this->db->insert(RECAP_MON, $moneyInformation);
		$this->db->insert(RECAP_PEG, $pegawaiInformation);
		$this->db->insert(RECAP_ASSOC_BAG, $assocBag);

		// Commit if success / rollback if failed.
		$this->db->trans_complete();

		// !SECTION

		// !SECTION END OF getValueAndInsertToDB()
	}


}
