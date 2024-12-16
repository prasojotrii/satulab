<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content" id="miniaresult">

	<div class="page-content">
		<div class="container-fluid">

			<!-- start page title -->



			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">


					</div>
				</div>
			</div>
			<!-- end page title -->



			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">

							<div class="row align-items-center">
								<div class="col-md-4">
									<h2 class="mb-sm-0 font-size-32">Daftar User</h2>
								</div>

								<div class="col-md-8">
									<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

										<div>

											<a class="btn btn-primary" onclick="Tambah_User()"><i class="bx bx-plus me-1"></i> Tambah User</a>
											<a class="btn btn-primary" onclick="Tambah_Atasan()"><i class="bx bx-plus me-1"></i>Daftar Spv dan Ka Unit</a>
											<a class="btn btn-primary" onclick="Tambah_Halaman()"><i class="bx bx-plus me-1"></i> Tambah Halaman</a>
											<a class="btn btn-primary" onclick="Tambah_Role()"><i class="bx bx-plus me-1"></i> Tambah Akses Role </a>
											<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
										</div>


									</div>

								</div>
							</div>
						</div>
						<div class="card-body">
							<table id="tabel_user" class="table table-bordered dt-responsive compact nowrap w-100 ">
								<thead>
									<tr>
										<th width="10px">Menu</th>
										<th width="10px">No</th>
										<th width="10px">Perner</th>


										<th>Nama</th>
										<th>Sub Lab</th>

										<th>Penyelia</th>
										<th>Kepala Unit</th>
										<th width="10px">Tipe Akun</th>



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

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

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


