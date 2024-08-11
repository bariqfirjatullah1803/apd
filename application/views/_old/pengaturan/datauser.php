<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">



                <h4 class="header-title">Data User</h4>
                <p class="card-title-desc">All data from bagian table</p>

                <div class="table-responsive">
                    <table class="table table-centered datatable dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID Bagian</th>
                                <th>Nama Bagian</th>
                                <th>Kode Bagian</th>
                                <th>Username</th>
                                <th>Password</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>


                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($userData as $user) : ?>
                                <tr>
                                    <td><?= $user['idBagian']; ?></td>
                                    <td><?= $user['namaBagian']; ?></td>
                                    <td><?= $user['kodeBagian']; ?></td>
                                    <td><?= $user['username']; ?></td>
                                    <td><?= $user['password']; ?></td>
                                    <!-- <td id="tooltip-container1">
                                        <a href="<?= base_url() ?>pengaturan/editUser/" class="text-primary" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-account-edit font-size-18"></i></a>
                                        <a href="<?= base_url() ?>recap/hapus/" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class=" text-danger" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                    </td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->