<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Patch Notes</h4>
                <p class="card-title-desc">For Documentation Purposes</p>

                <!-- @ 1.2.5 @ -->
                <label class="col-sm-12 col-form-label alert alert-warning mb-3"> <h7>1.2.5 - Update Perjadin Dalam Daerah and Add menu to data acuan </h7></label>
                    <ul style="list-style-type:disc">
                        <b> Update </b>
                        <li>Change Perjalanan Dinas Dalam Daerah multi-select
                            <ul>
                                <li>Change Perjalanan Dinas Dalam Daerah multi-select to text input</li>
                            </ul>
                        </li>
                        <li>Data Acuan : 
                            <ul>
                                <li>Add data acuan kode sipd</li>
                                <li>Add data acuan kode sipd bagian umum</li>
                            </ul>
                        </li>
                    </ul>
                <!--  -->

                <!-- @ 1.2.4 @ -->
                <label class="col-sm-12 col-form-label alert alert-warning mb-3"> <h7>1.2.4 - Fix missing feature/bug on Documents </h7></label>
                    <ul style="list-style-type:disc">
                        <b> Bug Fixes </b>
                        <li>Tanda Terima : 
                            <ul>
                                <li>Fix jabatan penandatangan not showing properly</li>
                            </ul>
                        </li>
                        <li>Data Acuan : 
                            <ul>
                                <li>Fix Dalam Daerah not showing</li>
                                <li>Fix Luar Daerah not showing</li>
                                <li>Fix Luar Provinsi not showing</li>
                                <li>Fix Luar Provinsi not provinsi name</li>
                            </ul>
                        </li>
                    </ul>
                <!--  -->

                <!-- @ 1.2.3 @ -->
                <label class="col-sm-12 col-form-label alert alert-warning mb-3"> <h7>1.2.3 - Update Kegiatan Dynamically </h7></label>
                    <ul style="list-style-type:disc">
                        <b> Bug Fixes </b>
                        <li>Update Kegiatan to dynamically update it content based on 'dititipkan ke bagian umum' value
                    </ul>
                <!--  -->

                <!-- @ 1.2.2 @ -->
                <label class="col-sm-12 col-form-label alert alert-warning mb-3"> <h7>1.2.2 - Update Database </h7></label>
                    <ul style="list-style-type:disc">
                        <b> Bug Fixes </b>
                        <li>Update multiple values as stated in Perubahan Kedua atas SBU Tahun Anggaran 2022
                    </ul>
                <!--  -->

                <!-- @ 1.2.1 @ -->
                <label class="col-sm-12 col-form-label alert alert-warning mb-3"> <h7>1.2.1 - Fix missing feature/bug on Documents</h7></label>
                    <ul style="list-style-type:disc">
                        <b> Bugfixes </b>
                        <li>Surat Tugas : 
                            <ul>
                                <li>Fix index not showing on surat tugas</li>
                                <li>Fix nomor surat not showing on surat tugas</li>
                                <li>Fix surat tugas missing this text : <br>
                                    "Sesuai Prosedur, setelah melaksanakan kegiatan dimaksud agar melaporkan hasilnya kepada pimpinan. <br> 
                                    Demikian untuk dilaksanakan dengan penuh tanggung jawab."
                                <li>Fix pegawai marker showing on surat tugas when only 1 or 2 people that departing</li>
                            </ul>
                        </li>

                        <li>SPPD : 
                            <ul>
                                <li>Fix index not showing on SPPD</li>
                                <li>Fix nomor surat not showing on SPPD</li>
                                <li>Fix pegawai marker showing on surat tugas when only 1 or 2 people that departing</li>
                            </ul>
                        </li>

                        <li>Kwitansi : 
                            <ul>
                                <li>Add kode bagian</li>
                                <li>Add lunas dibayar ... (bulan) (tahun)</li>
                            </ul>
                        </li>

                        <li>Tanda Terima : 
                            <ul>
                                <li>Add penandatangan</li>
                                <li>Fix not removing empty names properly</li>
                            </ul>
                        </li>
                    </ul>
                <!--  -->

                <!-- @ 1.2.0 @ -->
                <label class="col-sm-12 col-form-label alert alert-info mb-3"> <h7>1.2.0 - Allow user to add/edit/delete pegawai </h7></label>
                    <ul style="list-style-type:disc">
                        <b> New </b>
                        <li>Allow each user to Add, Update, and Delete pegawai.
                    </ul>
                <!--  -->

                <!-- @ 1.1.1 @ -->
                <label class="col-sm-12 col-form-label alert alert-warning mb-3"> <h7>1.1.1 - Minor Bug Fix  </h7></label>
                    <ul style="list-style-type:disc">
                        <b> Bugfixes </b>
                        <li>Tambahkan perjalanan dinas dalam daerah : <ul><li>Fix sub kegiatan not empty when kegiatan is empty</li></ul></li>
                        <li>Tambahkan perjalanan dinas luar provinsi : <ul><li>Fix getProvTaksi getting wrong column names</li></ul></li>
                        <li>Update pegawai : <ul><li>Fix typo on getPegId, typed as getPegid</li></ul></li>
                    </ul>
                <!--  -->

                <!-- @ 1.1.0 @ -->
                    <label class="col-sm-12 col-form-label alert alert-info mb-3"> <h7>1.1.0 - Add sub kegiatan (22/07/2022) </h7></label>
                    <ul style="list-style-type:disc">
                    <b> New </b>
                        <li>Add dynamic sub kegiatan based on selected kegiatan</li>
                    </ul>
                <!--  -->

                <!-- @ 1.0.0 @ -->
                    <label class="col-sm-12 col-form-label alert alert-info mb-3"> <h7>1.0.0 - Simperdin Revamped (19/07/2022) </h7></label>
                    <ul style="list-style-type:disc">
                        <b> Improvements </b>
                        <li>Reworked all codebase for easier debugging, maintenance, and further development.</li>
                        <li>Change views for these files : 
                            <ul>
                                <li>Perjalanan Dinas Dalam Daerah</li>
                            </ul>
                        </li>
                        <b> New </b>
                        <li>Add new menus : 
                            <ul>
                                <li>Tambahkan Perjalanan Dinas Luar Daerah</li>
                                <li>Tambahkan Perjalanan Dinas Luar Provinsi</li>
                                <li>Rekapitulasi Perjalanan Dinas Luar Daerah</li>
                                <li>Rekapitulasi Perjalanan Dinas Luar Provinsi</li>
                                <li>Download Perjalanan Dinas Dalam Daerah</li>
                                <li>Download Perjalanan Dinas Luar Daerah</li>
                                <li>Download Perjalanan Dinas Luar Provinsi</li>
                                <li>Data Acuan Radius Perjalanan Dinas Dalam Daerah</li>
                                <li>Data Acuan Radius Perjalanan Dinas Luar Daerah</li>
                                <li>Data Acuan Radius Perjalanan Dinas Luar Provinsi</li>
                                <li>Patch Notes for Documentation Purpose</li>
                            </ul>
                        </li>
                    </ul>
                <!--  -->
            </div>
        </div>
    </div>
</div>