<script type="text/javascript">
	$(document).ready(function() {
		//Buttons examples
		var tipe = "<?= $dataSession['tipe']; ?>";


		if (tipe == 'SysAdmin') {

			$('#Halaman_Sysadmin').show();
		}
		var table = $('#tabel_user').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[2, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_user') ?>",
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
				// 	'targets': [1]
				// },
				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				}

			],

		});
		var table2 = $('#tabel_user_akses').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[2, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_user_akses') ?>",
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
				// 	'targets': [1]
				// },
				// {
				// 	"targets": [0, 1], //last column
				// 	"orderable": false, //set not orderable
				// }

			],

		});

		var table3 = $('#tabel_halaman').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[2, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_halaman') ?>",
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
				// 	'targets': [1]
				// },
				// {
				// 	"targets": [0, 1], //last column
				// 	"orderable": false, //set not orderable
				// }

			],

		});

		var table4 = $('#tabel_role').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[2, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_user_role') ?>",
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
				// 	'targets': [1]
				// },
				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				}

			],

		});

		var table5 = $('#tabel_atasan').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[2, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_user_atasan') ?>",
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
				// 	'targets': [1]
				// },
				// {
				// 	"targets": [0, 1], //last column
				// 	"orderable": false, //set not orderable
				// }

			],

		});



	});


	function Tambah_User() {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah User'); // Set Title to Bootstrap modal title
	}


	function Tambah_Atasan() {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_atasan').modal('show'); // show bootstrap modal
		$('.modal-title').text('Daftar Spv dan Ka Unit'); // Set Title to Bootstrap modal title
	}

	function Tambah_Halaman() {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_halaman').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah Halaman'); // Set Title to Bootstrap modal title
		$('#btnHalamanEdit').hide();
		$('#btnHalamanTambah').show();

	}

	function Tambah_Role() {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_role').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah Akses Role User'); // Set Title to Bootstrap modal title

		$("#rolenamahalaman").autocomplete({
			source: "<?php echo site_url('Sysadmin/Autocomplete_nama_halaman') ?>"
		});

	}



	function save() {
		var inputperner = document.getElementById('username').value;
		if (inputperner == '') {
			Swal.fire({
				title: 'Data nomor perner belum terisi',
				text: "Pastikan semua sudah terisi",
				icon: 'warning',

			})
		} else {
			$('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled', true); //set button disable 
			var url;

			if (save_method == 'add') {

				url = "<?php echo site_url('sysadmin/Tambah_user') ?>";
				document.getElementById("id_user").value = "<?= $id_user; ?>";
			} else {
				url = "<?php echo site_url('sysadmin/User_update') ?>";
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
						reload_table_dan_page();
					} else {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
					}

					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 


				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error adding / update data');
					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled', false); //set button enable 

				}
			});
		}

	}

	function TambahHalaman() {
		var url;
		url = "<?php echo site_url('sysadmin/Tambah_Halaman') ?>";
		// ajax adding data to database

		var formData = new FormData($('#form_halaman')[0]);
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
					$('#tabel_halaman').DataTable().ajax.reload();

					$("#form_halaman")[0].reset();

					$('#btnHalamanEdit').hide();
					$('#btnHalamanTambah').show();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
				}

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}


	function TambahAkses() {
		var url;
		url = "<?php echo site_url('sysadmin/Tambah_Akses') ?>";
		// ajax adding data to database

		var formData = new FormData($('#form_akses')[0]);
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
					$('#tabel_user_akses').DataTable().ajax.reload();

					// $("#form_akses")[0].reset();

					// $('#btnHalamanEdit').hide();
					// $('#btnHalamanTambah').show();
				}

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}



	function TambahAksesRole() {
		var url;
		url = "<?php echo site_url('sysadmin/Tambah_Akses_Role') ?>";
		// ajax adding data to database

		var formData = new FormData($('#form_role')[0]);
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
					$('#tabel_role').DataTable().ajax.reload();

					$("#form_role")[0].reset();

				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
				}

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}

	function TambahAtasan() {
		var url;
		url = "<?php echo site_url('sysadmin/Tambah_Atasan') ?>";
		// ajax adding data to database

		var formData = new FormData($('#form_atasan')[0]);
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
					$('#tabel_atasan').DataTable().ajax.reload();

					$("#form_atasan")[0].reset();

				}

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}

	function UpdateHalaman() {


		var url;
		url = "<?php echo site_url('sysadmin/Save_update_halaman') ?>";
		// ajax adding data to database

		var formData = new FormData($('#form_halaman')[0]);
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
					$('#tabel_halaman').DataTable().ajax.reload();

					$("#form_halaman")[0].reset();
					$('#btnHalamanEdit').hide();
					$('#btnHalamanTambah').show();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
				}

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}


	function reload_table_dan_page() {
		$('#tabel_user').DataTable().ajax.reload();
		location.reload();
	}

	function reload_table() {
		$('#tabel_user').DataTable().ajax.reload();

	}

	function Btn_Edit(id_user) {
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string

		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('Sysadmin/User_edit') ?>/" + id_user,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_user"]').val(data.id_user);
				$('[name="username"]').val(data.username);
				$('[name="nama"]').val(data.nama);
				// $('[name="password"]').val(data.password);
				$('[name="tipe"]').val(data.tipe);
				$('[name="sub_laboratorium"]').val(data.sub_laboratorium);
				$('[name="penyelia"]').val(data.penyelia);

				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Kategori Instrumen'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function Btn_Edit_Halaman(id_halaman) {
		save_method = 'update';
		$("#form_halaman")[0].reset();


		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('Sysadmin/Halaman_edit') ?>/" + id_halaman,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_halaman"]').val(data.id_halaman);

				$('[name="title"]').val(data.title);
				$('[name="nama_halaman"]').val(data.nama_halaman);
				$('[name="url"]').val(data.url);
				$('[name="tipe_menu"]').val(data.tipe);


				$('#btnHalamanEdit').show();
				$('#btnHalamanTambah').hide();

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}


	function Btn_Hapus(id_user) {


		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/User_hapus') ?>/" + id_user,
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

	function Btn_hapus_halaman(id_halaman) {


		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/Halaman_hapus') ?>/" + id_halaman,
					type: "POST",
					dataType: "JSON",
					success: function(data) {



						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_halaman').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}

	function Btn_hapus_role(id_role) {


		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/Hapus_role') ?>/" + id_role,
					type: "POST",
					dataType: "JSON",
					success: function(data) {



						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_role').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}

	function Btn_hapus_atasan(id_atasan) {


		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/Hapus_atasan') ?>/" + id_atasan,
					type: "POST",
					dataType: "JSON",
					success: function(data) {



						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_atasan').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}

	function Btn_hapus_akses(id_akses) {


		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/Hapus_akses') ?>/" + id_akses,
					type: "POST",
					dataType: "JSON",
					success: function(data) {



						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_user_akses').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}

	function Btn_akses(id_user) {
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string

		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('Sysadmin/User_edit') ?>/" + id_user,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_user_akses"]').val(data.id_user);

				$('[name="username"]').val(data.username);
				$('[name="nama"]').val(data.nama);
				$('[name="password"]').val(data.password);
				$('[name="tipe"]').val(data.tipe);

				$('#modal_form_akses').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Akses User');
				$('#tabel_user_akses').DataTable().search(
					$('#id_user_akses').val()
				).draw(); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function klikview(id_halaman, view) {
		$.ajax({
			url: "<?php echo site_url('sysadmin/Akses_View') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_halaman: id_halaman,
				view: view,
				id_user: $('#id_user_akses').val()
			},
			success: function(data) {
				//if success reload ajax table
				// $('#modal_form_akses').modal('hide');
				$('#tabel_user_akses').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});

	}

	function klikcreate(id_halaman, create) {
		$.ajax({
			url: "<?php echo site_url('sysadmin/Akses_create') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_halaman: id_halaman,
				create: create,
				id_user: $('#id_user_akses').val()
			},
			success: function(data) {
				//if success reload ajax table
				// $('#modal_form_akses').modal('hide');
				$('#tabel_user_akses').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});

	}

	function klikupdate(id_halaman, update) {
		$.ajax({
			url: "<?php echo site_url('sysadmin/Akses_update') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_halaman: id_halaman,
				update: update,
				id_user: $('#id_user_akses').val()
			},
			success: function(data) {
				//if success reload ajax table
				// $('#modal_form_akses').modal('hide');
				$('#tabel_user_akses').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});

	}

	function klikdelete(id_halaman, del) {
		$.ajax({
			url: "<?php echo site_url('sysadmin/Akses_delete') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_halaman: id_halaman,
				delete: del,
				id_user: $('#id_user_akses').val()

			},
			success: function(data) {
				//if success reload ajax table
				// $('#modal_form_akses').modal('hide');
				$('#tabel_user_akses').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});

	}

	function KlikViewRole(id_role, view) {
		$.ajax({
			url: "<?php echo site_url('sysadmin/Akses_View_Role') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_role: id_role,
				view: view

			},
			success: function(data) {
				//if success reload ajax table
				// $('#modal_form_akses').modal('hide');
				$('#tabel_role').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});

	}

	function KlikCreateRole(id_role, create) {
		$.ajax({
			url: "<?php echo site_url('sysadmin/Akses_create_Role') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_role: id_role,
				create: create
			},
			success: function(data) {
				//if success reload ajax table
				// $('#modal_form_akses').modal('hide');
				$('#tabel_role').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});

	}

	function KlikUpdateRole(id_role, update) {
		$.ajax({
			url: "<?php echo site_url('sysadmin/Akses_update_Role') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_role: id_role,
				update: update
			},
			success: function(data) {
				//if success reload ajax table
				// $('#modal_form_akses').modal('hide');
				$('#tabel_role').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});

	}

	function KlikDeleteRole(id_role, del) {
		$.ajax({
			url: "<?php echo site_url('sysadmin/Akses_delete_Role') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_role: id_role,
				delete: del
			},
			success: function(data) {
				//if success reload ajax table
				// $('#modal_form_akses').modal('hide');
				$('#tabel_role').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});

	}

	function autofill(nama_halaman) {
		var rolenamahalaman = document.getElementById('rolenamahalaman').value;
		$.ajax({
			url: "<?php echo base_url('sysadmin/DataHalaman') ?>/",

			data: {

				rolenamahalaman: rolenamahalaman,
			},
			success: function(data) {
				var hasil = JSON.parse(data);

				$.each(hasil, function(key, val) {
					// document.getElementById('id_halaman').value = val.id_halaman;
					// document.getElementById('rolenamahalaman').value = val.nama_halaman;
					document.getElementById('roletitle').value = val.title;
					document.getElementById('roleurl').value = val.url;
					document.getElementById('role_id_halaman').value = val.id_halaman;
					document.getElementById('role_tipe_menu').value = val.tipe;
				});
			}
		});

	}

	function autofillAkses(nama_halaman) {
		var rolenamahalaman = document.getElementById('akses_namahalaman').value;
		$.ajax({
			url: "<?php echo base_url('sysadmin/DataHalaman') ?>/",

			data: {

				rolenamahalaman: rolenamahalaman,
			},
			success: function(data) {
				var hasil = JSON.parse(data);

				$.each(hasil, function(key, val) {
					// document.getElementById('id_halaman').value = val.id_halaman;
					// document.getElementById('rolenamahalaman').value = val.nama_halaman;
					document.getElementById('akses_title').value = val.title;
					document.getElementById('akses_url').value = val.url;
					document.getElementById('akses_id_halaman').value = val.id_halaman;
					document.getElementById('akses_tipe_menu').value = val.tipe;
				});
			}
		});

	}

	function autofillEmail(penyelia) {
		var penyelia = document.getElementById('penyelia').value;
		$.ajax({
			url: "<?php echo base_url('sysadmin/DataEmail') ?>/",

			data: {

				penyelia: penyelia,
			},
			success: function(data) {
				var hasil = JSON.parse(data);

				$.each(hasil, function(key, val) {
					// document.getElementById('id_halaman').value = val.id_halaman;
					// document.getElementById('rolenamahalaman').value = val.nama_halaman;
					document.getElementById('email_penyelia').value = val.email;

				});
			}
		});

	}

	function autoKodeOrder() {
		var sub_laboratorium = document.getElementById('sub_laboratorium').value;

		if (sub_laboratorium == 'Lab PCR') {
			document.getElementById('id_order_unit').value = 'PCR';
		} else if (sub_laboratorium == 'Lab Mikrobiologi') {
			document.getElementById('id_order_unit').value = 'MKR';
		} else if (sub_laboratorium == 'Lab Instrument') {
			document.getElementById('id_order_unit').value = 'INS';
		} else if (sub_laboratorium == 'Lab Kimia 1 MTS') {
			document.getElementById('id_order_unit').value = 'MTS';
		} else if (sub_laboratorium == 'Lab Kimia 1 OMG') {
			document.getElementById('id_order_unit').value = 'OMG';
		} else if (sub_laboratorium == 'Lab Kimia 2 BBG') {
			document.getElementById('id_order_unit').value = 'BBG';
		} else if (sub_laboratorium == 'Lab Kimia 3 Lingkungan') {
			document.getElementById('id_order_unit').value = 'LGK';
		} else if (sub_laboratorium == 'Administrasi') {
			document.getElementById('id_order_unit').value = 'ADM';
		}

	}
</script>



<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form" class="needs-validation" novalidate>
					<div class="row">

						<div class="col-md-4" style="display: none;">
							<div class="mb-1">
								<label class="form-label" for="id_user">Kode User</label>
								<input type="text" class="form-control" id="id_user" name="id_user" placeholder="Id Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-1">
								<label class="form-label" for="username">Perner</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Perner">
								<div class="invalid-feedback">
									Please provide a Perner.
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
								<div class="invalid-feedback">
									Please provide a Nama Nama.
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
								<div class="invalid-feedback">
									Please provide a Password .
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="tipe">Tipe User</label>
								<select class="form-select" id="tipe" name="tipe">
									<!-- <option selected value="">Pilih User</option>
									<option value="SysAdmin">SysAdmin</option>
									<option value="Admin">Admin</option>
									<option value="User">User</option> -->
									<?php
									foreach ($dataRole as $row) {
										echo '<option value="' . $row->nama_role . '">' . $row->nama_role . '</option>';
									}
									?>

								</select>
								<div class="valid-feedback">
									Please provide a Periode Kalibrasi.
								</div>
							</div>
						</div>



						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="penyelia">Supervisor</label>
								<select class="form-select" id="penyelia" name="penyelia" onchange="autofillEmail();">>
									<option selected value="">Pilih Supervisor</option>
									<!-- <option value="Candra Ratnaningsih">Candra Ratnaningsih</option>
									<option value="Dewie Koes Harayu">Dewie Koes Harayu</option>
									<option value="Lab Instrument">Lab Instrument</option>
									<option value="Dwi Rahayu Handayani">Dwi Rahayu Handayani</option>
									<option value="Indah Krismiyati">Indah Krismiyati</option>
									<select class="form-select" id="penyelia" name="penyelia"> -->


									<?php
									foreach ($dataSupervisor as $row) {
										echo '<option value="' . $row->nama . '">' . $row->nama . '</option>';
									}
									?>
								</select>
							</div>

						</div>



						<div class="col-md-3">
							<div class="mb-1">
								<label class="form-label" for="kepalaunit">Kepala Unit</label>
								<input type="text" class="form-control" id="kepalaunit" name="kepalaunit" placeholder="kepalaunit" value="Erni Rusmalawati">
								<div class="invalid-feedback">
									Please provide a Kepala Unit.
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="sub_laboratorium">Sub Lab</label>
								<select class="form-select" id="sub_laboratorium" name="sub_laboratorium" onchange="autoKodeOrder();">
									<option selected value="">Pilih Lokasi Lab</option>
									<option value="Lab PCR">Lab PCR</option>
									<option value="Lab Mikrobiologi">Lab Mikrobiologi</option>
									<option value="Lab Instrument">Lab Instrument</option>
									<option value="Lab Kimia 1 MTS">Lab Kimia 1 MTS</option>
									<option value="Lab Kimia 1 OMG">Lab Kimia 1 OMG</option>
									<option value="Lab Kimia 2 BBG">Lab Kimia 2 BBG</option>
									<option value="Lab Kimia 3 Lingkungan">Lab Kimia 3 Lingkungan</option>
									<option value="Administrasi">Administrasi</option>
								</select>
								<div class="invalid-feedback">
									Please provide a Nama Nama.
								</div>
							</div>
						</div>

						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="id_order_unit">Kode</label>
								<input type="text" class="form-control" id="id_order_unit" name="id_order_unit">

							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label" for="email_penyelia">Email Spv</label>
								<input type="text" class="form-control" id="email_penyelia" name="email_penyelia" placeholder="email" readonly>
								<div class="invalid-feedback">
									Please provide a email .
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label" for="email_kepalaunit">Email Kepala Unit</label>
								<input type="text" class="form-control" id="email_kepalaunit" name="email_kepalaunit" placeholder="Email Kepala Unit" readonly value="erni.rusmalawati@sidomuncul.co.id">
								<div class="invalid-feedback">
									Please provide a email .
								</div>
							</div>
						</div>


					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_form_akses" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_akses" class="needs-validation" novalidate>
					<div class="row">

						<div class="col-md-1">
							<div class="mb-1">
								<label class="form-label" for="id_user_akses">Kode User</label>
								<input type="text" class="form-control" id="id_user_akses" name="id_user_akses" placeholder="Id Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>
						<!-- 
						<div class="col-md-1">
							<div class="mb-1">
								<label class="form-label" for="id_user_role">Kode Role</label>
								<input type="text" class="form-control" id="id_user_akses" name="id_user_akses" placeholder="Id Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div> -->

						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="akses_namahalaman">Nama Halaman</label>
								<select class="form-select" id="akses_namahalaman" name="akses_namahalaman" onchange="autofillAkses();">
									<option disabled selected value="">Pilih Halaman</option>
									<?php
									foreach ($dataHalaman as $row) {
										echo '<option value="' . $row->nama_halaman . '">' . $row->nama_halaman . '</option>';
									}
									?>

								</select>
								<div class="invalid-feedback">
									Please provide a Nama Halaman.
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="akses_title">Title</label>
								<input type="text" class="form-control" id="akses_title" name="akses_title" placeholder="Title" readonly>
								<div class="invalid-feedback">
									Please provide a Title .
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="akses_url">Url</label>
								<input type="text" class="form-control" id="akses_url" name="akses_url" placeholder="Url" readonly>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<div class="mb-3">
								<label class="form-label" for="akses_tipe_menu">Tipe</label>
								<input type="text" class="form-control" id="akses_tipe_menu" name="akses_tipe_menu" placeholder="akses_tipe_menu" readonly>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<div class="mb-3">
								<label class="form-label" for="akses_id_halaman">Id Hal</label>
								<input type="text" class="form-control" id="akses_id_halaman" name="akses_id_halaman" placeholder="akses_id_halaman" readonly>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mt-4">
								<button type="button" id="btnHTambahAkses" onclick="TambahAkses()" class="btn btn-primary ">Tambah Akses</button>
							</div>
						</div>

					</div>
				</form>
				<div class="card-body">
					<table id="tabel_user_akses" class="table table-bordered dt-responsive compact nowrap w-100 ">
						<thead>
							<tr>
								<th width="10px">Menu </th>
								<th>No</th>
								<th>Id User</th>
								<th>Nama Halaman</th>
								<th>Title </th>

								<th>Url</th>
								<th width="10px">View</th>
								<th width="10px">Create</th>
								<th width="10px">Update</th>
								<th width="10px">Delete</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_form_halaman" role=" dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_halaman" class="needs-validation" novalidate>
					<div class="row">
						<div class="col-md-1">
							<div class="mb-1">
								<label class="form-label" for="id_halaman">Id</label>
								<input type="text" class="form-control" id="id_halaman" name="id_halaman" placeholder="Id" readonly>
								<div class="invalid-feedback">
									Please provide a id_halaman.
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="nama_halaman">Nama Halaman</label>
								<input type="text" class="form-control" id="nama_halaman" name="nama_halaman" placeholder="Nama Halaman" required>
								<div class="invalid-feedback">
									Please provide a Nama Halaman.
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="title">Title</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
								<div class="invalid-feedback">
									Please provide a Title .
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="url">Url</label>
								<input type="text" class="form-control" id="url" name="url" placeholder="url" required>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>

						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="tipe_menu">Tipe</label>
								<select class="form-select" id="tipe_menu" name="tipe_menu">
									<option selected value="">Pilih Tipe</option>
									<option value="0">Menu Utama</option>
									<option value="1">Sub Menu 1</option>
									<option value="2">Sub Menu 2</option>
								</select>
							</div>
						</div>

						<div class="col-md-2">
							<div class="mt-4">
								<button type="button" id="btnHalamanTambah" onclick="TambahHalaman()" class="btn btn-primary ">Tambah Halaman</button>

								<button type="button" id="btnHalamanEdit" onclick="UpdateHalaman()" class="btn btn-primary ">Update Halaman</button>
							</div>
						</div>


					</div>
				</form>
				<hr>
				<div class="card-body">
					<table id="tabel_halaman" class="table table-bordered dt-responsive compact nowrap w-100">
						<thead>
							<tr>
								<th width="2px">Menu</th>
								<th width="2px">No</th>
								<th>Nama Halaman</th>
								<th>Title Halaman </th>
								<th>Url</th>
								<th>Tipe Halaman</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_form_role" role=" dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_role" class="needs-validation" novalidate>
					<div class="row">

						<div class="col-md-2">
							<div class="mb-1">
								<label class="form-label" for="namarole">Nama Role</label>
								<input type="text" class="form-control" id="namarole" name="namarole" placeholder="Nama Role">
								<div class="invalid-feedback">
									Please provide a Nama Role.
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="rolenamahalaman">Nama Halaman</label>
								<select class="form-select" id="rolenamahalaman" name="rolenamahalaman" onchange="autofill();">
									<option disabled selected value="">Pilih Halaman</option>
									<?php
									foreach ($dataHalaman as $row) {
										echo '<option value="' . $row->nama_halaman . '">' . $row->nama_halaman . '</option>';
									}
									?>

								</select>
								<div class="invalid-feedback">
									Please provide a Nama Halaman.
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="roletitle">Title</label>
								<input type="text" class="form-control" id="roletitle" name="roletitle" placeholder="Title" readonly>
								<div class="invalid-feedback">
									Please provide a Title .
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="roleurl">Url</label>
								<input type="text" class="form-control" id="roleurl" name="roleurl" placeholder="Url" readonly>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="role_tipe_menu">Tipe</label>

								<input type="text" class="form-control" id="role_tipe_menu" name="role_tipe_menu" placeholder="Url" readonly>
								<!-- <select class="form-select" id="role_tipe_menu" name="role_tipe_menu" readonly>
									<option selected value="">Pilih Tipe</option>
									<option value="0">Menu Utama</option>
									<option value="1">Sub Menu 1</option>
									<option value="2">Sub Menu 2</option>
								</select> -->


							</div>
						</div>
						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="role_id_halaman">role_id_halaman</label>
								<input type="text" class="form-control" id="role_id_halaman" name="role_id_halaman" placeholder="role_id_halaman" readonly>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>


						<div class="card-footer">
							<div class="float-end">
								<button type="button" id="btnSaveAksesRole" onclick="TambahAksesRole()" class="btn btn-primary ">Tambah Role</button>

							</div>
						</div>
					</div>
				</form>
				<hr>
				<div class="card-body">
					<table id="tabel_role" class="table table-bordered dt-responsive compact nowrap w-100 ">
						<thead>
							<tr>
								<th width="10px">#</th>
								<th>No</th>
								<th>Role</th>
								<th>Halaman</th>
								<th>Title </th>

								<th>Url</th>
								<th width="10px">View</th>
								<th width="10px">Create</th>
								<th width="10px">Update</th>
								<th width="10px">Delete</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_form_atasan" role=" dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_atasan" class="needs-validation" novalidate>
					<div class="row">
						<div class="col-md-1" style="display: none;">
							<div class="mb-1">
								<label class="form-label" for="id_atasan">Id</label>
								<input type="text" class="form-control" id="id_atasan" name="id_atasan" placeholder="Id" readonly>
								<div class="invalid-feedback">
									Please provide a id_atasan.
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="nama_atasan">Nama </label>
								<input type="text" class="form-control" id="nama_atasan" name="nama_atasan" placeholder="Nama" required>
								<div class="invalid-feedback">
									Please provide a Nama.
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="email">Email</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="email" required>
								<div class="invalid-feedback">
									Please provide a email .
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="jabatan">Jabatan</label>
								<select class="form-select" id="jabatan" name="jabatan">
									<!-- <option selected value="">Pilih User</option>
									<option value="SysAdmin">SysAdmin</option>
									<option value="Admin">Admin</option>
									<option value="User">User</option> -->
									<?php
									foreach ($dataRole as $row) {
										echo '<option value="' . $row->nama_role . '">' . $row->nama_role . '</option>';
									}
									?>

								</select>
							</div>
						</div>

						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="lab">Nama Laboratorium</label>
								<input type="text" class="form-control" id="lab" name="lab" placeholder="Nama Laboratorium" required>
								<div class="invalid-feedback">
									Please provide a Nama Laboratorium .
								</div>
							</div>
						</div>

						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="sublab">Sub Laboratorium</label>
								<input type="text" class="form-control" id="sublab" name="sublab" placeholder="Sub Laboratorium" required>
								<div class="invalid-feedback">
									Please provide a Sub Laboratorium .
								</div>
							</div>
						</div>

						<div class="col-md-1">
							<div class="mt-4">
								<button type="button" id="btnTambahAtasan" onclick="TambahAtasan()" class="btn btn-primary ">Simpan</button>

								<!-- <button type="button" id="btnUpdateAtasan" onclick="UpdateAtasan()" class="btn btn-primary ">Update</button> -->
							</div>
						</div>


					</div>
				</form>
				<hr>
				<div class="card-body">
					<table id="tabel_atasan" class="table table-bordered dt-responsive compact nowrap w-100">
						<thead>
							<tr>
								<th width="2px">Menu</th>
								<th width="2px">No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Jabatan</th>
								<th>Nama Laboratorium</th>
								<th>Sub Laboratorium</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

</body>

</html>