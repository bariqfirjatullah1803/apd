
<!-- ================== -->
<!-- ANCHOR VIEW        -->
<!-- ================== -->

    <!-- ANCHOR STATUS TITIPAN | DOCUMENTATIONS
    /**
        * This part is to determine which options will be loaded for kegiatan-input inside div id="kegiatan-dropdown-input"

        If (Ya) is selected, then :
            getIsIncludedToUmumValue will be executed and kegiatan from bagian-umum will be loaded to kegiatan-input

        If (Tidak) is selected, then :
            getIsIncludedToUmumValue will be executed and kegiatan from this bagian itself will be loaded to kegiatan-input
        */
    -->
    <!-- status titipan -->
        <div id="dititipkan" class="row mb-3">
            <label for="example-text-input" class="col-sm-3 col-form-label">Dititipkan Ke Bagian Umum *</label>
            <div class="col-sm-9 mt-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radio-titip-bagian-umum" id="inline-radio-yes" value="1" onchange="getIsIncludedToUmumValue()"/>
                    <label class="form-check-label" for="inline-radio-yes">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radio-titip-bagian-umum" id="inline-radio-no" value="0" onchange="getIsIncludedToUmumValue()"/>
                    <label class="form-check-label" for="inline-radio-no">Tidak</label>
                </div>
            </div>
        </div>
    <!--  -->
    
    <!-- nomor-surat-tugas-container -->
        <div class="row mb-3">
            <label for="Nomor Surat" class="col-sm-3 col-form-label">Nomor Surat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nomor-surat-tugas-container" 
                id="nomor-surat-tugas-container" placeholder="Cukup tulis angka didalam kurung 094/(     )/35.07.xx." row >
            </div>
        </div>
    <!--  -->

    <!-- SECTION METODE INPUT -->
    <!-- ANCHOR METODE INPUT | DOCUMENTATIONS
        
    /**
        * This part is to determine which biaya input form will be used.
        If (Pilih dari Dropdown) is selected, then :
            getPrefferedInputMethod will be executed and div id="kegiatan-manual-input" will be displayed

        If (Input Manual) is selected, then :
            getPrefferedInputMethod will be executed and div id="kegiatan-dropdown-input" will be displayed
        */
    -->
    <!-- metode input -->
        <div id="dititipkan" class="row mb-3">
            <label for="example-text-input" class="col-sm-3 col-form-label">Metode Input Kode dan nama Kegiatan *</label>
            <div class="col-sm-9 mt-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radio-metode-input" id="inline-radio-dropdown-input" value="dropdown" onchange="getPrefferedInputMethod()"/>
                    <label class="form-check-label" for="inline-radio-dropdown-input">Pilih dari Dropdown</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radio-metode-input" id="inline-radio-manual-input" value="manual" onchange="getPrefferedInputMethod()"/>
                    <label class="form-check-label" for="inline-radio-manual-input">Input Manual</label>
                </div>
            </div>
        </div>
        <div id="dititipkan" class="row mb-3">
            <label for="example-text-input" class="col-sm-12 col-form-label">
                Gunakan metode input manual apabila kegiatan/subkegiatan tidak keluar ketika menggunakan menu dropdown.<br>
                Kode kegiatan dan sub kegiatan bisa dilihat di menu <a href="<?= base_url(); ?>C_kode_sipd">Data Acuan -> Kode SIPD</a>
            </label>
        </div>
    <!--  -->

    <!-- ANCHOR KEGIATAN MANUAL INPUT | DOCUMENTATIONS
    /**
        * This part is displayed when (Input Manual) is selected from metode input
            In this div, there are 4 input, each with its on onchange function that will triggered when a change is detected.

                - kode-kegiatan-user-input -> onChangeKodeKegiatanManualInput()
                    What onChangeKodeKegiatanManualInput does:
                        store value from 'kode-kegiatan-user-input' to 'kode-kegiatan-container'

                - nama-kegiatan-user-input -> onChangeDescKegiatanManualInput()
                    What onChangeDescKegiatanManualInput does:
                        store value from 'nama-kegiatan-user-input' to 'nama-kegiatan-container'


                - kode-sub-kegiatan-user-input -> onChangeKodeSubKegiatanManualInput()
                    What onChangeKodeSubKegiatanManualInput does:
                        store value from 'kode-sub-kegiatan-user-input' to 'kode-sub-kegiatan-container'


                - kode-sub-kegiatan-user-input -> onChangeDescSubKegiatanManualInput()
                    What onChangeDescSubKegiatanManualInput does:
                        store value from 'nama-sub-kegiatan-user-input' to 'nama-sub-kegiatan-container'

        */
    -->
    <!-- kegiatan manual input -->
        <div id="kegiatan-manual-input" style="display:none">
            <!-- @ Nama kegiatan @ Container {nama-kegiatan-container} -->
                <div id="container-kodeprogram" class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label">Kode dan nama Kegiatan</label>
                    <div class="col-sm-3"><input id="kode-kegiatan-user-input" name="kode-kegiatan-user-input" class="form-control" type="text" placeholder="4.01..." onchange="onChangeKodeKegiatanManualInput()"></div>
                    <div class="col-sm-6"><input id="nama-kegiatan-user-input" name="nama-kegiatan-user-input" class="form-control" type="text" placeholder="Deskripsi Kegiatan ..." onchange="onChangeDescKegiatanManualInput()"></div>
                </div>
            <!--  -->

            <!-- @ Nama sub kegiatan @ Container {nama-kegiatan-user-input} -->
                <div id="container-kodeprogram" class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Kode dan nama Sub Kegiatan</label>
                    <div class="col-sm-3"><input id="kode-sub-kegiatan-user-input" name="kode-sub-kegiatan-user-input" class="form-control" type="text" placeholder="4.01..." onchange="onChangeKodeSubKegiatanManualInput()"></div>
                    <div class="col-sm-6"><input id="nama-sub-kegiatan-user-input" name="nama-sub-kegiatan-user-input" class="form-control" type="text" placeholder="Deskripsi Sub kegiatan..." onchange="onChangeDescSubKegiatanManualInput()"></div>
                </div>
            <!--  -->
        </div>
    <!--  -->

    <!-- ANCHOR KEGIATAN DROPDOWN INPUT | DOCUMENTATIONS
    /**
        * This part is displayed when (Pilih dari Dropdown) is selected from metode input
            In this div, there are 2 input, each with its on onchange function that will triggered when a change is detected.

                - kode-kegiatan-input -> onChangeKodeKegiatan()
                    What onChangeKodeKegiatan does:
                        - get value from $(".kegiatan-input").val() and store it to 'nama-kegiatan-container'
                        - run ajax function to get kodekegiatan from $(".kegiatan-input").val() and store it inside kode-kegiatan-container'
                        - run ajax function to load options to sub-kegiatan-input

                - kode-sub-kegiatan-input -> onChangeKodeSubKegiatan()
                    What onChangeKodeSubKegiatan does:
                        - get value from $(".sub-kegiatan-input").val() and store it to 'nama-sub-kegiatan-container'
                        - run ajax function to get kodekegiatan from $(".sub-kegiatan-input").val() and store it inside kode-sub-kegiatan-container'

        */
    -->
    <!-- dropdown -->
        <div id="kegiatan-dropdown-input" style="display:none"> 
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-3 col-form-label">Kegiatan *</label>
                <div class="col-sm-9">
                    <select class="select2 form-control select2-multiple kegiatan-input" multiple="multiple" name="kegiatan-input" placeholder="test" id="kegiatan-input" onchange="onChangeKodeKegiatan()">

                        <option disabled>--- Pilih Dititipkan Ke Bagian Umum atau Tidak ---</option>

                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-3 col-form-label">Sub Kegiatan *</label>
                <div class="col-sm-9">
                    <select class="select2 form-control select2-multiple sub-kegiatan-input" multiple="multiple" name="sub-kegiatan-input" placeholder="test" id="sub-kegiatan-input" onchange="onChangeKodeSubKegiatan()">

                        <option disabled>--- Pilih Kegiatan ---</option>

                    </select>
                </div>
            </div>
        </div>
    <!--  -->
    <!-- !SECTION -->

    <!-- dasar-surat-container -->
        <div class="row mb-3">
            <label for="Nomor Surat" class="col-sm-3 col-form-label">Dasar Surat *</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="dasar-surat-container" id="dasar-surat-container" row required>
            </div>
        </div>
    <!--  -->

    <!-- qr : Tanggal Berangkat dan Kembali
    for data like :  
        a. 1 Juni s/d 2 juni 2022 stored inside tanggal-berangkat-kembali-container
        b. 1 hari                stored inside durasi-dengan-hari-container
        c. 1                     stored inside durasi-tanpa-hari-container
        d. satu                  stored inside durasi-terbilang-container
    -->
    <!-- Kode TanggalBerangkat dan Kembali -->
        <div id="datepicker-berangkat-kembali" class="row mb-3">
            <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal Berangkat dan Kembali *</label>
            <div class="col-sm-4 mt-2">
                <div class="input-daterange input-group" id="datepicker6" data-date-format="dd MM, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                    <input type="text" name="startDate" id="startDate" class="form-control" name="start" placeholder="Berangkat"/>
                    <input type="text" name="endDate" id="endDate" class="form-control" name="end" placeholder="Pulang"/>
                </div>
            </div>
        </div>
    <!--  -->

    <!-- SECTION ISDD's SPECIFIC VIEWS-->
    <!-- ANCHOR Lebih dari 8 jam | DOCUMENTATIONS
        /**
         * Lebih dari 8 jam

         *  Lebih dari 8 jam is used in perjadin dalam daerah 
            and will be hidden on another perjadin.

         *
         /
    -->
    <?php if($typeOfPerjadin == ISDD):?>
    <!-- qr : stored inside lebih-dari-8-jam-container -->
        <div class="row mb-3" style="">
            <label for="example-text-input" class="col-sm-3 col-form-label">Lebih dari 8 jam? *</label>
                <div class="col-sm-9 mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radio-lebih-dari-delapan-jam" id="inline-radio-lebih" value="1" onchange="getIsMoreThanEightHour()"/>
                        <label class="form-check-label" for="inline-radio-lebih">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radio-lebih-dari-delapan-jam" id="inline-radio-kurang" value="0" onchange="getIsMoreThanEightHour()"/>
                        <label class="form-check-label" for="inline-radio-kurang">Tidak</label>
                    </div>
                </div>
        </div>
    <!--  -->
    <?php endif?>
    <!-- !SECTION -->

    <!-- qr : stored inside nama-tujuan-container -->
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-3 col-form-label">Lokasi Tujuan *</label>
            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nama-tujuan-container" name="nama-tujuan-container" required></div>
        </div>
    <!--  -->

    <!-- ANCHOR MULTISELECT KOTA TUJUAN -->
    <!-- qr : stored inside kota-container -->
        <div id="kota-tujuan" style="display:" class="row mb-3">

            <!-- DOCUMENTATIONS
                /**
                * if else condition for label. 

                    if $typeOfPerjadin = ISDD (perjadin dalam daerah)
                        set label value as Kota / Kecamatan *

                    if $typeOfPerjadin = ISLD (perjadin luar daerah)
                        set label value as Kota *

                    if $typeOfPerjadin = ISLP (perjadin luar provinsi)
                        set label value as Provinsi *
                */
            -->
            <?php if ($typeOfPerjadin == ISDD) : ?>

                    <label for="example-text-input" class="col-sm-3 col-form-label">Kota / Kecamatan *</label>

                <?php elseif ($typeOfPerjadin == ISLD) : ?>

                    <label for="example-text-input" class="col-sm-3 col-form-label">Kota *</label>

                <?php elseif ($typeOfPerjadin == ISLP) : ?>

                    <label for="example-text-input" class="col-sm-3 col-form-label">Provinsi *</label>

            <?php endif ?>

            <div class="col-sm-9">
                <select class="select2 form-control select2-multiple kota-tujuan-input" multiple="multiple" name="kota-tujuan-input" placeholder="test" id="kota-tujuan-input" onchange="onChangeKotaTujuan()" required>
                <!-- DOCUMENTATIONS
                    /**
                    * if else condition for loading options. 

                        if $typeOfPerjadin = ISDD (perjadin dalam daerah)
                            load options which contain tujuan dalam daerah

                        if $typeOfPerjadin = ISLD (perjadin luar daerah)
                            load options which contain tujuan luar daerah

                        if $typeOfPerjadin = ISLP (perjadin luar provinsi)
                            load options which contain tujuan provinsi
                    */
                -->
                <?php if ($typeOfPerjadin == ISDD) : ?>

                    <?php foreach ($tujuan_dd as $tujuan) : ?>
                        <option><?= $tujuan['namaTujuan']; ?></option>
                    <?php endforeach; ?>

                <?php elseif ($typeOfPerjadin == ISLD) : ?>

                    <?php foreach ($tujuan_ld as $tujuan) : ?>
                        <option><?= $tujuan['namaTujuan']; ?></option>
                    <?php endforeach; ?>

                <?php elseif ($typeOfPerjadin == ISLP) : ?>

                    <?php foreach ($tujuan_lp as $tujuan) : ?>
                        <option><?= $tujuan['namaProvinsi']; ?></option>
                    <?php endforeach; ?>

                <?php endif ?>
                    
                </select>
            </div>
        </div>
    <!--  -->

    <!-- qr : stored inside acara-container -->
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-3 col-form-label">Acara * </label>
            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="acara-container" name="acara-container" required></div>
        </div>
    <!--  -->

    <!-- qr : 
    input id -> pegawai-input
    output stored inside nama-seluruh-pegawai-container -->
        <div id="multiselect-pegawai" class="row mb-3">
            <label for="example-text-input" class="col-sm-3 col-form-label">Data Pegawai yang Berangkat * </label>
            <div class="col-sm-9">
                <select id="pegawai-input" class="select2 form-control select2-multiple pegawai-input" multiple="multiple" onchange="onChangePegawai()" >

                    <?php foreach ($pegawaiData as $pegawaiKolom) : ?>
                        <option><?= $pegawaiKolom['namaPegawai'] ?></option>
                    <?php endforeach; ?>

                </select>

                <!-- warning that triggered if that pegawai is already done perdin on that specific date -->
                <div id="div-pernah-perdin" style="display:none">
                    <label class="form-label mt-3" id="pernah-perdin"></label>
                </div>
            </div>
        </div>
    <!--  -->

    <!-- qr : 
    input id -> penandatangan-input
    output stored inside nama-seluruh-penandatangan-container -->
        <div id="multiselect-ttd" class="row mb-3">
            <label for="example-text-input" class="col-sm-3 col-form-label">Yang Bertandatangan * </label>
            <div class="col-sm-9">
                <select id="ttd-input" class="select2 form-control select2-multiple ttd-input" multiple="multiple" onchange="onChangeTTD()" required>

                    <?php foreach ($penandatangan as $pegawaiKolom) : ?>
                        <option><?= $pegawaiKolom['namaPegawai'] ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
    <!--  -->

    <!-- SECTION ISLD's SPECIFIC VIEWS -->
    <!-- ANCHOR BBM CONTAINER -->
    <?php if ($typeOfPerjadin == ISLD):?>
        <!-- qr : stored inside {bbm-container} -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-3 col-form-label">BBM (At Cost) * </label>
                <div class="col-sm-3"><input class="form-control" type="number" placeholder="" id="bbm-input" name="bbm-input"></div>

                <!-- Placeholder for push label closer to input -->
                <label for="example-text-input" class="col-sm-1 col-form-label"></label>

                <label for="example-text-input" class="col-sm-2 col-form-label">Batasan Tertinggi</label>
                <div class="col-sm-3"><input class="form-control" readonly type="number" placeholder="" id="bbm-max" name="bbm-max"></div>
            </div>
        <!--  -->

        <!-- ANCHOR BIAYA-TOL -->
        <!-- qr : stored inside {biaya-tol-container} -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-3 col-form-label">Biaya Tol (At Cost) * </label>
                <div class="col-sm-3"><input class="form-control" type="number" placeholder="" id="biaya-tol-input" name="biaya-tol-input"></div>
            </div>
        <!--  -->

    <?php endif ?>

    <?php if ($typeOfPerjadin == ISLD || $typeOfPerjadin == ISLP):?>
        <!-- SECTION PENGINAPAN -->
            <!-- ANCHOR PENGINAPAN | DOCUMENTATIONS
                /**
                * This part is to determine which biaya penginapan input form will be used.
                    If Biaya Penginapan sama semua untuk seluruh Pegawai is selected, then {simple one} will be used
                    If Biaya Penginapan tidak sama untuk seluruh Pegawai is selected, then {detailed one} will be used
                */
            -->
            <!--  -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label">Biaya Penginapan * </label>
                    <div class="col-sm-9 mt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radio-biaya-penginapan" id="inline-radio-biaya-sama" value="1" onchange="setDisplayForBiayaPenginapanInput()"/>
                            <label class="form-check-label" for="inline-radio-biaya-sama">Biaya Penginapan setara untuk seluruh Pegawai</label>
                        </div>
                        <div class="form-check form-check-inline" id="tooltip-container">
                            <input  disabled 
                                    class="form-check-input" type="radio" name="radio-biaya-penginapan" id="inline-radio-biaya-tidak-sama" value="0" onchange="setDisplayForBiayaPenginapanInput()"/>
                            <label  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Menu ini belum bisa digunakan"
                                    class="form-check-label" for="inline-radio-biaya-tidak-sama">Biaya Penginapan tidak setara untuk seluruh Pegawai</label>
                        </div>
                    </div>
                </div>

            <!--  -->

            <!-- ANCHOR penginapan-setara -->
                <div id="penginapan-setara" class="row mb-3" style="display:none">
                    <label for="example-text-input" class="col-sm-3 col-form-label">Biaya penginapan per malam (At Cost) * </label>
                    <div class="col-sm-3"><input class="form-control" type="number" placeholder="" id="penginapan-biaya-per-malam-input" name="penginapan-biaya-per-malam-input"></div>

                    <!-- Placeholder for push label closer to input -->
                    <label for="example-text-input" class="col-sm-1 col-form-label"></label>

                    <!-- <label for="example-text-input" class="col-sm-2 col-form-label">Durasi Menginap  * </label>
                    <div class="col-sm-3"><input class="form-control" type="number" placeholder="" id="penginapan-durasi-menginap-input" name="penginapan-durasi-menginap-input"></div> -->
                </div>
            <!--  -->

            <!-- ANCHOR penginapan-tidak-setara -->
                <div id="penginapan-tidak-setara" class="row mb-3" style="display:none">
                    <div id="accordion" class="custom-accordion">
                        <div class="card mb-1 shadow-none">
                            <a href="#penginapan-accordion-collapse" class="text-dark" data-bs-toggle="collapse" aria-expanded="true" aria-controls="penginapan-accordion-collapse">
                                <div class="card-header" id="headingOne">
                                    <h6 class="m-0" id="pegawai_01">
                                        Detail Biaya Penginapan
                                        <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                    </h6>
                                </div>
                            </a>

                            <div id="penginapan-accordion-collapse" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">

                                <?php for ($i=1; $i <= 20; $i++):?>  
                                    <div class="mt-2 row" id="penginapan-accordion-input-<?= $i?>" style="display:">
                                        <label class="col-sm-2 col-form-label mt-2"><?= $i?>. Atas Nama </label>
                                        <div class="col-sm-6"><input readonly class="form-control mt-2" type="text" placeholder="" id="penginapan-nama-pegawai-input-<?= $i?>" name="penginapan-nama-pegawai-input-<?= $i?>"></div>
                                        
                                        <!-- <label class="col-sm-2 col-form-label" style="visibility: ">Id Pegawai </label>
                                        <div class="col-sm-2"><input readonly class="form-control" type="text" style="visibility: " id="penginapan-id-pegawai-input-<?= $i?>" name="penginapan-id-pegawai-input-<?= $i?>"></div> -->
                                        
                                        <label class="col-sm-2 col-form-label">Biaya penginapan per malam (At Cost) * </label>
                                        <div class="col-sm-2"><input class="form-control mt-2" type="number" placeholder="" id="penginapan-biaya-per-malam-input-<?= $i?>" name="penginapan-biaya-per-malam-input-<?= $i?>" onchange="calculateSubTotalPenginapan()"></div>

                                        <!-- <label class="col-sm-2 col-form-label mt-3">Durasi Menginap * </label>
                                        <div class="col-sm-2"><input class="form-control mt-3" type="number" placeholder="" id="penginapan-durasi-menginap-input-<?= $i?>" name="penginapan-durasi-menginap-input-<?= $i?>" onchange="calculateSubTotalPenginapan()"></div>

                                        <label class="col-sm-2 col-form-label mt-3">Total </label>
                                        <div class="col-sm-2"><input readonly class="form-control mt-3" type="number" placeholder="" id="penginapan-total-biaya-input-<?= $i?>" name="penginapan-total-biaya-input-<?= $i?>"></div> -->
                                    </div>
                                <?php endfor; ?>
                                
                            </div>
                        </div>
                    </div>
                        
                    </div>
            <!--  -->
        <!-- !SECTION -->

    <?php endif ?>
    <!-- !SECTION -->
    
    <!-- qr : stored inside nominal-rep-container -->
        <div class="row mb-3" style="display:none">
            <label for="example-text-input" class="col-sm-3 col-form-label">Uang rep</label>
            <div class="col-sm-9"><input class="form-control" type="text" readonly placeholder="" id="nominal-rep-container" name="nominal-rep-container"></div>
        </div>
    <!--  -->

    <!-- SECTION ISLP's SPECIFIC VIEWS -->
    <?php if ($typeOfPerjadin == ISLP):?>
        <!-- ANCHOR RadioButton Transport | DOCUMENTATIONS
                /**
                * This part is to determine which transportation input form will be used.
                */
            -->
            <!--  -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-3 col-form-label">Jenis Transportasi yang Digunakan * </label>
                <div class="col-sm-9 mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radio-jenis-transportasi" id="inline-radio-jenis-transportasi-sama" value="1" onchange="setDisplayForTransportationInput()"/>
                        <label class="form-check-label" for="inline-radio-jenis-transportasi-sama">Jenis Transportasi yang digunakan <b> sama </b> untuk berangkat dan kembali (PP)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radio-jenis-transportasi" id="inline-radio-jenis-transportasi-tidak-sama" value="0" onchange="setDisplayForTransportationInput()"/>
                        <label class="form-check-label" for="inline-radio-jenis-transportasi-tidak-sama">Jenis Transportasi yang digunakan <b> tidak sama </b> untuk berangkat dan kembali</label>
                    </div>
                </div>
            </div>
        <!--  -->

        <!-- SECTION TRANSPORT SAMA -->
            <!-- ANCHOR Multiselect Transport PP-->
                <div id="div-moda-transportasi-input-sama" class="row mb-3" style="display:none">
                    <label for="" class="col-sm-3 col-form-label">Alat Transportasi yang digunakan (PP) *</label>
                    <div class="col-sm-9">
                        <select class="select2 form-control select2-multiple moda-transportasi-input-sama" multiple="multiple" name="moda-transportasi-input-sama" placeholder="test" id="moda-transportasi-input-sama" 
                        onchange="onChangeTransportation()">

                        <option value='1'>Mobil Pribadi</option>
                        <option value='2'>Sewa Kendaraan</option>
                        <option value='3'>Bus</option>
                        <option value='4'>Kapal</option>
                        <option value='5'>Kereta</option>
                        <option value='6'>Pesawat</option>

                        </select>
                    </div>
                </div>

                <!-- SECTION MOBIL PRIBADI -->
                    <div id="div-moda-transportasi-input-sama-mobil-pribadi" style="display:none">
                        <div class="row mb-3">
                            <!-- ANCHOR BBM -->
                            <label for="example-text-input" class="col-sm-3 col-form-label">BBM</label>
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-mobil-pribadi-bbm" name="moda-transportasi-input-sama-mobil-pribadi-bbm"></div>
                        </div>
                        <div class="row mb-3">
                            <!-- ANCHOR E-TOLL -->
                            <label for="example-text-input" class="col-sm-3 col-form-label">E-Toll</label>
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-mobil-pribadi-etoll" name="moda-transportasi-input-sama-mobil-pribadi-etoll"></div>
                        </div>
                    </div>
                <!-- !SECTION -->

                <!-- SECTION SEWA KENDARAAN -->
                    <div id="div-moda-transportasi-input-sama-sewa-kendaraan" style="display:none">
                        <div class="row mb-3">
                            <!-- ANCHOR BIAYA SEWA -->
                            <label for="example-text-input" class="col-sm-3 col-form-label">Biaya Sewa</label>
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-sewa-kendaraan-biaya-sewa" name="moda-transportasi-input-sama-sewa-kendaraan-biaya-sewa"></div>
                        </div>
                        <div class="row mb-3">
                            <!-- ANCHOR E-TOLL -->
                            <label for="example-text-input" class="col-sm-3 col-form-label">E-Toll</label>
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-sewa-kendaraan-etoll" name="moda-transportasi-input-sama-sewa-kendaraan-etoll"></div>
                        </div>
                    </div>
                <!-- !SECTION -->

                <!-- SECTION BUS -->
                    <div id="div-moda-transportasi-input-sama-bus" style="display:none">

                        <div class="row mb-3">
                            <!-- ANCHOR Tiket Berangkat Bus -->
                            <label for="example-text-input" class="col-sm-3 col-form-label mt-2">Harga Tiket Berangkat (At Cost)*</label>
                            <div class="col-sm-3 mt-2"><input class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-bus-berangkat" name="moda-transportasi-input-sama-bus-berangkat"></div>

                            <!-- ANCHOR Taksi Berangkat Lumpsum -->
                            <label for="example-text-input" class="col-sm-3 col-form-label">Taksi di Provinsi Keberangkatan (Lumpsum max 2x)*</label>
                            <div class="col-sm-3 mt-2"><input readonly class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-taksi-berangkat-lumpsum" name="moda-transportasi-input-sama-taksi-berangkat-lumpsum"></div>
                        </div>
                        <div class="row mb-3">
                            <!-- ANCHOR Tiket Pulang Bus -->
                            <label for="example-text-input" class="col-sm-3 col-form-label mt-2">Harga Tiket Pulang (At Cost)*</label>
                            <div class="col-sm-3 mt-2"><input class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-bus-pulang" name="moda-transportasi-input-sama-bus-pulang"></div>

                            <!-- ANCHOR Taksi Pulang Lumpsum -->
                            <label for="example-text-input" class="col-sm-3 col-form-label">Taksi di Provinsi Tujuan (Lumpsum max 2x)*</label>
                            <div class="col-sm-3 mt-2"><input readonly class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-taksi-pulang-lumpsum" name="moda-transportasi-input-sama-taksi-pulang-lumpsum"></div>
                        </div>
                        <div class="row mb-1">
                            <!-- ANCHOR Taksi Berangkat AtCost -->
                            <label for="example-text-input" class="col-sm-3 col-form-label">Taksi di Provinsi Keberangkatan <br>(At Cost, max 1x)*</label>
                            <div class="col-sm-3 mt-2"><input class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-taksi-berangkat-atcost" name="moda-transportasi-input-sama-taksi-berangkat-atcost"></div>
                        </div>
                        <div class="row mb-1">
                            <!-- ANCHOR Taksi Pulang AtCost -->
                            <label for="example-text-input" class="col-sm-3 col-form-label">Taksi di Provinsi Tujuan <br>(At Cost, max 1x)*</label>
                            <div class="col-sm-3 mt-2"><input class="form-control" type="text" placeholder="" id="moda-transportasi-input-sama-taksi-pulang-atcost" name="moda-transportasi-input-sama-taksi-pulang-atcost"></div>
                        </div>
                    </div>
                <!-- !SECTION -->

        <!-- !SECTION -->


        <?php endif ?>
    <!-- !SECTION -->

    <!-- qr : run all function inside {startProcessing()} 
    id : {konfirmasi-input}-->

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-3 col-form-label">Apakah data yang dimasukkan sudah benar? * </label>
            <div class="col-sm-9">
                <div class="form-check mb-3 mt-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" onchange="startProcessing()" required>
                    <label class="form-check-label" for="flexCheckDefault">
                        Data yang dimasukkan sudah benar.
                    </label>
                </div>
            </div>
        </div>
    <!--  -->

    <!-- ======================================= -->
    <!-- ANCHOR BUTTONS                          -->
    <!-- ======================================= -->

    <div>
        <button class="btn btn-primary float-right" type="submit" id="btnSubmitDatabase">Submit form</button>
    </div>
    <!--  -->

                