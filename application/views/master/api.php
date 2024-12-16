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
									<h2 class="mb-sm-0 font-size-32">Daftar API Keys</h2>
								</div>

								<div class="col-md-8">
									<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

										<div>

											<a class="btn btn-primary" onclick="add_api()"><i class="bx bx-plus me-1"></i> API</a>

											<!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
										</div>


									</div>

								</div>
							</div>
						</div>
						<div class="card-body">
							<table id="tb_master_api" class="display table table-hover  nowrap" style="width:100%">
								<thead>
									<tr>

										<th width="2px">Edit</th>
										<th width="2px">Del</th>
										<th width="2px">No</th>

										<th>Nama Akses</th>
										<th>Token</th>
										<th>Status</th>
										<th>Dibuat</th>
										<th>Expired</th>

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
<script src="<?= base_url(); ?>assets/libs/metisapi/metisMenu.min.js"></script>
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

		$('#tb_master_api').DataTable().clear().destroy();

		var tb_master_api = $('#tb_master_api').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			// autoWidth: true,

			ajax: {
				"url": "<?php echo site_url('master/list_api'); ?>",
				"type": "POST",

			},

			order: [
				[3, 'asc']

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
				$("#tb_master_api").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
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
					"targets": 5,
					// "data": null,
					"render": function(data, type, row) {
						var html = ""

						if (data == 0) {
							html = "<span class='badge bg-primary'>Disable</span>"
						} else if (data == 1) {

							html = "<span class='badge badge-soft-primary'>Active</span>"
						}
						return html;
					},
				},

			],
		});



	});


	function add_api() {
		save_method = 'add';
		$('#form_master_api')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_master_api').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah Menu'); // Set Title to Bootstrap modal title
	}


	function reload_table() {
		$('#tabel_user').DataTable().ajax.reload();

	}


	function save_api() {

		var baru = document.getElementById('id_api').value;


		if (baru == '') {
			url = "<?php echo site_url('master/save_api') ?>";
		} else {
			url = "<?php echo site_url('master/update_api') ?>";
		}



		var formData = new FormData($('#form_master_api')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				$('#tb_master_api').DataTable().ajax.reload();
				$('#form_master_api')[0].reset();
				$('#modal_master_api').modal('hide');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}


	function edit_api(id_api) {
		$('#modal_master_api').modal('show');
		save_method = 'update';

		$.ajax({
			url: "<?php echo site_url('master/get_data_api') ?>/" + id_api,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_api"]').val(data.id_api);
				$('[name="name_api"]').val(data.name_api);
				$('[name="token"]').val(data.token);
				$('[name="tipe_status"]').val(data.tipe_status);
				$('[name="expiry_date"]').val(data.expiry_date);


			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}


	function delete_api(id_api) {

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
					url: "<?php echo site_url('master/delete_api') ?>/" + id_api,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						$('#tb_master_api').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});

				$('#tb_master_api').DataTable().ajax.reload();
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



<div class="modal fade" id="modal_master_api" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_master_api" class="needs-validation" novalidate>
					<div class="row">
						<div class="col-lg-1" hidden>

							<label for="id_api" class="form-label">Id API</label>
							<input type="text" id="id_api" name="id_api" readonly class="form-control" placeholder="" />

						</div>


						<div class="col-lg-3">
							<div>
								<label for="name_api" class="form-label">Nama API</label>
								<input type="text" id="name_api" name="name_api" class="form-control" required />
							</div>
						</div>
						<div class="col-lg-4">
							<div>
								<label for="token" class="form-label">Token</label>
								<input type="text" id="token" name="token" class="form-control" required />
							</div>
						</div>



						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="tipe_status">Tipe Status</label>
								<select class="form-select" id="tipe_status" name="tipe_status">
									<option selected value="">Pilih Status</option>
									<option value="0">Disable</option>
									<option value="1">Active</option>

								</select>

							</div>
						</div>

						<div class="col-lg-3">
							<div>
								<label for="expiry_date" class="form-label">Tanggal Expired</label>
								<input type="date" id="expiry_date" name="expiry_date" class="form-control" required />
							</div>
						</div>
						<br>

					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="save_api" onclick="save_api()" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>




</body>

</html>