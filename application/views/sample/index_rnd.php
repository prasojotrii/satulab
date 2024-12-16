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

			<div class="row" hidden>
				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->

						<div class="card-body" onclick="filter_by_total_reagen()" style=" cursor: pointer;">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-success">Analisa Masuk</span></span>
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
                                    text-truncate"><span class="badge bg-primary">Analisa Selesai</span></span>
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
                                    text-truncate"><span class="badge bg-info">Proses Lab Analisa</span></span>
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
                                    text-truncate"><span class="badge bg-warning">Proses R&D</span></span>
									<h1 class="mb-3">
										<?= $jenis_prekursor; ?>
									</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col -->

			</div><!-- end col -->


		</div>

		<div class="row" hidden>
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
								<h2 class="mb-sm-0 font-size-32"></h2>
							</div>

							<div class="col-md-6">
								<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-0">

									<!-- <div>
										<a class="btn btn-primary" id="btn_add_karantina" onclick="add_karantina()"><i class="bx bx-plus me-1"></i>Permintaan Manual</a>

									</div> -->


								</div>

							</div>
						</div>
					</div>
					<div class="card-body" style="padding: 10px;">

						<ul class="nav nav-tabs" role="tablist" id="nav_sample">
							<li class="nav-item">
								<a class="nav-link active" id="tab_penerimaan" data-bs-toggle="tab" href="#penerimaan_sample" onclick="load_data_tb_sample_masuk();" role="tab">
									<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
									<div class="d-flex align-items-center">
										<span class="d-none d-sm-block">Penerimaan Sample</span>
										<span id="jumlah_sample_masuk" class="badge bg-primary ms-2"></span>
									</div>

								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="tab_antrian" data-bs-toggle="tab" tombol="memo" href="#antrian" role="tab" onclick="load_data_antrian();">
									<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
									<div class="d-flex align-items-center">
										<span class="d-none d-sm-block">Dalam Antrian</span>
										<span id="jumlah_antrian" class="badge bg-primary ms-2"></span>
									</div>

								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab_approval_ka" data-bs-toggle="tab" tombol="approval" href="#antrian" role="tab" onclick="load_data_approval();">
									<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>

									<div class="d-flex align-items-center">
										<span class="d-none d-sm-block">Approval Permintaan</span>
										<span id="jumlah_approval" class="badge bg-primary ms-2"></span>
									</div>

								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab_analisa" data-bs-toggle="tab" tombol="" href="#antrian" role="tab" onclick="load_data_analisa();">
									<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
									<div class="d-flex align-items-center">
										<span class="d-none d-sm-block">Proses Analisa</span>
										<span id="jumlah_analisa" class="badge bg-primary ms-2"></span>
									</div>

								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab_riwayat" data-bs-toggle="tab" href="#antrian" role="tab" onclick="load_data_approval_hasil();">
									<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
									<div class="d-flex align-items-center">
										<span class="d-none d-sm-block">Approval Hasil Analisa</span>
										<span id="jumlah_approval_hasil" class="badge bg-primary ms-2"></span>
									</div>

								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab_hasil" data-bs-toggle="tab" tombol="" href="#antrian" role="tab" onclick="load_data_hasil();">

									<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
									<div class="d-flex align-items-center">
										<span class="d-none d-sm-block">Input Hasil</span>
										<span id="jumlah_hasil" class="badge bg-primary ms-2"></span>
									</div>

								</a>
							</li>



							<li class="nav-item">
								<a class="nav-link" id="tab_hasil_ahkir" data-bs-toggle="tab" href="#antrian" role="tab" onclick="load_data_riwayat();">
									<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
									<div class="d-flex align-items-center">
										<span class="d-none d-sm-block">Analisa Selesai </span>
										<span id="jumlah_riwayat" class="badge bg-primary ms-2"></span>
									</div>

								</a>
							</li>


						</ul>
						<div class="tab-content p-2 text-muted">

							<div class="tab-pane active mb-1" id="penerimaan_sample" role="tabpanel">
								<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-0">

									<button type="button" id="btn_terima_sample_mass" class="btn btn-primary">Terima Semua Sample</button>

								</div>
								<br>
								<table id="tb_sample_masuk" class="table table-bordered compact nowrap w-100 ">
									<thead>
										<tr>
											<th width="10px">Edit</th>
											<th width="10px">Del</th>
											<!-- <th><input type="checkbox" id="select-all"></th> -->

											<th><input type="checkbox" id="select-all"></th>
											<th width="10px">#</th>
											<th width="10px">Tanggal Kirim</th>

											<th width="10px">Sloc</th>
											<th width="10px">No Request</th>
											<!-- <th width="10px">Status</th> -->
											<!-- <th width="10px">Urgent</th> -->
											<!-- <th>Proses</th> -->
											<!-- <th width="10px">Jenis</th> -->
											<th>No Material</th>
											<th>Deskripsi</th>
											<th>Jumlah</th>
											<!-- <th>Satuan</th> -->
											<th>Expired</th>

											<th>Uji Ulang</th>
											<th>Masalah</th>
											<th>Parameter</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>

							</div>
							<div class="tab-pane " id="antrian" role="tabpanel">

								<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-0">

									<button type="button" style="display: none;" id="btn_buat_memo" class="btn btn-primary">Buat Memo</button>

									<button type="button" style="display: none;" id="btn_approval_mass" class="btn btn-primary">Setujui Semua</button>

								</div>
								<br>
								<table id="tb_data" class="table table-bordered compact nowrap w-100 ">
									<thead>
										<tr>
											<th width="10px">Edit</th>
											<th width="10px">Del</th>
											<!-- <th><input type="checkbox" id="select-all"></th> -->

											<th><input type="checkbox" id="select-all-data"></th>
											<th width="10px">#</th>
											<th width="10px">Tanggal Kirim</th>

											<th width="10px">No Request</th>

											<!-- <th width="10px">Status</th> -->
											<!-- <th width="10px">Urgent</th> -->
											<!-- <th>Proses</th> -->
											<!-- <th width="10px">Jenis</th> -->
											<th>No Material</th>
											<th>Bentuk</th>
											<th>Kode Proses</th>
											<th>Material</th>

											<th>Karantina Ke</th>
											<th>Batch</th>
											<th>Jenis</th>

											<th>Kode Material</th>
											<th>Jumlah</th>
											<!-- <th>Satuan</th> -->
											<th>Expired</th>

											<th>Uji Ulang</th>
											<th>Masalah</th>
											<th>Parameter</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>


						</div>

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





<div class="modal fade" id="modal_info_analisa" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="card-body">
				<div class="col-md-1" hidden>
					<label class="form-label" for="input_id_req">input_id_req</label>
					<input type="text" class="form-control" id="input_id_req" name="input_id_req">
					<input type="text" class="form-control" id="input_id" name="input_id">
				</div>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link" id="tab_tracking" data-bs-toggle="tab" href="#tracking" onclick="load_data_tracking();" role="tab">
							<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
							<span class="d-none d-sm-block">Tracking Proses</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" id="tab_approval" data-bs-toggle="tab" href="#approval" onclick="load_data_tb_approval();" role="tab">
							<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
							<span class="d-none d-sm-block">Daftar Approval</span>
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="tab_qc" data-bs-toggle="tab" href="#qc" role="tab" onclick="load_data_tab_qc();">
							<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
							<span class="d-none d-sm-block">Detail Analisa QC</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="tab_lab" data-bs-toggle="tab" href="#lab" role="tab" onclick="load_data_tab_lab();" hidden>
							<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
							<span class="d-none d-sm-block">Laboratorium Analisa</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="tab_rnd" data-bs-toggle="tab" href="#rnd" role="tab" onclick="load_data_tab_rnd();" hidden>
							<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
							<span class="d-none d-sm-block">Research & Development</span>
						</a>
					</li>


				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-2 text-muted">
					<div class="tab-pane" id="tracking" role="tabpanel">
						<div class="card-body px-0">
							<div class="col-xl-12">
								<div class="card">

									<div class="card-body px-0">
										<div class="px-3" data-simplebar style="max-height: 352px;">
											<ul class="list-unstyled activity-wid mb-0">



											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane active mb-1" id="approval" role="tabpanel">
						<table id="tb_ticket_approval" class="display table table-hover  nowrap" style="width:100%">
							<thead style="text-align: center">
								<tr>
									<th>No</th>
									<th>Pernr / NIK</th>
									<th>Nama </th>
									<th>Jabatan </th>
									<th>Status </th>
									<th>Keterangan </th>
									<th>Tanggal</th>
								</tr>
							</thead>

						</table>

					</div>
					<div class="tab-pane " id="qc" role="tabpanel">
						<table class="table" style="border: none; width: 100%;">
							<tbody>
								<tr>
									<th style="border: none; padding: 0px;" width="15%">Requestor</th>
									<td style="border: none; padding: 0px;" width="25%">: <span id="info_nama_qc"></span></td>
									<th style="border: none; padding: 0px;" width="15%">Kode Material</th>
									<td style="border: none; padding: 0px;" width="45%">: <span id="info_material"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Tanggal Request</th>
									<td style="border: none; padding: 0px;">: <span id="info_created_at"></span></td>
									<th style="border: none; padding: 0px;">Nama Material</th>
									<td style="border: none; padding: 0px;">: <span id="info_desc"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Sloc</th>
									<td style="border: none; padding: 0px;">: <span id="info_sloc"></span></td>
									<th style="border: none; padding: 0px;">Jumlah</th>
									<td style="border: none; padding: 0px;">: <span id="info_quantity"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Masalah</th>
									<td style="border: none; padding: 0px;">: <span id="info_zmasalah"></span></td>
									<th style="border: none; padding: 0px;">Distribusi Analisa</th>
									<td style="border: none; padding: 0px;">: <span id="info_distribusi"></span><span id="info_distribusi"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Jumlah Sample LAB</th>
									<td style="border: none; padding: 0px;">: <span id="info_sample_lab"></span></td>
									<th style="border: none; padding: 0px;">Jumlah Sample RND</th>
									<td style="border: none; padding: 0px;">: <span id="info_sample_rnd"></span></td>
								</tr>
							</tbody>
						</table>
						<h5>Daftar Parameter Uji QC</h5>

						<table id="parameter-table-qc" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
							<thead>
								<tr>
									<th style="padding: 2px 5px;">No</th>
									<th style="padding: 2px 5px;">Parameter</th>
									<th style="padding: 2px 5px;">Spec</th>
									<th style="padding: 2px 5px;">Hasil</th>
									<th style="padding: 2px 5px;">Status</th>
							</thead>
							<tbody>
								<!-- Rows will be appended here dynamically -->
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="lab" role="tabpanel">
						<!-- Tambahkan input file dan tombol unggah -->
						<div style="margin-bottom: 10px; display: none;" id="input_analis_lab">
							<div class="form-group row">
								<label for="nama_analis" class="col-form-label col-2">Nama Analis:</label>
								<div class="col-10">
									<select class="form-select form-select-sm select2" id="nama_analis" name="nama_analis">
										<!-- Options akan ditambahkan di sini secara dinamis -->
									</select>
								</div>
							</div>
							<div class="form-group row mt-3">
								<label for="fileUpload" class="col-form-label col-2">Unggah File:</label>
								<div class="col-10">
									<input type="file" id="fileUpload" class="form-control-sm">
								</div>
							</div>
							<div class="form-group row mt-3">
								<div class="col-2"></div>
								<div class="col-10">
									<button type="button" id="uploadButton" class="btn btn-primary">Upload File Hasil</button>
									<button type="button" id="viewFileButton" class="btn btn-info">Lihat Hasil</button>
									<button type="button" id="deleteFileButton" class="btn btn-danger">Hapus File</button>
								</div>
							</div>
						</div>

						<div id="form_hasil_lab">
							<div class="form-group row">
								<label for="info_nama_analis" class="col-form-label col-2">Pernr Analis:</label>
								<div class="col-3">
									<input type="text" class="form-control" id="info_nama_analis" name="info_nama_analis" placeholder="" style="border: none;">
								</div>
								<div class="col-2">
									<button type="button" id="hasil_analisa_lab" class="btn btn-info">Lihat Hasil</button>
								</div>
							</div>
							<br>
						</div>

						<h5>Daftar Parameter Uji Laboratorium Analisa</h5>
						<br>

						<div id="load_data_sample_lab"> </div>
					</div>


					<div class="tab-pane" id="rnd" role="tabpanel">
						<h5>Daftar Parameter Uji Research & Development</h5>

						<table id="parameter-table-rnd" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
							<thead>
								<tr>
									<th style="padding: 2px 5px;">No</th>
									<th style="padding: 2px 5px;">Parameter</th>
									<th style="padding: 2px 5px;">Spec</th>
									<th style="padding: 2px 5px;">Hasil</th>
									<th style="padding: 2px 5px;">Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<!-- Rows will be appended here dynamically -->
							</tbody>
						</table>

						<hr>
						<!-- <h5>Tracking Proses Analisa</h5>

						<table id="tb_analisa_rnd" class="display table table-hover  nowrap" style="width:100%">
							<thead style="text-align: center">
								<tr>
									<th>No</th>
									<th>Tanggal </th>
									<th>Keterangan </th>
									<th>Lihat</th>
								</tr>
							</thead>

						</table> -->
					</div>

				</div>
			</div><!-- end card-body -->

			<div class="modal-footer">
				<div id="footer_terima" style="display: none;">
					<button type="button" onclick="terima_sample()" class="btn btn-success">Terima Sample</button>
				</div>
				<div id="footer_approval" style="display: none;">
					<button type="button" id="btn_setujui" class="btn btn-success">Setujui</button>
					<button type="button" id="btn_tolak" class="btn btn-danger">Tolak</button>
				</div>
				<div id="footer_analisa_selesai" style="display: none;">
					<button type="button" id="btn_update_analis" class="btn btn-success">Update Analis</button>

				</div>

				<div id="footer_input_analisa" style="display: none;">
					<button type="button" id="btn_update_input_analisa" class="btn btn-success">Setujui Hasil</button>

				</div>

				<div id="footer_analisa_lab_selesai" style="display: none;">
					<button type="button" id="btn_analisa_selesai" class="btn btn-success">Update Hasil Analisa</button>

				</div>
				<!-- <button type="button" id="btn_tolak" onclick="update_approval()" class="btn btn-danger">Tolak Sample</button> -->

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- Modal HTML -->
<div class="modal fade" id="modal_buat_memo" tabindex="-1" role="dialog" aria-labelledby="modal_buat_memo_label" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal_buat_memo_label">Buat Memo Analisa</h5>

				<button type="button" id="btn_print_memo" class="btn btn-primary ms-auto">Print Memo</button>
				<button type="button" id="btn_print_label" class="btn btn-primary ms-auto">Print Label</button>
				<button type="button" id="btn_update_analisa" class="btn btn-primary ms-auto">Update Analisa</button>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body" id="modal_buat_memo_body">

				<table id="tb_memo" class="table table-bordered compact nowrap w-100 ">
					<thead>
						<tr>
							<th>No</th>
							<th>No Request</th>
							<th>Material</th>
							<th>Jenis</th>
							<th>Kode Proses</th>
							<th>Kode Asal</th>
							<th>Karantina Ke</th>
							<th>Batch</th>
							<th>Kode Parameter</th>
							<th>Parameter</th>
							<th>Metode</th>
							<th>Penyelia</th>
						</tr>
					</thead>
				</table>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div> -->
		</div>
	</div>
