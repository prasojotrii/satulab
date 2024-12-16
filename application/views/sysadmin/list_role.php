<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8" />
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Daftar Instrumen Lab Sido Muncul" name="description" />
	<meta content="" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

	<!-- preloader css -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/preloader.min.css" type="text/css" />

	<!-- Bootstrap Css -->
	<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="<?= base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

	<!-- Custom Css -->
	<link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">

	<link href="<?= base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Responsive datatable examples -->
	<link href="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />



	<link href="<?= base_url(); ?>assets/libs/@fullcalendar/core/main.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/libs/@fullcalendar/daygrid/main.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/libs/@fullcalendar/bootstrap/main.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/libs/@fullcalendar/timegrid/main.min.css" rel="stylesheet" type="text/css" />
	<style>
		div .dt-buttons {
			float: left;
		}

		.dataTables_length {
			float: right;
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
						<i class=" fa fa-fw fa-bars"></i>
					</button>


				</div>

				<div class="d-flex">

					<!-- <div class="dropdown d-inline-block d-lg-none ms-2">
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
					</div> -->


					<!-- <div class="dropdown d-none d-sm-inline-block">
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
									<a href="<?= base_url('sysadmin/data_order'); ?>">Data Order Internal </a>
								</li>
								<li>
									<a href="<?= base_url('sysadmin/kategori_instrumen'); ?>"> Data Instrumen </a>
								</li>
								<li>
									<a href="<?= base_url('sysadmin/kategori_glassware'); ?>"> Data Glassware </a>
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



				<div class="card text-center">
					<div class="card-header">

						<h4> Setting Role User</h4>
					</div>
					<div class="card-body">
						<form action="#" class="needs-validation" novalidate>
							<div class="row">
								<div class=" col-md-6" id="">
									<div class="mb-3">
										<label class="form-label" for="id_user">Id User</label>
										<input type="text" class="form-control" id="id_user" name="id_user" placeholder="Id User" value="<?= $dataSession['id_user']; ?>" readonly>
									</div>
								</div>


								<div class=" col-md-6" id="">
									<div class="mb-3">
										<label class="form-label" for="username">Username / Perner</label>
										<input type="text" class="form-control" id="username" name="username" placeholder="Username / Perner" value="<?= $dataSession['username']; ?>" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12" id="">
									<div class="mb-3">
										<label class="form-label" for="nama">Nama </label>
										<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $dataSession['nama']; ?>" readonly>
									</div>
								</div>



								<div class="col-md-4" id="">
									<div class="mb-3">
										<label class="form-label" for="sub_laboratorium">Bagian Laboratorium</label>
										<input type="text" class="form-control" id="sub_laboratorium" name="sub_laboratorium" placeholder="Bagian Laboratorium" readonly value="<?= $dataSession['sub_laboratorium']; ?>">
									</div>
								</div>
								<div class="col-md-4" id="">
									<div class="mb-3">
										<label class="form-label" for="penyelia">Nama Penyelia</label>
										<input type="text" class="form-control" id="penyelia" name="penyelia" placeholder="Nama Penyelia" value="<?= $dataSession['penyelia']; ?>" readonly>
									</div>
								</div>
								<div class="col-md-4" id="">
									<div class="mb-3">
										<label class="form-label" for="kepalaunit">Nama Ka Unit</label>
										<input type="text" class="form-control" id="kepalaunit" name="kepalaunit" placeholder="Nama Ka Unit" value="<?= $dataSession['kepalaunit']; ?>" readonly>
									</div>
								</div>


							</div>
							<div class="card-footer text-muted">
								<button type="button" id="btnEditProfil" onclick="EditProfil()" class="btn btn-primary">Edit Profil</button>
							</div>
						</form>
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

			<!-- Right bar overlay-->
			<div class="rightbar-overlay"></div>

			<!-- JAVASCRIPT -->
			<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
			<!-- pace js -->
			<script src="<?= base_url(); ?>assets/libs/pace-js/pace.min.js"></script>


			<script src="<?= base_url(); ?>assets/js/app.js"></script>

			<!-- <script src="<?= base_url(); ?>assets/js/ajax.js"></script> -->


			<script src="<?= base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
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
			<!-- Responsive examples -->
			<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

			<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

			<script src="<?= base_url(); ?>assets/libs/@fullcalendar/core/main.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/@fullcalendar/bootstrap/main.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/@fullcalendar/daygrid/main.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/@fullcalendar/timegrid/main.min.js"></script>
			<script src="<?= base_url(); ?>assets/libs/@fullcalendar/interaction/main.min.js"></script>

			<!-- Calendar init -->
			<script src="<?= base_url(); ?>assets/js/pages/calendar.init.js"></script>

			<script type="text/javascript">
				function EditProfil() {
					save_method = 'update';

					$('#edit_profil').modal('show');
				}
				var tipe = "<?= $dataSession['tipe']; ?>";


				if (tipe == 'SysAdmin') {

					$('#Halaman_Sysadmin').show();
				}

				function SimpanProfil() {
					a = document.getElementById('input_password').value;
					if (a == '') {

						Swal.fire({
							title: 'Password belum terisi',
							text: "Pastikan sudah terisi!",
							icon: 'warning',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Okay'
						}).then((result) => {
							if (result.isConfirmed) {

							}
						})

					} else {

						var url;
						url = "<?php echo site_url('sysadmin/Simpan_Edit_Profil') ?>";
						// ajax adding data to database
						$.ajax({
							url: url,
							type: "POST",
							data: $('#form_edit_profil').serialize(),
							dataType: "JSON",
							success: function(data) {

								location.reload();
							},
							error: function(jqXHR, textStatus, errorThrown) {
								alert('Error adding / update data');


							}
						});
					}


				}
			</script>

</body>

</html>