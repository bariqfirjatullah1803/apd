<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Data Kode Kegiatan - Sub Kegiatan</h4>
                <p class="card-title-desc"></p>

                <?php if ($this->session->flashdata('notifikasiUbah')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Berhasil Diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                    <table id="datatable" class="table table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kegiatan</th>
                                <th>Deskripsi Kegiatan</th>
                                <th>Kode Sub Kegiatan</th>
                                <th>Deskripsi Sub Kegiatan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kodesipd as $kode) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $kode['idKegiatan']; ?></td>
                                    <td><?= $kode['descKegiatan']; ?></td>
                                    <td><?= $kode['idSubKegiatan']; ?></td>
                                    <td><?= $kode['descSubKegiatan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->