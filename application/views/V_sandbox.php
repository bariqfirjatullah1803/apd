<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Form Perjalanan Dinas Dalam Daerah</h4>
                <p class="card-title-desc">Isi data-data dibawah untuk membuat dokumen Perjalanan Dinas Dalam Daerah</p>

                <form action="<?= base_url(); ?>C_perjadin_dd/tambahData" method="post" autocomplete="off">

                    <!-- ================== -->
                    <!-- ANCHOR View        -->
                    <!-- ================== -->
                    <div id="kota-tujuan" style="display:" class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Kegiatan *</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control select2-multiple kegiatan-input" multiple="multiple" name="kegiatan-input" id="kegiatan-input" 
                            onChange = "onChangeKegiatan()" required>

                            <!-- @ FIX THIS @ -->
                                <?php foreach ($kodekegiatan as $kodekegiatan) : ?>
                                    <option><?= $kodekegiatan['descKegiatan']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                    <div id="kota-tujuan" style="display:" class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Kegiatan *</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control select2-multiple sub-kegiatan-input" multiple="multiple" name="sub-kegiatan-input" id="sub-kegiatan-input" required>

                            <!-- @ FIX THIS @ -->
                                <option disabled>--- Pilih Kegiatan ---</option>
                            </select>
                        </div>
                    </div>

                    <!-- ================== -->
                    <!-- ANCHOR Container   -->
                    <!-- ================== -->                    

                    <!-- @ Nama kegiatan @ Container {nama-kegiatan-container} -->
                    <div id="container-kodeprogram" class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Kode dan nama kegiatan</label>
                        <div class="col-sm-3"><input readonly id="kode-kegiatan-container" name="kode-kegiatan-container" class="form-control" type="text"></div>
                        <div class="col-sm-7"><input readonly id="nama-kegiatan-container" name="nama-kegiatan-container" class="form-control" type="text"></div>
                    </div>

                    <!-- ================== -->
                    <!-- ANCHOR Script      -->
                    <!-- ================== -->

                    <script>

                        var gebid = function(id){
                            return document.getElementById(id);
                        };
                            
                        function onChangeKegiatan(){
                            $(".kegiatan-input").select2({
                                maximumSelectionLength: 1
                            });

                            $(".sub-kegiatan-input").find('option').not(':first').remove();

                            gebid('nama-kegiatan-container').value = $(".kegiatan-input").val();

                            // {Get kode kegiatan}
                            $.post('<?= base_url() ?>assets/ajax/getKodeKegiatan.php', {
                                kegiatan: gebid('nama-kegiatan-container').value,
                            }, function(data) {
                                gebid('kode-kegiatan-container').value = data;                                
                            });

                            onChangeSubKegiatan();
                        }

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
                        function onChangeSubKegiatan(){

                            $(".sub-kegiatan-input").select2({
                                maximumSelectionLength: 1
                            });

                            var delayTimer;
                            var splittedResult;

                            // Clear all timeout
                            clearTimeout(delayTimer);

                            // Set new timeout
                            delayTimer = setTimeout(function() {
    
                                $.post('<?= base_url() ?>assets/ajax/getKodeSubKegiatan.php', {
                                    kegiatan: gebid('kode-kegiatan-container').value,
                                }, function(data){
                                    console.log("output " + data);
                                    splittedResult = data.split('|');
                                    for (let i = 0; i < splittedResult.length-1; i++) {
                                        $('#sub-kegiatan-input').append('<option>'+splittedResult[i]+'</option>');
                                    }
                                    
                                });

                            }, 100); // Will do the ajax stuff after 1000 ms, or 1 s
                        }

                    </script>
                
                </form>
            </div>
        </div>
    </div>
</div>