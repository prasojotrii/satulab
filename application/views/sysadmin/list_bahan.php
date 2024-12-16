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

						<div class="card-body" onclick="filter_by_total_reagen()" style=" cursor: pointer;">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-info">Total Reagen</span></span>
									<h1 class="mb-3">
										<?= $total_reagen; ?>
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
						<div class="card-body" onclick="filter_by_jenis_cair()" style=" cursor: pointer;">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-success">Jenis Cair</span></span>
									<h1 class="mb-3">
										<?= $jenis_cair; ?>
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
						<div class="card-body" onclick="filter_by_jenis_padat()" style=" cursor: pointer;">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-primary">Jenis Padat</span></span>
									<h1 class="mb-3">
										<?= $jenis_padat; ?>
									</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col-->
				<div class="col">
					<!-- card -->
					<div class="card card-h-100" onclick="filter_by_jenis_prekursor()" style=" cursor: pointer;">
						<!-- card body -->
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-warning">Jenis Prekursor</span></span>
									<h1 class="mb-3">
										<?= $jenis_prekursor; ?>
									</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col -->
				<div class="col">
					<!-- card -->
					<div class="card card-h-100" onclick="filter_by_total_media()" style=" cursor: pointer;">
						<!-- card body -->
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-info">Total Media</span></span>
									<h1 class="mb-3">
										<?= $total_media; ?>
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
									<h2 class="mb-sm-0 font-size-32">Daftar Stock Reagen & Media</h2>
								</div>

								<div class="col-md-6">
									<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

										<div>
											<a class="btn btn-primary" id="btn_tambah_baru" onclick="add_master_bahan()"><i class="bx bx-plus me-1"></i> Tambah Baru</a>
											<a class="btn btn-primary" style="display: none;" id="btn_print_laporan" onclick="print_laporan_pemakaian()"><i class="bx bxs-report"></i> Laporan Pemakaian</a>
											<a class="btn btn-primary" style="display: none;" id="btn_daftar_expired" onclick="list_bahan_expired()"><i class="bx bxs-report"></i> Bahan Hampir Expired</a>
										</div>


									</div>

								</div>
							</div>
						</div>
						<div class="card-body">


							<table id="tb_bahan" class="table table-bordered compact nowrap w-100 ">
								<thead>
									<tr>
										<th width="10px">#</th>
										<th width="10px">No</th>
										<th width="10px">Kode</th>
										<th width="10px">Nama bahan</th>
										<th>Type</th>
										<th>Jenis</th>
										<th>Peringatan</th>
										<th>File MSDS</th>
										<th>Jumlah</th>
										<th>Status</th>
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


