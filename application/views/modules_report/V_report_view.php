<!-- ================== -->
<!-- ANCHOR VIEW        -->
<!-- ================== -->

    <!-- NOTE LAPOR/SARAN | NEED DOCUMENTATIONS -->
    <!-- LAPOR/SARAN -->
        <div id="dititipkan" class="row mb-3">
            <label for="example-text-input" class="col-sm-3 col-form-label">Laporan / Saran *</label>
            <div class="col-sm-9 mt-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radio-bug-or-advice" id="radio-bug" value="1" onchange="isReportOrAdvice()"/>
                    <label class="form-check-label" for="radio-bug">Lapor Error</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radio-bug-or-advice" id="radio-advice" value="0" onchange="isReportOrAdvice()"/>
                    <label class="form-check-label" for="radio-advice">Saran Pengembangan</label>
                </div>
            </div>
        </div>
    <!--  -->

    <!-- NOTE : KETERANGAN | NEED DOCUMENTATIONS -->
    <!-- tanggal-submit-container -->
        <!-- <div class="row mb-3">
            <label for="Nomor Surat" class="col-sm-3 col-form-label">Tanggal Submit</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="tanggal-submit-container" id="tanggal-submit-container" row>
            </div>
        </div> -->
    <!--  -->

    <!-- NOTE : JUDUL | NEED DOCUMENTATIONS -->
    <!-- input-judul-container -->
        <div class="row mb-3">
            <label for="Nomor Surat" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="input-judul-container" id="input-judul-container" placeholder="Judul laporan/saran" row >
            </div>
        </div>
    <!--  -->

    <!-- NOTE : KETERANGAN | NEED DOCUMENTATIONS -->
    <!-- input-keterangan-container -->
        <div class="row mb-3">
            <label for="Nomor Surat" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" name="input-keterangan-container" id="input-keterangan-container" row></textarea>
            </div>
        </div>
    <!--  -->

<!--  -->
<!-- ======================================= -->
<!-- ANCHOR BUTTONS                          -->
<!-- ======================================= -->

    <div>
        <button class="btn btn-primary float-right" type="submit" id="btnSubmitDatabase">Submit form</button>
    </div>