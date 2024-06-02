<!-- #region BOILERPLATE -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Form Perjalanan Dinas Luar Daerah Dalam Provinsi</h4>
                    <p class="card-title-desc">Isi data-data dibawah untuk membuat dokumen Perjalanan Dinas Luar Daerah Dalam Provinsi</p>    
<!-- #endregion -->


            <form action="<?= base_url(); ?>PDLD/tambahData" method="post" autocomplete="off">
                <div id="progrss-wizard" class="twitter-bs-wizard">
                    <ul class="twitter-bs-wizard-nav nav-justified">
                        <li class="nav-item wizard-border">
                            <a href="#progress-detail-perjalanan-dinas" class="nav-link" data-toggle="tab">
                                <span class="step-number">Detail Perjalanan Dinas</span>
                            </a>
                        </li>
                        <li class="nav-item wizard-border">
                            <a href="#progress-data-pegawai-dan-biaya" class="nav-link" data-toggle="tab">
                                <span class="step-number">Data Pegawai dan Biaya</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-data-maskapai" class="nav-link" data-toggle="tab">
                                <span class="step-number">Data Maskapai</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-konfirmasi" class="nav-link" data-toggle="tab">
                                <span class="step-number">Konfirmasi</span>
                            </a>
                        </li>
                    </ul>

                    <div id="bar" class="progress mt-4 mb-4">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                    </div>

                    <div class="tab-content twitter-bs-wizard-tab-content">
                        <div class="tab-pane" id="progress-detail-perjalanan-dinas">
                            <!-- #region [Basic Info : Sub Bagian, Nomor Surat Tugas, Dasar Surat, Tanggal Berangkat-Kembali, Nama Tujuan, Kota] -->
                            <!-- Sub Bagian -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Sub Bagian</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="" id="sub-bagian-text-input" name="sub-bagian-top-container"></div>
                            </div>

                            <!-- Nomor Surat Tugas -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Nomor Surat Tugas</label>
                                <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nomor-surat-tugas-text-input" name="nomor-surat-tugas-container"></div>
                            </div>
                            
                            <!-- Dasar Surat -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Dasar Surat Tugas</label>
                                <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="dasar-surat-text-input" name="dasar-surat-top-container"></div>
                            </div>
                        
                            <!-- Tanggal Berangkat dan Kembali -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal Berangkat dan Kembali</label>
                                <div class="col-sm-4">
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd MM, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                        <input type="text" name="startDates" id="startDate" class="form-control" name="start" placeholder="Berangkat" required />
                                        <input type="text" name="endDates" id="endDate" class="form-control" name="end" placeholder="Pulang" required />
                                    </div>
                                </div>
                                <script>
                                    document.getElementById("startDate").onchange = function() {
                                        getDay();
                                        calculateDuration();
                                    };

                                    document.getElementById("endDate").onchange = function() {
                                        calculateDuration()
                                    };

                                    
                                    function getDay() {
                                        // Mengambil hari perjalanan dinas
                                        var listHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                        document.getElementById('hari-bottom-container').value = listHari[new Date(document.getElementById('startDate').value).getDay()];

                                        // Mengambil hari perjalanan dinas
                                        var listHari = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        document.getElementById('bulan-bottom-container').value = listHari[new Date(document.getElementById('startDate').value).getMonth()];
                                    }

                                    function calculateDuration() {
                                        var durasi_hari = document.getElementById('durasi-text-input');

                                        var date1 = new Date(document.getElementById('startDate').value);
                                        var date2 = new Date(document.getElementById('endDate').value);
                                        var timeDiff = Math.abs(date2.getTime() - date1.getTime());

                                        var days = Math.floor(timeDiff / (1000 * 3600 * 24));
                                        var months = Math.floor(days / 31);
                                        var years = Math.floor(months / 12);

                                        // Durasi dengan hari
                                        document.getElementById('durasi-text-input').value = days + 1 + " hari";

                                        // Durasi tanpa hari
                                        document.getElementById('durasi-number-only').value = days + 1;

                                        // Durasi Terbilang
                                        if (durasi_hari.value != '') {
                                            $.post('assets/ajax/numbertoword.php', 
                                            {
                                                number: durasi_hari.value
                                            }, 
                                            function(data) {document.getElementById('durasi-terbilang-text-input').value = data;})
                                        }

                                    }
                                </script>
                            </div>
                            
                            <!-- Durasi Perjalanan Dinas -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Durasi Perjalanan Dinas</label>

                                <!-- Durasi dengan "Hari"   | Contoh : 1 hari -->
                                <div class="col-sm-2"><input readonly class="form-control" type="text" placeholder="" id="durasi-text-input" name="durasi-dengan-hari-top-container"></div>

                                <!-- Durasi tanpa "Hari"    | Contoh : 1 -->
                                <div class="col-sm-2"><input readonly style="display:none" class="form-control" type="text" placeholder="" id="durasi-number-only" name="durasi-tanpa-hari-top-container"></div>

                                <!-- Durasi terbilang       | Contoh : satu -->
                                <div class="col-sm-2"><input readonly style="display:none" class="form-control" type="text" placeholder="" id="durasi-terbilang-text-input" name="durasi-terbilang-top-container"></div>
                                
                            </div>

                            <!-- Nama Tujuan -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Nama Tujuan</label>
                                <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nama-tujuan-text-input" name="nama-tujuan-top-container"></div>
                            </div>

                            <!-- Kota -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control select2-multiple kota-tujuan" multiple="multiple" name="kota-tujuan-top-container"" placeholder="test" id="kota-tujuan" onchange="onChangeKotaTujuan()" required>

                                        <?php foreach ($tujuan as $tujuanKolom) : ?>
                                            <option><?= $tujuanKolom['namaTujuan']; ?></option>
                                        <?php endforeach; ?>

                                    </select>

                                    <script>
                                        function onChangeKotaTujuan(){
                                            //=====================================================================
                                            // Set maximal selection length
                                            //=====================================================================
                                            $(".kota-tujuan").select2({
                                                maximumSelectionLength: 1
                                            });

                                            var kotaTujuan = document.getElementById('kota-tujuan-bottom-container');
                                            kotaTujuan.value = $('.kota-tujuan').val();
                                            
                                        }
                                    </script>
                                </div>
                            </div>

                            <!-- Acara -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Acara</label>
                                <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="acara-text-input" name="acara-top-container"></div>
                            </div>
                        <!-- #endregion -->
                        </div>
                        <div class="tab-pane" id="progress-data-pegawai-dan-biaya">
                            <!-- Data Pegawai yang Berangkat -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Data Pegawai yang Berangkat</label>
                                <div class="col-sm-9">
                                    <select id="pegawai-dropdown pegawai" class="select2 form-control select2-multiple pegawai" multiple="multiple" onchange="onChangePegawai()" required>
                                    <!-- <select id="pegawai-dropdown pegawai" class="select2 form-control select2-multiple pegawai" multiple="multiple" onchange="custFunc()" required> -->

                                        <?php foreach ($pegawai as $pegawaiKolom) : ?>
                                            <option><?= $pegawaiKolom['namaPegawai'] ?></option>
                                        <?php endforeach; ?>

                                    </select>

                                    <script>
                                        function onChangePegawai(){
                                            //=====================================================================
                                            // Set maximal selection length
                                            //=====================================================================
                                            $(".pegawai").select2({
                                                maximumSelectionLength: 10
                                            });

                                            //=====================================================================
                                            // Check if that pegawai already do perdin on that specific location 
                                            // and on that specific date
                                            //=====================================================================\
                                            //#region Untested Code

                                                // WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!!
                                                // WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!!
                                                // WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!!
                                                // 
                                                //                              THE PART BELOW IS UNTESTED
                                                //
                                                //

                                                // if (document.getElementById('startDate').value != '' && document.getElementById('kota-kecamatan').value != '') 
                                                // {
                                                //     $.post('assets/ajax/checkPrevData.php', {
                                                //         tanggal: document.getElementById('startDate').value,
                                                //         lokasi: document.getElementById('kota-kecamatan').value,
                                                //         namaPegawai: $('.pegawai').val()[($('.pegawai').val().length) - 1]
                                                //     }, function(data) {
                                                //         if (data != '') {
                                                //             document.getElementById('pernah-perdin').innerHTML =
                                                //                 $('.pegawai').val()[($('.pegawai').val().length) - 1] +
                                                //                 " sudah pernah melakukan \nperjalanan dinas ke " +
                                                //                 document.getElementById('kota-kecamatan').value +
                                                //                 " pada tanggal " + document.getElementById('startDate').value;

                                                //             // $(".pegawai").val([]).change();
                                                //         }
                                                //     })
                                                //     }

                                                // 
                                                //                              THE PART ABOVE IS UNTESTED
                                                // 
                                                // WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!!
                                                // WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!!
                                                // WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!! WARNING !!!!!
                                                
                                            //#endregion

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

                                            //=====================================================================
                                            // Get data nip and jabatan based on pegawai name
                                            //=====================================================================
                                            //#region Get data nip and jabatan based on pegawai name
                                                for (let index = 0; index < $('.pegawai').val().length; index++) {
                                                var np = $('.pegawai').val()[index];
                                                if (np != '') {
                                                    //NamaPegawai
                                                    $.post('assets/ajax/nampeg.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('nama-pegawai-container-' + (index + 1)).value = data;
                                                    });
                                                    //NIP
                                                    $.post('assets/ajax/nip.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('nip-pegawai-container-' + (index + 1)).value = data;
                                                    });
                                                    //Jabatan
                                                    $.post('assets/ajax/jabatan.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('jab-pegawai-container-' + (index + 1)).value = data;
                                                    });
                                                    //Pangkat
                                                    $.post('assets/ajax/pangkat.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('pan-pegawai-container-' + (index + 1)).value = data;
                                                    });
                                                    //Golongan
                                                    $.post('assets/ajax/golongan.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('gol-pegawai-container-' + (index + 1)).value = data;
                                                    });
                                                }}
                                            //#endregion
                                        };                          
                                    
                                    </script>
                                </div>
                            </div>

                            <!-- #region Moneeeeeyyyy -->
                                <!-- Alat Angkut yang Digunakan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Alat Angkut yang Digunakan</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Angkutan Darat dan/atau Laut dan/atau Udara" id="alat-angkut-text-input" name="alat-angkut-top-container"></div>
                                </div>
                                <!-- Uang Harian -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Uang Harian</label>
                                    <div class="col-sm-2"><input readonly class="form-control" type="text" placeholder="" value="410000" id="uang-harian-text-input" name="uang-harian-top-container"></div>

                                </div>

                                <!-- uang Taksi -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Biaya Taksi / Transportasi dari/ke Bandara / Pelabuhan / Stasiun / Hotel / Tempat Acara (per orang)</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="Lumpsum jika menggunakan taksi, at cost jika tidak ada taksi" id="uang-taksi-text-input" name="uang-taksi-top-container"></div>
                                </div>

                                <!-- uang Transport -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Biaya Transportasi Pesawat/Kapal/Kereta/Bus (PP)</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="At Cost" id="uang-transport-text-input" name="uang-transport-top-container"></div>
                                </div>

                                <!-- Uang E-Toll -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Uang E-Toll</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="At Cost" id="uang-e-toll-text-input" name="uang-e-toll-top-container"></div>
                                </div>

                                <!-- Uang Penginapan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Uang Penginapan</label>
                                    <div class="col-sm-9"><input type="number" class="form-control" type="text" placeholder="At Cost" id="uang-penginapan-text-input" name="uang-penginapan-top-container"></div>
                                </div>
                            <!-- #endregion -->
                        </div>
                        <div class="tab-pane" id="progress-data-maskapai">
                            <!-- 
                            TODO : Create form with wizard that separate these two area : Maskapai Berangkat and Maskapai pulang
                             -->
                            <!-- #region Data Maskapai Berangkat -->
                                <h4 class="header-title">Data Maskapai Keberangkatan</h4>
                                <p class="card-title-desc"></p>    
                                <!-- Nama Maskapai -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Nama Maskapai</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nama-maskapai-berangkat-text-input" name="nama-maskapai-berangkat-top-container"></div>
                                </div>
                                <!-- Kode Booking -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Kode Booking</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="kode-booking-berangkat-text-input" name="kode-booking-berangkat-top-container"></div>
                                </div>
                                <!-- Nomor Tiket -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Nomor Tiket</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nomor-tiket-berangkat-text-input" name="nomor-tiket-berangkat-top-container"></div>
                                </div>
                                <!-- Nomor Penerbangan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Nomor Penerbangan</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nomor-penerbangan-berangkat-text-input" name="nomor-penerbangan-berangkat-top-container"></div>
                                </div>
                                <!-- Asal -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Kode Bandara Asal</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="kode-bandara-asal-berangkat-text-input" name="kode-bandara-asal-berangkat-top-container"></div>
                                </div>
                                <!-- Tujuan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Kode Bandara Tujuan</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="kode-bandara-tujuan-berangkat-text-input" name="kode-bandara-tujuan-berangkat-top-container"></div>
                                </div>
                                <!-- Tanggal Penerbangan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal Penerbangan</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="tanggal-penerbangan-berangkat-text-input" name="tanggal-penerbangan-berangkat-top-container"></div>
                                </div>
                                <!-- Jam Keberangkatan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Jam Keberangkatan</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="jam-keberangkatan-berangkat-text-input" name="jam-keberangkatan-berangkat-top-container"></div>
                                </div>
                            <!-- #endRegion -->

                            <!-- #region Data Maskapai Kembali -->
                            <h4 class="header-title mt-4">Data Maskapai Kembali</h4>
                            <p class="card-title-desc"></p>
                                <!-- Nama Maskapai -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Nama Maskapai</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nama-maskapai-kembali-text-input" name="nama-maskapai-kembali-top-container"></div>
                                </div>
                                <!-- Kode Booking -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Kode Booking</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="kode-booking-kembali-text-input" name="kode-booking-kembali-top-container"></div>
                                </div>
                                <!-- Nomor Tiket -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Nomor Tiket</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nomor-tiket-kembali-text-input" name="nomor-tiket-kembali-top-container"></div>
                                </div>
                                <!-- Nomor Penerbangan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Nomor Penerbangan</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nomor-penerbangan-kembali-text-input" name="nomor-penerbangan-kembali-top-container"></div>
                                </div>
                                <!-- Asal -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Kode Bandara Asal</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="kode-bandara-asal-kembali-text-input" name="kode-bandara-asal-kembali-top-container"></div>
                                </div>
                                <!-- Tujuan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Kode Bandara Tujuan</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="kode-bandara-tujuan-kembali-text-input" name="kode-bandara-tujuan-kembali-top-container"></div>
                                </div>
                                <!-- Tanggal Penerbangan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal Penerbangan</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="tanggal-penerbangan-kembali-text-input" name="tanggal-penerbangan-kembali-top-container"></div>
                                </div>
                                <!-- Jam Keberangkatan -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Jam Keberangkatan</label>
                                    <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="jam-keberangkatan-kembali-text-input" name="jam-keberangkatan-kembali-top-container"></div>
                                </div>
                            <!-- #endRegion -->
                        </div>
                        <div class="tab-pane" id="progress-konfirmasi">
                            <!-- Konfirmasi -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Apakah data yang dimasukkan sudah benar?</label>
                                <div class="col-sm-9"><input class="form-control" type="text" placeholder="Ketik 'Ya' jika data sudah benar" id="konfirmasi-text-input" onchange="startProcessing()" required></div>

                                <script>
                                    function inputBecameReadOnly(val){
                                        // below code not worked for multiselect
                                        // need another alternative
                                        document.getElementById('sub-bagian-text-input').readOnly = val;
                                        document.getElementById('nomor-surat-tugas-text-input').readOnly = val;
                                        document.getElementById('dasar-surat-text-input').readOnly = val;
                                        document.getElementById('datepicker6').readOnly = val;
                                        document.getElementById('nama-tujuan-text-input').readOnly = val;
                                        document.getElementById('acara-text-input').readOnly = val;
                                        document.getElementById('alat-angkut-text-input').readOnly = val;
                                        document.getElementById('uang-taksi-text-input').readOnly = val;
                                        document.getElementById('uang-transport-text-input').readOnly = val;
                                        document.getElementById('uang-e-toll-text-input').readOnly = val;
                                        document.getElementById('uang-penginapan-text-input').readOnly = val;
                                    }

                                    function startProcessing(){
                                        var confirm = document.getElementById('konfirmasi-text-input');
                                        
                                        if (confirm.value == 'YA' || confirm.value == 'Ya' || confirm.value == 'ya') {
                                            inputBecameReadOnly(true);

                                            //startProcessing

                                            // the dollar function $() can be used as shorthand for the getElementById Function
                                                var jp = document.getElementById('jumlah-pegawai-container');
                                                jp.value = $('.pegawai').val().length;

                                            // #region get All data pegawai                               

                                                var namaAllPegawai = "";
                                                var nipAllPegawai = "";
                                                var golAllPegawai = "";
                                                var panAllPegawai = "";
                                                var jabAllPegawai = "";

                                                //Looping to get multiselect selected options value
                                                for (let index = 0; index < $('.pegawai').val().length; index++) {
                                                    // namaAllPegawai += $('.pegawai').val()[index] + "; ";

                                                    namaAllPegawai += document.getElementById('nama-pegawai-container-'+(index+1)).value + ";";
                                                    nipAllPegawai += document.getElementById('nip-pegawai-container-'+(index+1)).value + ";";
                                                    golAllPegawai += document.getElementById('gol-pegawai-container-'+(index+1)).value + ";";
                                                    panAllPegawai += document.getElementById('pan-pegawai-container-'+(index+1)).value + ";";
                                                    jabAllPegawai += document.getElementById('jab-pegawai-container-'+(index+1)).value + ";";
                                                    // console.log("NIP "+document.getElementById('nip-pegawai-container-'+(index+1)).value);
                                                }
                                            
                                                /* The string are processed like this :
                                                *Step by step
                                                    1. Take the string containing all data
                                                    2. Split it as array using ";" as separator (namaAllPegawai.split(;))
                                                    3. Use shift() to remove the first array
                                                    4. Use push() to place removed element to last place
                                                    5. Use join() to return the array to one single string.
                                                
                                                * Why im doing this?
                                                    Because the last person in pegawai somehow is inserted as first in the string for all of this variable
                                                */ 
                                                // #region Processing String
                                                    var npArray = namaAllPegawai.split(";");
                                                    npArray.push(npArray.shift());
                                                    // console.log("ARRAY "+npArray+npArray.length);
                                                    var rearrangedNP = npArray.join(";");
                                                    var np = document.getElementById('nama-seluruh-pegawai-container');
                                                    np.value = rearrangedNP;

                                                    var napArray = nipAllPegawai.split(";");
                                                    napArray.push(napArray.shift());
                                                    // console.log("ARRAY "+napArray+napArray.length);
                                                    var rearrangedNAP = napArray.join(";");
                                                    var nap = document.getElementById('nip-seluruh-pegawai-container');
                                                    nap.value = rearrangedNAP;

                                                    var gapArray = golAllPegawai.split(";");
                                                    gapArray.push(gapArray.shift());
                                                    // console.log("ARRAY "+gapArray+gapArray.length);
                                                    var rearrangedGAP = gapArray.join(";");
                                                    var gap = document.getElementById('gol-seluruh-pegawai-container');
                                                    gap.value = rearrangedGAP;

                                                    var papArray = panAllPegawai.split(";");
                                                    papArray.push(papArray.shift());
                                                    // console.log("ARRAY "+papArray+papArray.length);
                                                    var rearrangedPAP = papArray.join(";");
                                                    var pap = document.getElementById('pan-seluruh-pegawai-container');
                                                    pap.value = rearrangedPAP;

                                                    var jabArray = jabAllPegawai.split(";");
                                                    jabArray.push(jabArray.shift());
                                                    // console.log("ARRAY "+jabArray+jabArray.length);
                                                    var rearrangedJAB = jabArray.join(";");
                                                    var jap = document.getElementById('jab-seluruh-pegawai-container');
                                                    jap.value = rearrangedJAB;
                                                //#endregion

                                            // #endregion

                                            //#region kalkulasi UH/orang ==================================================================
                                                var subtotal = "";

                                                var uangHarian = document.getElementById('uang-harian-text-input').value;
                                                var durasi = document.getElementById('durasi-number-only').value;
                                                var uangTaksi = document.getElementById('uang-taksi-text-input').value;
                                                var uangTransport = document.getElementById('uang-transport-text-input').value;
                                                var uangEToll = document.getElementById('uang-e-toll-text-input').value;
                                                var uangPenginapan = document.getElementById('uang-penginapan-text-input').value;

                                                var uangHarianSubTotal = uangHarian * durasi;                                 

                                                var uangTransportSubTotal = parseInt(uangTransport) + parseInt(uangEToll);

                                                var uangPenginapanSubTotal = uangPenginapan * durasi;

                                                // var subTotal = parseInt(uangHarianSubTotal) + parseInt(uangTransportSubTotal) + parseInt(uangPenginapanSubTotal);

                                                var biaya = document.getElementById('subtotal-container');
                                                biaya.value = parseInt(uangHarianSubTotal) + parseInt(uangTransportSubTotal) + parseInt(uangPenginapanSubTotal);;
                                                console.log("BIAYA "+biaya.value);

                                                // if (biaya.value != '') {
                                                //     $.post('assets/ajax/numbertoword.php', {
                                                //         number: subTotal.value
                                                //     }, function(data) {
                                                //         document.getElementById('subtotal-terbilang-container').value = data;
                                                //         console.log("DATA "+data);
                                                //     })
                                                // }
                                                
                                            //#endregion

                                        }else{
                                            inputBecameReadOnly(false);
                                        }
                                    }
                                </script>
                            </div>

                            <div class="row mb-3">
                                <button class="btn btn-primary float-right" type="submit" id="btnSubmitDatabase">Submit form</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #region [What User See] -->


                    

                    
                <!-- #endregion -->

                <!-- #region Behind the Scenes Area -->

                    <!-- ============================== -->
                    <!--           CONTAINER            -->
                    <!-- ============================== -->

                    <!-- Isi : 
                        * Data pegawai
                        * nama kota tujuan
                     -->
                    <div style="display:none">

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-12 col-form-label">Container Area</label>
                            <!-- Menampung jumlah pegawai yang berangkat -->
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="jumlah pegawai" id="jumlah-pegawai-container" onchange="generateInput()" name="jumlah-pegawai-container"></div>

                            <!-- Menampung nama hari keberangkatan -->
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="nama hari" id="hari-bottom-container" name="hari-bottom-container"></div>

                            <!-- Menampung nama bulan keberangkatan -->
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="nama bulan" id="bulan-bottom-container" name="bulan-bottom-container"></div>

                            <!-- Menampung nama kota tujuan  -->
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="kota tujuan" id="kota-tujuan-bottom-container" name="kota-tujuan-bottom-container"></div>

                            <!-- Menampung subtotal biaya  -->
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="subtotal biaya" id="subtotal-container" name="subtotal-container"></div>

                            <!-- Menampung subtotal biaya terbilang -->
                            <div class="col-sm-3"><input class="form-control" type="text" placeholder="subtotal biaya" id="subtotal-terbilang-container" name="subtotal-terbilang-container"></div>

                            <!-- #region Data Pegawai -->
                                    <!-- Menampung nama seluruh pegawai  -->
                                    <div class="col-sm-12"><input class="form-control" type="text" placeholder="nama seluruh pegawai" id="nama-seluruh-pegawai-container" name="nama-seluruh-pegawai-container"></div>

                                    <!-- Menampung nip seluruh pegawai  -->
                                    <div class="col-sm-12"><input class="form-control" type="text" placeholder="nip seluruh pegawai" id="nip-seluruh-pegawai-container" name="nip-seluruh-pegawai-container"></div>

                                    <!-- Menampung gol seluruh pegawai  -->
                                    <div class="col-sm-12"><input class="form-control" type="text" placeholder="gol seluruh pegawai" id="gol-seluruh-pegawai-container" name="gol-seluruh-pegawai-container"></div>

                                    <!-- Menampung jab seluruh pegawai  -->
                                    <div class="col-sm-12"><input class="form-control" type="text" placeholder="jab seluruh pegawai" id="jab-seluruh-pegawai-container" name="jab-seluruh-pegawai-container"></div>

                                    <!-- Menampung pan seluruh pegawai  -->
                                    <div class="col-sm-12"><input class="form-control" type="text" placeholder="pan seluruh pegawai" id="pan-seluruh-pegawai-container" name="pan-seluruh-pegawai-container"></div>
                                </div>
                            <!-- #endregion -->

                        </div>

                        <!-- Container untuk data pegawai -->
                        <?php for ($i=1; $i < 99; $i++):?>  
                            <div id="containerpegawai" class="row mb-12" style="display:none"> 
                                <div class="col-sm-2"><input class="form-control" type="text" placeholder="nama pegawai <?= $i?>"       id="nama-pegawai-container-<?= $i?>"    name="nama-pegawai-bottom-container-<?= $i?>"></div>
                                <div class="col-sm-2"><input class="form-control" type="text" placeholder="nip pegawai <?= $i?>"        id="nip-pegawai-container-<?= $i?>"     name="nip-pegawai-bottom-container-<?= $i?>"></div>
                                <div class="col-sm-2"><input class="form-control" type="text" placeholder="jabatan pegawai <?= $i?>"    id="jab-pegawai-container-<?= $i?>"     name="jab-pegawai-bottom-container-<?= $i?>"></div>
                                <div class="col-sm-2"><input class="form-control" type="text" placeholder="golongan pegawai <?= $i?>"   id="gol-pegawai-container-<?= $i?>"     name="gol-pegawai-bottom-container-<?= $i?>"></div>
                                <div class="col-sm-2"><input class="form-control" type="text" placeholder="pangkat pegawai <?= $i?>"    id="pan-pegawai-container-<?= $i?>"     name="pan-pegawai-bottom-container-<?= $i?>"></div>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <!-- Menampung nama kota tujuan -->
                        

                <!-- #endregion -->

                <!-- ======================================= -->
                <!-- BUTTONS                                 -->
                <!-- ======================================= -->
            </form>

<!-- #region BOILERPLATE -->
                </div>
            </div>
        </div>
    </div>
<!-- #endregion -->