</div>



<div class="modal fade" id="info_batch" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Batch</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<p><strong>Manuf Date:</strong> <span id="manuf_date"></span></p>
				<p><strong>Tanggal Karantina:</strong> <span id="tanggal_karantina"></span></p>
				<p><strong>Tanggal ED:</strong> <span id="tanggal_ed"></span></p>


			</div>
			<!-- <div class="modal-footer">
		
			</div> -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- Modal for entering note -->
<div id="approval-modal" class="modal fade" role="dialog">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5> Input Keterangan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

				</button>
			</div>
			<div class="modal-body">
				<form id="approval-form">
					<div class="form-group">
						<!-- <label for="note">Keterangan</label> -->
						<textarea class="form-control" id="note" name="note" rows="3" required></textarea>
					</div>
					<input hidden id="approval-action" name="approval_action" value="">
					<input hidden id="approval-pernr" name="pernr" value="">
				</form>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-primary" id="save-approval">Update</button>
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
			</div>
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



<script type="text/javascript">
	$(document).ready(function() {

		$('#btn_update_input_analisa').on('click', function() {
			Swal.fire({
				title: 'Mohon tunggu...',
				text: 'Sedang mengirim data...',
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading();
				}
			});
			var id = $('#input_id_req').val(); // Ambil ID dari input

			$.ajax({
				url: "<?php echo site_url('analisa/update_approval_hasil_analisa'); ?>",
				type: "POST",
				data: {
					id: id
				},
				dataType: "json",
				success: function(response) {

					if (response.status === true) {
						Swal.fire({
							title: 'Sukses',
							text: 'Data berhasil diperbarui.',
							icon: 'success',
							confirmButtonColor: '#364574',
						});
						$('#modal_info_analisa').modal('hide');
						updateCounts();

						$('#tb_data').DataTable().ajax.reload();
					} else {
						Swal.fire({
							title: 'Gagal',
							text: 'Terjadi kesalahan saat memperbarui data.',
							icon: 'error',
							confirmButtonColor: '#364574',
						});
						updateCounts();

						$('#tb_data').DataTable().ajax.reload();
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
					alert('Terjadi kesalahan saat memperbarui analisa.');
				}
			});
		});

		$('#btn_analisa_selesai').on('click', function() {
			// Menampilkan SweetAlert2 konfirmasi
			Swal.fire({
				title: 'Konfirmasi',
				text: 'Apakah Anda yakin ingin mengirim data?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#364574',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, kirim!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					// Jika pengguna mengkonfirmasi, tampilkan loading dan jalankan AJAX
					Swal.fire({
						title: 'Mohon tunggu...',
						text: 'Sedang mengirim data...',
						allowOutsideClick: false,
						didOpen: () => {
							Swal.showLoading();
						}
					});

					var id = $('#input_id_req').val(); // Ambil ID dari input

					$.ajax({
						url: "<?php echo site_url('analisa/update_analisa_lab_selesai'); ?>",
						type: "POST",
						data: {
							id: id
						},
						dataType: "json",
						success: function(response) {
							if (response.status === true) {
								Swal.fire({
									title: 'Sukses',
									text: 'Data berhasil diperbarui.',
									icon: 'success',
									confirmButtonColor: '#364574',
								});
								$('#modal_info_analisa').modal('hide');
								updateCounts();
								$('#tb_data').DataTable().ajax.reload();
							} else {
								Swal.fire({
									title: 'Gagal',
									text: 'Terjadi kesalahan saat memperbarui data.',
									icon: 'error',
									confirmButtonColor: '#364574',
								});
								updateCounts();
								$('#tb_data').DataTable().ajax.reload();
							}
						},
						error: function(xhr, status, error) {
							console.error(error);
							alert('Terjadi kesalahan saat memperbarui analisa.');
						}
					});
				}
			});

		});

		$('#btn_update_analis').on('click', function() {
			var id = $('#input_id_req').val(); // Ambil ID dari input
			var nama_analis = $('#nama_analis').val(); // Ambil nilai nama analis

			// Cek apakah nama_analis sudah ada isinya
			if (nama_analis) {
				$.ajax({
					url: "<?php echo site_url('analisa/update_data_analisa'); ?>",
					type: "POST",
					data: {
						id: id
					},
					dataType: "json",
					success: function(response) {
						if (response.status === true) {
							Swal.fire({
								title: 'Sukses',
								text: 'Data berhasil diperbarui.',
								icon: 'success',
								confirmButtonColor: '#364574',
							});
							$('#modal_info_analisa').modal('hide');
							updateCounts();

							$('#tb_data').DataTable().ajax.reload();
						} else {
							Swal.fire({
								title: 'Gagal',
								text: 'Terjadi kesalahan saat memperbarui data.',
								icon: 'error',
								confirmButtonColor: '#364574',
							});
							updateCounts();

							$('#tb_data').DataTable().ajax.reload();
						}
					},
					error: function(xhr, status, error) {
						console.error(error);
						alert('Terjadi kesalahan saat memperbarui analisa.');
					}
				});
			} else {
				// Menambahkan kelas 'is-invalid' untuk memberikan border merah
				$('#nama_analis').addClass('is-invalid');

				// Mengatur fokus pada elemen select
				$('#nama_analis').focus();

				// Menghilangkan fokus dari tombol
				$('#btn_update_analis').blur();

				// Menggulung halaman ke bagian atas
				$('html, body').animate({
					scrollTop: 0
				}, 'fast');

				// Menambahkan kelas 'active' pada tab_lab dan menampilkan konten tab yang sesuai
				$('#tab_lab').addClass('active');
				$('#lab').addClass('active show');

				// Menghapus kelas 'active' dari tab lainnya dan menyembunyikan konten tab lainnya
				$('#tab_tracking, #tab_approval, #tab_qc, #tab_rnd').removeClass('active');
				$('#tracking, #approval, #qc, #rnd').removeClass('active show');

				// Menampilkan pesan kesalahan menggunakan SweetAlert
				Swal.fire({
					title: 'Gagal',
					text: 'Pastikan nama analis terisi.',
					icon: 'error',
					confirmButtonColor: '#364574',
				});
			}

		});

		// Hanya untuk tab di dalam #nav_sample
		$('#nav_sample a[data-bs-toggle="tab"]').on('click', function() {
			var hrefValue = $(this).attr('tombol');

			if (hrefValue === 'memo') {
				$('#btn_buat_memo').show();
				$('#btn_approval_mass').hide();
			} else if (hrefValue === 'approval') {
				$('#btn_buat_memo').hide();
				$('#btn_approval_mass').show();
			} else {
				$('#btn_buat_memo').hide();
				$('#btn_approval_mass').hide();
			}
		});

		// Panggil fungsi secara manual saat halaman pertama kali dimuat untuk memastikan kondisi awal
		var initialHrefValue = $('#nav_sample a[data-bs-toggle="tab"].active').attr('tombol');
		if (initialHrefValue === 'memo') {
			$('#btn_buat_memo').show();
			$('#btn_approval_mass').hide();
		} else if (initialHrefValue === 'approval') {
			$('#btn_buat_memo').hide();
			$('#btn_approval_mass').show();
		} else {
			$('#btn_buat_memo').hide();
			$('#btn_approval_mass').hide();
		}

		$('#select-all-data').click(function() {
			$('#tb_data .select-checkbox').prop('checked', this.checked);
		});

		$('#tb_data .select-checkbox').click(function() {
			if ($('#tb_data .select-checkbox:checked').length == $('#tb_data .select-checkbox').length) {
				$('#select-all-data').prop('checked', true);
			} else {
				$('#select-all-data').prop('checked', false);
			}
		});


		// Call updateCounts on page load
		updateCounts();


		load_data_tb_sample_masuk();

		// Handle button click to show modal with selected checkboxes
		$('#btn_buat_memo').on('click', function() {
			buat_memo(); // Panggil fungsi untuk mengambil data dan menampilkan modal
		});

		$('#btn_print_memo').on('click', function() {
			print_memo(); // Panggil fungsi untuk mengambil data dan menampilkan modal
		});
		$('#btn_update_analisa').on('click', function() {
			update_proses_approval(); // Panggil fungsi untuk mengambil data dan menampilkan modal
		});


		$('#btn_print_label').on('click', function() {
			print_label(); // Panggil fungsi untuk mengambil data dan menampilkan modal
		});


		$('#btn_setujui, #btn_tolak').on('click', function() {

			var action = $(this).attr('id') === 'btn_setujui' ? '1' : '2';
			$('#approval-action').val(action);
			$('#approval-pernr').val(<?php echo $dataSession['pernr']; ?>); // Implement this function to get the pernr from session or set it dynamically
			$('#approval-modal').modal('show');
			$('#note').val('');
		});

		// Handle save button click in modal
		$('#save-approval').on('click', function() {
			var note = $('#note').val();
			var action = $('#approval-action').val();
			var pernr = $('#approval-pernr').val();
			var id_req = $('#input_id_req').val();

			if (note.trim() === '') {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Keterangan mohon diisi',

				})

				return;
			}
			Swal.fire({
				title: 'Mohon tunggu...',
				text: 'Sedang mengirim data...',
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading();
				}
			});

			// Send data to server
			$.ajax({
				url: 'approval/update_approval', // Adjust the URL to your CodeIgniter controller
				type: 'POST',
				data: {
					note: note,
					action: action,
					pernr: pernr,
					id_req: id_req
				},
				success: function(response) {
					Swal.fire({
						title: 'Success',
						text: 'Approval telah diupdate',
						icon: 'success',

						confirmButtonColor: '#364574',

					})


					$('#approval-modal').modal('hide');
					$('#modal_info_analisa').modal('hide');

					// $('.modal-footer').hide(); // Hide the footer if not valid
					updateCounts();
					$('#tb_ticket_approval').DataTable().ajax.reload();
					$('#tb_data').DataTable().ajax.reload();
				},
				error: function() {
					alert('An error occurred while saving the note.');
				}
			});
		});
		$(document).on('change', '.bentuk-input', function() {
			var material = $(this).data('material');
			var bentuk = $(this).val();

			$.ajax({
				url: '<?php echo site_url("sample/update_bentuk_material"); ?>',
				type: 'POST',
				data: {
					material: material,
					bentuk: bentuk
				},
				success: function(response) {
					var result = JSON.parse(response);
					if (result.status === 'success') {
						$('#tb_data').DataTable().ajax.reload();
					} else {
						alert('Gagal memperbarui data bentuk: ' + result.message);
					}
				},
				error: function() {
					alert('Terjadi kesalahan saat memperbarui data bentuk');
				}
			});
		});

		// Event listener untuk perubahan pada input singkatan
		$(document).on('change', '.singkatan-input', function() {
			var material = $(this).data('material');
			var singkatan = $(this).val();

			$.ajax({
				url: '<?php echo site_url("sample/update_singkatan_material"); ?>',
				type: 'POST',
				data: {
					material: material,
					singkatan: singkatan
				},
				success: function(response) {
					var result = JSON.parse(response);
					if (result.status === 'success') {
						$('#tb_data').DataTable().ajax.reload();
					} else {
						alert('Gagal memperbarui data singkatan: ' + result.message);
					}
				},
				error: function() {
					alert('Terjadi kesalahan saat memperbarui data singkatan');
				}
			});
		});
		$(document).on('change', '.metode-input', function() {
			var material = $(this).data('material'); // Ambil nilai material dari data attribute
			var metode = $(this).val(); // Ambil nilai metode dari input
			var bentuk = $(this).data('bentuk'); // Ambil nilai bentuk dari data attribute
			var singkatan = $(this).data('singkatan'); // Ambil nilai singkatan dari data attribute
			var mstrchar = $(this).data('mstrchar'); // Ambil nilai mstrchar dari data attribute

			$.ajax({
				url: '<?php echo site_url("sample/update_metode"); ?>', // URL ke fungsi controller
				type: 'POST',
				data: {
					material: material,
					metode: metode,
					bentuk: bentuk,
					singkatan: singkatan,
					mstrchar: mstrchar
				},
				success: function(response) {
					var result = JSON.parse(response);
					if (result.status === 'success') {
						$('#tb_memo').DataTable().ajax.reload();
					} else {
						alert('Gagal memperbarui data: ' + result.message);
					}
				},
				error: function() {
					alert('Terjadi kesalahan saat memperbarui data');
				}
			});
		});

		// Update 'penyelia'
		$(document).on('change', '.penyelia-input', function() {
			var material = $(this).data('material'); // Ambil nilai material dari data attribute
			var penyelia = $(this).val(); // Ambil nilai penyelia dari input
			var bentuk = $(this).data('bentuk'); // Ambil nilai bentuk dari data attribute
			var singkatan = $(this).data('singkatan'); // Ambil nilai singkatan dari data attribute
			var mstrchar = $(this).data('mstrchar'); // Ambil nilai mstrchar dari data attribute
			// alert(material);
			$.ajax({
				url: '<?php echo site_url("sample/update_penyelia"); ?>', // URL ke fungsi controller
				type: 'POST',
				data: {
					material: material,
					penyelia: penyelia,
					bentuk: bentuk,
					// singkatan: singkatan,
					mstrchar: mstrchar
				},
				success: function(response) {
					var result = JSON.parse(response);
					if (result.status === 'success') {
						$('#tb_memo').DataTable().ajax.reload();
					} else {
						alert('Gagal memperbarui data: ' + result.message);
					}
				},
				error: function() {
					alert('Terjadi kesalahan saat memperbarui data');
				}
			});
		});



		// $('#modal_buat_memo').on('change', '.penyelia-input', function() {
		// 	var id = $(this).data('id');
		// 	var newValue = $(this).val();

		// 	$.ajax({
		// 		url: '<?= site_url("sample/update_penyelia") ?>',
		// 		type: 'POST',
		// 		data: {
		// 			id: id,
		// 			penyelia: newValue
		// 		},
		// 		success: function(response) {
		// 			Swal.fire({
		// 				title: 'Sukses',
		// 				text: 'Data berhasil diperbarui.',
		// 				icon: 'success',
		// 				confirmButtonColor: '#364574',
		// 			});
		// 		},
		// 		error: function(xhr, status, error) {
		// 			Swal.fire({
		// 				title: 'Gagal',
		// 				text: 'Terjadi kesalahan saat memperbarui data.',
		// 				icon: 'error',
		// 				confirmButtonColor: '#364574',
		// 			});
		// 		}
		// 	});
		// });


	});

	function updateCounts() {
		$.ajax({
			url: "<?php echo site_url('sample/count_by_progress'); ?>",
			type: "GET",
			dataType: "json",
			success: function(data) {
				$("#jumlah_sample_masuk").text(data['Pengiriman Ke Lab']);
				$("#jumlah_antrian").text(data['Administrasi Lab Analisa']);
				$("#jumlah_approval").text(data['Approval Ka Unit Lab Analisa']);
				$("#jumlah_analisa").text(data['Sedang dianalisa Lab']);
				$("#jumlah_hasil").text(data['Input data analisa Lab']);
				$("#jumlah_approval_hasil").text(data['Approval hasil analisa']);
				$("#jumlah_riwayat").text(data['Analisa Lab selesai']);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.error("Error getting counts: " + textStatus, errorThrown);
			}
		});
	}

	function print_memo() {
		if (globalSelectedIds.length === 0) {
			Swal.fire({
				title: 'Peringatan',
				text: 'Tidak ada data yang dipilih.',
				icon: 'warning',
				confirmButtonColor: '#364574',
			});
			return;
		}

		console.log('Selected IDs:', globalSelectedIds); // Debugging

		// Kirimkan ID yang dipilih ke server untuk pengecekan
		$.ajax({
			url: "<?= site_url('sample/check_data') ?>",
			type: "POST",
			data: {
				ids: globalSelectedIds
			},
			success: function(response) {
				response = JSON.parse(response); // Parsing JSON response
				if (response.valid) {
					// Jika valid, lanjutkan untuk mencetak memo
					$.ajax({
						url: "<?= site_url('sample/print_memo_data') ?>",
						type: "POST",
						data: {
							ids: globalSelectedIds
						},
						xhrFields: {
							responseType: 'blob' // Expecting binary data (PDF)
						},
						success: function(response) {
							// Check if the response is a PDF
							if (response && response.size > 0) {
								var blob = new Blob([response], {
									type: 'application/pdf'
								});
								var url = URL.createObjectURL(blob);
								window.open(url); // Open the PDF in a new tab
							} else {
								Swal.fire({
									title: 'Error',
									text: 'Gagal menerima file PDF dari server.',
									icon: 'error',
									confirmButtonColor: '#364574',
								});
							}
						},
						error: function(xhr, status, error) {
							Swal.fire({
								title: 'Error',
								text: 'Terjadi kesalahan saat mengambil data untuk mencetak label.',
								icon: 'error',
								confirmButtonColor: '#364574',
							});
						}
					});
				} else {
					// Jika tidak valid, tampilkan pesan kesalahan dengan daftar ID yang invalid
					Swal.fire({
						title: 'Error',
						text: 'Beberapa kolom penyelia kosong untuk No berikut: ' + (response.invalidIds ? response.invalidIds.join(', ') : 'Tidak ada ID yang ditemukan.'),
						icon: 'error',
						confirmButtonColor: '#364574',
					});
				}
			},
			error: function(xhr, status, error) {
				Swal.fire({
					title: 'Error',
					text: 'Terjadi kesalahan saat memeriksa data.',
					icon: 'error',
					confirmButtonColor: '#364574',
				});
			}
		});
	}



	function print_label() {
		// alert(globalSelectedIds);

		// Lakukan pengecekan pada tabel view_analisa_request_sap
		$.ajax({
			url: "<?= site_url('sample/check_label_exists') ?>",
			type: "POST",
			data: {
				ids: globalSelectedIds
			},
			dataType: "json",
			success: function(response) {

				// alert(response.status);
				if (response.status === 'not_found') {
					Swal.fire({
						title: 'Peringatan',
						text: 'Beberapa atau semua data belum memiliki label. Silakan cetak memo terlebih dahulu.',
						icon: 'warning',
						confirmButtonColor: '#364574',
					});
				} else {
					// Jika semua data ditemukan, lakukan proses cetak label
					console.log('Selected IDs:', globalSelectedIds); // Debugging

					// Kirimkan ID yang dipilih ke server untuk mengambil data dan mencetak label
					$.ajax({
						url: "<?= site_url('sample/print_label_data') ?>",
						type: "POST",
						data: {
							ids: globalSelectedIds
						},
						xhrFields: {
							responseType: 'blob' // Expecting binary data (PDF)
						},
						success: function(response) {
							// Create a URL for the PDF blob and open it in a new tab
							var blob = new Blob([response], {
								type: 'application/pdf'
							});
							var url = URL.createObjectURL(blob);
							window.open(url);
						},
						error: function(xhr, status, error) {
							Swal.fire({
								title: 'Error',
								text: 'Terjadi kesalahan saat mengambil data untuk mencetak label.',
								icon: 'error',
								confirmButtonColor: '#364574',
							});
						}
					});
				}
			},
			error: function(xhr, status, error) {
				Swal.fire({
					title: 'Error',
					text: 'Terjadi kesalahan saat memeriksa data label.',
					icon: 'error',
					confirmButtonColor: '#364574',
				});
			}
		});
	}




	function updateBentuk(material, bentuk) {
		$.ajax({
			url: '<?php echo site_url("sample/update_bentuk_material"); ?>', // URL ke fungsi controller
			type: 'POST',
			data: {
				material: material,
				bentuk: bentuk
			},
			success: function(response) {
				var result = JSON.parse(response);
				if (result.status === 'success') {
					$('#tb_data').DataTable().ajax.reload();
				} else {
					alert('Gagal memperbarui data: ' + result.message);
				}
			},
			error: function() {
				alert('Terjadi kesalahan saat memperbarui data');
			}
		});
	}

	function load_data_tb_sample_masuk() {



		$('#tb_sample_masuk').DataTable().clear().destroy();

		var tb_sample_masuk = $('#tb_sample_masuk').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			// autoWidth: true,

			ajax: {
				"url": "<?php echo site_url('sample/list_sample_masuk'); ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_by: 'masuk',
					sample_for: 'rnd',
				}
			},

			order: [
				[3, 'desc']
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
				$("#tb_sample_masuk").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

				// Update jumlah_sample_masuk with the row count
				// var rowCount = tb_sample_masuk.rows().count();
				// $("#jumlah_sample_masuk").text(rowCount);
			},
			columnDefs: [{
					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0, 1], //last column
					"visible": false, //set not orderable
				},
				{
					"targets": [2], // Kolom tertentu
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('text-align', 'center'); // Pengaturan alignment
					}
				}
			],
		});
	}


	function load_data_approval() {



		$('#tb_data').DataTable().clear().destroy();

		var tb_data = $('#tb_data').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			// autoWidth: true,

			ajax: {
				"url": "<?php echo site_url('sample/list_data_sample'); ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_by: 'approval',
				}
			},

			order: [
				[3, 'desc']

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
				$("#tb_data").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");


			},
			columnDefs: [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0, 1], //last column
					"visible": false, //set not orderable
				},
				{
					"targets": [2], // Kolom tertentu
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('text-align', 'center'); // Pengaturan alignment
					}
				}
				// {
				// 	"targets": 5,
				// 	// "data": null,
				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 0) {
				// 			html = "<span class='badge bg-primary'>Disable</span>"
				// 		} else if (data == 1) {

				// 			html = "<span class='badge badge-soft-primary'>Active</span>"
				// 		}
				// 		return html;
				// 	},
				// },

			],
		});

	}

	function load_data_analisa() {
		$('#tb_data').DataTable().clear().destroy();

		var tb_data = $('#tb_data').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			// autoWidth: true,

			ajax: {
				"url": "<?php echo site_url('sample/list_data_sample'); ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_by: 'analisa',
				}
			},

			order: [
				[3, 'desc']

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
				$("#tb_data").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");


			},
			columnDefs: [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0, 1], //last column
					"visible": false, //set not orderable
				},
				{
					"targets": [2], // Kolom tertentu
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('text-align', 'center'); // Pengaturan alignment
					}
				}
				// {
				// 	"targets": 5,
				// 	// "data": null,
				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 0) {
				// 			html = "<span class='badge bg-primary'>Disable</span>"
				// 		} else if (data == 1) {

				// 			html = "<span class='badge badge-soft-primary'>Active</span>"
				// 		}
				// 		return html;
				// 	},
				// },

			],
		});

	}

	function load_data_hasil() {
		$('#tb_data').DataTable().clear().destroy();

		var tb_data = $('#tb_data').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			// autoWidth: true,

			ajax: {
				"url": "<?php echo site_url('sample/list_data_sample'); ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_by: 'hasil',
				}
			},

			order: [
				[3, 'desc']

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
				$("#tb_data").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},
			columnDefs: [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0, 1], //last column
					"visible": false, //set not orderable
				},
				{
					"targets": [2], // Kolom tertentu
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('text-align', 'center'); // Pengaturan alignment
					}
				}
				// {
				// 	"targets": 5,
				// 	// "data": null,
				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 0) {
				// 			html = "<span class='badge bg-primary'>Disable</span>"
				// 		} else if (data == 1) {

				// 			html = "<span class='badge badge-soft-primary'>Active</span>"
				// 		}
				// 		return html;
				// 	},
				// },

			],
		});

	}

	function load_data_riwayat() {
		$('#tb_data').DataTable().clear().destroy();

		var tb_data = $('#tb_data').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			// autoWidth: true,

			ajax: {
				"url": "<?php echo site_url('sample/list_data_sample'); ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_by: 'riwayat',
				}
			},

			order: [
				[3, 'desc']

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
				$("#tb_data").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},
			columnDefs: [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0, 1], //last column
					"visible": false, //set not orderable
				},
				{
					"targets": [2], // Kolom tertentu
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('text-align', 'center'); // Pengaturan alignment
					}
				}
				// {
				// 	"targets": 5,
				// 	// "data": null,
				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 0) {
				// 			html = "<span class='badge bg-primary'>Disable</span>"
				// 		} else if (data == 1) {

				// 			html = "<span class='badge badge-soft-primary'>Active</span>"
				// 		}
				// 		return html;
				// 	},
				// },

			],
		});

	}

	function load_data_approval_hasil() {
		$('#tb_data').DataTable().clear().destroy();

		var tb_data = $('#tb_data').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			// autoWidth: true,

			ajax: {
				"url": "<?php echo site_url('sample/list_data_sample'); ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_by: 'approvalhasil',
				}
			},

			order: [
				[3, 'desc']

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
				$("#tb_data").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},
			columnDefs: [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0, 1], //last column
					"visible": false, //set not orderable
				},
				{
					"targets": [2], // Kolom tertentu
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('text-align', 'center'); // Pengaturan alignment
					}
				}
				// {
				// 	"targets": 5,
				// 	// "data": null,
				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 0) {
				// 			html = "<span class='badge bg-primary'>Disable</span>"
				// 		} else if (data == 1) {

				// 			html = "<span class='badge badge-soft-primary'>Active</span>"
				// 		}
				// 		return html;
				// 	},
				// },

			],
		});

	}


	function load_data_antrian() {

		$('#btn_buat_memo').show();
		$('#btn_approval_mass').hide();

		$('#tb_data').DataTable().clear().destroy();

		var tb_data = $('#tb_data').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			// autoWidth: true,

			ajax: {
				"url": "<?php echo site_url('sample/list_data_sample'); ?>",
				"type": "POST",
				"dataType": "json",
				"data": {
					filter_by: 'antrian',
				}
			},

			order: [
				[3, 'desc']

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
				$("#tb_data").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");


			},
			columnDefs: [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0, 1], //last column
					"visible": false, //set not orderable
				},
				{
					"targets": [2], // Kolom tertentu
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('text-align', 'center'); // Pengaturan alignment
					}
				}
				// {
				// 	"targets": 5,
				// 	// "data": null,
				// 	"render": function(data, type, row) {
				// 		var html = ""

				// 		if (data == 0) {
				// 			html = "<span class='badge bg-primary'>Disable</span>"
				// 		} else if (data == 1) {

				// 			html = "<span class='badge badge-soft-primary'>Active</span>"
				// 		}
				// 		return html;
				// 	},
				// },

			],
		});

	}

	function terima_sample() {
		var id_req = $('#input_id_req').val();
		// alert(id_req);

		// Menampilkan dialog konfirmasi dengan SweetAlert
		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: 'Anda akan menerima sample dan memperbarui progress.',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, terima sample!'
		}).then((result) => {
			if (result.isConfirmed) {
				// Jika pengguna mengkonfirmasi, jalankan AJAX untuk menerima sample
				$.ajax({
					url: '<?= site_url("analisa/terima_sample") ?>',
					type: 'POST',
					data: {
						id_req: id_req, // Pastikan Anda memiliki variabel id_req yang sesuai
					},
					success: function(response) {
						Swal.fire({
							title: 'Sukses',
							text: 'Sample telah diterima dan progress diperbarui.',
							icon: 'success',
							confirmButtonColor: '#364574',

						}).then((result) => {
							if (result.isConfirmed) {
								// Reload halaman atau data table jika diperlukan
								$('#tb_sample_masuk').DataTable().ajax.reload();
								$('#modal_info_analisa').modal('hide');
								updateCounts();
							}
						});
					},
					error: function(xhr, status, error) {
						Swal.fire({
							title: 'Gagal',
							text: 'Terjadi kesalahan saat memperbarui data.',
							icon: 'error',
							confirmButtonColor: '#364574',
						});
					}
				});
			}
		});
	}




	function load_data_tab_lab(id_req) {
		if (id_req) {
			var id_req = id_req;
		} else {
			var id_req = $('#input_id_req').val();
		}

		var oprshrttxt = "LAB";

		$('#tb_analisa_lab').DataTable().clear().destroy();

		var tb_analisa_lab = $('#tb_analisa_lab').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			autoWidth: false,

			ajax: {
				"url": "<?php echo site_url('analisa/tracking_analisa'); ?>",
				"type": "POST",
				"data": {
					id_req: id_req,
					oprshrttxt: oprshrttxt
				},
			},

			// order: [
			// 	[1, 'desc']

			// ],
			dom: 'rt',
			lengthMenu: [
				[10, 25, 50, 100, -1],
				['10 rows', '25 rows', '50 rows', '100 rows', 'Semua']
			],
			buttons: [
				'pageLength'
			],

			initComplete: function(settings, json) {
				$("#tb_analisa_lab").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},
			columnDefs: [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": '_all', //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0], // your case first column
					"visible": false
				},
				{
					"width": "1%",
					"targets": [1, 3]
				},
			],
		});

	}

	function cetak_label(no_karantina, id, material, desc) {
		$('#no_karantina').text(no_karantina);
		$('#id_req_print').val(id);
		$('#jumlah_sample_input').val('');
		// alert(id);
		$('#printModal').modal('show');
		$('.modal-title').text('Cetak Label');
		// Variabel global untuk menyimpan referensi tab yang telah dibuka
		var printTab;

		$('#print_button').on('click', function() {
			var jumlah_sample = $('#jumlah_sample_input').val();

			if (jumlah_sample > 0) {
				Swal.fire({
					title: 'Mohon tunggu...',
					text: 'Sedang mengirim data...',
					allowOutsideClick: false,
					didOpen: () => {
						Swal.showLoading();
					}
				});

				$.ajax({
					url: '<?= site_url("analisa/insert_jumlah_sample") ?>',
					type: 'POST',
					data: {
						id_req: id,
						jumlah_sample: jumlah_sample
					},
					success: function(response) {
						// Menutup Swal loading
						Swal.close();

						// Pastikan data berhasil diinsert sebelum membuka jendela baru
						// Redirect ke URL untuk mencetak PDF setelah memasukkan jumlah sample

						$('#printModal').modal('hide');
						$('#tb_analisa').DataTable().ajax.reload();

						Swal.fire({
							title: 'Sukses',
							text: 'Mohon untuk menempelkan label pada sample',
							icon: 'success',
							confirmButtonColor: '#364574',
						});

						// Buka tab baru atau fokus ke tab yang sudah ada
						var url = '<?= site_url("analisa/print_labels") ?>';
						if (printTab == null || printTab.closed) {
							// Buka tab baru jika belum ada atau sudah ditutup
							printTab = window.open(url, '_blank');
						} else {
							// Fokus ke tab yang sudah ada
							printTab.location.href = url;
							printTab.focus();
						}
					},
					error: function(xhr, status, error) {
						// Menutup Swal loading
						Swal.close();

						Swal.fire({
							title: 'Gagal',
							text: 'Terjadi kesalahan saat mengirim data.',
							icon: 'error',
							confirmButtonColor: '#364574',
						});
					}
				});
			} else {
				alert('Jumlah sample harus lebih dari 0.');
			}
		});


		$('#kirim_sample').on('click', function() {
			Swal.fire({
				title: 'Apakah Anda yakin?',
				text: 'Anda akan mengirim data ini.',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, kirim!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire({
						title: 'Mohon tunggu...',
						text: 'Sedang mengirim data...',
						allowOutsideClick: false,
						didOpen: () => {
							Swal.showLoading();
						}
					});
					$.ajax({
						url: '<?= site_url("analisa/kirim_sample") ?>',
						type: 'POST',
						data: {
							id_req: id, // Pastikan variabel id sudah dideklarasikan sebelumnya

						},
						success: function(response) {
							// Menutup Swal loading


							// Pastikan data berhasil diinsert sebelum membuka jendela baru


							$('#printModal').modal('hide');
							$('#tb_analisa').DataTable().ajax.reload();
							updateCounts();
							Swal.close();

							Swal.fire({
								title: 'Sukses',
								text: 'Mohon untuk segera mengirim sample',
								icon: 'success',
								confirmButtonColor: '#364574',
							});


						},
						error: function(xhr, status, error) {
							// Menutup Swal loading
							Swal.close();

							Swal.fire({
								title: 'Gagal',
								text: 'Terjadi kesalahan saat mengirim data.',
								icon: 'error',
								confirmButtonColor: '#364574',
							});
						}
					});
				}
			});
		});



	}


	function multiCetakLabel() {
		var selectedIds = [];
		$(".multicetak:checked").each(function() {
			selectedIds.push($(this).val());
		});

		// alert(selectedIds);
		if (selectedIds.length > 0) {
			// Make AJAX call to server with selected IDs
			$.ajax({
				url: '<?php echo base_url("analisa/multi_cetak_label"); ?>',
				method: 'POST',
				data: {
					ids: selectedIds
				},
				success: function(response) {
					// Handle success response and open the new window
					var win = window.open('<?php echo base_url("analisa/multi_cetak_label_pdf"); ?>', '_blank');
					win.focus();
				},
				error: function(error) {
					// Handle error response
					console.error(error);
				}
			});
		} else {
			alert("Tidak ada label yang dipilih.");
		}
	}





	function load_data_tab_rnd(id_req) {
		if (id_req) {
			var id_req = id_req;
		} else {
			var id_req = $('#input_id_req').val();
		}
		// alert(id_req);

		var oprshrttxt = 'RND';
		// alert(oprshrttxt);
		$('#tb_analisa_rnd').DataTable().clear().destroy();

		var tb_analisa_rnd = $('#tb_analisa_rnd').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			autoWidth: false,

			ajax: {
				"url": "<?php echo site_url('analisa/tracking_analisa'); ?>",
				"type": "POST",
				"data": {
					id_req: id_req,
					oprshrttxt: oprshrttxt
				},
			},

			// order: [
			// 	[1, 'desc']

			// ],
			dom: 'rt',
			lengthMenu: [
				[10, 25, 50, 100, -1],
				['10 rows', '25 rows', '50 rows', '100 rows', 'Semua']
			],
			buttons: [
				'pageLength'
			],

			initComplete: function(settings, json) {
				$("#tb_analisa_rnd").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},
			columnDefs: [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": '_all', //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0], // your case first column
					"visible": false
				},
				{
					"width": "1%",
					"targets": [1, 3]
				},
			],
		});

	}

	function info_analisa(id_req, footer) {
		// alert(id_req);
		// alert(footer);
		// Show the modal
		$('#modal_info_analisa').modal('show');


		$('#tab_approval').removeClass('active');
		$('#approval').removeClass('active');
		$('#tab_lab').removeClass('active');
		$('#tab_rnd').removeClass('active');
		$('#tab_qc').addClass('active');
		$('#tab_tracking').removeClass('active');
		$('#tracking').removeClass('active');
		$('#qc').addClass('active');
		$('#lab').removeClass('active');
		$('#rnd').removeClass('active');
		// Set the title of the modal
		$('.modal-title').text('Info Proses Analisa');

		// Set the input ID
		$('#input_id_req').val(id_req);
		// alert(footer);
		// Cek apakah footer diset ke true
		if (footer === 'Approval') {
			$('#footer_approval').show();
			$('#footer_terima').hide();
		} else if (footer === 'Terima') {
			$('#footer_approval').hide();
			$('#footer_terima').show();
		} else if (footer === '') {
			$('#footer_approval').hide();
			$('#footer_terima').hide();
		}

		// Load other data
		loadRequestData(id_req);
		load_data_tb_approval(id_req);
		loadLabParameters();
		load_data_tracking();


	}

	function update_proses_approval() {
		// Mengumpulkan ID yang dipilih
		var selectedIds = [];
		$(".select-checkbox:checked").each(function() {
			selectedIds.push($(this).data('id'));
		});

		// Jika tidak ada ID yang dipilih, tampilkan peringatan
		if (selectedIds.length === 0) {
			Swal.fire({
				title: 'Peringatan',
				text: 'Tidak ada data yang dipilih.',
				icon: 'warning',
				confirmButtonColor: '#364574',
			});
			return;
		}

		// Mengirim data ke server menggunakan AJAX
		$.ajax({
			url: 'sample/update_proses_approval', // Ganti YOUR_CONTROLLER dengan nama controller Anda
			type: 'POST',
			data: {
				ids: selectedIds
			},
			success: function(response) {
				// Tampilkan pesan sukses
				Swal.fire({
					title: 'Sukses',
					text: 'Data berhasil diperbarui.',
					icon: 'success',
					confirmButtonColor: '#364574',
				}).then(() => {
					// Sembunyikan modal setelah berhasil
					$('#modal_buat_memo').modal('hide');
					updateCounts();
					// Lakukan tindakan tambahan jika diperlukan
					$('#tb_data').DataTable().ajax.reload();
				});
			},
			error: function(xhr, status, error) {
				// Tampilkan pesan error
				Swal.fire({
					title: 'Error',
					text: 'Terjadi kesalahan saat memperbarui data.',
					icon: 'error',
					confirmButtonColor: '#364574',
				});
			}
		});
	}


	function buat_memo() {
		// Mengumpulkan ID yang dipilih
		var selectedIds = [];
		$(".select-checkbox:checked").each(function() {
			selectedIds.push($(this).data('id'));
		});

		// Jika tidak ada ID yang dipilih, tampilkan peringatan
		if (selectedIds.length === 0) {
			Swal.fire({
				title: 'Peringatan',
				text: 'Tidak ada data yang dipilih.',
				icon: 'warning',
				confirmButtonColor: '#364574',
			});
			return;
		}

		// Mengecek kolom bentuk dan singkatan pada tabel view_analisa_request_sap
		$.ajax({
			url: "<?= site_url('sample/check_columns') ?>",
			type: "POST",
			data: {
				ids: selectedIds
			},
			success: function(response) {
				// console.log(response); // Debugging: periksa format respons

				// Parsing JSON jika diperlukan
				var data = JSON.parse(response);

				if (data.hasInvalidValues) {
					// Jika ada nilai NULL atau kosong di kolom bentuk atau singkatan
					Swal.fire({
						title: 'Peringatan',
						text: 'Ada data yang memiliki kolom jenis atau singkatan yang kosong.',
						icon: 'warning',
						confirmButtonColor: '#364574',
					});
				} else {
					// Simpan selectedIds ke dalam variabel global
					globalSelectedIds = selectedIds;

					// Menampilkan modal
					$('#modal_buat_memo').modal('show');

					// Menghancurkan instance DataTable jika sudah ada
					if ($.fn.DataTable.isDataTable('#tb_memo')) {
						$('#tb_memo').DataTable().destroy();
					}

					// Menginisialisasi DataTable dengan parameter ID yang terpilih
					$('#tb_memo').DataTable({
						processing: true,
						serverSide: true,
						paging: false, // Nonaktifkan pagination
						lengthChange: false, // Nonaktifkan perubahan jumlah item per halaman
						ajax: {
							"url": "<?= site_url('sample/fetch_memo_data') ?>",
							"type": "POST",
							"data": function(d) {
								// Menambahkan ID yang dipilih ke parameter AJAX
								d.ids = selectedIds;
							}
						},
						dom: 'rtp',
						lengthMenu: [
							[10, 25, 50, 100, -1],
							['10 rows', '25 rows', '50 rows', '100 rows', 'Semua']
						],
						buttons: [
							'pageLength'
						],
						columnDefs: [{
							"targets": '_all',
							"createdCell": function(td, cellData, rowData, row, col) {
								$(td).css('padding', '5px');
							}
						}]
					});
				}
			},
			error: function(xhr, status, error) {
				Swal.fire({
					title: 'Error',
					text: 'Terjadi kesalahan saat memeriksa data.',
					icon: 'error',
					confirmButtonColor: '#364574',
				});
			}
		});

	}



	function load_data_tb_approval(id) {
		// alert(id_req);

		if (id) {
			var id = id;
		} else {
			var id = $('#input_id_req').val();
		}

		// alert(id_req);
		$('#tb_ticket_approval').DataTable().clear().destroy();

		var tb_ticket_approval = $('#tb_ticket_approval').DataTable({

			processing: true,
			serverSide: true,
			// scrollX: true,
			autoWidth: false,

			ajax: {
				"url": "<?php echo site_url('analisa/list_approval'); ?>",
				"type": "POST",
				"data": {
					id: id
				},
			},

			// order: [
			// 	[1, 'desc']

			// ],
			dom: 'rt',
			lengthMenu: [
				[10, 25, 50, 100, -1],
				['10 rows', '25 rows', '50 rows', '100 rows', 'Semua']
			],
			buttons: [
				'pageLength'
			],

			initComplete: function(settings, json) {
				$("#tb_ticket_approval").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},
			columnDefs: [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": '_all', //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [0], // your case first column
					"visible": false
				},
				{
					"width": "1%",
					"targets": [1, 3, 4, 6]
				},
			],
		});

	}

	function load_data_tracking() {
		var idReq = $('#input_id_req').val(); // Ambil ID dari input

		$.ajax({
			url: '<?= site_url('analisa/load_data_tracking'); ?>',
			type: 'POST',
			data: {
				id_req: idReq
			},
			dataType: 'json',
			success: function(response) {
				if (response.length > 0) {
					var activityList = '';
					var firstIndex = 0; // Indeks item pertama

					$.each(response, function(index, item) {
						var isFirst = (index === firstIndex); // Cek apakah ini item pertama

						// Jika waktu_tracking adalah NULL, tampilkan string kosong
						var waktuTracking = item.waktu_tracking ? item.waktu_tracking : ' ';

						activityList += '<li class="activity-list activity-border">';
						activityList += '    <div class="activity-icon avatar-md">';
						activityList += '        <span class="avatar-title ' + (isFirst ? 'bg-soft-primary text-primary' : 'bg-soft-warning text-warning') + ' rounded-circle">';
						activityList += '            <i class="mdi mdi-ethereum font-size-24"></i>';
						activityList += '        </span>';
						activityList += '    </div>';
						activityList += '    <div class="timeline-list-item">';
						activityList += '        <div class="d-flex">';
						activityList += '            <div class="flex-grow-1 overflow-hidden me-4">';
						activityList += '                <h5 class="font-size-14 mb-1">' + waktuTracking + '</h5>';
						activityList += '                <p class="text-truncate text-muted font-size-13">' + item.desc_tracking + '</p>';
						activityList += '            </div>';
						activityList += '        </div>';
						activityList += '    </div>';
						activityList += '</li>';
					});

					$('.activity-wid').html(activityList); // Update list activity di view
				}
			},
			error: function(xhr, status, error) {
				console.error("Terjadi kesalahan: " + error);
			}
		});
	}

	function loadLabParameters() {
		var id = $('#input_id_req').val(); // Ambil ID dari input

		getAnalisLab(id);
		getAnalisaRnd(id);
		getAnalisaQc(id);
		getProgressStatus(id);
		// setupButtonHandlers(id);
		// Add change event listeners
		$('.result-input, .valid-input').on('change', function() {
			var itemId = $(this).data('id');
			var result = $(this).closest('tr').find('.result-input').val();
			var valid = $(this).closest('tr').find('.valid-input').val();

			// Send AJAX request to update the database
			$.ajax({
				url: "<?php echo site_url('analisa/update_analisa_lab'); ?>",
				type: "POST",
				data: {
					id: itemId,
					result: result,
					valid: valid
				},
				success: function(response) {
					var jsonResponse = JSON.parse(response);
					if (jsonResponse.status) {
						console.log('Data updated successfully.');
					} else {
						console.error('Failed to update data: ' + jsonResponse.message);
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		});


		// Pastikan handler event hanya ditambahkan sekali
		$('#hasil_analisa_lab').off('click').on('click', function() {
			if (!id) {
				alert('Tidak ada file yang tersedia untuk ditampilkan.');
				return;
			}

			$.ajax({
				url: "<?php echo site_url('sample/get_file_url'); ?>",
				type: "POST",
				data: {
					id: id
				},
				dataType: "json",
				success: function(response) {
					if (response.status === true) {
						window.open(response.file_url, '_blank');
					} else if (response.status === false) {
						Swal.fire({
							icon: 'warning',
							title: 'File Kosong',
							text: 'File yang dicari tidak ada'
						});
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
					alert('Terjadi kesalahan saat memuat file.');
				}
			});
		});

		$('#uploadButton').on('click', function() {
			var file_data = $('#fileUpload').prop('files')[0];
			if (!file_data) {
				alert('Silakan pilih file untuk diunggah.');
				return;
			}

			var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append('id', id);
			// form_data.append('nama_analis', $('#nama_analis').val());

			$.ajax({
				url: "<?php echo site_url('sample/upload_file'); ?>",
				type: "POST",
				data: form_data,
				contentType: false,
				processData: false,
				success: function(response) {
					try {
						var jsonResponse = JSON.parse(response);
						if (jsonResponse.status) {
							Swal.fire({
								icon: 'success',
								title: 'Berhasil',
								text: 'File berhasil diunggah dan disimpan.'
							});

							$('#viewFileButton').data('file-id', id);
							$('#deleteFileButton').data('file-id', id);
						} else {
							alert('Gagal mengunggah file: ' + jsonResponse.error);
						}
					} catch (e) {
						console.error('Response parsing error:', e);
						alert('Terjadi kesalahan saat memproses response.');
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
					alert('Terjadi kesalahan saat mengunggah file.');
				}
			});
		});


		$('#viewFileButton').off('click').on('click', function() {

			if (!id) {
				alert('Tidak ada file yang tersedia untuk ditampilkan.');
				return;
			}

			$.ajax({
				url: "<?php echo site_url('sample/get_file_url'); ?>",
				type: "POST",
				data: {
					id: id
				},
				dataType: "json",
				success: function(response) {
					if (response.status) {
						window.open(response.file_url, '_blank');
					} else {
						alert(response.error);
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
					alert('Terjadi kesalahan saat memuat file.');
				}
			});
		});



		$('#deleteFileButton').on('click', function() {

			if (!id) {
				alert('Tidak ada file yang dapat dihapus.');
				return;
			}

			$.ajax({
				url: "<?php echo site_url('sample/delete_file'); ?>",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					try {
						var jsonResponse = JSON.parse(response);
						if (jsonResponse.status) {
							Swal.fire({
								icon: 'warning',
								title: 'Hapus',
								text: 'File berhasil telah dihapus.'
							});

							$('#viewFileButton').removeData('file-id');
							$('#deleteFileButton').removeData('file-id');
						} else {
							alert('Gagal menghapus file: ' + jsonResponse.error);
						}
					} catch (e) {
						console.error('Response parsing error:', e);
						alert('Terjadi kesalahan saat memproses response.');
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
					alert('Terjadi kesalahan saat menghapus file.');
				}
			});
		});


	}

	function getAnalisLab(id) {

		// alert(id);
		$.ajax({
			url: "<?php echo site_url('analisa/get_analis_lab'); ?>",
			type: "POST",
			data: {
				id: id
			},
			dataType: "json",
			success: function(response) {
				if (response.status) {
					var defaultAnalisLab = response.analis_lab;
					$('#info_nama_analis').val(defaultAnalisLab);
					initSelect2(defaultAnalisLab);
					fetchAnalisList(defaultAnalisLab, id);
				} else {
					alert('Gagal memuat data analis lab.');
				}
			},
			error: function(xhr, status, error) {
				console.error(error);
				alert('Terjadi kesalahan saat memuat data analis lab.');
			}
		});
	}

	function initSelect2(defaultAnalisLab) {
		$('#nama_analis').select2({
			dropdownParent: $("#modal_info_analisa"),
			width: '70%' // Atur lebar select2
		}).val(defaultAnalisLab).trigger('change');
	}

	function fetchAnalisList(defaultAnalisLab, id) {
		$.ajax({
			url: "<?php echo site_url('analisa/get_analis_list'); ?>",
			type: "GET",
			dataType: "json",
			success: function(data) {
				if (data.status) {
					var namaAnalisSelect = $('#nama_analis');
					namaAnalisSelect.empty(); // Clear previous options
					namaAnalisSelect.append('<option value=""> Pilih Analis </option>');
					data.analis.forEach(function(analis) {
						var isSelected = (analis.pernr === defaultAnalisLab) ? 'selected' : '';
						var option = `<option value="${analis.pernr}" ${isSelected}>${analis.name}</option>`;
						namaAnalisSelect.append(option);
					});
					namaAnalisSelect.val(defaultAnalisLab).trigger('change');
					updateAnalisLabOnSelect(id);
				} else {
					alert('Gagal memuat daftar analis.');
				}
			},
			error: function(xhr, status, error) {
				console.error(error);
				alert('Terjadi kesalahan saat memuat daftar analis.');
			}
		});
	}

	function updateAnalisLabOnSelect(id) {
		$('#nama_analis').on('select2:close', function() {
			var selectedAnalis = $(this).val();
			$.ajax({
				url: "<?php echo site_url('analisa/update_analis_lab'); ?>",
				type: "POST",
				data: {
					id: id,
					analis_lab: selectedAnalis
				},
				success: function(updateResponse) {
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: 'Data analis telah diperbaharui.'
					});
				},
				error: function(xhr, status, error) {
					console.error(error);
					alert('Terjadi kesalahan saat memperbarui analis_lab.');
				}
			});
		});
	}

	function getAnalisaRnd(id) {
		$.ajax({
			url: "<?php echo site_url('analisa/get_analisa_rnd'); ?>",
			type: "POST",
			data: {
				id: id
			},
			dataType: "json",
			success: function(data) {
				var tableBody = $('#parameter-table-rnd tbody');
				tableBody.empty(); // Clear previous rows if any
				var counter = 1;

				if (data.data.length > 0) {
					$('#tab_rnd').removeAttr('hidden'); // Show the tab
					data.data.forEach(function(item) {
						var row = `
                        <tr>
                            <td style="padding: 2px 5px;">${counter++}</td>
                            <td style="padding: 2px 5px;">${item.short_text}</td>
                            <td style="padding: 2px 5px;">${item.spec}</td>
                            <td style="padding: 2px 5px;">${item.result}</td>
                            <td style="padding: 2px 5px;">${item.valid}</td>
                        </tr>
                    `;
						tableBody.append(row);
					});
				} else {
					$('#tab_rnd').attr('hidden', true); // Hide the tab
				}
			},
			error: function(xhr, status, error) {
				console.error(error);
				alert('Terjadi kesalahan saat memuat data parameter R&D.');
			}
		});
	}

	function getAnalisaQc(id) {
		$.ajax({
			url: "<?php echo site_url('analisa/get_analisa_qc'); ?>",
			type: "POST",
			data: {
				id: id
			},
			dataType: "json",
			success: function(data) {
				var tableBody = $('#parameter-table-qc tbody');
				tableBody.empty(); // Clear previous rows if any
				var counter = 1;
				data.data.forEach(function(item) {
					var row = `
                    <tr>
                        <td style="padding: 2px 5px;">${counter++}</td>
                        <td style="padding: 2px 5px;">${item.short_text}</td>
                        <td style="padding: 2px 5px;">${item.spec}</td>
                        <td style="padding: 2px 5px;">${item.result}</td>
                        <td style="padding: 2px 5px;">${item.valid}</td>
                    </tr>
                `;
					tableBody.append(row);
				});
			},
			error: function(xhr, status, error) {
				console.error(error);
				alert('Terjadi kesalahan saat memuat data parameter QC.');
			}
		});
	}

	function getProgressStatus(id) {
		$.ajax({
			url: "<?php echo site_url('analisa/get_progress_status'); ?>",
			type: "POST",
			data: {
				id: id
			},
			dataType: "json",
			success: function(progressData) {
				if (progressData.status) {
					var progress = progressData.progress;
					getAnalisaLab(id, progress);
				} else {
					alert('Gagal mendapatkan status progress.');
				}
			},
			error: function(xhr, status, error) {
				console.error(error);
				alert('Terjadi kesalahan saat memuat status progress.');
			}
		});
	}

	function getAnalisaLab(id, progress) {
		var url = "<?php echo site_url('analisa/get_analisa_lab'); ?>";
		$.ajax({
			url: url,
			type: "POST",
			data: {
				id: id,
			},
			dataType: "json",
			success: function(data) {
				$('#tab_lab').removeAttr('hidden'); // Menampilkan tab
				var counter = 1;

				if (progress === "Input data analisa Lab") {
					// Ambil nilai jumlah_sample berdasarkan id
					$.ajax({
						url: 'sample/get_jumlah_sample', // Ganti dengan URL endpoint Anda
						type: 'POST',
						data: {
							id: id
						},
						dataType: 'json',
						success: function(response) {
							var jumlah_sample = response.jumlah_sample;

							$('#input_analis_lab').hide();
							$('#footer_analisa_selesai').hide();
							$('#footer_input_analisa').hide();
							$('#form_hasil_lab').show();
							$('#footer_analisa_lab_selesai').show();

							var tabList = $('<ul class="nav nav-tabs" role="tablist"></ul>');
							var tabContent = $('<div class="tab-content p-3 text-muted"></div>');

							// Membuat tab dan konten tab dinamis
							for (var i = 1; i <= jumlah_sample; i++) {
								// Membuat tab dinamis
								tabList.append(`
                                <li class="nav-item">
                                    <a class="nav-link ${i === 1 ? 'active' : ''}" data-bs-toggle="tab" href="#sample${i}" role="tab" data-iteration="${i}">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Sample ${i}</span>
                                    </a>
                                </li>
                            `);

								// Membuat konten tab dinamis
								tabContent.append(`
                                <div class="tab-pane ${i === 1 ? 'active' : ''}" id="sample${i}" role="tabpanel">
                                    <table id="parameter-table-lab-${i}" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
                                        <thead>
                                            <tr>
                                                <th style="padding: 2px 5px;">No</th>
                                                <th style="padding: 2px 5px;">Parameter</th>
                                                <th style="padding: 2px 5px;">Spesifikasi</th>
                                                <th style="padding: 2px 5px;">Hasil</th>
                                                <th style="padding: 2px 5px;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Baris akan ditambahkan di sini secara dinamis -->
                                        </tbody>
                                    </table>
                                </div>
                            `);
							}

							// Gabungkan tabList dan tabContent ke dalam div load_data_sample_lab
							$('#load_data_sample_lab').empty().append(tabList).append(tabContent);

							// Tambahkan event listener untuk setiap tab
							tabList.find('.nav-link').on('click', function() {
								var iterationValue = $(this).data('iteration');
								var url = "<?php echo site_url('analisa/get_analisa_lab'); ?>";

								$.ajax({
									url: url,
									type: "POST",
									data: {
										id: id,
									},
									dataType: "json",
									success: function(data) {
										// Filter data berdasarkan sample_ke yang sesuai
										var filteredData = data.data.filter(function(item) {
											return item.sample_ke == iterationValue;
										});

										// Reset counter setiap kali tab baru diklik
										var counter = 1;

										// Update tabel untuk tab yang diklik
										var tableBody = $(`#parameter-table-lab-${iterationValue} tbody`);
										tableBody.empty(); // Kosongkan baris tabel sebelumnya

										// Tambahkan baris data yang difilter
										filteredData.forEach(function(item) {
											var row = `
											<tr>
												<td style="padding: 2px 5px;">${counter++}</td>
												<td style="padding: 2px 5px;">${item.short_text}</td>
												<td style="padding: 2px 5px;">${item.spec}</td>
												<td style="padding: 2px 5px;">
													<input type="text" class="result-input" data-id-spec="${item.id}" value="${item.result}" style="width: 100%; padding: 2px 5px;">
												</td>
												<td style="padding: 2px 5px;">
													<input type="text" class="valid-input" data-id-spec="${item.id}" value="${item.valid}" style="width: 100%; padding: 2px 5px;">
												</td>
											</tr>
										`;
											tableBody.append(row);
										});

										// Tambahkan event handler untuk update result dan valid saat input kehilangan fokus
										$('.result-input, .valid-input').off('change').on('change', function() {
											var id_spec = $(this).data('id-spec');
											var result = $(this).closest('tr').find('.result-input').val();
											var valid = $(this).closest('tr').find('.valid-input').val();

											// Send AJAX request to update the database
											$.ajax({
												url: "<?php echo site_url('analisa/update_analisa_lab'); ?>",
												type: "POST",
												data: {
													id: id_spec,
													result: result,
													valid: valid
												},
												success: function(response) {
													var jsonResponse = JSON.parse(response);
													if (jsonResponse.status) {
														console.log('Data updated successfully.');
													} else {
														console.error('Failed to update data: ' + jsonResponse.message);
													}
												},
												error: function(xhr, status, error) {
													console.error(error);
												}
											});
										});
									},
									error: function(xhr, status, error) {
										console.error('Error retrieving data:', error);
									}
								});
							});

							// Trigger klik pada tab pertama secara default untuk mengisi data awal
							tabList.find('.nav-link.active').trigger('click');


						},
						error: function(xhr, status, error) {
							console.error('Error retrieving data:', error);
						}
					});
				} else if (progress === "Sedang dianalisa Lab") {
					getAnalisLab(id);
					$.ajax({
						url: 'sample/get_jumlah_sample', // Ganti dengan URL endpoint Anda
						type: 'POST',
						data: {
							id: id
						},
						dataType: 'json',
						success: function(response) {
							var jumlah_sample = response.jumlah_sample;


							$('#input_analis_lab').show();
							$('#footer_analisa_selesai').show();
							$('#footer_input_analisa').hide();
							$('#form_hasil_lab').hide();
							$('#footer_input_analisa').hide();
							$('#footer_analisa_lab_selesai').hide();


							var tabList = $('<ul class="nav nav-tabs" role="tablist"></ul>');
							var tabContent = $('<div class="tab-content p-3 text-muted"></div>');

							// Membuat tab dan konten tab dinamis
							for (var i = 1; i <= jumlah_sample; i++) {
								// Membuat tab dinamis
								tabList.append(`
                                <li class="nav-item">
                                    <a class="nav-link ${i === 1 ? 'active' : ''}" data-bs-toggle="tab" href="#sample${i}" role="tab" data-iteration="${i}">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Sample ${i}</span>
                                    </a>
                                </li>
                            `);

								// Membuat konten tab dinamis
								tabContent.append(`
                                <div class="tab-pane ${i === 1 ? 'active' : ''}" id="sample${i}" role="tabpanel">
                                    <table id="parameter-table-lab-${i}" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
                                        <thead>
                                            <tr>
                                                <th style="padding: 2px 5px;">No</th>
                                                <th style="padding: 2px 5px;">Parameter</th>
                                                <th style="padding: 2px 5px;">Spesifikasi</th>
                                                <th style="padding: 2px 5px;">Hasil</th>
                                                <th style="padding: 2px 5px;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Baris akan ditambahkan di sini secara dinamis -->
                                        </tbody>
                                    </table>
                                </div>
                            `);
							}

							// Gabungkan tabList dan tabContent ke dalam div load_data_sample_lab
							$('#load_data_sample_lab').empty().append(tabList).append(tabContent);

							// Tambahkan event listener untuk setiap tab
							// Event listener ketika tab diklik
							$('.nav-link').on('click', function() {
								var iterationValue = $(this).data('iteration');
								var tableBody = $(`#parameter-table-lab-${iterationValue} tbody`);
								tableBody.empty(); // Kosongkan baris tabel sebelumnya

								// Filter data berdasarkan sample_ke
								var filteredData = data.data.filter(function(item) {
									return item.sample_ke == iterationValue;
								});

								// Reset counter untuk penomoran yang sesuai
								var counter = 1;

								// Tambahkan baris data yang terfilter ke tabel
								filteredData.forEach(function(item) {
									var row = `
									<tr>
										<td style="padding: 2px 5px;">${counter++}</td>
										<td style="padding: 2px 5px;">${item.short_text}</td>
										<td style="padding: 2px 5px;">${item.spec}</td>
											<td style="padding: 2px 5px;">${item.result}</td>
												<td style="padding: 2px 5px;">${item.valid}</td>
									
									</tr>
								`;
									tableBody.append(row);
								});
							});


							// Trigger klik pada tab pertama secara default untuk mengisi data awal
							tabList.find('.nav-link.active').trigger('click');
						}
					});
				} else if (progress === "Approval hasil analisa") {
					$.ajax({
						url: 'sample/get_jumlah_sample', // Ganti dengan URL endpoint Anda
						type: 'POST',
						data: {
							id: id
						},
						dataType: 'json',
						success: function(response) {
							var jumlah_sample = response.jumlah_sample;

							$('#input_analis_lab').hide();
							$('#footer_analisa_selesai').hide();
							$('#footer_input_analisa').show();
							$('#form_hasil_lab').show();
							$('#footer_input_analisa').show();


							var tabList = $('<ul class="nav nav-tabs" role="tablist"></ul>');
							var tabContent = $('<div class="tab-content p-3 text-muted"></div>');

							// Membuat tab dan konten tab dinamis
							for (var i = 1; i <= jumlah_sample; i++) {
								// Membuat tab dinamis
								tabList.append(`
                                <li class="nav-item">
                                    <a class="nav-link ${i === 1 ? 'active' : ''}" data-bs-toggle="tab" href="#sample${i}" role="tab" data-iteration="${i}">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Sample ${i}</span>
                                    </a>
                                </li>
                            `);

								// Membuat konten tab dinamis
								tabContent.append(`
                                <div class="tab-pane ${i === 1 ? 'active' : ''}" id="sample${i}" role="tabpanel">
                                    <table id="parameter-table-lab-${i}" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
                                        <thead>
                                            <tr>
                                                <th style="padding: 2px 5px;">No</th>
                                                <th style="padding: 2px 5px;">Parameter</th>
                                                <th style="padding: 2px 5px;">Spesifikasi</th>
                                                <th style="padding: 2px 5px;">Hasil</th>
                                                <th style="padding: 2px 5px;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Baris akan ditambahkan di sini secara dinamis -->
                                        </tbody>
                                    </table>
                                </div>
                            `);
							}

							// Gabungkan tabList dan tabContent ke dalam div load_data_sample_lab
							$('#load_data_sample_lab').empty().append(tabList).append(tabContent);

							// Tambahkan event listener untuk setiap tab
							// Event listener ketika tab diklik
							$('.nav-link').on('click', function() {
								var iterationValue = $(this).data('iteration');
								var tableBody = $(`#parameter-table-lab-${iterationValue} tbody`);
								tableBody.empty(); // Kosongkan baris tabel sebelumnya

								// Filter data berdasarkan sample_ke
								var filteredData = data.data.filter(function(item) {
									return item.sample_ke == iterationValue;
								});

								// Reset counter untuk penomoran yang sesuai
								var counter = 1;

								// Tambahkan baris data yang terfilter ke tabel
								filteredData.forEach(function(item) {
									var row = `
									<tr>
										<td style="padding: 2px 5px;">${counter++}</td>
										<td style="padding: 2px 5px;">${item.short_text}</td>
										<td style="padding: 2px 5px;">${item.spec}</td>
											<td style="padding: 2px 5px;">${item.result}</td>
												<td style="padding: 2px 5px;">${item.valid}</td>
									
									</tr>
								`;
									tableBody.append(row);
								});
							});


							// Trigger klik pada tab pertama secara default untuk mengisi data awal
							tabList.find('.nav-link.active').trigger('click');
						}
					});
				} else if (progress === "Analisa Lab selesai") {
					$.ajax({
						url: 'sample/get_jumlah_sample', // Ganti dengan URL endpoint Anda
						type: 'POST',
						data: {
							id: id
						},
						dataType: 'json',
						success: function(response) {
							var jumlah_sample = response.jumlah_sample;

							$('#input_analis_lab').hide();
							$('#footer_analisa_selesai').hide();
							$('#footer_input_analisa').hide();
							$('#form_hasil_lab').show();
							$('#footer_input_analisa').hide();


							var tabList = $('<ul class="nav nav-tabs" role="tablist"></ul>');
							var tabContent = $('<div class="tab-content p-3 text-muted"></div>');

							// Membuat tab dan konten tab dinamis
							for (var i = 1; i <= jumlah_sample; i++) {
								// Membuat tab dinamis
								tabList.append(`
                                <li class="nav-item">
                                    <a class="nav-link ${i === 1 ? 'active' : ''}" data-bs-toggle="tab" href="#sample${i}" role="tab" data-iteration="${i}">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Sample ${i}</span>
                                    </a>
                                </li>
                            `);

								// Membuat konten tab dinamis
								tabContent.append(`
                                <div class="tab-pane ${i === 1 ? 'active' : ''}" id="sample${i}" role="tabpanel">
                                    <table id="parameter-table-lab-${i}" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
                                        <thead>
                                            <tr>
                                                <th style="padding: 2px 5px;">No</th>
                                                <th style="padding: 2px 5px;">Parameter</th>
                                                <th style="padding: 2px 5px;">Spesifikasi</th>
                                                <th style="padding: 2px 5px;">Hasil</th>
                                                <th style="padding: 2px 5px;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Baris akan ditambahkan di sini secara dinamis -->
                                        </tbody>
                                    </table>
                                </div>
                            `);
							}

							// Gabungkan tabList dan tabContent ke dalam div load_data_sample_lab
							$('#load_data_sample_lab').empty().append(tabList).append(tabContent);

							// Tambahkan event listener untuk setiap tab
							// Event listener ketika tab diklik
							$('.nav-link').on('click', function() {
								var iterationValue = $(this).data('iteration');
								var tableBody = $(`#parameter-table-lab-${iterationValue} tbody`);
								tableBody.empty(); // Kosongkan baris tabel sebelumnya

								// Filter data berdasarkan sample_ke
								var filteredData = data.data.filter(function(item) {
									return item.sample_ke == iterationValue;
								});

								// Reset counter untuk penomoran yang sesuai
								var counter = 1;

								// Tambahkan baris data yang terfilter ke tabel
								filteredData.forEach(function(item) {
									var row = `
									<tr>
										<td style="padding: 2px 5px;">${counter++}</td>
										<td style="padding: 2px 5px;">${item.short_text}</td>
										<td style="padding: 2px 5px;">${item.spec}</td>
											<td style="padding: 2px 5px;">${item.result}</td>
												<td style="padding: 2px 5px;">${item.valid}</td>
									
									</tr>
								`;
									tableBody.append(row);
								});
							});


							// Trigger klik pada tab pertama secara default untuk mengisi data awal
							tabList.find('.nav-link.active').trigger('click');
						}
					});
				} else {

					$.ajax({
						url: 'sample/get_jumlah_sample', // Ganti dengan URL endpoint Anda
						type: 'POST',
						data: {
							id: id
						},
						dataType: 'json',
						success: function(response) {
							var jumlah_sample = response.jumlah_sample;

							$('#input_analis_lab').hide();
							$('#footer_analisa_selesai').hide();
							$('#footer_input_analisa').hide();
							$('#form_hasil_lab').hide();
							$('#footer_analisa_lab_selesai').hide();


							var tabList = $('<ul class="nav nav-tabs" role="tablist"></ul>');
							var tabContent = $('<div class="tab-content p-3 text-muted"></div>');

							// Membuat tab dan konten tab dinamis
							for (var i = 1; i <= jumlah_sample; i++) {
								// Membuat tab dinamis
								tabList.append(`
                                <li class="nav-item">
                                    <a class="nav-link ${i === 1 ? 'active' : ''}" data-bs-toggle="tab" href="#sample${i}" role="tab" data-iteration="${i}">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Sample ${i}</span>
                                    </a>
                                </li>
                            `);

								// Membuat konten tab dinamis
								tabContent.append(`
                                <div class="tab-pane ${i === 1 ? 'active' : ''}" id="sample${i}" role="tabpanel">
                                    <table id="parameter-table-lab-${i}" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
                                        <thead>
                                            <tr>
                                                <th style="padding: 2px 5px;">No</th>
                                                <th style="padding: 2px 5px;">Parameter</th>
                                                <th style="padding: 2px 5px;">Spesifikasi</th>
                                                <th style="padding: 2px 5px;">Hasil</th>
                                                <th style="padding: 2px 5px;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Baris akan ditambahkan di sini secara dinamis -->
                                        </tbody>
                                    </table>
                                </div>
                            `);
							}

							// Gabungkan tabList dan tabContent ke dalam div load_data_sample_lab
							$('#load_data_sample_lab').empty().append(tabList).append(tabContent);

							// Tambahkan event listener untuk setiap tab
							// Event listener ketika tab diklik
							$('.nav-link').on('click', function() {
								var iterationValue = $(this).data('iteration');
								var tableBody = $(`#parameter-table-lab-${iterationValue} tbody`);
								tableBody.empty(); // Kosongkan baris tabel sebelumnya

								// Filter data berdasarkan sample_ke
								var filteredData = data.data.filter(function(item) {
									return item.sample_ke == iterationValue;
								});

								// Reset counter untuk penomoran yang sesuai
								var counter = 1;

								// Tambahkan baris data yang terfilter ke tabel
								filteredData.forEach(function(item) {
									var row = `
									<tr>
										<td style="padding: 2px 5px;">${counter++}</td>
										<td style="padding: 2px 5px;">${item.short_text}</td>
										<td style="padding: 2px 5px;">${item.spec}</td>
											<td style="padding: 2px 5px;">${item.result}</td>
												<td style="padding: 2px 5px;">${item.valid}</td>
									
									</tr>
								`;
									tableBody.append(row);
								});
							});


							// Trigger klik pada tab pertama secara default untuk mengisi data awal
							tabList.find('.nav-link.active').trigger('click');
						}
					});
				}
			},
			error: function(xhr, status, error) {
				console.error('Error retrieving data:', error);
			}
		});
	}



	// Function to setup input change handlers
	function setupDataInputHandlers() {
		$('.result-input, .valid-input').off('change').on('change', function() {
			var id_spec = $(this).data('id-spec');
			var result = $(this).closest('tr').find('.result-input').val();
			var valid = $(this).closest('tr').find('.valid-input').val();

			// Send AJAX request to update the database
			$.ajax({
				url: "<?php echo site_url('analisa/update_analisa_lab'); ?>",
				type: "POST",
				data: {
					id: id_spec,
					result: result,
					valid: valid
				},
				success: function(response) {
					var jsonResponse = JSON.parse(response);
					if (jsonResponse.status) {
						console.log('Data updated successfully.');
					} else {
						console.error('Failed to update data: ' + jsonResponse.message);
					}
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		});
	}



	// function setupDataInputHandlers() {
	// 	$('.result-input').on('change', function() {
	// 		var id = $(this).data('id');
	// 		var result = $(this).val();
	// 		updateAnalisaLabResult(id, result);
	// 	});

	// 	$('.valid-input').on('change', function() {
	// 		var id = $(this).data('id');
	// 		var valid = $(this).val();
	// 		updateAnalisaLabValid(id, valid);
	// 	});
	// }

	// function updateAnalisaLabResult(id, result) {
	// 	$.ajax({
	// 		url: "<?php echo site_url('analisa/update_analisa_lab'); ?>",
	// 		type: "POST",
	// 		data: {
	// 			id: id,
	// 			result: result
	// 		},
	// 		success: function(response) {
	// 			// Handle success response if needed
	// 		},
	// 		error: function(xhr, status, error) {
	// 			console.error(error);
	// 			alert('Terjadi kesalahan saat memperbarui hasil analisa.');
	// 		}
	// 	});
	// }

	// function updateAnalisaLabValid(id, valid) {
	// 	$.ajax({
	// 		url: "<?php echo site_url('analisa/update_analisa_lab'); ?>",
	// 		type: "POST",
	// 		data: {
	// 			id: id,
	// 			valid: valid
	// 		},
	// 		success: function(response) {
	// 			// Handle success response if needed
	// 		},
	// 		error: function(xhr, status, error) {
	// 			console.error(error);
	// 			alert('Terjadi kesalahan saat memperbarui validasi analisa.');
	// 		}
	// 	});
	// }

	function loadRequestData(id) {
		$.ajax({
			url: "<?php echo site_url('analisa/get_request_data'); ?>", // URL untuk mengambil data
			type: "POST",
			data: {
				id: id
			},
			dataType: "json",
			success: function(data) {
				$('#info_nama_qc').text(data.nama_qc || "");
				$('#info_material').text(data.material.replace(/^0+/, "") || "");
				$('#info_created_at').text(data.created_at === '0000-00-00' ? '' : formatDate(data.created_at));
				$('#info_desc').text(data.desc || "");
				$('#info_sloc').text(data.sloc || "");
				// Combine quantity and uom
				var quantityText = (data.quantity || "") + " " + (data.uom || "");
				$('#info_quantity').text(quantityText.trim());
				$('#info_zmasalah').text(data.zmasalah || "");
				$('#info_distribusi').text(data.info_distribusi || "");
				$('#info_sample_lab').text(data.jumlah_sample || "");
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.error("Error fetching data: ", textStatus, errorThrown);
			}
		});
	}



	function formatDate(dateString) {
		if (dateString === '0000-00-00' || !dateString) {
			return ''; // Return empty if dateString is '0000-00-00' or empty
		}

		var date = new Date(dateString);
		var day = ('0' + date.getDate()).slice(-2);
		var month = ('0' + (date.getMonth() + 1)).slice(-2); // Months are zero-based
		var year = date.getFullYear();

		return day + '-' + month + '-' + year;
	}

	function info_batch(id_req) {
		$.ajax({
			url: "<?php echo site_url('analisa/get_info_batch'); ?>", // URL controller
			type: "POST",
			data: {
				id_req: id_req
			},
			dataType: "json",
			success: function(data) {
				if (data.status === 'success') {
					$('#manuf_date').text(formatDate(data.manuf_date));
					$('#tanggal_karantina').text(formatDate(data.tanggal_karantina));
					$('#tanggal_ed').text(formatDate(data.tanggal_ed));
					$('#info_batch').modal('show'); // Show modal
					$('.modal-title').text('Info Batch'); // Set Title to Bootstrap modal title
				} else {
					alert('Data tidak ditemukan.');
				}
			},
			error: function() {
				alert('Terjadi kesalahan.');
			}
		});
	}



	function reload_table() {
		$('#tabel_user').DataTable().ajax.reload();

	}


	function save_api() {

		var baru = document.getElementById('id_api').value;


		if (baru == '') {
			url = "<?php echo site_url('api/save_api') ?>";
		} else {
			url = "<?php echo site_url('api/update_api') ?>";
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
			url: "<?php echo site_url('api/get_data') ?>/" + id_api,
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
					url: "<?php echo site_url('api/delete_api') ?>/" + id_api,
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
</body>

</html>