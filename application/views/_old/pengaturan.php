<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Ubah Data Pegawai</h4>
                <p class="card-title-desc"></p>    

                <form action="<?= base_url(); ?>pengaturan/updateData" method="post" autocomplete="off">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Data Pegawai</label>
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
                                        maximumSelectionLength: 1
                                    });
                                    //=====================================================================
                                    // Get data nip and jabatan based on pegawai name
                                    //=====================================================================
                                    //#region Get data nip and jabatan based on pegawai name
                                        for (let index = 0; index < $('.pegawai').val().length; index++) {
                                        var np = $('.pegawai').val()[index];
                                        if (np != '') {
                                            //IDPegawai
                                            $.post('assets/ajax/idpeg.php', {
                                                nampeg: np
                                            }, function(data) {
                                                document.getElementById('id-pegawai-container').value = data;
                                            });
                                            //NamaPegawai
                                            $.post('assets/ajax/nampeg.php', {
                                                nampeg: np
                                            }, function(data) {
                                                document.getElementById('nama-pegawai-container').value = data;
                                            });
                                            //NIP
                                            $.post('assets/ajax/nip.php', {
                                                nampeg: np
                                            }, function(data) {
                                                document.getElementById('nip-pegawai-container').value = data;
                                            });
                                            //Jabatan
                                            $.post('assets/ajax/jabatan.php', {
                                                nampeg: np
                                            }, function(data) {
                                                document.getElementById('jab-pegawai-container').value = data;
                                            });
                                            //Pangkat
                                            $.post('assets/ajax/pangkat.php', {
                                                nampeg: np
                                            }, function(data) {
                                                document.getElementById('pan-pegawai-container').value = data;
                                            });
                                            //Golongan
                                            $.post('assets/ajax/golongan.php', {
                                                nampeg: np
                                            }, function(data) {
                                                document.getElementById('gol-pegawai-container').value = data;
                                            });
                                        }
                                    }
                                    //#endregion
                                };                          
                            
                            </script>
                        </div>
                    </div>

                    <!-- #region Container -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">ID Pegawai</label>
                            <div class="col-sm-9"><input readonly class="form-control" type="text" placeholder="" id="id-pegawai-container" name="id-pegawai-container"></div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="nama-pegawai-container" name="nama-pegawai-container"></div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9"><input readonly class="form-control" type="text" placeholder="" id="nip-pegawai-container" name="nip-pegawai-container"></div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Golongan</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="gol-pegawai-container" name="gol-pegawai-container"></div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Pangkat</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="pan-pegawai-container" name="pan-pegawai-container"></div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9"><input class="form-control" type="text" placeholder="" id="jab-pegawai-container" name="jab-pegawai-container"></div>
                        </div>
                    <!-- #endRegion -->
                    <div>
                        <button class="btn btn-primary float-right" type="submit" id="btnSubmitDatabase">Ubah data</button>
                    </div>
                </form>
            </div>
        </div>
        

        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Settings</h4>
                <p> [x] Ubah data pegawai </p> 
                <p> [ ] Ubah data pejabat (Sekda, As1-3, Bendahara, Kasir) </p> 
                <p> [ ] Ubah data PPTK </p> 
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->