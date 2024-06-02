<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Download Rekapitulasi Per Kegiatan</h4>
                <p class="card-title-desc"></p>

                <form id="formDownloadRekapitulasi" method="post" autocomplete="off">

                <!-- ================== -->
                <!-- ANCHOR VIEW        -->
                <!-- ================== -->

                    <!-- {Perjadin Setting} -->
                        <div id="perjadin-input" style="display:" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Jenis Perjalanan Dinas</label>
                            <div class="col-sm-9">
                                    <select class="select2 form-control select2-multiple kategori-perjadin-input" multiple="multiple" name="kategori-perjadin-input" id="kategori-perjadin-input" onChange="onChangeKategoriPerjadin()" required>
                                    <option disabled> --- Pilih Jenis Perjalanan Dinas --- </option>
                                    <option value=dd> Perjalanan Dinas Dalam Daerah </option>
                                    <option value=ld> Perjalanan Dinas Luar Daerah </option>
                                    <option value=lp> Perjalanan Dinas Luar Provinsi </option>
                                </select>
                            </div>
                        </div>
                    <!--  -->

                    <!-- {Download Setting} -->
                        <div id="download-input" style="display:" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Kategori Download Laporan</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control select2-multiple kategori-download-input" multiple="multiple" name="kategori-download-input" id="kategori-download-input" onChange="onChangeKategoriDownload()" required>
                                    <option disabled> --- Pilih Kategori Download --- </option>
                                    <option value=1> Per Bulan (Kegiatan + Sub Kegiatan) </option>
                                    <option value=2> Per Kegiatan </option>
                                    <option value=3> Per Sub Kegiatan </option>
                                </select>
                            </div>
                        </div>
                    <!--  -->
                    
                    <!-- {Kegiatan} -->
                    <div id="div-kegiatan-input" style="display:none" class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Kegiatan</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control select2-multiple kegiatan-input" multiple="multiple" name="kegiatan-input" id="kegiatan-input" onChange="onChangeKegiatan()">

                            <!-- @ FIX THIS @ -->
                                <?php foreach ($kodekegiatan as $kodekegiatan) : ?>
                                    <option><?= $kodekegiatan['descKegiatan']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                    <!-- qr : stored inside {sub kegiatan} -->
                    <div id="div-sub-kegiatan-input" style="display:none" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Sub Kegiatan *</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control select2-multiple sub-kegiatan-input" multiple="multiple" name="sub-kegiatan-input" id="sub-kegiatan-input" onchange="onChangeSubKegiatan()">

                                    <option disabled>--- Pilih Kegiatan ---</option>

                                </select>
                            </div>
                        </div>
                    <!--  -->

                    <!-- {Kode Tanggal Berangkat dan Kembali} -->
                        <div id="datepicker-berangkat-kembali" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal Berangkat dan Kembali *</label>
                            <div class="col-sm-4">
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="MM, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                    <input type="text" name="startDate" id="startDate" class="form-control" name="start" placeholder="Berangkat"/>
                                    <!-- <input type="text" name="endDate" id="endDate" class="form-control" name="end" placeholder="Pulang"/> -->
                                </div>
                            </div>
                        </div>
                    <!--  -->

                <!-- ======================================= -->
                <!-- ANCHOR BUTTONS                          -->
                <!-- ======================================= -->

                    <div>
                        <button onclick="setParam()" class="btn btn-primary float-right" type="submit" id="btnSubmitDatabase">Submit form</button>
                    </div>

                <!-- ================== -->
                <!-- ANCHOR CONTAINER   -->
                <!-- ================== -->

                    <div style="display:none">
                        <label class="col-sm-12 col-form-label alert alert-info mt-3"> Container Area </label>

                        <!-- @ idbagian @ -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">idbagian-container </label>
                                    <div class="col-sm-10"><input readonly class="form-control" type="text" id="idbagian-container" name="idbagian-container" value="<?= $idBagian; ?>"></div>
                            </div>
                        <!--  -->

                        <!-- @ Kategori Download @ -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">kategori-perjadin-container </label>
                                    <div class="col-sm-4"><input class="form-control" type="text" id="kategori-perjadin-container" name="kategori-perjadin-container" readonly></div>
                                <label for="example-text-input" class="col-sm-2 col-form-label">kategori-download-container </label>
                                    <div class="col-sm-4"><input class="form-control" type="text" id="kategori-download-container" name="kategori-download-container" readonly></div>
                            </div>
                        <!--  -->

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

                        <!-- @ Tanggal Berangkat dan Kembali @ -->

                            <label class="col-sm-12 col-form-label alert alert-info mt-3"> Date and Durations (ID) </label>

                            <!-- {Hari Bulan Date Sorter} -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Bulan</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="bulan-container" name="bulan-container"></div>
                                </div>

                                <label class="col-sm-12 col-form-label alert alert-info mt-3"> Date and Durations (EN) </label>

                                <!-- {Hari Bulan Date Sorter} -->
                                <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">bulan-en</label>
                                        <div class="col-sm-2"><input class="form-control" type="text" id="bulan-en-container" name="bulan-en-container"></div>
                                </div>
                        <!--  -->
                    </div>

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

                            var listHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                            var listBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            var listBulan_en = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];


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
                        // =========================================================================================
                        // {KATEGORI PERJADIN} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            function onChangeKategoriPerjadin(){
                                $(".kategori-perjadin-input").select2({
                                    maximumSelectionLength:1
                                });
                                gebid('kategori-perjadin-container').value = $(".kategori-perjadin-input").val();
                            }
                        // =========================================================================================
                        // {KATEGORI DOWNLOAD} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            function onChangeKategoriDownload(){
                                $(".kategori-download-input").select2({
                                    maximumSelectionLength:1
                                });
                                gebid('kategori-download-container').value = $(".kategori-download-input").val();

                                hideOrShowInput(gebid('kategori-download-container').value);
                            }

                            function hideOrShowInput(value){
                                // {Bulan}
                                if (value == 1) {
                                    gebid('div-kegiatan-input').style="display:none";
                                    gebid('div-sub-kegiatan-input').style="display:none";

                                    gebid('kegiatan-input').required=false;
                                    gebid('sub-kegiatan-input').required=false;

                                // {Kegiatan}
                                }else if (value == 2) {
                                    gebid('div-kegiatan-input').style="display:";
                                    gebid('div-sub-kegiatan-input').style="display:none";

                                    gebid('kegiatan-input').required=true;
                                    gebid('sub-kegiatan-input').required=false;

                                // {Sub Kegiatan}
                                }else if (value == 3) {
                                    gebid('div-kegiatan-input').style="display:";                                    
                                    gebid('div-sub-kegiatan-input').style="display:";

                                    gebid('kegiatan-input').required=true;
                                    gebid('sub-kegiatan-input').required=true;

                                // {Null}
                                }else if(value == ''){
                                    gebid('div-kegiatan-input').style="display:none";
                                    gebid('div-sub-kegiatan-input').style="display:none";

                                    gebid('kegiatan-input').required=false;
                                    gebid('sub-kegiatan-input').required=false;
                                }
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
                                        splittedResult = data.split('|');
                                        for (let i = 0; i < splittedResult.length-1; i++) {
                                            $('#sub-kegiatan-input').append('<option>'+splittedResult[i]+'</option>');
                                        }
                                        
                                    });

                                }, 100); // Will do the ajax stuff after 1000 ms, or 1 s
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
                        // {DATE AND TIME} @ ALL FUNCTIONS INSIDE ARE TE STED AND WORKED @
                        // =========================================================================================
                            // TESTED AND WORKED
                            document.getElementById("startDate").onchange = function() {
                                getMonth();
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
                            function getMonth() {
                                // Mengambil nama bulan perjalanan dinas
                                document.getElementById('bulan-container').value = listBulan[new Date(document.getElementById('startDate').value).getMonth()];
                                document.getElementById('bulan-en-container').value = listBulan_en[new Date(document.getElementById('startDate').value).getMonth()];
                            }

                        // =========================================================================================
                        // {FINAL CONFIRMATIONS} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                        // =========================================================================================
                            // set parameter for mysql parameter
                            function setParam(){

                                var form = document.getElementById('formDownloadRekapitulasi');
                                var param = 
                                gebid("kategori-perjadin-container").value + "|" + 
                                gebid("kategori-download-container").value + "|" + 
                                gebid("kode-kegiatan-container").value + "|" +
                                gebid("kode-sub-kegiatan-container").value +"|"+
                                gebid("bulan-container").value +"|"+
                                gebid("bulan-en-container").value; 

                                var encodedParam = encodeURIComponent(btoa(param));
                                
                                form.action = '<?= base_url(); ?>C_download_laporan/sendData/' + encodedParam;
                            }
                        

                    </script>
                

                </form>
            </div>
        </div>
    </div>
</div>