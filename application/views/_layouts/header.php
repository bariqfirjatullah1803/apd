<!doctype html>
<html lang="en">

<head>

	<!-- {BOILERPLATE} -->
	<meta charset="utf-8"/>
	<title><?= $pageTitle ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
	<meta content="Themesdesign" name="author"/>
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

	<!-- ************************************************************************************************************* -->
	<!-- FORM ADVANCED CSS -->
	<link href="<?= base_url() ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?= base_url() ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"/>
	<!-- ************************************************************************************************************* -->

	<!-- plugin css -->
	<link href="<?= base_url() ?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
		  rel="stylesheet" type="text/css"/>

	<!-- Bootstrap Css -->
	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
	<!-- Icons Css -->
	<link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
	<!-- App Css-->
	<link href="<?= base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>

	<!-- ************************************************************************************************************* -->
	<!-- DataTables -->
	<link href="<?= base_url() ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?= base_url() ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
		  type="text/css"/>

	<!-- Responsive datatable examples -->
	<link href="<?= base_url() ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>

	<!-- ************************************************************************************************************* -->

	<!-- twitter-bootstrap-wizard css -->
	<link rel="stylesheet" href="assets/libs/twitter-bootstrap-wizard/prettify.css">
	<!-- ************************************************************************************************************* -->
	<!--  -->

</head>


<body>

