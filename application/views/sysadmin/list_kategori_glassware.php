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
					<input type="text" class="form-control" id="akses_delete" name="akses_delete" value=" <?= $dataAkses['delete']; ?>">
				</div>
			</div>

			<div class="row">
				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-info">Total Instrumen</span></span>
									<h1 class="mb-3">
										<?= $jumlah; ?>
									</h1>
								</div>


							</div>

						</div><!-- end card body -->
					</div><!-- end card -->
				</div><!-- end col -->

				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-success">Sudah Dikalibrasi</span></span>
									<h1 class="mb-3">
										<?= $sudah_dikalibrasi; ?>
									</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col-->
				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-primary">Sedang Dikalibrasi</span></span>
									<h1 class="mb-3">
										<?= $sedang_dikalibrasi; ?>
									</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col-->
				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-warning">Belum Dikalibrasi</span></span>
									<h1 class="mb-3">
										<?= $belum_dikalibrasi; ?>
									</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col -->

				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-danger">Instrumen Rusak</span></span>
									<h1 class="mb-3">
										<?= $instrumen_rusak; ?>
									</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col -->
			</div>

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
								<div class="col-md-6">
									<h2 class="mb-sm-0 font-size-32">Daftar Kategori Glassware</h2>
								</div>

								<div class="col-md-6">
									<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

										<div>
											<a class="btn btn-primary" id="btn_tambah_baru" onclick="Fungsi_Tambah()"><i class="bx bx-plus me-1"></i> Tambah Baru</a>
											<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
										</div>


									</div>

								</div>
							</div>
						</div>
						<div class="card-body">
							<table id="tabel_instrumen" class="table table-bordered dt-responsive compact nowrap w-100 ">
								<thead>
									<tr>
										<th width="10px">Menu</th>
										<th width="10px">No</th>

										<th width="10px">Kode</th>
										<th>Kategori</th>
										<th>Jumlah</th>
										<th>Periode Kalibrasi ( Hari )</th>


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
<!-- Datatable init js -->
<!-- <script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
	$(window).on('load', function() {
		(document.body.getAttribute('data-sidebar-size') == "sm") ? document.body.setAttribute('data-sidebar-size', 'sm'): document.body.setAttribute('data-sidebar-size', 'sm')

		$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();
		// 
		// reload_table();

		CekAksesUser();
	});
	$(document).ready(function() {
		//Buttons examples
		var tipe = "<?= $dataSession['tipe']; ?>";


		if (tipe == 'SysAdmin') {

			$('#Halaman_Sysadmin').show();
		}
		var table = $('#tabel_instrumen').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[2, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_kategori_glassware') ?>",
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
					"visible": document.getElementById('akses_delete').value == 1
				},
				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				}

			],

		});



	});

	function CekAksesUser() {



		if (document.getElementById('akses_read').value != 1) {

			window.location.replace('<?= base_url('dashboard'); ?>');
		}

		if (document.getElementById('akses_create').value != 1) {

			$('#btn_tambah_baru').hide();


		}

	}

	function Fungsi_Tambah() {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah Kategori Instrumen'); // Set Title to Bootstrap modal title

	}

	function save() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;

		if (save_method == 'add') {

			url = "<?php echo site_url('sysadmin/Fungsi_Simpan') ?>";
			document.getElementById("id_instrumen").value = "<?= $id_instrumen; ?>";
		} else {
			url = "<?php echo site_url('sysadmin/Save_Update_Kategori_Glassware') ?>";
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

	function reload_table_dan_page() {
		$('#tabel_instrumen').DataTable().ajax.reload();
		location.reload();
	}

	function reload_table() {
		$('#tabel_instrumen').DataTable().ajax.reload();

	}

	function Btn_Edit(id_instrumen) {
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string

		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('Sysadmin/Fungsi_Edit_Kategori_Glassware') ?>/" + id_instrumen,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_instrumen"]').val(data.id_instrumen);

				$('[name="kategori"]').val(data.kategori_instrumen);

				$('[name="periode_kalibrasi"]').val(data.periode_kalibrasi);


				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Kategori Instrumen'); // Set title to Bootstrap modal title

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function Btn_Hapus(id_instrumen) {


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
					url: "<?php echo site_url('sysadmin/Fungsi_Hapus') ?>/" + id_instrumen,
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

						<div class="col-md-8" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="id_instrumen">Kode Instrumen</label>
								<input type="text" class="form-control" id="id_instrumen" name="id_instrumen" placeholder="Id Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>
						<div class="col-md-4" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="jumlah">Jumlah</label>
								<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" readonly>
								<div class="invalid-feedback">
									Please provide a Jumlah.
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="mb-3">
								<label class="form-label" for="kategori">Nama Kategori</label>
								<input type="text" class="form-control" id="kategori" name="kategori" placeholder="Nama Kategori" required>
								<div class="invalid-feedback">
									Please provide a Nama Kategori.
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="periode">Periode Kalibrasi (H-7)</label>
								<select class="form-select" id="periode_kalibrasi" name="periode_kalibrasi">
									<option value="23">1 Bulan</option>
									<option value="54">2 Bulan</option>
									<option value="84">3 Bulan</option>
									<option value="115">4 Bulan</option>
									<option value="145">5 Bulan</option>
									<option value="176">6 Bulan</option>
									<option value="206">7 Bulan</option>
									<option value="236">8 Bulan</option>
									<option value="267">9 Bulan</option>
									<option value="297">10 Bulan</option>
									<option value="328">11 Bulan</option>
									<option value="358">12 Bulan</option>

								</select>
								<div class="valid-feedback">
									Please provide a Periode Kalibrasi.
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


</body>

</html>