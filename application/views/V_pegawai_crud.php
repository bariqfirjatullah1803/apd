<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Form Update Data Pegawai</h4>
                <p class="card-title-desc"></p>

                <form id="formPegawaiCRUD" action="<?= base_url(); ?>#" method="post" autocomplete="off">
                <!-- ================== -->
                <!-- ANCHOR VIEW        -->
                <!-- ================== -->

                    <!-- qr : 
                    input id -> {pegawai-input}
                    output stored inside {nama-seluruh-pegawai-container} -->
                    <div id="multiselect-kategori" class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Tambah / Ubah / Hapus</label>
                        <div class="col-sm-9">
                            <select id="kategori-input" class="select2 form-control select2-multiple kategori-input" multiple="multiple" onChange="onSelectKategori()">
                                <option value = 1>Tambah pegawai</option>
                                <option value = 2>Ubah pegawai</option>
                                <option value = 3>Hapus pegawai</option>
                            </select>
                        </div>
                    </div>

                    <div style="display:none" id="div-warning" class="row mb-3">
                        <label for="example-text-input" class="col-sm-12 col-form-label">Jika tidak sengaja menghapus (bukan mengubah) data pegawai, hubungi administrator untuk mengembalikan data pegawai yang terhapus.</label>
                    </div>
                    
                    <!-- qr : 
                    input id -> {pegawai-input}
                    output stored inside {nama-seluruh-pegawai-container} -->
                    <div style="display:none" id="div-multiselect-pegawai" class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Pegawai yang Dipilih</label>
                        <div class="col-sm-9">
                            <select id="pegawai-input" class="select2 form-control select2-multiple pegawai-input" multiple="multiple" onChange="onSelectPegawai()">

                            <!-- {Khusus bagian melihat bagian masing2} -->
                            <?php if($idBagian <= 50):?>
                                <?php foreach ($pegawai as $pegawaiKolom) : ?>
                                    <option><?= $pegawaiKolom['namaPegawai'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <!-- {Khusus sekda dan dev melihat seluruh pegawai} -->
                            <?php if($idBagian >=51):?>
                                <?php foreach ($pegawaiAll as $pegawaiKolom) : ?>
                                    <option><?= $pegawaiKolom['namaPegawai'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            </select>
                        </div>
                    </div>

                    <!-- qr : stored inside {id-container} -->
                        <div style="display:none" id="div-id-container" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">ID</label>
                            <div class="col-sm-9"><input readonly class="form-control" type="text" placeholder="" id="id-container" name="id-container"></div>
                        </div>
                    <!--  -->

                    <!-- qr : stored inside {nama-container} -->
                        <div style="display:none" id="div-nama-container" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nama-container" name="nama-container" required></div>
                        </div>
                    <!--  -->

                    <!-- qr : stored inside {nip-container} -->
                        <div style="display:none" id="div-nip-container" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nip-container" name="nip-container"></div>
                        </div>
                    <!--  -->

                    <!-- qr : stored inside {Pangkat-container} -->
                        <div style="display:none" id="div-pan-container" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Pangkat</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="pan-container" name="pan-container"></div>
                        </div>
                    <!--  -->

                    <!-- qr : stored inside {gol-container} -->
                        <div style="display:none" id="div-gol-container" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Golongan</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="gol-container" name="gol-container"></div>
                        </div>
                    <!--  -->

                    <!-- qr : stored inside {jabatan-container} -->
                        <div style="display:none" id="div-jab-container" class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="jab-container" name="jab-container" required></div>
                        </div>
                    <!--  -->

                     <!-- qr : 
                    input id -> {pegawai-input}
                    output stored inside {nama-seluruh-pegawai-container} -->
                    <div style="display:none" id="div-multiselect-penandatangan" class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Bisa menandatangani dokumen</label>
                        <div class="col-sm-9">
                            <select id="penandatangan-input" class="select2 form-control select2-multiple penandatangan-input" multiple="multiple" onChange="onSelectPenandatangan()">
                                <option value = 1>Ya</option>
                                <option value = 0>Tidak</option>
                            </select>
                        </div>
                    </div>

                <!-- ======================================= -->
                <!-- ANCHOR BUTTONS                          -->
                <!-- ======================================= -->

                <div>
                    <button class="btn btn-primary float-right" type="submit" id="btnSubmitDatabase">Submit</button>
                </div>

                <!-- ======================================= -->
                <!-- ANCHOR CONTAINER                        -->
                <!-- ======================================= -->

                <div style="display:none">
                    <label class="col-sm-12 col-form-label alert alert-info mt-3"> Container</label>
                    <!-- qr : stored inside {tandatangan-container} -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">tandatangan-container</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="tandatangan-container" name="tandatangan-container"></div>
                        </div>
                    <!--  -->
                    <!-- qr : stored inside {kategori-container} -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">kategori-container</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="kategori-container" name="kategori-container"></div>
                        </div>
                    <!--  -->
                </div>

                <!-- ======================================= -->
                <!-- ANCHOR SCRIPTS                          -->
                <!-- ======================================= -->

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
                        var form = gebid('formPegawaiCRUD');

                    // =========================================================================================                    
                    // {KATEGORI}
                    // =========================================================================================
                    function onSelectKategori(){
                        // {Set maximal amount of selection}
                        $(".kategori-input").select2({
                            maximumSelectionLength: 1
                        })
                        gebid('kategori-container').value = $(".kategori-input").val();
                        hideInput($(".kategori-input").val());
                    }

                        // {Set visibility} 
                            function isItVisible(name, isVisible){
                                if(isVisible == 1) gebid(name).style = "display:";
                                if(isVisible == 0) gebid(name).style = "display:none";
                            }

                            function hideInput(kategori){
                                // {'' = hide all}
                                if(kategori == ''){
                                    isItVisible('div-multiselect-pegawai', 0);
                                    isItVisible('div-warning', 0);
                                    isItVisible('div-id-container', 0);
                                    isItVisible('div-nama-container', 0);
                                    isItVisible('div-nip-container', 0);
                                    isItVisible('div-pan-container', 0);
                                    isItVisible('div-jab-container', 0);
                                    isItVisible('div-gol-container', 0);
                                    isItVisible('div-multiselect-penandatangan', 0);

                                    // {Set Form Action / Set destination after submit button is clicked}
                                    form.action = '<?= base_url(); ?>#';
                                    gebid('btnSubmitDatabase').innerHTML = 'Submit'
                                }
                                // {1 = Tambah}
                                if (kategori == 1) {
                                    isItVisible('div-multiselect-pegawai', 0);
                                    isItVisible('div-id-container', 0);
                                    isItVisible('div-nama-container', 1);
                                    isItVisible('div-nip-container', 1);
                                    isItVisible('div-pan-container', 1);
                                    isItVisible('div-jab-container', 1);
                                    isItVisible('div-gol-container', 1);
                                    isItVisible('div-multiselect-penandatangan', 1);

                                    // {Set Form Action / Set destination after submit button is clicked}
                                    form.action = '<?= base_url(); ?>C_pegawai/insertPegawaiData';
                                    gebid('btnSubmitDatabase').innerHTML = 'Tambah Pegawai';
                                }
                                // {2 = Ubah}
                                if(kategori == 2){
                                    isItVisible('div-multiselect-pegawai', 1);
                                    isItVisible('div-warning', 0);
                                    isItVisible('div-id-container', 0);
                                    isItVisible('div-nama-container', 1);
                                    isItVisible('div-nip-container', 1);
                                    isItVisible('div-pan-container', 1);
                                    isItVisible('div-jab-container', 1);
                                    isItVisible('div-gol-container', 1);
                                    isItVisible('div-multiselect-penandatangan', 1);

                                    // {Set Form Action / Set destination after submit button is clicked}
                                    form.action = '<?= base_url(); ?>C_pegawai/updatePegawaiData';
                                    gebid('btnSubmitDatabase').innerHTML = 'Ubah Data Pegawai';
                                }
                                // {3 = Hapus}
                                if (kategori == 3) {
                                    isItVisible('div-multiselect-pegawai', 1);
                                    isItVisible('div-warning', 1);
                                    isItVisible('div-id-container', 0);
                                    isItVisible('div-nama-container', 1);
                                    isItVisible('div-nip-container', 0);
                                    isItVisible('div-pan-container', 0);
                                    isItVisible('div-jab-container', 0);
                                    isItVisible('div-gol-container', 0);
                                    isItVisible('div-multiselect-penandatangan', 0);

                                    // {Set Form Action / Set destination after submit button is clicked}
                                    form.action = '<?= base_url(); ?>C_pegawai/hapusPegawaiData';
                                    gebid('btnSubmitDatabase').innerHTML = 'Hapus Pegawai';
                                }
                            }
                        // 
                    // 
                    // =========================================================================================                    
                    // {PENANDATANGAN}
                    // =========================================================================================
                        function onSelectPenandatangan(){
                            // {Set maximal amount of selection}
                            $(".penandatangan-input").select2({
                                maximumSelectionLength: 1
                            })
                            gebid('tandatangan-container').value = $(".penandatangan-input").val();
                        }
                    // =========================================================================================                    
                    // {PEGAWAI}
                    // =========================================================================================
                        function onSelectPegawai(){
                            // {Set maximal amount of selection}
                            $(".pegawai-input").select2({
                                maximumSelectionLength: 1
                            })

                            // {Get Pegawai on index 0}
                            var np = $('.pegawai-input').val()[0];
                            console.log("NP "+np);

                            // {Get their details}
                                //IdPegawai
                                $.post('<?= base_url() ?>assets/ajax/getPegId.php', {
                                    nampeg: np
                                }, function(data) {
                                    document.getElementById('id-container').value = data;
                                });
                                //NamaPegawai
                                $.post('<?= base_url() ?>assets/ajax/getPegNama.php', {
                                    nampeg: np
                                }, function(data) {
                                    document.getElementById('nama-container').value = data;
                                });
                                //NIP
                                $.post('<?= base_url() ?>assets/ajax/getPegNip.php', {
                                    nampeg: np
                                }, function(data) {
                                    document.getElementById('nip-container').value = data;
                                });
                                //Jabatan
                                $.post('<?= base_url() ?>assets/ajax/getPegJab.php', {
                                    nampeg: np
                                }, function(data) {
                                    document.getElementById('jab-container').value = data;
                                });
                                //Pangkat
                                $.post('<?= base_url() ?>assets/ajax/getPegPan.php', {
                                    nampeg: np
                                }, function(data) {
                                    document.getElementById('pan-container').value = data;
                                });
                                //Golongan
                                $.post('<?= base_url() ?>assets/ajax/getPegGol.php', {
                                    nampeg: np
                                }, function(data) {
                                    document.getElementById('gol-container').value = data;
                                });
                            // 
                        }
                </script>
                
                </form>
            </div>
        </div>
    </div>
</div>