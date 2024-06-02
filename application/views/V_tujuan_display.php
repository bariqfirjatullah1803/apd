<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Data Tujuan <?=$pageHeader ?></h4>
                <p class="card-title-desc"></p>

                <?php if ($this->session->flashdata('notifikasiUbah')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Berhasil Diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <?php if ($pageHeader!="Perjalanan Dinas Luar Provinsi") :?>
                                    <th>ID</th>
                                    <th>Nama Tujuan</th>
                                    <th>Jarak (dalam km)</th>
                                    <th>Nominal Uang Transport</th>
                                <?php endif ?>

                                <?php if ($pageHeader=="Perjalanan Dinas Luar Provinsi") :?>
                                    <th>ID</th>
                                    <th>Nama Provinsi</th>
                                    <th>Nominal Uang Harian</th>
                                    <th>Nominal Uang Taksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($tujuan as $tujuanKolom) : ?>
                                <tr>
                                    <?php if ($pageHeader!="Perjalanan Dinas Luar Provinsi") :?>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $tujuanKolom['namaTujuan']; ?></td>
                                        <td><?= $tujuanKolom['jarak']; ?></td>
                                        <td><?= number_format($tujuanKolom['uangTransport'], 2,",", "."); ?></td>
                                    <?php endif ?>
                                    <?php if ($pageHeader=="Perjalanan Dinas Luar Provinsi") :?>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $tujuanKolom['namaProvinsi']; ?></td>
                                        <td><?= number_format($tujuanKolom['uangHarian'], 2,",", "."); ?></td>
                                        <td><?= number_format($tujuanKolom['biayaTaksi'], 2,",", "."); ?></td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->