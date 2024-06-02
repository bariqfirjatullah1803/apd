<!-- ================== -->
<!-- ANCHOR CONTAINER   -->
<!-- ================== -->

<div style="display:none">
    <!-- ANCHOR bug-or-advice-container -->
        <div class="row mb-3">
            <label for="Nomor Surat" class="col-sm-2 col-form-label">bug-or-advice-container</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="bug-or-advice-container" id="bug-or-advice-container" row >
            </div>
        </div>
    <!--  -->

    <!-- ANCHOR idbagian -->
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">idbagian-container </label>
            <div class="col-sm-2"><input readonly class="form-control" type="text" id="idbagian-container" name="idbagian-container" value="<?= $idBagian; ?>"></div>
    </div>
    <!--  -->

    <!-- ANCHOR date-time -->
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">date-container </label>
        <div class="col-sm-2">
            <input readonly class="form-control" type="text" id="date-container" name="date-container" value=<?php echo date("d");?>>
        </div>
        <label for="example-text-input" class="col-sm-2 col-form-label">month-container </label>
        <div class="col-sm-2">
            <input readonly class="form-control" type="text" id="month-container" name="month-container" value=<?php echo date("m");?>>
        </div>
        <label for="example-text-input" class="col-sm-2 col-form-label">year-container </label>
        <div class="col-sm-2">
            <input readonly class="form-control" type="text" id="year-container" name="year-container" value=<?php echo date("Y");?>>
        </div>
    </div>
</div>