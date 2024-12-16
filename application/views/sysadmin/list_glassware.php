<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->


<div class="main-content" id="miniaresult">

	<div class="page-content">
		<div class="container-fluid">
			<div class="row" id="info_hak_akses" style="display: none;">
				<div class="col-md-2">
					<label class="form-label" for="id_user">Id User</label>
					<input type="text" class="form-control" id="id_user" name="id_user" value="<?= $dataSession['id_user']; ?>">
				</div>
				<div class="col-md-2">
					<label class="form-label" for="id_user">Id User</label>
					<input type="text" class="form-control" id="id_user" name="id_user" value="<?= $id_halaman ?>">
				</div>
				<div class="col-md-3">
					<label class="form-label" for="info_penyelia">Nama Penyelia</label>
					<input type="text" class="form-control" id="info_penyelia" name="info_penyelia" placeholder="Nama Pemesan" value="<?= $dataSession['penyelia']; ?>">
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

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">

							<div class="row ">
								<div class="col-md-5 " style="margin: 0px;">
									<input class="form-control" align="right" type="text" style="background-color: white;  box-shadow: none; font-size: 30px;   font-weight: bold;     padding: 0px;  margin: 0px;  float: left; border-style: none;" Value="Daftar Glassware Laboratorium " readonly>

								</div>

								<div class="col-md-1 " style="display: none;">
									<input class=" form-control" id="JudulTabel" name="JudulTabel" align="left" type="text" style="background-color: white;  box-shadow: none;  font-size: 30px; font-weight: bold; margin: 0px; padding: 0px; float: left; border-style: none;" value="<?= $id_kategori; ?>" readonly>
								</div>

								<div class="col-md-7 " style="text-align: right;" name="aksescreate">
									<!-- <button class="btn btn-primary" onclick="Fungsi_Tambah()"><i class="bx bx-plus me-1"></i> Tambah Baru</button> -->
									<button class="btn btn-primary" id="btn_list_baru" nama="btn_list_baru" onclick="List_Instrumen_Baru()">Daftar Instrumen Baru</button>
									<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>

								</div>
							</div>
						</div>
						<div class="card-body">
							<table id="tabel_instrumen" name="tabel_instrumen" class="table table-hover nowrap w-100">
								<thead>
									<tr style="text-align: center">
										<th name="menu_tabel_instrumen" id="menu_tabel_instrumen" width="10px">Menu</th>
										<th width="10px">#</th>
										<th width="2px">No</th>
										<th width="10px">No Glassware</th>
										<th width="10px">Kategori</th>
										<th width="10px">Tipe Glassware</th>
										<th width="10px">Rumus</th>
										<th>Merek</th>
										<th width="5px">Kap (mL)</th>
										<!-- <th width="5px">Satuan</th> -->
										<th>Type</th>
										<th>Grade</th>

										<th>Lokasi</th>
										<!-- <th width="10px">Aktif</th> -->
										<th width="10px">Kondisi</th>
										<th width="10px">Status Kalibrasi</th>
										<th width="10px">Terahkir</th>
										<th width="10px">Selanjutnya</th>
										<th>User Input </th>
										<th width="5px">Tanggal Input</th>

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
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="<?= base_url(); ?>assets/libs/pace-js/pace.min.js"></script>


<script src="<?= base_url(); ?>assets/js/app.js"></script>

<!-- <script src="<?= base_url(); ?>assets/js/ajax.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



