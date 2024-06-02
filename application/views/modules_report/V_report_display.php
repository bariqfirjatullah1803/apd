<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Data Laporan / Saran</h4>
                <p class="card-title-desc"></p>

                <?php if ($this->session->flashdata('notifikasiUbah')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Berhasil Ditambahkan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                    <table id="datatable" class="table table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>    
                                <th>ID</th>
                                <th>Nama Bagian</th>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th>Tanggal Lapor</th>
                                <th>Status Pengerjaan</th>
                                <th>Tanggal Selesai</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($dataReport as $recap) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $recap['namaBagian']; ?></td>
                                    <td><?= $recap['reportTitle']; ?></td>
                                    <td><?= $recap['descReport']; ?></td>
                                    <td><?= $recap['reportedDate']; ?></td>
                                    <td><?php 
                                        if($recap['developmentStatus'] == '1'){
                                            echo "Laporan Diterima";
                                        }elseif ($recap['developmentStatus'] == '2') {
                                            echo "Sedang Dikerjakan";
                                        }elseif ($recap['developmentStatus'] == '3') {
                                            echo "Selesai";
                                        } ?>
                                    </td>
                                    <td><?= $recap['repairedDate']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->