<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Tambah Master Reagen & Media</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">

				<form action="#" id="form_input_master_bahan" class="needs-validation" novalidate>
					<div class="row">

						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label form-label-sm" for="id_bahan">id bahan</label>
								<input type="text" class="form-control form-control-sm" id="id_bahan" name="id_bahan" placeholder="Id bahan" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<div class="mb-3">
								<label class="form-label" for="type_bahan">Type</label>
								<select class="form-select form-select-sm" id="type_bahan" name="type_bahan">
									<option value="">Pilih</option>
									<option value="Reagen">Reagen</option>
									<option value="Media">Media</option>

								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="nama_bahan">Nama Bahan</label>
								<input type="text" class="form-control form-control-sm" id="nama_bahan" name="nama_bahan" placeholder="Masukan Nama bahan " required>
							</div>
						</div>

						<div class="col-md-1">
							<div class="mb-3">
								<label class="form-label" for="kode_bahan">Kode</label>
								<input type="text" class="form-control form-control-sm" id="kode_bahan" name="kode_bahan" placeholder="Masukan Kode bahan " required>
							</div>
						</div>
						<div class="col-md-1">
							<div class="mb-3">
								<label class="form-label" for="jenis_bahan">Jenis</label>
								<select class="form-select form-select-sm" id="jenis_bahan" name="jenis_bahan">
									<option value="">Pilih</option>
									<option value="Cair">Cair</option>
									<option value="Padat">Padat</option>
									<option value="Prekursor">Prekursor</option>
									<option value="Suplemen">Suplemen</option>

								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="peringatan_bahaya">Peringatan Bahaya</label>
								<input type="text" class="form-control form-control-sm" id="peringatan_bahaya" name="peringatan_bahaya" placeholder="Masukan Peringatan Bahaya " required>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="input_file_msds">File MSDS</label>
								<input type="file" class="form-control form-control-sm" id="input_file_msds" name="input_file_msds">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save_master_bahan()" class="btn btn-primary">Tambah Bahan</button>
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal_stok_bahan" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="label_stock_bahan">Stok bahan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="card-body">



				<!-- <form id="" enctype="multipart/form-data"> -->
				<div id="input_stok_bahan" style="display: none;">
					<form action="#" id="form_input_bahan" class="needs-validation" novalidate>
						<div class="row">
							<div class="col-md-1" style="display: none;">
								<div class="mb-3">
									<label class="form-label form-label-sm" for="id_stok">id stok</label>
									<input type="text" class="form-control form-control-sm" id="id_stok" name="id_stok" placeholder="Id stok" readonly>

								</div>
							</div>
							<div class="col-md-1" style="display: none;">
								<div class="mb-3">
									<label class="form-label form-label-sm" for="filter_id_bahan">Filter</label>
									<input type="text" class="form-control form-control-sm" id="filter_id_bahan" name="filter_id_bahan" placeholder="Id Instrumen" readonly>

								</div>
							</div>

							<div class="col-md-1" style="display: none;">
								<div class="mb-3">
									<label class="form-label form-label-sm" for="filter_kode_bahan">Kode</label>
									<input type="text" class="form-control form-control-sm" id="filter_kode_bahan" name="filter_kode_bahan" placeholder="Id Instrumen" readonly>

								</div>
							</div>
							<div class="col-md-2" style="display: none;" id="input_kode_bahan">
								<div class="mb-3">
									<label class="form-label" for="kd_bahan">Kode Bahan</label>
									<input type="text" class="form-control form-control-sm" id="kd_bahan" name="kd_bahan" placeholder="Masukan Jumlah " required>
								</div>
							</div>
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="nomor_batch">Nomor Batch</label>
									<input type="text" class="form-control form-control-sm" id="nomor_batch" name="nomor_batch" placeholder="Masukan Nomor Batch " required>
								</div>
							</div>

							<div class="col-md-1">
								<div class="mb-3">
									<label class="form-label" for="kemasan">Kemasan</label>
									<input type="number" class="form-control form-control-sm" id="kemasan" name="kemasan" placeholder="Masukan Kemasan" required>
								</div>
							</div>
							<div class="col-md-1">
								<div class="mb-3">
									<label class="form-label" for="satuan_input">Satuan</label>
									<select class="form-select form-select-sm" id="satuan_input" name="satuan_input">
										<option value="">Pilih</option>
										<option value="mL">mL</option>
										<option value="L">L</option>
										<option value="gram">gram</option>
										<option value="Kg">Kg</option>
										<!-- <option value="Pcs">Pcs</option> -->
									</select>
								</div>
							</div>
							<div class="col-md-1">
								<div class="mb-3">
									<label class="form-label" for="jumlah">Jumlah</label>
									<input type="number" class="form-control form-control-sm" id="jumlah" name="jumlah" placeholder="Masukan Jumlah " required>
								</div>
							</div>

							<div class="col-md-1" style="display: none;" id="input_sisa_bahan">
								<div class="mb-3">
									<label class="form-label" for="sisa_stok">Sisa Stok</label>
									<input type="number" class="form-control form-control-sm" id="sisa_bahan" name="sisa_bahan" placeholder="Masukan Jumlah " required>
								</div>
							</div>

							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="merek">Merek</label>
									<input type="text" class="form-control form-control-sm" id="merek" name="merek" placeholder="Masukan merek " required>
								</div>
							</div>
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="lokasi_penyimpanan">Lokasi</label>
									<input type="text" class="form-control form-control-sm" id="lokasi_penyimpanan" name="lokasi_penyimpanan" placeholder="Masukan Lokasi " required>
								</div>
							</div>
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="Tanggal Datang">Tanggal Datang</label>
									<input type="date" class="form-control form-control-sm" id="tanggal_datang" name="tanggal_datang" value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>

							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="jumlah">Periode ED</label>
									<input type="text" class="form-control form-control-sm" id="period_ed" name="period_ed" placeholder="Tahun " required>
								</div>
							</div>
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="Tanggal Buka">Tanggal Buka</label>
									<input type="date" class="form-control form-control-sm" id="tanggal_buka" name="tanggal_buka">
								</div>
							</div>
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="tanggal_ed">Tanggal ED</label>
									<input type="date" class="form-control form-control-sm" id="tanggal_ed" name="tanggal_ed" placeholder="Masukan Tanggal ED " required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label" for="input_file_coa">File CoA</label>
									<input type="file" class="form-control form-control-sm" id="input_file_coa" name="input_file_coa">
								</div>
							</div>

						</div>
					</form>

					<div class="card-footer" style="display: flex; justify-content: space-between;">
						<div></div> <!-- Ini akan mengisi ruang di sebelah kiri -->

						<div class="hstack gap-2">

							<a id="btn_save_add_stok_bahan" class="btn btn-primary btn-sm" onclick="save_add_stok_bahan();">Tambah Stok</a>
						</div>
					</div>
				</div>
				<hr>


				<table id="tb_stok_bahan" class="table table-bordered compact nowrap w-100 ">
					<thead>
						<tr>
							<th width="10px">#</th>
							<th width="10px">No</th>

							<th>Kode</th>
							<th>Status</th>
							<th>Nomor Batch</th>

							<th>Kemasan</th>
							<th>Bahan Mati</th>
							<th>Bahan Sisa</th>
							<th>Satuan</th>
							<th>Periode ED</th>
							<th>Datang</th>
							<th>Buka</th>
							<th>Tanggal ED</th>
							<th>Merek</th>

							<th>Lokasi</th>
							<th>CoA</th>
							<!-- <th>MSDS</th> -->
							<!-- <th>#</th> -->
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div> -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_list_bahan_expired" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">

				<table id="tb_bahan_expired" class="table table-bordered compact nowrap w-100 ">
					<thead>
						<tr>
							<th width="10px">#</th>
							<th width="10px">No</th>

							<th>Kode</th>
							<th>Nomor Batch</th>
							<th>Kemasan</th>

							<th>Sisa Bahan</th>
							<th>Satuan</th>
							<th>Tanggal ED</th>
							<th>Merek</th>
							<th>Datang</th>
							<th>Buka</th>
							<th>Lokasi</th>
							<th>Status</th>
							<!-- <th>#</th> -->
						</tr>
					</thead>
					<tbody>

					</tbody>

				</table>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button> -->
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_pemakaian_bahan" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="label_pemakian_bahan">Stok bahan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<div id="input_input_pemakaian">
					<form action="#" id="form_input_pemakaian">
						<div class="row">
							<div class="col-md-1" style="display: none;">
								<div class="mb-3">
									<label class="form-label form-label-sm" for="id_bahan_pemakaian">id_bahan_pemakaian</label>
									<input type="text" class="form-control form-control-sm" id="id_bahan_pemakaian" name="id_bahan_pemakaian" placeholder="Id bahan" readonly>

								</div>
							</div>
							<div class="col-md-1" style="display: none;">
								<div class="mb-3">
									<label class="form-label form-label-sm" for="filter_kode_bahan_pemakaian">kode_bahan</label>
									<input type="text" class="form-control form-control-sm" id="filter_kode_bahan_pemakaian" name="filter_kode_bahan_pemakaian" placeholder="Id bahan" readonly>

								</div>
							</div>

							<div class="col-md-1" style="display: none;">
								<div class="mb-3">
									<label class="form-label" for="id_pemakaian">id pemakaian</label>
									<input type="text" class="form-control form-control-sm" id="id_pemakaian" name="id_pemakaian" placeholder="Masukan Nama bahan " readonly required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label" for="nama_bahan_pemakaian">Nama Bahan</label>
									<input type="text" class="form-control form-control-sm" id="nama_bahan_pemakaian" name="nama_bahan_pemakaian" placeholder="Masukan Nama bahan " readonly required>
								</div>
							</div>

							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="type_bahan_pemakaian">Type</label>
									<input type="text" class="form-control form-control-sm" id="type_bahan_pemakaian" name="type_bahan_pemakaian" placeholder="Masukan Kode bahan " readonly>
								</div>
							</div>
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="jenis_bahan">Jenis</label>
									<input type="text" class="form-control form-control-sm" id="jenis_bahan_pemakaian" name="jenis_bahan_pemakaian" placeholder="Masukan Jenis bahan " readonly>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label" for="peringatan_pemakaian">Peringatan Bahaya</label>
									<input type="text" class="form-control form-control-sm" id="peringatan_pemakaian" name="peringatan_pemakaian" placeholder="Masukan Peringatan Bahaya " readonly>
								</div>
							</div>
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="nama_analis">Nama Analis</label>
									<input type="text" class="form-control form-control-sm" id="nama_analis" name="nama_analis" readonly placeholder="Masukan Nama Analis" value="<?= $dataSession['nama']; ?>">
								</div>
							</div>

							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="penggunaan_analisa">Penggunaan Analisa</label>
									<input type="text" class="form-control form-control-sm" id="penggunaan_analisa" name="penggunaan_analisa" placeholder="Masukan Nomor Batch" required>
								</div>
							</div>

							<div class="col-md-1">
								<div class="mb-3">
									<label class="form-label" for="ambil">Ambil</label>
									<input type="number" class="form-control form-control-sm" id="ambil" name="ambil" placeholder="Masukan Ambil">
								</div>
							</div>
							<div class="col-md-1" style="display: none;">
								<div class="mb-3">
									<label class="form-label" for="ambil_convert">Jumlah _convert</label>
									<input type="number" class="form-control form-control-sm" id="ambil_convert" name="ambil_convert" placeholder="Masukan Ambil">
								</div>
							</div>

							<!-- <div class="col-md-1">
								<div class="mb-3">
									<label class="form-label" for="bahan_mati">Bahan Mati</label>
									<input type="number" class="form-control form-control-sm" id="bahan_mati" name="bahan_mati" placeholder="Masukan bahan_mati">
								</div>
							</div>
							<div class="col-md-1" style="display: none;">
								<div class="mb-3">
									<label class="form-label" for="bahan_mati">Bahan Mati _convert</label>
									<input type="number" class="form-control form-control-sm" id="bahan_mati_convert" name="bahan_mati_convert" placeholder="Masukan bahan_mati">
								</div>
							</div> -->
							<div class="col-md-1">
								<div class="mb-3">
									<label class="form-label" for="satuan_ambil">Satuan</label>
									<select class="form-select form-select-sm" id="satuan_ambil" name="satuan_ambil">
										<option value="">Pilih</option>
										<option value="mL">mL</option>
										<option value="L">L</option>
										<option value="mg">miligram</option>
										<option value="gram">gram</option>
										<option value="Kg">Kg</option>
										<!-- <option value="Buah">Buah</option> -->
									</select>
								</div>
							</div>
							<div class="col-md-1">
								<div class="mb-3">
									<label class="form-label" for="stok">Stok</label>
									<input type="number" class="form-control form-control-sm" id="stok" name="stok" readonly="Masukan Stok">
								</div>
							</div>
							<div class="col-md-1">
								<div class="mb-3">
									<label class="form-label" for="sisa">Sisa</label>
									<input type="number" class="form-control form-control-sm" id="sisa" name="sisa" readonly="Masukan Sisa">
								</div>
							</div>

							<div class="col-md-1">
								<div class="mb-3">
									<label class="form-label" for="satuan_pemakaian">Satuan</label>
									<input type="text" class="form-control form-control-sm" id="satuan_pemakaian" name="satuan_pemakaian" readonly>
								</div>
							</div>


							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label" for="tanggal_ambil">Tanggal Ambil</label>
									<input type="date" class="form-control form-control-sm" id="tanggal_ambil" name="tanggal_ambil" value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>


						</div>
					</form>

					<div class="card-footer" style="display: flex; justify-content: space-between;">
						<div></div> <!-- Ini akan mengisi ruang di sebelah kiri -->

						<div class="hstack gap-2">
							<a id="btn_save_add_stok_bahan_habis" style="display: none;" class="btn btn-danger btn-sm" onclick="update_stok_habis();">Tandai Stok Habis</a>
							<a id="btn_add_ticket_request" style="display: none;" class="btn btn-primary btn-sm" onclick="save_pemakaian_bahan();">Submit Pemakaian</a>
						</div>
					</div>
				</div>
				<hr>
				<table id="tb_pemakaian_bahan" class="table table-bordered compact nowrap w-100 ">
					<thead>
						<tr>
							<th width="10px">#</th>
							<th width="10px">No</th>
							<th>Nama Analis</th>
							<th>Analisa</th>
							<th>Ambil</th>
							<!-- <th>Mati</th> -->
							<th>Stok</th>
							<th>Sisa</th>
							<th>Satuan</th>
							<th>Tanggal Ambil</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button> -->
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal_laporan" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="label_print_laporan">Print Laporan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<form id="myForm" target="_blank" action="<?php echo site_url('sysadmin/laporan_stok_bahan') ?>" method="post">

					<div class="row">

						<div class="col-lg-6">
							<div class="mt-3 mt-lg-0">
								<div class="mb-3">
									<label for="example-month-input" class="form-label">Pilih Bahan</label><br>
									<select class="form-select form-select-sm" id="filter_bahan" name="filter_bahan" placeholder="Input Bahan">
									</select>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="mt-3 mt-lg-0">

								<div class="mb-3">
									<label for="example-month-input" class="form-label">Pilih Periode</label>
									<input class="form-control" type="month" id="filter_bulan_print" name="filter_bulan_print">
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer" style="display: flex; justify-content: space-between;">
						<div></div> <!-- Ini akan mengisi ruang di sebelah kiri -->

						<div class="hstack gap-2">
							<button type="submit" class="btn btn-primary" id="btn_print_laporan_bahan">Print</button>


						</div>
					</div>

					<!-- </form>
				<button class="btn btn-primary" onclick="btn_print_laporan_bahan()" id="test">test</button> -->

			</div><!-- /.modal-dialog -->
			<!-- <div class="modal-body">
				<a id="cek_input" class="btn btn-primary btn-sm" onclick="cek_input();">Submit Pemakaian</a>
			</div> -->
		</div>
	</div>