<script type="text/javascript">
	$(window).on('load', function() {
		(document.body.getAttribute('data-sidebar-size') == "sm") ? document.body.setAttribute('data-sidebar-size', 'sm'): document.body.setAttribute('data-sidebar-size', 'sm')

		$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();

		CekAksesUser();
	});
	$(document).ready(function() {
		var tipe = "<?= $dataSession['tipe']; ?>";


		if (tipe == 'SysAdmin') {

			$('#Halaman_Sysadmin').show();
		}

		var table = $('#tabel_instrumen').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true,
			"scrollX": true,
			// stateSave: true,
			// "bDestroy": true,
			// "bInfo": false, //Feature control DataTables' server-side processing mode.
			"lengthMenu": [
				[15, 25, 50, -1],
				['15', '25', '50', 'Semua']
			],
			"oLanguage": {
				"sLengthMenu": "<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>Tampilkan :<a>&nbsp;&nbsp;&nbsp;</a>_MENU_ ",
				"sSearch": "Cari :",
			},
			"dom": 'Blfrtip',
			"oSearch": {
				"sSearch": ""
			},

			"buttons": [{
				extend: 'excel',
				text: 'Excel',
				exportOptions: {
					columns: ':visible:not(:eq(0))'
				}
			}],
			"order": [

				// [13, 'asc'],
				[13, 'asc'],
				[3, 'asc']

			], //Initial no order.

			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_aset_glassware') ?>",
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
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == '1'
				},
				{

					'visible': false,
					'targets': [1, 4, 6, 16]

				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": 12,
					// "data": null,
					"render": function(data, type, row) {
						var html = ""

						if (data == 1) {
							html = "<span class='badge bg-success'>Normal</span>"
						} else if (data == 2) {

							html = "<span class='badge bg-warning '>Abnormal</span>"

						} else if (data == 5) {

							html = "<span class='badge bg-danger '>Rusak</span>"
						}
						return html;
					},
				},
				{
					"targets": 13,
					// "data": null,
					"render": function(data, type, row) {
						var html = ""

						if (data == 1) {
							html = "<span class='badge bg-info '>Baru </span> <span class='badge bg-warning '>Belum Dikalibrasi</span>"
						} else if (data == 2) {

							html = "<span class='badge bg-warning '>Belum Dikalibrasi</span>"
						} else if (data == 3) {

							html = "<span class='badge bg-primary' >Sedang dikalibrasi<span>"
						} else if (data == 4) {

							html = "<span class='badge bg-success '>Sudah dikalibrasi</span>"
						} else if (data == 5) {

							html = "<span class='badge bg-danger ' >Instrumen Rusak</span>"
						}
						return html;
					},
				},

			],



		});
		IsiPencarian();

		var table2 = $('#tabel_riwayat').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true,
			// "scrollX": true,

			// "bInfo": false, //Feature control DataTables' server-side processing mode.
			// "lengthMenu": [
			// 	[10, 25, 50, -1],
			// 	['10', '25', '50', 'Semua']
			// ],
			// "oLanguage": {
			// 	"sLengthMenu": "<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>Tampilkan :<a>&nbsp;&nbsp;&nbsp;</a>_MENU_ ",
			// 	"sSearch": "Cari :",
			// },

			// "dom": '',
			// "search": {
			// 	"visible": false
			// },

			// },
			// "buttons": [{
			// 	extend: 'excel',
			// 	text: 'Excel',
			// 	exportOptions: {
			// 		columns: [':visible']
			// 	}
			// }],
			"order": [

				[5, 'desc'],
			], //Initial no order.


			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_riwayat_instrumen') ?>",
				"type": "POST",
				"data": function(data) {
					data.id_aset3 = $('#id_aset3').val();

				}

			},





			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == '1'
				},
				{
					'visible': false,
					'targets': [11, 12]
				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": 9,
					// "data": null,

					// "className": "text-center",

					"render": function(data, type, row) {
						var html = ""

						if (data == 1) {
							html = "<span class='badge bg-success '>Normal</span>"

						} else if (data == 2) {
							html = "<span class='badge bg-warning '>Abnormal</span>"

						} else if (data == 5) {
							html = "<span class='badge bg-danger '>Rusak</span>"

						}
						return html;
					},

				},

			],



		});

		var table3 = $('#tabel_instrumen_baru').DataTable({

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
			// "order": [
			// 	[11, 'desc'],
			// 	[2, 'desc'],
			// ], //Initial no order.

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
				{
					'visible': false,
					'targets': [0, 4, 3, 12, 14, 15, 16, 17]
				},
				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				},
				// {
				// 	"targets": [1], //last column
				// 	"orderable": false, //set not orderable
				// },
				// {
				// 	"targets": 9,
				// 	// "data": null,

				// 	// "className": "text-center",

				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 1) {
				// 			html = "<span class='badge bg-success '>Normal</span>"

				// 		} else if (data == 2) {
				// 			html = "<span class='badge bg-warning '>Abnormal</span>"

				// 		} else if (data == 5) {
				// 			html = "<span class='badge bg-danger '>Rusak</span>"

				// 		}
				// 		return html;
				// 	},

				// },

			],



		});
		var kode_aset = document.getElementById('id_aset').value;

		var table4 = $('#tabel_input_kalibrasi').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true,


			// "bInfo": false, //Feature control DataTables' server-side processing mode.
			"lengthMenu": [
				[15, 25, 50, -1],
				['15', '25', '50', 'Semua']
			],
			"oLanguage": {
				"sLengthMenu": "<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>Tampilkan :<a>&nbsp;&nbsp;&nbsp;</a>_MENU_ ",
				"sSearch": "Cari :",
			},


			"dom": '',
			"search": {
				"visible": false
			},


			"buttons": [{
				extend: 'excel',
				text: 'Excel',
				exportOptions: {
					columns: [':visible']
				}
			}],
			"order": [
				[1, 'desc'],
			], //Initial no order.

			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_input_kalibrasi_glassware') ?>",
				"type": "POST",
				"data": function(data) {
					data.id_aset = $('#id_aset').val();
					data.id_lembarkerja = $('#id_lembarkerja').val();
					data.id_laporan = $('#id_laporan').val();
				}
			},





			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '3px')
						$(td).css('text-align', 'center')
					}
				},
				{
					'visible': false,
					'targets': [1, 2]
				},
				{
					"targets": [0, 2, 3, 4], //last column
					"orderable": false, //set not orderable
				},
				// {
				// 	"targets": [1], //last column
				// 	"orderable": false, //set not orderable
				// },
				// {
				// 	"targets": 9,
				// 	// "data": null,

				// 	// "className": "text-center",

				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 1) {
				// 			html = "<span class='badge bg-success '>Normal</span>"

				// 		} else if (data == 2) {
				// 			html = "<span class='badge bg-warning '>Abnormal</span>"

				// 		} else if (data == 5) {
				// 			html = "<span class='badge bg-danger '>Rusak</span>"

				// 		}
				// 		return html;
				// 	},

				// },

			],



		});
		var id_laporan2 = $('#id_laporan2').val();
		var table5 = $('#tabel_lembarkerja').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true,


			// "bInfo": false, //Feature control DataTables' server-side processing mode.
			"lengthMenu": [
				[15, 25, 50, -1],
				['15', '25', '50', 'Semua']
			],
			"oLanguage": {
				"sLengthMenu": "<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>Tampilkan :<a>&nbsp;&nbsp;&nbsp;</a>_MENU_ ",
				"sSearch": "Cari :",
			},


			"dom": '',
			"search": {
				"visible": false
			},



			"buttons": [{
				extend: 'excel',
				text: 'Excel',
				exportOptions: {
					columns: [':visible']
				}
			}],
			"order": [
				[4, 'asc'],
			], //Initial no order.

			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_lembarkerja') ?>",
				"type": "POST",
				"data": function(data) {
					// data.id_aset = $('#id_aset2').val();
					data.id_laporan2 = $('#id_laporan2').val();

				}
			},





			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '3px')
						$(td).css('text-align', 'center')
					}
				},
				// {
				// 	'visible': false,
				// 	'targets': [0, 4, 3, 12, 14, 15, 16, 17]
				// },
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == '1'
				},
				// {
				// 	"targets": [1], //last column
				// 	"orderable": false, //set not orderable
				// },
				// {
				// 	"targets": 9,
				// 	// "data": null,

				// 	// "className": "text-center",

				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 1) {
				// 			html = "<span class='badge bg-success '>Normal</span>"

				// 		} else if (data == 2) {
				// 			html = "<span class='badge bg-warning '>Abnormal</span>"

				// 		} else if (data == 5) {
				// 			html = "<span class='badge bg-danger '>Rusak</span>"

				// 		}
				// 		return html;
				// 	},

				// },

			],



		});


		$('#awal_kalibrasi').datepicker({

			calendarWeeks: true,
			autoclose: true,
			todayHighlight: true,
			dateFormat: 'yy-mm-dd',

		});

		$('#xxa').datepicker({

			calendarWeeks: true,
			autoclose: true,
			todayHighlight: true,
			dateFormat: 'yy-mm-dd',

		});

		$("#selanjutnnya_kalibrasi").datepicker({
			calendarWeeks: true,
			autoclose: true,
			todayHighlight: true,
			dateFormat: 'yy-mm-dd',
		});

	});




	function IsiPencarian() {
		var data = document.getElementById('JudulTabel').value

		if (data == "") {
			$('#tabel_instrumen').DataTable().search(
				$('#JudulTabel').val(),
			).draw();

		} else if (data != "") {
			$('#tabel_instrumen').DataTable().search(
				$('#JudulTabel').val(),
			).draw();

		}

	}





	$("#vertical-menu-btn").click(function() {
		$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();
	});

	function HideMenuEdit() {
		$('#tabel_input_kalibrasi').DataTable().ajax.reload();
		var table5 = $('#tabel_input_kalibrasi').DataTable();
		var column = table5.columns([0, 1, 2]);
		column.visible(!column.visible(true));
	}

	function HideMenuEditAja() {
		$('#tabel_input_kalibrasi').DataTable().ajax.reload();
		var table5 = $('#tabel_input_kalibrasi').DataTable();
		var column = table5.columns([0]);
		column.visible(true);
	}

	function ReloadTabelInputKalibrasi() {
		$('#tabel_input_kalibrasi').DataTable().ajax.reload();
	}

	function BenerinHeader() {
		$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();
	}


	function List_Instrumen_Baru() {

		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_list_instrumen').modal('show');

		$('.modal-title').text('Tentukan Lokasi Instrumen'); // Set Title to Bootstrap modal title
		// table.columns.adjust().draw();

		$('#tabel_instrumen_baru').DataTable().ajax.reload();

	}


	function Pindah_Instrumen_Baru(id_diterima) {

		save_method = 'add';
		$('#form_pindah')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_pindah_instrumen').modal('show'); // show bootstrap modal
		// Set Title to Bootstrap modal title
		$('.modal-title').text('Daftar Instrumen Baru');

		$("#info_lokasi").change(function() {
			$('#btnSaveInputBaru').show();

		});



		$.ajax({
			url: "<?php echo site_url('Sysadmin/Edit_Order_Diterima') ?>/" + id_diterima,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="id_order"]').val(data.id_diterima);
				$('[name="jumlah_stok"]').val(data.jumlah_diterima);

				$('[name="info_nama_barang"]').val(data.nama_barang);
				$('[name="info_merek"]').val(data.merek);
				$('[name="info_ukuran"]').val(data.ukuran);
				$('[name="info_type"]').val(data.type);
				$('[name="info_grade"]').val(data.grade);
				$('[name="info_id_instrumen"]').val(data.id_instrumen);
				$('[name="info_tipe_instrumen"]').val(data.kategori_barang);
				// $('[name="awal_kalibrasi"]').val(data.awal_kalibrasi);
				// $('[name="selanjutnnya_kalibrasi"]').val(data.selanjutnnya_kalibrasi);
				// $('[name="user_input"]').val(data.user_input);
				// $('[name="tanggal_input"]').val(data.tanggal_input);

				$('#modal_pindah_instrumen').modal('show');
				$('.modal-title').text('Tentukan Lokasi Instrumen');

				$('#btnSaveInputBaru').hide();



				var jumlahmax = document.getElementById('jumlah_stok').value;
				$("#info_input_jumlah").attr({
					"max": jumlahmax, // substitute your own
					"min": 1
				});

				$("#info_input_jumlah").change(function() {
					var max = parseInt($(this).attr('max'));
					var min = parseInt($(this).attr('min'));
					if ($(this).val() > max) {
						$(this).val(max);
					} else if ($(this).val() < min) {
						$(this).val(min);
					}
				});

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}


	function Fungsi_Tambah() {
		save_method = 'add';

		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah Instrumen'); // Set Title to Bootstrap modal title
		FilterTombolSave();
		$('#tipe_instrumen').attr('disabled', false);
		$('#merek').attr('disabled', false);
		$('#seri').attr('disabled', false);
		$('#serial_number').attr('disabled', false);
		$('#tahun').attr('disabled', false);
		$('#lokasi').attr('disabled', false);
		document.getElementById("status_kalibrasi").value = 1;
		// FilterStatus();
		$('#btnSaveKalibrasi').hide();
		$('#input_tindakan').hide();
		$('#input_kondisi').hide();
		$('#input_petugas').hide();
		$('#input_keterangan').hide();
		$('#input_awal_kalibrasi').hide();
		$('#input_selanjutnnya_kalibrasi').hide();
		$('#btnSaveKalibrasiSelesai').hide();


	}

	function SaveBaruInstrumen() {
		$('#btnSaveInputBaru').text('Simpan...'); //change button text
		$('#btnSaveInputBaru').attr('disabled', true); //set button disable 
		var url;

		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Simpan_Glassware_Baru') ?>";

		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_glassware') ?>";
		}

		// ajax adding data to database
		$.ajax({
			url: url,
			type: "POST",
			data: $('#form_pindah').serialize(),
			dataType: "JSON",
			success: function(data) {

				if (data.status) //if success close modal and reload ajax table
				{
					// $('#tabel_instrumen_baru').DataTable().ajax.reload();
					reload_table();
					$('#modal_pindah_instrumen').modal('hide');

					$('#modal_list_instrumen').modal('hide');


				}

				$('#btnSaveInputBaru').text('Simpan'); //change button text
				$('#btnSaveInputBaru').attr('disabled', false); //set button enable 


			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSaveInputBaru').text('Simpan'); //change button text
				$('#btnSaveInputBaru').attr('disabled', false); //set button enable 

			}
		});
	}


	function SaveBaru() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;

		if (save_method == 'add') {
			document.getElementById("status_kalibrasi").value = 1;
			url = "<?php echo site_url('sysadmin/Fungsi_Simpan_Glassware_Baru') ?>";

		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_glassware') ?>";
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


	function SaveKalibrasi() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Mulai_Kalibrasi_Glassware') ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Fungsi_Mulai_Kalibrasi_Glassware') ?>";
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
					$('#tabel_riwayat').DataTable().ajax.reload();
					location.reload();
				}

				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 

				$('#tabel_instrumen').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 

			}
		});
	}

	function SaveKalibrasiSelesai() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;
		url = "<?php echo site_url('sysadmin/Fungsi_Selesai_Kalibrasi_Glassware') ?>";

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
					$('#tabel_input_kalibrasi').DataTable().ajax.reload();
					$('#tabel_riwayat').DataTable().ajax.reload();
					reload_table();
					$('#tabel_lembarkerja').DataTable().ajax.reload();
					// location.reload();
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

	function KalibrasiSelesai() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 

		url = "<?php echo site_url('sysadmin/SimpanDataKalibrasi') ?>";

		// ajax adding data to database
		$.ajax({
			url: url,
			type: "POST",
			data: $('#form_selesai').serialize(),
			dataType: "JSON",
			success: function(data) {

				if (data.status) //if success close modal and reload ajax table
				{

					$('#modal_lembarkerja_form').modal('hide');
					$('#tabel_instrumen').DataTable().ajax.reload();
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

	function SaveInputKalibrasi() {

		a = document.getElementById('suhu_akuades').value;
		b = document.getElementById('berat_isi').value;
		c = document.getElementById('skala').value;
		if (a == '') {

			Swal.fire({
				title: 'Suhu Akuades  belum terisi',
				text: "Pastikan sudah terisi!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Okay'
			}).then((result) => {
				if (result.isConfirmed) {
					// $("#home-tab").click();
					// $("#home-tab-pane").click();


				}
			})



		} else if (b == '') {

			Swal.fire({
				title: 'Berat isi belum terisi',
				text: "Pastikan sudah terisi!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Okay'
			}).then((result) => {
				if (result.isConfirmed) {
					// $("#home-tab").click();
					// $("#home-tab-pane").click();


				}
			})



		} else if (c == '') {

			Swal.fire({
				title: 'Skala VN isi belum terisi',
				text: "Pastikan sudah terisi!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Okay'
			}).then((result) => {
				if (result.isConfirmed) {
					// $("#home-tab").click();
					// $("#home-tab-pane").click();


				}
			})



		} else {


			var id_aset = document.getElementById('id_aset').value;
			var skala = document.getElementById('skala').value;
			var id_laporan = document.getElementById('id_laporan').value;
			var id_lembarkerja = document.getElementById('skala').value;

			$.ajax({
				url: "<?php echo site_url('Sysadmin/InputPerulangan') ?>/",
				data: {
					id_lembarkerja: id_lembarkerja,
					id_aset: id_aset,
					id_laporan: id_laporan,
				},
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('[name="perulangan"]').val = (data.perulangan);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax Perulangan1');
				}
			});


			$ValuePerulangan = document.getElementById('perulangan').value;

			$('#btnSaveInputKalibrasi').text('saving...'); //change button text
			$('#btnSaveInputKalibrasi').attr('disabled', true); //set button disable 

			var url;



			if ($ValuePerulangan == 10) {
				MaxInput();


				var id_lembarkerja = document.getElementById('skala').value;
				var id_aset = document.getElementById('id_aset').value;
				var id_laporan = document.getElementById('id_laporan').value;

				$.ajax({
					url: "<?php echo site_url('Sysadmin/InputPerulangan') ?>/",
					data: {
						id_lembarkerja: id_lembarkerja,
						id_aset: id_aset,
						id_laporan: id_laporan,
					},
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						$('[name="perulangan"]').val(data.perulangan);
						document.getElementById('berat_isi').value = '';

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax Perulanga1n');
					}
				});


			} else if ($ValuePerulangan == 9) {

				url = "<?php echo site_url('sysadmin/Tambah_input_kalibrasi_glassware') ?>";

				var id_lembarkerja = document.getElementById('skala').value;
				var id_aset = document.getElementById('id_aset').value;
				var id_laporan = document.getElementById('id_laporan').value;

				$.ajax({
					url: "<?php echo site_url('Sysadmin/InputPerulangan') ?>/",
					data: {
						id_lembarkerja: id_lembarkerja,
						id_aset: id_aset,
						id_laporan: id_laporan,
					},
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						$('[name="perulangan"]').val(data.perulangan);
						document.getElementById('berat_isi').value = '';

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax Perulanga1n');
					}
				});


			} else {

				url = "<?php echo site_url('sysadmin/Tambah_input_kalibrasi_glassware') ?>";

				var id_lembarkerja = document.getElementById('skala').value;
				var id_aset = document.getElementById('id_aset').value;
				var id_laporan = document.getElementById('id_laporan').value;


				$.ajax({
					url: "<?php echo site_url('Sysadmin/InputPerulangan') ?>/",
					data: {

						id_lembarkerja: id_lembarkerja,
						id_aset: id_aset,
						id_laporan: id_laporan,
					},
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						$('[name="perulangan"]').val(data.perulangan);
						$('[name="id_lembarkerja"]').val(data.id_lembarkerja);
						document.getElementById('berat_isi').value = '';

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax Perulanga22n');
					}
				});

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

						$('#tabel_input_kalibrasi').DataTable().ajax.reload();
						IsiDataRumus();
						$('#btnSaveEditKalibrasi').hide();
						$('#btnSaveInputKalibrasi').show();

						document.getElementById('berat_isi').value = '';
					} else {}
					$('#btnSaveInputKalibrasi').text('Simpan'); //change button text
					$('#btnSaveInputKalibrasi').attr('disabled', false); //set button enable 

				},
				error: function(jqXHR, textStatus, errorThrown) {

					$('#btnSaveInputKalibrasi').text('Simpan'); //change button text
					$('#btnSaveInputKalibrasi').attr('disabled', false); //set button enable 

				}
			});


		}
	}

	function SaveEditInputKalibrasi() {

		url = "<?php echo site_url('sysadmin/Save_Update_input_glassware') ?>";




		$.ajax({
			url: url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data) {
				if (data.status) //if success close modal and reload ajax table
				{
					skala
					var id_lembarkerja = document.getElementById('skala').value;
					var id_aset = document.getElementById('id_aset').value;
					var id_laporan = document.getElementById('id_laporan').value;
					$.ajax({
						url: "<?php echo site_url('Sysadmin/InputPerulangan') ?>/",
						data: {
							id_lembarkerja: id_lembarkerja,
							id_aset: id_aset,
							id_laporan: id_laporan,
						},
						type: "GET",
						dataType: "JSON",
						success: function(data) {
							$('[name="perulangan"]').val(data.perulangan);

						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error get data from ajax Perulangan');
						}
					});
					document.getElementById('berat_isi').value = '';

					$('#tabel_input_kalibrasi').DataTable().ajax.reload();
					IsiDataRumus();
					$('#btnSaveEditKalibrasi').hide();
					$('#btnSaveInputKalibrasi').show();
				}

			},
			error: function(jqXHR, textStatus, errorThrown) {

				$('#btnSaveInputKalibrasi').text('Simpan'); //change button text
				$('#btnSaveInputKalibrasi').attr('disabled', false); //set button enable 

			}
		});


	}



	function reload_table_dan_page() {
		$('#tabel_instrumen').DataTable().ajax.reload();
		location.reload();
	}


	function reload_table() {
		$('#tabel_instrumen').DataTable().column(0).visible(true);


	}

	function Btn_Edit(id_aset) {
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#btnSave').show();
		$('#btnSaveKalibrasi').hide();
		$('#btnSaveKalibrasiSelesai').hide();
		$('#input_tindakan').hide();
		$('#input_petugas').hide();
		$('#input_keterangan').hide();
		$('#input_awal_kalibrasi').hide();
		$('#input_selanjutnnya_kalibrasi').hide();
		$('#myTab').hide();
		$('#myTabContent').hide();
		$('#input_jumlah').hide();

		// $('#tipe_instrumen').attr('disabled', false);
		// $('#merek').attr('disabled', false);
		// $('#seri').attr('disabled', false);
		// $('#serial_number').attr('disabled', false);
		// $('#tahun').attr('disabled', false);
		// $('#lokasi').attr('disabled', false);
		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('Sysadmin/Fungsi_Edit_Glassware') ?>/" + id_aset,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_aset"]').val(data.id_aset);
				$('[name="id_instrumen"]').val(data.id_instrumen);
				$('[name="tipe_instrumen"]').val(data.tipe_instrumen);
				$('[name="type"]').val(data.type);
				$('[name="grade"]').val(data.grade);
				$('[name="jumlah"]').val(data.grade);
				$('[name="merek"]').val(data.merek);
				$('[name="seri"]').val(data.seri);
				$('[name="serial_number"]').val(data.serial_number);
				$('[name="tahun"]').val(data.tahun);
				$('[name="ukuran"]').val(data.kapasitas);
				$('[name="lokasi"]').val(data.lokasi);
				$('[name="status_kalibrasi"]').val(data.status_kalibrasi);
				$('[name="awal_kalibrasi"]').val(data.awal_kalibrasi);
				$('[name="selanjutnnya_kalibrasi"]').val(data.selanjutnnya_kalibrasi);
				$('[name="user_input"]').val(data.user_input);
				$('[name="tanggal_input"]').val(data.tanggal_input);



				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Kategori Instrumen'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function btn_tambah_kalibrasi() {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#btnSaveKalibrasi').hide();
		$('#btnSave').hide();
		$('#btnSaveBaru').hide();
		$('#input_tindakan').show();
		$('#input_petugas').show();
		$('#input_keterangan').show();
		$('#input_jumlah').hide();
		$('#tipe_instrumen').attr('disabled', true);
		$('#merek').attr('disabled', true);
		$('#seri').attr('disabled', true);
		$('#serial_number').attr('disabled', true);
		$('#tahun').attr('disabled', true);
		$('#lokasi').attr('disabled', true);
		$('#ukuran').attr('disabled', true);
		$('#type').attr('disabled', true);
		$('#grade').attr('disabled', true);

		$('#btnSaveKalibrasiSelesai').hide();
		$('#btnSaveEditKalibrasi').hide();
		$('#btnSaveInputKalibrasi').show();


		var id_aset = document.getElementById('id_aset2').value;
		$.ajax({
			url: "<?php echo site_url('Sysadmin/TambahLembarKerja') ?>/",
			data: {
				id_aset: id_aset,

			},
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_aset"]').val(data.id_aset);

				$('[name="id_instrumen"]').val(data.id_instrumen);
				$('[name="tipe_instrumen"]').val(data.tipe_instrumen);
				$('[name="merek"]').val(data.merek);
				$('[name="rumus"]').val(data.rumus_instrumen);
				$('[name="seri"]').val(data.seri);
				$('[name="type"]').val(data.type);
				$('[name="grade"]').val(data.grade);
				$('[name="serial_number"]').val(data.serial_number);
				$('[name="ukuran"]').val(data.kapasitas);
				// $('[name="vn"]').val(data.kapasitas);
				// $('[name="skala"]').val(data.kapasitas);

				$('[name="lokasi"]').val(data.lokasi);
				$('[name="status_kalibrasi"]').val(data.status_kalibrasi);

				// if (data.status_kalibrasi == 3) {
				// 	HideMenuEditAja();

				// } else if (data.status_kalibrasi == 4) {
				// 	HideMenuEditAja();
				// } else {
				// 	HideMenuEdit();
				// }

				// $('[name="awal_kalibrasi"]').val(data.awal_kalibrasi);
				$('[name="periode_kalibrasi"]').val(data.periode_kalibrasi);
				// $('[name="selanjutnnya_kalibrasi"]').val(data.selanjutnnya_kalibrasi);
				$('[name="user_input"]').val(data.user_input);
				// $('[name="tanggal_input"]').val(data.tanggal_input);
				$('[name="id_kalibrasi"]').val(data.id_kalibrasi);


				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				// $('.modal-title').text('Riwayat Kalibrasi'); // Set title to Bootstrap modal title

				document.getElementById("status_kalibrasi").value = 3;
				document.getElementById("aktif").value = 0;
				document.getElementById("id_kalibrasi").value = "<?= $KodeLogInstrumen; ?>";
				$('#btnSaveKalibrasi').show();
				$('#btnSaveKalibrasiSelesai').hide();
				$('#input_keterangan').hide();
				$('#input_awal_kalibrasi').hide();
				$('#input_selanjutnnya_kalibrasi').hide();
				$('#input_kondisi').hide();
				$('#input_petugas').hide();
				$('#input_tempat').hide();
				$('#myTab').hide();
				$('#myTabContent').hide();
				$('#btnInputKetidakpastian').hide();
				$('#input_lembar_kerja').hide();
				$('#input_hasil_rumus').hide();

				var status = document.getElementById('status_kalibrasi').value;


				var id_lembarkerja = document.getElementById('skala').value;
				var id_laporan = document.getElementById('skala').value;
				var id_aset = document.getElementById('id_aset').value;
				$.ajax({
					url: "<?php echo site_url('Sysadmin/InputPerulangan') ?>/",
					data: {
						id_lembarkerja: id_lembarkerja,
						id_aset: id_aset,
						id_laporan: id_laporan,
					},
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						$('[name="perulangan"]').val(data.perulangan);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax Peruldddangan');
					}
				});



			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});



	}

	function CekAksesUser() {



		if (document.getElementById('akses_read').value != 1) {

			window.location.replace('<?= base_url('dashboard'); ?>');
		}

		if (document.getElementById('akses_create').value != 1) {

			$('#btn_list_baru').hide();
			$('#btn_kalibrasi_alat').hide();
			$('#btnlembarkerja').hide();

		}
		if (document.getElementById('akses_update').value != 1) {
			$('#KalibrasiSelesai').hide();
		}

	}

	function Btn_lembarkerja() {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#btnSaveKalibrasi').hide();
		$('#btnSave').hide();
		$('#btnSaveBaru').hide();
		$('#input_tindakan').hide();
		$('#input_petugas').hide();
		$('#input_keterangan').hide();
		$('#input_jumlah').hide();
		$('#tipe_instrumen').attr('disabled', true);
		$('#merek').attr('disabled', true);
		$('#seri').attr('disabled', true);
		$('#serial_number').attr('disabled', true);
		$('#tahun').attr('disabled', true);
		$('#lokasi').attr('disabled', true);
		$('#ukuran').attr('disabled', true);
		$('#type').attr('disabled', true);
		$('#grade').attr('disabled', true);

		$('#myTabContent').show();
		// $('#myTabContent input').removeAttr('readonly', 'readonly');
		$('#btnInputKetidakpastian').show();
		$('#input_lembar_kerja').show();
		$('#input_hasil_rumus').show();
		// $('.modal-title').text('Daftar Kalibrasi');
		$('#btnSaveKalibrasiSelesai').hide();
		$('#btnSaveEditKalibrasi').hide();
		$('#btnSaveInputKalibrasi').show();

		$("#contact-tab").click(function() {

			a = document.getElementById('suhu_awal').value;
			b = document.getElementById('suhu_ahkir').value;
			c = document.getElementById('kelembaban_awal').value;
			d = document.getElementById('kelembaban_ahkir').value;
			e = document.getElementById('skala').value;

			if (a == '') {

				Swal.fire({
					title: 'Suhu awal belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						// $("#home-tab").click();
						// $("#home-tab-pane").click();

						$("#home-tab").addClass("active");
						$('#input_hasil_perhitungan').hide();

						$("#contact-tab").removeClass("active");

						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");
				$('#input_hasil_perhitungan').show();
				$("#contact-tab").removeClass("active ");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");

			} else if (b == '') {

				Swal.fire({
					title: 'Suhu ahkir belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#input_hasil_perhitungan').hide();

						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");

				$('#input_hasil_perhitungan').show();
				$("#contact-tab").removeClass("active ");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");

			} else if (c == '') {

				Swal.fire({
					title: 'Kelembaban awal belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#input_hasil_perhitungan').hide();
						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");

				$('#input_hasil_perhitungan').show();
				$("#contact-tab").removeClass("active ");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");

			} else if (d == '') {
				Swal.fire({
					title: 'Kelembaban ahkir belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#input_hasil_perhitungan').hide();
						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");
				$('#input_hasil_perhitungan').show();

				$("#contact-tab").removeClass("active");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");


			} else if (e == '') {
				Swal.fire({
					title: 'Skala Volume Nominal belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#input_hasil_perhitungan').hide();
						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");
				$('#input_hasil_perhitungan').show();

				$("#contact-tab").removeClass("active");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");


			} else {

				IsiDataRataRata();
				$('#input_hasil_perhitungan').show();
				IsiDataRumus();

			}

		});



		$("#suhu_ahkir").focusout(function() {
			var awal = parseFloat(document.getElementById('suhu_awal').value);
			var ahkir = parseFloat(document.getElementById('suhu_ahkir').value);

			hasil = parseFloat((awal + ahkir) / 2);
			document.getElementById('ratasuhu').value = hasil.toFixed(2);
		});

		$("#suhu_awal").focusout(function() {
			var awal = parseFloat(document.getElementById('suhu_awal').value);
			var ahkir = parseFloat(document.getElementById('suhu_ahkir').value);
			hasil = parseFloat((awal + ahkir) / 2);
			document.getElementById('ratasuhu').value = hasil.toFixed(2);


		});

		$("#kelembaban_awal").focusout(function() {
			var awal = parseFloat(document.getElementById('kelembaban_awal').value);
			var ahkir = parseFloat(document.getElementById('kelembaban_ahkir').value);

			document.getElementById('ratakelembaban').value = parseFloat((awal + ahkir) / 2);
		});

		$("#kelembaban_ahkir").focusout(function() {
			var awal = parseFloat(document.getElementById('kelembaban_awal').value);
			var ahkir = parseFloat(document.getElementById('kelembaban_ahkir').value);

			document.getElementById('ratakelembaban').value = parseFloat((awal + ahkir) / 2);
		});

		$("#berat_isi").focusout(function() {
			var ahkir = parseFloat(document.getElementById('berat_isi').value);
			var awal = parseFloat(document.getElementById('berat_kosong').value);
			hasil = parseFloat(ahkir - awal);
			nilaihasil = hasil.toFixed(4);
			document.getElementById('berat_air').value = nilaihasil;
		});

		$("#berat_kosong").focusout(function() {
			var ahkir = parseFloat(document.getElementById('berat_isi').value);
			var awal = parseFloat(document.getElementById('berat_kosong').value);

			hasil = parseFloat(ahkir - awal);
			nilaihasil = hasil.toFixed(4);
			document.getElementById('berat_air').value = nilaihasil;
		});

		$("#berat_isi").focusout(function() {
			var berat_air = parseFloat(document.getElementById('berat_air').value);
			var q = parseFloat(document.getElementById('q').value);

			hasil1 = parseFloat(berat_air * q);
			nilaihasil1 = hasil1.toFixed(4);

			document.getElementById('hasil1').value = nilaihasil1;

			var RhoW = parseFloat(document.getElementById('RhoW').value);
			var RhoA = parseFloat(document.getElementById('RhoA').value);

			hasil2 = parseFloat(1 / (RhoW - RhoA));
			nilaihasil2 = hasil2.toFixed(4);

			document.getElementById('hasil2').value = nilaihasil2;

			var RhoA = parseFloat(document.getElementById('RhoA').value);
			var RhoAT = parseFloat(document.getElementById('RhoAT').value);

			hasil3 = parseFloat(1 - (RhoA / RhoAT));
			nilaihasil3 = hasil3.toFixed(4);

			document.getElementById('hasil3').value = nilaihasil3;

			var RhoA = parseFloat(document.getElementById('RhoA').value);
			var RhoAT = parseFloat(document.getElementById('RhoAT').value);
			var ye = parseFloat(document.getElementById('Y').value);
			var suhu_akuades = parseFloat(document.getElementById('suhu_akuades').value);

			hasil4 = parseFloat(1 - ye * (suhu_akuades - 20));
			nilaihasil4 = hasil4.toFixed(4);

			document.getElementById('hasil4').value = nilaihasil4;


			var hasil1 = parseFloat(document.getElementById('hasil1').value);
			var hasil2 = parseFloat(document.getElementById('hasil2').value);
			var hasil3 = parseFloat(document.getElementById('hasil3').value);
			var hasil4 = parseFloat(document.getElementById('hasil4').value);

			hasil5 = parseFloat(hasil1 * hasil2 * hasil3 * hasil4);
			nilaihasil5 = hasil5.toFixed(4);

			document.getElementById('v20').value = nilaihasil5;

		});

		$("#suhu_akuades").focusout(function() {
			var RhoA = parseFloat(document.getElementById('RhoA').value);
			var RhoAT = parseFloat(document.getElementById('RhoAT').value);
			var ye = parseFloat(document.getElementById('Y').value);
			var suhu_akuades = parseFloat(document.getElementById('suhu_akuades').value);

			hasil4 = parseFloat(1 - ye * (suhu_akuades - 20));
			nilaihasil4 = hasil4.toFixed(4);

			document.getElementById('hasil4').value = nilaihasil4;


			var hasil1 = parseFloat(document.getElementById('hasil1').value);
			var hasil2 = parseFloat(document.getElementById('hasil2').value);
			var hasil3 = parseFloat(document.getElementById('hasil3').value);
			var hasil4 = parseFloat(document.getElementById('hasil4').value);

			hasil5 = parseFloat(hasil1 * hasil2 * hasil3 * hasil4);
			nilaihasil5 = hasil5.toFixed(4);

			document.getElementById('v20').value = nilaihasil5;

		});

		var id_aset = document.getElementById('id_aset2').value;
		var input_id_laporan = document.getElementById('id_laporan2').value;



		// document.getElementById('id_lembarkerja').value = input_id_laporan;

		// $("#id_lembarkerja").val($("#id_laporan2").val() + kodelembarkerja);
		// document.getElementById('id_lembarkerja').value = input_id_laporan;
		document.getElementById('id_laporan').value = input_id_laporan;
		// document.getElementById('id_lembarkerja').value = '12312';
		// document.getElementById('id_lembarkerja').value = '20220001-2';



		$.ajax({
			url: "<?php echo site_url('Sysadmin/TambahLembarKerja') ?>/",
			data: {
				id_aset: id_aset,
			},
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_aset"]').val(data.id_aset);

				$('[name="id_instrumen"]').val(data.id_instrumen);
				$('[name="tipe_instrumen"]').val(data.tipe_instrumen);
				$('[name="merek"]').val(data.merek);
				$('[name="rumus"]').val(data.rumus_instrumen);
				$('[name="seri"]').val(data.seri);
				$('[name="type"]').val(data.type);
				$('[name="grade"]').val(data.grade);
				$('[name="serial_number"]').val(data.serial_number);
				$('[name="ukuran"]').val(data.kapasitas);
				// $('[name="vn"]').val(data.kapasitas);
				// $('[name="skala"]').val(data.kapasitas);

				$('[name="lokasi"]').val(data.lokasi);
				$('[name="status_kalibrasi"]').val(data.status_kalibrasi);

				if (data.status_kalibrasi == 3) {
					HideMenuEditAja();

				} else if (data.status_kalibrasi == 4) {
					HideMenuEditAja();
				} else {
					HideMenuEdit();
				}

				// $('[name="awal_kalibrasi"]').val(data.awal_kalibrasi);
				$('[name="periode_kalibrasi"]').val(data.periode_kalibrasi);
				// $('[name="selanjutnnya_kalibrasi"]').val(data.selanjutnnya_kalibrasi);
				$('[name="user_input"]').val(data.user_input);
				// $('[name="tanggal_input"]').val(data.tanggal_input);
				$('[name="id_kalibrasi"]').val(data.id_kalibrasi);


				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				// $('.modal-title').text('Daftar Kalibrasi'); // Set title to Bootstrap modal title

				// FilterStatus();


				var status = document.getElementById('status_kalibrasi').value;

				var id_laporan = document.getElementById('id_laporan2').value;
				// var id_lembarkerja = 0.4;
				var id_aset = document.getElementById('id_aset2').value;
				$.ajax({
					url: "<?php echo site_url('Sysadmin/InputPerulanganHabisLoad') ?>/",
					data: {
						// id_lembarkerja: id_lembarkerja,
						id_aset: id_aset,
						id_laporan: id_laporan,
					},
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var idlembarkerja = (data.id_lembarkerja);
						$('[name="id_lembarkerja"]').val(data.id_lembarkerja);
						$('[name="perulangan"]').val(data.perulangan);
						$('[name="skala"]').val(data.skala);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax Perulangan1');
					}
				});





			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});



	}

	function Btn_Kalibrasi(id_aset) {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#btnSaveKalibrasi').hide();
		$('#btnSave').hide();
		$('#btnSaveBaru').hide();
		$('#input_tindakan').show();
		$('#input_petugas').show();
		$('#input_keterangan').show();
		$('#input_jumlah').hide();
		$('#tipe_instrumen').attr('disabled', true);
		$('#merek').attr('disabled', true);
		$('#seri').attr('disabled', true);
		$('#serial_number').attr('disabled', true);
		$('#tahun').attr('disabled', true);
		$('#lokasi').attr('disabled', true);
		$('#ukuran').attr('disabled', true);
		$('#type').attr('disabled', true);
		$('#grade').attr('disabled', true);
		// $('.modal-title').text('Daftar Kalibrasi');
		$('#btnSaveKalibrasiSelesai').hide();
		$('#btnSaveEditKalibrasi').hide();
		$('#btnSaveInputKalibrasi').show();

		$("#contact-tab").click(function() {

			a = document.getElementById('suhu_awal').value;
			b = document.getElementById('suhu_ahkir').value;
			c = document.getElementById('kelembaban_awal').value;
			d = document.getElementById('kelembaban_ahkir').value;
			e = document.getElementById('skala').value;

			if (a == '') {

				Swal.fire({
					title: 'Suhu awal belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						// $("#home-tab").click();
						// $("#home-tab-pane").click();

						$("#home-tab").addClass("active");
						$('#input_hasil_perhitungan').hide();

						$("#contact-tab").removeClass("active");

						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");
				$('#input_hasil_perhitungan').show();
				$("#contact-tab").removeClass("active ");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");

			} else if (b == '') {

				Swal.fire({
					title: 'Suhu akhir belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#input_hasil_perhitungan').hide();

						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");

				$('#input_hasil_perhitungan').show();
				$("#contact-tab").removeClass("active ");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");

			} else if (c == '') {

				Swal.fire({
					title: 'Kelembaban awal belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#input_hasil_perhitungan').hide();
						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");

				$('#input_hasil_perhitungan').show();
				$("#contact-tab").removeClass("active ");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");

			} else if (d == '') {
				Swal.fire({
					title: 'Kelembaban ahkir belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#input_hasil_perhitungan').hide();
						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");
				$('#input_hasil_perhitungan').show();

				$("#contact-tab").removeClass("active");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");


			} else if (e == '') {
				Swal.fire({
					title: 'Skala Volume Nominal belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Okay'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#input_hasil_perhitungan').hide();
						$("#home-tab-pane").addClass(" tab-pane fade show active");
						$("#contact-tab-pane").removeClass("tab-pane fade show active");
					}
				})

				$("#home-tab").addClass("active ");
				$('#input_hasil_perhitungan').show();

				$("#contact-tab").removeClass("active");
				$("#home-tab-pane").addClass(" tab-pane fade show active");
				$("#contact-tab-pane").removeClass("tab-pane fade show active");


			} else {

				IsiDataRataRata();
				$('#input_hasil_perhitungan').show();
				IsiDataRumus();

			}

		});



		$("#suhu_ahkir").focusout(function() {
			var awal = parseFloat(document.getElementById('suhu_awal').value);
			var ahkir = parseFloat(document.getElementById('suhu_ahkir').value);

			hasil = parseFloat((awal + ahkir) / 2);
			document.getElementById('ratasuhu').value = hasil.toFixed(2);
		});

		$("#suhu_awal").focusout(function() {
			var awal = parseFloat(document.getElementById('suhu_awal').value);
			var ahkir = parseFloat(document.getElementById('suhu_ahkir').value);
			hasil = parseFloat((awal + ahkir) / 2);
			document.getElementById('ratasuhu').value = hasil.toFixed(2);


		});

		$("#kelembaban_awal").focusout(function() {
			var awal = parseFloat(document.getElementById('kelembaban_awal').value);
			var ahkir = parseFloat(document.getElementById('kelembaban_ahkir').value);

			document.getElementById('ratakelembaban').value = parseFloat((awal + ahkir) / 2);
		});

		$("#kelembaban_ahkir").focusout(function() {
			var awal = parseFloat(document.getElementById('kelembaban_awal').value);
			var ahkir = parseFloat(document.getElementById('kelembaban_ahkir').value);

			document.getElementById('ratakelembaban').value = parseFloat((awal + ahkir) / 2);
		});

		$("#berat_isi").focusout(function() {
			var ahkir = parseFloat(document.getElementById('berat_isi').value);
			var awal = parseFloat(document.getElementById('berat_kosong').value);
			hasil = parseFloat(ahkir - awal);
			nilaihasil = hasil.toFixed(4);
			document.getElementById('berat_air').value = nilaihasil;
		});

		$("#berat_kosong").focusout(function() {
			var ahkir = parseFloat(document.getElementById('berat_isi').value);
			var awal = parseFloat(document.getElementById('berat_kosong').value);

			hasil = parseFloat(ahkir - awal);
			nilaihasil = hasil.toFixed(4);
			document.getElementById('berat_air').value = nilaihasil;
		});

		$("#berat_isi").focusout(function() {
			var berat_air = parseFloat(document.getElementById('berat_air').value);
			var q = parseFloat(document.getElementById('q').value);

			hasil1 = parseFloat(berat_air * q);
			nilaihasil1 = hasil1.toFixed(4);

			document.getElementById('hasil1').value = nilaihasil1;

			var RhoW = parseFloat(document.getElementById('RhoW').value);
			var RhoA = parseFloat(document.getElementById('RhoA').value);

			hasil2 = parseFloat(1 / (RhoW - RhoA));
			nilaihasil2 = hasil2.toFixed(4);

			document.getElementById('hasil2').value = nilaihasil2;

			var RhoA = parseFloat(document.getElementById('RhoA').value);
			var RhoAT = parseFloat(document.getElementById('RhoAT').value);

			hasil3 = parseFloat(1 - (RhoA / RhoAT));
			nilaihasil3 = hasil3.toFixed(4);

			document.getElementById('hasil3').value = nilaihasil3;

			var RhoA = parseFloat(document.getElementById('RhoA').value);
			var RhoAT = parseFloat(document.getElementById('RhoAT').value);
			var ye = parseFloat(document.getElementById('Y').value);
			var suhu_akuades = parseFloat(document.getElementById('suhu_akuades').value);

			hasil4 = parseFloat(1 - ye * (suhu_akuades - 20));
			nilaihasil4 = hasil4.toFixed(4);

			document.getElementById('hasil4').value = nilaihasil4;


			var hasil1 = parseFloat(document.getElementById('hasil1').value);
			var hasil2 = parseFloat(document.getElementById('hasil2').value);
			var hasil3 = parseFloat(document.getElementById('hasil3').value);
			var hasil4 = parseFloat(document.getElementById('hasil4').value);

			hasil5 = parseFloat(hasil1 * hasil2 * hasil3 * hasil4);
			nilaihasil5 = hasil5.toFixed(4);

			document.getElementById('v20').value = nilaihasil5;

		});

		$("#suhu_akuades").focusout(function() {
			var RhoA = parseFloat(document.getElementById('RhoA').value);
			var RhoAT = parseFloat(document.getElementById('RhoAT').value);
			var ye = parseFloat(document.getElementById('Y').value);
			var suhu_akuades = parseFloat(document.getElementById('suhu_akuades').value);

			hasil4 = parseFloat(1 - ye * (suhu_akuades - 20));
			nilaihasil4 = hasil4.toFixed(4);

			document.getElementById('hasil4').value = nilaihasil4;


			var hasil1 = parseFloat(document.getElementById('hasil1').value);
			var hasil2 = parseFloat(document.getElementById('hasil2').value);
			var hasil3 = parseFloat(document.getElementById('hasil3').value);
			var hasil4 = parseFloat(document.getElementById('hasil4').value);

			hasil5 = parseFloat(hasil1 * hasil2 * hasil3 * hasil4);
			nilaihasil5 = hasil5.toFixed(4);

			document.getElementById('v20').value = nilaihasil5;

		});


		$.ajax({
			url: "<?php echo site_url('Sysadmin/Fungsi_Edit_Glassware') ?>/" + id_aset,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_aset"]').val(data.id_aset);

				$('[name="id_instrumen"]').val(data.id_instrumen);
				$('[name="tipe_instrumen"]').val(data.tipe_instrumen);
				$('[name="merek"]').val(data.merek);
				$('[name="rumus"]').val(data.rumus_instrumen);
				$('[name="seri"]').val(data.seri);
				$('[name="type"]').val(data.type);
				$('[name="grade"]').val(data.grade);
				$('[name="serial_number"]').val(data.serial_number);
				$('[name="ukuran"]').val(data.kapasitas);
				// $('[name="vn"]').val(data.kapasitas);
				// $('[name="skala"]').val(data.kapasitas);

				$('[name="lokasi"]').val(data.lokasi);
				$('[name="status_kalibrasi"]').val(data.status_kalibrasi);

				if (data.status_kalibrasi == 3) {
					HideMenuEditAja();

				} else if (data.status_kalibrasi == 4) {
					HideMenuEditAja();
				} else {
					HideMenuEdit();
				}

				// $('[name="awal_kalibrasi"]').val(data.awal_kalibrasi);
				$('[name="periode_kalibrasi"]').val(data.periode_kalibrasi);
				// $('[name="selanjutnnya_kalibrasi"]').val(data.selanjutnnya_kalibrasi);
				$('[name="user_input"]').val(data.user_input);
				// $('[name="tanggal_input"]').val(data.tanggal_input);
				$('[name="id_kalibrasi"]').val(data.id_kalibrasi);


				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				// $('.modal-title').text('Daftar Kalibrasi'); // Set title to Bootstrap modal title

				FilterStatus();

				var status = document.getElementById('status_kalibrasi').value;


				var id_lembarkerja = document.getElementById('skala').value;
				var id_aset = document.getElementById('id_aset').value;
				var id_laporan = document.getElementById('id_laporan').value;
				$.ajax({
					url: "<?php echo site_url('Sysadmin/InputPerulangan') ?>/",
					data: {
						id_lembarkerja: id_lembarkerja,
						id_aset: id_aset,
						id_laporan: id_laporan,
					},
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						$('[name="perulangan"]').val(data.perulangan);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax Peruldddangan');
					}
				});



			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});



	}

	function Btn_Edit_Input_Kalibrasi(id_input) {
		save_method = 'update';
		$.ajax({
			url: "<?php echo site_url('Sysadmin/Fungsi_Edit_Input_Kalibrasi_Glassware') ?>/" + id_input,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="id_input"]').val(data.id_input);
				$('[name="perulangan"]').val(data.perulangan);
				$('[name="berat_kosong"]').val(data.berat_kosong);
				$('[name="berat_isi"]').val(data.berat_isi);
				$('[name="suhu_akuades"]').val(data.suhu_akuades);
				$('[name="skala"]').val(data.skala);
				$('[name="id_lembarkerja"]').val(data.id_lembarkerja);


				$('[name="berat_air"]').val(data.berat_air);
				$('[name="hasil1"]').val(data.hasil1);
				$('[name="hasil2"]').val(data.hasil2);
				$('[name="hasil3"]').val(data.hasil3);
				$('[name="hasil4"]').val(data.hasil4);
				$('[name="v20"]').val(data.V20);





				$('#btnSaveEditKalibrasi').show();
				$('#btnSaveInputKalibrasi').hide();

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function IsiDataRataRata() {
		var id_lembarkerja = document.getElementById('id_lembarkerja').value;

		$.ajax({
			url: "<?php echo site_url('Sysadmin/InputV20') ?>/",
			data: {
				id_lembarkerja: id_lembarkerja,
			},
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="ratav20"]').val(data.ratav20);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax Input V20');
			}
		});

		$.ajax({
			url: "<?php echo site_url('Sysadmin/InputRataBeratAir') ?>/",
			data: {
				id_lembarkerja: id_lembarkerja,
			},
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="rataberatair"]').val(data.rataberatair);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax Input Rata Berat Air');
			}
		});

		$.ajax({
			url: "<?php echo site_url('Sysadmin/InputRataSuhuAkuades') ?>/",
			data: {
				id_lembarkerja: id_lembarkerja,
			},
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="ratasuhuakuades"]').val(data.ratasuhuakuades);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax Input Rata Suhu Akuades');
			}
		});

		$.ajax({
			url: "<?php echo site_url('Sysadmin/InputMinSuhu') ?>/",
			data: {
				id_lembarkerja: id_lembarkerja,
			},
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="minsuhu"]').val(data.minsuhu);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax Input Min Suhu');
			}
		});

	}

	function IsiDataRumus() {
		var id_lembarkerja = document.getElementById('id_lembarkerja').value;

		$.ajax({
			url: "<?php echo site_url('Sysadmin/InputMaxSuhu') ?>/",
			data: {
				id_lembarkerja: id_lembarkerja,
			},
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="maxsuhu"]').val(data.maxsuhu);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax Input V20');
			}
		});

		$.ajax({
			url: "<?php echo site_url('Sysadmin/InputStd') ?>/",
			data: {
				id_lembarkerja: id_lembarkerja,
			},
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="stddev_pop"]').val(data.stddevsuhu);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax Input Std');
			}
		});
	}

	function IsiDataKetidakpastian() {
		d = document.getElementById('kelembaban_ahkir').value;

		if (d == '') {

			Swal.fire({
				title: 'Kelembaban belum terisi',
				text: "Pastikan sudah terisi!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Okay'
			}).then((result) => {
				if (result.isConfirmed) {
					// $("#home-tab").click();
					// $("#home-tab-pane").click();

					$("#home-tab").addClass("active");
					$('#input_hasil_perhitungan').hide();

					$("#profile-tab").removeClass("active");

					$("#home-tab-pane").addClass(" tab-pane fade show active");
					$("#profile-tab-pane").removeClass("tab-pane fade show active");
				}
			})

			HideButton();

		} else {

			$('#input_hasil_perhitungan').show();
			$("#contact-tab-pane").addClass(" tab-pane fade show active");



			var RataBeratAir = parseFloat(document.getElementById('rataberatair').value);
			var t = parseFloat(document.getElementById('ratasuhuakuades').value);



			Rumus2b = RataBeratAir * 1.005867902 * (0.99999 * (20 - t));
			document.getElementById('Rumus2b').value = Rumus2b;

			var ratav20 = parseFloat(document.getElementById('ratav20').value);
			var vn = parseFloat(document.getElementById('vn').value);
			var skala = parseFloat(document.getElementById('skala').value);
			document.getElementById('vn').value = skala;
			RumusKoreksi = skala - ratav20;
			HasilKoreksi = parseFloat(RumusKoreksi).toFixed(4);
			document.getElementById('koreksi').value = HasilKoreksi;

			var SigmaTimbangan = parseFloat(document.getElementById('SigmaTimbangan').value);
			var LoPTimb = parseFloat(document.getElementById('LoPTimb').value);

			var u95 = parseFloat(document.getElementById('U95').value);
			var k = parseFloat(document.getElementById('k').value);
			var max = parseFloat(document.getElementById('maxsuhu').value);
			var min = parseFloat(document.getElementById('minsuhu').value);
			var stddev_pop = parseFloat(document.getElementById('stddev_pop').value);

			Rumus1a = Math.sqrt(((SigmaTimbangan / 1.4142135462) * (SigmaTimbangan / 1.4142135462)) + ((LoPTimb / 3.464101615) * (LoPTimb / 3.464101615)));
			document.getElementById('Rumus1a').value = Rumus1a;

			Rumus1b = 1.00285231 * (0.99999 * (20 - t));
			document.getElementById('Rumus1b').value = Rumus1b;

			Rumus3b = RataBeratAir * 1.005867902 * (0.99999 * (20 - t));
			document.getElementById('Rumus3b').value = -(Rumus3b);

			Rumus4b = RataBeratAir * 0.0000198850196 * (0.99999 * (20 - t));
			document.getElementById('Rumus4b').value = Rumus4b;

			Rumus5a = Math.sqrt((((u95 / k) * (u95 / k)) + ((max - min) / 3.464101615)));
			document.getElementById('Rumus5a').value = Rumus5a;

			Rumus5b = RataBeratAir * 0.0000100285231;
			document.getElementById('Rumus5b').value = -(Rumus5b);

			Rumus6b = RataBeratAir * 0.128534704 * (20 - t);
			document.getElementById('Rumus6b').value = Rumus6b;

			Rumus7a = stddev_pop / 3.16227766;
			document.getElementById('Rumus7a').value = Rumus7a;

			var Hasil1a = parseFloat(document.getElementById('Rumus1a').value);
			var Hasil1b = parseFloat(document.getElementById('Rumus1b').value);
			var Hasil2a = parseFloat(document.getElementById('Rumus2a').value);
			var Hasil2b = parseFloat(document.getElementById('Rumus2b').value);
			var Hasil3a = parseFloat(document.getElementById('Rumus3a').value);
			var Hasil3b = parseFloat(document.getElementById('Rumus3b').value);
			var Hasil4a = parseFloat(document.getElementById('Rumus4a').value);
			var Hasil4b = parseFloat(document.getElementById('Rumus4b').value);
			var Hasil5a = parseFloat(document.getElementById('Rumus5a').value);
			var Hasil5b = parseFloat(document.getElementById('Rumus5b').value);
			var Hasil6a = parseFloat(document.getElementById('Rumus6a').value);
			var Hasil6b = parseFloat(document.getElementById('Rumus6b').value);
			var Hasil7a = parseFloat(document.getElementById('Rumus7a').value);

			Hasil8a = Math.sqrt(
				((Hasil1a * Hasil1a) * (Hasil1b * Hasil1b)) +
				((Hasil2a * Hasil2a)) * ((Hasil2b * Hasil2b)) +
				((Hasil3a * Hasil3a)) * ((Hasil3b * Hasil3b)) +
				((Hasil4a * Hasil4a)) * ((Hasil4b * Hasil4b)) +
				((Hasil5a * Hasil5a)) * ((Hasil5b * Hasil5b)) +
				((Hasil5a * Hasil5a)) * ((Hasil5b * Hasil5b)) +
				((Hasil6a * Hasil6a)) * ((Hasil6b * Hasil6b)) +
				((Hasil7a * Hasil7a)));

			document.getElementById('Rumus8a').value = Hasil8a;
			document.getElementById('ketidakpastian').value = 2 * Hasil8a;

			if (document.getElementById('perulangan').value == 10) {
				$('#btnSaveKalibrasiSelesai').show();
			} else {
				$('#btnSaveKalibrasiSelesai').show();
			}

			$('#master_rumus').show();
			$('#input_ketidakpastian').show();

		}





	}

	function btn_hapus_glassware(id_aset) {

		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "Data akan dihapus permanen",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/Fungsi_Hapus_glassware') ?>/" + id_aset,
					type: "POST",
					dataType: "JSON",
					success: function(data) {


						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_instrumen').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})


	}

	function Btn_Hapus(id_kalibrasi) {

		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "Data akan dihapus permanen",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/Fungsi_Hapus_Kalibrasi') ?>/" + id_kalibrasi,
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
						$('#tabel_riwayat').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})


	}

	function Btn_Hapus_Log(id_lembarkerja) {

		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "Data akan dihapus permanen",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/Fungsi_Hapus_glassware_kalibrasi_log') ?>/" + id_lembarkerja,
					type: "POST",
					dataType: "JSON",
					success: function(data) {


						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_lembarkerja').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})


	}

	function Btn_Hapus_Input_Kalibrasi(id_input) {

		Swal.fire({
			title: 'Yakin data akan di hapus ?',
			text: "Data akan dihapus permanen",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/Fungsi_Hapus_glassware_kalibrasi') ?>/" + id_input,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table
						var id_lembarkerja = document.getElementById('skala').value;
						var id_aset = document.getElementById('id_aset').value;
						var id_laporan = document.getElementById('id_laporan').value;
						$.ajax({
							url: "<?php echo site_url('Sysadmin/InputPerulangan') ?>/",
							data: {

								id_lembarkerja: id_lembarkerja,
								id_aset: id_aset,
								id_laporan: id_laporan,
							},
							type: "GET",
							dataType: "JSON",
							success: function(data) {
								$('[name="perulangan"]').val(data.perulangan);
							},
							error: function(jqXHR, textStatus, errorThrown) {
								alert('Error get data from ajax Perulangan');
							}
						});
						$('#tabel_input_kalibrasi').DataTable().ajax.reload();
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

	function Btn_Riwayat(id_aset) {
		$('#modal_riwayat_form').modal('show');
		// var id_as = $('#id_aset2').val(); // show bootstrap modal when complete loaded
		// $('.modal-title').text('Daftar Kalibrasi'); // Set title to Bootstrap modal title


		$.ajax({
			url: "<?php echo site_url('Sysadmin/Fungsi_Edit_Glassware') ?>/" + id_aset,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="id_aset3"]').val(data.id_aset);
				$('[name="id_aset2"]').val(data.id_aset);
				$('[name="id_laporan"]').val(data.id_laporan);

				BenerinHeader();

				// $('#tabel_riwayat').DataTable().search(
				// 	$('#id_aset2').val(),
				// ).draw();

				$('#tabel_riwayat').DataTable().ajax.reload();

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function btn_laporan(id_kalibrasi) {
		$('#modal_lembarkerja_form').modal('show');
		// var id_as = $('#id_aset2').val(); // show bootstrap modal when complete loaded
		// $('.modal-title').text('Daftar Kalibrasi'); // Set title to Bootstrap modal title
		$.ajax({
			url: "<?php echo site_url('Sysadmin/GetDataLaporanKalibrasi') ?>/" + id_kalibrasi,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_aset2"]').val(data.id_aset);
				$('[name="id_laporan2"]').val(data.id_kalibrasi);
				$('[name="status_selesai_kalibrasi"]').val(data.cetak_laporan);

				var status_cetak = data.cetak_laporan;

				if (status_cetak == 0) {

					$('#KalibrasiSelesai').show();
				} else if (status_cetak == 1) {
					$('#KalibrasiSelesai').show();
				} else if (status_cetak == 2) {
					$('#KalibrasiSelesai').hide();
					$('#btnlembarkerja').hide();

				} else {
					$('#KalibrasiSelesai').hide();
					$('#btnlembarkerja').hide();

				}


				// if (document.getElementById('akses_update').value != 1) {
				// 	$('#KalibrasiSelesai').hide();


				// }
				// $('#KalibrasiSelesai').show();
				BenerinHeader();
				// $('#tabel_lembarkerja').DataTable().search(
				// 	data.id_kalibrasi,
				// ).draw();


				$('#tabel_lembarkerja').DataTable().ajax.reload();

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});




	}



	function autofill(tipe_instrumen) {
		var tipe_instrumen = document.getElementById('tipe_instrumen').value;

		$.ajax({
			url: "<?php echo base_url('sysadmin/TipeGlassware') ?>/",

			data: {

				tipe_instrumen: tipe_instrumen,
			},
			success: function(data) {
				var hasil = JSON.parse(data);

				$.each(hasil, function(key, val) {

					document.getElementById('id_instrumen').value = val.id_instrumen;
					document.getElementById('periode_kalibrasi').value = val.periode_kalibrasi;
					document.getElementById('rumus').value = val.rumus_instrumen;
					// document.getElementById('tipe_instrumen').value = val.tipe_instrumen;
				});
			}
		});

	}


	function IsiRumus(id_instrumen) {
		var id_instrumen = document.getElementById('info_id_instrumen').value;
		$.ajax({
			url: "<?php echo base_url('sysadmin/TipeGlassware') ?>/",

			data: {

				id_instrumen: id_instrumen,
			},
			success: function(data) {
				var hasil = JSON.parse(data);

				$.each(hasil, function(key, val) {

					// document.getElementById('id_instrumen').value = val.id_instrumen;
					document.getElementById('info_periode_kalibrasi').value = val.periode_kalibrasi;
					document.getElementById('info_rumus_instrumen').value = val.rumus_instrumen;
					// document.getElementById('tipe_instrumen').value = val.tipe_instrumen;
				});
			}
		});

	}

	function MaxInput() {

		Swal.fire(
			'Maaf Perulangan Sudah 10x',
			'Pastikan data sudah benar!',
			'error'

		)
		document.getElementById('perulangan').value = '';

	}

	function HitungRumus() {

		var hasil = document.getElementById('berat_isi1').value; - document.getElementById('berat_kosong').value;
		document.getElementById('hasil').value == hasil;
	}

	function DateSelanjutnya(date) {
		var date2 = $('#awal_kalibrasi').datepicker("getDate");
		var periode_kalibrasi = +document.getElementById('periode_kalibrasi').value;

		var nextDayDate = new Date();
		nextDayDate.setDate(date2.getDate() + periode_kalibrasi);
		$('#selanjutnnya_kalibrasi').datepicker().datepicker('setDate', nextDayDate);

		document.getElementById('selanjutnnya_kalibrasi').value == nextDayDate;
	}

	function FilterTindakan() {

		var data = document.getElementById("tindakan").value;

		if (data == "Pengujian Sample") {

			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#input_keterangan').show();
			$('#input_petugas').hide();

		} else if (data == "Perbaikan Kerusakan") {
			$('#input_petugas').show();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#input_keterangan').hide();
		} else if (data == "Kalibrasi Internal") {
			$('#input_petugas').show();
			$('#input_awal_kalibrasi').show();
			$('#input_selanjutnnya_kalibrasi').show();
			$('#input_keterangan').hide();
			document.getElementById("tindakan").value = "Kalibrasi Internal";
		} else if (data == "Kalibrasi External") {
			$('#input_petugas').show();
			$('#input_awal_kalibrasi').show();
			$('#input_selanjutnnya_kalibrasi').show();
			$('#input_keterangan').hide();
			document.getElementById("tindakan").value = "Kalibrasi External";
		}
	}


	function FilterKondisi() {

		var data = document.getElementById("kondisi").value;

		if (data == "1") {

			document.getElementById("status_kalibrasi").value = 4;

		} else if (data == "2") {
			document.getElementById("status_kalibrasi").value = 4;
		} else if (data == "5") {
			document.getElementById("status_kalibrasi").value = 5;
			document.getElementById("aktif").value = 0;
		}
	}

	function HideButton() {
		$('#btnSaveKalibrasiSelesai').hide();
		$('#input_hasil_perhitungan').hide();
		$('#master_rumus').hide();
		$('#input_ketidakpastian').hide();
	}

	function FilterStatus() {

		var data = document.getElementById("status_kalibrasi").value;

		if (data == "1") {
			document.getElementById("status_kalibrasi").value = 3;
			document.getElementById("aktif").value = 0;
			document.getElementById("id_kalibrasi").value = "<?= $KodeLogInstrumen; ?>";
			$('#btnSaveKalibrasi').show();
			$('#btnSaveKalibrasiSelesai').hide();
			$('#input_keterangan').hide();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#input_kondisi').hide();
			$('#input_petugas').hide();
			$('#input_tempat').hide();
			$('#myTab').hide();
			$('#myTabContent').hide();
			$('#btnInputKetidakpastian').hide();
			$('#input_lembar_kerja').hide();
			$('#input_hasil_rumus').hide();

		} else if (data == "2") {
			document.getElementById("status_kalibrasi").value = 3;
			document.getElementById("id_kalibrasi").value = "<?= $KodeLogInstrumen; ?>";
			document.getElementById("aktif").value = 0;
			$('#btnSaveKalibrasi').show();
			$('#input_keterangan').hide();
			$('#btnSaveKalibrasiSelesai').hide();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#input_kondisi').hide();
			$('#input_petugas').hide();
			$('#input_tempat').hide();
			$('#myTab').hide();
			$('#myTabContent').hide();
			$('#btnInputKetidakpastian').hide();
			$('#input_lembar_kerja').hide();
			$('#input_hasil_rumus').hide();
		} else if (data == "3") {

			document.getElementById("aktif").value = 1;
			document.getElementById("id_laporan").value = document.getElementById('id_laporan2').value;
			$('#btnSaveKalibrasi').hide();
			$('#input_keterangan').show();
			$('#input_tindakan').hide();
			$('#btnSaveKalibrasiSelesai').hide();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#input_kondisi').show();
			$('#input_petugas').hide();
			$('#input_tempat').show();
			$('#myTab').show();
			$('#myTabContent').show();
			$('#myTabContent input').removeAttr('readonly', 'readonly');
			$('#btnInputKetidakpastian').show();
			$('#input_lembar_kerja').show();
			$('#input_hasil_rumus').show();
			var id_laporan = document.getElementById('id_laporan').value;
			// $('#tabel_input_kalibrasi').DataTable().search(
			// 	id_laporan
			// ).draw();
			$('#input_hasil_rumus input').attr('readonly', 'readonly');

			document.getElementById("status_kalibrasi").value = 4;



		} else if (data == "4") {

			document.getElementById("status_kalibrasi").value = 3;
			document.getElementById("id_kalibrasi").value = "<?= $KodeLogInstrumen; ?>";
			document.getElementById("aktif").value = 0;
			$('#btnSaveKalibrasi').show();
			$('#input_keterangan').hide();
			$('#btnSaveKalibrasiSelesai').hide();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#input_kondisi').hide();
			$('#input_petugas').hide();
			$('#input_tempat').hide();
			$('#myTab').hide();
			$('#myTabContent').hide();
			$('#btnInputKetidakpastian').hide();
			$('#input_lembar_kerja').hide();
			$('#input_hasil_rumus').hide();



		} else if (data == "5") {
			document.getElementById("status_kalibrasi").value = 4;
			document.getElementById("aktif").value = 1;
			$('#btnSaveKalibrasi').hide();
			$('#btnSaveKalibrasiSelesai').hide();
			$('#input_petugas').hide();
			$('#input_keterangan').hide();
			$('#input_tindakan').hide();
			$('#input_kondisi').hide();
			$('#input_tempat').hide();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#myTab').show();
			$('#myTabContent').show();
			$('#myTabContent input').attr('readonly', 'readonly');
			$('#btnInputKetidakpastian').hide();
			$('#input_lembar_kerja').hide();
			$('#input_hasil_rumus').hide();

			$('#input_hasil_rumus input').attr('readonly', 'readonly');

			var id_aset = document.getElementById('id_aset').value;



			$.ajax({
				url: "<?php echo site_url('Sysadmin/LoadDataHasilKalibrasi') ?>/",
				data: {
					id_aset: id_aset,
				},
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('[name="id_laporan"]').val(data.id_laporan);

					$('#tabel_input_kalibrasi').DataTable().search(
						data.id_laporan
					).draw();

					$('[name="suhu_awal"]').val(data.suhu_awal);
					$('[name="suhu_ahkir"]').val(data.suhu_ahkir);
					$('[name="kelembaban_awal"]').val(data.kelembaban_awal);
					$('[name="kelembaban_ahkir"]').val(data.kelembaban_ahkir);
					$('[name="ratasuhu"]').val(data.suhu_avg);
					$('[name="ratakelembaban"]').val(data.kelembaban_avg);
					$('[name="ratav20"]').val(data.ratav20);
					$('[name="ratasuhuakuades"]').val(data.suhuakuades_avg);
					$('[name="koreksi"]').val(data.koreksi);
					$('[name="stddev_pop"]').val(data.stddev_pop);
					$('[name="ketidakpastian"]').val(data.ketidakpastian);

				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax Input V20');
				}
			});


		}
	}
</script>


<div class="modal fade" id="modal_riwayat_form" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<!-- <h5 class="form-label">Riwayat Instrumen-</h5> -->
				<div class="col-md-3 ">
					<h5 class="modal-title" id="myLargeModalLabel">Daftar Riwayat Kalibrasi</h5>
				</div>
				<div class="col-md-8 " style="text-align: right;">
					<!-- <button class="btn btn-primary" onclick="Fungsi_Tambah()"><i class="bx bx-plus me-1"></i> Tambah Baru</button> -->
					<button class="btn btn-primary" nama="btn_kalibrasi_alat" id="btn_kalibrasi_alat" onclick="btn_tambah_kalibrasi()"><i class="bx bx-plus me-1"></i> Kalibrasi Alat</button>


				</div>
				<button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

			</div>
			<div class="modal-body form">
				<div class="row" style="display: none;">
					<div class="col-md-10">
						<div class="mb-3">
							<label class="form-label" for="id_aset3">Id Aset</label>
							<input type="text" class="form-control" id="id_aset3" name="id_aset3" placeholder="id_aset" readonly>
							<div class="invalid-feedback">
								Please provide a id_aset.
							</div>
						</div>
					</div>

				</div>

				<table id="tabel_riwayat" name="tabel_riwayat" class="table table-hover nowrap w-100">
					<thead>
						<tr align="center">
							<th>Menu</th>
							<th align="center">#</th>
							<th>No</th>
							<!-- <th>Id Laporan</th> -->
							<th>Id Kalibrasi</th>
							<th>Id Glassware</th>
							<th>Tindakan</th>
							<th>Petugas</th>
							<th>Mulai Kalibrasi</th>
							<th>Selesai Kalibrasi</th>
							<th>Kondisi</th>
							<th>Ket</th>
							<th>User Input</th>
							<th>Tanggal Input</th>

						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_list_instrumen" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<!-- <h5 class="form-label">Riwayat Instrumen-</h5> -->
				<h5 class="modal-title" id="myLargeModalLabel">Daftar Instrumen Baru</h5>
				<button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<table id="tabel_instrumen_baru" name="tabel_instrumen_baru" class="table table-hover nowrap w-100">
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
							<th width="10px">No PO</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<!-- <button class="btn btn-primary" data-dismiss="modal" onclick="Pindah_Instrumen_Baru()"><i class="bx bx-plus me-1"></i> Tambah Baru</button> -->
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_pindah_instrumen" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<!-- <h5 class="form-label">Riwayat Instrumen-</h5> -->
				<h5 class="modal-title" id="myLargeModalLabel">Riwayat Instrumen </h5>

				<button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_pindah" class="needs-validation" novalidate>
					<div class="row">

						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="id_order">Id Order</label>
								<input type="text" class="form-control" id="id_order" name="id_order" placeholder="id_order" readonly>
								<div class="invalid-feedback">
									Please provide a id_order.
								</div>
							</div>
						</div>


						<div class="col-md-1">
							<div class="mb-3">
								<label class="form-label" for="jumlah_stok">Stok</label>
								<input type="text" class="form-control" id="jumlah_stok" name="jumlah_stok" placeholder="Jumlah Stok" readonly>
								<div class="invalid-feedback">
									Please provide a Jumlah .
								</div>
							</div>
						</div>

						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="info_nama_barang">Nama Barang</label>
								<input type="text" class="form-control" id="info_nama_barang" name="info_nama_barang" placeholder="Nama Barang" readonly>
								<div class="invalid-feedback">
									Please provide a Jumlah .
								</div>
							</div>
						</div>

						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="info_merek">Merek</label>
								<input type="text" class="form-control" id="info_merek" name="info_merek" placeholder="Merek" readonly>
								<div class="invalid-feedback">
									Please provide a Merek .
								</div>
							</div>
						</div>


						<div class="col-md-1">
							<div class="mb-3">
								<label class="form-label" for="info_ukuran">Ukuran</label>
								<input type="text" class="form-control" id="info_ukuran" name="info_ukuran" placeholder="Ukuran" readonly>
								<div class="invalid-feedback">
									Please provide a Merek .
								</div>
							</div>
						</div>



						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="info_type">Type</label>

								<input type="text" class="form-control" id="info_type" name="info_type" placeholder="Type" readonly>
								<div class="invalid-feedback">
									Please provide a Type .
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<div class="mb-3">
								<label class="form-label" for="info_grade">Grade</label>
								<input type="text" class="form-control" id="info_grade" name="info_grade" placeholder="Grade" readonly>
								<div class="invalid-feedback">
									Please provide a Grade .
								</div>
							</div>
						</div>
						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="info_id_instrumen">Kode Instrumen</label>
								<input type="text" class="form-control" id="info_id_instrumen" name="info_id_instrumen" placeholder="Kode Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>
						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="info_tipe_instrumen">Tipe Instrumen</label>
								<input type="text" class="form-control" id="info_tipe_instrumen" name="info_tipe_instrumen" placeholder="Tipe Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Tipe Instrumen.
								</div>
							</div>
						</div>

						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="rumus">rumus_instrumen</label>
								<input type="text" class="form-control" id="info_rumus_instrumen" name="info_rumus_instrumen" placeholder="Kode Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>
						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="info_user_input">User Input</label>
								<input type="text" class="form-control" id="info_user_input" name="info_user_input" placeholder="User Input" value="<?= $dataSession['nama']; ?>">
								<div class="invalid-feedback">
									Please provide a User Input.
								</div>
							</div>
						</div>
						<div class="col-md-2" id="input_periode_kalibrasi" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="info_periode_kalibrasi">periode_kalibrasi</label>
								<input type="text" class="form-control" id="info_periode_kalibrasi" name="info_periode_kalibrasi" placeholder="periode_kalibrasi">
								<div class="invalid-feedback">
									Please provide a periode_kalibrasi.
								</div>
							</div>
						</div>


						<div class="col-md-4" style="display: none;">
							<div class="mb-3">
								<label for="info_tanggal_input" class="form-label">Tanggal Input</label>
								<input class="form-control" type="text" value="<?php echo date("Y-m-d H:i:s"); ?>" id="info_tanggal_input" name="info_tanggal_input">
							</div>
						</div>



						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="info_input_jumlah">Jumlah</label>
								<input type="number" class="form-control" id="info_input_jumlah" name="info_input_jumlah" placeholder="Jumlah" required onclick="IsiRumus();">
								<div class="invalid-feedback">
									Please provide a Jumlah .
								</div>
							</div>
						</div>

						<div class="col-md-9">
							<div class="mb-3">
								<label class="form-label" for="info_lokasi">Lokasi</label>
								<select class="form-select" id="info_lokasi" name="info_lokasi">
									<option selected disabled value="">Pilih Lokasi Lab</option>
									<option value="Lab PCR">Lab PCR</option>
									<option value="Lab Mikrobiologi">Lab Mikrobiologi</option>
									<option value="Lab Instrument">Lab Instrument</option>
									<option value="Lab Kimia 1 MTS">Lab Kimia 1 MTS</option>
									<option value="Lab Kimia 1 OMG">Lab Kimia 1 OMG</option>
									<option value="Lab Kimia 2 BBG">Lab Kimia 2 BBG</option>
									<option value="Lab Kimia 3 Lingkungan">Lab Kimia 3 Lingkungan</option>
									<option value="Lab Analisa">Lab Analisa</option>
								</select>
								<div class="valid-feedback">
									Please provide a info_lokasi.
								</div>
							</div>
						</div>


					</div>


				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSaveInputBaru" onclick="SaveBaruInstrumen()" class="btn btn-primary">Simpan</button>



				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_lembarkerja_form" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="col-md-4 ">
					<h5 class="modal-title" id="myLargeModalLabel">Daftar Lembar Kerja Kalibrasi </h5>
				</div>
				<div class="col-md-7 " style="text-align: right;">
					<button class="btn btn-primary" nama="btnlembarkerja" id="btnlembarkerja" onclick="Btn_lembarkerja()"><i class="bx bx-plus me-1"></i> Lembar Kerja</button>


				</div>
				<button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_selesai" class="needs-validation" novalidate>
					<div class="row" style="display: none;">
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="id_aset2">Id Aset</label>
								<input type="text" class="form-control" id="id_aset2" name="id_aset2">

							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="id_laporan2">Id Kalibrasi</label>
								<input type="text" class="form-control" id="id_laporan2" name="id_laporan2" placeholder="id_laporan2" readonly>
								<div class="invalid-feedback">
									Please provide a id_laporan2.
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="status_selesai_kalibrasi">status_selesai_kalibrasi</label>
								<input type="text" class="form-control" id="status_selesai_kalibrasi" name="status_selesai_kalibrasi" placeholder="status_selesai_kalibrasi" readonly>
								<div class="invalid-feedback">
									Please provide a id_laporan2.
								</div>
							</div>
						</div>
					</div>
				</form>
				<table id="tabel_lembarkerja" name="tabel_lembarkerja" class="table table-hover nowrap w-100">
					<thead>
						<tr align="center">
							<th>Menu</th>
							<th>No</th>
							<th>#</th>
							<th>Id Kalibrasi</th>
							<th>Id Lembar Kerja</th>

							<th>Skala VN</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" id="KalibrasiSelesai" name="KalibrasiSelesai" onclick="KalibrasiSelesai()" class="btn btn-primary">Simpan Data Kalibrasi</button>
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modal_form" role="dialog" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
		<div class=" modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">

				<form action="#" id="form" class="needs-validation" novalidate>
					<div class="row" id="input_sesudah_kalibrasi">
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="id_aset">Id Aset</label>
								<input type="text" class="form-control" id="id_aset" name="id_aset" placeholder="id_aset" readonly>
								<div class="invalid-feedback">
									Please provide a id_aset.
								</div>
							</div>
						</div>
						<!-- style="display: none;" -->
						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="id_instrumen">Kode Instrumen</label>
								<input type="text" class="form-control" id="id_instrumen" name="id_instrumen" placeholder="Kode Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>

						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="rumus">Kode rumus</label>
								<input type="text" class="form-control" id="rumus" name="rumus" placeholder="Kode rumus" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="tipe_instrumen">Tipe Instrumen</label>


								<select id="tipe_instrumen" name="tipe_instrumen" class="form-select" onchange="return autofill();">

									<option disabled value="">Pilih Kategori Instrumen</option>
									<?php
									foreach ($dataKategori as $row) {
										echo '<option value="' . $row->kategori_instrumen . '">' . $row->kategori_instrumen . '</option>';
									}
									?>
								</select>
								<div class="invalid-feedback">
									Please provide a Nama tipe_instrumen.
								</div>
							</div>
						</div>



						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="merek">Merek</label>
								<input type="text" class="form-control" id="merek" name="merek" placeholder="Merek" required>
								<div class="invalid-feedback">
									Please provide a Merek .
								</div>
							</div>
						</div>


						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="ukuran"> Ukuran ( mL ) </label>
								<!-- <select class="form-select" id="ukuran" name="ukuran"> -->
								<!-- <option seleted value="">Pilih Ukuran</option>
										</select> -->
								<!-- <?php
										foreach ($dataUkuran as $row) {
											echo '<option value="' . $row->ukuran . '">' . $row->ukuran . '</option>';
										}
										?> -->
								<input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Kapasitas" required>


							</div>
						</div>

						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="type">Type</label>
								<select class="form-select" id="type" name="type">
									<option seleted value="">Pilih Type</option>

									<option value="Borosilicate Glass">Borosilicate Glass </option>


								</select>
								<div class="invalid-feedback">
									Please provide a Type .
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="grade">Grade</label>
								<select class="form-select" id="grade" name="grade">
									<option seleted value="">Pilih Grade</option>
									<option value="Class A">Class A</option>
									<option value="Class B">Class B</option>
									<option value="Class C">Class C</option>
								</select>
								<div class="invalid-feedback">
									Please provide a Grade .
								</div>
							</div>
						</div>
						<div class="col-md-3" id="input_jumlah">
							<div class="mb-3">
								<label class="form-label" for="jumlah">Jumlah</label>
								<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
								<div class="invalid-feedback">
									Please provide a Jumlah .
								</div>
							</div>
						</div>


						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label" for="lokasi">Lokasi</label>
								<select class="form-select" id="lokasi" name="lokasi" onchange="FilterTombolSave()">
									<option selected disabled value="">Pilih Lokasi Lab</option>
									<option value="Lab PCR">Lab PCR</option>
									<option value="Lab Mikrobiologi">Lab Mikrobiologi</option>
									<option value="Lab Instrument">Lab Instrument</option>
									<option value="Lab Kimia 1 MTS">Lab Kimia 1 MTS</option>
									<option value="Lab Kimia 1 OMG">Lab Kimia 1 OMG</option>
									<option value="Lab Kimia 2 BBG">Lab Kimia 2 BBG</option>
									<option value="Lab Kimia 3 Lingkungan">Lab Kimia 3 Lingkungan</option>
									<option value="Lab Analisa">Lab Analisa</option>
								</select>
								<div class="valid-feedback">
									Please provide a Lokasi.
								</div>
							</div>
						</div>

						<div class="col-md-3" style="display: none;" id="input_kondisi">
							<div class="mb-3">
								<label class="form-label" for="kondisi">Kondisi</label>
								<select class="form-select" id="kondisi" name="kondisi" onchange="return FilterKondisi();">
									<option selected value="1">Normal</option>
									<option value="2">Abnormal</option>
									<option value="5">Rusak</option>


								</select>
								<div class="valid-feedback">
									Please provide a Status Kalibrasi.
								</div>
							</div>
						</div>
						<div class="col-md-3" style="display: none;" id="input_tempat">
							<div class="mb-3">
								<label class="form-label" for="tempatkalibrasi">Tempat Kalibrasi</label>
								<input type="text" class="form-control" id="tempatkalibrasi" name="tempatkalibrasi" placeholder="Tempat Kalibrasi" value="Ruang Timbang 1"></input>
								<div class="invalid-feedback">
									Please provide a Tahun.
								</div>
							</div>
						</div>


						<div class="col-md-3" style="display: none;" id="input_tindakan">
							<div class="mb-3">
								<label class="form-label" for="tindakan">Tindakan</label>
								<select class="form-select" id="tindakan" name="tindakan" onchange="return FilterTindakan();">
									<option value="">-Pilih Tindakan</option>
									<!-- <option selected value="Pengujian Sample">Pengujian Sample</option> -->
									<!-- <option value="Perbaikan Kerusakan">Perbaikan Kerusakan</option> -->
									<option value="Kalibrasi Internal">Kalibrasi Internal</option>
									<option value="Kalibrasi External">Kalibrasi External
									</option>

								</select>
								<div class="valid-feedback">
									Please provide a Status Kalibrasi.
								</div>
							</div>
						</div>

						<div class="col-md-3" id="input_status_kalibrasi" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="status_kalibrasi">Status Kalibrasi</label>
								<select class="form-select" id="status_kalibrasi" name="status_kalibrasi">
									<option value="0"></option>
									<option value="1">Instrumen Baru</option>
									<option value="2">Belum Dikalibrasi</option>
									<option value="3">Sedang Dikalibrasi</option>
									<option value="4">Sudah Dikalibrasi</option>
									<option value="5">Instrumen Rusak</option>

								</select>
								<div class="valid-feedback">
									Please provide a Status Kalibrasi.
								</div>
							</div>
						</div>

						<div class="col-md-3" id="input_petugas" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="petugas">Nama Petugas</label>
								<input type="text" class="form-control" id="petugas" name="petugas" placeholder="Nama Petugas" value="<?= $dataSession['nama']; ?>"></input>
								<div class="invalid-feedback">
									Please provide a Tahun.
								</div>
							</div>
						</div>
						<div class="col-md-6" id="input_keterangan" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="keterangan">Keterangan</label>
								<textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="1"></textarea>
								<div class="invalid-feedback">
									Please provide a Tahun.
								</div>
							</div>
						</div>
						<div class="col-md-3" style="display: none;" id="input_awal_kalibrasi">
							<div class="mb-3">
								<label for="awal_kalibrasi" class="form-label">Tanggal Kalibrasi</label>
								<input class="form-control" type="text" id="awal_kalibrasi" name="awal_kalibrasi" autocomplete="off" placeholder="Tanggal Kalibrasi">
							</div>
						</div>

						<div class="col-md-3" style="display: none;" id="input_selanjutnnya_kalibrasi">
							<div class="mb-3">
								<label for="selanjutnnya_kalibrasi" class="form-label">Kalibrasi Selanjutnya</label>
								<input class="form-control" type="text" id="selanjutnnya_kalibrasi" name="selanjutnnya_kalibrasi" autocomplete="off" readonly>

							</div>
						</div>
						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="user_input">User Input</label>
								<input type="text" class="form-control" id="user_input" name="user_input" placeholder="User Input" value="<?= $dataSession['nama']; ?>">
								<div class="invalid-feedback">
									Please provide a User Input.
								</div>
							</div>
						</div>
						<div class="col-md-2" style="display: none;" id="input_periode_kalibrasi">
							<div class="mb-3">
								<label class="form-label" for="periode_kalibrasi">periode_kalibrasi</label>
								<input type="text" class="form-control" id="periode_kalibrasi" name="periode_kalibrasi" placeholder="periode_kalibrasi">
								<div class="invalid-feedback">
									Please provide a periode_kalibrasi.
								</div>
							</div>
						</div>

						<div class="col-md-4" style="display: none;">
							<div class="mb-3">
								<label for="tanggal_input" class="form-label">Tanggal Input</label>
								<input class="form-control" type="text" value="<?php echo date("Y-m-d H:i:s"); ?>" id="tanggal_input" name="tanggal_input">
							</div>
						</div>
						<div class="col-md-4" style="display: none;">
							<div class="mb-3">
								<label for="id_kalibrasi" class="form-label">id_kalibrasi</label>
								<input class="form-control" type="text" id="id_kalibrasi" name="id_kalibrasi">
							</div>
						</div>
						<div class="col-md-2" id="input_aktif" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="aktif">aktif</label>
								<select class="form-select" id="aktif" name="aktif">
									<option value="0">Off</option>
									<option selected value="1">On</option>
								</select>
								<div class="valid-feedback">
									Please provide a Status Kalibrasi.
								</div>
							</div>
						</div>
					</div>
					<ul class="nav nav-tabs" id="myTab" name="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" onclick="HideButton();" aria-selected="true">Input Lembar Kerja</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Hasil Perhitungan</button>
						</li>

						<li class="nav-item" role="presentation">
							<button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" onclick="IsiDataKetidakpastian();" aria-selected="false">Perhitungan Ketidakpastian</button>
						</li>


					</ul>
					<div class="tab-content" id="myTabContent" name="myTabContent">
						<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

							<div class="row border border-primary p-2 mt-2" border="1" id="input_lembar_kerja">
								<div class="col-md-1" id="">
									<div class="mb-3">
										<label class="form-label" for="id_laporan">Id Kalibrasi</label>
										<input type="text" class="form-control" id="id_laporan" name="id_laporan" placeholder="Id Laporan" value="" readonly>
									</div>
								</div>

								<div class="col-md-1" id="" style="display: none;">
									<div class="mb-3">
										<label class="form-label" for="id_input">Id Input</label>
										<input type="text" class="form-control" id="id_input" name="id_input" placeholder="Id Input" value="" readonly>
									</div>
								</div>
								<div class="col-md-1" id="">
									<div class="mb-3">
										<label class="form-label" for="perulangan">Perulangan</label>
										<input type="number" class="form-control" id="perulangan" name="perulangan" min="1" max="10" value="" readonly>
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="id_lembarkerja">Id Lembar Kerja</label>
										<input type="text" class="form-control" id="id_lembarkerja" name="id_lembarkerja" readonly>
									</div>
								</div>
								<div class=" col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="berat_kosong">Berat Kosong ( g )</label>
										<input type="number" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="Berat Kosong ( g )">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="berat_isi">Berat Isi ( g ) </label>
										<input type="number" class="form-control" id="berat_isi" name="berat_isi" placeholder="Berat Isi ( g ) ">
									</div>
								</div>

								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="suhu_akuades">Suhu Akuades ( °C )</label>
										<input type="number" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="Suhu Akuades ( °C )">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="skala">Skala Volume Nominal ( mL )</label>
										<input type="number" class="form-control" id="skala" name="skala" placeholder="Skala Volume Nominal ( mL )">
									</div>
								</div>

								<div class="col-md-2 " id="">
									<div class="pt-4">
										<button type="button" id="btnSaveInputKalibrasi" onclick="SaveInputKalibrasi()" class="btn btn-primary">Simpan</button>
										<button type="button" id="btnSaveEditKalibrasi" onclick="SaveEditInputKalibrasi()" class="btn btn-primary">Simpan Edit</button>
									</div>
								</div>
							</div>
							<div class="row border border-primary p-2 mt-2" border="1" id="input_lembar_kerja">

								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="suhu_awal">Suhu Awal (°C)</label>
										<input type="number" class="form-control" id="suhu_awal" name="suhu_awal" placeholder="Suhu Awal(°C)">
									</div>
								</div>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="suhu_ahkir">Suhu Akhir (°C)</label>
										<input type="number" class="form-control" id="suhu_ahkir" name="suhu_ahkir" placeholder="Suhu Ahkir(°C)">
									</div>
								</div>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="kelembaban_awal">Kelembaban Awal </label>
										<input type="number" class="form-control" id="kelembaban_awal" name="kelembaban_awal" placeholder="Kelembaban Awal (%)">
									</div>
								</div>

								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="kelembaban_ahkir">Kelembaban Ahkir </label>
										<input type="number" class="form-control" id="kelembaban_ahkir" name="kelembaban_ahkir" placeholder="Kelembaban Ahkir (%)">
									</div>
								</div>


							</div>

							<div class="row  border border-primary p-2 mt-2" border="1" id="input_hasil_rumus">
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="berat_air">Berat Air </label>
										<input type="number" class="form-control" id="berat_air" name="berat_air" placeholder="Berat Air ( g ) " readonly>
									</div>
								</div>

								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="hasil1">(W1 - W0)*Q</label>
										<input type="number" class="form-control" id="hasil1" name="hasil1" placeholder="Rumus 1" readonly>
									</div>
								</div>

								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="hasil2">1 / (ρW - ρA)</label>
										<input type="number" class="form-control" id="hasil2" name="hasil2" placeholder="Rumus 2" readonly>
									</div>
								</div>

								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="hasil3">1-(ρA / ρAT)</label>
										<input type="number" class="form-control" id="hasil3" name="hasil3" placeholder="Rumus 3" readonly>
									</div>
								</div>

								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="hasil1">1 - Y(t-20)</label>
										<input type="number" class="form-control" id="hasil4" name="hasil4" placeholder="Rumus 4" readonly>
									</div>
								</div>

								<div class="col-md-2" id="">

									<div class="mb-3">
										<label class="form-label" for="v20">V20</label>
										<input type="number" class="form-control" id="v20" name="v20" placeholder="V20" readonly>
									</div>
								</div>
							</div>
							<div class="card-body">
								<table id="tabel_input_kalibrasi" class="table table-bordered nowrap w-100">
									<thead>
										<tr style="text-align: center">
											<th width="5%" style="text-align: center">Menu</th>
											<th>Id Aset</th>
											<th>Id Kalibrasi</th>
											<th>Perulangan</th>
											<th>Skala VN</th>
											<th>Berat Kosong ( g ) </th>
											<th>Berat Isi ( g )</th>
											<th>Suhu Akuades ( °C )</th>

											<th>Berat Air</th>
											<th>(W1 - W0)*Q</th>
											<th>1 / (ρW - ρA)</th>
											<th>1-(ρA / ρAT)</th>
											<th>1 - Y(t-20)</th>

											<th>V20</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade active" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">


							<div class="row  border border-primary p-2 mt-2" border="1" id="input_hasil_perhitungan">

								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="ratasuhu">Rata2 Suhu (°C)</label>
										<input type="number" class="form-control" id="ratasuhu" name="ratasuhu" value="0.00" min="0.00" max="100.00" step="0.01" placeholder="Suhu Ahkir(°C)">
									</div>
								</div>
								<div class="col-md-2" id="">

									<div class="mb-3">
										<label class="form-label" for="ratakelembaban">Rata Kelembaban </label>
										<input type="number" class="form-control" id="ratakelembaban" name="ratakelembaban" placeholder="Kelembaban Ahkir (%)">
									</div>
								</div>

								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="rataberatair">Rata Berat Air </label>
										<input type="number" class="form-control" id="rataberatair" name="rataberatair" placeholder="Rata Berat Air ">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="ratav20">Rata V20 </label>
										<input type="number" class="form-control" id="ratav20" name="ratav20" placeholder="Rata V20 ">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="ratasuhuakuades">Rata Suhu Akuades ( °C ) </label>
										<input type="number" class="form-control" id="ratasuhuakuades" name="ratasuhuakuades" placeholder="Rata Suhu Akuades ( °C ) ">
									</div>
								</div>
								<div class="col-md-2" id="">

									<div class="mb-3">
										<label class="form-label" for="maxsuhu">Max Suhu </label>
										<input type="number" class="form-control" id="maxsuhu" name="maxsuhu" placeholder="Max Suhu  ">
									</div>
								</div>
								<div class="col-md-2" id="">

									<div class="mb-3">
										<label class="form-label" for="minsuhu">Min Suhu </label>
										<input type="number" class="form-control" id="minsuhu" name="minsuhu" placeholder="Min Suhu ">
									</div>
								</div>


								<div class="col-md-2" id="">

									<div class="mb-3">
										<label class="form-label" for="vn">Volume Nominal</label>
										<input type="number" class="form-control" id="vn" name="vn" placeholder="vn">
									</div>
								</div>
								<div class="col-md-2" id="">

									<div class="mb-3">
										<label class="form-label" for="koreksi">Koreksi</label>
										<input type="number" class="form-control" id="koreksi" name="koreksi" placeholder="Koreksi">
									</div>
								</div>

								<div class="col-md-2" id="">

									<div class="mb-3">
										<label class="form-label" for="stddev_pop">stddev_pop</label>
										<input type="number" class="form-control" id="stddev_pop" name="stddev_pop" placeholder="stddev_pop">
									</div>
								</div>


								<div class="col-md-2" id="">

									<div class="mb-3">
										<label class="form-label" for="ketidakpastian">Ketidakpastian</label>
										<input type="number" class="form-control" id="ketidakpastian" name="ketidakpastian" placeholder="Ketidakpastian">
									</div>
								</div>

								<div class="col-md-2 " id="">

									<div class="pt-4">
										<button type="button" id="btnInputKetidakpastian" name="btnInputKetidakpastian" onclick="IsiDataKetidakpastian()" class="btn btn-primary">Hitung Ketidakpastian</button>
									</div>
								</div>

							</div>
						</div>
						<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

							<div class="row  border border-primary p-2 mt-2" border="1" id="master_rumus">

								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="RhoAT">ρAT (massa jenis Anak Timbang)</label>
										<input type="number" class="form-control" id="RhoAT" name="RhoAT" placeholder="RhoAT" value="7.78">
									</div>
								</div>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="RhoW">ρW (massa jenis Water)</label>
										<input type="number" class="form-control" id="RhoW" name="RhoW" placeholder="RhoW" value="0.998202">
									</div>
								</div>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="RhoA">ρA (massa jenis Air/Udara)</label>
										<input type="number" class="form-control" id="RhoA" name="RhoA" placeholder="RhoA" value="0.0012">
									</div>
								</div>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="y">ϒ (Koefisien Ekspansi Kubik) </label>
										<input type="number" class="form-control" id="Y" name="y" placeholder="y" value="0.00001">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label">Q (Nilai Konversi)</label>
										<input type="number" class="form-control" id="q" name="q" placeholder="Q (Nilai Konversi)" value="1.000013">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="SigmaTimbangan">SigmaTimbangan</label>
										<input type="number" class="form-control" id="SigmaTimbangan" name="SigmaTimbangan" placeholder="SigmaTimbangan" value="0.00003">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="LoPTimb">LoP Timb</label>
										<input type="number" class="form-control" id="LoPTimb" name="LoPTimb" placeholder="LoPTimb" value="0.00014">
									</div>
								</div>

								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="U95">U95 Thermometer</label>
										<input type="number" class="form-control" id="U95" name="U95" placeholder="U95" value="0.6">
									</div>
								</div>

								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="k">K</label>
										<input type="number" class="form-control" id="k" name="k" placeholder="k" value="2">
									</div>
								</div>

							</div>
							<br>
							<div class="row  border border-primary p-2" id="input_ketidakpastian">
								<label class="form-label">1. Kontribusi ketidakpastian baku dari massa air tertimbang</label>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus1a">Hasil μΔR</label>
										<input type="number" class="form-control" id="Rumus1a" name="Rumus1a" placeholder="Hasil μΔR">
									</div>
								</div>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus1b"> Hasil c ΔR</label>
										<input type="number" class="form-control" id="Rumus1b" name="Rumus1b" placeholder="Hasil c ΔR">
									</div>
								</div>
								<label class="form-label">2. Kontribusi ketidakpastian baku dari densitas udara</label>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus2a">μ (ρ_Udara)</label>
										<input type="number" class="form-control" id="Rumus2a" name="Rumus2a" placeholder="μ (ρ_A)" value="0.00069282">
									</div>
								</div>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus2b">c ρ _Udara</label>
										<input type="number" class="form-control" id="Rumus2b" name="Rumus2b" placeholder="c ρ _Udara">
									</div>
								</div>

								<label class="form-label">3. Kontribusi ketidakpastian bku dari densitas air</label>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus3a">μ (ρ_Air)</label>
										<input type="number" class="form-control" id="Rumus3a" name="Rumus3a" placeholder="μ (ρ_Air)" value="0.00005">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus3b">c ρ Air</label>
										<input type="number" class="form-control" id="Rumus3b" name="Rumus3b" placeholder="c ρ _Air">
									</div>
								</div>
								<label class="form-label">4. kontribusi ketidakpastian baku dari densitas acuan</label>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus4a">μ ( ρ AT)</label>
										<input type="number" class="form-control" id="Rumus4a" name="Rumus4a" placeholder="μ (ρ_AT)" value="0.449178509">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus4b">c AT</label>
										<input type="number" class="form-control" id="Rumus4b" name="Rumus4b" placeholder="c AT">
									</div>
								</div>

								<label class="form-label">5. kontribusi ketidakpastian baku dari temperatur</label>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus5a">μ (t)</label>
										<input type="number" class="form-control" id="Rumus5a" name="Rumus5a" placeholder="μ (t)">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus5b">c t</label>
										<input type="number" class="form-control" id="Rumus5b" name="Rumus5b" placeholder="c t">
									</div>
								</div>
								<label class="form-label">6. kontribusi ketidakpastian baku dari koefisien muai volume</label>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus6a">μ ( y )</label>
										<input type="number" class="form-control" id="Rumus6a" name="Rumus6a" placeholder="μ (ρ_A)" value="0.00000057735">
									</div>
								</div>
								<div class="col-md-2" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus6b">c ( y )</label>
										<input type="number" class="form-control" id="Rumus6b" name="Rumus6b" placeholder="c ( y )">
									</div>
								</div>

								<label class="form-label">7. kontribusi ketidakpastian baku dari pengaturan meniskus (daya ulang sistem kalibrasi)</label>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus7a">μ Meniskus</label>
										<input type="number" class="form-control" id="Rumus7a" name="Rumus7a" placeholder="μ Meniskus">
									</div>
								</div>

								<label class="form-label">8. ketidakpastian baku gabungan </label>
								<div class="col-md-3" id="">
									<div class="mb-3">
										<label class="form-label" for="Rumus8a">μ v20</label>
										<input type="number" class="form-control" id="Rumus8a" name="Rumus8a" placeholder="μ v20">
									</div>
								</div>
								<label class="form-label"></label>


							</div>

						</div>

					</div>
				</form>

			</div>
			<div class="modal-footer">
				<!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button> -->
				<button type="button" id="btnSaveBaru" onclick="SaveBaru()" class="btn btn-primary">Simpan</button>
				<button type="button" id="btnSaveKalibrasi" onclick="SaveKalibrasi()" class="btn btn-primary">Mulai Kalibrasi</button>
				<button type="button" id="btnSaveKalibrasiSelesai" onclick="SaveKalibrasiSelesai()" class="btn btn-primary">Selesai Kalibrasi</button>

				<button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="HideMenuEditAja()">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
</body>

</html>