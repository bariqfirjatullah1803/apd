<script src='https://cdn.jsdelivr.net/npm/chartist@0.11.4/dist/chartist.min.js'></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <p class="font-size-16">Jumlah Perjalanan Dinas</p>

                            <h5 class="font-size-22">

                                <?php if ($idBagian >= 30) : ?>
                                    <?php foreach ($jumlahPerdinAll as $counter) : ?>
                                        <tr>
                                            <th scope="row"><?= $counter['JumlahPerdin']; ?></th>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif ?>

                                <?php if ($idBagian < 30) : ?>
                                    <?php foreach ($jumlahPerdin as $counter) : ?>
                                        <tr>
                                            <th scope="row"><?= $counter['JumlahPerdin']; ?></th>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif ?>

                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <p class="font-size-16">Jumlah Realisasi Perjalanan Dinas Dalam Kota</p>

                            <h5 class="font-size-22">
                                <?php if ($idBagian >= 30) : ?>
                                    <?php foreach ($totalRealisasiAll as $moneycounter) : ?>
                                        <tr>
                                            <th scope="row">Rp. <?= number_format($moneycounter['TotalBayar']); ?></th>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif ?>

                                <?php if ($idBagian < 30) : ?>
                                    <?php foreach ($totalRealisasi as $moneycounter) : ?>
                                        <tr>
                                            <th scope="row">Rp. <?= number_format($moneycounter['TotalBayar']); ?></th>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif ?>
                            </h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($idBagian >= 30) : ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Grafik Jumlah Perjalanan Dinas</h5>
                            <canvas id="chartJmlPerdin" width="200" height="100"></canvas>
                            <script>
                                var ctx = document.getElementById('chartJmlPerdin').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [
                                            'Bagian Administrasi Tata Pemerintahan',
                                            'Bagian Hukum',
                                            'Bagian Organisasi',
                                            'Bagian Administrasi Perekonomian',
                                            'Bagian Pengadaan Barang dan Jasa',
                                            'Bagian Administrasi Kerjasama',
                                            'Bagian Umum',
                                            'Bagian Protokol dan Komunikasi Pimpinan',
                                            'Bagian Perencanaan dan Keuangan',
                                            'Bagian Administrasi Pembangunan',
                                            'Bagian Sumber Daya Alam',
                                            'Bagian Kesejahteraan Rakyat'
                                        ],
                                        datasets: [{
                                            label: 'Jumlah Perjalanan Dinas (kali)',
                                            data: [<?php foreach ($dataGrafikPerdin as $dataGrafik) : ?>
                                                    <?= $dataGrafik['tapum']; ?>,
                                                    <?= $dataGrafik['hukum']; ?>,
                                                    <?= $dataGrafik['bagor']; ?>,
                                                    <?= $dataGrafik['ekonom']; ?>,
                                                    <?= $dataGrafik['barjas']; ?>,
                                                    <?= $dataGrafik['kerjas']; ?>,
                                                    <?= $dataGrafik['umum']; ?>,
                                                    <?= $dataGrafik['prokopim']; ?>,
                                                    <?= $dataGrafik['renkeu']; ?>,
                                                    <?= $dataGrafik['admpem']; ?>,
                                                    <?= $dataGrafik['sda']; ?>,
                                                    <?= $dataGrafik['kesra']; ?>,
                                                <?php endforeach ?>
                                            ],

                                            //Ignore this error, script works FINE
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        indexAxis: 'y',
                                        scales: {
                                            x: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Grafik Persentase Realisasi</h5>
                            <canvas id="grafikPersentase" width="200" height="100"></canvas>
                            <script>
                                var ctx = document.getElementById('grafikPersentase').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [
                                            'Bagian Administrasi Tata Pemerintahan',
                                            'Bagian Hukum',
                                            'Bagian Organisasi',
                                            'Bagian Administrasi Perekonomian',
                                            'Bagian Pengadaan Barang dan Jasa',
                                            'Bagian Administrasi Kerjasama',
                                            'Bagian Umum',
                                            'Bagian Protokol dan Komunikasi Pimpinan',
                                            'Bagian Perencanaan dan Keuangan',
                                            'Bagian Administrasi Pembangunan',
                                            'Bagian Sumber Daya Alam',
                                            'Bagian Kesejahteraan Rakyat'
                                        ],
                                        datasets: [{
                                            label: 'Persentase Realisasi Perjalanan Dinas (%)',
                                            data: [<?php foreach ($dataGrafikRealisasi as $dataGrafik) : ?>
                                                    <?= $dataGrafik['tapum']; ?>,
                                                    <?= $dataGrafik['hukum']; ?>,
                                                    <?= $dataGrafik['bagor']; ?>,
                                                    <?= $dataGrafik['ekonom']; ?>,
                                                    <?= $dataGrafik['barjas']; ?>,
                                                    <?= $dataGrafik['kerjas']; ?>,
                                                    <?= $dataGrafik['umum']; ?>,
                                                    <?= $dataGrafik['prokopim']; ?>,
                                                    <?= $dataGrafik['renkeu']; ?>,
                                                    <?= $dataGrafik['admpem']; ?>,
                                                    <?= $dataGrafik['sda']; ?>,
                                                    <?= $dataGrafik['kesra']; ?>,
                                                <?php endforeach ?>
                                            ],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        indexAxis: 'y',
                                        scales: {
                                            x: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>