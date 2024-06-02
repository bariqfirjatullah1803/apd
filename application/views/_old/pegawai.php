<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Daftar Pegawai</h4>
                <p class="card-title-desc">Daftar Pegawai Sekretariat Daerah</p>

                <?php if ($this->session->flashdata('notifikasiUbah')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Berhasil Diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if ($idBagian < 30) : ?>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pegawai</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pegawai as $pegawaiKolom) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $pegawaiKolom['namaPegawai']; ?></td>
                                    <td><?= $pegawaiKolom['jabatan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif ?>

                <?php if ($idBagian >= 30) : ?>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pegawai</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pegawaiAll as $pegawaiKolom) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $pegawaiKolom['namaPegawai']; ?></td>
                                    <td><?= $pegawaiKolom['jabatan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->