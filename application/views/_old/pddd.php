<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Form Perjalanan Dinas Dalam Daerah</h4>
                <p class="card-title-desc">Isi data-data dibawah untuk membuat dokumen Perjalanan Dinas Dalam Daerah</p>

                <form action="<?= base_url(); ?>PDDD/tambahData" method="post" autocomplete="off">
                    <!-- Data kabag -->
                    <div class="row" style="display: none;">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dasarSurat" class="form-label">namakabag</label>
                                <input type="text" class="form-control" name="namakabag" id="namakabag">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="dasarSurat" class="form-label">nipkabag</label>
                                <input type="text" class="form-control" name="nipkabag" id="nipkabag">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="dasarSurat" class="form-label">pankabag</label>
                                <input type="text" class="form-control" name="pankabag" id="pankabag">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="dasarSurat" class="form-label">golkabag</label>
                                <input type="text" class="form-control" name="golkabag" id="golkabag">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dasarSurat" class="form-label">jabkabag</label>
                                <input type="text" class="form-control" name="jabkabag" id="jabkabag">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="dasarSurat" class="form-label">kodebagian</label>
                                <input type="text" class="form-control" name="kodebagian" id="kodebagian">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Nomor Surat -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Nomor Surat" class="form-label">Nomor Surat</label>
                                <input type="text" class="form-control" name="nomorSuratTugas" id="nomorSuratTugas" placeholder="Cukup tulis angka didalam kurung 094/(     )/35.07.xx." row required>
                            </div>
                        </div>
                        <!-- kegiatan -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kegiatan" class="form-label">Kegiatan Sub Bagian</label>
                                <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan" row required>
                            </div>
                        </div>
                    </div>

                    <!-- dasarSurat -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dasarSurat" class="form-label">Dasar Surat</label>
                                <input type="text" class="form-control" name="dasarSurat" id="dasarSurat" placeholder="Dasar Surat" onchange="cus()" row required>
                                <script>
                                    function cus() {
                                        $.post('assets/ajax/namakabag.php', {
                                            idBag: <?= $this->session->userdata('idBagian') ?>
                                        }, function(data) {
                                            document.getElementById('namakabag').value = data;
                                        });
                                        //NIP
                                        $.post('assets/ajax/nipkabag.php', {
                                            idBag: <?= $this->session->userdata('idBagian') ?>
                                        }, function(data) {
                                            document.getElementById('nipkabag').value = data;
                                        });
                                        //Jabatan
                                        $.post('assets/ajax/jabkabag.php', {
                                            idBag: <?= $this->session->userdata('idBagian') ?>
                                        }, function(data) {
                                            document.getElementById('jabkabag').value = data;
                                        });
                                        //Pangkat
                                        $.post('assets/ajax/pankabag.php', {
                                            idBag: <?= $this->session->userdata('idBagian') ?>
                                        }, function(data) {
                                            document.getElementById('pankabag').value = data;
                                        });
                                        //Golongan
                                        $.post('assets/ajax/golkabag.php', {
                                            idBag: <?= $this->session->userdata('idBagian') ?>
                                        }, function(data) {
                                            document.getElementById('golkabag').value = data;
                                        });

                                        //kode bagian
                                        $.post('assets/ajax/kodebagian.php', {
                                            idBag: <?= $this->session->userdata('idBagian') ?>
                                        }, function(data) {
                                            document.getElementById('kodebagian').value = data;
                                        });
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <!-- Tanggal Berangkat dan Pulang | Durasi -->
                    <div class="row">
                        <!-- Tanggal Berangkat dan Pulang -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Berangkat dan Pulang</label>
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="dd MM, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                    <input type="text" name="startDate" id="startDate" class="form-control" name="start" placeholder="Berangkat" required />
                                    <input type="text" name="endDate" id="endDate" class="form-control" name="end" placeholder="Pulang" required />

                                </div>

                                <!-- =================== -->
                                <!-- Get Date Difference -->
                                <script>
                                    document.getElementById("startDate").onchange = function() {
                                        getDay();
                                        calculateDuration();
                                    };

                                    function getDay() {
                                        var listHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                        document.getElementById('hari').value = listHari[new Date(document.getElementById('startDate').value).getDay()];

                                        var listHari = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        document.getElementById('bulan').value = listHari[new Date(document.getElementById('startDate').value).getMonth()];
                                    }

                                    document.getElementById("endDate").onchange = function() {
                                        calculateDuration()
                                    };

                                    function calculateDuration() {

                                        var durasi_hari = document.getElementById('durasi');

                                        var date1 = new Date(document.getElementById('startDate').value);
                                        var date2 = new Date(document.getElementById('endDate').value);
                                        var timeDiff = Math.abs(date2.getTime() - date1.getTime());

                                        var days = Math.floor(timeDiff / (1000 * 3600 * 24));
                                        var months = Math.floor(days / 31);
                                        var years = Math.floor(months / 12);

                                        durasi_hari.value = days + 1 + " hari";
                                        document.getElementById('durasinumonly').value = days + 1;

                                        //Durasi Terbilang
                                        if (durasi_hari.value != '') {
                                            $.post('assets/ajax/numbertoword.php', {
                                                number: durasi_hari.value
                                            }, function(data) {
                                                document.getElementById('durasiTerbilang').value = data;
                                            })
                                        }
                                    }
                                </script>
                                <!-- =================== -->
                            </div>
                        </div>
                        <!-- Durasi -->
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="durasi">Durasi</label>
                                <input readonly type="text" class="form-control" id="durasi" name="durasi">
                            </div>
                        </div>

                        <!-- 8 jam -->
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="durasi">Lebih dari 8 Jam</label>

                                <select class="form-select select2 form-control-lg durasi8jam" name="durasi8jam" id="durasi8jam" onchange="get8jam()" id="durasi8jam" required>
                                    <option value="opsi">Ya/Tidak</option>
                                    <option value="tidak">Tidak</option>
                                    <option value="ya">Ya</option>

                                </select>

                                <script>
                                    function get8jam() {

                                        // Jika durasi 8 jam = true
                                        if ($('#durasi8jam').val() == "ya") {
                                            document.getElementById('nominalUH').value = 160000;

                                            document.getElementById('8jamyatidak').value = "Y";

                                            // Kalkulasi uang harian total
                                            document.getElementById('nominalTotalUH').value = (document.getElementById('nominalUH').value * document.getElementById('durasinumonly').value);

                                            // Get UT Value
                                            if ($('#kota-kecamatan').val() != '') {
                                                $.post('assets/ajax/calculateUangRadius.php', {
                                                    namaKotaKec: $('#kota-kecamatan').val()
                                                }, function(data) {
                                                    document.getElementById('nominalUT').value = data;
                                                });
                                            }
                                            // Kalkulasi total + transport per orang
                                            //document.getElementById('nominalPerOrang').value = (document.getElementById('nominalUH').value * document.getElementById('durasinumonly').value * document.getElementById('nominalUT').value);

                                            // Grand Total
                                            biaya.value = (parseInt((document.getElementById('nominalUH').value)) + parseInt((document.getElementById('nominalUT').value))) * pegLength * (days + 1);

                                        } else {
                                            document.getElementById('nominalUH').value = 125000;
                                            document.getElementById('nominalUT').value = 0;

                                            document.getElementById('8jamyatidak').value = "T";

                                            //Kalkulasi uang harian total
                                            document.getElementById('nominalTotalUH').value = (document.getElementById('nominalUH').value * document.getElementById('durasinumonly').value);

                                            // Kalkulasi total + transport per orang
                                            //document.getElementById('nominalPerOrang').value = (document.getElementById('nominalUH').value * document.getElementById('durasinumonly').value);


                                            $('#kota-kecamatan').val("");
                                        }

                                        // Uang Representasi pak sekda
                                        if ($('#durasi8jam').val() == "ya") {
                                            biaya.value = (parseInt((document.getElementById('nominalUH').value)) + parseInt((document.getElementById('nominalUT').value))) * pegLength * (days + 1);
                                            // console.log($('.pegawai').val());
                                            if ($('.pegawai').val() == "Dr. Ir. WAHYU HIDAYAT, M.M.") {
                                                biaya.value = (parseInt((document.getElementById('nominalUH').value)) + parseInt((document.getElementById('nominalUT').value)) + parseInt('75000')) * pegLength * (days + 1);
                                            }
                                        } else {
                                            biaya.value = (parseInt(document.getElementById('nominalUH').value) * pegLength * (days + 1));
                                            // console.log($('.pegawai').val());
                                        }
                                    }
                                </script>
                            </div>
                        </div>

                        <!-- Durasi Number Only -->
                        <div class="col-lg-3" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label" for="durasi">Durasi</label>
                                <input readonly type="text" class="form-control" id="durasinumonly" name="durasinumonly">
                            </div>
                        </div>
                        <!-- Durasi Terbilang -->
                        <div class="col-lg-3" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label" for="durasi">Terbilang</label>
                                <input readonly type="text" class="form-control" id="durasiTerbilang" name="durasiTerbilang">
                            </div>
                        </div>
                        <!-- Nominal UH -->
                        <div class="col-lg-3" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label" for="durasi">Nominal Uang Harian</label>
                                <input readonly type="text" class="form-control" id="nominalUH" name="nominalUH">
                            </div>
                        </div>
                        <!-- Total UH Per Orang -->
                        <div class="col-lg-3" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label" for="durasi">Total Uang Harian Per Orang</label>
                                <input readonly type="text" class="form-control" id="nominalTotalUH" name="nominalTotalUH">
                            </div>
                        </div>
                        <!-- Nominal Uang Transport -->
                        <div class="col-lg-3" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label" for="durasi">Nominal Uang Transport</label>
                                <input readonly type="text" class="form-control" id="nominalUT" name="nominalUT">
                            </div>
                        </div>
                        <!-- Total Nominal Per Orang -->
                        <div class="col-lg-3" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label" for="durasi">Total Nominal Per Orang</label>
                                <input readonly type="text" class="form-control" id="nominalPerOrang" name="nominalPerOrang">
                            </div>
                        </div>
                        <!-- Nominal Uang Representatif -->
                        <div class="col-lg-3" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label" for="durasi">UR</label>
                                <input readonly type="text" class="form-control" id="nominalUR" name="nominalUR">
                            </div>
                        </div>
                    </div>
                    <!-- Kantor-Gedung / Kota-Kecamatan -->
                    <div class="row">
                        <!-- Kantor/Gedung -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Kantor/Gedung/Nama Lokasi" required>

                            </div>
                        </div>
                        <!-- #region OLD SCRIPT -->
                            <!-- OLD SCRIPT ============================================================================================================= -->
                            <!-- Kota - Kecamatan -->
                            <!-- <div class="col-lg-6" style="display: none;">
                                <div class="mb-3">
                                    <label for="kota-kecamatan" class="form-label">Kota / Kecamatan</label>
                                    <select class="form-select select2 form-control-lg kota-kecamatan" name="kota-kecamatan" id="kota-kecamatan" onchange="getDataKotaKecamatan()" required>
                                        <option value="pilih">Pilih Kota/Kecamatan</option>
                                        


                                        <?php foreach ($tujuan as $tujuanKolom) : ?>
                                            <option><?= $tujuanKolom['namaTujuan']; ?></option>
                                        <?php endforeach; ?>


                                    </select>
                                    <script>
                                        function getDataKotaKecamatan() {
                                            var namaKotaKecamatan = $('#kota-kecamatan').val();
                                            // console.log(namaKotaKecamatan);

                                            /**
                                            * If 8jam is true :
                                            * + uang transport (radius)
                                            * + uang representatif (khusus eselon 2) [Pak sekda / asisten 1-2-3]
                                            */
                                            if ($('#durasi8jam').val() == "ya") {
                                                $.post('assets/ajax/calculateUangRadius.php', {
                                                    namaKotaKec: $('#kota-kecamatan').val()
                                                }, function(data) {
                                                    document.getElementById('nominalUT').value = data;
                                                });
                                            } else {
                                                document.getElementById('nominalUT').value = 0;
                                            }

                                            if ($('#durasi8jam').val() == "ya") {
                                                biaya.value = (parseInt((document.getElementById('nominalUH').value)) + parseInt((document.getElementById('nominalUT').value))) * pegLength * (days + 1);
                                                // console.log($('.pegawai').val());
                                                if ($('.pegawai').val() == "Dr. Ir. WAHYU HIDAYAT, M.M.") {
                                                    biaya.value = (parseInt((document.getElementById('nominalUH').value)) + parseInt((document.getElementById('nominalUT').value)) + parseInt('75000')) * pegLength * (days + 1);
                                                }
                                            } else {
                                                biaya.value = (parseInt(document.getElementById('nominalUH').value) * pegLength * (days + 1));
                                                // console.log($('.pegawai').val());
                                            }
                                        }
                                    </script>

                                </div>
                            </div> -->
                            <!-- ======================================================================================================================== -->
                        <!-- #endregion -->

                        <!-- Kota - Kecamatan -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="kota-kecamatan" class="form-label">Kota / Kecamatan</label>
                                <select class="select2 form-control select2-multiple kota-kecamatan" multiple="multiple" name="kota-kecamatan" id="kota-kecamatan" onchange="getDataKotaKecamatan()" required>
                                    <option value="pilih">Pilih Kota/Kecamatan</option>


                                    <?php foreach ($tujuan as $tujuanKolom) : ?>
                                        <option><?= $tujuanKolom['namaTujuan']; ?></option>
                                    <?php endforeach; ?>


                                </select>
                                <script>
                                    function getDataKotaKecamatan() {
                                        var namaKotaKecamatan = $('#kota-kecamatan').val();

                                        //=====================================================================
                                        // Set maximal selection length
                                        //=====================================================================
                                        $(".kota-kecamatan").select2({
                                            maximumSelectionLength: 3
                                        });

                                        document.getElementById('jumlahTujuan').value = $('.kota-kecamatan').val().length;

                                        //=====================================================================
                                        // Changes the order of items - item selected by user are moved to the end.
                                        //=====================================================================
                                        $("select").on("select2:select", function(evt) {
                                            var element = evt.params.data.element;
                                            var $element = $(element);

                                            $element.detach();
                                            $(this).append($element);
                                            $(this).trigger("change");
                                        });

                                        //=====================================================================
                                        // Get all nominal uang transport from each location
                                        //=====================================================================
                                        for (let index = 0; index < $('.kota-kecamatan').val().length; index++) {
                                            var np = $('.kota-kecamatan').val()[index];

                                            $.post('assets/ajax/calculateUangRadius.php', {
                                                namaKotaKec: np
                                            }, function(data) {
                                                document.getElementById('nominalUT' + (index + 1)).value = data;
                                            });
                                        }
                                        // console.log(namaKotaKecamatan);

                                        var listTujuan = "";

                                        //Looping to get multiselect selected options value
                                        for (let index = 0; index < $('.kota-kecamatan').val().length; index++) {
                                            listTujuan += $('.kota-kecamatan').val()[index] + ", ";
                                        }

                                        var kt = document.getElementById('koleksiTujuan');
                                        kt.value = listTujuan;

                                        /**
                                         * If 8jam is true :
                                         * + uang transport (radius)
                                         * + uang representatif (khusus eselon 2) [Pak sekda / asisten 1-2-3]
                                         */
                                        if ($('#durasi8jam').val() == "ya") {
                                            console.log(document.getElementById('nominalUT1').value);
                                            console.log(document.getElementById('nominalUT2').value);
                                            console.log(document.getElementById('nominalUT3').value);
                                            // var highestUT = Math.max(
                                            //     document.getElementById('nominalUT1').value,
                                            //     document.getElementById('nominalUT2').value,
                                            //     document.getElementById('nominalUT3').value)
                                            // document.getElementById('nominalUT').value = highestUT;
                                            // console.log("UUUTTT ".highestUT);
                                        } else {
                                            document.getElementById('nominalUT').value = 0;
                                        }

                                        if ($('#durasi8jam').val() == "ya") {
                                            biaya.value = (parseInt((document.getElementById('nominalUH').value)) + parseInt((document.getElementById('nominalUT').value))) * pegLength * (days + 1);
                                            if ($('.pegawai').val() == "Dr. Ir. WAHYU HIDAYAT, M.M.") {
                                                biaya.value = (parseInt((document.getElementById('nominalUH').value)) + parseInt((document.getElementById('nominalUT').value)) + parseInt('75000')) * pegLength * (days + 1);
                                            }
                                        } else {
                                            biaya.value = (parseInt(document.getElementById('nominalUH').value) * pegLength * (days + 1));
                                        }
                                    }
                                </script>

                            </div>
                        </div>
                        <!-- Nominal UT -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="acara" class="form-label">nominalUT1</label>
                                    <input type="text" class="form-control" id="nominalUT1" placeholder="nominalUT1" name="nominalUT1">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="acara" class="form-label">nominalUT2</label>
                                    <input type="text" class="form-control" id="nominalUT2" placeholder="nominalUT2" name="nominalUT2">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="acara" class="form-label">nominalUT3</label>
                                    <input type="text" class="form-control" id="nominalUT3" placeholder="nominalUT3" name="nominalUT3">

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Acara -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="acara" class="form-label">Acara</label>
                                <input type="text" class="form-control" id="acara" placeholder="Acara" name="acara" required>

                            </div>
                        </div>
                    </div>
                    <!-- Data Pegawai -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Masukkan Data Pegawai yang Berangkat</label>

                                <select id="pegawai-dropdown pegawai" class="select2 form-control select2-multiple pegawai" multiple="multiple" onchange="custFunc()" required>

                                    <?php foreach ($pegawai as $pegawaiKolom) : ?>
                                        <option><?= $pegawaiKolom['namaPegawai'] ?></option>
                                    <?php endforeach; ?>

                                </select>

                                <label class="form-label mt-3" id="pernah-perdin"></label>
                                <script>
                                    function custFunc() {
                                        //=====================================================================
                                        // Set maximal selection length
                                        //=====================================================================
                                        $(".select2-multiple").select2({
                                            maximumSelectionLength: 10
                                        });

                                        //=====================================================================
                                        // Changes the order of items - item selected by user are moved to the end.
                                        //=====================================================================
                                        $("select").on("select2:select", function(evt) {
                                            var element = evt.params.data.element;
                                            var $element = $(element);

                                            $element.detach();
                                            $(this).append($element);
                                            $(this).trigger("change");
                                        });

                                        //Get length of pegawai
                                        var pegLength = $('.pegawai').val().length;

                                        var listNamaPegawai = "";

                                        //Looping to get multiselect selected options value
                                        for (let index = 0; index < $('.pegawai').val().length; index++) {
                                            listNamaPegawai += $('.pegawai').val()[index] + "; ";
                                        }

                                        //find element 'jmlPeg' and set value to length of pegawai
                                        var jp = document.getElementById('jmlPeg');
                                        jp.value = pegLength;

                                        //find element 'namaPeg' and set value to all selected 
                                        var np = document.getElementById('namaPeg');
                                        np.value = listNamaPegawai;

                                        //=====================================================================
                                        // Days calculations for UH
                                        //=====================================================================
                                        var date1 = new Date(document.getElementById('startDate').value);
                                        var date2 = new Date(document.getElementById('endDate').value);
                                        var timeDiff = Math.abs(date2.getTime() - date1.getTime());

                                        var days = Math.floor(timeDiff / (1000 * 3600 * 24));

                                        var biaya = document.getElementById('totalBiaya');

                                        // if (document.getElementById('lebihdari8jam').value != '') {
                                        //     biaya.value = (160000 + document.getElementById('uangtransport').value) * pegLength * (days + 1);
                                        // } else {
                                        //     biaya.value = 125000 * pegLength * (days + 1);
                                        // }

                                        if ($('#durasi8jam').val() == "ya") {
                                            biaya.value = (parseInt((document.getElementById('nominalUH').value)) + parseInt((document.getElementById('nominalUT').value))) * pegLength * (days + 1);
                                            // console.log($('.pegawai').val());
                                            if ($('.pegawai').val() == "Dr. Ir. WAHYU HIDAYAT, M.M.") {
                                                biaya.value = (parseInt((document.getElementById('nominalUH').value)) + parseInt((document.getElementById('nominalUT').value)) + parseInt('75000')) * pegLength * (days + 1);
                                            }
                                        } else {
                                            biaya.value = (parseInt(document.getElementById('nominalUH').value) * pegLength * (parseInt(document.getElementById('jumlahTujuan').value) * (days + 1)));
                                            // console.log($('.pegawai').val());
                                        }

                                        // biaya.value = 125000 * pegLength * (days + 1);
                                        //=====================================================================
                                        // Convert biaya to word
                                        //=====================================================================

                                        if (biaya.value != '') {
                                            $.post('assets/ajax/numbertoword.php', {
                                                number: biaya.value
                                            }, function(data) {
                                                document.getElementById('totalBiayaTerbilang').value = data;
                                            })
                                        }

                                        //=====================================================================
                                        // Check if that pegawai already do perdin on that specific location 
                                        // and on that specific date
                                        //=====================================================================
                                        if (document.getElementById('startDate').value != '' &&
                                            document.getElementById('kota-kecamatan').value != '') {
                                            $.post('assets/ajax/checkPrevData.php', {
                                                tanggal: document.getElementById('startDate').value,
                                                lokasi: document.getElementById('kota-kecamatan').value,
                                                namaPegawai: $('.pegawai').val()[($('.pegawai').val().length) - 1]
                                            }, function(data) {
                                                if (data != '') {
                                                    // alert(
                                                    //     $('.pegawai').val()[($('.pegawai').val().length) - 1] +
                                                    //     " sudah pernah melakukan \nperjalanan dinas ke " +
                                                    //     document.getElementById('startDate').value +
                                                    //     " pada tanggal " + document.getElementById('startDate').value);

                                                    document.getElementById('pernah-perdin').innerHTML =
                                                        $('.pegawai').val()[($('.pegawai').val().length) - 1] +
                                                        " sudah pernah melakukan \nperjalanan dinas ke " +
                                                        document.getElementById('kota-kecamatan').value +
                                                        " pada tanggal " + document.getElementById('startDate').value;

                                                    // $(".pegawai").val([]).change();
                                                }
                                            })
                                        }

                                        //=====================================================================
                                        // Get data nip and jabatan based on pegawai name
                                        //=====================================================================
                                        // #region AJAX
                                            for (let index = 0; index < $('.pegawai').val().length; index++) {
                                                var np = $('.pegawai').val()[index];
                                                if (np != '') {
                                                    //NamaPegawai
                                                    $.post('assets/ajax/nampeg.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('peg' + (index + 1)).value = data;
                                                    });
                                                    //NIP
                                                    $.post('assets/ajax/nip.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('nip' + (index + 1)).value = data;
                                                    });
                                                    //Jabatan
                                                    $.post('assets/ajax/jabatan.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('jab' + (index + 1)).value = data;
                                                    });
                                                    //Pangkat
                                                    $.post('assets/ajax/pangkat.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('pan' + (index + 1)).value = data;
                                                    });
                                                    //Golongan
                                                    $.post('assets/ajax/golongan.php', {
                                                        nampeg: np
                                                    }, function(data) {
                                                        document.getElementById('gol' + (index + 1)).value = data;
                                                    });
                                                }
                                            }
                                        // #endregion
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                    <!-- ======================================= -->
                    <!-- Modern problem require ancient solution -->
                    <!-- ======================================= -->
                    <!-- #region Container -->
                        <!-- Jumlah Pegawai berangkat -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Jumlah Pegawai yang Berangkat</label>
                                    <input type="text" class="form-control" id="jmlPeg" name="jmlPeg" placeholder="Jumlah Pegawai yang Berangkat">

                                </div>
                            </div>
                        </div>

                        <!-- All Nama pegawai -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Nama Semua Pegawai Yang Berangkat</label>
                                    <input type="text" class="form-control" id="namaPeg" name="namaPeg" placeholder="Nama Pegawai yang Berangkat">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total biaya  -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Total Biaya yang Dikeluarkan</label>
                                    <input type="text" class="form-control" id="totalBiaya" name="totalBiaya" placeholder="Total Biaya yang Dikeluarkan">

                                </div>
                            </div>
                        </div>
                        <!-- Total biaya terbilang -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Total Biaya Terbilang</label>
                                    <input type="text" class="form-control" id="totalBiayaTerbilang" name="totalBiayaTerbilang" placeholder="Total Biaya yang Dikeluarkan">

                                </div>
                            </div>
                        </div>
                        <!-- Pegawai 1-10 -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai1</label>
                                    <input type="text" class="form-control" id="peg1" name="peg1" placeholder="Pegawai1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai2</label>
                                    <input type="text" class="form-control" id="peg2" name="peg2" placeholder="Pegawai1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai3</label>
                                    <input type="text" class="form-control" id="peg3" name="peg3" placeholder="Pegawai1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai4</label>
                                    <input type="text" class="form-control" id="peg4" name="peg4" placeholder="Pegawai1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai5</label>
                                    <input type="text" class="form-control" id="peg5" name="peg5" placeholder="Pegawai1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai6</label>
                                    <input type="text" class="form-control" id="peg6" name="peg6" placeholder="Pegawai1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai7</label>
                                    <input type="text" class="form-control" id="peg7" name="peg7" placeholder="Pegawai1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai8</label>
                                    <input type="text" class="form-control" id="peg8" name="peg8" placeholder="Pegawai1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai9</label>
                                    <input type="text" class="form-control" id="peg9" name="peg9" placeholder="Pegawai1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Pegawai10</label>
                                    <input type="text" class="form-control" id="peg10" name="peg10" placeholder="Pegawai1">
                                </div>
                            </div>
                        </div>
                        <!-- NIP 1-10 -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP1</label>
                                    <input type="text" class="form-control" id="nip1" name="nip1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP2</label>
                                    <input type="text" class="form-control" id="nip2" name="nip2">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP3</label>
                                    <input type="text" class="form-control" id="nip3" name="nip3">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP4</label>
                                    <input type="text" class="form-control" id="nip4" name="nip4">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP5</label>
                                    <input type="text" class="form-control" id="nip5" name="nip5">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP6</label>
                                    <input type="text" class="form-control" id="nip6" name="nip6">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP7</label>
                                    <input type="text" class="form-control" id="nip7" name="nip7">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP8</label>
                                    <input type="text" class="form-control" id="nip8" name="nip8">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP9</label>
                                    <input type="text" class="form-control" id="nip9" name="nip9">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">NIP10</label>
                                    <input type="text" class="form-control" id="nip10" name="nip10">
                                </div>
                            </div>
                        </div>
                        <!-- Jabatan 1-10 -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB1</label>
                                    <input type="text" class="form-control" id="jab1" name="jab1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB2</label>
                                    <input type="text" class="form-control" id="jab2" name="jab2">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB3</label>
                                    <input type="text" class="form-control" id="jab3" name="jab3">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB4</label>
                                    <input type="text" class="form-control" id="jab4" name="jab4">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB5</label>
                                    <input type="text" class="form-control" id="jab5" name="jab5">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB6</label>
                                    <input type="text" class="form-control" id="jab6" name="jab6">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB7</label>
                                    <input type="text" class="form-control" id="jab7" name="jab7">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB8</label>
                                    <input type="text" class="form-control" id="jab8" name="jab8">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB9</label>
                                    <input type="text" class="form-control" id="jab9" name="jab9">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">JAB10</label>
                                    <input type="text" class="form-control" id="jab10" name="jab10">
                                </div>
                            </div>
                        </div>
                        <!-- Pangkat 1-10 -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN1</label>
                                    <input type="text" class="form-control" id="pan1" name="pan1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN2</label>
                                    <input type="text" class="form-control" id="pan2" name="pan2">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN3</label>
                                    <input type="text" class="form-control" id="pan3" name="pan3">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN4</label>
                                    <input type="text" class="form-control" id="pan4" name="pan4">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN5</label>
                                    <input type="text" class="form-control" id="pan5" name="pan5">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN6</label>
                                    <input type="text" class="form-control" id="pan6" name="pan6">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN7</label>
                                    <input type="text" class="form-control" id="pan7" name="pan7">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN8</label>
                                    <input type="text" class="form-control" id="pan8" name="pan8">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN9</label>
                                    <input type="text" class="form-control" id="pan9" name="pan9">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">PAN10</label>
                                    <input type="text" class="form-control" id="pan10" name="pan10">
                                </div>
                            </div>
                        </div>
                        <!-- Golongan 1-10 -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL1</label>
                                    <input type="text" class="form-control" id="gol1" name="gol1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL2</label>
                                    <input type="text" class="form-control" id="gol2" name="gol2">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL3</label>
                                    <input type="text" class="form-control" id="gol3" name="gol3">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL4</label>
                                    <input type="text" class="form-control" id="gol4" name="gol4">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL5</label>
                                    <input type="text" class="form-control" id="gol5" name="gol5">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL6</label>
                                    <input type="text" class="form-control" id="gol6" name="gol6">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL7</label>
                                    <input type="text" class="form-control" id="gol7" name="gol7">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL8</label>
                                    <input type="text" class="form-control" id="gol8" name="gol8">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL9</label>
                                    <input type="text" class="form-control" id="gol9" name="gol9">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">GOL10</label>
                                    <input type="text" class="form-control" id="gol10" name="gol10">
                                </div>
                            </div>
                        </div>
                        <!-- Hari | Bulan -->
                        <div class="row" style="display: none;">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Hari</label>
                                    <input type="text" class="form-control" id="hari" name="hari">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Bulan</label>
                                    <input type="text" class="form-control" id="bulan" name="bulan">
                                </div>
                            </div>
                        </div>

                        <!-- 8 Jam ya tidak-->
                        <div class="row" style="display: none;">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">8 Jam</label>
                                    <input type="text" class="form-control" id="8jamyatidak" name="8jamyatidak">
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Tujuan-->
                        <div class="row" style="display: none;">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">jumlah tujuan</label>
                                    <input type="text" class="form-control" id="jumlahTujuan" name="jumlahTujuan">
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Tujuan-->
                        <div class="row" style="display: none;">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">nama tujuan</label>
                                    <input type="text" class="form-control" id="koleksiTujuan" name="koleksiTujuan">
                                </div>
                            </div>
                        </div>
                    <!-- #endregion -->

                    <!-- ======================================= -->
                    <!-- BUTTONS                                 -->
                    <!-- ======================================= -->

                    <div>
                        <button class="btn btn-primary float-right" type="submit" id="btnSubmitDatabase">Submit form</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>