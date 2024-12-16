<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content" id="miniaresult">

	<div class="page-content">


		<div class="container" align="center">
			<div class="card text-center">
				<div class="card-header">

					<h4> Informasi Profil</h4>
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
									<input type="text" class="form-control" id="username" name="username" placeholder="Username / Perner" value="<?= $dataSession['pernr']; ?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12" id="">
								<div class="mb-3">
									<label class="form-label" for="nama">Nama </label>
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $dataSession['name']; ?>" readonly>
								</div>
							</div>




						</div>
						<div class="card-footer text-muted">
							<button type="button" id="btnEditProfil" onclick="EditProfil()" class="btn btn-primary">Edit Profil</button>
						</div>
					</form>
				</div>

			</div>

		</div>

		<div class="modal fade" id="edit_profil" role="dialog">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<!-- <h5 class="form-label">Riwayat Instrumen-</h5> -->
						<h5 class="modal-title" id="myLargeModalLabel">Edit Profil </h5>

						<button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body form">
						<form action="#" id="form_edit_profil" class="needs-validation" novalidate>
							<div class="card-body">
								<form action="#" class="needs-validation" novalidate>
									<div class="row">
										<div class=" col-md-6" id="">
											<div class="mb-3">
												<label class="form-label" for="input_id_user">Id User</label>
												<input type="text" class="form-control" id="input_id_user" name="input_id_user" placeholder="Id User" value="<?= $dataSession['id_user']; ?>" readonly>
											</div>
										</div>


										<div class=" col-md-6" id="">
											<div class="mb-3">
												<label class="form-label" for="input_iusername">Username / Perner</label>
												<input type="text" class="form-control" id="input_iusername" name="input_iusername" placeholder="Username / Perner" value="<?= $dataSession['pernr']; ?>" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6" id="">
											<div class="mb-3">
												<label class="form-label" for="input_nama">Nama </label>
												<input type="text" class="form-control" id="input_nama" name="input_nama" placeholder="Nama" value="<?= $dataSession['name']; ?>">
											</div>
										</div>

										<div class="col-md-6" id="">
											<div class="mb-3">
												<label class="form-label" for="input_password">Password</label>
												<input type="password" class="form-control" id="input_password" name="input_password" placeholder="Password" value="">
											</div>
										</div>



									</div>

								</form>
							</div>

						</form>
					</div>
					<div class="modal-footer">

						<button type="button" id="btnSimpanProfil" onclick="SimpanProfil()" class="btn btn-primary">Simpan Profil</button>


					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
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
		// alert(tipe);

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
				url = "<?php echo site_url('master/simpan_edit_Profil') ?>";
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