</div>
<!-- JAVASCRIPT -->
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="<?= base_url(); ?>assets/libs/pace-js/pace.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>

<!-- <script src="<?= base_url(); ?>assets/js/ajax.js"></script> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
<script>
	document.addEventListener("DOMContentLoaded", function() {
		var inputElements = document.querySelectorAll("input[type='number']");

		inputElements.forEach(function(inputElement) {
			inputElement.addEventListener("input", function() {
				var nilai = parseInt(inputElement.value);
				if (nilai < 0) {
					inputElement.value = 0;
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(window).on('load', function() {
		// (document.body.getAttribute('data-sidebar-size') == "sm") ? document.body.setAttribute('data-sidebar-size', 'sm'): document.body.setAttribute('data-sidebar-size', 'sm')

		$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();
		// 
		// reload_table();

		CekAksesUser();
	});
	$(document).ready(function() {
		//Buttons examples
		// 



		$("#lokasi_penyimpanan").autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/get_lokasi_penyimpanan'); ?>",
					dataType: "json",
					data: {
						term: request.term
					},
					success: function(data) {

						response($.map(data, function(item) {
							return {

								value: item.lokasi_penyimpanan
							};
						}));
					}
				});
			},
			minLength: 1, // Minimal karakter sebelum autocomplete aktif
			select: function(event, ui) {
				// Aksi yang dilakukan saat salah satu item dipilih
				console.log("Selected: " + ui.item.label);
				$("#selectedLabel").text(ui.item.label);
			}
		});

		$("#merek").autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/get_merek'); ?>",
					dataType: "json",
					data: {
						term: request.term
					},
					success: function(data) {

						response($.map(data, function(item) {
							return {

								value: item.merek
							};
						}));
					}
				});
			},
			minLength: 1, // Minimal karakter sebelum autocomplete aktif
			select: function(event, ui) {
				// Aksi yang dilakukan saat salah satu item dipilih
				console.log("Selected: " + ui.item.label);
				$("#selectedLabel").text(ui.item.label);
			}
		});



		var tipe = "<?= $dataSession['tipe']; ?>";


		if (tipe == 'SysAdmin') {

			$('#Halaman_Sysadmin').show();
		}

		var tb_bahan = $('#tb_bahan').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[0, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_bahan') ?>",
				"type": "POST"
			},

			"dom": 'Blfrtp',

			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"orderable": false,
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == 1,
				},
				{
					"targets": 3,


					"render": function(data, type, full, meta) {
						return type === 'display' && data.length > 30 ?
							'<span title="' + data + '">' + data.substr(0, 30) + '.......</span>' :
							data;
					}

				},
				{
					"targets": 9,
					// "data": null,

					"className": "text-center",

					"render": function(data, type, row) {
						var html = ""

						if (data == 'Tersedia') {
							html = "<span class='badge bg-success'>Tersedia</span>"

						} else if (data == 'Tidak Tersedia') {
							html = "<span class='badge bg-danger'>Tidak Tersedia</span>"

						}
						return html;


					}
				},



			],

			initComplete: function(settings, json) {
				$("#tb_bahan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},

		});



	});



	function CekAksesUser() {



		if (document.getElementById('akses_read').value != 1) {

			window.location.replace('<?= base_url('dashboard'); ?>');
		}

		if (document.getElementById('akses_create').value != 1) {

			$('#btn_tambah_baru').hide();

		}
		if (document.getElementById('akses_update').value == 1) {

			$('#btn_print_laporan').show();
			$('#btn_daftar_expired').show();

			$('#input_stok_bahan').show();
			// $('#tb_stok_bahan').DataTable().columns([11]).visible(false);
			// $('#tb_stok_bahan').DataTable().columns([12]).visible(true);
		}
		if (document.getElementById('akses_update').value != 1) {

			$('#btn_print_laporan').hide();
			$('#input_stok_bahan').hide();
			$('#btn_daftar_expired').hide();
			// $('#tb_stok_bahan').DataTable().columns([11]).visible(true);
			// $('#tb_stok_bahan').DataTable().columns([12]).visible(false);
		}

	}


	function cek_input() {

		var test = $('#filter_bahan').val();
		var test2 = $('#filter_bulan_print').val();
		alert(test);
	}

	function add_master_bahan() {
		save_method = 'add';
		$('#form_input_master_bahan')[0].reset();
		$('#modal_form').modal('show');
		$('.modal-title').text('Tambah Master Reagen & Media');
	}

	function filter_by_total_reagen() {

		$('#tb_bahan').DataTable().clear().destroy();
		var filter_type_bahan = 'Reagen';
		var tb_bahan = $('#tb_bahan').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[0, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_bahan') ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_type_bahan: filter_type_bahan,
				}
			},

			"dom": 'Blfrtp',

			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"orderable": false,
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == 1,
				},
				{
					"targets": 9,
					// "data": null,

					"className": "text-center",

					"render": function(data, type, row) {
						var html = ""

						if (data == 'Tersedia') {
							html = "<span class='badge bg-success'>Tersedia</span>"

						} else if (data == 'Tidak Tersedia') {
							html = "<span class='badge bg-danger'>Tidak Tersedia</span>"

						}
						return html;


					}
				},



			],

			initComplete: function(settings, json) {
				$("#tb_bahan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},

		});
	}

	function filter_by_jenis_cair() {
		$('#tb_bahan').DataTable().clear().destroy();
		var filter_jenis_bahan = 'Cair';
		var tb_bahan = $('#tb_bahan').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[0, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_bahan') ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_jenis_bahan: filter_jenis_bahan,
				}
			},

			"dom": 'Blfrtp',

			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"orderable": false,
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == 1,
				},
				{
					"targets": 9,
					// "data": null,

					"className": "text-center",

					"render": function(data, type, row) {
						var html = ""

						if (data == 'Tersedia') {
							html = "<span class='badge bg-success'>Tersedia</span>"

						} else if (data == 'Tidak Tersedia') {
							html = "<span class='badge bg-danger'>Tidak Tersedia</span>"

						}
						return html;


					}
				},



			],

			initComplete: function(settings, json) {
				$("#tb_bahan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},

		});
	}

	function filter_by_jenis_padat() {
		$('#tb_bahan').DataTable().clear().destroy();
		var filter_jenis_bahan = 'Padat';
		var tb_bahan = $('#tb_bahan').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[0, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_bahan') ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_jenis_bahan: filter_jenis_bahan,
				}
			},

			"dom": 'Blfrtp',

			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"orderable": false,
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == 1,
				},
				{
					"targets": 9,
					// "data": null,

					"className": "text-center",

					"render": function(data, type, row) {
						var html = ""

						if (data == 'Tersedia') {
							html = "<span class='badge bg-success'>Tersedia</span>"

						} else if (data == 'Tidak Tersedia') {
							html = "<span class='badge bg-danger'>Tidak Tersedia</span>"

						}
						return html;


					}
				},



			],

			initComplete: function(settings, json) {
				$("#tb_bahan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},

		});
	}

	function filter_by_jenis_prekursor() {
		$('#tb_bahan').DataTable().clear().destroy();
		var filter_jenis_bahan = 'Prekursor';
		var tb_bahan = $('#tb_bahan').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[0, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_bahan') ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_jenis_bahan: filter_jenis_bahan,
				}
			},

			"dom": 'Blfrtp',

			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"orderable": false,
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == 1,
				},
				{
					"targets": 9,
					// "data": null,

					"className": "text-center",

					"render": function(data, type, row) {
						var html = ""

						if (data == 'Tersedia') {
							html = "<span class='badge bg-success'>Tersedia</span>"

						} else if (data == 'Tidak Tersedia') {
							html = "<span class='badge bg-danger'>Tidak Tersedia</span>"

						}
						return html;


					}
				},



			],

			initComplete: function(settings, json) {
				$("#tb_bahan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},

		});
	}

	function filter_by_total_media() {
		$('#tb_bahan').DataTable().clear().destroy();
		var filter_type_bahan = 'Media';
		var tb_bahan = $('#tb_bahan').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[0, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_bahan') ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_type_bahan: filter_type_bahan,
				}
			},

			"dom": 'Blfrtp',

			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"orderable": false,
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == 1,
				},
				{
					"targets": 9,
					// "data": null,

					"className": "text-center",

					"render": function(data, type, row) {
						var html = ""

						if (data == 'Tersedia') {
							html = "<span class='badge bg-success'>Tersedia</span>"

						} else if (data == 'Tidak Tersedia') {
							html = "<span class='badge bg-danger'>Tidak Tersedia</span>"

						}
						return html;


					}
				},



			],

			initComplete: function(settings, json) {
				$("#tb_bahan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},

		});
	}



	function print_laporan_pemakaian() {

		$('#modal_laporan').modal('show');
		$('.modal-title').text('Print Laporan Pemakaian');


		$('#filter_bahan').select2({
			dropdownParent: $("#modal_laporan"),

		});

		$.ajax({
			url: "<?php echo base_url('Sysadmin/get_daftar_bahan'); ?>",
			type: "POST",
			// data: {
			//     id_unit_support: id_unit_support
			// },
			dataType: "json",
			success: function(data) {

				$('#filter_bahan').empty();
				$('#filter_bahan').append('<option value="">-- List Bahan --</option>');
				$('#filter_bahan').append('<option value=""> Semua Bahan </option>');
				$.each(data, function(key, value) {

					$('#filter_bahan').append('<option value="' + value.id + '">' + value.nama_bahan + '</option>');
				});


			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from data user by unit');
			}
		});


	}

	function list_bahan_expired() {

		$('#modal_list_bahan_expired').modal('show');
		$('.modal-title').text('List Bahan Hampir Expired');



		$('#tb_bahan_expired').DataTable().clear().destroy();
		var tb_bahan_expired = $('#tb_bahan_expired').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			//Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"dom": 'Blfrtp',
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_bahan_stok_expired') ?>",
				"type": "POST",
				// "dataType": "json",
				// "data": {
				// 	id: id,
				// 	segment_2: segment_2,
				// }
			},



			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"orderable": false,
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == 1,
				},

				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				},
				// {
				// 	"targets": 11,
				// 	// "data": null,

				// 	"className": "text-center",

				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == '1') {
				// 			html = "<span class='badge bg-success'>Buka</span>"

				// 		} else if (data == '0') {
				// 			html = "<span class='badge bg-primary'>Segel</span>"

				// 		} else if (data == '2') {
				// 			html = "<span class='badge bg-danger'>Habis</span>"

				// 		}
				// 		return html;


				// 	}
				// }
			],

			initComplete: function(settings, json) {
				$("#tb_bahan_expired").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
				// if (document.getElementById('akses_delete').value == '1') {

				// 	$('#tb_stok_bahan').DataTable().columns([0]).visible(true);

				// }
			},

		});
	}


	function print_laporan() {
		var baru = $('#filter_bulan_print').val();
		alert(baru)
	}



	function save_master_bahan() {
		var baru = $('#id_bahan').val();
		var pernr = "<?= $dataSession['username']; ?>";
		var url = (baru == '') ? "<?php echo site_url('Sysadmin/save_master_bahan') ?>/" + pernr :
			"<?php echo site_url('Sysadmin/update_master_bahan') ?>/" + pernr;

		var formData = new FormData($('#form_input_master_bahan')[0]);

		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {
				// Sembunyikan modal
				$('#modal_form').modal('hide');

				$('#tb_bahan').DataTable().ajax.reload(null, false);

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
			}
		});
	}



	function save_add_stok_bahan() {
		let nomor_batch = document.getElementById('nomor_batch').value;
		let kemasan = document.getElementById('kemasan').value;
		let satuan_input = document.getElementById('satuan_input').value;
		let jumlah = document.getElementById('jumlah').value;
		let period_ed = document.getElementById('period_ed').value;
		let tanggal_ed = document.getElementById('tanggal_ed').value;

		let lokasi_penyimpanan = document.getElementById('lokasi_penyimpanan').value;
		let merek = document.getElementById('merek').value;
		var pernr = "<?= $dataSession['username']; ?>";
		if (nomor_batch == "" || kemasan == "" || satuan_input == "" || jumlah == "" || lokasi_penyimpanan == "" || merek == "") {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'input is empty',
				// footer: '<a href=""> Call IT (188 / 429) </a>'
			})
		} else if (period_ed == '' && tanggal_ed == '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Mohon Isi Tanggal ED',
				// footer: '<a href=""> Call IT (188 / 429) </a>'
			})
		} else {
			var baru = $('#id_stok').val();

			if (baru == '') {
				// alert('aasdasdsd');
				url = "<?php echo site_url('Sysadmin/save_stok_bahan') ?>/" + pernr;

			} else {
				// alert('asd');
				url = "<?php echo site_url('Sysadmin/update_stok_bahan') ?>/" + pernr;
			}
			// ajax adding data to database


			var formData = new FormData($('#form_input_bahan')[0]);
			$.ajax({
				url: url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				success: function(data) {
					$('#tb_bahan').DataTable().ajax.reload(null, false);

					$('#tb_stok_bahan').DataTable().ajax.reload(null, false);
					$('#id_stok').val('');
					$('#kode_bahan').val('');
					$('#nomor_batch').val('');
					$('#kemasan').val('');
					$('#jumlah').val('');
					$('#period_ed').val('');
					$('#satuan').val('');
					$('#tanggal_ed').val('');
					$('#tanggal_buka').val('');
					$('#merek').val('');
					$('#lokasi_penyimpanan').val('');
					$('#input_file_coa').val('');
					$('#input_sisa_bahan').hide();
					$('#input_kode_bahan').hide();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error adding / update data');
				}
			});
		}
	}


	function btn_edit_stok_bahan(id) {

		$('#id_stok').val(id)
		$('#input_sisa_bahan').show();
		$('#input_kode_bahan').show();
		$.ajax({
			url: "<?php echo base_url('Sysadmin/get_data_stok_bahan'); ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				id: id,

			},
			success: function(data) {
				document.getElementById('sisa_bahan').value = data.sisa_bahan;
				document.getElementById('kd_bahan').value = data.kode_bahan;
				document.getElementById('nomor_batch').value = data.nomor_batch;
				document.getElementById('kemasan').value = data.kemasan;
				document.getElementById('satuan_input').value = data.satuan;
				document.getElementById('jumlah').value = 1;
				document.getElementById('tanggal_ed').value = data.tanggal_ed;
				document.getElementById('period_ed').value = data.period_ed;
				document.getElementById('tanggal_datang').value = data.tanggal_datang;
				document.getElementById('merek').value = data.merek;
				document.getElementById('lokasi_penyimpanan').value = data.lokasi_penyimpanan;
				document.getElementById('tanggal_buka').value = data.tanggal_buka;
				$('#btn_save_add_stok_bahan').text('Save Stock');


			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from get_data_bahan');
			}
		});

	}

	function update_stok_habis() {
		var pernr = "<?= $dataSession['username']; ?>";
		var stok = $('#stok').val();
		if (stok == 0) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'stok empty',
				// footer: '<a href=""> Call IT (188 / 429) </a>'
			})
		} else {
			var id = $('#id_bahan_pemakaian').val();
			var baru = $('#id_pemakaian').val();
			if (baru == '') {

				url = "<?php echo site_url('Sysadmin/update_pemakaian_bahan_habis') ?>/" + pernr;

			} else {

				url = "<?php echo site_url('Sysadmin/update_pemakaian_bahan') ?>/" + pernr;
			}
			// ajax adding data to database


			var formData = new FormData($('#form_input_pemakaian')[0]);
			$.ajax({
				url: url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				success: function(data) {



					$.ajax({
						url: "<?php echo base_url('Sysadmin/get_data_bahan'); ?>",
						type: "POST",
						dataType: "JSON",
						data: {
							id: id,

						},
						success: function(data) {

							document.getElementById('stok').value = data.sisa_bahan;

							$('#tb_bahan').DataTable().ajax.reload();
							$('#tb_stok_bahan').DataTable().ajax.reload();
							$('#tb_pemakaian_bahan').DataTable().ajax.reload();

							$('#tb_bahan').DataTable().ajax.reload();
							$('#penggunaan_analisa').val('')
							$('#ambil').val('')
							$('#id_pemakaian').val('')
							$('#bahan_mati').val('')
							// $('#tanggal_ambil').val('')


							// $("#ambil").prop("readonly", true);
							$("#stok").prop("readonly", true);
							$("#sisa").prop("readonly", true);
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error get data from get_data_bahan');
						}
					});



				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error adding / update data');
				}
			});
		}
	}

	function save_pemakaian_bahan() {
		var sisa = $('#sisa').val();

		if (sisa < 0) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Jumlah input tidak sesuai',
				// footer: '<a href=""> Call IT (188 / 429) </a>'
			})
		} else {
			let penggunaan_analisa = document.getElementById('penggunaan_analisa').value;
			let ambil = document.getElementById('ambil').value;
			let tanggal_ambil = document.getElementById('tanggal_ambil').value;
			let satuan_ambil = document.getElementById('satuan_ambil').value;
			if (satuan_ambil == "") {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Pilih Satuan Ambil',
					// footer: '<a href=""> Call IT (188 / 429) </a>'
				})
			} else if (ambil == 0) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'stok empty',
					// footer: '<a href=""> Call IT (188 / 429) </a>'
				})
			} else if (penggunaan_analisa == "" || ambil == "" || tanggal_ambil == "" || satuan_ambil == "") {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'input is empty',

					// footer: '<a href=""> Call IT (188 / 429) </a>'
				})
			} else {

				var id = $('#id_bahan_pemakaian').val();
				$.ajax({
					url: "<?php echo base_url('Sysadmin/get_data_bahan'); ?>",
					type: "POST",
					dataType: "JSON",
					data: {
						id: id,

					},
					success: function(data) {
						var baru = $('#id_pemakaian').val();

						var ambil = document.getElementById('ambil_convert').value;

						if (id == '') {
							var sisa_bahan = data.sisa_bahan;
							var stok = document.getElementById('stok').value;
							var hasil = sisa_bahan - ambil;

							// alert(sisa_bahan);
							// alert(stok);


						} else {
							var sisa_bahan = data.sisa_bahan;
							var hasil = $('#stok').val() - ambil;
							var stok = document.getElementById('stok').value;

							// alert(sisa_bahan);
							// alert(stok);
						}



						if (sisa_bahan !== stok) {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'yah maaf, stok barusan di gunakan analis lain ',
								// footer: '<a href=""> Call IT (188 / 429) </a>'
							})
							var id = $('#id_bahan_pemakaian').val();

							$.ajax({
								url: "<?php echo base_url('Sysadmin/get_data_bahan'); ?>",
								type: "POST",
								dataType: "JSON",
								data: {
									id: id,

								},
								success: function(data2) {
									var baru = $('#id_pemakaian').val();

									if (baru == '') {
										var sisa_bahan2 = data2.sisa_bahan;

										document.getElementById('stok').value = sisa_bahan2;
									}

									$('#ambil').val('')
									$('#tb_bahan').DataTable().ajax.reload();
									$('#tb_stok_bahan').DataTable().ajax.reload();
									$('#tb_pemakaian_bahan').DataTable().ajax.reload();

									// hitungSisa();

								}
							});

						} else {

							var pernr = "<?= $dataSession['username']; ?>";
							if (baru == '') {
								url = "<?php echo site_url('Sysadmin/save_pemakaian_bahan') ?>/" + pernr;
							} else {
								url = "<?php echo site_url('Sysadmin/update_pemakaian_bahan') ?>/" + pernr;
							}
							// ajax adding data to database
							var formData = new FormData($('#form_input_pemakaian')[0]);
							$.ajax({
								url: url,
								type: "POST",
								data: formData,
								contentType: false,
								processData: false,
								dataType: "JSON",
								success: function(data) {

									$.ajax({
										url: "<?php echo base_url('Sysadmin/get_data_bahan'); ?>",
										type: "POST",
										dataType: "JSON",
										data: {
											id: id,

										},
										success: function(data) {

											document.getElementById('stok').value = data.sisa_bahan;

										},
										error: function(jqXHR, textStatus, errorThrown) {
											alert('Error get data from get_data_bahan');
										}
									});

									$('#tb_bahan').DataTable().ajax.reload();
									$('#tb_stok_bahan').DataTable().ajax.reload();
									$('#tb_pemakaian_bahan').DataTable().ajax.reload();
									$('#penggunaan_analisa').val('');
									$('#ambil').val('');
									$('#id_pemakaian').val('');
									$('#bahan_mati').val('');
									$('#satuan_ambil').val('');
									$('#tanggal_buka').val('');
									document.getElementById('sisa').value = '';
									$("#nama_analis").prop("readonly", true);
									$('#nama_analis').val('<?= $dataSession['nama']; ?>')
									$("#stok").prop("readonly", true);
									$("#sisa").prop("readonly", true);


								},
								error: function(jqXHR, textStatus, errorThrown) {
									alert('Error adding / update data');
								}
							});

						}


					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from get_data_bahan');
					}
				});


			}
		}
	}

	function btn_edit_bahan(id) {

		$('#modal_form').modal('show'); // show bootstrap modal

		$('#id_bahan').val(id)

		$.ajax({
			url: "<?php echo base_url('Sysadmin/get_data_bahan_master'); ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				id: id,

			},
			success: function(data) {


				document.getElementById('type_bahan').value = data.type_bahan;
				document.getElementById('nama_bahan').value = data.nama_bahan;
				document.getElementById('jenis_bahan').value = data.jenis_bahan;
				document.getElementById('kode_bahan').value = data.kode_bahan;
				document.getElementById('peringatan_bahaya').value = data.peringatan_bahaya;

				displayFileName();

				$('#btnSave').text('Save');


			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from get_data_bahan_master');
			}
		});

	}

	function displayFileName() {
		var input_file_msds = document.getElementById('input_file_msds');
		var file_msds_name = document.getElementById('file_msds_name');

		// Tampilkan nama file jika dipilih
		if (input_file_msds.files.length > 0) {
			file_msds_name.innerHTML = input_file_msds.files[0].name;
		} else {
			file_msds_name.innerHTML = '';
		}
	}

	function btn_stock_bahan(id, kode_bahan) {
		$('#input_sisa_bahan').hide();
		$('#input_kode_bahan').hide();
		$('#id_stok').val('');

		$('#kode_bahan').val('');
		$('#nomor_batch').val('');
		$('#kemasan').val('');
		$('#jumlah').val('');
		$('#period_ed').val('');
		$('#satuan_input').val('');
		$('#tanggal_ed').val('');
		$('#tanggal_buka').val('');
		$('#merek').val('');
		$('#lokasi_penyimpanan').val('');
		$('#input_file_coa').val('');
		$('#sisa_stok').val('');
		$("#lokasi_penyimpanan").on("change", function() {
			// Mendapatkan nilai input
			var inputValue = $(this).val();

			// Mengecek apakah nilai input tidak kosong
			if (inputValue.trim() !== "") {
				// Mengambil data dari server
				$.ajax({
					url: "<?php echo base_url('sysadmin/get_lokasi_penyimpanan'); ?>",
					type: "GET",
					dataType: "json",
					success: function(data) {
						var lokasi_penyimpanan = data.map(function(item) {
							return item.lokasi_penyimpanan;
						});

						// Memperbarui saran autocompletion
						$("#lokasi_penyimpanan").autocomplete({
							source: lokasi_penyimpanan,
							minLength: 1, // Set jumlah karakter minimum sebelum autocompletion dimulai
							select: function(event, ui) {
								// Dapat menambahkan logika apa yang terjadi saat suatu item dipilih
								console.log("Selected: " + ui.item.value);
							}
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.error("Error fetching data:", textStatus, errorThrown);
					}
				});
			}
		});

		$("#merek").on("change", function() {
			// Mendapatkan nilai input
			var inputValue = $(this).val();

			// Mengecek apakah nilai input tidak kosong
			if (inputValue.trim() !== "") {
				// Mengambil data dari server
				$.ajax({
					url: "<?php echo base_url('sysadmin/get_merek'); ?>",
					type: "GET",
					dataType: "json",
					success: function(data) {
						var merek = data.map(function(item) {
							return item.merek;
						});

						// Memperbarui saran autocompletion
						$("#merek").autocomplete({
							source: merek,
							minLength: 1, // Set jumlah karakter minimum sebelum autocompletion dimulai
							select: function(event, ui) {
								// Dapat menambahkan logika apa yang terjadi saat suatu item dipilih
								console.log("Selected: " + ui.item.value);
							}
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.error("Error fetching data:", textStatus, errorThrown);
					}
				});
			}
		});


		save_method = 'add';
		$('#modal_stok_bahan').modal('show'); // show bootstrap modal
		var segment_2 = "<?php echo $this->uri->segment(2); ?>";

		document.getElementById("label_stock_bahan").innerHTML = 'Stok bahan - ' + kode_bahan;


		$('#filter_id_bahan').val(id)
		$('#filter_kode_bahan').val(kode_bahan)

		$('#tb_stok_bahan').DataTable().clear().destroy();
		var table = $('#tb_stok_bahan').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			//Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"dom": 'Blfrtp',
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_bahan_stok') ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					id: id,
					segment_2: segment_2,
				}
			},



			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"orderable": false,
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": 0,
					"visible": document.getElementById('akses_delete').value == 1,
				},

				{
					"targets": [0, 1], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": 9,
					// "data": null,
					"className": "text-center",
					"render": function(data, type, row) {
						var html = "";

						// Tambahkan kata "tahun" di belakang data jika data tidak null
						if (data !== null) {
							html = data + " tahun";
						} else if (data = 0) {
							html = " ";
						}

						return html;
					}
				}


			],

			initComplete: function(settings, json) {
				$("#tb_stok_bahan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
				// if (document.getElementById('akses_delete').value == '1') {

				// 	$('#tb_stok_bahan').DataTable().columns([0]).visible(true);

				// }
			},

		});
	}


	function btn_pemakaian_bahan(id, kode_bahan) {
		save_method = 'add';
		$('#modal_pemakaian_bahan').modal('show'); // show bootstrap modal
		$('#id_bahan_pemakaian').val(id);
		$('#bahan_mati').val('');
		$('#id_pemakaian').val('')
		$('#sisa').val('');
		$('#ambil').val('');
		$('#penggunaan_analisa').val('');
		$("#nama_analis").prop("readonly", true);
		$("#stok").prop("readonly", true);
		document.getElementById("label_pemakian_bahan").innerHTML = 'Kode bahan - ' + kode_bahan;



		$("#satuan_ambil").on("click", function() {
			var satuanPemakaian = $("#satuan_pemakaian").val();
			var satuanAmbil = document.getElementById("satuan_ambil");

			if (satuanPemakaian === 'gram' || satuanPemakaian === 'Kg') {
				// Hanya tampilkan opsi gram dan Kg
				satuanAmbil.querySelectorAll("option").forEach(function(option) {
					if (option.value === "mg" || option.value === "gram" || option.value === "Kg") {
						option.style.display = "block";
					} else {
						option.style.display = "none";
					}
				});
			} else {
				// Tampilkan hanya mL dan L
				satuanAmbil.querySelectorAll("option").forEach(function(option) {
					if (option.value === "mL" || option.value === "L") {
						option.style.display = "block";
					} else {
						option.style.display = "none";
					}
				});
			}
		});




		$('#filter_kode_bahan_pemakaian').val(kode_bahan)

		$.ajax({
			url: "<?php echo base_url('Sysadmin/get_data_bahan'); ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				id: id,

			},
			success: function(data) {

				document.getElementById('id_bahan_pemakaian').value = data.id;
				document.getElementById('nama_bahan_pemakaian').value = data.nama_bahan;
				document.getElementById('type_bahan_pemakaian').value = data.type_bahan;
				document.getElementById('jenis_bahan_pemakaian').value = data.jenis_bahan;
				document.getElementById('peringatan_pemakaian').value = data.peringatan_bahaya;
				document.getElementById('stok').value = data.sisa_bahan;

				document.getElementById('satuan_pemakaian').value = data.satuan;
				hitungSisa();
				// alert(data.sisa_bahan);
				if (data.sisa_bahan != 0) {

					$('#btn_save_add_stok_bahan_habis').show();
					$('#btn_add_ticket_request').show();

				} else {
					$('#btn_save_add_stok_bahan_habis').hide();
					$('#btn_add_ticket_request').hide();

				}

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from get_data_bahan');
			}
		});




		function hitungSisa() {
			if ($('#id_pemakaian').val() == '') {
				$("#satuan_ambil, #ambil").on("change", function() {
					var id = $('#id_bahan_pemakaian').val();

					$.ajax({
						url: "<?php echo base_url('Sysadmin/get_data_bahan'); ?>",
						type: "POST",
						dataType: "JSON",
						data: {
							id: id,

						},
						success: function(data) {

							document.getElementById('stok').value = data.sisa_bahan;

							$('#tb_bahan').DataTable().ajax.reload();
							$('#tb_stok_bahan').DataTable().ajax.reload();
							$('#tb_pemakaian_bahan').DataTable().ajax.reload();


						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error get data from get_data_bahan');
						}
					});

					var ambil = parseFloat($('#ambil').val()) || 0;
					var stok = parseFloat($('#stok').val()) || 0;
					var selectedSatuan = $("#satuan_ambil").val();
					// var bahan_mati = $("#bahan_mati").val();
					var satuanPemakaian = $("#satuan_pemakaian").val();
					var inputValue = parseFloat(ambil) || 0;
					var result = inputValue;



					var maxValue = parseFloat($('#stok').val()) // Mendapatkan nilai stok

					if (selectedSatuan === "L" && satuanPemakaian === "mL" && inputValue > 0) {
						result = inputValue * 1000; // Konversi mL ke L
						// var bahan_mati_convert = bahan_mati / 1000;

						$('#ambil_convert').val(result);
						// $('#bahan_mati_convert').val(bahan_mati_convert);
						if (ambil > maxValue) {
							$('#ambil').val(maxValue);
							var sisa = stok - maxValue;
							$('#ambil_convert').val(maxValue);
							//$('#bahan_mati_convert').val(bahan_mati);
						} else {
							var sisa = stok - result;
							$('#ambil_convert').val(result);
							//$('#bahan_mati_convert').val(bahan_mati);
						}

					} else if (selectedSatuan === "mL" && satuanPemakaian === "mL" && inputValue > 0) {
						result = inputValue * 1; // Konversi mL ke mL (tidak ada perubahan)
						if (ambil > maxValue) {
							$('#ambil').val(maxValue);
							var sisa = stok - maxValue;
							$('#ambil_convert').val(maxValue);
							//$('#bahan_mati_convert').val(bahan_mati);

						} else {
							var sisa = stok - result;
							$('#ambil_convert').val(result);
							//$('#bahan_mati_convert').val(bahan_mati);
						}

					} else if (selectedSatuan === "L" && satuanPemakaian === "L" && inputValue > 0) {
						result = inputValue * 1; // Konversi L ke L (tidak ada perubahan)
						if (ambil > maxValue) {
							$('#ambil').val(maxValue);
							var sisa = stok - maxValue;
							$('#ambil_convert').val(maxValue);
							//$('#bahan_mati_convert').val(bahan_mati);
						} else {
							var sisa = stok - result;
							$('#ambil_convert').val(result);
							//$('#bahan_mati_convert').val(bahan_mati);
						}

					} else if (selectedSatuan === "mL" && satuanPemakaian === "L" && inputValue > 0) {
						result = inputValue / 1000; // Konversi L ke mL


						// var bahan_mati_convert = bahan_mati / 1000;
						var sisa = stok - result;
						$('#ambil_convert').val(result);
						// $('#bahan_mati_convert').val(bahan_mati_convert);

					} else if (selectedSatuan === "Kg" && satuanPemakaian === "gram" && inputValue > 0) {
						result = inputValue * 1000; // Konversi mL ke L
						if (ambil > maxValue) {
							$('#ambil').val(maxValue);
							var sisa = stok - maxValue;
							$('#ambil_convert').val(maxValue);
							//$('#bahan_mati_convert').val(bahan_mati);
						} else {
							var sisa = stok - result;
							$('#ambil_convert').val(result);
							//$('#bahan_mati_convert').val(bahan_mati);
						}
					} else if (selectedSatuan === "gram" && satuanPemakaian === "gram" && inputValue > 0) {
						result = inputValue * 1; // Konversi mL ke mL (tidak ada perubahan)
						if (ambil > maxValue) {
							$('#ambil').val(maxValue);
							var sisa = stok - maxValue;
							$('#ambil_convert').val(maxValue);
							//$('#bahan_mati_convert').val(bahan_mati);
						} else {
							var sisa = stok - result;
							$('#ambil_convert').val(result);
							//$('#bahan_mati_convert').val(bahan_mati);
						}

					} else if (selectedSatuan === "mg" && satuanPemakaian === "gram" && inputValue > 0) {
						result = inputValue / 1000; // Konversi L ke mL

						// var bahan_mati_convert = bahan_mati / 1000;
						var sisa = stok - result;
						$('#ambil_convert').val(result);
						// $('#bahan_mati_convert').val(bahan_mati_convert);

					} else if (selectedSatuan === "mg" && satuanPemakaian === "Kg" && inputValue > 0) {
						result = inputValue / 1000000; // Konversi L ke mL

						// var bahan_mati_convert = bahan_mati / 1000000;
						var sisa = stok - result;
						$('#ambil_convert').val(result);
						// $('#bahan_mati_convert').val(bahan_mati_convert);

					} else if (selectedSatuan === "Kg" && satuanPemakaian === "Kg" && inputValue > 0) {
						result = inputValue * 1; // Konversi L ke L (tidak ada perubahan)
						if (ambil > maxValue) {
							$('#ambil').val(maxValue);
							var sisa = stok - maxValue;
							$('#ambil_convert').val(maxValue);
							//$('#bahan_mati_convert').val(bahan_mati);
						} else {
							var sisa = stok - result;
							$('#ambil_convert').val(result);
							//$('#bahan_mati_convert').val(bahan_mati);
						}

					} else if (selectedSatuan === "gram" && satuanPemakaian === "Kg" && inputValue > 0) {
						result = inputValue / 1000; // Konversi L ke mL
						var sisa = stok - result;
						// var bahan_mati_convert = bahan_mati / 1000;

						$('#ambil_convert').val(result);
						// $('#bahan_mati_convert').val(bahan_mati_convert);
					}
					var formattedNumber = sisa.toFixed(6);
					formattedNumber = String(formattedNumber);
					$('#sisa').val(formattedNumber);

				});
			}
		}

		$('#tb_pemakaian_bahan').DataTable().clear().destroy();
		var table = $('#tb_pemakaian_bahan').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			//Initial no order.
			// "buttons": ['excel'],
			// Load ata for the table's content from an Ajax source
			"dom": 'Blfrtp',
			"ajax": {
				"url": "<?php echo site_url('Sysadmin/list_pemakaian_bahan') ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					kode_bahan: kode_bahan,

				}
			},



			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"orderable": false,
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

			initComplete: function(settings, json) {
				$("#tb_pemakaian_bahan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

				// if (document.getElementById('akses_delete').value == '1') {

				// 	$('#tb_pemakaian_bahan').DataTable().columns([0]).visible(true);

				// }
			},

		});
	}

	function btn_edit_pemakaian_bahan(id) {

		$('#modal_pemakaian_bahan').modal('show'); // show bootstrap modal
		$("#ambil").prop("readonly", false);
		$("#stok").prop("readonly", false);
		$("#sisa").prop("readonly", false);
		$("#nama_analis").prop("readonly", false);
		$('#nama_analis').val('')
		$('#stok').val('')
		$('#btn_add_ticket_request').text('Update Pemakaian');
		$('#id_pemakaian').val(id)


		$.ajax({
			url: "<?php echo base_url('Sysadmin/get_data_pemakaian'); ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				id: id,

			},
			success: function(data) {

				document.getElementById('satuan_ambil').value = data.satuan;
				document.getElementById('satuan_pemakaian').value = data.satuan;
				document.getElementById('nama_analis').value = data.nama_analis;
				document.getElementById('penggunaan_analisa').value = data.analisa;
				document.getElementById('ambil').value = data.jumlah_bahan;
				document.getElementById('stok').value = data.jumlah_bahan_awal;
				document.getElementById('sisa').value = data.jumlah_bahan_sisa;
				document.getElementById('tanggal_ambil').value = data.tanggal_ambil;




			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from get_data_bahan');
			}
		});

	}


	function btn_buka_segel(id, period_ed) {
		var pernr = "<?= $dataSession['username']; ?>";

		if (period_ed) {
			period_edd = period_ed
		} else {
			period_edd = 0
		}

		Swal.fire({
			title: 'Anda yakin membuka segel?',
			text: "",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#7a7fdc',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Buka'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?php echo site_url('sysadmin/update_segel') ?>/" + id + '/' + pernr + '/' + period_edd,
					type: "POST",
					// dataType: "JSON",
					success: function(data) {
						//if success reload ajax table
						// $('#modal_form').modal('hide');

						Swal.fire(
							'Segel Terbuka!',
							'Bahan sudah terbuka.',
							'success'
						)
						$('#tb_stok_bahan').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error buka segel ');
					}
				});
			}
		})
	}

	function btn_delete_bahan(id) {

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
					url: "<?php echo site_url('sysadmin/delete_master_bahan') ?>/" + id,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table

						$('#tb_bahan').DataTable().ajax.reload();
						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}

	function btn_delete_stok_bahan(id) {

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
					url: "<?php echo site_url('sysadmin/delete_stok_bahan') ?>/" + id,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table
						$('#tb_bahan').DataTable().ajax.reload();
						$('#tb_stok_bahan').DataTable().ajax.reload();


						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}

	function btn_delete_pemakaian_bahan(id) {

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
					url: "<?php echo site_url('sysadmin/delete_pemakaian_bahan') ?>/" + id,
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
						$('#tb_bahan').DataTable().ajax.reload();
						$('#tb_stok_bahan').DataTable().ajax.reload();
						$('#tb_pemakaian_bahan').DataTable().ajax.reload();
						var id = $('#id_bahan_pemakaian').val();
						$.ajax({
							url: "<?php echo base_url('Sysadmin/get_data_bahan'); ?>",
							type: "POST",
							dataType: "JSON",
							data: {
								id: id,

							},
							success: function(data) {

								document.getElementById('stok').value = data.sisa_bahan;


							},
							error: function(jqXHR, textStatus, errorThrown) {
								alert('Error get data from get_data_bahan');
							}
						});

					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}
</script>




</body>

</html>