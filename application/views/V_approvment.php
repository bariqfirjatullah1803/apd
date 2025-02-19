<!-- Display -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">

				<h5>Persetujuan Surat Perjalanan Dinas</h5>

				<!-- For spacing, dont delete line below -->
				<ul class="nav nav-tabs nav-tabs-custom mb-4"></ul>
				<table class="table table-centered datatable dt-responsive"
					style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead class="thead-light">
						<tr>
							<th>Id Submit</th>
							<th>Nama Pegawai</th>
							<th>Tujuan</th>
							<th>Nominal</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($items as $item): ?>
							<tr>
								<td><?= $item['id'] ?></td>
								<td><?= $item['pegawai'] ?></td>
								<td><?= $item['tujuan'] ?></td>
								<?php
								$nominal = $item['nominal'] ?>
								<td><?= 'Rp ' . $nominal ?></td>
								<?php
								$status = $item['status'];
								if ($status == 'pending')
									$status = 'Pengajuan';
								else if ($status == 'complete')
									$status = 'Selesai';
								else if ($status == 'revision')
									$status = 'Revisi';
								else if ($status == 'approve')
									$status = 'Di Terima';
								else
									$status = 'Di Tolak';
								?>
								<td><?= $item['status'] ?></td>
								<td>
									<a href="<?= base_url('C_approvment/show/' . $item['id']) ?>"
										class="btn btn-sm btn-primary">Lihat Detail</a>
								</td>
							</tr>
							<?php
						endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>