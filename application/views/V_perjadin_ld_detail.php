V_perjadin_dd_detail.php<!-- Display -->
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
					<div class="mb-3">
						<label class="form-label" for="keterangan-revisi">Keterangan Revisi</label>
						<input type="text" class="form-control" id="keterangan-revisi" value="<?= $item['keterangan'] ?>"
							   disabled/>
					</div>
					<?php
					if ($item['status'] == 'approve'): ?>
					<div class="mb-3">
						<label class="form-label">Daftar Surat</label>
						<div>
							<button class="btn btn-light btn-rounded">
								<a href="<?= base_url(); ?>C_perjadin_dd/dst/<?= $item['id']; ?>"
								   target="_blank">
									Surat Tugas
								</a>
								<i class="mdi mdi-download ml-2"></i>
							</button>

							<button class="btn btn-light btn-rounded">
								<a href="<?= base_url(); ?>C_perjadin_dd/dsppd/<?= $item['id']; ?>"
								   target="_blank">
									SPPD
								</a>
								<i class="mdi mdi-download ml-2"></i>
							</button>

							<button class="btn btn-light btn-rounded">
								<a href="<?= base_url(); ?>C_perjadin_dd/dsppdlembar2/<?= $item['id']; ?>"
								   target="_blank">
									SPPD Lembar 2
								</a>
								<i class="mdi mdi-download ml-2"></i>
							</button>

							<button class="btn btn-light btn-rounded">
								<a href="<?= base_url(); ?>C_perjadin_dd/dkwt/<?= $item['id']; ?>"
								   target="_blank">
									Kwitansi
								</a>
								<i class="mdi mdi-download ml-2"></i>
							</button>

							<button class="btn btn-light btn-rounded">
								<a href="<?= base_url(); ?>C_perjadin_dd/dtt/<?= $item['id']; ?>"
								   target="_blank">
									Tanda Terima
								</a>
								<i class="mdi mdi-download ml-2"></i>
							</button>
						</div>
					</div>
					<?php
					endif ?>

					<?php
					if ($item['status'] == 'approve'): ?>
						<hr/>
						<div class="mb-3">
							<label class="form-label">Daftar Bukti Lapangan</label>
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
						<hr>
						<form action="<?= base_url('C_perjadin_ld/do_upload/' . $item['id']) ?>" method="POST"
							  enctype="multipart/form-data">
							<div class="mb-3">
								<label class="form-label">Upload Bukti Lapangan</label>
								<input type="file" class="form-control" name="image" accept="application/pdf">
							</div>
							<div class="mb-3">
								<button type="submit" class="btn btn-primary">Tambah Bukti</button>
							</div>
						</form>
					<?php
					endif ?>
				</div>
			</div>
		</div>
	</div>
</div>
