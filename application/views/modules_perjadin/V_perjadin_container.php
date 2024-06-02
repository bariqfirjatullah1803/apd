<!-- ================== -->
<!-- ANCHOR CONTAINER   -->
<!-- ================== -->

<!-- CHECK IF ISDEBUGGING IN APPLICATION/CONFIG/CONSTANTS.PHP is 1 or 0-->

<?php if ($_SESSION['debugmode'] == 1) : ?>
    <div style="display:">
<?php elseif ($_SESSION['debugmode'] == 0): ?>
    <div style="display:none">
<?php endif ?>

        <label class="col-sm-12 col-form-label alert alert-info mt-3"> Container Area </label>

        <?php if ($_SESSION['debugmode'] == 1) : ?>
            <div style="display:">
        <?php elseif ($_SESSION['debugmode'] == 0): ?>
            <div style="display:none">
        <?php endif ?>

            <!-- {type-of-perjadin-container} -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">type-of-perjadin-container</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="type-of-perjadin-container" 
                        id="type-of-perjadin-container" value="<?= $typeOfPerjadin; ?>" row >
                    </div>

                    <label class="col-sm-4 col-form-label">status-biaya-penginapan-container</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="status-biaya-penginapan-container" 
                        id="status-biaya-penginapan-container" value="" row >
                    </div>
                </div>
            <!--  -->
            <!-- ANCHOR idbagian | index bagian | kodeKwt -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">idbagian-container </label>
                        <div class="col-sm-2"><input readonly class="form-control" type="text" id="idbagian-container" name="idbagian-container" value="<?= $idBagian; ?>"></div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">index-bagian-container </label>
                        <div class="col-sm-2"><input readonly class="form-control" type="text" id="index-bagian-container" name="index-bagian-container" value="<?= $kodebagian; ?>"></div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">kodekwt-container </label>
                        <div class="col-sm-2"><input readonly class="form-control" type="text" id="kodekwt-container" name="kodekwt-container" value="<?= $kodekwt; ?>"></div>
                </div>
            <!--  -->

            <!-- ANCHOR Status Titipan -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">status-container </label>
                        <div class="col-sm-10"><input class="form-control" type="text" id="status-container" name="status-container"></div>
                </div>
            <!--  -->

            <!-- ANCHOR Nomor Surat {Get from input above} -->

            <!-- ANCHOR Nama kegiatan Container {nama-kegiatan-container} -->
                <div id="container-kodeprogram" class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Kode dan nama kegiatan</label>
                    <div class="col-sm-3"><input readonly id="kode-kegiatan-container" name="kode-kegiatan-container" class="form-control" type="text"></div>
                    <div class="col-sm-7"><input readonly id="nama-kegiatan-container" name="nama-kegiatan-container" class="form-control" type="text"></div>
                </div>
            <!--  -->

            <!-- ANCHOR Nama sub kegiatan Container {nama-kegiatan-container} -->
                <div id="container-kodeprogram" class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Kode dan nama kegiatan</label>
                    <div class="col-sm-3"><input readonly id="kode-sub-kegiatan-container" name="kode-sub-kegiatan-container" class="form-control" type="text"></div>
                    <div class="col-sm-7"><input readonly id="nama-sub-kegiatan-container" name="nama-sub-kegiatan-container" class="form-control" type="text"></div>
                </div>
            <!--  -->

            <!-- ANCHOR Dasar Surat {Get from input above [dasar-surat-input] } -->


            <!-- ANCHOR Tanggal Berangkat dan Kembali -->

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

                    <div class="row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Hari Sampai</label>
                            <div class="col-sm-2"><input class="form-control" type="text" id="hari-sampai-container" name="hari-sampai-container"></div>
                    </div>

                    <label class="col-sm-12 col-form-label alert alert-info mt-3"> Date and Durations (EN) </label>

                    <!-- {Hari Bulan Date Sorter} -->
                    <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">tanggal-berangkat-en</label>
                            <div class="col-sm-2"><input class="form-control" type="text" id="tanggal-berangkat-en-container" name="tanggal-berangkat-en-container"></div>
                    </div>
            <!--  -->

            <!-- ANCHOR MODA TRANSPORTASI -->
            <label class="col-sm-12 col-form-label alert alert-info mt-3">Transportasi </label>

                <div id="container-jenis-transportasi" class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Transportasi</label>
                    <div class="col-sm-3"><input readonly id="jenis-transportasi-container" name="jenis-transportasi-container" class="form-control" type="text"></div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">Moda Transportasi</label>
                    <div class="col-sm-3"><input readonly id="moda-transportasi-container" name="moda-transportasi-container" class="form-control" type="text"></div>
                </div>

                <div id="container-jenis-transportasi" class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Total Biaya Bus</label>
                    <div class="col-sm-2"><input readonly id="total-biaya-bus-container" name="total-biaya-bus-container" class="form-control" type="text"></div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">Total Taksi Lumpsum</label>
                    <div class="col-sm-2"><input readonly id="total-taksi-lumpsum-container" name="total-taksi-lumpsum-container" class="form-control" type="text"></div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">Total Taksi Atcost</label>
                    <div class="col-sm-2"><input readonly id="total-taksi-atcost-container" name="total-taksi-atcost-container" class="form-control" type="text"></div>
                </div>
            <!--  -->

        </div>        

        <!-- ANCHOR Money Calculations -->
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

                <!-- Nominal penginapan All -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-penginapan-all-container </label>
                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-penginapan-all-container" name="nominal-penginapan-all-container"></div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-penginapan-all-terbilang-container </label>
                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-penginapan-all-terbilang-container" name="nominal-penginapan-all-terbilang-container"></div>
                </div>

                <label class="col-sm-12 col-form-label alert alert-info mt-3"> Special Money Calculations </label>

                <!-- Nominal Spc/Political Title All -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">spc-title-amount-container </label>
                        <div class="col-sm-4"><input class="form-control" type="text" id="spc-title-amount-container" name="spc-title-amount-container"></div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">political-title-amount-container </label>
                        <div class="col-sm-4"><input class="form-control" type="text" id="political-title-amount-container" name="political-title-amount-container"></div>
                </div>

                <!-- Nominal Rep All -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-rep-all-container </label>
                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-rep-all-container" name="nominal-rep-all-container"></div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-rep-all-terbilang-container </label>
                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-rep-all-terbilang-container" name="nominal-rep-all-terbilang-container"></div>
                </div>

                <label class="col-sm-12 col-form-label alert alert-info mt-3"> Grand Total </label>

                <!-- Nominal Grand Total All -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-grand-total-all-container </label>
                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-grand-total-all-container" name="nominal-grand-total-all-container"></div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">nominal-grand-total-all-terbilang-container </label>
                        <div class="col-sm-4"><input class="form-control" type="text" id="nominal-grand-total-all-terbilang-container" name="nominal-grand-total-all-terbilang-container"></div>
                </div>
            
                
        <!--  -->

        <!-- ANCHOR Grouped Penginapan -->
            <label class="col-sm-12 col-form-label alert alert-info mt-3 mb-3"> Grouped Penginapan </label>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">penginapan-nama-all-container</label>
                        <div class="col-sm-10"><input class="form-control" type="text" id="penginapan-nama-all-container" name="penginapan-nama-all-container"></div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">penginapan-nominal-all-container</label>
                        <div class="col-sm-10"><input class="form-control" type="text" id="penginapan-nominal-all-container" name="penginapan-nominal-all-container"></div>
                </div>
        <!--  -->

        <!-- ANCHOR Nama Tujuan {Get from input above [nama-tujuan-input] } -->

        <!-- ANCHOR Acara {Get from input above [acara-input] } -->

        <!-- ANCHOR Data Penandatangan --> 
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

        <!-- ANCHOR Data Kepala Bagian --> 
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
                    
        <!-- ANCHOR Data Pegawai yang Berangkat -->
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

                <?php if ($_SESSION['debugmode'] == 1) : ?>
                    <div style="display:">
                <?php elseif ($_SESSION['debugmode'] == 0): ?>
                    <div style="display:none">
                <?php endif ?>
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
                </div>
            <!--  -->
            </div>
        </div>
        <!--  -->
    </div>


