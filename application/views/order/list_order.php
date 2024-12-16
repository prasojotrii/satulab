<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content" id="miniaresult">

	<div class="page-content">
		<div class="container-fluid">
			<!-- <div class="row" id="info_hak_akses" style="display: none;">
				<div class="col-md-1">
					<label class="form-label" for="id_user">Id User</label>
					<input type="text" class="form-control" id="id_user" name="id_user" value="<?= $dataSession['id_user']; ?>">
				</div>
				<div class="col-md-2">
					<label class="form-label" for="info_halaman">Info Halaman</label>
					<input type="text" class="form-control" id="info_halaman" name="info_halaman" value="<?= $id_halaman ?>">
				</div>
				<div class="col-md-2">
					<label class="form-label" for="info_penyelia">Nama Penyelia</label>
					<input type="text" class="form-control" id="info_penyelia" name="info_penyelia" placeholder="Nama Pemesan" value="<?= $dataSession['penyelia']; ?>">
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
			</div> -->
			<!-- <div>
						Toggle column: <a class="toggle-vis" data-column="0">Name</a> - <a class="toggle-vis" data-column="1">Position</a> - <a class="toggle-vis" data-column="2">Office</a> - <a class="toggle-vis" data-column="3">Age</a> - <a class="toggle-vis" data-column="4">Start date</a> - <a class="toggle-vis" data-column="5">Salary</a>
					</div> -->
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Daftar Order Internal</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="supervisor-tab" data-bs-toggle="tab" data-bs-target="#supervisor" type="button" role="tab" aria-controls="supervisor" aria-selected="false">Menunggu Persetujuan Supervisor</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button" role="tab" aria-controls="admin" aria-selected="false">Review Admin Laboratorium</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Menunggu Persetujuan Ka Unit</button>
				</li>

			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

					<div class="card">
						<div class="card-header">

							<div class="row align-items-center">
								<div class="col-md-6" style="text-align: left">
									<h2 class="mb-sm-0 font-size-32">Daftar Order Internal</h2>
								</div>

								<div class="col-md-6">
									<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

										<div>
											<a id="button_create" class="btn btn-primary" onclick="Fungsi_Tambah_Instrumen()"><i class="bx bx-plus me-1"></i>Buat Tiket Order</a>
											<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
										</div>


									</div>

								</div>
							</div>


						</div>
						<div class="card-body">
							<table id="tabel_order" class="table table-hover nowrap w-100">
								<thead style="text-align: center">
									<tr>
										<th width="1px">#</th>
										<th width="1px">No</th>
										<th width="1px">Urgent</th>
										<th width="1px">Status</th>
										<th width="10px">Id Order</th>
										<th width="10px">Id Batch</th>

										<th width="10px">Kategori</th>
										<th>Nama Barang </th>
										<th width="10px">Merek</th>
										<th width="10px">Spesifikasi / No Katalog</th>
										<th width="10px">Kapasitas</th>
										<th width="10px">Tipe</th>
										<th width="10px">Grade</th>
										<th width="10px">Jumlah</th>
										<th width="10px">Satuan</th>
										<th width="10px">Nama PIC</th>
										<th width="1px">Lokasi</th>
										<th width="10px">Tanggal Input</th>
										<th width="10px">Tanggal Datang</th>

										<th width="10px">Penawaran</th>
										<th width="10px">No PR</th>
										<th width="10px">No PO</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="supervisor" role="tabpane3" aria-labelledby="supervisor-tab">
					<div class="card">
						<div class="card-header">
							<h2 class="mb-sm-0 font-size-32"> Menunggu Persetujuan Supervisor</h2>
							<!-- <div class="float-end">
										<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
									</div> -->
						</div>

						<div class="card-body">
							<table id="tabel_order_persetujuan_spv" class="table table-hover nowrap w-100 ">
								<thead style="text-align: center">
									<tr>
										<th>#</th>
										<th>No</th>
										<th>Id Order</th>
										<th>Id Tiket</th>
										<th style="text-align: center">Tanggal Input</th>
										<th>Kategori</th>
										<th>Nama Barang </th>
										<th>Merek</th>
										<th>Jumlah</th>
										<th>Satuan</th>
										<th>Nama PIC</th>
										<th>Keterangan</th>
										<th style="text-align: center">Supervisor</th>
										<th style="text-align: center">Status</th>
										<th>Tanggal Datang</th>
										<th>Urgent</th>
										<th>Penawaran</th>
										<th>No PR</th>
										<th>No PO</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
					<div class="card">
						<div class="card-header">
							<h2 class="mb-sm-0 font-size-32"> Menunggu Review Admin Laboratorium</h2>
						</div>
						<div class="card-body">
							<table id="tabel_order_admin" class="table table-hover nowrap w-100">
								<thead>
									<tr style="text-align: center">
										<th>#</th>
										<th>No</th>
										<th>Id Order</th>
										<th>Id Batch</th>
										<th style="text-align: center">Tanggal Input</th>
										<th>Kategori</th>
										<th>Nama Barang </th>
										<th>Merek</th>
										<th>Jumlah</th>
										<th>Satuan</th>
										<th>Nama PIC</th>
										<th>Keterangan</th>

										<th style="text-align: center">Supervisor</th>
										<th style="text-align: center">Status</th>
										<th>Tanggal Datang</th>
										<th>Urgent</th>
										<th>Penawaran</th>
										<th>No PR</th>
										<th>No PO</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="card">
						<div class="card-header">
							<h2 class="mb-sm-0 font-size-32"> Menunggu Persetujuan Ka Unit</h2>
						</div>
						<div class="card-body">
							<table id="tabel_order_persetujuan" class="table table-hover nowrap w-100">
								<thead>
									<tr style="text-align: center">
										<th>#</th>
										<th>No</th>
										<th>Id Order</th>
										<th>Id Batch</th>
										<th style="text-align: center">Tanggal Input</th>
										<th>Kategori</th>
										<th>Nama Barang </th>
										<th>Merek</th>
										<th>Jumlah</th>
										<th>Satuan</th>
										<th>Nama PIC</th>
										<th>Keterangan</th>

										<th style="text-align: center">Supervisor</th>
										<th style="text-align: center">Status</th>
										<th>Tanggal Datang</th>
										<th>Urgent</th>
										<th>Penawaran</th>
										<th>No PR</th>
										<th>No PO</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end col -->
	</div> <!-- end row -->
</div>
</div>






<!-- end main content-->

