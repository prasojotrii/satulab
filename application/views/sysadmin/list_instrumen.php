<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->


<div class="main-content" id="miniaresult">

	<div class="page-content">
		<div class="container-fluid">



			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">

							<div class="row ">
								<div class="col-md-5 " style="margin: 0px;">
									<input class="form-control" align="right" type="text" style="background-color: white;  box-shadow: none; font-size: 30px;   font-weight: bold;     padding: 0px;  margin: 0px;  float: left; border-style: none;" Value="Daftar Instrumen Laboratorium " readonly>

								</div>

								<div class="col-md-1 " style="display: none;">
									<input class=" form-control" id="JudulTabel" align="left" type="text" style="background-color: white;  box-shadow: none;  font-size: 30px; font-weight: bold; margin: 0px; padding: 0px; float: left; border-style: none;" value="<?= $id_kategori; ?>" readonly>
								</div>

								<div class="col-md-7 " style="text-align: right;">
									<button class="btn btn-primary" onclick="Fungsi_Tambah()"><i class="bx bx-plus me-1"></i> Tambah Baru</button>
									<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>

								</div>
							</div>
						</div>
						<div class="card-body">
							<table id="tabel_instrumen" class="table table-hover nowrap w-100">
								<thead>
									<tr style="text-align: center">
										<th width="10px">Menu</th>
										<th width="2px">No</th>
										<th width="10px">Id Instumen</th>

										<th width="10px">Kategori</th>
										<th width="10px">No Aset SAP</th>
										<th>Tipe Instrumen</th>
										<th>Merek</th>
										<th>Seri</th>
										<th>Serial Number</th>
										<th width="5px">Tahun</th>
										<th>Lokasi</th>
										<th width="10px">Aktif</th>
										<th width="10px">Kondisi</th>
										<th width="10px">Status Kalibrasi</th>
										<th width="10px">Terahkir</th>
										<th width="10px">Selanjutnya</th>
										<th>User Input </th>
										<th>Tanggal Input </th>

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
	$(document).ready(function() {
		var tipe = "<?= $dataSession['tipe']; ?>";


		if (tipe == 'SysAdmin') {

			$('#Halaman_Sysadmin').show();
		}
		//Buttons examples
		var table = $('#tabel_instrumen').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true,
			"scrollX": true,
			"bInfo": false, //Feature control DataTables' server-side processing mode.
			"lengthMenu": [
				[10, 25, 50, -1],
				['10', '25', '50', 'Semua']
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

				[13, 'asc'],
				[12, 'asc'],
				[2, 'asc']

			], //Initial no order.

			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_aset_instrumen') ?>",
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
					'targets': [2, 3, 16, 17]
				},
				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				},
				// {
				// 	"targets": 12,
				// 	// "data": null,
				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 1) {
				// 			html = "<span class='badge bg-success'>Normal</span>"
				// 		} else if (data == 2) {

				// 			html = "<span class='badge bg-warning '>Abnormal</span>"

				// 		} else if (data == 5) {

				// 			html = "<span class='badge bg-danger '>Rusak</span>"
				// 		}
				// 		return html;
				// 	},
				// },
				// {
				// 	"targets": 13,
				// 	// "data": null,
				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 1) {
				// 			html = "<span class='badge bg-info '>Baru </span> <span class='badge bg-warning '>Belum Dikalibrasi</span>"
				// 		} else if (data == 2) {

				// 			html = "<span class='badge bg-warning '>Belum Dikalibrasi</span>"
				// 		} else if (data == 3) {

				// 			html = "<span class='badge bg-primary' >Sedang dikalibrasi<span>"
				// 		} else if (data == 4) {

				// 			html = "<span class='badge bg-success '>Sudah dikalibrasi</span>"
				// 		} else if (data == 5) {

				// 			html = "<span class='badge bg-danger ' >Instrumen Rusak</span>"
				// 		}
				// 		return html;
				// 	},
				// },
				// {
				// 	"targets": 11,
				// 	// "data": null,
				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 0) {
				// 			html = "<span class='badge bg-danger '>Off </span> "
				// 		} else if (data == 1) {

				// 			html = "<span class='badge bg-success '>On</span>"
				// 		}
				// 		return html;
				// 	},


				// },

			],



		});
		IsiPencarian();
		var table2 = $('#tabel_riwayat').DataTable({

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

			"dom": 'Blrti',
			//Blfrtip
			"search": {
				"visible": true
			},

			// },
			"buttons": [{
				extend: 'excel',
				text: 'Excel',
				exportOptions: {
					columns: [':visible']
				}
			}],
			"order": [
				[11, 'desc'],
				[2, 'desc'],
			], //Initial no order.

			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_riwayat_instrumen') ?>",
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
					'targets': [0, 3, 4, 11, 12]
				},
				{
					"targets": [1], //last column
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


		$('#awal_kalibrasi').datepicker({

			calendarWeeks: true,
			autoclose: true,
			todayHighlight: true,
			dateFormat: 'yy-mm-dd',

			onSelect: function(date) {
				var date2 = $('#awal_kalibrasi').datepicker("getDate");
				var periode_kalibrasi = +document.getElementById('periode_kalibrasi').value;

				var nextDayDate = new Date();
				nextDayDate.setDate(date2.getDate() + periode_kalibrasi);
				$('#selanjutnnya_kalibrasi').datepicker().datepicker('setDate', nextDayDate);
			}

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

	function BenerinHeader() {
		$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();
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
		$('#no_aset').attr('disabled', false);
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

	function save() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
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

	function savePCR() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Simpan_instrumen') ?>";
			document.getElementById("id_aset").value = "<?= $kodePCR; ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
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

	function SaveMKR() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Simpan_instrumen') ?>";
			document.getElementById("id_aset").value = "<?= $KodeMKR; ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
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

	function SaveINS() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Simpan_instrumen') ?>";
			document.getElementById("id_aset").value = "<?= $KodeINS; ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
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

	function SaveMTS() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Simpan_instrumen') ?>";
			document.getElementById("id_aset").value = "<?= $KodeMTS; ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
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

	function SaveOMG() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Simpan_instrumen') ?>";
			document.getElementById("id_aset").value = "<?= $KodeOMG; ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
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

	function SaveBBG() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Simpan_instrumen') ?>";
			document.getElementById("id_aset").value = "<?= $KodeBBG; ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
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

	function SaveLGK() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Simpan_instrumen') ?>";
			document.getElementById("id_aset").value = "<?= $KodeLGK; ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
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

	function SaveKalibrasi() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Fungsi_Mulai_Kalibrasi') ?>";
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

				reload_table_dan_page();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSave').text('Simpan'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 

			}
		});
	}

	function SaveKalibrasiSelesai() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;


		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Save_Update_instrumen') ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Fungsi_Selesai_Kalibrasi') ?>";
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


	function reload_table_dan_page() {
		$('#tabel_instrumen').DataTable().ajax.reload();
		location.reload();
	}


	function reload_table() {
		$('#tabel_instrumen').DataTable().ajax.reload();

	}

	function Btn_Edit(id_aset) {
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#btnSave').show();
		$('#btnSavePCR').hide();
		$('#btnSaveMikrobiologi').hide();
		$('#btnSaveInstrument').hide();
		$('#btnSaveMTS').hide();
		$('#btnSaveOMG').hide();
		$('#btnSaveBBG').hide();
		$('#btnSaveLingkungan').hide();
		$('#btnSaveKalibrasi').hide();
		$('#btnSaveKalibrasiSelesai').hide();

		$('#input_tindakan').hide();
		$('#input_petugas').hide();
		$('#input_keterangan').hide();
		$('#input_awal_kalibrasi').hide();
		$('#input_selanjutnnya_kalibrasi').hide();


		$('#no_aset').attr('disabled', false);
		$('#tipe_instrumen').attr('disabled', false);
		$('#merek').attr('disabled', false);
		$('#seri').attr('disabled', false);
		$('#serial_number').attr('disabled', false);
		$('#tahun').attr('disabled', false);
		$('#lokasi').attr('disabled', false);
		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('Sysadmin/Fungsi_Edit_instrumen') ?>/" + id_aset,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_aset"]').val(data.id_aset);
				$('[name="no_aset"]').val(data.no_aset);
				$('[name="id_instrumen"]').val(data.id_instrumen);
				$('[name="tipe_instrumen"]').val(data.tipe_instrumen);
				$('[name="merek"]').val(data.merek);
				$('[name="seri"]').val(data.seri);
				$('[name="serial_number"]').val(data.serial_number);
				$('[name="tahun"]').val(data.tahun);
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

	function Btn_Kalibrasi(id_aset) {
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#btnSaveKalibrasi').hide();
		$('#btnSavePCR').hide();
		$('#btnSave').hide();
		$('#btnSaveMikrobiologi').hide();
		$('#btnSaveInstrument').hide();
		$('#btnSaveMTS').hide();
		$('#btnSaveOMG').hide();
		$('#btnSaveBBG').hide();
		$('#btnSaveLingkungan').hide();

		// $('#input_awal_kalibrasi').show();
		// $('#input_periode_kalibrasi').show();
		// $('#input_selanjutnnya_kalibrasi').show();


		$('#input_tindakan').show();
		$('#input_petugas').show();
		$('#input_keterangan').show();
		// $('#input_awal_kalibrasi').hide();
		// $('#input_selanjutnnya_kalibrasi').hide();

		$('#no_aset').attr('disabled', true);
		$('#tipe_instrumen').attr('disabled', true);
		$('#merek').attr('disabled', true);
		$('#seri').attr('disabled', true);
		$('#serial_number').attr('disabled', true);
		$('#tahun').attr('disabled', true);
		$('#lokasi').attr('disabled', true);
		//Ajax Load data from ajax 
		$.ajax({
			url: "<?php echo site_url('Sysadmin/Fungsi_Edit_instrumen') ?>/" + id_aset,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_aset"]').val(data.id_aset);
				$('[name="no_aset"]').val(data.no_aset);

				$('[name="id_instrumen"]').val(data.id_instrumen);
				$('[name="tipe_instrumen"]').val(data.tipe_instrumen);
				$('[name="merek"]').val(data.merek);
				$('[name="seri"]').val(data.seri);
				$('[name="serial_number"]').val(data.serial_number);
				$('[name="tahun"]').val(data.tahun);
				$('[name="lokasi"]').val(data.lokasi);
				$('[name="status_kalibrasi"]').val(data.status_kalibrasi);
				// $('[name="awal_kalibrasi"]').val(data.awal_kalibrasi);
				$('[name="periode_kalibrasi"]').val(data.periode_kalibrasi);
				// $('[name="selanjutnnya_kalibrasi"]').val(data.selanjutnnya_kalibrasi);
				$('[name="user_input"]').val(data.user_input);
				// $('[name="tanggal_input"]').val(data.tanggal_input);
				$('[name="id_log_instrumen"]').val(data.id_log_instrumen);
				FilterStatus();

				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Kalibrasi Instrumen'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function Btn_Hapus(id_aset) {

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
					url: "<?php echo site_url('sysadmin/Fungsi_Hapus_instrumen') ?>/" + id_aset,
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



	function Btn_Riwayat(id_aset) {
		$('#modal_riwayat_form').modal('show');
		// var id_as = $('#id_aset2').val(); // show bootstrap modal when complete loaded
		$('.modal-title').text('Riwayat Instrumen'); // Set title to Bootstrap modal title
		$.ajax({
			url: "<?php echo site_url('Sysadmin/Fungsi_Edit_instrumen') ?>/" + id_aset,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_aset2"]').val(data.id_aset);
				BenerinHeader();

				$('#tabel_riwayat').DataTable().search(
					$('#id_aset2').val(),
				).draw();



			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function autofill(tipe_instrumen) {
		var tipe_instrumen = document.getElementById('tipe_instrumen').value;
		$.ajax({
			url: "<?php echo base_url('sysadmin/cari') ?>/",

			data: {

				tipe_instrumen: tipe_instrumen,
			},
			success: function(data) {
				var hasil = JSON.parse(data);

				$.each(hasil, function(key, val) {

					document.getElementById('id_instrumen').value = val.id_instrumen;
					document.getElementById('periode_kalibrasi').value = val.periode_kalibrasi;
					// document.getElementById('tipe_instrumen').value = val.tipe_instrumen;
				});
			}
		});



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


	function FilterStatus() {

		var data = document.getElementById("status_kalibrasi").value;

		if (data == "1") {
			document.getElementById("status_kalibrasi").value = 3;
			document.getElementById("aktif").value = 0;
			document.getElementById("id_log_instrumen").value = "<?= $KodeLogInstrumen; ?>";
			$('#btnSaveKalibrasi').show();
			$('#btnSaveKalibrasiSelesai').hide();
			$('#input_keterangan').hide();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#input_kondisi').hide();
			$('#input_petugas').hide();

		} else if (data == "2") {
			document.getElementById("status_kalibrasi").value = 3;
			document.getElementById("id_log_instrumen").value = "<?= $KodeLogInstrumen; ?>";
			document.getElementById("aktif").value = 0;
			$('#btnSaveKalibrasi').show();
			$('#input_keterangan').hide();
			$('#btnSaveKalibrasiSelesai').hide();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#input_kondisi').hide();
			$('#input_petugas').hide();
		} else if (data == "3") {
			document.getElementById("status_kalibrasi").value = 4;
			document.getElementById("aktif").value = 1;
			$('#btnSaveKalibrasi').hide();
			$('#input_keterangan').show();
			$('#input_tindakan').hide();
			$('#btnSaveKalibrasiSelesai').show();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
			$('#input_kondisi').show();
			$('#input_petugas').hide();
		} else if (data == "4") {
			document.getElementById("status_kalibrasi").value = 4;
			document.getElementById("aktif").value = 1;
			$('#btnSaveKalibrasi').hide();
			$('#btnSaveKalibrasiSelesai').hide();
			$('#input_petugas').hide();
			$('#input_keterangan').hide();
			$('#input_tindakan').hide();
			$('#input_kondisi').hide();
			$('#input_awal_kalibrasi').hide();
			$('#input_selanjutnnya_kalibrasi').hide();
		}
	}

	function FilterTombolSave() {

		var data = document.getElementById("lokasi").value;

		if (data == "Lab PCR") {
			$('#btnSavePCR').show();
			$('#btnSaveMikrobiologi').hide();
			$('#btnSaveInstrument').hide();
			$('#btnSaveMTS').hide();
			$('#btnSaveOMG').hide();
			$('#btnSaveBBG').hide();
			$('#btnSaveLingkungan').hide();
			$('#btnSave').hide();
		} else if (data == "Lab Mikrobiologi") {
			$('#btnSavePCR').hide();
			$('#btnSaveMikrobiologi').show();
			$('#btnSaveInstrument').hide();
			$('#btnSaveMTS').hide();
			$('#btnSaveOMG').hide();
			$('#btnSaveBBG').hide();
			$('#btnSaveLingkungan').hide();
			$('#btnSave').hide();
		} else if (data == "Lab Instrument") {
			$('#btnSavePCR').hide();
			$('#btnSaveMikrobiologi').hide();
			$('#btnSaveInstrument').show();
			$('#btnSaveMTS').hide();
			$('#btnSaveOMG').hide();
			$('#btnSaveBBG').hide();
			$('#btnSaveLingkungan').hide();
			$('#btnSave').hide();
		} else if (data == "Lab Kimia 1 MTS") {
			$('#btnSavePCR').hide();
			$('#btnSaveMikrobiologi').hide();
			$('#btnSaveInstrument').hide();
			$('#btnSaveMTS').show();
			$('#btnSaveOMG').hide();
			$('#btnSaveBBG').hide();
			$('#btnSaveLingkungan').hide();
			$('#btnSave').hide();
		} else if (data == "Lab Kimia 1 OMG") {
			$('#btnSavePCR').hide();
			$('#btnSaveMikrobiologi').hide();
			$('#btnSaveInstrument').hide();
			$('#btnSaveMTS').hide();
			$('#btnSaveOMG').show();
			$('#btnSaveBBG').hide();
			$('#btnSaveLingkungan').hide();
			$('#btnSave').hide();
		} else if (data == "Lab Kimia 2 BBG") {
			$('#btnSavePCR').hide();
			$('#btnSaveMikrobiologi').hide();
			$('#btnSaveInstrument').hide();
			$('#btnSaveMTS').hide();
			$('#btnSaveOMG').hide();
			$('#btnSaveBBG').show();
			$('#btnSaveLingkungan').hide();
			$('#btnSave').hide();
			t
		} else if (data == "Lab Kimia 3 Lingkungan") {
			$('#btnSavePCR').hide();
			$('#btnSaveMikrobiologi').hide();
			$('#btnSaveInstrument').hide();
			$('#btnSaveMTS').hide();
			$('#btnSaveOMG').hide();
			$('#btnSaveBBG').hide();
			$('#btnSaveLingkungan').show();
			$('#btnSave').hide();
		} else if (data == "") {
			$('#btnSavePCR').hide();
			$('#btnSaveMikrobiologi').hide();
			$('#btnSaveInstrument').hide();
			$('#btnSaveMTS').hide();
			$('#btnSaveOMG').hide();
			$('#btnSaveBBG').hide();
			$('#btnSaveLingkungan').hide();
			$('#btnSave').hide();
		}
	}
</script>


<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body ui-front form">
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
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="no_aset">No Aset SAP</label>
								<input type="text" class="form-control" id="no_aset" name="no_aset" placeholder="No Aset SAP">
								<div class="invalid-feedback">
									Please provide a No Aset SAP.
								</div>
							</div>
						</div>


						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="merek">Merek</label>
								<input type="text" class="form-control" id="merek" name="merek" placeholder="Merek">
								<div class="invalid-feedback">
									Please provide a Merek.
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="seri">Seri Model</label>
								<input type="text" class="form-control" id="seri" name="seri" placeholder="Seri Model">
								<div class="invalid-feedback">
									Please provide a Seri.
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="serial_number">Serial Number</label>
								<input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="Serial Number">
								<div class="invalid-feedback">
									Please provide a Serial Number.
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="tahun">Tahun</label>
								<input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
								<div class="invalid-feedback">
									Please provide a Tahun.
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label" for="lokasi">Lokasi</label>
								<select class="form-select" id="lokasi" name="lokasi" onchange="FilterTombolSave()">
									<option disabled value="">Pilih Lokasi Lab</option>
									<option value="Lab PCR">Lab PCR</option>
									<option value="Lab Mikrobiologi">Lab Mikrobiologi</option>
									<option value="Lab Instrument">Lab Instrument</option>
									<option value="Lab Kimia 1 MTS">Lab Kimia 1 MTS</option>
									<option value="Lab Kimia 1 OMG">Lab Kimia 1 OMG</option>
									<option value="Lab Kimia 2 BBG">Lab Kimia 2 BBG</option>
									<option value="Lab Kimia 3 Lingkungan">Lab Kimia 3 Lingkungan</option>
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

						<div class="col-md-3" style="display: none;" id="input_tindakan">
							<div class="mb-3">
								<label class="form-label" for="tindakan">Tindakan</label>
								<select class="form-select" id="tindakan" name="tindakan" onchange="return FilterTindakan();">
									<option disabled value="">-Pilih Tindakan</option>
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
								<input type="text" class="form-control" id="petugas" name="petugas" placeholder="Nama Petugas"></input>
								<div class="invalid-feedback">
									Please provide a Tahun.
								</div>
							</div>
						</div>
						<div class="col-md-9" id="input_keterangan" style="display: none;">
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
								<input type="text" class="form-control" id="user_input" name="user_input" placeholder="User Input">
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
								<label for="id_log_instrumen" class="form-label">id_log_instrumen</label>
								<input class="form-control" type="text" id="id_log_instrumen" name="id_log_instrumen">
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
					<!-- <div class="row" id="input_suhu">
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="suhu_awal">suhu_awal</label>
									<input type="text" class="form-control" id="suhu_awal" name="suhu_awal" placeholder="suhu_awal">
									<div class="invalid-feedback">
										Please provide a suhu_awal.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="suhu_ahkir">suhu_ahkir</label>
									<input type="text" class="form-control" id="suhu_ahkir" name="suhu_ahkir" placeholder="suhu_ahkir">
									<div class="invalid-feedback">
										Please provide a suhu_ahkir.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="kelembaban_awal">kelembaban_awal</label>
									<input type="text" class="form-control" id="kelembaban_awal" name="kelembaban_awal" placeholder="kelembaban_awal">
									<div class="invalid-feedback">
										Please provide a kelembaban_awal.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="kelembaban_ahkir">kelembaban_ahkir</label>
									<input type="text" class="form-control" id="kelembaban_ahkir" name="kelembaban_ahkir" placeholder="kelembaban_ahkir">
									<div class="invalid-feedback">
										Please provide a kelembaban_ahkir.
									</div>
								</div>
							</div>
						</div>
						<div class="row" id="input_pengulangan">

							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="Pengulangan">Pengulangan</label>
									<input type="text" class="form-control" id="Pengulangan1" name="Pengulangan1" placeholder="Pengulangan1" value="1" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="berat_kosong1">Berat Kosong</label>
									<input type="text" class="form-control" id="berat_kosong1" name="berat_kosong1" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="berat_isi1">Berat Isi</label>
									<input type="text" class="form-control" id="berat_isi1" name="berat_isi1" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="hasil">hasil</label>
									<input type="text" class="form-control" id="hasil" name="hasil" placeholder="hasil">
									<div class="invalid-feedback">
										Please provide a hasil.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="suhu_akuades1">Suhu Akuades</label>
									<input type="text" class="form-control" id="suhu_akuades1" name="suhu_akuades1" placeholder="suhu_akuades" onkeyup="HitungRumus()">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="Pengulangan" name="Pengulangan" placeholder="Pengulangan" value="2" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="suhu_akuades">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="Pengulangan" name="Pengulangan" placeholder="Pengulangan" value="3" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="suhu_akuades">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="Pengulangan" name="Pengulangan" placeholder="Pengulangan" value="4" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="suhu_akuades">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="Pengulangan" name="Pengulangan" placeholder="Pengulangan" value="5" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="suhu_akuades">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="Pengulangan" name="Pengulangan" placeholder="Pengulangan" value="6" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="suhu_akuades">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="Pengulangan" name="Pengulangan" placeholder="Pengulangan" value="7" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="suhu_akuades">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="Pengulangan" name="Pengulangan" placeholder="Pengulangan" value="8" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="suhu_akuades">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="Pengulangan" name="Pengulangan" placeholder="Pengulangan" value="9" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="suhu_akuades">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="Pengulangan" name="Pengulangan" placeholder="Pengulangan" value="10" style="text-align:center" readonly>
									<div class="invalid-feedback">
										Please provide a pengulangan.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_kosong" name="berat_kosong" placeholder="berat_kosong">
									<div class="invalid-feedback">
										Please provide a berat_kosong.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="berat_isi">
									<div class="invalid-feedback">
										Please provide a berat_isi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">

									<input type="text" class="form-control" id="suhu_akuades" name="suhu_akuades" placeholder="suhu_akuades">
									<div class="invalid-feedback">
										Please provide a suhu_akuades.
									</div>
								</div>
							</div>


						</div>
						<div class="row" id="input_ketetapan">

							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="Q">Q</label>
									<input type="text" class="form-control" id="Q" name="Q" placeholder="Q" value="1,000013">
									<div class="invalid-feedback">
										Please provide a Q.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="W">ρ_W−ρ_A</label>
									<input type="text" class="form-control" id="W" name="W" placeholder="ρ_W−ρ_A " value="1,00300701503106">
									<div class="invalid-feedback">
										Please provide a va.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="A">ρ_A/ρ_AT</label>
									<input type="text" class="form-control" id="A" name="A" placeholder="ρ_A/ρ_AT" value="0,999845758354756">
									<div class="invalid-feedback">
										Please provide a koreksi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="Y">ϒ</label>
									<input type="text" class="form-control" id="ϒ" name="ϒ" placeholder="ϒ" value="0,00001">
									<div class="invalid-feedback">
										Please provide a ϒ.
									</div>
								</div>
							</div>
						</div>

						<div class="row" id="input_hasil_rumus">

							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="vm">Volume Nominal (mL)</label>
									<input type="text" class="form-control" id="vm" name="vm" placeholder="Volume Nominal (mL)">
									<div class="invalid-feedback">
										Please provide a vm.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="va">Volume Aktual (V<sub>20</sub>) (mL)</label>
									<input type="text" class="form-control" id="va" name="va" placeholder="Volume Aktual (mL) ">
									<div class="invalid-feedback">
										Please provide a va.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="Koreksi">Koreksi (mL)</label>
									<input type="text" class="form-control" id="koreksi" name="koreksi" placeholder="Koreksi (mL)">
									<div class="invalid-feedback">
										Please provide a koreksi.
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="ketidakpastian">Ketidakpastian (±) (μL)</label>
									<input type="text" class="form-control" id="ketidakpastian" name="ketidakpastian" placeholder="Ketidakpastian">
									<div class="invalid-feedback">
										Please provide a ketidakpastian.
									</div>
								</div>
							</div>
						</div> -->

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
				<button type="button" id="btnSaveKalibrasi" onclick="SaveKalibrasi()" class="btn btn-primary">Mulai Kalibrasi</button>
				<button type="button" id="btnSaveKalibrasiSelesai" onclick="SaveKalibrasiSelesai()" class="btn btn-primary">Selesai Kalibrasi</button>
				<button type="button" id="btnSavePCR" onclick="savePCR()" class="btn btn-primary">SimpanPCR</button>
				<button type="button" id="btnSaveMikrobiologi" onclick="SaveMKR()" class="btn btn-primary">Simpan Mikro</button>
				<button type="button" id="btnSaveInstrument" onclick="SaveINS()" class="btn btn-primary">Simpan Ins</button>
				<button type="button" id="btnSaveMTS" onclick="SaveMTS()" class="btn btn-primary">Simpan Mts</button>
				<button type="button" id="btnSaveOMG" onclick="SaveOMG()" class="btn btn-primary">Simpan Omg</button>
				<button type="button" id="btnSaveBBG" onclick="SaveBBG()" class="btn btn-primary">Simpan BBG</button>
				<button type="button" id="btnSaveLingkungan" onclick="SaveLGK()" class="btn btn-primary">Simpan Lingkungan</button>
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_riwayat_form" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<!-- <h5 class="form-label">Riwayat Instrumen-</h5> -->
				<h5 class="modal-title" id="myLargeModalLabel">Riwayat Instrumen </h5>

				<button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<div class="row">
					<div class="col-md-2">
						<div class="mb-3">
							<label class="form-label" for="id_aset2">Id Aset</label>
							<input type="text" class="form-control" id="id_aset2" name="id_aset2" placeholder="id_aset" readonly>
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
							<th>Cetak</th>
							<th>No</th>
							<th>Id Log</th>
							<th>Id Instumen</th>
							<th>Tindakan</th>
							<th>Petugas</th>
							<th>Mulai Kalibrasi</th>
							<th>Selesai Kalibrasi</th>
							<th>Kondisi</th>
							<th>Keterangan</th>
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
</body>

</html>