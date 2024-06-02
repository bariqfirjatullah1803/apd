<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Daftar Bagian yang Menitipkan Perjadin di Bagian Umum</h4>
                <p class="card-title-desc">Total Perjadin yang Dititipkan di Bagian Umum (Dalam Daerah, Luar Daerah, Luar Provinsi)</p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Bagian</th>
                                <th>Jumlah Perjalanan Dinas yang Dititipkan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($rincian as $rincianKolom) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $rincianKolom['namaBagian']; ?></td>
                                    <td><?= $rincianKolom['Total']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->