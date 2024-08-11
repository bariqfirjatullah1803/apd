<!-- Display -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">

				<h5>Detail Surat Perjalanan Dinas</h5>

				<!-- For spacing, dont delete line below -->
				<ul class="nav nav-tabs nav-tabs-custom mb-4"></ul>

				<div>
					<div class="mb-3">
						<div class="row">
							<div class="col-6">
								<label class="form-label" for="id-submit">Id Submit</label>
								<input type="text" class="form-control" id="id-submit" disabled
									value="<?= $item['id'] ?>">
							</div>
							<div class="col-6">
								<label class="form-label" for="id-bagian">Id Bagian</label>
								<input type="text" class="form-control" id="id-bagian" disabled
									value="<?= $item['id_bagian'] ?>">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="row">
							<div class="col-6">
								<label class="form-label" for="tanggal-berangkat">Tanggal Keberangkatan</label>
								<input type="text" class="form-control" id="tanggal-berangkat" disabled
									value="<?= $item['tanggal_berangkat'] ?>">
							</div>
							<div class="col-6">
								<label class="form-label" for="durasi-hari">Durasi</label>
								<input type="text" class="form-control" id="durasi-hari" disabled
									value="<?= $item['durasi_hari'] ?>">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="row">
							<div class="col-6">
								<label class="form-label" for="lokasi">Lokasi</label>
								<input type="text" class="form-control" id="lokasi" disabled
									value="<?= $item['lokasi'] ?>">
							</div>
							<div class="col-6">
								<label class="form-label" for="tujuan">Kota/Kecamatan</label>
								<input type="text" class="form-control" id="tujuan" disabled
									value="<?= $item['tujuan'] ?>">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="row">
							<div class="col-6">
								<label class="form-label" for="dasar-surat">Dasar Surat</label>
								<input type="text" class="form-control" id="dasar-surat" disabled
									value="<?= $item['dasar_surat'] ?>">
							</div>
							<div class="col-6">
								<label class="form-label" for="acara">Acara</label>
								<input type="text" class="form-control" id="acara" disabled
									value="<?= $item['acara'] ?>">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="row">
							<div class="col-6">
								<label class="form-label" for="nama-pegawai">Nama Pegawai</label>
								<input type="text" class="form-control" id="nama-pegawai" disabled
									value="<?= $item['pegawai'] ?>">
							</div>
							<div class="col-6">
								<label class="form-label" for="jumlah">Jumlah</label>
								<input type="text" class="form-control" id="jumlah" disabled
									value="<?= $item['jumlah'] ?>">
							</div>
						</div>
					</div>
					<form action="<?= base_url('C_approvment/update/' . $item['id']) ?>" method="post">
						<div class="mb-3">
							<label class="form-label" for="status">Status Persetujuan</label>
							<select class="form-control" name="status">
								<option value="pending" <?= ($item['status'] == 'pending') ? 'selected' : '' ?>>Pending
								</option>
								<option value="approve" <?= ($item['status'] == 'approve') ? 'selected' : '' ?>>Setujui</option>
								<option value="reject" <?= ($item['status'] == 'reject') ? 'selected' : '' ?>>Tolak</option>
								<option value="revision" <?= ($item['status'] == 'revision') ? 'selected' : '' ?>>Revisi</optio>
								<option value="complete" <?= ($item['status'] == 'complete') ? 'selected' : '' ?>>Selesai</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label" id="keterangan">Keterangan</label>
							<textarea class="form-control" rows="4"
								name="keterangan"><?= $item['keterangan'] ?></textarea>
							<small class="text-danger">* Keterangan digunakan untuk status revisi saja</small>
						</div>
						<div class="mb-3">
							<button class="btn btn-primary">Perbarui Status</button>
						</div>
					</form>
					<?php if ($item['status'] != 'reject' || $item['status'] != 'pending'): ?>
						<hr>
						<div class="mb-3">
							<label class="form-label">Bukti Lapangan</label>
							<div>
								<?php
								foreach ($images as $image): ?>
									<button class="btn btn-light btn-rounded">
										<a href="<?= base_url(); ?>uploads/bukti-lapangan/<?= $image['image']; ?>"
											target="_blank">
											<?= $image['image'] ?>
										</a>
										<i class="mdi mdi-download ml-2"></i>
									</button>
									<?php
								endforeach; ?>
							</div>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>