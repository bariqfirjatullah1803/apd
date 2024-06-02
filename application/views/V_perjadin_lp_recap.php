<!-- Display -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h5>Recap Perjalanan Dinas</h5>

                <!-- For spacing, dont delete line below -->
                <ul class="nav nav-tabs nav-tabs-custom mb-4"></ul>

                <?php if ($this->session->flashdata('notifikasiTambah')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Berhasil Ditambahkan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('notifikasiHapus')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Berhasil Dihapus.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if ($idBagian < 30) : ?>
                    <div class="table-responsive">
                        <table class="table table-centered datatable dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Durasi</th>
                                    <th>Lokasi</th>
                                    <th>Kota/Kecamatan</th>
                                    <th>Dasar Surat </th>
                                    <th>Acara</th>
                                    <th>Jumlah Pegawai</th>
                                    <th>Pegawai</th>
                                    <th>Total</th>
                                    <th style="display: none;">IdSubmit</th>
                                    <th>Dokumen</th>
                                    <th style="width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataRecap as $recapKolom) : ?>
                                    <tr>

                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $recapKolom['tanggalBerangkat']; ?></td>
                                        <td><?= $recapKolom['durasiDenganHari']; ?></td>
                                        <td><?= $recapKolom['lokasi']; ?></td>
                                        <td><?= $recapKolom['kotaKecamatan']; ?></td>
                                        <td><?= $recapKolom['dasarSurat']; ?></td>
                                        <td><?= $recapKolom['acara']; ?></td>
                                        <td><?= $recapKolom['jmlAll']; ?></td>
                                        <td><?= $recapKolom['namaAll']; ?></td>
                                        <td><?= $recapKolom['nominalGtAll']; ?></td>
                                        <td><?= $recapKolom['idSubmit']; ?></td>
                                        <td id="tooltip-container2">

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>C_perjadin_dd/dst/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    Surat Tugas
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>C_perjadin_dd/dsppd/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    SPPD
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>C_perjadin_dd/dsppdlembar2/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    SPPD Lembar 2
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>C_perjadin_dd/dkwt/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    Kwitansi
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>C_perjadin_dd/dtt/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    Tanda Terima
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>C_perjadin_ld/rincian/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    Rincian
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>
                                        </td>
                                        <td id="tooltip-container1">
                                            <a href="<?= base_url() ?>C_perjadin_lp/hapus/<?= $recapKolom['idSubmit']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class=" text-danger" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>

                <?php if ($idBagian >= 30 && $idBagian < 90) : ?>
                    <div class="table-responsive">
                        <table class="table table-centered datatable dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Bagian</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Durasi</th>
                                    <th>Lokasi</th>
                                    <th>Kota/Kecamatan</th>
                                    <th>Dasar Surat </th>
                                    <th>Acara</th>
                                    <th>Jumlah Pegawai</th>
                                    <th>Pegawai</th>
                                    <th>Total</th>
                                    <th style="display: none;">IdSubmit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataRecapAll as $recapKolom) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $recapKolom['bagian_id']; ?></td>
                                        <td><?= $recapKolom['tglBerangkat']; ?></td>
                                        <td><?= $recapKolom['durasi']; ?></td>
                                        <td><?= $recapKolom['lokasi']; ?></td>
                                        <td><?= $recapKolom['tujuan_nama']; ?></td>
                                        <td><?= $recapKolom['dasarSurat']; ?></td>
                                        <td><?= $recapKolom['acara']; ?></td>
                                        <td><?= $recapKolom['jmlPegawai']; ?></td>
                                        <td><?= $recapKolom['namaPegawai']; ?></td>
                                        <td><?= $recapKolom['totalPembayaran']; ?></td>
                                        <td><?= $recapKolom['idSubmit']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>

                <?php if ($idBagian > 90) : ?>
                    <div class="table-responsive">
                        <table class="table table-centered datatable dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Bagian</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Durasi</th>
                                    <th>Lokasi</th>
                                    <th>Kota/Kecamatan</th>
                                    <th>Dasar Surat </th>
                                    <th>Acara</th>
                                    <th>Jumlah Pegawai</th>
                                    <th>Pegawai</th>
                                    <th>Total</th>
                                    <th style="display: none;">IdSubmit</th>
                                    <th>Dokumen</th>
                                    <th style="width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataRecapAll as $recapKolom) : ?>
                                    <tr>

                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $recapKolom['bagian_id']; ?></td>
                                        <td><?= $recapKolom['tglBerangkat']; ?></td>
                                        <td><?= $recapKolom['durasi']; ?></td>
                                        <td><?= $recapKolom['lokasi']; ?></td>
                                        <td><?= $recapKolom['tujuan_nama']; ?></td>
                                        <td><?= $recapKolom['dasarSurat']; ?></td>
                                        <td><?= $recapKolom['acara']; ?></td>
                                        <td><?= $recapKolom['jmlPegawai']; ?></td>
                                        <td><?= $recapKolom['namaPegawai']; ?></td>
                                        <td><?= $recapKolom['totalPembayaran']; ?></td>
                                        <td><?= $recapKolom['idSubmit']; ?></td>
                                        <td id="tooltip-container2">

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>recap/dst/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    Surat Tugas
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>recap/dsppd/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    SPPD
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>recap/dsppdlembar2/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    SPPD Lembar 2
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>recap/dkwt/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    Kwitansi
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>

                                            <button class="btn btn-light btn-rounded">
                                                <a href="<?= base_url(); ?>recap/dtt/<?= $recapKolom['idSubmit']; ?>" target="_blank">
                                                    Tanda Terima
                                                </a>
                                                <i class="mdi mdi-download ml-2"></i>
                                            </button>
                                        </td>
                                        <td id="tooltip-container1">
                                            <a href="<?= base_url() ?>recap/hapus/<?= $recapKolom['idSubmit']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class=" text-danger" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- end row -->