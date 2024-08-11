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
					<div class="mb-3">
						<label class="form-label" for="status-approvment">Status Persetujuan</label>
						<input type="text" class="form-control" id="status-approvment" value="<?= $item['status'] ?>"
							   disabled/>
					</div>

					<?php
					if ($item['status'] == 'pending'): ?>
						<div class="mb-3">
							<a href="<?= base_url('C_approvment/update/' . $item['id'] . '/Approve') ?>"
							   class="btn btn-primary">Setuju</a>
							<a href="<?= base_url('C_approvment/update/' . $item['id'] . '/Reject') ?>"
							   class="btn btn-danger">Tolak</a>
						</div>
					<?php
					endif ?>
					
					<?php
					if ($item['status'] == 'approve'): ?>
					<form id="form_update_keterangan" method="POST" onsubmit="fungsi_update_ket()">
						<div class="mb-3">
							<label class="form-label" for="keterangan_approvement">Keterangan</label>
							<input type="text" class="form-control" id="keterangan_approvement"/>
						</div>
					<button class="btn btn-primary float-right" type="submit" id="btnSubmitRevisi">Revisi</button>
					</form>
					<?php
					endif ?>

					<?php
					if ($item['status'] == 'approve'): ?>
						<div class="mt-3">
							<a href="<?= base_url('C_approvment/update/' . $item['id'] . '/Selesai') ?>"
							   class="btn btn-danger">Selesai</a>
						</div>
					<?php
					endif ?>

					<script>
						function fungsi_update_ket(){
							var action_src = base_url('C_approvment/update_keterangan/' 
							. $item['id'] . '/'. + document.getElementsById("keterangan_approvement")[0]);

							var form_update_ket = document.getElementsById("form_update_keterangan");
							form_update_ket.action = action_src;
						}
					<script>

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
				</div>
			</div>
		</div>
	</div>
</div>
