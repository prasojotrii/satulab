<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content" id="miniaresult">

	<div class="page-content">
		<div class="row" id="info_hak_akses" style="display: none;">
			<div class="col-md-1">
				<label class="form-label" for="id_user">Id User</label>
				<input type="text" class="form-control" id="id_user" name="id_user" value="<?= $dataSession['id_user']; ?>">
			</div>
			<div class="col-md-2">
				<label class="form-label" for="info_halaman">Info Halaman</label>
				<input type="text" class="form-control" id="info_halaman" name="info_halaman" value="<?= $id_halaman ?>">
			</div>

			<div class="col-md-2">
				<label class="form-label" for="akses_tipe">Tipe Akses</label>
				<input type="text" class="form-control" id="akses_tipe" name="akses_tipe" value="<?= $dataSession['tipe']; ?>">
			</div>
			<div class="col-md-1">
				<label class="form-label" for="akses_read">Read</label>
				<input type="text" class="form-control" id="akses_read" name="akses_read" value="<?= $dataAkses['view']; ?>">
			</div>
			<div class="col-md-1">
				<label class="form-label" for="akses_create">Create</label>
				<input type="text" class="form-control" id="akses_create" name="akses_create" value="<?= $dataAkses['create']; ?>">
			</div>
			<div class="col-md-1">
				<label class="form-label" for="akses_update">Update</label>
				<input type="text" class="form-control" id="akses_update" name="akses_update" value="<?= $dataAkses['update']; ?>">
			</div>
			<div class="col-md-1">
				<label class="form-label" for="akses_delete">Delete</label>
				<input type="text" class="form-control" id="akses_delete" name="akses_delete" value="<?= $dataAkses['delete']; ?>">
			</div>
		</div>

		<div class="container" align="center">

			<div class="col-lg-2 col-md-2 col-xs-12 col col-img">
				<img src="https://www.sidomuncul.co.id/assets/images/icon-sido-mortar.png">
			</div>
			<br>
			<h1 class="line"> Visi &amp; Misi </h1>
			<br>
			<div class="box">
				<h3 class="sub-judul visi"> Visi </h3>
				<div class="row row1">

					<h4 class="text-">
						Menjadi perusahaan farmasi, obat tradisional, makanan minuman kesehatan, kosmetik dan pengolahan bahan herbal yang dapat memberikan manfaat bagi masyarakat dan lingkungan.
					</h4>

				</div>

				<br>
				<h3 class="sub-judul misi"> Misi </h3>
				<div class="row row2">

					<li>
						Mengembangkan produk-produk berbahan
						baku herbal dalam bentuk sediaan farmasi,
						obat tradisional, makanan minuman
						kesehatan, dan kosmetik berdasarkan
						penelitian yang rasional, aman, dan jujur.
					</li>
					<li>
						Mengembangkan penelitian obat-obat herbal secara berkesinambungan.
					</li>
					<li>
						Membantu dan mendorong pemerintah,
						institusi pendidikan, dunia kedokteran
						agar lebih berperan dalam penelitian dan
						pengembangan obat dan pengobatan herbal.
					</li>
					<li>
						Meningkatkan kesadaran masyarakat tentangpentingnya membina kesehatan melalui pola hidup sehat, pemakaian bahan- bahan alami, dan pengobatan secara <i>naturopathy</i>.
					</li>
					<li>
						Melakukan <i>Corporate Social Responsibility</i> (CSR) yang intensif.
					</li>
					<li>
						Mengelola perusahaan yang berorientasi ramah lingkungan.
					</li>
					<li>
						Menjadi perusahaan obat herbal yang mendunia.
					</li>


				</div>

			</div>
		</div>
	</div>


</div>



<footer class="footer">
	<div class="container-fluid">
		<!-- <div class="row">
			<div class="col-sm-6">
				<script>
					document.write(new Date().getFullYear())
				</script>
				©
				Lab SM
			</div>

		</div> -->
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

<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->

<script src="<?= base_url(); ?>assets/libs/@fullcalendar/core/main.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/@fullcalendar/bootstrap/main.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/@fullcalendar/daygrid/main.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/@fullcalendar/timegrid/main.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/@fullcalendar/interaction/main.min.js"></script>

<!-- Calendar init -->
<script src="<?= base_url(); ?>assets/js/pages/calendar.init.js"></script>


<script type="text/javascript">
	// $(window).on('load', function() {
	// 	// (document.body.getAttribute('data-sidebar-size') == "sm") ? document.body.setAttribute('data-sidebar-size', 'sm'): document.body.setAttribute('data-sidebar-size', 'sm')

	// 	$($.fn.dataTable.tables(true)).DataTable()
	// 		.columns.adjust();

	// 	// CekAksesUser();
	// });

	function CekAksesUser() {

		if (document.getElementById('akses_read').value != 1) {

			window.location.replace('<?= base_url('auth/logout'); ?>');
		}

		if (document.getElementById('akses_create').value != 1) {

			$('#button_create').hide();


		}
		if (document.getElementById('akses_update').value != 1) {

			$('#form_order').hide();
			$('#btnSaveOrder').hide();
			$('#tabel_order_baru').DataTable().column(0).visible(true);
			// $('#button_update').hide();
		}
		if (document.getElementById('akses_delete').value != 1) {
			$('#tabel_order').DataTable().column(0).visible(true);
			$('#tabel_order_persetujuan_spv').DataTable().column(0).visible(true);
			$('#tabel_order_admin').DataTable().column(0).visible(true);
			$('#tabel_order_persetujuan').DataTable().column(0).visible(true);

		}

		if (document.getElementById('akses_tipe').value != 'SysAdmin') {

			$('#Halaman_Sysadmin').hide();


		}



	}
</script>
</body>

</html>