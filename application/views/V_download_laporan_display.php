<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Laporan</h4>
                <p class="card-title-desc"></p>

                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-centered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                            <tr>
                                <th>No Urut</th>
                                <th>Jenis Perjalanan Dinas</th>
                                <th>Tanggal Berangkat</th>
                                <th>Tanggal Kembali</th>

                                <th>Nama Pegawai yang Berangkat</th>
                                <th>NIP Pegawai yang Berangkat</th>
                                <th>Jabatan Pegawai yang Berangkat</th>

                                <th>Lokasi</th>
                                <th>kota/Kecamatan/Provinsi</th>

                                <th>Acara</th>

                                <th>Nominal Uang Harian</th>
                                <th>Nominal Uang Transport</th>
                                <th>Total</th>


                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($result as $laporan) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $laporan['descKategori']; ?></td>
                                    <td><?= $laporan['tanggalBerangkat']; ?></td>
                                    <td><?= $laporan['tanggalKembali']; ?></td>
                                    
                                    <td><?= $laporan['namaAll']; ?></td>
                                    <td><?= $laporan['nipAll']; ?></td>
                                    <td><?= $laporan['jabAll']; ?></td>

                                    <td><?= $laporan['lokasi']; ?></td>
                                    <td><?= $laporan['kotaKecamatan']; ?></td>

                                    <td><?= $laporan['acara']; ?></td>

                                    <td><?= $laporan['nominalUhAll']; ?></td>
                                    <td><?= $laporan['nominalUtAll']; ?></td>
                                    <td><?= $laporan['nominalGtAll']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->