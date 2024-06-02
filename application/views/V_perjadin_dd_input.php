<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Form Perjalanan Dinas Dalam Daerah</h4>
                <p class="card-title-desc">Isi data-data dibawah untuk membuat dokumen Perjalanan Dinas Dalam Daerah</p>

                <form action="<?= base_url(); ?>C_perjadin_dd/tambahData" method="post" autocomplete="off">
                <!-- ================== -->
                <!-- ANCHOR VIEW        -->
                <!-- ================== -->

                    <!-- {status titipan} -->
                        <div id="kota-tujuan" style="display:" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Dititipkan Ke Bagian Umum *</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control select2-multiple status-titipan-input" multiple="multiple" name="status-titipan-input" placeholder="test" id="status-titipan-input" onChange="onChangeStatusTitipan()" required>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>
                        </div>
                    <!--  -->
                    
                    <!-- {nomor-surat-tugas-container} -->
                        <div class="row mb-3">
                            <label for="Nomor Surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nomor-surat-tugas-container" 
                                id="nomor-surat-tugas-container" placeholder="Cukup tulis angka didalam kurung 094/(     )/35.07.xx." row >
                            </div>
                        </div>
                    <!--  -->

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

                    <!-- {multi select kegiatan} -->
                        <!-- <div id="kota-tujuan" style="display:" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Kegiatan *</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control select2-multiple kegiatan-input" multiple="multiple" name="kegiatan-input" placeholder="test" id="kegiatan-input" onChange="onChangeKegiatan()" required>

                                    <option disabled>--- Pilih Dititipkan Ke Bagian Umum atau Tidak ---</option>

                                </select>
                            </div>
                        </div> -->
                    <!--  -->

                    <!-- qr : stored inside {sub kegiatan} -->
                        <!-- <div id="kota-tujuan" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Sub Kegiatan *</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control select2-multiple sub-kegiatan-input" multiple="multiple" name="sub-kegiatan-input" placeholder="test" id="sub-kegiatan-input" onchange="onChangeSubKegiatan()" required>

                                    <option disabled>--- Pilih Kegiatan ---</option>

                                </select>
                            </div>
                        </div> -->
                    <!--  -->

                    <!-- {dasar-surat-container} -->
                        <div class="row mb-3">
                            <label for="Nomor Surat" class="col-sm-3 col-form-label">Dasar Surat *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="dasar-surat-container" id="dasar-surat-container" row required>
                            </div>
                        </div>
                    <!--  -->

                    <!-- qr : {Tanggal Berangkat dan Kembali}
                    for data like :  
                        a. {1 Juni s/d 2 juni 2022} stored inside {tanggal-berangkat-kembali-container}
                        b. {1 hari}                 stored inside {durasi-dengan-hari-container}
                        c. {1}                      stored inside {durasi-tanpa-hari-container}
                        d. {satu}                   stored inside {durasi-terbilang-container}
                    -->
                    <!-- {Kode Tanggal Berangkat dan Kembali} -->
                        <div id="datepicker-berangkat-kembali" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal Berangkat dan Kembali *</label>
                            <div class="col-sm-4">
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="dd MM, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                    <input type="text" name="startDate" id="startDate" class="form-control" name="start" placeholder="Berangkat"/>
                                    <input type="text" name="endDate" id="endDate" class="form-control" name="end" placeholder="Pulang"/>
                                </div>
                            </div>
                        </div>
                    <!--  -->

                    <!-- qr : stored inside {lebih-dari-8-jam-container} -->
                        <div class="row mb-3" style="">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Lebih dari 8 jam? *</label>
                            <div class="col-sm-3"><input onchange="determineUH()" id="lebih-dari-8-jam-input" name="lebih-dari-8-jam-input" class="form-control" type="text" placeholder="Ketik 'Ya' atau 'Tidak'" ></div>
                        </div>
                    <!--  -->

                    <!-- qr : stored inside {nama-tujuan-container} -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Lokasi Tujuan *</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nama-tujuan-container" name="nama-tujuan-container" required></div>
                        </div>
                    <!--  -->

                    <!-- qr : stored inside {kota-container} -->
                        <div id="kota-tujuan" style="display:" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Kota / Kecamatan *</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control select2-multiple kota-tujuan-input" multiple="multiple" name="kota-tujuan-input" placeholder="test" id="kota-tujuan-input" onchange="onChangeKotaTujuan()" required>

                                    <?php foreach ($tujuan_dd as $tujuan_dd) : ?>
                                        <option><?= $tujuan_dd['namaTujuan']; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                    <!--  -->

                    <!-- qr : stored inside {acara-container} -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Acara * </label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="acara-container" name="acara-container" required></div>
                        </div>
                    <!--  -->

                    <!-- qr : 
                    input id -> {pegawai-input}
                    output stored inside {nama-seluruh-pegawai-container} -->
                        <div id="multiselect-pegawai" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Data Pegawai yang Berangkat * </label>
                            <div class="col-sm-9">
                                <select id="pegawai-input" class="select2 form-control select2-multiple pegawai-input" multiple="multiple" onchange="onChangePegawai()" >

                                    <?php foreach ($pegawaiData as $pegawaiKolom) : ?>
                                        <option><?= $pegawaiKolom['namaPegawai'] ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <!-- {warning that triggered if that pegawai is already done perdin on that specific date} -->
                                <!-- NOTE : {Try to set this to display:non then trigger the display:"" when its triggered} -->
                                <label class="form-label mt-3" id="pernah-perdin"></label>
                            </div>
                        </div>
                    <!--  -->

                    <!-- qr : 
                    input id -> {penandatangan-input}
                    output stored inside {nama-seluruh-penandatangan-container} -->
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
                    
                    <!-- qr : stored inside {nominal-rep-container} -->
                        <div class="row mb-3" style="display:none">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Uang rep</label>
                            <div class="col-sm-9"><input class="form-control" type="text" readonly placeholder="" id="nominal-rep-container" name="nominal-rep-container"></div>
                        </div>
                    <!--  -->

                    <!-- qr : run all function inside {startProcessing()} 
                    id : {konfirmasi-input}-->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Apakah data yang dimasukkan sudah benar? * </label>
                            <div class="col-sm-9"><input onchange="startProcessing()"  class="form-control" type="text" placeholder="Ketik 'Ya' jika data sudah benar" id="konfirmasi-input" name="konfirmasi-container" required></div>
                        </div>
                    <!--  -->

                    <!-- {start processing()} -->
                        <!-- <div id="kota-tujuan" style="display:" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Apakah data yang dimasukkan sudah benar? * </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control select2-multiple konfirmasi-input" multiple="multiple" name="konfirmasi-input" placeholder="test" id="konfirmasi-input" onchange="startProcessing()" required>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>
                        </div> -->
                    <!--  -->
                    <!--  -->

                <!-- ======================================= -->
                <!-- ANCHOR BUTTONS                          -->
                <!-- ======================================= -->

                    <div>
                        <button class="btn btn-primary float-right" type="submit" id="btnSubmitDatabase">Submit form</button>
                    </div>

                <!-- ================== -->
                <!-- ANCHOR CONTAINER   -->
                <!-- ================== -->

                    <div style="display:non">
                        <label class="col-sm-12 col-form-label alert alert-info mt-3"> Container Area </label>

                        <div style="display:non">
                        <!-- @ idbagian | index bagian | kodeKwt @ -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">idbagian-container </label>
                                    <div class="col-sm-2"><input readonly class="form-control" type="text" id="idbagian-container" name="idbagian-container" value="<?= $idBagian; ?>"></div>
                                <label for="example-text-input" class="col-sm-2 col-form-label">index-bagian-container </label>
                                    <div class="col-sm-2"><input readonly class="form-control" type="text" id="index-bagian-container" name="index-bagian-container" value="<?= $kodebagian; ?>"></div>
                                <label for="example-text-input" class="col-sm-2 col-form-label">kodekwt-container </label>
                                    <div class="col-sm-2"><input readonly class="form-control" type="text" id="kodekwt-container" name="kodekwt-container" value="<?= $kodekwt; ?>"></div>
                            </div>
                        <!--  -->

                        <!-- @ Status Titipan @ -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">status-container </label>
                                    <div class="col-sm-10"><input class="form-control" type="text" id="status-container" name="status-container"></div>
                            </div>
                        <!--  -->

                        <!-- @ Nomor Surat @ {Get from input above} -->

                        <!-- @ Nama kegiatan @ Container {nama-kegiatan-container} -->
                            <div id="container-kodeprogram" class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kode dan nama kegiatan</label>
                                <div class="col-sm-3"><input readonly id="kode-kegiatan-container" name="kode-kegiatan-container" class="form-control" type="text"></div>
                                <div class="col-sm-7"><input readonly id="nama-kegiatan-container" name="nama-kegiatan-container" class="form-control" type="text"></div>
                            </div>
                        <!--  -->

                        <!-- @ Nama sub kegiatan @ Container {nama-kegiatan-container} -->
                            <div id="container-kodeprogram" class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kode dan nama kegiatan</label>
                                <div class="col-sm-3"><input readonly id="kode-sub-kegiatan-container" name="kode-sub-kegiatan-container" class="form-control" type="text"></div>
                                <div class="col-sm-7"><input readonly id="nama-sub-kegiatan-container" name="nama-sub-kegiatan-container" class="form-control" type="text"></div>
                            </div>
                        <!--  -->

                        <!-- @ Dasar Surat @ {Get from input above [dasar-surat-input] } -->


                        <!-- @ Tanggal Berangkat dan Kembali @ -->

                            <label class="col-sm-12 col-form-label alert alert-info mt-3"> Date and Durations (ID) </label>

                            <!-- {Hari Bulan Date Sorter} -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Hari</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="hari-container" name="hari-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Bulan</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="bulan-container" name="bulan-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Date Sorter</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="date-sorter-container" name="date-sorter-container"></div>
                                </div>

                                <!-- Durasi : {dengan hari, tanpa hari, terbilang} -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">durasi-dengan-hari</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="durasi-dengan-hari-container" name="durasi-dengan-hari-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">durasi-tanpa-hari</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="durasi-tanpa-hari-container" name="durasi-tanpa-hari-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">durasi-terbilang</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="durasi-terbilang-container" name="durasi-terbilang-container"></div>
                                </div>

                                <!-- Tanggal : {berangkat, kembali, berangkat-kembali} -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">tanggal-berangkat</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="tanggal-berangkat-container" name="tanggal-berangkat-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">tanggal-kembali</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="tanggal-kembali-container" name="tanggal-kembali-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">tanggal-berangkat-kembali</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="tanggal-berangkat-kembali-container" name="tanggal-berangkat-kembali-container"></div>
                                </div>

                                <label class="col-sm-12 col-form-label alert alert-info mt-3"> Date and Durations (EN) </label>

                                <!-- {Hari Bulan Date Sorter} -->
                                <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">tanggal-berangkat-en</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="tanggal-berangkat-en-container" name="tanggal-berangkat-en-container"></div>
                                </div>
                        <!--  -->

                        <!-- @ Money Calculations @ -->
                            <label class="col-sm-12 col-form-label alert alert-info mt-3"> Money Calculations </label>

                                <!-- Nominal UH Basic -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-uh-container </label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="nominal-uh-container" name="nominal-uh-container"></div>
                                </div>

                                <!-- Container Kota -->
                                <div id="container-kota-top" style="display:non" class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">kota-container</label>
                                    <div class="col-sm-10"><input readonly class="form-control" type="text" id="kota-container" name="kota-container"></div>
                                </div>

                                <!-- Nominal UT Basic -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-ut-container </label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="nominal-ut-container" name="nominal-ut-container"></div>
                                </div>

                                <!-- Nominal UH All -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-uh-all-container </label>
                                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-uh-all-container" name="nominal-uh-all-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-uh-all-terbilang-container </label>
                                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-uh-all-terbilang-container" name="nominal-uh-all-terbilang-container"></div>
                                </div>

                                <!-- Nominal UT All -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-ut-all-container </label>
                                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-ut-all-container" name="nominal-ut-all-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-uh-all-terbilang-container </label>
                                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-ut-all-terbilang-container" name="nominal-ut-all-terbilang-container"></div>
                                </div>

                                 <!-- Nominal UT All -->
                                 <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">spc-name-amount-container </label>
                                        <div class="col-sm-4"><input class="form-control" type="text" id="spc-name-amount-container" name="spc-name-amount-container"></div>
                                </div>

                                <!-- Nominal Rep All -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-rep-all-container </label>
                                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-rep-all-container" name="nominal-rep-all-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-rep-all-terbilang-container </label>
                                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-rep-all-terbilang-container" name="nominal-rep-all-terbilang-container"></div>
                                </div>

                                <!-- Nominal Grand Total All -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-gt-all-container </label>
                                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-grand-total-all-container" name="nominal-grand-total-all-container"></div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-gt-all-terbilang-container </label>
                                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-grand-total-all-terbilang-container" name="nominal-grand-total-all-terbilang-container"></div>
                                </div>
                            
                        <!--  -->

                        <!-- @ Nama Tujuan @ {Get from input above [nama-tujuan-input] } -->


                        <!-- @ Acara @ {Get from input above [acara-input] } -->

                        <!-- @ Data Penandatangan @ --> 
                            <label class="col-sm-12 col-form-label alert alert-warning mt-3 mb-3"> Yang Bertandatangan </label>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nama-ttd-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="nama-ttd-container" name="nama-ttd-container"></div>
                                </div>    
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nip-ttd-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="nip-ttd-container" name="nip-ttd-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">pan-ttd-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="pan-ttd-container" name="pan-ttd-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">jab-ttd-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="jab-ttd-container" name="jab-ttd-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">gol-ttd-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="gol-ttd-container" name="gol-ttd-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">esl-ttd-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="esl-ttd-container" name="esl-ttd-container"></div>
                                </div>
                        <!--  -->

                        <!-- @ Data Kepala Bagian @ --> 
                            <label class="col-sm-12 col-form-label alert alert-warning mt-3 mb-3"> Kepala Bagian </label>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nama-kabag-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="nama-kabag-container" name="nama-kabag-container"></div>
                                </div>    
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nip-kabag-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="nip-kabag-container" name="nip-kabag-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">pan-kabag-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="pan-kabag-container" name="pan-kabag-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">jab-kabag-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="jab-kabag-container" name="jab-kabag-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">gol-kabag-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="gol-kabag-container" name="gol-kabag-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">esl-kabag-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="esl-kabag-container" name="esl-kabag-container"></div>
                                </div>
                        <!--  -->
                                    

                        <!-- @ Data Pegawai yang Berangkat @ -->
                            <!-- {Pegawai Details} -->
                                <label class="col-sm-12 col-form-label alert alert-warning mt-3 mb-3"> Grouped Pegawai </label>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">jml-all-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="jml-all-container" name="jml-all-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nama-all-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="nama-all-container" name="nama-all-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nip-all-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="nip-all-container" name="nip-all-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">gol-all-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="gol-all-container" name="gol-all-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">pan-all-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="pan-all-container" name="pan-all-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">jab-all-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="jab-all-container" name="jab-all-container"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">esl-all-container</label>
                                        <div class="col-sm-10"><input class="form-control" type="text" id="esl-all-container" name="esl-all-container"></div>
                                </div>
                                </div>

                                <label class="col-sm-12 col-form-label alert alert-warning mt-3 mb-3"> Pegawai Details </label>

                                <?php for ($i=1; $i < 20; $i++):?>  
                                    <div id="containerpegawai" class="row mb-12"> 
                                        <div class="col-sm-2"><input class="form-control" type="text" placeholder="nama pegawai <?= $i?>"       id="nama-pegawai-container-<?= $i?>"    name="nama-pegawai-container-<?= $i?>"></div>
                                        <div class="col-sm-2"><input class="form-control" type="text" placeholder="nip pegawai <?= $i?>"        id="nip-pegawai-container-<?= $i?>"     name="nip-pegawai-container-<?= $i?>"></div>
                                        <div class="col-sm-2"><input class="form-control" type="text" placeholder="jabatan pegawai <?= $i?>"    id="jab-pegawai-container-<?= $i?>"     name="jab-pegawai-container-<?= $i?>"></div>
                                        <div class="col-sm-2"><input class="form-control" type="text" placeholder="golongan pegawai <?= $i?>"   id="gol-pegawai-container-<?= $i?>"     name="gol-pegawai-container-<?= $i?>"></div>
                                        <div class="col-sm-2"><input class="form-control" type="text" placeholder="pangkat pegawai <?= $i?>"    id="pan-pegawai-container-<?= $i?>"     name="pan-pegawai-container-<?= $i?>"></div>
                                        <div class="col-sm-2"><input class="form-control" type="text" placeholder="eselon pegawai <?= $i?>"    id="esl-pegawai-container-<?= $i?>"     name="esl-pegawai-container-<?= $i?>"></div>
                                    </div>
                                <?php endfor; ?>
                            <!--  -->
                            </div>
                        </div>
                        <!--  -->

                <!-- ================== -->
                <!-- ANCHOR JAVASCRIPT  -->
                <!-- ================== -->

                    <script>
                        // =========================================================================================                    
                        // {INITIALIZE}
                        // =========================================================================================

                            // @ dont forget copy this part @
                            var gebid = function(id)
                                {
                                    return document.getElementById(id);
                                };
                            // @ dont forget copy this part @

                            var maximumSelectionLengthPegawai = 20;
                            var maximumSelectionLengthPPTK = 1;

                            var listHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                            var listBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            var listBulan_en = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                            var duration_in_days = 0;
                            var nominal_ut_global = 0;

                            // @ Initialize PopOver @
                            var exampleEl = document.getElementById('example')
                            var popover = new bootstrap.Popover(exampleEl, options)

                            // {Special Name}
                                var Bupati = 'Drs. H.M. SANUSI, MM';
                                var WakilBupati = 'Drs. H. DIDIK GATOT SUBROTO, SH., MH';
                                var SEKDA = 'Dr. Ir. WAHYU HIDAYAT, M.M.';
                                var AS1 = 'Drs. SUWADJI, S.IP., M.Si.';
                                var AS2 = 'Drs. IRIANTORO, M.Si.';
                                var AS3 = 'Dra. MURSYIDAH, Apt, M.Kes.';
                                var StafAhli1 = 'Ir. HOLIDIN, M.M.';
                                var StafAhli2 = 'drg. MARHENDRAJAYA, M.M., Sp.KG.';
                                var StafAhli3 = 'Dr. Ir. BACHRUDIN, M.Si.,MT.';
                                var esl2Name = '';
                                var esl2NameAmount = 0;
                                var esl1NominalRep = 125000;
                                var esl2NominalRep = 75000;
                            // 

                        // =========================================================================================
                        // {KEGIATAN DAN SUB KEGIATAN} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================

                            function onChangeKodeKegiatanManualInput(){
                                gebid('kode-kegiatan-container').value = gebid('kode-kegiatan-user-input').value;
                            }

                            function onChangeDescKegiatanManualInput(){
                                gebid('nama-kegiatan-container').value = gebid('nama-kegiatan-user-input').value;
                            }

                            function onChangeKodeSubKegiatanManualInput(){
                                gebid('kode-sub-kegiatan-container').value = gebid('kode-sub-kegiatan-user-input').value;
                            }

                            function onChangeDescSubKegiatanManualInput(){
                                gebid('nama-sub-kegiatan-container').value = gebid('nama-sub-kegiatan-user-input').value;
                            }

                        // =========================================================================================
                        // {SPECIAL FUNCTIONS} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            // TESTED AND WORKED
                            function terbilang(a){
                                var bilangan = ['','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas'];

                                // 1 - 11
                                if(a < 12){
                                    var kalimat = bilangan[a];
                                }
                                // 12 - 19
                                else if(a < 20){
                                    var kalimat = bilangan[a-10]+' Belas';
                                }
                                // 20 - 99
                                else if(a < 100){
                                    var utama = a/10;
                                    var depan = parseInt(String(utama).substr(0,1));
                                    var belakang = a%10;
                                    var kalimat = bilangan[depan]+' Puluh '+bilangan[belakang];
                                }
                                // 100 - 199
                                else if(a < 200){
                                    var kalimat = 'Seratus '+ terbilang(a - 100);
                                }
                                // 200 - 999
                                else if(a < 1000){
                                    var utama = a/100;
                                    var depan = parseInt(String(utama).substr(0,1));
                                    var belakang = a%100;
                                    var kalimat = bilangan[depan] + ' Ratus '+ terbilang(belakang);
                                }
                                // 1,000 - 1,999
                                else if(a < 2000){
                                    var kalimat = 'Seribu '+ terbilang(a - 1000);
                                }
                                // 2,000 - 9,999
                                else if(a < 10000){
                                    var utama = a/1000;
                                    var depan = parseInt(String(utama).substr(0,1));
                                    var belakang = a%1000;
                                    var kalimat = bilangan[depan] + ' Ribu '+ terbilang(belakang);
                                }
                                // 10,000 - 99,999
                                else if(a < 100000){
                                    var utama = a/100;
                                    var depan = parseInt(String(utama).substr(0,2));
                                    var belakang = a%1000;
                                    var kalimat = terbilang(depan) + ' Ribu '+ terbilang(belakang);
                                }
                                // 100,000 - 999,999
                                else if(a < 1000000){
                                    var utama = a/1000;
                                    var depan = parseInt(String(utama).substr(0,3));
                                    var belakang = a%1000;
                                    var kalimat = terbilang(depan) + ' Ribu '+ terbilang(belakang);
                                }
                                // 1,000,000 - 	99,999,999
                                else if(a < 100000000){
                                    var utama = a/1000000;
                                    var depan = parseInt(String(utama).substr(0,4));
                                    var belakang = a%1000000;
                                    var kalimat = terbilang(depan) + ' Juta '+ terbilang(belakang);
                                }
                                else if(a < 1000000000){
                                    var utama = a/1000000;
                                    var depan = parseInt(String(utama).substr(0,4));
                                    var belakang = a%1000000;
                                    var kalimat = terbilang(depan) + ' Juta '+ terbilang(belakang);
                                }
                                else if(a < 10000000000){
                                    var utama = a/1000000000;
                                    var depan = parseInt(String(utama).substr(0,1));
                                    var belakang = a%1000000000;
                                    var kalimat = terbilang(depan) + ' Milyar '+ terbilang(belakang);
                                }
                                else if(a < 100000000000){
                                    var utama = a/1000000000;
                                    var depan = parseInt(String(utama).substr(0,2));
                                    var belakang = a%1000000000;
                                    var kalimat = terbilang(depan) + ' Milyar '+ terbilang(belakang);
                                }
                                else if(a < 1000000000000){
                                    var utama = a/1000000000;
                                    var depan = parseInt(String(utama).substr(0,3));
                                    var belakang = a%1000000000;
                                    var kalimat = terbilang(depan) + ' Milyar '+ terbilang(belakang);
                                }
                                else if(a < 10000000000000){
                                    var utama = a/10000000000;
                                    var depan = parseInt(String(utama).substr(0,1));
                                    var belakang = a%10000000000;
                                    var kalimat = terbilang(depan) + ' Triliun '+ terbilang(belakang);
                                }
                                else if(a < 100000000000000){
                                    var utama = a/1000000000000;
                                    var depan = parseInt(String(utama).substr(0,2));
                                    var belakang = a%1000000000000;
                                    var kalimat = terbilang(depan) + ' Triliun '+ terbilang(belakang);
                                }

                                else if(a < 1000000000000000){
                                    var utama = a/1000000000000;
                                    var depan = parseInt(String(utama).substr(0,3));
                                    var belakang = a%1000000000000;
                                    var kalimat = terbilang(depan) + ' Triliun '+ terbilang(belakang);
                                }

                                else if(a < 10000000000000000){
                                        var utama = a/1000000000000000;
                                        var depan = parseInt(String(utama).substr(0,1));
                                        var belakang = a%1000000000000000;
                                        var kalimat = terbilang(depan) + ' Kuadriliun '+ terbilang(belakang);
                                    }

                                    var pisah = kalimat.split(' ');
                                    var full = [];
                                    for(var i=0;i<pisah.length;i++){
                                    if(pisah[i] != ""){full.push(pisah[i]);}
                                    }
                                    return full.join(' ');
                            }

                            // TESTED AND WORKED
                            function ajaxGetDetails(input, index, ajaxPath, output){
                                var np = $(input).val()[index];
                                //Golongan
                                $.post('<?= base_url() ?>'+ ajaxPath, {
                                    nampeg: np
                                }, function(data) {
                                    gebid(output).value = data;
                                });
                            }

                            function ajaxGetKabagDetails(ajaxPath, output){
                                var idBag = gebid('idbagian-container').value;
                                $.post('<?= base_url() ?>'+ ajaxPath, {
                                    input: idBag
                                }, function(data) {
                                    gebid(output).value = data;
                                });
                            }

                        // =========================================================================================
                        // {STATUS TITIPAN} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            function onChangeStatusTitipan(){
                                $(".status-titipan-input").select2({
                                    maximumSelectionLength: 1
                                })

                                gebid('status-container').value = $('.status-titipan-input').val();

                                cleanAndRefillKegiatan();
                            }
                        // =========================================================================================
                        // {KEGIATAN} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            // TESTED AND WORKED
                            function onChangeKegiatan(){
                                $(".kegiatan-input").select2({
                                        maximumSelectionLength: 1
                                });

                                gebid('nama-kegiatan-container').value = $(".kegiatan-input").val();

                                // {Get kode kegiatan}
                                $.post('<?= base_url() ?>assets/ajax/getKodeKegiatan.php', {
                                    kegiatan: gebid('nama-kegiatan-container').value,
                                }, function(data) {
                                    gebid('kode-kegiatan-container').value = data;
                                });

                                loadSubKegiatan();
                            }

                            function cleanAndRefillKegiatan(){
                                // Remove options 
                                $('#kegiatan-input').find('option').not(':first').remove();

                                // Jika Dititipkan
                                if (gebid('status-container').value == 1) {
                                    $.post('<?= base_url() ?>assets/ajax/getKegiatanDesc.php', {
                                        kegiatan: 7,
                                    }, function(data){
                                        console.log("output " + data);
                                        splittedResult = data.split('|');
                                        for (let i = 0; i < splittedResult.length-1; i++) {
                                            $('#kegiatan-input').append('<option>'+splittedResult[i]+'</option>');
                                        }
                                        
                                    });   
                                }else{
                                    $.post('<?= base_url() ?>assets/ajax/getKegiatanDesc.php', {
                                        kegiatan: gebid('idbagian-container').value,
                                    }, function(data){
                                        console.log("output " + data);
                                        splittedResult = data.split('|');
                                        for (let i = 0; i < splittedResult.length-1; i++) {
                                            $('#kegiatan-input').append('<option>'+splittedResult[i]+'</option>');
                                        }
                                        
                                    }); 
                                }
                            }

                        // =========================================================================================
                        // {SUB KEGIATAN} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            /**
                             * @ How this function works @
                             * 1. set timeout before running the script because ajax is asynchronous, if no timeout is set the input will be blank
                             * 2. get input from kode-kegiatan-container {Code -> [kegiatan: gebid('kode-kegiatan-container').value] }
                             * 3. split the data by using "|" as marker {Code -> [ sr = data.split('|'); ]}
                             * 4. loop the result and append it to the options 
                             *          {Code -> for (let i = 0; i < sr.length-1; i++) {
                                            $('#sub-kegiatan-input').append('<option>'+sr[i]+'</option>');
                                        }}
                                5. This function use { assets/ajax/getKodeSubKegiatan.php }, 
                                do not delete the { echo $row['idSubKegiatan'] . "|"; } inside that file 
                            */
                            function loadSubKegiatan(){

                                var delayTimer;
                                var splittedResult;

                                // Clear all timeout
                                clearTimeout(delayTimer);

                                // Remove options 
                                $('#sub-kegiatan-input').find('option').not(':first').remove();

                                // Set new timeout
                                delayTimer = setTimeout(function() {
        
                                    $.post('<?= base_url() ?>assets/ajax/getSubKegiatanDesc.php', {
                                        kegiatan: gebid('kode-kegiatan-container').value,
                                    }, function(data){
                                        console.log("output " + data);
                                        splittedResult = data.split('|');
                                        for (let i = 0; i < splittedResult.length-1; i++) {
                                            $('#sub-kegiatan-input').append('<option>'+splittedResult[i]+'</option>');
                                        }
                                        
                                    });

                                }, 10); // Will do the ajax stuff after 1000 ms, or 1 s
                            }

                            function onChangeSubKegiatan(){
                                $(".sub-kegiatan-input").select2({
                                    maximumSelectionLength: 1
                                });

                                gebid('nama-sub-kegiatan-container').value = $(".sub-kegiatan-input").val();

                                // {Get kode kegiatan}
                                $.post('<?= base_url() ?>assets/ajax/getSubKegiatanId.php', {
                                    kegiatan: gebid('nama-sub-kegiatan-container').value,
                                }, function(data) {
                                    gebid('kode-sub-kegiatan-container').value = data;
                                });
                            }

                        // =========================================================================================
                        // {DATE AND TIME} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            // TESTED AND WORKED
                            document.getElementById("startDate").onchange = function() {
                                getDay();
                                calculateDuration();
                            };

                            // TESTED AND WORKED
                            document.getElementById("endDate").onchange = function() {
                                calculateDuration()
                            };

                            /**
                             * qr : 
                             * input -> {startDate}
                             * output -> 
                             * for data like :  
                             *  a. {Kamis}          stored inside {hari-container}
                             *  b. {Januari}        stored inside {bulan-container}
                             *  c. {2022-10-15}     stored inside {date-sorter-container}
                             */
                            // TESTED AND WORKED
                            function getDay() {
                                // Mengambil hari perjalanan dinas
                                document.getElementById('hari-container').value = listHari[new Date(document.getElementById('startDate').value).getDay()];

                                // Mengambil nama bulan perjalanan dinas
                                document.getElementById('bulan-container').value = listBulan[new Date(document.getElementById('startDate').value).getMonth()];

                                var getDate = new Date(document.getElementById('startDate').value).getFullYear() + "-" + 
                                            (new Date(document.getElementById('startDate').value).getMonth()+1) + "-" + 
                                            new Date(document.getElementById('startDate').value).getDate();

                                document.getElementById('date-sorter-container').value = getDate;
                            }

                            /**
                             * qr : 
                             * for data like :  
                                a. {1 Juni 2022 s/d 2 juni 2022} stored inside {tanggal-berangkat-kembali-container}
                                b. {1 hari} stored inside {durasi-dengan-hari-container}
                                c. {1} stored inside {durasi-tanpa-hari-container}
                                d. {satu} stored inside {durasi-terbilang-container}
                                e. {1 Juni 2022} stored inside {tanggal-berangkat-container} and {tanggal-pulang-container}

                            */
                           // TESTED AND WORKED
                            function calculateDuration() {

                                var tanggal_berangkat = new Date(document.getElementById('startDate').value);
                                var tanggal_pulang = new Date(document.getElementById('endDate').value);
                                var timeDiff = Math.abs(tanggal_pulang.getTime() - tanggal_berangkat.getTime());

                                duration_in_days = (Math.floor(timeDiff / (1000 * 3600 * 24)))+1;
                                var duration_in_months = Math.floor(duration_in_days / 31);
                                var duration_in_years = Math.floor(duration_in_months / 12);

                                // Durasi dengan hari
                                document.getElementById('durasi-dengan-hari-container').value = duration_in_days + " hari";                            

                                // Durasi tanpa hari
                                document.getElementById('durasi-tanpa-hari-container').value = duration_in_days;

                                // Durasi terbilang
                                document.getElementById('durasi-terbilang-container').value = terbilang(duration_in_days);

                                // return data with format like this -> DD-MM-YYYY
                                var departure =  
                                    new Date(document.getElementById('startDate').value).getDate() +" "+ 
                                    listBulan[new Date(document.getElementById('startDate').value).getMonth()] + ", " + 
                                    new Date(document.getElementById('startDate').value).getFullYear();

                                var departure_en = 
                                    new Date(document.getElementById('startDate').value).getDate() +" "+ 
                                    listBulan_en[new Date(document.getElementById('startDate').value).getMonth()] + ", " + 
                                    new Date(document.getElementById('startDate').value).getFullYear();

                                // return data with format like this -> DD-MM-YYYY
                                var arrival =  
                                    new Date(document.getElementById('endDate').value).getDate() +" "+ 
                                    listBulan[new Date(document.getElementById('endDate').value).getMonth()] + " " + 
                                    new Date(document.getElementById('endDate').value).getFullYear();


                                gebid('tanggal-berangkat-kembali-container').value = departure + " s/d " + arrival;
                                gebid('tanggal-berangkat-container').value = departure;
                                gebid('tanggal-berangkat-en-container').value = departure_en;
                                gebid('tanggal-kembali-container').value = arrival;

                            }
                        // =========================================================================================
                        // {KOTA TUJUAN} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            // TESTED AND WORKED
                            function onChangeKotaTujuan(){
                                //=====================================================================
                                // {Set maximal selection length}
                                //=====================================================================
                                if (gebid('lebih-dari-8-jam-input').value == 'YA' || 
                                    gebid('lebih-dari-8-jam-input').value == 'Ya' || 
                                    gebid('lebih-dari-8-jam-input').value == 'yA' || 
                                    gebid('lebih-dari-8-jam-input').value == 'ya') 
                                    {
                                    $(".kota-tujuan-input").select2({
                                        maximumSelectionLength: 1
                                    });
                                } else {
                                    $(".kota-tujuan-input").select2({
                                        maximumSelectionLength: 3
                                    });
                                }

                                gebid('kota-container').value = $('.kota-tujuan-input').val();

                                $.post('<?= base_url() ?>assets/ajax/getUangTransportValue.php', {
                                    cityName: gebid('kota-container').value,
                                }, function(data) {
                                    document.getElementById('nominal-ut-container').value = data;
                                    console.log(data);
                                });
                            }

                        // =========================================================================================
                        // {PEGAWAI} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================

                            // {Used in onChangePegawai} // TESTED AND WORKED
                            function checkForPreviousTrip(){
                                //=====================================================================
                                // Check if that pegawai already do perdin on that specific location 
                                // and on that specific date
                                //=====================================================================\
                                //#region Check if that pegawai already do perdin on that specific location and on that specific date

                                var tanggalBerangkat = gebid('tanggal-berangkat-container').value;
                                var kotaTujuan = gebid('kota-container').value;
                                
                                // How line below works : 
                                // get value of pegawai[index]
                                // because array start from 0 while length is start from 1, we reduce it by 1
                                var namaPegawaiYangDipilih = $('.pegawai-input').val()[($('.pegawai-input').val().length) - 1];

                                // FIXME : @ I DONT KNOW HOW TO FIX THIS, YET (12/JUNE/2022) @
                                // console.log("INDEX[0] " + $('.pegawai-input').val()[0]);
                                // console.log("INDEX[1] " + $('.pegawai-input').val()[1]);
                                // console.log("INDEX[2] " + $('.pegawai-input').val()[2]);
                                // console.log("INDEX[3] " + $('.pegawai-input').val()[3]);

                                if (tanggalBerangkat != '' && kotaTujuan != '') 
                                {
                                    $.post('<?= base_url() ?>assets/ajax/getPreviousPerdin.php', {
                                        tanggal: tanggalBerangkat,
                                        lokasi: kotaTujuan,
                                        namaPegawai: namaPegawaiYangDipilih
                                    }, function(data) {
                                        console.log('param : '+tanggalBerangkat +' ' + kotaTujuan + ' ' + namaPegawaiYangDipilih);
                                        console.log('Data prev ' + data);
                                        if (data != '') {
                                            gebid('pernah-perdin').innerHTML =
                                                namaPegawaiYangDipilih + " sudah pernah melakukan \nperjalanan dinas ke " +
                                                kotaTujuan + " pada tanggal " + tanggalBerangkat;
                                        }else{
                                            document.getElementById('pernah-perdin').innerHTML = '';
                                        }
                                    })
                                }
                                    
                                //#endregion
                            }

                            // {Used in onChangePegawai} // TESTED AND WORKED
                            function rearrangePegawaiList(){
                                //=========================================================================
                                // Changes the order of items - item selected by user are moved to the end.
                                //==========================================================================
                                $("select").on("select2:select", function(evt) {
                                    var element = evt.params.data.element;
                                    var $element = $(element);

                                    $element.detach();
                                    $(this).append($element);
                                    // $(this).trigger("change");
                                });
                            }

                            /** 
                             * qr : 
                             * input -> {pegawai-input}
                             * output ->
                             * {nama-pegawai-container-nth} | {nip-pegawai-container-nth} | {jab-pegawai-container-nth}
                             * {pan-pegawai-container-nth}  | {gol-pegawai-container-nth} | {esl-pegawai-container-nth}
                            */
                            // {Used in onChangePegawai} // TESTED AND WORKED
                            function getPegawaiDetails(){
                                //=====================================================================
                                // Get data nip and jabatan based on pegawai name
                                //=====================================================================
                                //#region Get data nip and jabatan based on pegawai name
                                for (let index = 0; index < $('.pegawai-input').val().length; index++) {
                                    var np = $('.pegawai-input').val()[index];
                                    if (np != '') {
                                        
                                        //NamaPegawai
                                        $.post('<?= base_url() ?>assets/ajax/getPegNama.php', {
                                            nampeg: np
                                        }, function(data) {
                                            document.getElementById('nama-pegawai-container-' + (index + 1)).value = data;
                                        });
                                        //NIP
                                        $.post('<?= base_url() ?>assets/ajax/getPegNip.php', {
                                            nampeg: np
                                        }, function(data) {
                                            document.getElementById('nip-pegawai-container-' + (index + 1)).value = data;
                                        });
                                        //Jabatan
                                        $.post('<?= base_url() ?>assets/ajax/getPegJab.php', {
                                            nampeg: np
                                        }, function(data) {
                                            document.getElementById('jab-pegawai-container-' + (index + 1)).value = data;
                                        });
                                        //Pangkat
                                        $.post('<?= base_url() ?>assets/ajax/getPegPan.php', {
                                            nampeg: np
                                        }, function(data) {
                                            document.getElementById('pan-pegawai-container-' + (index + 1)).value = data;
                                        });
                                        //Golongan
                                        $.post('<?= base_url() ?>assets/ajax/getPegGol.php', {
                                            nampeg: np
                                        }, function(data) {
                                            document.getElementById('gol-pegawai-container-' + (index + 1)).value = data;
                                        });
                                        //Golongan
                                        $.post('<?= base_url() ?>assets/ajax/getPegEsl.php', {
                                            nampeg: np
                                        }, function(data) {
                                            document.getElementById('esl-pegawai-container-' + (index + 1)).value = data;
                                        });
                                    }
                                }
                                //#endregion
                            }

                            // {grab all pegawai details and contain inside nama-all-container etc}
                            // {Used in finalConfirmations} // TESTED AND WORKED
                            function containPegawaiDetails(){
                                // the dollar function $() can be used as shorthand for the getElementById Function
                                var jmlPegawai = document.getElementById('jml-all-container');
                                jmlPegawai.value = $('.pegawai-input').val().length;                        

                                var namaArray,  rearrangedNama, namaAllPegawai = "";
                                var nipArray,   rearrangedNip,  nipAllPegawai = "";
                                var golArray,   rearrangedGol,  golAllPegawai = "";
                                var panArray,   rearrangedPan,  panAllPegawai = "";
                                var jabArray,   rearrangedJab,  jabAllPegawai = "";
                                var eslArray,   rearrangedEsl,  eslAllPegawai = "";

                                //Looping to get multiselect selected options value
                                for (let index = 0; index < $('.pegawai-input').val().length; index++) {
                                    // namaAllPegawai += $('.pegawai').val()[index] + "; ";

                                    namaAllPegawai += document.getElementById('nama-pegawai-container-'+(index+1)).value + ";";                                
                                    nipAllPegawai += document.getElementById('nip-pegawai-container-'+(index+1)).value + ";";
                                    golAllPegawai += document.getElementById('gol-pegawai-container-'+(index+1)).value + ";";
                                    panAllPegawai += document.getElementById('pan-pegawai-container-'+(index+1)).value + ";";
                                    jabAllPegawai += document.getElementById('jab-pegawai-container-'+(index+1)).value + ";";
                                    eslAllPegawai += document.getElementById('esl-pegawai-container-'+(index+1)).value + ";";
                                    // console.log("NIP "+document.getElementById('nip-pegawai-container-'+(index+1)).value);

                                }
                            
                                // #region Processing String
                                processDataPegawai(namaArray, namaAllPegawai, rearrangedNama, gebid('nama-all-container'));
                                processDataPegawai(nipArray, nipAllPegawai, rearrangedNip, gebid('nip-all-container'));
                                processDataPegawai(golArray, golAllPegawai, rearrangedGol, gebid('gol-all-container'));
                                processDataPegawai(panArray, panAllPegawai, rearrangedPan, gebid('pan-all-container'));
                                processDataPegawai(jabArray, jabAllPegawai, rearrangedJab, gebid('jab-all-container'));
                                processDataPegawai(eslArray, eslAllPegawai, rearrangedEsl, gebid('esl-all-container'));
                                //#endregion
                            }

                            // {Used in finalConfirmations} // TESTED AND WORKED
                            function processDataPegawai(array, splitter, rearranged, container){
                                /* The string are processed like this :
                                * Step by step
                                    1. Take the string containing all data
                                    2. Split it as array using ";" as separator (namaAllPegawai.split(;))
                                    3. Use shift() to remove the first array
                                    4. Use push() to place removed element to last place
                                    5. Use join() to return the array to one single string.
                                
                                * Why im doing this?
                                    Because the last person in pegawai somehow is inserted as first in the string for all of this variable
                                */ 

                                array = splitter.split(";");
                                array.push(array.shift());
                                rearranged = array.join(";");
                                container.value = rearranged;
                            }

                            // TESTED AND WORKED
                            function onChangePegawai(){
                                $(".pegawai").select2({
                                    maximumSelectionLength: maximumSelectionLengthPegawai
                                });

                                checkForPreviousTrip();
                                rearrangePegawaiList();
                                getPegawaiDetails();
                            }

                        // =========================================================================================
                        // {YANG BERTANDATANGAN and KABAG} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================

                            function onChangeTTD(){
                                /*  Param details :
                                    [1] id of multiple select
                                    [2] index of multiple select selection
                                    [3] path of ajax
                                    [4] name of container
                                */
                                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegNama.php', 'nama-ttd-container');
                                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegNip.php', 'nip-ttd-container');
                                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegGol.php', 'gol-ttd-container');
                                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegPan.php', 'pan-ttd-container');
                                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegJab.php', 'jab-ttd-container');

                                // =========================================================================================
                                // {DATA KABAG} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                                // =========================================================================================

                                /*  Param details :
                                    [1] path of ajax
                                    [2] name of container
                                */                                
                                ajaxGetKabagDetails('assets/ajax/getKabagNama.php', 'nama-kabag-container');
                                ajaxGetKabagDetails('assets/ajax/getKabagNip.php', 'nip-kabag-container');
                                ajaxGetKabagDetails('assets/ajax/getKabagGol.php', 'gol-kabag-container');
                                ajaxGetKabagDetails('assets/ajax/getKabagPan.php', 'pan-kabag-container');
                                ajaxGetKabagDetails('assets/ajax/getKabagJab.php', 'jab-kabag-container');
                            }
                            
                        // =========================================================================================
                        // {MONEY CALCULATIONS} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            function determineUH(){
                                if (gebid('lebih-dari-8-jam-input').value == 'YA' || 
                                        gebid('lebih-dari-8-jam-input').value == 'Ya' || 
                                        gebid('lebih-dari-8-jam-input').value == 'yA' || 
                                        gebid('lebih-dari-8-jam-input').value == 'ya') 
                                {   
                                    gebid('nominal-uh-container').value = "160000";
                                } else {
                                    gebid('nominal-uh-container').value = "125000";
                                }
                            }

                            function calculateUH(amountOfDestination){

                                // {nominal-uh-all-container}
                                // {nominal-uh-all-terbilang-container}
                                //#region (Nominal UH x Durasi x Jumlah Tujuan) | Terbilang [KWT]
                                gebid('nominal-uh-all-container').value = parseInt(gebid('nominal-uh-container').value) * document.getElementById('durasi-tanpa-hari-container').value * amountOfDestination;

                                gebid('nominal-uh-all-terbilang-container').value = terbilang(gebid('nominal-uh-all-container').value);
                                //#endregion
                            }

                            function calculateUT(){
                                // {nominal-ut-container}
                                // {nominal-ut-all-container}
                                // {nominal-ut-all-terbilang-container}
                                //#region (Nominal UT x Durasi) | Terbilang [KWT]

                                if (gebid('lebih-dari-8-jam-input').value == 'YA' || 
                                    gebid('lebih-dari-8-jam-input').value == 'Ya' || 
                                    gebid('lebih-dari-8-jam-input').value == 'yA' || 
                                    gebid('lebih-dari-8-jam-input').value == 'ya') 
                                    {   
                                        gebid('nominal-ut-all-container').value = document.getElementById('nominal-ut-container').value * document.getElementById('durasi-tanpa-hari-container').value;

                                    }else{
                                        gebid('nominal-ut-all-container').value = 0;
                                    }

                                    gebid('nominal-ut-all-terbilang-container').value = terbilang(gebid('nominal-ut-all-container').value);
                                //#endregion
                            }

                            function calculateRep(){
                                for (let index = 0; index < $('.pegawai-input').val().length; index++) {
                                    esl2Name = gebid('nama-pegawai-container-' + (index + 1)).value;
                                    if (esl2Name==Bupati || esl2Name ==WakilBupati || esl2Name == SEKDA || esl2Name == AS1 || esl2Name == AS2 || esl2Name == AS3 
                                    || esl2Name == StafAhli1 || esl2Name == StafAhli2 || esl2Name == StafAhli3) {
                                        esl2NameAmount = esl2NameAmount+1;
                                    }
                                }
                                gebid('spc-name-amount-container').value = esl2NameAmount;

                                if ((gebid('lebih-dari-8-jam-input').value == 'YA' || 
                                    gebid('lebih-dari-8-jam-input').value == 'Ya' || 
                                    gebid('lebih-dari-8-jam-input').value == 'yA' || 
                                    gebid('lebih-dari-8-jam-input').value == 'ya') && esl2NameAmount>0) 
                                    {
                                        gebid('nominal-rep-container').value = esl2NominalRep;    
                                        gebid('nominal-rep-all-container').value = esl2NominalRep * esl2NameAmount;    
                                        gebid('nominal-rep-all-terbilang-container').value =terbilang(gebid('nominal-rep-all-container').value);
                                    }
                            }

                            function calculateGrandTotalAll(amountOfPegawai){
                                // {nominal-grand-total-all-container}
                                // {nominal-grand-total-all-terbilang-container}
                                //#region ((Nominal UH x Durasi x Jumlah Tujuan) x Jumlah Pegawai) | Terbilang [KWT Besar]

                                console.log(gebid('nominal-uh-all-container').value * amountOfPegawai);
                                console.log(gebid('nominal-ut-all-container').value * amountOfPegawai);
                                console.log(gebid('nominal-rep-all-container').value);

                                if((gebid('nominal-rep-all-container').value)!= ''){
                                    gebid('nominal-grand-total-all-container').value = 

                                    parseInt(gebid('nominal-uh-all-container').value * amountOfPegawai) + 
                                    parseInt(gebid('nominal-ut-all-container').value * amountOfPegawai) +
                                    parseInt(gebid('nominal-rep-all-container').value)

                                }else{
                                    gebid('nominal-grand-total-all-container').value = 

                                    parseInt(gebid('nominal-uh-all-container').value * amountOfPegawai) + 
                                    parseInt(gebid('nominal-ut-all-container').value * amountOfPegawai);
                                }

                                gebid('nominal-grand-total-all-terbilang-container').value = terbilang(gebid('nominal-grand-total-all-container').value);
                                //#endregion
                            }

                            function calculateExpense(){

                                var amount_of_destination = $('.kota-tujuan-input').val().length;
                                var amount_of_pegawai = $('.pegawai-input').val().length;

                                calculateUH(amount_of_destination);

                                calculateUT();

                                calculateRep();

                                calculateGrandTotalAll(amount_of_pegawai);
                            }


                        // =========================================================================================
                        // {FINAL CONFIRMATIONS} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            function startProcessing() {
                                var confirm = gebid('konfirmasi-input');
                                            
                                if (confirm.value == 'YA' || confirm.value == 'Ya' || confirm.value == 'yA' || confirm.value == 'ya' ) {
                                    // inputBecameReadOnly(true);
                                    containPegawaiDetails();
                                    calculateExpense();
                                } else {
                                    // inputBecameReadOnly(false);
                                }
                            };

                    </script>

                </form>
            </div>
        </div>
    </div>
</div>