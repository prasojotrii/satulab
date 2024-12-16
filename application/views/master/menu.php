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
									<h2 class="mb-sm-0 font-size-32">Daftar Menu</h2>
								</div>

								<div class="col-md-8">
									<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

										<div>

											<a class="btn btn-primary" onclick="add_menu()"><i class="bx bx-plus me-1"></i> Menu</a>

											<!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
										</div>


									</div>

								</div>
							</div>
						</div>
						<div class="card-body">
							<table id="tb_master_menu" class="display table table-hover  nowrap" style="width:100%">
								<thead>
									<tr>
										<th width="2px">Edit</th>
										<th width="2px">Del</th>
										<th width="2px">No</th>

										<th>Menu Level</th>
										<th>Menu Name</th>
										<th>Icon</th>
										<th>Title</th>
										<th>Url</th>

									</tr>
								</thead>

							</table>
						</div>
					</div>
					<!-- end cardaa -->
				</div> <!-- end col -->
			</div> <!-- end row -->
		</div> <!-- container-fluid -->
	</div>




</div>



<!-- <footer class="footer">
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
</footer> -->

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
		$('#tb_master_menu').DataTable().clear().destroy();

		var tb_master_menu = $('#tb_master_menu').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			// autoWidth: true,

			ajax: {
				"url": "<?php echo site_url('menu/list_master_menu'); ?>",
				"type": "POST",

			},

			order: [
				[2, 'asc']

			],
			dom: 'Bfrtp',
			lengthMenu: [
				[10, 25, 50, 100, -1],
				['10 rows', '25 rows', '50 rows', '100 rows', 'Semua']
			],
			buttons: [
				'pageLength'
			],

			initComplete: function(settings, json) {
				$("#tb_master_menu").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
			},
			columnDefs: [{

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
					"targets": 3,
					// "data": null,
					"render": function(data, type, row) {
						var html = ""

						if (data == 1) {
							html = "<span class='badge bg-primary'>Menu</span>"
						} else if (data == 2) {

							html = "<span class='badge badge-soft-primary'>Sub-Menu</span>"
						}
						return html;
					},
				},

			],
		});


		$('#id_menu_level').change(function() {
			var id_menu_level = $('#id_menu_level').val();

			if (id_menu_level == 2) {
				$.ajax({
					url: "<?php echo base_url('menu/get_data_by_menu_level'); ?>",
					type: "POST",
					data: {
						id_menu_level: 1
					},
					dataType: "json",
					success: function(data) {
						$("#input_menu_parent").show();
						$('#id_menu_parent').empty();
						$('#id_menu_parent').append('<option value="">-- Pilih Menu --</option>');
						$.each(data, function(key, value) {
							$('#id_menu_parent').append('<option value="' + value.id_menu + '">' + value.menu_name + '</option>');
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax');
					}
				});
			} else {
				$("#input_menu_parent").hide();
			}
		});

	});


	function add_menu() {
		save_method = 'add';
		$('#form_master_menu')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_master_menu').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah Menu'); // Set Title to Bootstrap modal title
	}


	function reload_table() {
		$('#tabel_user').DataTable().ajax.reload();

	}


	function save_add_master_menu() {

		var baru = document.getElementById('id_menu_level').value;
		var save_edit = document.getElementById('id_menu').value;

		if (baru == 1) {
			url = "<?php echo site_url('menu/save_master_menu_parent') ?>";
		} else {
			url = "<?php echo site_url('menu/save_master_menu') ?>";
		}

		if (save_edit != '') {
			url = "<?php echo site_url('menu/update_master_menu') ?>";
		}
		// ajax adding data to database
		// ajax adding data to database

		var formData = new FormData($('#form_master_menu')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				$('#tb_master_menu').DataTable().ajax.reload();
				$('#form_master_menu')[0].reset();
				$('#modal_master_menu').modal('hide');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}


	function btn_edit_master_menu(id_menu) {
		$('#modal_master_menu').modal('show');
		save_method = 'update';

		$.ajax({
			url: "<?php echo site_url('menu/get_data_menu') ?>/" + id_menu,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_menu"]').val(data.id_menu);
				$('[name="id_menu_level"]').val(data.menu_level);

				if (data.menu_level == 2) {
					$.ajax({
						url: "<?php echo base_url('menu/get_data_master_menu'); ?>",
						type: "POST",

						dataType: "json",
						success: function(data) {
							$("#input_menu_parent").show();

							$('#id_menu_parent').append('<option value="">-- Pilih Menu --</option>');
							$.each(data, function(key, value) {
								$('#id_menu_parent').append('<option value="' + value.id_menu + '">' + value.menu_name + '</option>');
							});
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error get data from ajax');
						}
					});



				} else {
					$("#input_menu_parent").hide();
				}

				document.getElementById('id_menu_parent').value = data.id_menu_parent;
				$('[name="menu_name"]').val(data.menu_name);
				$('[name="menu_icon"]').val(data.menu_icon);
				$('[name="menu_title"]').val(data.menu_title);
				$('[name="menu_url"]').val(data.menu_url);

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}


	function btn_delete_master_menu(id_menu) {

		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "Data akan dihapus permanen",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#364574',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {

				$.ajax({
					url: "<?php echo site_url('menu/delete_master_menu') ?>/" + id_menu,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						$('#tb_master_menu').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});

				$('#tb_master_menu').DataTable().ajax.reload();
				Swal.fire({
					title: 'Data Terhapus!',
					text: 'Data sudah berhasil terhapus.',
					icon: 'success',

					confirmButtonColor: '#364574',

				})

			}
		})



	}
</script>



<div class="modal fade" id="modal_master_menu" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_master_menu" class="needs-validation" novalidate>
					<div class="row">
						<div class="col-lg-1" hidden>

							<label for="id_menu" class="form-label">Id Menu</label>
							<input type="text" id="id_menu" name="id_menu" readonly class="form-control" placeholder="" />

						</div>
						<div class="col-lg-2">

							<label for="id_menu_level" class="form-label">Menu Type</label>

							<select class="form-select" name="id_menu_level" id="id_menu_level">
								<option value="">-- Pilih Menu --</option>
								<option value="1">Menu</option>
								<option value="2">Sub-Menu</option>
							</select>
						</div>

						<div class="col-lg-2" name="input_menu_parent" id="input_menu_parent" style="display: none;">

							<label for="id_menu_parent" class="form-label">Menu Parent</label>

							<select class="form-select" name="id_menu_parent" id="id_menu_parent">
								<option value="">-- Pilih Menu --</option>

							</select>
						</div>
						<div class="col-lg-3">
							<div>
								<label for="menu_name" class="form-label">Menu Name</label>
								<input type="text" id="menu_name" name="menu_name" class="form-control" required />
							</div>
						</div>
						<div class="col-lg-2">
							<div>
								<label for="menu_icon" class="form-label">Icon</label>
								<input type="text" id="menu_icon" name="menu_icon" class="form-control" required />
							</div>
						</div>
						<div class="col-lg-2">
							<div>
								<label for="menu_title" class="form-label">Title </label>
								<input type="text" id="menu_title" name="menu_title" class="form-control" required />
							</div>
						</div>
						<div class="col-lg-3">
							<div>
								<label for="menu_url" class="form-label">Url</label>
								<input type="text" id="menu_url" name="menu_url" class="form-control" required />
							</div>
						</div>
						<br>

					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="save_add_master_menu" onclick="save_add_master_menu()" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>




</body>

</html>