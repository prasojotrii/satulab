<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8" />
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Daftar Instrumen Laboratorium Sido Muncul" name="description" />
	<meta content="" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

	<!-- preloader css -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/preloader.min.css" type="text/css" />
	<!--Daterangepicker -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

	<!-- Bootstrap Css -->
	<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="<?= base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

	<!-- Custom Css -->
	<link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

	<link href="<?= base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!-- Responsive datatable examples -->
	<link href="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet" type="text/css" />

	<style type="text/css">
		div .dt-buttons {
			float: left;
		}

		.dataTables_length {
			float: right;
		}

		.ui-front {
			z-index: 9999999 !important;
		}
	</style>



</head>

<body>

	<!-- <body data-layout="horizontal"> -->

	<!-- Begin page -->
	<div id="layout-wrapper">

		<header id="page-topbar">
			<div class="navbar-header">
				<div class="d-flex">
					<!-- LOGO -->
					<div class="navbar-brand-box">
						<a href="<?= base_url(); ?>" class="logo logo-dark">
							<span class="logo-sm">
								<img src="<?= base_url(); ?>assets/images/logopendek.png" alt="" height="35">
							</span>
							<span class="logo-lg">
								<img src="<?= base_url(); ?>assets/images/logopendek.png" alt="" height="35"> <img src="<?= base_url(); ?>assets/images/logopanjang.png" alt="" height="35">
							</span>
						</a>

						<a href="<?= base_url(); ?>" class="logo logo-light">
							<span class="logo-sm">
								<img src="<?= base_url(); ?>assets/images/logopendek.png" alt="" height="35">
							</span>
							<span class="logo-lg">
								<img src="<?= base_url(); ?>assets/images/logopendek.png" height=" 35"> <img src="<?= base_url(); ?>assets/images/logopanjang.png" alt="" height="35">
							</span>
						</a>
					</div>

					<button type="button" class="btn btn-sm px-3
                            font-size-16 header-item" id="vertical-menu-btn">
						<i class="fa fa-fw fa-bars"></i>
					</button>


				</div>

				<div class="d-flex">

					<div class="dropdown d-inline-block d-lg-none ms-2">
						<button type="button" class="btn header-item" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i data-feather="search" class="icon-lg"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-lg
                                dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
							<form class="p-3">
								<div class="form-group m-0">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">
										<button class="btn btn-primary" type="submit"><i class="mdi
                                                    mdi-magnify"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>

					<!-- 
					<div class="dropdown d-none d-sm-inline-block">
						<button type="button" class="btn header-item" id="mode-setting-btn">
							<i data-feather="moon" class="icon-lg
                                    layout-mode-dark"></i>
							<i data-feather="sun" class="icon-lg
                                    layout-mode-light"></i>
						</button>
					</div> -->




					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item
                                right-bar-toggle me-2">
							<i data-feather="settings" class="icon-lg"></i>
						</button>
					</div>

					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item
                                bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="rounded-circle header-profile-user" src="<?= base_url(); ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
							<span class="d-none d-xl-inline-block ms-1
                                    fw-medium"><?= $dataSession['nama']; ?></span>
							<i class="mdi mdi-chevron-down d-none
                                    d-xl-inline-block"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item-->
							<a class="dropdown-item" href="<?php echo base_url('profile') ?>"><i class="mdi
                                        mdi-face-profile font-size-16
                                        align-middle me-1"></i> Profile</a>

							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>"><i class="mdi
                                        mdi-logout font-size-16 align-middle
                                        me-1"></i> Logout</a>
						</div>
					</div>

				</div>
			</div>
		</header>

		<!-- ========== Left Sidebar Start ========== -->
		<div class="vertical-menu">

			<div data-simplebar class="h-100">

				<!--- Sidemenu -->
				<div id="sidebar-menu">
					<!-- Left Menu Start -->
					<ul class="metismenu list-unstyled" id="side-menu">
						<li class="menu-title" data-key="t-menu">Menu</li>
						<li>
							<a href="<?= base_url('dashboard'); ?>">
								<i data-feather="home"></i>
								<span data-key="t-dashboard">Dashboard</span>
							</a>
						</li>

						<li>
							<a href="javascript: void(0);" class="has-arrow">
								<i data-feather="grid"></i>
								<span data-key="t-apps">Apps</span>
							</a>
							<ul class="sub-menu" aria-expanded="false">
								<li>
									<a href="<?= base_url('sysadmin/kategori_instrumen'); ?>"> Data Instrumen </a>
								</li>
								<li>
									<a href="<?= base_url('sysadmin/kategori_glassware'); ?>"> Data Glassware </a>
								</li>
								<li>
									<a href="<?= base_url('sysadmin/data_order'); ?>">Data Order Internal </a>
								</li>
								<li>
									<a target="_blank" href="http://19.0.2.227/sidorekap">Data Uji Sample</a>
								</li>
								<li>
									<a target="_blank" href="http://19.0.2.227/sidoonline">Data Reagent</a>
								</li>

							</ul>
						</li>
						<li>
							<a href="javascript: void(0);" class="has-arrow">
								<i data-feather="grid"></i>
								<span data-key="t-apps">Sysadmin</span>
							</a>
							<ul class="sub-menu" aria-expanded="false">
								<li>
									<a href="<?= base_url('sysadmin/user'); ?>"> Data User </a>
								</li>
								<li>
									<a href="<?= base_url('sysadmin/Role'); ?>"> Data Role </a>
								</li>

							</ul>
						</li>


					</ul>


				</div>
				<!-- Sidebar -->
			</div>
		</div>
		<!-- Left Sidebar End -->

		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content" id="miniaresult">

			<div class="page-content">
				<div class="container-fluid">

					<!-- start page title -->

					<!-- end page title -->



					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">

									<div class="row align-items-center">
										<div class="col-md-6">
											<h2 class="mb-sm-0 font-size-32">Daftar Permintaan Persetujuan</h2>
										</div>


									</div>


								</div>


								<div class="card-body">
									<table id="tabel_order_persetujuan" class="table table-hover nowrap w-100">
										<thead>
											<tr style="text-align: center">
												<th width="10px">Menu</th>
												<th width="10px">No</th>
												<th width="10px">Id Order</th>
												<th width="10px">Id Request</th>
												<th width="10px">Tanggal Input</th>
												<th width="10px">Kategori</th>
												<th>Nama Barang </th>

												<th width="10px">Merek</th>
												<th width="10px">Jumlah</th>
												<th width="10px">Satuan</th>
												<th width="10px">Nama PIC</th>
												<th>Keterangan</th>
												<th>Status</th>
												<th width="10px">Tanggal Datang</th>
												<th width="10px">Urgent</th>
												<th width="10px">Penawaran</th>
												<th width="10px">No PR</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>


							</div>
							<div class="card">
								<div class="card-body">
									<table id="tabel_order" class="table table-hover nowrap w-100">
										<thead>
											<tr style="text-align: center">
												<th width="10px">Menu</th>
												<th width="10px">No</th>
												<th width="10px">Id Order</th>
												<th width="10px">Id Request</th>
												<th width="10px">Tanggal Input</th>
												<th width="10px">Kategori</th>
												<th>Nama Barang </th>

												<th width="10px">Merek</th>
												<th width="10px">Jumlah</th>
												<th width="10px">Satuan</th>
												<th width="10px">Nama PIC</th>
												<th>Keterangan</th>
												<th>Status</th>
												<th width="10px">Tanggal Datang</th>
												<th width="10px">Urgent</th>
												<th width="10px">Penawaran</th>
												<th width="10px">No PR</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
							</div>
							<!-- end cardaa -->
						</div> <!-- end col -->
					</div> <!-- end row -->
				</div> <!-- container-fluid -->
			</div>




		</div>



		<footer class="footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<script>
							document.write(new Date().getFullYear())
						</script>
						©
						Lab SM
					</div>

				</div>
			</div>
		</footer>

		<!-- end main content-->

	</div>
	<!-- END layout-wrapper -->


	<!-- Right Sidebar -->
	<div class="right-bar">
		<div data-simplebar class="h-100">
			<div class="rightbar-title d-flex align-items-center bg-dark
                    p-3">

				<h5 class="m-0 me-2 text-white">Theme Customizer</h5>

				<a href="javascript:void(0);" class="right-bar-toggle
                        ms-auto">
					<i class="mdi mdi-close noti-icon"></i>
				</a>
			</div>

			<!-- Settings -->
			<hr class="m-0" />

			<div class="p-4">
				<h6 class="mb-3">Layout</h6>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">
					<label class="form-check-label" for="layout-vertical">Vertical</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout" id="layout-horizontal" value="horizontal">
					<label class="form-check-label" for="layout-horizontal">Horizontal</label>
				</div>

				<h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">
					<label class="form-check-label" for="layout-mode-light">Light</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
					<label class="form-check-label" for="layout-mode-dark">Dark</label>
				</div>

				<h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size',
                            'fluid')">
					<label class="form-check-label" for="layout-width-fuild">Fluid</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size',
                            'boxed')">
					<label class="form-check-label" for="layout-width-boxed">Boxed</label>
				</div>

				<h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable',
                            'false')">
					<label class="form-check-label" for="layout-position-fixed">Fixed</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable',
                            'true')">
					<label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
				</div>

				<h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar',
                            'light')">
					<label class="form-check-label" for="topbar-color-light">Light</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar',
                            'dark')">
					<label class="form-check-label" for="topbar-color-dark">Dark</label>
				</div>

				<h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>
				<div class="form-check sidebar-setting">
					<input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size',
                            'lg')">
					<label class="form-check-label" for="sidebar-size-default">Default</label>
				</div>
				<div class="form-check sidebar-setting">
					<input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size',
                            'md')">
					<label class="form-check-label" for="sidebar-size-compact">Compact</label>
				</div>
				<div class="form-check sidebar-setting">
					<input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size',
                            'sm')">
					<label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
				</div>

				<h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>
				<div class="form-check sidebar-setting">
					<input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar',
                            'light')">
					<label class="form-check-label" for="sidebar-color-light">Light</label>
				</div>
				<div class="form-check sidebar-setting">
					<input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar',
                            'dark')">
					<label class="form-check-label" for="sidebar-color-dark">Dark</label>
				</div>
				<div class="form-check sidebar-setting">
					<input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar',
                            'brand')">
					<label class="form-check-label" for="sidebar-color-brand">Brand</label>
				</div>

				<h6 class="mt-4 mb-3 pt-2">Direction</h6>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr" value="ltr">
					<label class="form-check-label" for="layout-direction-ltr">LTR</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl" value="rtl">
					<label class="form-check-label" for="layout-direction-rtl">RTL</label>
				</div>

			</div>

		</div> <!-- end slimscroll-menu-->
	</div>
	<!-- /Right-bar -->


	<!-- JAVASCRIPT -->
	<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

	<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
	<!-- pace js -->
	<script src="<?= base_url(); ?>assets/libs/pace-js/pace.min.js"></script>

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
	<script src="<?= base_url(); ?>assets/js/app.js"></script>

	<!-- <script src="<?= base_url(); ?>assets/js/ajax.js"></script> -->

	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<!-- Buttons examples -->
	<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
	<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

	<!-- Responsive examples -->
	<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<!-- Datatable init js -->
	<script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	<!--DateRangePicker -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>


	<script type="text/javascript">
		$(window).on('load', function() {
			(document.body.getAttribute('data-sidebar-size') == "sm") ? document.body.setAttribute('data-sidebar-size', 'lg'): document.body.setAttribute('data-sidebar-size', 'sm')
		});

		$(document).ready(function() {
			var tipe = "<?= $dataSession['tipe']; ?>";


			if (tipe == 'SysAdmin') {

				$('#Halaman_Sysadmin').show();
			}
			var table1 = $('#tabel_order').DataTable({
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// "bInfo": false, //Feature control DataTables' server-side processing mode.
				"scrollX": true,
				"lengthMenu": [
					[15, 25, 50, -1],
					['15', '25', '50', 'Semua']
				],



				//Initial no order.
				// "buttons": ['excel'],
				// Load data for the table's content from an Ajax source

				"oLanguage": {
					"sLengthMenu": "<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>Tampilkan :<a>&nbsp;&nbsp;&nbsp;</a>_MENU_ ",
					"sSearch": "Cari :",
				},
				"dom": 'Blfrtip',
				"buttons": [{
					extend: 'excel',
					text: 'Excel',
					exportOptions: {
						columns: ':visible:not(:eq(0))'
					}
				}],
				"order": [
					[13, 'asc'],
					[11, 'asc'],
					[2, 'asc']

				],
				"ajax": {
					"url": "<?php echo site_url('Sysadmin/list_order') ?>",
					"type": "POST"
				},
				// //Set column definition initialisation properties.
				"columnDefs": [{

						"targets": '_all',
						"createdCell": function(td, cellData, rowData, row, col) {
							$(td).css('padding', '5px')
						}
					},

					// {
					// 	'visible': false,
					// 	'targets': [12]
					// },
					{
						"targets": [0, 1], //last column
						"orderable": false, //set not orderable
					},
					{
						"targets": 7, // your case first column
						"className": "text-center",

					},
					{
						"targets": 12,
						// "data": null,

						// "className": "text-center",

						"render": function(data, type, row) {
							var html = ""


							if (data == 1) {
								html = "<span class='badge bg-info '>Menunggu Persetujuan Penyelia</span>"

							} else if (data == 2) {
								html = "<span class='badge bg-info '>Menunggu Persetujuan Ka Unit</span>"
							} else if (data == 3) {
								html = "<span class='badge bg-primary '>Diproses Admin SAP</span>"

							} else if (data == 4) {
								html = "<span class='badge bg-primary'>Menunggu Penawaran</span>"

							} else if (data == 5) {
								html = "<span class='badge bg-info'>Unit Seleksi Penawaran</span>"

							} else if (data == 6) {
								html = "<span class='badge bg-primary '>Menunggu Persetujuan Direktur</span>"

							} else if (data == 7) {
								html = "<span class='badge bg-primary'>Pembuatan PR</span>"

							} else if (data == 8) {
								html = "<span class='badge bg-dark '>Proses Pembelian</span>"

							} else if (data == 9) {
								html = "<span class='badge bg-success '>Barang Diterima</span>"


							} else if (data == 19) {
								html = "<span class='badge bg-warning '>Orderan Ditunda</span>"

							} else if (data == 20) {
								html = "<span class='badge bg-danger '>Orderan Dibatalkan</span>"

							} else {
								html = "<span class='badge bg-dark'>-</span>"

							}
							return html;
						},

					},

					{
						"targets": 14,
						// "data": null,
						// "orderData": [0, 1],
						// "className": "text-center",

						"render": function(data, type, row) {
							var html = ""

							if (data == 1) {
								html = "<span class='badge bg-danger '>Urgent</span>"

							} else if (data == 2) {
								html = "<span class='badge bg-success '>Normal</span>"

							} else if (data == 3) {
								html = "<span class='badge bg-danger '>Urgent</span>"

							} else if (data == 4) {
								html = "<span class='badge bg-success '>Normal</span>"

							}
							return html;
						},

					},


					{
						"targets": 15,
						// "data": null,

						// "className": "text-center",

						"render": function(data, type, row) {
							var html = ""

							if (data == 0) {
								html = "<span class='badge bg-danger '>Tidak</span>"

							} else if (data == 1) {
								html = "<span class='badge bg-success '>Ya</span>"

							} else if (data == 2) {
								html = "<span class='badge bg-warning '>Belum Ditentukan</span>"

							}
							return html;
						}

					},

				],

			});

			var table2 = $('#tabel_order_persetujuan').DataTable({
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// "bInfo": false, //Feature control DataTables' server-side processing mode.
				"scrollX": true,
				"lengthMenu": [
					[15, 25, 50, -1],
					['15', '25', '50', 'Semua']
				],



				//Initial no order.
				// "buttons": ['excel'],
				// Load data for the table's content from an Ajax source

				"oLanguage": {
					"sLengthMenu": "<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>Tampilkan :<a>&nbsp;&nbsp;&nbsp;</a>_MENU_ ",
					"sSearch": "Cari :",
				},
				"dom": 'Blfrtip',
				"buttons": [{
					extend: 'excel',
					text: 'Excel',
					exportOptions: {
						columns: ':visible:not(:eq(0))'
					}
				}],
				"order": [
					[13, 'asc'],
					[11, 'asc'],
					[2, 'asc']

				],
				"ajax": {
					"url": "<?php echo site_url('Sysadmin/list_order_persetujuan') ?>",
					"type": "POST"
				},
				// //Set column definition initialisation properties.
				"columnDefs": [{

						"targets": '_all',
						"createdCell": function(td, cellData, rowData, row, col) {
							$(td).css('padding', '5px')
						}
					},

					{
						'visible': false,
						'targets': [0, 2, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15, 16]
					},
					{
						"targets": [0, 1], //last column
						"orderable": false, //set not orderable
					},
					{
						"targets": 7, // your case first column
						"className": "text-center",

					},
					{
						"targets": 12,
						// "data": null,

						// "className": "text-center",

						"render": function(data, type, row) {
							var html = ""


							if (data == 1) {
								html = "<span class='badge bg-info '>Menunggu Persetujuan Penyelia</span>"

							} else if (data == 2) {
								html = "<span class='badge bg-info '>Menunggu Persetujuan Ka Unit</span>"
							} else if (data == 3) {
								html = "<span class='badge bg-primary '>Order Disetujui</span>"

							} else if (data == 4) {
								html = "<span class='badge bg-primary'>Menunggu Penawaran</span>"

							} else if (data == 5) {
								html = "<span class='badge bg-info'>Unit Seleksi Penawaran</span>"

							} else if (data == 6) {
								html = "<span class='badge bg-primary '>Menunggu Persetujuan Direktur</span>"

							} else if (data == 7) {
								html = "<span class='badge bg-primary'>Pembuatan PR</span>"

							} else if (data == 8) {
								html = "<span class='badge bg-dark '>Proses Pembelian</span>"

							} else if (data == 9) {
								html = "<span class='badge bg-success '>Barang Diterima</span>"


							} else if (data == 19) {
								html = "<span class='badge bg-warning '>Orderan Ditunda</span>"

							} else if (data == 20) {
								html = "<span class='badge bg-danger '>Orderan Dibatalkan</span>"

							} else {
								html = "<span class='badge bg-dark'>-</span>"

							}
							return html;
						},

					},

					{
						"targets": 14,
						// "data": null,
						// "orderData": [0, 1],
						// "className": "text-center",

						"render": function(data, type, row) {
							var html = ""

							if (data == 1) {
								html = "<span class='badge bg-danger '>Urgent</span>"

							} else if (data == 2) {
								html = "<span class='badge bg-success '>Normal</span>"

							} else if (data == 3) {
								html = "<span class='badge bg-danger '>Urgent</span>"

							} else if (data == 4) {
								html = "<span class='badge bg-success '>Normal</span>"

							}
							return html;
						},

					},


					{
						"targets": 15,
						// "data": null,

						// "className": "text-center",

						"render": function(data, type, row) {
							var html = ""

							if (data == 0) {
								html = "<span class='badge bg-danger '>Tidak</span>"

							} else if (data == 1) {
								html = "<span class='badge bg-success '>Ya</span>"

							} else if (data == 2) {
								html = "<span class='badge bg-warning '>Belum Ditentukan</span>"

							}
							return html;
						}

					},

				],

			});

			var table3 = $('#tabel_penawaran').DataTable({
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				"dom": '',
				"ajax": {
					"url": "<?php echo site_url('Sysadmin/list_penawaran') ?>",
					"type": "POST",
				},
				"order": [
					[3, 'asc'],


				],
				"columnDefs": [{

						"targets": '_all',
						"createdCell": function(td, cellData, rowData, row, col) {
							$(td).css('padding', '5px')
						}
					},
					{
						"targets": [0, 1], //last column
						"orderable": false, //set not orderable
					},
				]
			});
			var table4 = $('#tabel_penawaran2').DataTable({
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				"dom": '',
				"ajax": {
					"url": "<?php echo site_url('Sysadmin/list_penawaran') ?>",
					"type": "POST",
				},
				"order": [
					[3, 'asc'],


				],
				"columnDefs": [{

						"targets": '_all',
						"createdCell": function(td, cellData, rowData, row, col) {
							$(td).css('padding', '5px')
						}
					},
					{
						"targets": [0, 1], //last column
						"orderable": false, //set not orderable
					},
					{
						'visible': false,
						'targets': [0]
					},

				]
			});
			var table5 = $('#tabel_order_baru').DataTable({

				"processing": true, //Feature control the processing indicator.
				"serverSide": true,
				// "scrollX": true,

				"bInfo": false, //Feature control DataTables' server-side processing mode.
				"lengthMenu": [
					[10, 25, 50, -1],
					['10', '25', '50', 'Semua']
				],
				"oLanguage": {
					"sLengthMenu": "<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>Tampilkan :<a>&nbsp;&nbsp;&nbsp;</a>_MENU_ ",
					"sSearch": "Cari :",
				},

				// "dom": 'Blrti',
				"search": {
					"visible": true
				},

				// },
				// "buttons": [{
				// 	extend: 'excel',
				// 	text: 'Excel',
				// 	exportOptions: {
				// 		columns: [':visible']
				// 	}
				// }],
				"order": [

					[3, 'asc'],
				], //Initial no order.

				"ajax": {
					"url": "<?php echo site_url('Sysadmin/list_order_baru') ?>",
					"type": "POST"
				},
				"columnDefs": [{

						"targets": '_all',
						"createdCell": function(td, cellData, rowData, row, col) {
							$(td).css('padding', '5px')
						}
					},
					{
						"targets": [0, 1], //last column
						"orderable": false, //set not orderable
					},
					// {
					// 	'visible': false,
					// 	'targets': [0]
					// },

				]

			});



		});




		$('#min, #max').keyup(function() {
			table.ajax.reload();
		});

		$("#vertical-menu-btn").click(function() {
			$($.fn.dataTable.tables(true)).DataTable()
				.columns.adjust();
		});

		function Fungsi_Tambah() {
			$("#nama_barang").autocomplete({
				source: "<?php echo site_url('Sysadmin/Fungsi_AutoComplete') ?>"
			});

			save_method = 'add';
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty();
			// clear error string
			$('#modal_form').modal('show'); // show bootstrap modal
			$('.modal-title').text('Input Order Internal'); // Set Title to Bootstrap modal title
			$('#btnSave').show();
			$('#btnSaveEdit').hide();
			$('#btnSaveBatal').hide();
			$('#btnsaveUpdateProses').hide();
			$('#ukuran').prop('disabled', false);
			$('#type').prop('disabled', false);
			$('#grade').prop('disabled', false);
			HideTambahan();
			FilterDisableFalse();
			$("#penawaran option[value='2']").prop("selected", "selected");
		}

		function Fungsi_Tambah_Instrumen() {


			$("#nama_barang").autocomplete({
				source: "<?php echo site_url('Sysadmin/Fungsi_AutoComplete') ?>"
			});

			save_method = 'add';
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty();
			// clear error string
			$('#modal_input').modal('show'); // show bootstrap modal
			$('.modal-title').text('Input Form Order '); // Set Title to Bootstrap modal title
			$('#btnSave').show();

			FilterByKategoriUpdate();

			$('#tabel_order_baru').DataTable().search(
				<?= $id_batch; ?>
			).draw();

			$('.dataTables_scrollHeadInner, .dataTable').css({
				'width': '100%'
			})
		}


		function SaveUpload() {
			// $('#btnSave').text('saving...'); //change button text
			// $('#btnSave').attr('disabled', true); //set button disable 
			var url;

			if (save_method == 'add') {

				url = "<?php echo site_url('sysadmin/UploadPenawaran') ?>";

			} else {
				url = "<?php echo site_url('sysadmin/UploadPenawaran') ?>";

			}

			// ajax adding data to database
			$.ajax({
				url: url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data) {

					if (data.status) //if success close modal and reload ajax table
					{


						$('#tabel_penawaran').DataTable().ajax.reload();


					} else {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
					}

					// $('#btnSave').text('Simpan'); //change button text
					// $('#btnSave').attr('disabled', false); //set button enable 


				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Pastikan semua sudah terisi !');
					// $('#btnSave').text('Simpan'); //change button text
					// $('#btnSave').attr('disabled', false); //set button enable 

				}
			});
		}

		function Tambah() {



			$('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled', true); //set button disable 


			var url;

			if (save_method == 'add') {

				url = "<?php echo site_url('sysadmin/Tambah_order_baru') ?>";
				// document.getElementById("id_order").value = "<?= $id_order; ?>";

			} else {
				url = "<?php echo site_url('sysadmin/Update_Order') ?>";

			}

			// ajax adding data to database
			$.ajax({
				url: url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data) {

					if (data.status) //if success close modal and reload ajax table
					{

						// $('#modal_form').modal('hide');
						$('#tabel_order_baru').DataTable().ajax.reload();

						// reload_table_dan_page();


					} else {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
					}

					$('#btnSave').text('Tambahkan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 
					$('#form')[0].reset(); // reset form on modals
					$('.form-group').removeClass('has-error'); // clear error class
					$('.help-block').empty();

				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Pastikan semua sudah terisi !');
					$('#btnSave').text('Tambahkan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 

				}
			});
		}


		function saveDisetujui() {
			$('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled', true);

			//set button disable 
			var url;

			if (save_method == 'add') {

				url = "<?php echo site_url('sysadmin/Tambah_order_persetujuan') ?>";
				// document.getElementById("id_order").value = "<?= $id_order; ?>";

			} else {
				url = "<?php echo site_url('sysadmin/Update_disetujui_Kaunit') ?>";

			}

			// ajax adding data to database
			$.ajax({
				url: url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data) {

					if (data.status) //if success close modal and reload ajax table
					{

						$('#modal_input').modal('hide');
						$('#tabel_order').DataTable().ajax.reload();
						$('#tabel_order_persetujuan').DataTable().ajax.reload();
						// location.reload();
						// reload_table_dan_page();


					} else {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
					}

					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 


				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Pastikan semua sudah terisi !');
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 

				}
			});
		}



		function save() {
			Swal.fire({
				title: 'Kirim permintaan persetujuan Kepala Unit',
				text: "Sistem akan menggirim email permintaan persetujuan",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#7a7fdc',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Kirim',
				allowOutsideClick: () => !Swal.isLoading(),
				preConfirm: () => {
					$('#btnSave').text('saving...'); //change button text
					$('#btnSave').attr('disabled', true); //set button disable 


					var url;

					if (save_method == 'add') {

						url = "<?php echo site_url('sysadmin/Tambah_order_persetujuan') ?>";
						// document.getElementById("id_order").value = "<?= $id_order; ?>";

					} else {
						url = "<?php echo site_url('sysadmin/Update_Order') ?>";

					}

					// ajax adding data to database
					$.ajax({
						url: url,
						type: "POST",
						data: $('#form').serialize(),
						dataType: "JSON",
						success: function(data) {

							if (data.status) //if success close modal and reload ajax table
							{

								$('#modal_input').modal('hide');
								$('#tabel_order_persetujuan').DataTable().ajax.reload();
								location.reload();
							}

							$('#btnSave').text('Simpan'); //change button text
							$('#btnSave').attr('disabled', false); //set button enable 


						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error adding / update data');
							$('#btnSave').text('Simpan'); //change button text
							$('#btnSave').attr('disabled', false); //set button enable 

						}
					});
				},

			}).then((result) => {
				if (result.isConfirmed) {

					let timerInterval
					Swal.fire({
						title: 'Proses mengirim email!',
						html: 'Mohon Ditunggu <b></b> milliseconds.',
						timer: 4500,
						timerProgressBar: true,
						didOpen: () => {
							Swal.showLoading()
							const b = Swal.getHtmlContainer().querySelector('b')
							timerInterval = setInterval(() => {
								b.textContent = Swal.getTimerLeft()
							}, 100)
						},
						willClose: () => {
							clearInterval(timerInterval)
						}
					}).then((result) => {
						/* Read more about handling dismissals below */
						if (result.dismiss === Swal.DismissReason.timer) {
							console.log('I was closed by the timer')
						}
					})

				}
			})




		}

		function SaveBatal() {
			$('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled', true); //set button disable 


			var url;

			if (save_method == 'batal') {



				url = "<?php echo site_url('sysadmin/Update_Order_Dibatalkan') ?>";



			} else {
				url = "<?php echo site_url('sysadmin/Update_Order_Dibatalkan') ?>";

			}

			// ajax adding data to database
			$.ajax({
				url: url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data) {

					if (data.status) //if success close modal and reload ajax table
					{

						$('#modal_form').modal('hide');
						$('#tabel_order').DataTable().ajax.reload();


					} else {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
					}

					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 


				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Pastikan semua sudah terisi !');
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 

				}
			});
		}


		function saveEdit() {
			$('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled', true); //set button disable 
			var url;

			if (save_method == 'add') {

				url = "<?php echo site_url('sysadmin/Tambah_order') ?>";
				document.getElementById("id_order").value = "<?= $id_order; ?>";

			} else {
				url = "<?php echo site_url('sysadmin/Update_Order') ?>";

			}

			// ajax adding data to database
			$.ajax({
				url: url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data) {

					if (data.status) //if success close modal and reload ajax table
					{

						$('#modal_form').modal('hide');
						reload_table();


					} else {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
					}

					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 


				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error adding / update data');
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 

				}
			});
		}

		function savePenawaran() {
			$('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled', true); //set button disable 
			var url;

			if (save_method == 'add') {
				url = "<?php echo site_url('sysadmin/Tambah_Penawaran') ?>";
			} else {
				url = "<?php echo site_url('sysadmin/Tambah_Penawaran') ?>";
			}

			// ajax adding data to database

			var formData = new FormData($('#form')[0]);
			$.ajax({
				url: url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				success: function(data) {
					if (data.status) //if success close modal and reload ajax table
					{
						$('#tabel_penawaran').DataTable().ajax.reload();
					} else {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
					}
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error adding / update data');
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 

				}
			});
		}

		function saveKaUnit() {

			Swal.fire({
				title: 'Kirim permintaan persetujuan Kepala Unit',
				text: "Sistem akan menggirim email permintaan persetujuan",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#7a7fdc',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Kirim',
				allowOutsideClick: () => !Swal.isLoading(),
				preConfirm: () => {
					$('#btnSave').text('saving...'); //change button text
					$('#btnSave').attr('disabled', true); //set button disable 

					var data = document.getElementById("status_order").value;
					var url;
					if (data == 2) {
						url = "<?php echo site_url('sysadmin/Update_Order_Status2') ?>";
					} else if (data == 3) {
						url = "<?php echo site_url('sysadmin/Update_Order_Status3') ?>";

					} else if (data == 4) {
						url = "<?php echo site_url('sysadmin/Update_Order_Status4') ?>";

					} else if (data == 5) {
						url = "<?php echo site_url('sysadmin/Update_Order_Status5') ?>";

					} else if (data == 6) {
						url = "<?php echo site_url('sysadmin/Update_Order_Status6') ?>";

					} else if (data == 7) {
						url = "<?php echo site_url('sysadmin/Update_Order_Status7') ?>";

					} else if (data == 8) {
						url = "<?php echo site_url('sysadmin/Update_Order_Status8') ?>";

					} else if (data == 9) {
						url = "<?php echo site_url('sysadmin/Update_Order_Status9') ?>";
					}

					// ajax adding data to database
					$.ajax({
						url: url,
						type: "POST",
						data: $('#form').serialize(),
						dataType: "JSON",
						success: function(data) {

							if (data.status) //if success close modal and reload ajax table
							{

								$('#modal_form').modal('hide');
								reload_table();
							}

							$('#btnSave').text('Simpan'); //change button text
							$('#btnSave').attr('disabled', false); //set button enable 


						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error adding / update data');
							$('#btnSave').text('Simpan'); //change button text
							$('#btnSave').attr('disabled', false); //set button enable 

						}
					});
				},

			}).then((result) => {
				if (result.isConfirmed) {

					let timerInterval
					Swal.fire({
						title: 'Proses mengirim email!',
						html: 'Mohon Ditunggu <b></b> milliseconds.',
						timer: 4500,
						timerProgressBar: true,
						didOpen: () => {
							Swal.showLoading()
							const b = Swal.getHtmlContainer().querySelector('b')
							timerInterval = setInterval(() => {
								b.textContent = Swal.getTimerLeft()
							}, 100)
						},
						willClose: () => {
							clearInterval(timerInterval)
						}
					}).then((result) => {
						/* Read more about handling dismissals below */
						if (result.dismiss === Swal.DismissReason.timer) {
							console.log('I was closed by the timer')
						}
					})

				}
			})




		}

		function saveUpdateProses() {


			$('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled', true); //set button disable 

			var data = document.getElementById("status_order").value;
			var url;
			if (data == 2) {
				url = "<?php echo site_url('sysadmin/Update_Order_Status2') ?>";
			} else if (data == 3) {
				url = "<?php echo site_url('sysadmin/Update_Order_Status3') ?>";

			} else if (data == 4) {
				url = "<?php echo site_url('sysadmin/Update_Order_Status4') ?>";

			} else if (data == 5) {
				url = "<?php echo site_url('sysadmin/Update_Order_Status5') ?>";

			} else if (data == 6) {
				url = "<?php echo site_url('sysadmin/Update_Order_Status6') ?>";

			} else if (data == 7) {
				url = "<?php echo site_url('sysadmin/Update_Order_Status7') ?>";

			} else if (data == 8) {
				url = "<?php echo site_url('sysadmin/Update_Order_Status8') ?>";

			} else if (data == 9) {
				url = "<?php echo site_url('sysadmin/Update_Order_Status9') ?>";
			}

			// ajax adding data to database
			$.ajax({
				url: url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data) {

					if (data.status) //if success close modal and reload ajax table
					{

						$('#modal_form').modal('hide');
						reload_table();
					}

					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 


				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error adding / update data');
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 

				}
			});
		}






		function reload_table_dan_page() {
			$('#tabel_order').DataTable().ajax.reload();
			location.reload();
		}

		function reload_table() {
			$('#tabel_order').DataTable().ajax.reload();

		}

		function Btn_Edit(id_order) {
			save_method = 'update';
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			$('#btnSave').hide();
			$('#btnSaveEdit').show();
			$('#btnSaveBatal').hide();
			$('#btnsaveUpdateProses').hide();
			//Ajax Load data from ajax
			$.ajax({
				url: "<?php echo site_url('Sysadmin/Edit_oder') ?>/" + id_order,
				type: "GET",
				dataType: "JSON",
				success: function(data) {

					$('[name="id_order"]').val(data.id_order);
					$('[name="tanggal_input"]').val(data.tanggal_input);
					$('[name="kategori_barang"]').val(data.kategori_barang);
					$('[name="nama_barang"]').val(data.nama_barang);
					$('[name="jumlah"]').val(data.jumlah);
					$('[name="nama"]').val(data.nama);
					$('[name="keterangan"]').val(data.keterangan);
					$('[name="status"]').val(data.status);

					FilterDisableFalse();
					$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
					$('.modal-title').text('Edit Kategori Instrumen'); // Set title to Bootstrap modal title
					HideTambahan();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});
		}

		function Btn_Edit_Order(nomor) {
			save_method = 'update';
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			// $('#btnSave').hide();
			// $('#btnSaveEdit').show();
			// $('#btnSaveBatal').hide();
			// $('#btnsaveUpdateProses').hide();
			//Ajax Load data from ajax
			$.ajax({
				url: "<?php echo site_url('Sysadmin/Edit_oder_baru') ?>/" + nomor,
				type: "GET",
				dataType: "JSON",
				success: function(data) {

					document.getElementById("id_order").value = data.id_order;
					// $('[name="tanggal_input"]').val(data.tanggal_input);
					// $('[name="kategori_barang"]').val(data.kategori_barang);
					// $('[name="nama_barang"]').val(data.nama_barang);
					// $('[name="jumlah"]').val(data.jumlah);
					// $('[name="nama"]').val(data.nama);
					// $('[name="keterangan"]').val(data.keterangan);
					// $('[name="status"]').val(data.status);

					// FilterDisableFalse();
					// $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
					// $('.modal-title').text('Edit Kategori Instrumen'); // Set title to Bootstrap modal title
					// HideTambahan();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});
		}

		function Btn_Persetujuan(id_batch) {

			// $("#penawaran").change(function() {
			// 	var data = document.getElementById("penawaran").value;

			// 	if (data == 1) {

			// 		$("#status_order option[value='4']").prop("selected", "selected");

			// 	} else if (data == 0) {

			// 		$("#status_order option[value='7']").prop("selected", "selected");

			// 	} else {

			// 		$("#status_order option[value='7']").prop("selected", "selected");

			// 	}
			// });


			// $("#dynamic_form").on("click", ".btn-tambah", function() {
			// 	addForm()
			// 	$(this).css("display", "none")
			// 	var valtes = $(this).parent().find(".btn-hapus").css("display", "");
			// })

			// $("#dynamic_form").on("click", ".btn-hapus", function() {
			// 	$(this).parent().parent('.baru-data').remove();
			// 	var bykrow = $(".baru-data").length;
			// 	if (bykrow == 1) {
			// 		$(".btn-hapus").css("display", "none")
			// 		$(".btn-tambah").css("display", "");
			// 	} else {
			// 		$('.baru-data').last().find('.btn-tambah').css("display", "");
			// 	}
			// });



			save_method = 'update';
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			$('#input_order').hide();
			// $('#form').hide();


			//Ajax Load data from ajax
			$.ajax({
				url: "<?php echo site_url('Sysadmin/Edit_oder_persetujuan') ?>/" + id_batch,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('[name="id_batch"]').val(data.id_batch);
					// $('[name="id_order"]').val(data.id_order);
					// $('[name="tanggal_input"]').val(data.tanggal_input);
					// $('[name="kategori_barang"]').val(data.kategori_barang);
					// $('[name="nama_barang"]').val(data.nama_barang);
					// $('[name="nama_barang_email"]').val(data.nama_barang);
					// $('[name="jumlah"]').val(data.jumlah);
					// $('[name="nama"]').val(data.nama);
					// $('[name="keterangan"]').val(data.keterangan);
					// $('[name="status"]').val(data.status);
					// $('[name="satuan"]').val(data.satuan);
					// $('[name="penawaran"]').val(data.penawaran);
					// $('[name="ukuran"]').val(data.ukuran);
					// $('[name="type"]').val(data.type);
					// $('[name="grade"]').val(data.grade);
					// $('[name="id_instrumen"]').val(data.id_instrumen);
					// $('[name="keterangan_dibatalkan"]').val(data.keterangan_dibatalkan);

					$('#modal_input').modal('show');
					// HideTambahan();

					// FilterByStatus();
					// FilterByKategoriUpdate();
					// $('#tabel_penawaran').DataTable().search(
					// 	$('#id_order').val(),
					// ).draw();
					// $('#tabel_penawaran2').DataTable().search(
					// 	$('#id_order').val(),
					// ).draw();

					$('#tabel_order_baru').DataTable().search(
						$('#id_batch').val()
					).draw();
					$("#status_order option[value='3']").prop("selected", "selected");

					// $('#keterangan').prop('disabled', true);

					// show bootstrap modal when complete loaded
					$('.modal-title').text('Daftar barang yang dioder'); // Set title to Bootstrap modal title

				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});


		}

		function Btn_Update(id_order) {

			$("#penawaran").change(function() {
				var data = document.getElementById("penawaran").value;

				if (data == 1) {

					$("#status_order option[value='4']").prop("selected", "selected");

				} else if (data == 0) {

					$("#status_order option[value='7']").prop("selected", "selected");

				} else {

					$("#status_order option[value='7']").prop("selected", "selected");

				}
			});


			$("#dynamic_form").on("click", ".btn-tambah", function() {
				addForm()
				$(this).css("display", "none")
				var valtes = $(this).parent().find(".btn-hapus").css("display", "");
			})

			$("#dynamic_form").on("click", ".btn-hapus", function() {
				$(this).parent().parent('.baru-data').remove();
				var bykrow = $(".baru-data").length;
				if (bykrow == 1) {
					$(".btn-hapus").css("display", "none")
					$(".btn-tambah").css("display", "");
				} else {
					$('.baru-data').last().find('.btn-tambah').css("display", "");
				}
			});



			save_method = 'update';
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnSaveBatal').hide();
			$('#btnsaveUpdateProses').show();



			//Ajax Load data from ajax
			$.ajax({
				url: "<?php echo site_url('Sysadmin/Edit_oder') ?>/" + id_order,
				type: "GET",
				dataType: "JSON",
				success: function(data) {

					$('[name="id_order"]').val(data.id_order);
					$('[name="tanggal_input"]').val(data.tanggal_input);
					$('[name="kategori_barang"]').val(data.kategori_barang);
					$('[name="nama_barang"]').val(data.nama_barang);
					$('[name="nama_barang_email"]').val(data.nama_barang);
					$('[name="jumlah"]').val(data.jumlah);
					$('[name="nama"]').val(data.nama);
					$('[name="keterangan"]').val(data.keterangan);
					$('[name="status"]').val(data.status);
					$('[name="satuan"]').val(data.satuan);
					$('[name="penawaran"]').val(data.penawaran);
					$('[name="ukuran"]').val(data.ukuran);
					$('[name="type"]').val(data.type);
					$('[name="grade"]').val(data.grade);
					$('[name="id_instrumen"]').val(data.id_instrumen);
					$('[name="keterangan_dibatalkan"]').val(data.keterangan_dibatalkan);

					$('#modal_form').modal('show');
					HideTambahan();
					Btn_Batal
					FilterByStatus();
					FilterByKategoriUpdate();
					$('#tabel_penawaran').DataTable().search(
						$('#id_order').val(),
					).draw();
					$('#tabel_penawaran2').DataTable().search(
						$('#id_order').val(),
					).draw();


					// $('#keterangan').prop('disabled', true);

					// show bootstrap modal when complete loaded
					$('.modal-title').text('Informasi Proses Order'); // Set title to Bootstrap modal title

				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});


		}





		function Btn_Batal(id_order) {

			save_method = 'batal';
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnSaveBatal').show();
			$('#btnsaveUpdateProses').hide();

			//Ajax Load data from ajax
			$.ajax({
				url: "<?php echo site_url('Sysadmin/Edit_oder') ?>/" + id_order,
				type: "GET",
				dataType: "JSON",
				success: function(data) {

					$('[name="id_order"]').val(data.id_order);
					$('[name="tanggal_input"]').val(data.tanggal_input);
					$('[name="kategori_barang"]').val(data.kategori_barang);
					$('[name="nama_barang"]').val(data.nama_barang);
					$('[name="jumlah"]').val(data.jumlah);
					$('[name="nama"]').val(data.nama);
					$('[name="keterangan"]').val(data.keterangan);
					$('[name="status"]').val(data.status);
					$('[name="satuan"]').val(data.satuan);
					$('[name="penawaran"]').val(data.penawaran);
					$('[name="ukuran"]').val(data.ukuran);
					$('[name="type"]').val(data.type);
					$('[name="grade"]').val(data.grade);
					$('[name="keterangan_dibatalkan"]').val(data.keterangan_dibatalkan);
					$('#modal_form').modal('show');

					HideTambahan();
					// $('#input_keterangan_tambahan').show();

					FilterByDibatalkan();
					$("#status_order option[value='20']").prop("selected", "selected");
					// FilterByKategoriUpdate();
					// $('#keterangan').prop('disabled', true);

					// show bootstrap modal when complete loaded
					$('.modal-title').text('Informasi Proses Order'); // Set title to Bootstrap modal title

				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});


		}

		function FilterByPenawaran() {

			var data = document.getElementById("penawaran").value;

			if (data == 0) {

				$("#status_order option[value='4']").prop("selected", "selected");

			} else if (data == 1) {

				$("#status_order option[value='7']").prop("selected", "selected");

			}
		}

		function FilterByKategori() {

			var data = document.getElementById("kategori_barang").value;

			if (data == "Glassware") {

				$('#input_spesifikasi').show();
				$('#input_ukuran').show();
				$('#input_type').show();
				$('#input_grade').show();

			} else {


				$('#input_spesifikasi').hide();
				$('#input_ukuran').hide();
				$('#input_type').hide();
				$('#input_grade').hide();

			}
		}

		function FilterByKategoriUpdate() {

			var data = document.getElementById("kategori_barang").value;

			if (data == "Glassware") {

				$('#tambahan_glassware').show();
				$("#ukuran ").prop("disabled", "disabled");
				$("#type ").prop("disabled", "disabled");
				$("#grade ").prop("disabled", "disabled");
			} else {

				$('#tambahan_glassware').hide();


			}
		}

		function FilterDisableTrue() {
			$('#keterangan').prop('disabled', true);
			$('#urgent').prop('disabled', true);
			$('#kategori_barang').prop('disabled', true);
			$('#nama_barang').prop('disabled', true);
			$('#jumlah').prop('disabled', true);
			$('#nama').prop('disabled', true);
			$('#satuan').prop('disabled', true);
			$('#merek').prop('disabled', true);

		}

		function HideTambahan() {
			$('#input_keterangan_tambahan').hide();
			$('#no_pr').hide();
			$('#tambahan_glassware').hide();
			$('#input_keterangan_dibatalkan').hide();
			$('#Upload_penawaran').hide();
			$('#Konfirmasi_penawaran').hide();
		}

		function FilterDisableFalse() {
			$('#keterangan').prop('disabled', false);
			$('#urgent').prop('disabled', false);
			$('#kategori_barang').prop('disabled', false);
			$('#nama_barang').prop('disabled', false);
			$('#jumlah').prop('disabled', false);
			$('#nama').prop('disabled', false);
			$('#satuan').prop('disabled', false);
			$('#merek').prop('disabled', false);
		}


		function FilterByDibatalkan() {

			var data = document.getElementById("status_order").value;

			if (data == 20) {
				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').hide();
				$('#input_keterangan_dibatalkan').show();
				$('#keterangan_dibatalkan').prop('disabled', true);
				$('#Upload_penawaran').hide();
				$('#btnSaveBatal').hide();

			} else {
				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').hide();
				$('#input_keterangan_dibatalkan').show();
				$('#keterangan_dibatalkan').prop('disabled', false);
				$('#Upload_penawaran').hide();
				$('#Konfirmasi_penawaran').hide();

			}
		}


		function FilterByStatus() {

			var data = document.getElementById("status_order").value;

			if (data == 1) {

				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').hide();
				$('#btnsaveKaUnit').show();

				$('#btnsaveUpdateProses').text('Disetujui Penyelia');
				$("#status_order option[value='2']").prop("selected", "selected");
				$('#daftar_penawaran').hide();


			} else if (data == 2) {

				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').show();
				$('#btnSaveBatal').show();
				$('#btnsaveUpdateProses').text('Disetujui');
				$('#btnSaveBatal').text('Batalkan');
				$("#status_order option[value='3']").prop("selected", "selected");

				$('#input_keterangan_tambahan').show();
				$('#Upload_penawaran').hide();
				$('#daftar_penawaran').hide();
				$('#btnsaveKaUnit').hide()
			} else if (data == 3) {

				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').show();
				$('#btnsaveUpdateProses').text('Update Order');
				$("#penawaran option[value='2']").prop("disabled", "disabled");


				$('#Konfirmasi_penawaran').show();
				$('#Upload_penawaran').hide();
				$('#input_keterangan_tambahan').hide();
				$('#no_pr').hide();
				$('#daftar_penawaran').hide();
				$('#btnsaveKaUnit').hide()
			} else if (data == 4) {

				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').show();
				$('#btnsaveUpdateProses').text('Penawaran Sudah Diberikan Ke Unit');
				$("#status_order option[value='5']").prop("selected", "selected");

				$('#Upload_penawaran').show();
				$('#input_keterangan_tambahan').hide();
				$('#no_pr').hide();
				$('#daftar_penawaran').hide();
				$('#btnsaveKaUnit').hide()
			} else if (data == 5) {

				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').show();
				$('#btnsaveUpdateProses').text('Penawaran Sudah Dipilih');
				$("#status_order option[value='6']").prop("selected", "selected");

				$('#daftar_penawaran').show();
				$('#input_keterangan_tambahan').show();

				$('#no_pr').hide();
				$('#btnsaveKaUnit').hide()
			} else if (data == 6) {

				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').show();
				$('#btnsaveUpdateProses').text('Disetujui Direktur');
				$("#status_order option[value='7']").prop("selected", "selected");

				$('#input_keterangan_tambahan').hide();
				$('#Upload_penawaran').hide();
				$('#no_pr').hide();
				$('#daftar_penawaran').hide();
				$('#btnsaveKaUnit').hide()
			} else if (data == 7) {

				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').show();
				$('#btnsaveUpdateProses').text('Update Nomor PR');
				$("#status_order option[value='8']").prop("selected", "selected");

				$('#no_pr').show();
				$('#input_keterangan_tambahan').show();
				$('#Upload_penawaran').hide();
				$('#daftar_penawaran').hide();
				$('#btnsaveKaUnit').hide()
			} else if (data == 8) {

				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').show();
				$('#btnsaveUpdateProses').text('Terima Barang');
				$("#status_order option[value='9']").prop("selected", "selected");

				$('#input_keterangan_tambahan').show();
				$('#Upload_penawaran').hide();
				$('#no_pr').hide();
				$('#daftar_penawaran').hide();
				$('#btnsaveKaUnit').hide()
			} else if (data == 9) {
				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').hide();
				$("#status_order option[value='9']").prop("selected", "selected");

				$('#input_keterangan_tambahan').hide();
				$('#Upload_penawaran').hide();
				$('#no_pr').hide();
				$('#daftar_penawaran').hide();
				$('#btnsaveKaUnit').hide()
			} else if (data == 20) {
				FilterDisableTrue();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').hide();
				$('#input_keterangan_dibatalkan').show();
				$('#keterangan_dibatalkan').prop('disabled', true);
				$('#Upload_penawaran').hide();
				$('#daftar_penawaran').hide();
				$('#btnsaveKaUnit').hide()

			} else {
				FilterDisableTrue();
				// $('#keterangan').prop('disabled', true);
				// $('#tanggal_input').prop('disabled', true);
				// $('#kategori_barang').prop('disabled', true);
				// $('#nama_barang').prop('disabled', true);
				// $('#jumlah').prop('disabled', true);
				// $('#nama').prop('disabled', true);

				$('#daftar_penawaran').hide();
				$('#btnSave').hide();
				$('#btnSaveEdit').hide();
				$('#btnsaveUpdateProses').hide();
				$('#btnsaveKaUnit').hide();
				$('#input_keterangan_tambahan').hide();
				$('#Upload_penawaran').hide();
				$('#no_pr').hide();

			}
		}

		function autofill(tipe_instrumen) {
			var tipe_instrumen = document.getElementById('nama_barang').value;
			$.ajax({
				url: "<?php echo base_url('sysadmin/TipeGlassware') ?>/",

				data: {

					tipe_instrumen: tipe_instrumen,
				},
				success: function(data) {
					var hasil = JSON.parse(data);

					$.each(hasil, function(key, val) {

						document.getElementById('id_instrumen').value = val.id_instrumen;
						document.getElementById('rumus_instrumen').value = val.rumus_instrumen;
						// document.getElementById('tipe_instrumen').value = val.tipe_instrumen;
					});
				}
			});
		}


		function Btn_Hapus(id_order) {


			Swal.fire({
				title: 'Yakin data akan di hapus ?',
				text: "",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#7a7fdc',
				confirmButtonText: 'Hapus Data'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?php echo site_url('sysadmin/Hapus_Order') ?>/" + id_order,
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							//if success reload ajax table
							$('#modal_form').modal('hide');

							Swal.fire(
								'Data Terhapus!',
								'Data sudah berhasil terhapus.',
								'success'
							)
							reload_table();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error deleting data');
						}
					});
				}
			})




		}

		function Btn_Hapus_persetujuan(id_batch) {
			Swal.fire({
				title: 'Yakin data akan di hapus ?',
				text: "",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#7a7fdc',
				confirmButtonText: 'Hapus Data'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?php echo site_url('sysadmin/Hapus_order_persetujuan') ?>/" + id_batch,
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							//if success reload ajax table
							// $('#modal_form').modal('hide');

							Swal.fire(
								'Data Terhapus!',
								'Data sudah berhasil terhapus.',
								'success'
							)
							$('#tabel_order_persetujuan').DataTable().ajax.reload();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error deleting data');
						}
					});
				}
			})




		}

		function Hapus_penawaran(id_penawaran) {


			Swal.fire({
				title: 'Yakin data akan di hapus ?',
				text: "",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#7a7fdc',
				confirmButtonText: 'Hapus Data'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?php echo site_url('sysadmin/Hapus_penawaran') ?>/" + id_penawaran,
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							//if success reload ajax table


							Swal.fire(
								'Data Terhapus!',
								'Data sudah berhasil terhapus.',
								'success'
							)
							$('#tabel_penawaran').DataTable().ajax.reload();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error deleting data');
						}
					});
				}
			})
		}

		function Hapus_order_baru(nomor) {


			Swal.fire({
				title: 'Yakin data akan di hapus ?',
				text: "",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#7a7fdc',
				confirmButtonText: 'Hapus Data'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?php echo site_url('sysadmin/Hapus_Order_Baru') ?>/" + nomor,
						type: "POST",
						dataType: "JSON",
						success: function(data) {
							//if success reload ajax table


							Swal.fire(
								'Data Terhapus!',
								'Data sudah berhasil terhapus.',
								'success'
							)
							$('#tabel_order_baru').DataTable().ajax.reload();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error deleting data');
						}
					});
				}
			})
		}

		$('#add').click(function(event) {
			alert('sss');
		});

		$('body').on('click', '#remove', function() {
			$(this).parent('div').remove();
		});
	</script>






	<div class="modal fade" id="modal_input" role="dialog">
		<div class="modal-dialog modal-fullscreen">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myLargeModalLabel">Input Data Order</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body form">
					<form action="#" id="form" class="needs-validation" novalidate>

						<div class="form-body">
							<div class="card" id="input_order">
								<div class="card-body">
									<div class="row">

										<!-- <div class="col-md-3">
									<div class="mb-1">
										<label class="form-label col-form-label-sm mb-0"  for="email">Id email</label>
										<input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Id email" value="erni.rusmalawati@sidomuncul.co.id">
										<div class="invalid-feedback">
											Please provide a Id Order.
										</div>
									</div>
								</div> -->
										<div class="col-auto">
											<label class="form-label col-form-label-sm mb-0" for="urgent">Urgent</label>
											<select class="form-select form-select-sm" id="urgent" name="urgent">
												<option value="1">Ya</option>
												<option selected value="2">Tidak</option>
											</select>
										</div>

										<div class="col-auto">
											<label class="form-label col-form-label-sm mb-0" for="kategori_barang">Kategori Barang</label>
											<select class="form-select form-select-sm" id="kategori_barang" name="kategori_barang" onchange="FilterByKategori();">
												<option selected value="">Pilih Kategori</option>
												<?php
												foreach ($dataKategori as $row) {
													echo '<option value="' . $row->kategori_barang . '">' . $row->kategori_barang . '</option>';
												}
												?>
											</select>
										</div>

										<div class="col-auto">
											<label class="form-label col-form-label-sm mb-0" for="nama_barang">Nama Barang</label>
											<input type="text" class="form-control form-select-sm autocomplete" id="nama_barang" name="nama_barang" placeholder="Nama Barang" onchange="autofill();">
										</div>

										<div class="col-md-1">
											<div class="mb-3">
												<label class="form-label col-form-label-sm mb-0" for="merek">Merek</label>
												<input type="text" class="form-control form-control-sm" id="merek" name="merek" placeholder="Merek" required>
												<div class="invalid-feedback">
													Please provide a Merek .
												</div>
											</div>
										</div>

										<!-- <div class="col-md-4">
									<div class="mb-1">

										<label class="form-label col-form-label-sm mb-0"  for="nama_barang_email">Nama Barang</label>
										<input type="text" class="form-control form-control-sm autocomplete" id="nama_barang_email" name="nama_barang_email" placeholder="Nama Barang" onchange="autofill();">
										<div class="invalid-feedback">
											Please provide a nama_barang.
										</div>

									</div>
								</div> -->
										<div class="col-md-1" id="input_spesifikasi">
											<div class="mb-3">
												<label class="form-label col-form-label-sm mb-0" for="spesifikasi">Spesifikasi / No Katalog</label>
												<input type="text" class="form-control form-control-sm" id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi / No Katalog" required>
												<div class="invalid-feedback">
													Please provide a spesifikasi .
												</div>
											</div>
										</div>

										<div class="col-auto" id="input_ukuran">

											<label class="form-label col-form-label-sm mb-0" for="ukuran">Kapasitas Ukuran</label>
											<select class="form-select form-select-sm" id="ukuran" name="ukuran">
												<option selected value="">Pilih Ukuran</option>
												<?php
												foreach ($dataUkuran as $row) {
													echo '<option value="' . $row->ukuran . '">' . $row->ukuran . '</option>';
												}
												?>
											</select>

										</div>
										<div class="col-auto" id="input_type">
											<label class="form-label col-form-label-sm mb-0" for="type">Type</label>
											<select class="form-select form-select-sm" id="type" name="type">
												<option selected value="">Pilih Type</option>
												<option value="Borosilicate Glass">Borosilicate Glass </option>
											</select>

										</div>
										<div class="col-auto" id="input_grade">

											<label class="form-label col-form-label-sm mb-0" for="grade">Grade</label>
											<select class="form-select form-select-sm" id="grade" name="grade">
												<option selected value="">Pilih Grade</option>
												<option value="Class A">Class A</option>
												<option value="Class B">Class B</option>
												<option value="Class C">Class C</option>
											</select>

										</div>


										<div class="col-md-1" style="width: 80px;">

											<label class="form-label col-form-label-sm mb-0" for="jumlah">Jumlah</label>


											<input class="form-control form-control-sm" type="text" id="jumlah" name="jumlah" value="1">

										</div>


										<div class="col-auto">
											<label class="form-label col-form-label-sm mb-0" for="satuan">Satuan</label>
											<select class="form-select form-select-sm" id="satuan" name="satuan">
												<option seleted value="">Pilih Satuan</option>
												<?php
												foreach ($dataSatuan as $row) {
													echo '<option value="' . $row->satuan . '">' . $row->satuan . '</option>';
												}
												?>
											</select>
										</div>


										<div class="col-md-1">

											<label class="form-label col-form-label-sm mb-0" for="nama">Nama PIC</label>
											<input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Pemesan" required>

										</div>
										<div class="col-sm-2 " style="width: 325px;">

											<label class="form-label col-form-label-sm mb-0" for="keterangan">Keterangan</label>
											<textarea type="text" class="form-control form-control-sm" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" rows="1"></textarea>

										</div>













										<!-- <div class="col-md-12" id="no_pr">
									<div class="mb-3">
										<label class="form-label col-form-label-sm mb-0"  for="no_pr">Masukan Nomor PR </label>
										<input type="text" class="form-control form-control-sm" name="no_pr" placeholder="Nomor PR " required>
										<div class="invalid-feedback">
											Please provide a nama .
										</div>
									</div>
								</div> -->
									</div>
									<div class="row">
										<!-- <div class="col-md-2" id="input_keterangan_tambahan">

											<label class="form-label col-form-label-sm mb-0" for="keterangan_tambahan">Keterangan </label>
											<textarea type="text" class="form-control form-control-sm" id="keterangan_tambahan" name="keterangan_tambahan" placeholder="Masukan Keterangan " rows="2"></textarea>
											<div class="invalid-feedback">
												Please provide a Tahun.
											</div>
										</div> -->

										<div class="col-md-1">

											<label class="form-label col-form-label-sm mb-0" for="id_order">Id Order</label>
											<input type="text" class="form-control form-control-sm " id="id_order" name="id_order" placeholder="Id Order">
											<div class="invalid-feedback">
												Please provide a Id Order.
											</div>

										</div>

										<div class="col-md-1">

											<label class="form-label col-form-label-sm mb-0" for="nomor">Nomor</label>
											<input type="text" class="form-control form-control-sm " id="id_order" name="nomor" placeholder="Nomor">
											<div class="invalid-feedback">
												Please provide a Nomor.
											</div>

										</div>

										<div class="col-md-1">

											<label class="form-label col-form-label-sm mb-0" for="id_batch">id_batch</label>
											<input type="text" class="form-control form-control-sm " id="id_batch" name="id_batch" placeholder="id_batch" value="<?= $id_batch; ?>">
											<div class="invalid-feedback">
												Please provide a Nomor.
											</div>

										</div>

										<div class="col-auto" id="Konfirmasi_penawaran">

											<label class="form-label col-form-label-sm mb-0" for="penawaran">Apakah Perlu Pernawaran ? </label>
											<select class="form-select form-select-sm" name="penawaran" id="penawaran">
												<option value="0">Tidak</option>
												<option value="1">Ya</option>
												<option selected value="2">Belum Ditentukan</option>
											</select>

										</div>
										<div class="col-auto">

											<label class="form-label col-form-label-sm mb-0" for="status">status</label>
											<select class="form-select form-select-sm" name="status" id="status_order">
												<?php
												foreach ($dataStatus as $row) {
													echo '<option value="' . $row->id_status . '">' . $row->status . '</option>';
												}
												?>
											</select>

										</div>

										<div class="col-md-1">
											<div class="mb-3">
												<label class="form-label col-form-label-sm mb-0" for="id_instrumen">Kode Instrumen</label>
												<input type="text" class="form-control form-control-sm" id="id_instrumen" name="id_instrumen" placeholder="Kode Instrumen" readonly>
												<div class="invalid-feedback">
													Please provide a Kode Instrumen.
												</div>
											</div>
										</div>

										<div class="col-md-1">
											<div class="mb-3">
												<label class="form-label col-form-label-sm mb-0" for="rumus">rumus_instrumen</label>
												<input type="text" class="form-control form-control-sm" id="rumus_instrumen" name="rumus_instrumen" placeholder="Kode Instrumen" readonly>
												<div class="invalid-feedback">
													Please provide a Kode Instrumen.
												</div>
											</div>
										</div>
										<div class="col-md-1">
											<div class="mb-3">
												<label for="tanggal_input" class="form-label col-form-label-sm mb-0">Tanggal Input</label>
												<input class="form-control form-control-sm" type="text" id="tanggal_input" name="tanggal_input" autocomplete="off" value="<?php echo date("Y-m-d"); ?>" placeholder="Tanggal tanggal_input">
											</div>
										</div>



										<div class="col-md-1">
											<div class="mb-3">
												<label for="tanggal_waktu" class="form-label col-form-label-sm mb-0">Tanggal Waktu Input</label>
												<input class="form-control form-control-sm" type="text" id="tanggal_waktu" name="tanggal_waktu" autocomplete="off" value="<?php echo date("Y-m-d H:i:s"); ?>" placeholder="Tanggal tanggal_waktu">
											</div>
										</div>

										<div class="col-md-1" id="input_last_edit">
											<div class="mb-3">
												<label class="form-label col-form-label-sm mb-0" for="last_edit">last_edit </label>
												<input type="text" class="form-control form-control-sm" name="last_edit" id="last_edit" placeholder="last_edit" value="<?= $dataSession['nama']; ?>">
												<div class="invalid-feedback">
													Please provide a last_edit .
												</div>

											</div>
										</div>
									</div>
								</div>

								<div class="card-footer text-center">
									<div class="float-end"><button type="button float-right" id="btnSave" onclick="Tambah()" class="btn btn-primary">Tambahkan</button></div><br>

								</div>
							</div>
						</div>
					</form>

					<div class="card">
						<div class="card-body">
							<table id="tabel_order_baru" name="tabel_order_baru" class="table table-hover nowrap w-100">
								<thead>
									<tr style="text-align: center">
										<th width="10px">Menu</th>
										<th width="10px">No</th>
										<th width="10px">Id Order</th>
										<th width="10px">Id Request</th>
										<th width="10px">Tanggal Input</th>
										<th width="10px">Kategori</th>
										<th>Nama Barang</th>
										<th>Spesifikasi / No Katalog </th>
										<th width="10px">Merek</th>
										<th width="10px">Ukuran</th>
										<th width="10px">Type</th>
										<th width="10px">Grade</th>
										<th width="10px">Jumlah</th>
										<th width="10px">Satuan</th>
										<th width="10px">Nama PIC</th>
										<th>Keterangan</th>
										<th>Status</th>
										<th width="10px">Tanggal Datang</th>
										<th width="10px">Urgent</th>
										<th width="10px">Penawaran</th>
										<th width="10px">No PR</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" id="btnDisetujui" onclick="saveDisetujui()" class="btn btn-primary">Disetujui</button>
					<button type="button" id="btnSave" name="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
</body>

</html>