</div>
<!-- END layout-wrapper -->




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
		(document.body.getAttribute('data-sidebar-size') == "sm") ? document.body.setAttribute('data-sidebar-size', 'sm'): document.body.setAttribute('data-sidebar-size', 'sm')

		$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();

		// CekAksesUser();
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
			"bDestroy": true,
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
				[4, 'desc'],


			],

			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_order_term') ?>",
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
					'targets': [0, 5, 11, 12, 14, 16, 17, 18, 19, 20, 21]
				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [3], // your case first column
					"className": "text-center",

				},
				// {
				// 	"targets": 4,
				// 	"className": 'dt-body-right'
				// },

				{
					"targets": 3,
					// "createdCell": function(td, cellData, rowData, row, col) {
					// 	$(td).css('padding', '122px')
					// },

					"render": function(data, type, row) {
						var html = ""


						if (data == 1) {
							html = "<span class='badge bg-info '>Menunggu Persetujuan Supervisor</span>"
						} else if (data == 2) {
							html = "<span class='badge bg-primary '>Diproses Admin SAP</span>"
						} else if (data == 3) {
							html = "<span class='badge bg-info '>Menunggu Persetujuan Ka Unit</span>"
						} else if (data == 4) {
							html = "<span class='badge bg-primary '>Diproses Admin SAP</span>"

						} else if (data == 5) {
							html = "<span class='badge bg-primary'>Menunggu Penawaran</span>"

						} else if (data == 6) {
							html = "<span class='badge bg-info'>Unit Seleksi Penawaran</span>"

						} else if (data == 7) {
							html = "<span class='badge bg-primary '>Menunggu Persetujuan Direktur</span>"

						} else if (data == 8) {
							html = "<span class='badge bg-primary'>Pembuatan PR</span>"

						} else if (data == 9) {
							html = "<span class='badge bg-primary'>Input No PO</span>"

						} else if (data == 10) {
							html = "<span class='badge bg-dark '>Proses Pembelian</span>"
						} else if (data == 11) {
							html = "<span class='badge bg-warning '>Diterima Sebagian</span>"
						} else if (data == 12) {
							html = "<span class='badge bg-success '>Barang Diterima</span>"
						} else if (data == 19) {
							html = "<span class='badge bg-warning '>Orderan Ditunda</span>"

						} else if (data == 20) {
							html = "<span class='badge bg-danger '>Orderan Dibatalkan</span>"

						} else if (data == 0) {
							html = "<span class='badge bg-success '>Dinput User</span>"

						} else {
							html = "<span class='badge bg-dark'>-</span>"

						}
						return html;
					},

				},

				{
					"targets": 2,
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
					"targets": 19,
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

		var table2 = $('#tabel_order_baru').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true,
			"bDestroy": true,
			// "scrollX": "500px",

			// "bInfo": false, //Feature control DataTables' server-side processing mode.
			// "lengthMenu": [
			// 	[10, 25, 50, -1],
			// 	['10', '25', '50', 'Semua']
			// ],
			"oLanguage": {
				"sLengthMenu": "<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>Tampilkan :<a>&nbsp;&nbsp;&nbsp;</a>_MENU_ ",
				"sSearch": "Cari :",
			},

			// "dom": '',
			// "search": {
			// 	"visible": true
			// },
			// "aoColumns": [],
			"dom": 'Blfrtp',
			"buttons": [{
				extend: 'excel',
				text: 'Excel',
				exportOptions: {
					columns: ':visible:not()'
				}
			}],
			"order": [

				[3, 'desc'],
			], //Initial no order.

			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_order_baru_user') ?>",
				"type": "POST",

				"data": function(data) {
					data.id_order_unit = $('#id_order_unit').val();
					data.id_status = $('#id_status').val();
					data.id_order_tiket = $('#id_order_tiket').val();
					data.id_batch = $('#id_batch').val();
					data.nama = $('#nama').val();
				}
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
				{
					'visible': false,
					'targets': [0, 3, 4, 5, 14, 16, 17, 18, 19, 20, 21, 22]
				},
				{
					"targets": 2,

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

			]

		});

		var info_penyelia = $('#info_penyelia').val();

		var table3 = $('#tabel_order_persetujuan_spv').DataTable({


			"processing": true, //Feature control the processing indicator.
			"serverSide": true,
			"bDestroy": true,
			// "responsive": true, //Feature control DataTables' server-side processing mode.
			// "bInfo": false, //Feature control DataTables' server-side processing mode.
			// "scrollX": true,

			"lengthMenu": [
				[15, 25, 50, -1],
				['15', '25', '50', 'Semua']
			],

			"search": {
				"search": info_penyelia
			},

			//Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source

			"oLanguage": {
				"sLengthMenu": "<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>Tampilkan :<a>&nbsp;&nbsp;&nbsp;</a>_MENU_ ",
				"sSearch": "Cari :",
			},
			// 	"sSearch": "Cari :",
			// },
			"dom": 'lfrtip',
			// "buttons": [{
			// 	extend: 'excel',
			// 	text: 'Excel',
			// 	exportOptions: {
			// 		columns: ':visible:not(:eq(0))'
			// 	}
			// }],
			"order": [
				[3, 'asc'],


			],

			"initComplete": function(settings, json) {
				$("#tabel_order_persetujuan_spv").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
			},
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_order_persetujuan') ?>",
				"type": "POST"
			},
			"columns": [{
					"width": "1%"
				},
				{
					"width": "1%"
				}, {
					"width": "1%"
				},
				null,
				null
			],
			"columnDefs": [{

					"targets": '_all',

					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '3px')
					}
				},

				{
					'visible': false,
					'targets': [0, 2, 5, 6, 7, 8, 9, 10, 11, 14, 15, 16, 17, 18]
				},
				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [1, 3, 4, 12, 13], // your case first column
					"className": "text-center",

				},

				{
					"targets": 13,
					// "className": "text-center",

					"render": function(data, type, row) {
						var html = ""
						if (data == 0) {
							html = "<span class='badge bg-info '>Orderan Diinput User </span>"
						} else if (data == 1) {
							html = "<span class='badge bg-info '>Menunggu Persetujuan Supervisor</span>"
						} else if (data == 2) {
							html = "<span class='badge bg-warning '>Diproses Admin Laboratorium</span>"
						} else if (data == 3) {
							html = "<span class='badge bg-info '>Menunggu Persetujuan Ka Unit</span>"
						} else if (data == 4) {
							html = "<span class='badge bg-primary '>Disetujui Ka Unit</span>"
						} else if (data == 5) {
							html = "<span class='badge bg-primary'>Menunggu Penawaran</span>"
						} else if (data == 6) {
							html = "<span class='badge bg-info'>Unit Seleksi Penawaran</span>"
						} else if (data == 7) {
							html = "<span class='badge bg-primary '>Menunggu Persetujuan Direktur</span>"
						} else if (data == 8) {
							html = "<span class='badge bg-primary'>Pembuatan PR</span>"
						} else if (data == 9) {
							html = "<span class='badge bg-primary'>Input No PO</span>"
						} else if (data == 10) {
							html = "<span class='badge bg-dark '>Proses Pembelian</span>"
						} else if (data == 11) {
							html = "<span class='badge bg-warning '>Diterima Sebagian</span>"
						} else if (data == 12) {
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

		var table4 = $('#tabel_order_admin').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"bDestroy": true,
			// "bInfo": false, //Feature control DataTables' server-side processing mode.
			// "scrollX": true,
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
			"dom": 'lfrtip',
			// "buttons": [{
			// 	extend: 'excel',
			// 	text: 'Excel',
			// 	exportOptions: {
			// 		columns: ':visible:not(:eq(0))'
			// 	}
			// }],
			"order": [
				[13, 'asc'],
				[11, 'asc'],
				[2, 'asc']

			],
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_order_persetujuan_admin') ?>",
				"type": "POST"
			},
			"columns": [{
					"width": "1%"
				},
				{
					"width": "1%"
				}, {
					"width": "1%"
				},
				null,
				null
			],
			"initComplete": function(settings, json) {
				$("#tabel_order_admin").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
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
					'targets': [0, 2, 5, 6, 7, 8, 9, 10, 11, 12, 14, 15, 16, 17, 18]
				},
				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [1, 3, 4, 12, 13], // your case first column
					"className": "text-center",

				},

				{
					"targets": 13,
					// "data": null,

					// "className": "text-center",

					"render": function(data, type, row) {
						var html = ""


						if (data == 1) {
							html = "<span class='badge bg-info '>Menunggu Persetujuan Supervisor</span>"
						} else if (data == 2) {
							html = "<span class='badge bg-warning '>Diproses Admin Laboratorium</span>"
						} else if (data == 3) {
							html = "<span class='badge bg-info '>Menunggu Persetujuan Ka Unit</span>"
						} else if (data == 4) {
							html = "<span class='badge bg-primary '>Disetujui Ka Unit</span>"

						} else if (data == 5) {
							html = "<span class='badge bg-primary'>Menunggu Penawaran</span>"

						} else if (data == 6) {
							html = "<span class='badge bg-info'>Unit Seleksi Penawaran</span>"

						} else if (data == 7) {
							html = "<span class='badge bg-primary '>Menunggu Persetujuan Direktur</span>"

						} else if (data == 8) {
							html = "<span class='badge bg-primary'>Pembuatan PR</span>"

						} else if (data == 9) {
							html = "<span class='badge bg-primary'>Input No PO</span>"

						} else if (data == 10) {
							html = "<span class='badge bg-dark '>Proses Pembelian</span>"
						} else if (data == 11) {
							html = "<span class='badge bg-warning '>Diterima Sebagian</span>"
						} else if (data == 12) {
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

		var table5 = $('#tabel_order_persetujuan').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"bDestroy": true,
			// "bInfo": false, //Feature control DataTables' server-side processing mode.
			// "scrollX": true,
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
			"dom": 'lfrtip',
			// "buttons": [{
			// 	extend: 'excel',
			// 	text: 'Excel',
			// 	exportOptions: {
			// 		columns: ':visible:not(:eq(0))'
			// 	}
			// }],
			"order": [
				[13, 'asc'],
				[11, 'asc'],
				[2, 'asc']

			],
			"columns": [{
					"width": "1%"
				},
				{
					"width": "1%"
				}, {
					"width": "1%"
				},
				null,
				null
			],
			"initComplete": function(settings, json) {
				$("#tabel_order_persetujuan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
			},
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_order_persetujuan_ka_unit') ?>",
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
					'targets': [0, 2, 5, 6, 7, 8, 9, 10, 11, 12, 14, 15, 16, 17, 18]
				},
				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				},

				{
					"targets": [1, 3, 4, 12, 13], // your case first column
					"className": "text-center",
				},

				{
					"targets": 13,
					// "data": null,

					"className": "text-center",

					"render": function(data, type, row) {
						var html = ""
						if (data == 1) {
							html = "<span class='badge bg-info '>Menunggu Persetujuan Supervisor</span>"
						} else if (data == 2) {
							html = "<span class='badge bg-warning '>Diproses Admin Laboratorium</span>"
						} else if (data == 3) {
							html = "<span class='badge bg-info '>Menunggu Persetujuan Ka Unit</span>"
						} else if (data == 4) {
							html = "<span class='badge bg-primary '>Disetujui Ka Unit</span>"

						} else if (data == 5) {
							html = "<span class='badge bg-primary'>Sudah Disetujui Ka Unit</span>"

						} else if (data == 6) {
							html = "<span class='badge bg-info'>Unit Seleksi Penawaran</span>"

						} else if (data == 7) {
							html = "<span class='badge bg-primary '>Menunggu Persetujuan Direktur</span>"

						} else if (data == 8) {
							html = "<span class='badge bg-primary'>Pembuatan PR</span>"

						} else if (data == 9) {
							html = "<span class='badge bg-primary'>Input No PO</span>"

						} else if (data == 10) {
							html = "<span class='badge bg-dark '>Proses Pembelian</span>"
						} else if (data == 11) {
							html = "<span class='badge bg-warning '>Diterima Sebagian</span>"
						} else if (data == 12) {
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

		var table6 = $('#tabel_penawaran').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.

			// "dom": '',
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_penawaran') ?>",
				"type": "POST",
			},
			"order": [
				[3, 'asc'],


			],
			"dom": '',
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
		var table7 = $('#tabel_penawaran2').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			// "dom": '',
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_penawaran') ?>",
				"type": "POST",
			},
			"order": [
				[3, 'asc'],


			],
			"dom": '',
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

	});

	$('#min, #max').keyup(function() {
		table.ajax.reload();


	});

	// $("#profile-tab").click(function() {
	// 	$($.fn.dataTable.tables(true)).DataTable()
	// 		.columns.adjust();
	// 	// $('#tabel_order_persetujuan').DataTable().ajax.reload();
	// });

	function BenerinHeader() {
		$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();
	}

	function unFilterHeader() {


		// tabel_order_baru.column(0).visible(false);
		$('#tabel_order_baru').DataTable().column(0).visible(true);
		$('#tabel_order_baru').DataTable().ajax.reload();
	}

	function FilterByPICstatus() {

		if (document.getElementById('akses_tipe').value != 1) {

			window.location.replace('<?= base_url('dashboard'); ?>');
		}
		if (document.getElementById('akses_create').value != 1) {

			$('#button_create').hide();


		}
		if (document.getElementById('akses_update').value != 1) {

			$('#form_order').hide();
			$('#btnSaveOrder').hide();
			$('#tabel_order_baru').DataTable().column(0).visible(false);
			// $('#button_update').hide();
		}
		if (document.getElementById('akses_delete').value != 1) {
			$('#tabel_order').DataTable().column(0).visible(false);
			$('#tabel_order_persetujuan_spv').DataTable().column(0).visible(false);
			$('#tabel_order_admin').DataTable().column(0).visible(false);
			$('#tabel_order_persetujuan').DataTable().column(0).visible(false);

		}

	}

	function CekAksesUser() {

		if (document.getElementById('akses_read').value != 1) {

			window.location.replace('<?= base_url('dashboard'); ?>');
		}
		if (document.getElementById('akses_create').value != 1) {

			$('#button_create').hide();


		}
		if (document.getElementById('akses_update').value != 1) {

			$('#form_order').hide();
			$('#btnSaveOrder').hide();
			$('#tabel_order_baru').DataTable().column(0).visible(false);
			// $('#button_update').hide();
		}
		if (document.getElementById('akses_delete').value != 1) {
			$('#tabel_order').DataTable().column(0).visible(false);
			$('#tabel_order_persetujuan_spv').DataTable().column(0).visible(false);
			$('#tabel_order_admin').DataTable().column(0).visible(false);
			$('#tabel_order_persetujuan').DataTable().column(0).visible(false);

		}

		if (document.getElementById('akses_tipe').value != 'SysAdmin') {

			$('#Halaman_Sysadmin').hide();


		}



	}

	function FilterHeader() {


		// tabel_order_baru.column(0).visible(false);
		$('#tabel_order_baru').DataTable().column(0).visible(true);
		$('#tabel_order_baru').DataTable().ajax.reload();
	}

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

		$('#tabel_order_baru').DataTable().columns.adjust();
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
		$('#form2')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty();
		// clear error string

		$('#modal_input').modal('show');

		document.getElementById('id_status').value = 1;
		$('.modal-title').text('Input Form Order '); // Set Title to Bootstrap modal title
		$('#btnSimpan').show();
		$('#input_order').show();
		$('#input_tambahan').hide();
		// $('#tabel_persetujuan_order_spv').hide();
		// $('#tabel_persetujuan_order').show();
		$('#form_order').show();
		// $('#tabel_order_baru').DataTable().search(
		// 	document.getElementById('id_order_unit').value
		// ).draw();

		// $('.dataTables_scrollHeadInner, .dataTable').css({
		// 	'width': '100%'
		// })
		$('#btnDisetujui').hide();
		$('#btnPersetujuanSpv').show();
		$('#btnKirimAdmin').hide();
		$('#btnPersetujuanKaUnit').hide();
		$('#btnSaveOrder').show();
		// $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		// $('#tabel_order').DataTable().ajax.reload();
		// $('#tabel_order_persetujuan').DataTable().ajax.reload();
		// $('#tabel_order_admin').DataTable().ajax.reload();
		// $('#tabel_order_persetujuan_spv').DataTable().ajax.reload();
		// $('#tabel_order_baru').DataTable().ajax.reload();

		// FilterByPersetujuan();
		unFilterHeader();
		FilterByKategori();
		document.getElementById('id_batch').value = '';
		document.getElementById('keterangan').value = '<?= $dataSession['sub_laboratorium']; ?>';
		// reload_table();
		$('#tabel_order_baru').DataTable().ajax.reload();
		// $('#tabel_order_baru').DataTable().columns.adjust();


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

		a = document.getElementById('nama_barang').value;
		b = document.getElementById('kategori_barang').value;
		if (a == '') {

			Swal.fire({
				title: 'Nama Barang belum terisi',
				text: "Pastikan sudah terisi!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',

				confirmButtonText: 'Okay'
			})


		} else if (b == '') {

			Swal.fire({
				title: 'Kategori barang belum terisi',
				text: "Pastikan sudah terisi!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',

				confirmButtonText: 'Okay'
			})


		} else {
			var url;

			if (save_method == 'add') {

				url = "<?php echo site_url('sysadmin/Tambah_order_baru') ?>";


			} else if (save_method == 'update') {
				url = "<?php echo site_url('sysadmin/Update_Order_Baru') ?>";

			}

			// ajax adding data to database
			$.ajax({
				url: url,
				type: "POST",
				data: $('#form2').serialize(),
				dataType: "JSON",
				success: function(data) {

					if (data.status) //if success close modal and reload ajax table
					{

						// $('#modal_form').modal('hide');
						$('#tabel_order_baru').DataTable().ajax.reload();
						// $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
						// reload_table();
						save_method = 'add';
						// $('#form2')[0].reset();
						// $('#tambahan_glassware').show();
						// reload_table_dan_page();
						$('#kategori_barang').val('');
						$('#nama_barang').val('');
						$('#spesifikasi').val('');
						$('#ukuran').val('');
						$('#type').val('');
						$('#grade').val('');
						$('#jumlah').val('1');
						$('#brand').val('');
						$('#ukuran_satuan').val('');
						// $('#keterangan').val('');

					}


					$('#btnSaveOrder').attr('disabled', false); //set button enable 
					$('#form')[0].reset(); // reset form on modals
					$('.form-group').removeClass('has-error'); // clear error class
					$('.help-block').empty();

				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Pastikan semua sudah terisi !');

					$('#btnSaveOrder').attr('disabled', false); //set button enable 

				}
			});
		}



	}



	function saveDisetujui() {

		Swal.fire({
			title: 'Kirim pemberitahuan ke Admin SAP',
			text: "Sistem akan menggirim email ke Admin SAP",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Kirim',
			allowOutsideClick: () => !Swal.isLoading(),
			preConfirm: () => {
				var url;
				if (save_method == 'add') {
					url = "<?php echo site_url('sysadmin/Update_disetujui_Kaunit') ?>";

				} else {
					url = "<?php echo site_url('sysadmin/Update_disetujui_Kaunit') ?>";
				}

				// ajax adding data to database
				$.ajax({
					url: url,
					type: "POST",
					data: $('#form2').serialize(),
					dataType: "JSON",
					success: function(data) {

						if (data.status) //if success close modal and reload ajax table
						{

							// $('#modal_input').modal('hide');
							// $('#tabel_order').DataTable().ajax.reload();
							// $('#tabel_order_persetujuan').DataTable().ajax.reload();
							// $('#tabel_order_admin').DataTable().ajax.reload();
							// $('#tabel_order_persetujuan_spv').DataTable().ajax.reload();


							// $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
							reload_table();

							location.reload();
						}


					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Pastikan semua sudah terisi !');
						$('#btnDisetujui').text('Simpan'); //change button text
						$('#btnDisetujui').attr('disabled', false); //set button enable 

					}
				});
			},

		}).then((result) => {
			if (result.isConfirmed) {

				let timerInterval
				Swal.fire({
					title: 'Proses mengirim email!',
					html: 'Mohon Ditunggu <b></b> ',
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

	function KirimPenawaran() {
		Swal.fire({
			title: 'Kirim penawaran ke Unit',
			text: "Sistem akan menggirim email ke unit",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Kirim',
			allowOutsideClick: () => !Swal.isLoading(),
			preConfirm: () => {
				$('#btnSimpan').text('saving...'); //change button text
				$('#btnSimpan').attr('disabled', true); //set button disable 


				var url;

				if (save_method == 'add') {

					url = "<?php echo site_url('sysadmin/Tambah_order_persetujuan') ?>";
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
							// $('#tabel_order_persetujuan').DataTable().ajax.reload();
							location.reload();
						}




					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error adding / update data');


					}
				});
			},

		}).then((result) => {
			if (result.isConfirmed) {

				let timerInterval
				Swal.fire({
					title: 'Proses mengirim email!',
					html: 'Mohon Ditunggu <b></b> ',
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

	function MintaPersetujuanSupervisor() {
		Swal.fire({
			title: 'Kirim permintaan persetujuan Supervisor',
			text: "Sistem akan menggirim email permintaan persetujuan",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Kirim',
			allowOutsideClick: () => !Swal.isLoading(),
			preConfirm: () => {
				$('#btnSimpan').text('saving...'); //change button text
				$('#btnSimpan').attr('disabled', true); //set button disable 


				var url;

				url = "<?php echo site_url('sysadmin/Tambah_order_persetujuan_Supervisor') ?>";


				// ajax adding data to database
				$.ajax({
					url: url,
					type: "POST",
					data: $('#form2').serialize(),
					dataType: "JSON",
					success: function(data) {

						if (data.status) //if success close modal and reload ajax table
						{

							$('#modal_input').modal('hide');
							$('#tabel_order_persetujuan').DataTable().ajax.reload();
							$('#tabel_order_admin').DataTable().ajax.reload();
							$('#tabel_order_persetujuan_spv').DataTable().ajax.reload();;
							location.reload();
						}

						$('#btnSimpan').text('Simpan'); //change button text
						$('#btnSimpan').attr('disabled', false); //set button enable 


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
					html: 'Mohon Ditunggu <b></b> ',
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

	function MintaPersetujuanAdmin() {
		Swal.fire({
			title: 'Kirim permintaan ke Admin Laboratorium',
			text: "Sistem akan menggirim email permintaan persetujuan",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Kirim',
			allowOutsideClick: () => !Swal.isLoading(),
			preConfirm: () => {
				$('#btnSimpan').text('saving...'); //change button text
				$('#btnSimpan').attr('disabled', true); //set button disable 


				var url;

				if (save_method == 'add') {

					url = "<?php echo site_url('sysadmin/Tambah_order_persetujuan_admin') ?>";


				} else {
					url = "<?php echo site_url('sysadmin/Update_Order') ?>";

				}

				// ajax adding data to database
				$.ajax({
					url: url,
					type: "POST",
					data: $('#form2').serialize(),
					dataType: "JSON",
					success: function(data) {

						if (data.status) //if success close modal and reload ajax table
						{

							$('#modal_input').modal('hide');
							$('#tabel_order_persetujuan').DataTable().ajax.reload();
							$('#tabel_order_admin').DataTable().ajax.reload();
							$('#tabel_order_persetujuan_spv').DataTable().ajax.reload();
							// location.reload();
						}

						$('#btnSimpan').text('Simpan'); //change button text
						$('#btnSimpan').attr('disabled', false); //set button enable 


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
					html: 'Mohon Ditunggu <b></b> ',
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

	function MintaPersetujuanKaUnit() {
		Swal.fire({
			title: 'Kirim permintaan ke Ka Unit',
			text: "Sistem akan menggirim email permintaan persetujuan",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Kirim',
			allowOutsideClick: () => !Swal.isLoading(),
			preConfirm: () => {
				$('#btnSimpan').text('saving...'); //change button text
				$('#btnSimpan').attr('disabled', true); //set button disable 


				var url;

				if (save_method == 'add') {

					url = "<?php echo site_url('sysadmin/Tambah_order_persetujuan_KaUnit') ?>";


				} else {
					url = "<?php echo site_url('sysadmin/Update_Order') ?>";

				}

				// ajax adding data to database
				$.ajax({
					url: url,
					type: "POST",
					data: $('#form2').serialize(),
					dataType: "JSON",
					success: function(data) {

						if (data.status) //if success close modal and reload ajax table
						{

							$('#modal_input').modal('hide');
							$('#tabel_order_persetujuan').DataTable().ajax.reload();
							$('#tabel_order_admin').DataTable().ajax.reload();
							$('#tabel_order_persetujuan_spv').DataTable().ajax.reload();
							location.reload();
						}

						$('#btnSimpan').text('Simpan'); //change button text
						$('#btnSimpan').attr('disabled', false); //set button enable 


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
					html: 'Mohon Ditunggu <b></b> ',
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

		a = document.getElementById('nama_supplier').value;
		b = document.getElementById('input_penawaran').value;
		if (a == '') {

			Swal.fire({
				title: 'Nama supplier belum terisi',
				text: "Pastikan sudah terisi!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',

				confirmButtonText: 'Okay'
			})


		} else if (b == '') {

			Swal.fire({
				title: 'File penawaran belum terisi',
				text: "Pastikan sudah terisi!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',

				confirmButtonText: 'Okay'
			})

		} else {
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

				var data = document.getElementById("info_status_order").value;
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
					url = "<?php echo site_url('sysadmin/Update_Order_Status_nopo') ?>";
				} else if (data == 10) {
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
					html: 'Mohon Ditunggu <b></b> ',
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

		// $('#btnsaveUpdateProses').text('saving...'); //change button text
		// $('#btnsaveUpdateProses').attr('disabled', true); //set button disable 

		var data = document.getElementById("id_status_order").value;
		var url;
		if (data == 2) {
			url = "<?php echo site_url('sysadmin/Update_Order_Status2') ?>";
		} else if (data == 3) {
			url = "<?php echo site_url('sysadmin/Update_Order_Status3') ?>";

		} else if (data == 5) {
			url = "<?php echo site_url('sysadmin/Update_Order_Status4') ?>";

		} else if (data == 6) {

			Swal.fire({
				title: 'Kirim penawaran ke Unit',
				text: "Sistem akan menggirim email ke unit",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#7a7fdc',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Kirim',
				allowOutsideClick: () => !Swal.isLoading(),
				preConfirm: () => {
					$('#btnSimpan').text('saving...'); //change button text
					$('#btnSimpan').attr('disabled', true); //set button disable 


					var url;

					url = "<?php echo site_url('sysadmin/Update_Order_Status5') ?>";

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

							$('#btnSimpan').text('Simpan'); //change button text
							$('#btnSimpan').attr('disabled', false); //set button enable 


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
						html: 'Mohon Ditunggu <b></b> ',
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
		} else if (data == 7) {
			var namabarang = document.getElementById("info_namabarang").value;

			if (namabarang == '') {

				Swal.fire({
					title: 'Nama Barang belum terisi',
					text: "Pastikan sudah terisi!",
					icon: 'warning',
					confirmButtonColor: '#3085d6',

					confirmButtonText: 'Okay'
				})


			} else {
				url = "<?php echo site_url('sysadmin/Update_Order_Status6') ?>";
			}


		} else if (data == 8) {
			url = "<?php echo site_url('sysadmin/Update_Order_Status7') ?>";
		} else if (data == 9) {
			url = "<?php echo site_url('sysadmin/Update_Order_Status8') ?>";
		} else if (data == 10) {
			url = "<?php echo site_url('sysadmin/Update_Order_Status_nopo') ?>";
		} else if (data == 11) {
			url = "<?php echo site_url('sysadmin/Update_Order_Status10') ?>";
		} else if (data == 12) {
			url = "<?php echo site_url('sysadmin/Update_Order_Status11') ?>";
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

				$('#btnsaveUpdateProses').text('Simpan'); //change button text
				$('#btnsaveUpdateProses').attr('disabled', false); //set button enable 


			},
			// error: function(jqXHR, textStatus, errorThrown) {
			// 	alert('Error adding / update data');
			// 	$('#btnsaveUpdateProses').text('Simpan'); //change button text
			// 	$('#btnsaveUpdateProses').attr('disabled', false); //set button enable 

			// }
		});
	}

	function reload_table_dan_page() {
		$('#tabel_order').DataTable().ajax.reload();
		location.reload();
	}

	function reload_table() {
		$($.fn.dataTable.tables(true)).DataTable().columns.adjust();


		$('#tabel_order').DataTable().ajax.reload();
		$('#tabel_order_persetujuan').DataTable().ajax.reload();
		$('#tabel_order_admin').DataTable().ajax.reload();
		$('#tabel_order_persetujuan_spv').DataTable().ajax.reload();
		$('#tabel_order_baru').DataTable().ajax.reload();



	}

	function reload_table_aja() {
		$('#tabel_order').DataTable().ajax.reload();
		$('#tabel_order_persetujuan').DataTable().ajax.reload();
		$('#tabel_order_admin').DataTable().ajax.reload();
		$('#tabel_order_persetujuan_spv').DataTable().ajax.reload();
		$('#tabel_order_baru').DataTable().ajax.reload();



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
				$('[name="merek"]').val(data.merek);
				$('[name="keterangan"]').val(data.keterangan);
				$('[name="status"]').val(data.id_status);

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

		$("#nama_barang").autocomplete({
			source: "<?php echo site_url('Sysadmin/Fungsi_AutoComplete') ?>"
		});
		save_method = 'update';
		// $('#input_order').show();
		$('#input_tambahan').hide();
		$('#form_order').show();
		$('#btnSaveOrder').show();
		// $('#btnSaveOrderTambahan').hide();
		$('#input_order').show();
		$('#input_ukuran').hide();
		$('#input_spesifikasi').hide();
		$('#input_type').hide();
		$('#input_grade').hide();


		$.ajax({
			url: "<?php echo site_url('Sysadmin/Edit_oder_baru') ?>/" + nomor,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="urgent"]').val(data.urgent);
				$('[name="kategori_barang"]').val(data.kategori_barang);
				FilterByKategori();
				$('[name="nama_barang"]').val(data.nama_barang);
				$('[name="spesifikasi"]').val(data.spesifikasi);
				$('[name="keterangan"]').val(data.keterangan);
				$('[name="satuan"]').val(data.satuan);
				$('[name="brand"]').val(data.merek);
				$('[name="ukuran"]').val(data.ukuran);
				$('[name="type"]').val(data.type);
				$('[name="grade"]').val(data.grade);
				$('[name="jumlah"]').val(data.jumlah);
				$('[name="nama"]').val(data.nama);
				$('[name="nomor"]').val(data.nomor);
				$('[name="id_batch"]').val(data.id_batch);
				$('[name="ukuran_satuan"]').val(data.ukuran_satuan);
				save_method = 'update';
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});


	}

	function Btn_Persetujuan(id_order_tiket) {


		save_method = 'add';
		$('#form2')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string

		$("#nama_barang").autocomplete({
			source: "<?php echo site_url('Sysadmin/Fungsi_AutoComplete') ?>"
		});


		document.getElementById('keterangan').value = '<?= $dataSession['sub_laboratorium']; ?>';
		document.getElementById('id_order_unit').value = '';
		document.getElementById('id_order_tiket').value = '';

		$.ajax({
			url: "<?php echo site_url('Sysadmin/Edit_oder_persetujuan') ?>/" + id_order_tiket,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="id_batch"]').val(data.id_batch);
				$('[name="id_order_tiket"]').val(data.id_order_tiket);
				// $('[name="id_order"]').val(data.id_order);
				// $('[name="tanggal_input"]').val(data.tanggal_input);
				// $('[name="kategori_barang"]').val(data.kategori_barang);
				// $('[name="nama_barang"]').val(data.nama_barang);
				// $('[name="nama_barang_email"]').val(data.nama_barang);
				// $('[name="jumlah"]').val(data.jumlah);
				// $('[name="nama"]').val(data.nama);
				// $('[name="keterangan"]').val(data.keterangan);
				// $('[name="info_status_order"]').val(data.id_status);
				$('[name="id_status"]').val(data.id_status);
				FilterByPersetujuan();
				// $('[name="status_order"]').val(data.id_status);
				// $('[name="satuan"]').val(data.satuan);
				// $('[name="penawaran"]').val(data.penawaran);
				// $('[name="ukuran"]').val(data.ukuran);
				// $('[name="type"]').val(data.type);
				// $('[name="grade"]').val(data.grade);
				// $('[name="id_instrumen"]').val(data.id_instrumen);
				// $('[name="keterangan_dibatalkan"]').val(data.keterangan_dibatalkan);
				// document.getElementById('status_order').value = 1;
				$('#modal_input').modal('show');



				$('.modal-title').text('Daftar Barang Order');
				$('#tabel_order_baru').DataTable().columns.adjust();
				$('#tabel_order_baru').DataTable().ajax.reload();

				$('#tabel_order_baru').DataTable().search(
					'',
				).draw();

				// CekAksesUser();

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});


	}

	function Btn_Update(id_order) {

		$("#info_penawaran").change(function() {
			var data = document.getElementById("info_penawaran").value;

			if (data == 1) {

				$("#id_status_order option[value='5']").prop("selected", "selected");

			} else if (data == 0) {

				$("#id_status_order option[value='8']").prop("selected", "selected");

			} else {

				$("#id_status_order option[value='8']").prop("selected", "selected");

			}
		});

		$("#nama_barang").autocomplete({
			source: "<?php echo site_url('Sysadmin/Fungsi_AutoComplete') ?>"
		});

		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#btnSave').hide();
		$('#btnSaveEdit').hide();
		$('#btnSaveBatal').hide();
		$('#btnsaveUpdateProses').show();
		$('#info_status_order').show();
		$('#btnsaveUpdateProses').hide();

		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('Sysadmin/Edit_oder') ?>/" + id_order,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="info_id_order"]').val(data.id_order);
				$('[name="info_tanggal_input"]').val(data.tanggal_input);
				$('[name="info_kategori_barang"]').val(data.kategori_barang);
				$('[name="info_nama_barang"]').val(data.nama_barang);
				$('[name="info_nama_barang_email"]').val(data.nama_barang);
				$('[name="info_jumlah"]').val(data.jumlah);
				// $('[name="info_input_jumlah"]').val(data.jumlah);
				$('[name="info_jumlah_diterima"]').val(data.jumlah_diterima);
				$('[name="info_nama"]').val(data.nama);
				$('[name="info_keterangan"]').val(data.keterangan);
				$('[name="info_merek"]').val(data.merek);
				$('[name="info_status_order"]').val(data.id_status);
				$('[name="info_satuan"]').val(data.satuan);
				$('[name="info_penawaran"]').val(data.penawaran);
				$('[name="info_ukuran"]').val(data.ukuran);

				$('[name="info_type"]').val(data.type);
				$('[name="info_grade"]').val(data.grade);
				$('[name="info_urgent"]').val(data.urgent);
				$('[name="info_id_instrumen"]').val(data.id_instrumen);
				$('[name="info_keterangan_dibatalkan"]').val(data.keterangan_dibatalkan);


				document.getElementById("label_diterima").innerHTML = (data.jumlah_diterima);
				document.getElementById("label_urgent").innerHTML = (data.urgent);
				document.getElementById("label_nomor_order").innerHTML = (data.id_order);
				document.getElementById("label_ketegori_barang").innerHTML = (data.kategori_barang);
				document.getElementById("label_tanggal_input").innerHTML = (data.tanggal_input);
				document.getElementById("label_nama_barang").innerHTML = (data.nama_barang);
				document.getElementById("label_nomor_pr").innerHTML = (data.no_pr);
				document.getElementById("label_merek").innerHTML = (data.merek);
				document.getElementById("label_nomor_po").innerHTML = (data.no_po);
				document.getElementById("label_jumlah").innerHTML = (data.jumlah);
				document.getElementById("label_satuan").innerHTML = (data.satuan);
				document.getElementById("label_satuan2").innerHTML = (data.satuan);
				document.getElementById("label_tanggal_datang").innerHTML = (data.tanggal_datang);
				document.getElementById("label_nama_pic").innerHTML = (data.nama);
				document.getElementById("label_lokasi").innerHTML = (data.keterangan);
				document.getElementById("label_penawaran").innerHTML = (data.penawaran);
				document.getElementById("label_status").innerHTML = (data.id_status);
				$('#modal_form').modal('show');

				$('#tabel_penawaran').DataTable().search(
					$('#info_id_order').val(),
				).draw();
				$('#tabel_penawaran2').DataTable().search(
					$('#info_id_order').val(),
				).draw();

				var jumlahorder = document.getElementById('info_jumlah').value;
				var jumlahditerima = document.getElementById('info_jumlah_diterima').value;

				var jumlahmax = jumlahorder - jumlahditerima;

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


				$("#info_input_jumlah").change(function() {
					var order = ($('#info_jumlah').val());
					var datang = ($('#info_input_jumlah').val());
					var diterima = ($('#info_jumlah_diterima').val());

					var total = parseInt(diterima) + parseInt(datang);

					if (total != order) {
						$('#btnsaveUpdateProses').show();
						$('#btnsaveUpdateProses').text('Terima Sebagian');
						$("#id_status_order option[value='11']").prop("selected", "selected");
					} else if (total = order) {
						$('#btnsaveUpdateProses').show();
						$('#btnsaveUpdateProses').text('Terima Barang');
						$("#id_status_order option[value='12']").prop("selected", "selected");
					} else {
						$('#btnsaveUpdateProses').hide();
						$('#btnsaveUpdateProses').text('Terima Barang');
						$("#id_status_order option[value='12']").prop("selected", "selected");
					}
				});

				var label_urgent = document.getElementById("label_urgent").innerHTML;
				if (label_urgent == 1) {
					document.getElementById("label_urgent").innerHTML = "<span class='badge bg-danger '>Urgent</span>";
				} else if (label_urgent == 2) {
					document.getElementById("label_urgent").innerHTML = "<span class='badge bg-success '>Normal</span>";
				}
				var label_penawaran = document.getElementById("label_penawaran").innerHTML;
				if (label_penawaran == 0) {
					document.getElementById("label_penawaran").innerHTML = "<span class='badge bg-danger '>Tidak</span>";
				} else if (label_penawaran == 1) {
					document.getElementById("label_penawaran").innerHTML = "<span class='badge bg-success '>Ya</span>";
				} else if (label_penawaran == 2) {
					document.getElementById("label_penawaran").innerHTML = "<span class='badge bg-info '>Belum Ditentukan</span>";
				}

				var label_status = document.getElementById("label_status").innerHTML;
				if (label_status == 0) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-info '>Orderan Diinput User </span>"
				} else if (label_status == 1) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-info '>Menunggu Persetujuan Supervisor</span>"
				} else if (label_status == 2) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-warning '>Diproses Admin Laboratorium</span>"
				} else if (label_status == 3) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-info '>Menunggu Persetujuan Ka Unit</span>"
				} else if (label_status == 4) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-primary '>Diproses Admin SAP</span>"
				} else if (label_status == 5) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-primary'>Menunggu Penawaran</span>"
				} else if (label_status == 6) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-info'>Unit Seleksi Penawaran</span>"
				} else if (label_status == 7) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-primary '>Menunggu Persetujuan Direktur</span>"
				} else if (label_status == 8) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-primary'>Pembuatan PR</span>"
				} else if (label_status == 9) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-primary'>Input No PO</span>"
				} else if (label_status == 10) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-dark '>Proses Pembelian</span>"
				} else if (label_status == 11) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-warning '>Diterima Sebagian</span>"
				} else if (label_status == 12) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-success '>Barang Diterima</span>"
				} else if (label_status == 19) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-warning '>Orderan Ditunda</span>"
				} else if (label_status == 20) {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-danger '>Orderan Dibatalkan</span>"
				} else {
					document.getElementById("label_status").innerHTML = "<span class='badge bg-dark'>-</span>"
				}
				FilterByStatus();
				// HideTambahan();
				// FilterByKategoriUpdate();

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
				$('[name="status"]').val(data.id_status);
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

		var data = document.getElementById("info_penawaran").value;

		if (data == 0) {

			$("#info_status_order option[value='3']").prop("selected", "selected");

		} else if (data == 1) {

			$("#info_status_order option[value='7']").prop("selected", "selected");

		}
	}

	function FilterByKategori() {
		// $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		var data = document.getElementById("kategori_barang").value;

		if (data == "Glassware") {
			$('#input_ukuran_satuan').hide();
			$('#input_spesifikasi').show();
			$('#input_ukuran').show();
			$('#input_type').show();
			$('#input_grade').show();
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');


		} else if (data == "Reagent") {
			$('#input_spesifikasi').show();
			$('#input_ukuran_satuan').show();
			$('#input_ukuran').show();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');
		} else if (data == "Sparepart PCR") {
			$('#input_spesifikasi').show();
			$('#input_ukuran_satuan').show();
			$('#input_ukuran').hide();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');
		} else if (data == "Sparepart") {
			$('#input_spesifikasi').show();
			$('#input_ukuran_satuan').hide();
			$('#input_ukuran').hide();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');
		} else if (data == "Consumable Part Instrument") {
			$('#input_spesifikasi').show();
			$('#input_ukuran').hide();
			$('#input_ukuran_satuan').show();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');
		} else if (data == "Standard Uji") {
			$('#input_spesifikasi').show();
			$('#input_ukuran').show();
			$('#input_ukuran_satuan').hide();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');
		} else if (data == "IT") {
			$('#input_spesifikasi').show();
			$('#input_ukuran_satuan').hide();
			$('#input_ukuran').hide();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');
		} else {
			$('#input_spesifikasi').hide();
			$('#input_ukuran').hide();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#input_ukuran_satuan').hide();
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');

		}
	}


	// $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
	// 	$.fn.dataTable.tables({
	// 		visible: true,
	// 		api: true
	// 	}).columns.adjust();
	// });

	function FilterByPersetujuan() {

		var data = document.getElementById('id_status').value;


		// Work with column 2

		if (data == 1) {

			$('#tabel_persetujuan_order').show();
			$('#tabel_persetujuan_order_spv').show();


			$('#btnDisetujui').hide();
			$('#btnPersetujuanSpv').hide();
			$('#btnKirimAdmin').show();
			$('#btnPersetujuanKaUnit').hide();

			$('#form_order').show();
			$('#input_order').show();
			$('#input_ukuran').hide();
			$('#input_spesifikasi').hide();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#input_tambahan').hide();
			document.getElementById('id_status').value = 2;
			document.getElementById('id_batch').value = '';

			unFilterHeader();
			if (document.getElementById('akses_tipe').value == 'Supervisor') {

				$('#btnKirimAdmin').show();
				// $('#tabel_order_baru').DataTable().column(0).visible(false);
				$('#form_order').show();

			} else if (document.getElementById('akses_tipe').value == 'Admin Lab') {

				$('#btnKirimAdmin').show();
				// $('#tabel_order_baru').DataTable().column(0).visible(false);
				$('#form_order').show();



			} else {

				$('#btnKirimAdmin').hide();
				$('#tabel_order_baru').DataTable().column(0).visible(false);
				$('#form_order').hide();



			}

		} else if (data == 2) {
			$('#tabel_persetujuan_order').show();
			$('#tabel_persetujuan_order_spv').hide();

			$('#btnDisetujui').hide();
			$('#btnPersetujuanSpv').hide();
			$('#btnKirimAdmin').hide();
			$('#input_ukuran').hide();
			$('#btnPersetujuanKaUnit').show();
			$('#form_order').show();
			$('#input_order').show();
			$('#input_ukuran').hide();
			$('#input_spesifikasi').hide();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#input_tambahan').hide();

			document.getElementById('id_status').value = 3;
			document.getElementById('id_order_tiket').value = '';
			// document.getElementById('id_batch').value = '';
			unFilterHeader();

			if (document.getElementById('akses_tipe').value != 'Admin Lab') {

				$('#btnPersetujuanKaUnit').hide();
				$('#tabel_order_baru').DataTable().column(0).visible(false);
				$('#form_order').hide();

			}

		} else if (data == 3) {

			$('#tabel_persetujuan_order').show();
			$('#tabel_persetujuan_order_spv').hide();
			$('#btnDisetujui').show();
			$('#btnPersetujuanSpv').hide();
			$('#btnKirimAdmin').hide();
			$('#btnPersetujuanKaUnit').hide();

			$('#form_order').hide();
			$('#input_order').hide();
			$('#input_ukuran').hide();
			$('#input_spesifikasi').hide();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#input_tambahan').hide();
			document.getElementById('id_status').value = 4;
			document.getElementById('id_order_tiket').value = '';
			unFilterHeader();

			if (document.getElementById('akses_tipe').value == 'Kepala Unit') {

				$('#btnDisetujui').show();
				$('#tabel_order_baru').DataTable().column(0).visible(true);
				$('#form_order').hide();

			} else if (document.getElementById('akses_tipe').value == 'SysAdmin') {

				$('#btnDisetujui').show();
				$('#tabel_order_baru').DataTable().column(0).visible(true);
				$('#form_order').hide();

			} else {

				$('#btnDisetujui').hide();
				$('#tabel_order_baru').DataTable().column(0).visible(false);
				$('#form_order').hide();

			}


		} else if (data == 5) {

			$('#tabel_persetujuan_order').show();
			$('#tabel_persetujuan_order_spv').hide();
			$('#btnDisetujui').hide();
			$('#btnPersetujuanSpv').hide();
			$('#btnKirimAdmin').hide();

			$('#btnPersetujuanKaUnit').hide();

			$('#form_order').hide();
			$('#input_order').hide();
			$('#input_ukuran').hide();
			$('#input_spesifikasi').hide();
			$('#input_type').hide();
			$('#input_grade').hide();
			$('#input_tambahan').hide();
			// document.getElementById('id_status').value = 5;
			document.getElementById('id_order_tiket').value = '';
			// Get the column API object
			// var column = table7.column($(this).attr('1'));

			// // Toggle the visibility
			// column.visible(!column.visible());
			FilterHeader();
			$('#tabel_order_baru').DataTable().column(0).visible(false);
		}

	}

	function FilterByKategoriUpdate() {

		var data = document.getElementById("info_kategori_barang").value;

		if (data == "Glassware") {

			$('#tambahan_glassware').show();
			$("#info_ukuran ").prop("disabled", "disabled");
			$("#info_type ").prop("disabled", "disabled");
			$("#info_grade ").prop("disabled", "disabled");
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');
		} else if (data == "") {

			$('#tambahan_glassware').hide();
			$("#info_ukuran ").prop("disabled", "disabled");
			$("#info_type ").prop("disabled", "disabled");
			$("#info_grade ").prop("disabled", "disabled");
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');

		} else {
			$('#tambahan_glassware').hide();
			$('#spesifikasi').val('');
			$('#ukuran').val('');
			$('#type').val('');
			$('#grade').val('');
			$('#jumlah').val('1');
			$('#merek').val('');


		}
	}

	function FilterDisableTrue() {
		$('#info_keterangan').prop('disabled', true);
		$('#info_urgent').prop('disabled', true);
		$('#info_kategori_barang').prop('disabled', true);
		$('#info_nama_barang').prop('disabled', true);
		$('#info_jumlah').prop('disabled', true);
		$('#info_nama').prop('disabled', true);
		$('#info_satuan').prop('disabled', true);
		$('#info_merek').prop('disabled', true);

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


	function FilterByJumlah() {

		var data = document.getElementById("info_input_jumlah").value;
		var stok = document.getElementById("info_jumlah").value;
		if (data != stok) {
			$('#btnsaveUpdateProses').show();
			$('#btnsaveUpdateProses').text('Terima Sebagian');

		} else {

			$('#btnsaveUpdateProses').show();
			$('#btnsaveUpdateProses').text('Terima Barang');

		}
	}


	function FilterByStatus() {

		var data = document.getElementById("id_status_order").value;

		if (data == 1) {

			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnsaveUpdateProses').hide();
			$('#btnsaveKaUnit').show();
			$('#jumlah_diterima').hide();
			$('#btnsaveUpdateProses').text('Disetujui Penyelia');
			$("#id_status_order option[value='2']").prop("selected", "selected");
			$('#daftar_penawaran').hide();
			$('#input_tanggal').hide();

		} else if (data == 2) {

			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnsaveUpdateProses').show();
			$('#btnSaveBatal').show();
			$('#btnsaveUpdateProses').text('Disetujui');
			$('#btnSaveBatal').text('Batalkan');
			$("#id_status_order option[value='4']").prop("selected", "selected");

			$('#Konfirmasi_penawaran').show();
			$('#input_keterangan_tambahan').show();
			$('#Upload_penawaran').hide();
			$('#daftar_penawaran').hide();
			$('#jumlah_diterima').hide();
			$('#btnsaveKaUnit').hide();
			$('#input_tanggal').hide();
		} else if (data == 4) {

			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#Konfirmasi_penawaran').show();
			$('#btnsaveUpdateProses').show();
			$('#btnsaveUpdateProses').text('Update Status');
			$("#info_penawaran option[value='2']").prop("disabled", "disabled");
			$("#info_penawaran option[value='2']").prop("selected", "selected");



			$('#Upload_penawaran').hide();
			$('#input_keterangan_tambahan').hide();
			$('#info_no_po').hide();
			$('#info_no_pr').hide();
			$('#jumlah_diterima').hide();
			$('#daftar_penawaran').hide();
			$('#btnsaveKaUnit').hide();
			$('#input_tanggal').hide();


			if (document.getElementById('akses_tipe').value != 'Admin SAP') {
				$('#Konfirmasi_penawaran').hide();
				$('#btnsaveUpdateProses').hide();
			}

		} else if (data == 5) {

			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnsaveUpdateProses').show();
			$('#btnsaveUpdateProses').text('Penawaran Sudah Diberikan Ke Unit');
			$("#id_status_order option[value='6']").prop("selected", "selected");
			$('#Konfirmasi_penawaran').hide();
			$('#Upload_penawaran').show();


			$('#input_keterangan_tambahan').hide();
			$('#info_no_pr').hide();
			$('#info_no_po').hide()
			$('#jumlah_diterima').hide();
			$('#daftar_penawaran').hide();
			$('#btnsaveKaUnit').hide();
			$('#input_tanggal').hide();

			if (document.getElementById('akses_tipe').value != 'Admin SAP') {
				$('#Upload_penawaran').hide();
				$('#btnsaveUpdateProses').hide();
			}
		} else if (data == 6) {

			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnsaveUpdateProses').show();
			$('#btnsaveUpdateProses').text('Penawaran Sudah Disetujui');
			$("#id_status_order option[value='7']").prop("selected", "selected");
			$('#Upload_penawaran').hide();
			$('#daftar_penawaran').show();
			$('#input_info_namabarang').show();
			$('#input_keterangan_tambahan').show();
			$('#info_no_po').hide();
			$('#info_no_pr').hide();
			$('#jumlah_diterima').hide();
			$('#btnsaveKaUnit').hide();
			$('#input_tanggal').hide();
			$('#Konfirmasi_penawaran').hide();

			if (document.getElementById('akses_tipe').value != 'Admin Lab') {
				$('#daftar_penawaran').hide();
				$('#btnsaveUpdateProses').hide();
				$('#input_keterangan_tambahan').hide();
			}
		} else if (data == 7) {

			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnsaveUpdateProses').show();
			$('#btnsaveUpdateProses').text('Disetujui Direktur');
			$("#id_status_order option[value='8']").prop("selected", "selected");
			$('#Konfirmasi_penawaran').hide();
			$('#input_keterangan_tambahan').hide();
			$('#Upload_penawaran').hide();
			$('#info_no_pr').hide();
			$('#info_no_po').hide();
			$('#jumlah_diterima').hide();
			$('#daftar_penawaran').hide();
			$('#btnsaveKaUnit').hide();
			$('#input_tanggal').hide();

			if (document.getElementById('akses_tipe').value != 'Admin SAP') {

				$('#btnsaveUpdateProses').hide();
			}
		} else if (data == 8) {

			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnsaveUpdateProses').show();
			$('#btnsaveUpdateProses').text('Update Nomor PR');
			$("#id_status_order option[value='9']").prop("selected", "selected");
			$('#Konfirmasi_penawaran').hide();
			$('#info_no_pr').show();
			$('#info_no_po').hide()
			$('#input_keterangan_tambahan').show();
			$('#Upload_penawaran').hide();
			$('#daftar_penawaran').hide();
			$('#btnsaveKaUnit').hide();
			$('#jumlah_diterima').hide();
			$('#input_tanggal').hide();
			if (document.getElementById('akses_tipe').value != 'Admin SAP') {
				$('#input_keterangan_tambahan').hide();
				$('#btnsaveUpdateProses').hide();
				$('#info_no_pr').hide();
			}
		} else if (data == 9) {

			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnsaveUpdateProses').show();
			$('#jumlah_diterima').show();
			$('#Konfirmasi_penawaran').hide();
			$('#btnsaveUpdateProses').text('Update Nomor PO');
			$("#id_status_order option[value='10']").prop("selected", "selected");
			$('#info_no_po').show()
			$('#input_keterangan_tambahan').hide();
			$('#Upload_penawaran').hide();
			$('#info_no_pr').hide();
			$('#jumlah_diterima').hide();
			$('#daftar_penawaran').hide();
			$('#btnsaveKaUnit').hide();
			$('#input_tanggal').hide();

			if (document.getElementById('akses_tipe').value != 'Admin SAP') {
				$('#input_keterangan_tambahan').hide();
				$('#btnsaveUpdateProses').hide();
				$('#info_no_po').hide()

			}
		} else if (data == 10) {
			$('#Konfirmasi_penawaran').hide();
			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#jumlah_diterima').show();
			$("#id_status_order option[value='11']").prop("selected", "selected");
			$('#btnsaveUpdateProses').text('Terima Barang');
			$('#info_no_po').hide()
			$('#input_keterangan_tambahan').show();
			$('#Upload_penawaran').hide();
			$('#info_no_pr').hide();
			$('#daftar_penawaran').hide();
			$('#btnsaveKaUnit').hide()
			$('#input_tanggal').show();

			if (document.getElementById('akses_tipe').value != 'Admin Lab') {
				$('#input_keterangan_tambahan').hide();
				$('#btnsaveUpdateProses').hide();
				$('#jumlah_diterima').hide();
				$('#input_tanggal').hide();

			}

		} else if (data == 11) {
			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$("#id_status_order option[value='12']").prop("selected", "selected");
			$('#btnsaveUpdateProses').text('Terima Barang');
			$('#info_no_po').hide()
			$('#input_keterangan_tambahan').show();
			$('#Upload_penawaran').hide();
			$('#info_no_pr').hide();
			$('#daftar_penawaran').hide();
			$('#btnsaveKaUnit').hide()
			$('#jumlah_diterima').show();
			$('#input_tanggal').show();

			$('#Konfirmasi_penawaran').hide();


			if (document.getElementById('akses_tipe').value != 'Admin Lab') {
				$('#input_keterangan_tambahan').hide();
				$('#btnsaveUpdateProses').hide();
				$('#jumlah_diterima').hide();
				$('#input_tanggal').hide();
			}

		} else if (data == 12) {
			FilterDisableTrue();
			$('#btnSave').hide();
			$('#btnSaveEdit').hide();
			$('#btnsaveUpdateProses').hide();
			$("#id_status_order option[value='12']").prop("selected", "selected");
			$('#info_no_po').hide()
			$('#input_keterangan_tambahan').hide();
			$('#Upload_penawaran').hide();
			$('#info_no_pr').hide();
			$('#daftar_penawaran').hide();
			$('#btnsaveKaUnit').hide()
			$('#jumlah_diterima').hide();
			$('#input_tanggal').hide();
			$('#Konfirmasi_penawaran').hide();



			if (document.getElementById('akses_tipe').value == 'SysAdmin') {
				$('#daftar_penawaran').show();
				$('#btnsaveUpdateProses').hide();
				$('#input_keterangan_tambahan').hide();
			} else if (document.getElementById('akses_tipe').value == 'Admin Lab') {
				$('#daftar_penawaran').show();
				$('#btnsaveUpdateProses').hide();
				$('#input_keterangan_tambahan').hide();
			} else {
				$('#daftar_penawaran').hide();
				$('#btnsaveUpdateProses').hide();
				$('#input_keterangan_tambahan').hide();
			}
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
			$('#info_no_po').hide()
			$('#jumlah_diterima').hide();
			$('#input_tanggal').hide();
			$('#Konfirmasi_penawaran').hide();
			$('#input_info_namabarang').hide();
		} else {
			FilterDisableTrue();
			// $('#keterangan').prop('disabled', true);
			// $('#tanggal_input').prop('disabled', true);
			// $('#kategori_barang').prop('disabled', true);
			// $('#nama_barang').prop('disabled', true);
			// $('#jumlah').prop('disabled', true);
			// $('#nama').prop('disabled', true);

			// $('#daftar_penawaran').hide();
			// $('#btnSave').hide();
			// $('#btnSaveEdit').hide();
			// $('#btnsaveUpdateProses').hide();
			// $('#btnsaveKaUnit').hide();
			// $('#input_keterangan_tambahan').hide();
			// $('#Upload_penawaran').hide();
			// $('#info_no_pr').hide();
			// $('#info_no_po').hide();
			// $('#jumlah_diterima').hide();
			// $('#input_tanggal').hide();
		}
	}

	function autofill(tipe_instrumen) {
		var tipe_instrumen = document.getElementById('nama_barang').value;
		$.ajax({
			url: "<?php echo base_url('sysadmin/DataRumus') ?>/",

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

	function Btn_Hapus_persetujuan(nomor) {
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
					url: "<?php echo site_url('sysadmin/Hapus_order_persetujuan') ?>/" + nomor,
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
						$('#tabel_order_admin').DataTable().ajax.reload();
						$('#tabel_order_persetujuan_spv').DataTable().ajax.reload();
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
						$('#tabel_order_baru_spv').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}

	$('body').on('click', '#remove', function() {
		$(this).parent('div').remove();
	});
</script>

</body>

</html>