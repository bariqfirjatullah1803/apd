<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Tujuan</h4>
                <p class="card-title-desc">Daftar Tujuan Perjalanan Dinas Dalam Daerah</p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Tujuan</th>
                            <th>Jarak (Dalam KM)</th>
                            <th>Radius</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($tujuan as $tujuanKolom) : ?>
                            <tr>
                                <th scope="row"><?= $tujuanKolom['idTujuan']; ?></th>
                                <td><?= $tujuanKolom['namaTujuan']; ?></td>
                                <td><?= $tujuanKolom['jarak']; ?></td>
                                <td><?= $tujuanKolom['radius_id']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>