<!-- Begin page -->
<div id="layout-wrapper">

	<header id="page-topbar">
		<div class="navbar-header">
			<div class="d-flex">

				<!-- {LOGO} -->
				<div class="navbar-brand-box">
					<a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url() ?>assets/images/logo-renkeu-land.png" alt="logo-renkeu"
									 height="22">
                            </span>
						<span class="logo-lg">
                                <img src="<?= base_url() ?>assets/images/logo-renkeu-land.png" alt="logo-renkeu"
									 height="70">
                            </span>
					</a>
				</div>

			</div>

			<div class="d-flex">
				<!-- {TOP RIGHT CORNER} -->
				<div class="dropdown d-inline-block">
					<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
							data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img class="rounded-circle header-profile-user"
							 src="<?= base_url() ?>assets/images/users/avatar-7.jpg" alt="Header Avatar">
						<span class="d-none d-xl-inline-block ms-1"><?= $username; ?></span>
						<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-end">
						<!-- item-->
						<a class="dropdown-item" href="<?= base_url(); ?>C_debug_mode"><i
								class="dripicons-blog align-middle me-1"></i>Debug Mode</a>
						<!-- item-->
						<a class="dropdown-item" href="<?= base_url(); ?>C_patch_notes"><i
								class="dripicons-blog align-middle me-1"></i>Patch Notes</a>
						<!-- item-->
						<a class="dropdown-item text-danger" href="<?= base_url(); ?>C_login/logout"><i
								class="dripicons-power align-middle me-1 text-danger"></i> Logout</a>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- ========== {Left Sidebar Start} ========== -->
	<div class="vertical-menu">

		<div data-simplebar class="h-100">


			<div class="user-sidebar text-center">
				<div class="dropdown">
					<div class="user-img">
						<img src="<?= base_url() ?>assets/images/users/avatar-7.jpg" alt="" class="rounded-circle">
						<span class="avatar-online bg-success"></span>
					</div>
					<div class="user-info">
						<h5 class="mt-3 font-size-16 text-white"><?= $username; ?></h5>
						<span class="font-size-13 text-white-50"><?= $idBagian; ?></span>
					</div>
				</div>
			</div>


			<!--- Sidemenu -->
			<div id="sidebar-menu">
				<!-- Left Menu Start -->
				<ul class="metismenu list-unstyled" id="side-menu">
					<li class="menu-title">Menu</li>

					<!-- Sandbox -->
					<?php
					if ($idBagian == 99) : ?>
						<li>
							<a href="<?= base_url(); ?>C_sandbox" class="waves-effect">
								<i class="dripicons-home"></i>
								<span>Sandbox</span>
							</a>
						</li>
					<?php
					endif ?>

					<!-- ANCHOR Dashboard -->
					<li>
						<a href="<?= base_url(); ?>C_dashboard" class="waves-effect">
							<i class="dripicons-home"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<?php
					if ($_SESSION['role'] == 'admin') : ?>
						<li>
							<a href="<?= base_url('c_approvment/index') ?>" class="waves-effect">
								<i class="dripicons-briefcase"></i>
								<span>Persetujuan Surat <br>Perjalanan Dinas</span>
							</a>
						</li>
					<?php
					endif ?>
					<!-- ANCHOR Perjalanan Dinas -->
					<?php
					if ($_SESSION['role'] == 'pegawai') : ?>
						<li>
							<a href="javascript: void(0);" class="has-arrow waves-effect">
								<i class="dripicons-briefcase"></i>
								<span>Tambahkan <br>Perjalanan Dinas</span>
							</a>
							<ul class="sub-menu" aria-expanded="false">
								<!-- <li><a href="<?= base_url(); ?>C_perjadin_main/loadPrerequisite/dd">Perjadin Main</a></li> -->
								<li><a href="<?= base_url(); ?>C_perjadin_main/loadPrerequisite/dd">Dalam Daerah</a>
								</li>
								<li><a href="<?= base_url(); ?>C_perjadin_main/loadPrerequisite/ld">Luar Daerah</a></li>
								<li><a href="<?= base_url(); ?>C_perjadin_main/loadPrerequisite/lp">Luar Provinsi</a>
								</li>
							</ul>
						</li>
					<?php
					endif ?>

					<!-- {Dev didnt need to see this} -->
					<?php
					if ($idBagian < 70) : ?>
						<!-- ANCHOR REKAPITULASI -->
						<li>
							<a href="javascript: void(0);" class="has-arrow waves-effect">
								<i class="dripicons-folder-open"></i>
								<span>Rekapitulasi Perjalanan Dinas</span>
							</a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="<?= base_url(); ?>C_perjadin_dd/perjadin_recap_index">Dalam Daerah</a></li>
								<li><a href="<?= base_url(); ?>C_perjadin_ld/perjadin_recap_index">Luar Daerah</a></li>
								<li><a href="<?= base_url(); ?>C_perjadin_lp/perjadin_recap_index">Luar Provinsi</a>
								</li>
							</ul>
						</li>
					<?php
					endif ?>

					<?php
					if ($idBagian == 7) : ?>
						<!-- ANCHOR REKAPITULASI KHUSUS UMUM -->
						<li>
							<a href="<?= base_url(); ?>C_show_titipan" class="waves-effect">
								<i class="dripicons-archive"></i>
								<span>Rincian Perjalanan Dinas yang Dititipkan</span>
							</a>
						</li>
					<?php
					endif ?>

					<!-- ANCHOR Download Laporan -->
					<li>
						<a href="<?= base_url(); ?>C_download_laporan" class="waves-effect">
							<i class="dripicons-download"></i>
							<span>Download <br> Rekapitulasi</span>
						</a>
					</li>

					<!-- ANCHOR Data Pegawai -->
					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="dripicons-user-group"></i>
							<span>Data Pegawai</span>
						</a>
						<ul class="sub-menu" aria-expanded="false">
							<li><a href="<?= base_url(); ?>C_pegawai">Data Pegawai</a></li>
							<li><a href="<?= base_url(); ?>C_pegawai/crudPegawai">Tambah / Ubah / Hapus Pegawai</a></li>
						</ul>
					</li>

					<!-- ANCHOR Data Acuan -->
					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="dripicons-search"></i>
							<span>Data Acuan</span>
						</a>
						<ul class="sub-menu" aria-expanded="true">
							<li><a href="javascript: void(0);" class="has-arrow">Radius</a>
								<ul class="sub-menu" aria-expanded="true">
									<li><a href="<?= base_url(); ?>C_tujuan/displayDalamDaerah">Dalam Daerah</a></li>
									<li><a href="<?= base_url(); ?>C_tujuan/displayLuarDaerah">Luar Daerah</a></li>
									<li><a href="<?= base_url(); ?>C_tujuan/displayLuarProvinsi">Luar Provinsi</a></li>
								</ul>
							</li>
							<li><a href="<?= base_url(); ?>C_kode_sipd">Kode SIPD </a></li>

							<?php
							if ($idBagian != 7) : ?>
								<li><a href="<?= base_url(); ?>C_kode_sipd/sipdUmum">Kode SIPD Bagian Umum</a></li>
							<?php
							endif ?>
							<!-- <li><a href="<?= base_url(); ?>page404">Luar Daerah</a></li> -->
							<!-- <li><a href="<?= base_url(); ?>page404">Luar Provinsi</a></li> -->
						</ul>
					</li>

					<!-- ANCHOR Lapor Bug -->
					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="dripicons-user-group"></i>
							<span>Lapor Error</span>
						</a>
						<ul class="sub-menu" aria-expanded="false">
							<li><a href="<?= base_url(); ?>C_report">Laporkan Error / Saran Fitur</a></li>
							<li><a href="<?= base_url(); ?>C_report/displayReport">Lihat Laporan</a></li>
						</ul>
					</li>

					<!-- <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-gear"></i>
                                <span>Pengaturan</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?= base_url(); ?>C_pegawai/showUpdateDataPegawaiPage">Ubah Data Pegawai</a></li>
                            </ul>
                        </li> -->

				</ul>
			</div>
			<!-- Sidebar -->
		</div>
	</div>
	<!-- Left Sidebar End -->

	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="main-content">

		<div class="page-content">

			<!-- start page title -->
			<div class="page-title-box">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-sm-6">
							<div class="page-title">
								<h4><?= $pageTitle ?></h4>
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="<?= base_url(); ?>dashboard">SIMPERDINSETDA</a>
									</li>
									<li class="breadcrumb-item"><a
											href="<?= base_url(); ?><?= $pageTitle ?>"><?= $pageTitle; ?></a></li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page title -->


			<div class="container-fluid">

				<div class="page-content-wrapper">
