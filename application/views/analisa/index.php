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

			<div class="row">
				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->

						<div class="card-body" id="filter-masuk" style="cursor: pointer;">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block text-truncate">
										<span class="badge bg-success">Analisa Masuk</span>
									</span>
									<h1 class="mb-3" id="jumlah-analisa-masuk">0...</h1>
								</div>
							</div>
						</div><!-- end card body -->

					</div><!-- end card -->
				</div><!-- end col -->
				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->
						<div class="card-body" id="filter-approval" style="cursor: pointer;">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-secondary">Proses Approval</span></span>
									<h1 class="mb-3" id="jumlah-analisa-approval">0...</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col-->

				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->
						<div class="card-body" id="filter-lab" style="cursor: pointer;">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-info">Proses Lab Analisa</span></span>
									<h1 class="mb-3" id="jumlah-analisa-lab">0...</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col-->

				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->
						<div class="card-body" id="filter-rnd" style="cursor: pointer;">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                        text-truncate"><span class="badge bg-warning">Proses R&D</span></span>
									<h1 class="mb-3" id="jumlah-analisa-rnd">0...</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col-->


				<div class="col">
					<!-- card -->
					<div class="card card-h-100">
						<!-- card body -->
						<div class="card-body" id="filter-selesai" style="cursor: pointer;">
							<div class="row align-items-center">
								<div class="col">
									<span class="text-muted mb-3 lh-1 d-block
                                    text-truncate"><span class="badge bg-primary">Analisa Selesai</span></span>
									<h1 class="mb-3" id="jumlah-analisa-selesai">0...</h1>
								</div>


							</div>

						</div>
					</div><!-- end card -->
				</div><!-- end col-->
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
								<h2 class="mb-sm-0 font-size-32">Daftar Karantina</h2>
							</div>

							<div class="col-md-6">
								<div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
									<div class="d-flex align-items-center">
										<label for="filter_tahun" class="me-2">Filter Tahun:</label> <!-- Label untuk dropdown tahun -->
										<select id="filter_tahun" class="form-control">
											<!-- Tahun akan diisi menggunakan JavaScript -->
										</select>
									</div>

									<div hidden>
										<a class="btn btn-primary" id="btn_add_karantina" onclick="add_karantina()"><i class="bx bx-plus me-1"></i>Karantina</a>
									</div>
									<button style="display: none;" class="btn btn-primary" id="multiCetakLabel" onclick="multiCetakLabel()">Cetak Label Terpilih</button>
								</div>
							</div>



						</div>
					</div>
				</div>
				<div class="card-body">


					<table id="tb_analisa" class="table table-bordered compact nowrap w-100 ">
						<thead>
							<tr class="filter-row">
								<th></th>
								<th>
									<input type="text" id="filter_1" placeholder="Filter Tanggal" style="width: 80px; padding: 5px; font-size: 12px;border: 1px solid #ccc;">
								</th>
								<th>
									<input type="text" id="filter_2" placeholder="Filter Sloc" style="width: 80px; padding: 5px; font-size: 12px;border: 1px solid #ccc;">
								</th>
								<th>
									<input type="text" id="filter_3" placeholder="Filter No Karantina" style="width: 80px; padding: 5px; font-size: 12px;border: 1px solid #ccc;">
								</th>
								<th>
									<input type="text" id="filter_10" placeholder="Filter No Batch" style="width: 80px; padding: 5px; font-size: 12px;border: 1px solid #ccc;">
								</th>
								<th></th>
								<th>
									<input type="text" id="filter_5" placeholder="Filter Proses" style="width: 80px; padding: 5px; font-size: 12px;border: 1px solid #ccc;">
								</th>
								<th>
									<input type="text" id="filter_6" placeholder="Filter Jenis Masalah" style="width: 250px; padding: 5px; font-size: 12px;border: 1px solid #ccc;">
								</th>
								<th>
									<input type="text" id="filter_7" placeholder="Filter No Material" style="width: 80px; padding: 5px; font-size: 12px;border: 1px solid #ccc;">
								</th>
								<th>
									<input type="text" id="filter_8" placeholder="Filter Nama Material" style="width: 150px; padding: 5px; font-size: 12px;border: 1px solid #ccc;">
								</th>
								<th></th>

								<th>
									<input type="text" id="filter_11" placeholder="Filter Requestor" style="width: 80px; padding: 5px; font-size: 12px;border: 1px solid #ccc;">
								</th>
							</tr>

							<tr>
								<!-- <th width="10px">Edit</th>
								<th width="10px">Del</th> -->
								<!-- <th><input type="checkbox" id="select-all"></th> -->
								<th width="10px">#</th>
								<th width="10px">Tanggal</th>
								<th>Sloc</th>
								<th width="10px">No Karantina</th>
								<th>No Batch</th>
								<th width="10px">Status</th>
								<!-- <th width="10px">Urgent</th> -->
								<th>Proses</th>
								<th width="10px">Jenis Masalah</th>
								<th>No Material</th>
								<th>Nama Material</th>
								<th>Jumlah</th>



								<th>Requestor</th>

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
						<div class="card-body px-0 mb-0">
							<div class="row">
								<!-- Tambahkan row untuk membungkus col -->
								<div class="col-xl-6 col-md-6" id="tracking_lab">
									<!-- col-md-6 agar tetap responsif pada layar lebih kecil -->
									<label>Detail Proses</label>
									<div class="card">
										<div class="card-body px-0">
											<div class="px-3" data-simplebar style="max-height: 352px;">
												<ul class="list-unstyled activity-wid mb-0">
													<!-- Konten Card 1 -->
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-md-6" hidden id="tracking_rnd">
									<!-- col-md-6 untuk responsivitas -->
									<label>Proses Kirim Data Ke System R&D </label>
									<div class="card">
										<div class="card-body px-0">
											<div class="px-3" data-simplebar style="max-height: 352px;">
												<ul class="list-unstyled activity-wid mb-0">
													<konten>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div> <!-- Tutup row -->
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
									<th>Usulan </th>
									<th>Kesimpulan </th>
									<th>Tanggal</th>
								</tr>
							</thead>

						</table>

					</div>
					<div class="tab-pane " id="qc" role="tabpanel">
						<table class="table" style="border: none; width: 100%;">
							<tbody>
								<tr>
									<th style="border: none; padding: 0px;" width="13%">Requestor</th>
									<td style="border: none; padding: 0px;" width="25%">: <span id="info_nama_qc"></span></td>
									<th style="border: none; padding: 0px;" width="15%">Kode Material</th>
									<td style="border: none; padding: 0px;" width="47%">: <span id="info_material"></span><span id="info_lv_total"></span></td>
								</tr>

								<tr>
									<th style="border: none; padding: 0px;">Tanggal Request</th>
									<td style="border: none; padding: 0px;">: <span id="info_created_at"></span></td>
									<th style="border: none; padding: 0px;">Nama Material</th>
									<td style="border: none; padding: 0px;">: <span id="info_desc"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">No Request</th>
									<td style="border: none; padding: 0px;">: <span id="info_no_karantina"></span></td>
									<th style="border: none; padding: 0px;">Jumlah</th>
									<td style="border: none; padding: 0px;">: <span id="info_quantity"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Masalah</th>
									<td style="border: none; padding: 0px;">: <span id="info_zmasalah"></span></td>
									<th style="border: none; padding: 0px;">Distribusi Analisa</th>
									<td style="border: none; padding: 0px;">: <span id="info_distribusi"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Lama Pengerjaan QC</th>
									<td style="border: none; padding: 0px;">: <span id="info_pengerjaan_qc"></span></td>
									<th style="border: none; padding: 0px;">Waktu Mulai QC </th>
									<td style="border: none; padding: 0px;">: <span id="info_mulai_qc"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Estimasi Selesai QC</th>
									<td style="border: none; padding: 0px;">: <span id="info_estimasi_qc"></span></td>
									<th style="border: none; padding: 0px;">Realisasi Selesai QC </th>
									<td style="border: none; padding: 0px;">: <span id="info_realisasi_qc"></span></td>
								</tr>

								<tr id="div_jumlah_sample_rnd" hidden>
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
									<th style="padding: 2px 5px;">Type MIC</th>
									<th style="padding: 2px 5px;">Hasil</th>
									<th style="padding: 2px 5px;">Evaluation</th>

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
								<label for="nama_analis" class="col-form-label col-2">Nama Analis :</span></label>

								<div class="col-10">
									<select class="form-select form-select-sm select2" id="nama_analis" name="nama_analis">
										<!-- Options akan ditambahkan di sini secara dinamis -->
									</select>
								</div>
							</div>
							<div class="form-group row mt-3" style="display: none;">
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


						<table class="table" style="border: none; width: 100%;">
							<tbody>

								<tr>
									<th style="border: none; padding: 0px;" width="15%">Waktu Pengerjaan LAB</th>
									<td style="border: none; padding: 0px;" width="25%">: <span id="info_pengerjaan_lab"></span></td>
									<th style="border: none; padding: 0px;" width="15%">Waktu Mulai LAB </th>
									<td style="border: none; padding: 0px;" width="45%">: <span id="info_mulai_lab"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Estimasi Selesai LAB</th>
									<td style="border: none; padding: 0px;">: <span id="info_estimasi_lab"></span></td>
									<th style="border: none; padding: 0px;">Realisasi Selesai LAB </th>
									<td style="border: none; padding: 0px;">: <span id="info_realisasi_lab"></span></td>
								</tr>
								<tr id="div_jumlah_sample_lab" hidden>
									<th style="border: none; padding: 0px;">Jumlah Sample LAB</th>
									<td style="border: none; padding: 0px;">: <span id="info_sample_lab"></span></td>
								</tr>
							</tbody>
						</table>

						<div id="form_hasil_lab">

							<table class="table" style="border: none; width: 100%;">
								<tbody>

									<tr>
										<th style="border: none; padding: 0px;" width="15%">Pernr Analis</th>
										<td style="border: none; padding: 0px;" width="25%">: <span id="info_nama_analis"></span></td>
										<th style="border: none; padding: 0px;" width="15%"> </th>
										<td style="border: none; padding: 0px;" width="45%"> <span id=""></span></td>
									</tr>

								</tbody>
							</table>


							<br>
						</div>

						<h5>Daftar Parameter Uji Laboratorium Analisa</h5>

						<div id="load_lab_navbar">
							<!-- Navbar (akan diisi oleh AJAX) -->
						</div>

						<!-- Tab Content untuk Mikro dan Kimia -->
						<div id="sample-navbar-mikro"></div>
						<div id="sample-navbar-kimia"></div>



					</div>


					<div class="tab-pane" id="rnd" role="tabpanel">
						<table class="table" style="border: none; width: 100%;">
							<tbody>
								<tr>
									<th style="border: none; padding: 0px;" width="15%">Waktu Pengerjaan RND</th>
									<td style="border: none; padding: 0px;" width="25%">: <span id="info_pengerjaan_rnd"></span></td>
									<th style="border: none; padding: 0px;" width="15%">Waktu Mulai RND </th>
									<td style="border: none; padding: 0px;" width="45%">: <span id="info_mulai_rnd"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Estimasi Selesai RND</th>
									<td style="border: none; padding: 0px;">: <span id="info_estimasi_rnd"></span></td>
									<th style="border: none; padding: 0px;">Realisasi Selesai RND </th>
									<td style="border: none; padding: 0px;">: <span id="info_realisasi_rnd"></span></td>
								</tr>
								<tr>
									<th style="border: none; padding: 0px;">Keputusan RND</th>
									<td style="border: none; padding: 0px;">: <span id="info_keputusan_rnd"></span></td>
									<th style="border: none; padding: 0px;"></th>
									<td style="border: none; padding: 0px;"><span id=""></span></td>
								</tr>
							</tbody>
						</table>
						<h5>Daftar Parameter Uji Research & Development</h5>
						<br>
						<table id="parameter-table-rnd" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
							<thead>
								<tr>
									<th style="padding: 2px 5px;">No</th>
									<th style="padding: 2px 5px;">Parameter</th>
									<th style="padding: 2px 5px;">Spec</th>
									<th style="padding: 2px 5px;">Hasil</th>
									<th style="padding: 2px 5px;">Evaluation</th>

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
					<button type="button" id="btn_setujui" class="btn btn-success">Update Request</button>
					<!-- <button type="button" id="btn_tolak" class="btn btn-danger">Tolak</button> -->
				</div>
				<div id="footer_analisa_selesai" style="display: none;">
					<button type="button" id="btn_update_analis" class="btn btn-success">Update Analis</button>

				</div>

				<div id="footer_input_analisa" style="display: none;">
					<button type="button" id="btn_update_input_analisa" class="btn btn-success">Update Analisa</button>

				</div>

				<div id="footer_analisa_lab_selesai" style="display: none;">
					<button type="button" id="btn_analisa_selesai" class="btn btn-success">Update Hasil Analisa</button>

				</div>
				<!-- <button type="button" id="btn_tolak" onclick="update_approval()" class="btn btn-danger">Tolak Sample</button> -->

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="info_batch" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Batch</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<table style="width: 100%; border-collapse: collapse;">
					<tr>
						<td style="font-weight: bold; width: 20%;">Manuf Date</td>
						<td>:</td>
						<td id="manuf_date"></td>
						<td></td>
					</tr>

					<tr>
						<td style="font-weight: bold;">Tanggal Karantina</td>
						<td id="">:</td>
						<td id="tanggal_karantina"></td>
						<td id=""></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Tanggal ED</td>
						<td id="">:</td>
						<td id="tanggal_ed"></td>
						<td id=""></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Tanggal Uji Ulang</td>
						<td id="">:</td>
						<td id="tanggal_uji_ulang"></td>
						<td id=""></td>
					</tr>
				</table>
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
				<h5>Note Persetujuan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="approval-form">
					<div class="form-group" id="info_usulan" name="info_usulan" style="display: none;">
						<label class="form-label">Usulan R&D:</label>
						<table id="usulan-table" class="table table-bordered">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Jobdesk</th>
									<th>Usulan</th>
								</tr>
							</thead>
							<tbody id="usulan-details"></tbody>
						</table>
					</div>


					<div class="form-group" id="input_kesimpulan" name="input_kesimpulan">
						<label class="form-label">Kesimpulan:</label>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="kesimpulan1" name="kesimpulan[]" value="Bahan / Produk diproses ulang">
							<label class="form-check-label" for="kesimpulan1">Bahan / Produk diproses ulang</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="kesimpulan2" name="kesimpulan[]" value="Bahan / Produk diproses ke tahap berikutnya">
							<label class="form-check-label" for="kesimpulan2">Bahan / Produk diproses ke tahap berikutnya</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="kesimpulan3" name="kesimpulan[]" value="Bahan / Produk dimusnahkan">
							<label class="form-check-label" for="kesimpulan3">Bahan / Produk dimusnahkan</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="kesimpulan4" name="kesimpulan[]" value="Lain-lain (sebutkan)">
							<label class="form-check-label" for="kesimpulan4">Lain-lain (sebutkan)</label>
						</div>


						<!-- Button untuk menampilkan input collapse -->
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInput" aria-expanded="false" aria-controls="collapseInput">
							Tambah Estimasi ED Selanjutnya
						</button>

						<!-- Input yang akan tampil ketika collapse -->
						<div class="collapse mt-3" id="collapseInput">
							<div class="form-group">
								<label for="tgl_ed">Tanggal ED:</label>
								<input type="text" class="form-control" id="tgl_ed" name="tgl_ed" placeholder="Masukkan jumlah hari" readonly>
							</div>
							<div class="form-group">
								<label for="jumlah_hari">Jumlah Hari:</label>
								<input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" placeholder="Masukkan jumlah hari">
							</div>
							<div class="form-group">
								<label for="estimasi_ed">Estimasi ED Selanjutnya:</label>
								<input type="text" class="form-control" id="estimasi_ed" name="estimasi_ed" placeholder="Estimasi ED selanjutnya" readonly>
							</div>
						</div>
						<br>
					</div>



					<div class="form-group">
						<label class="form-label">Keterangan:</label>
						<textarea class="form-control" id="note" name="note" rows="3" required></textarea>
					</div>

					<input type="hidden" id="approval-action" name="approval-action" value="">
					<input type="hidden" id="approval-pernr" name="approval-pernr" value="">
					<input type="hidden" id="approval-id_req" name="approval-id_req" value="">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="save-approval">Simpan</button>
			</div>
		</div>
	</div>
</div>

<div id="printModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!-- <label for="jenis_sample">Jenis Sample:</label>
				<input type="text" id="jenis_sample" class="form-control">
				<br> -->


				<div id="input_sample_lab" style="display: none;">
					<label for="jumlah_sample_input">Jumlah Sample LAB:</label>

					<!-- Input Sample Kimia -->
					<div id="input_sample_kimia" style="display: flex; align-items: center; margin-bottom: 8px;">
						<label for="jumlah_sample_kimia" class="form-label me-2" style="width: 100px;">Kimia:</label>
						<input type="number" id="jumlah_sample_kimia" value="" class="form-control" placeholder="Input Kimia">
					</div>

					<!-- Input Sample Mikro -->
					<div id="input_sample_mikro" style="display: flex; align-items: center; margin-bottom: 8px;">
						<label for="jumlah_sample_mikro" class="form-label me-2" style="width: 100px;">Mikro:</label>
						<input type="number" id="jumlah_sample_mikro" value="" class="form-control" placeholder="Input Mikro">
					</div>

					<!-- Input Jumlah Sample -->
					<div style="display: flex; align-items: center; margin-bottom: 8px;">
						<label for="jumlah_sample_input" class="form-label me-2" style="width: 100px;">Jumlah:</label>
						<input type="number" id="jumlah_sample_input" value="" class="form-control" placeholder="Input Jumlah Sample">
					</div>
				</div>



				<div id="input_sample_rnd" style="display: none;">
					<label for="jumlah_sample_rnd">Jumlah Sample RND:</label>
					<input type="number" id="jumlah_sample_rnd" value="0" class="form-control">
				</div>
				<input type="hidden" id="id_req_print">


			</div>
			<div class="modal-footer">
				<button type="button" style="display: none;" class="btn btn-primary" name="kirim_sample" id="kirim_sample">Kirim Sample</button>
				<button type="button" class="btn btn-primary" id="print_button">Print Label</button>
				<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
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
		// Dapatkan tahun saat ini
		var currentYear = new Date().getFullYear();
		var selectYear = $('#filter_tahun');
		load_tb_analisa();
		hitung_analisa();
		// Isi dropdown dengan tahun dari 5 tahun yang lalu hingga tahun ini
		for (var year = currentYear - 5; year <= currentYear; year++) {
			selectYear.append('<option value="' + year + '">' + year + '</option>');
		}

		// Set default tahun saat ini
		selectYear.val(currentYear);

		// Ketika dropdown tahun diubah, lakukan filter tabel
		selectYear.on('change', function() {
			load_tb_analisa();
			hitung_analisa();
		});

		var progress = '';

		$('.filter-row input').on('change', function() {

			load_tb_analisa(progress);

		});
		$('#jumlah_hari').on('input', function() {
			var id_req = $('#input_id_req').val();
			var jumlahHari = parseInt($(this).val()); // Ambil nilai jumlah hari

			if (!isNaN(jumlahHari)) {
				$.ajax({
					url: 'sample/get_jumlah_sample', // Ganti dengan URL endpoint Anda
					type: 'POST',
					data: {
						id_req: id_req
					},
					dataType: 'json',
					success: function(response2) {
						var originalDate = new Date(response2.ed); // Konversi tanggal dari response menjadi objek Date

						// Tambahkan jumlah hari ke tanggal ED yang diterima
						originalDate.setDate(originalDate.getDate() + jumlahHari);

						// Format tanggal menjadi DD-MM-YYYY
						var formattedDate = formatDate(originalDate);

						// Tampilkan estimasi hari ED selanjutnya
						$('#estimasi_ed').val(formattedDate);
					},
					error: function() {
						alert('Gagal mendapatkan data.');
					}
				});
			} else {
				// Kosongkan input jika jumlah hari tidak valid
				$('#estimasi_ed').val('');
			}
		});

		// // Fungsi format tanggal ke DD-MM-YYYY
		// function formatDate(date) {
		// 	var day = String(date.getDate()).padStart(2, '0');
		// 	var month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
		// 	var year = date.getFullYear();
		// 	return `${day}-${month}-${year}`;
		// }


		$('#filter-masuk').on('click', function() {
			var progress = ''; // Status yang ingin difilter

			load_tb_analisa(progress); // Panggil load_tb_analisa dengan parameter status
			hitung_analisa();
		});

		$('#filter-approval').on('click', function() {
			var progress = 'approval'; // Status yang ingin difilter

			load_tb_analisa(progress); // Panggil load_tb_analisa dengan parameter status
			hitung_analisa();
		});

		$('#filter-lab').on('click', function() {
			var progress = 'lab'; // Status yang ingin difilter

			load_tb_analisa(progress); // Panggil load_tb_analisa dengan parameter status
			hitung_analisa();
		});

		$('#filter-rnd').on('click', function() {
			var progress = 'rnd'; // Status yang ingin difilter

			load_tb_analisa(progress); // Panggil load_tb_analisa dengan parameter status
			hitung_analisa();
		});

		$('#filter-selesai').on('click', function() {
			var progress = 'selesai'; // Status yang ingin difilter

			load_tb_analisa(progress); // Panggil load_tb_analisa dengan parameter status
			hitung_analisa();
		});

		function hitung_analisa() {
			// Ambil nilai tahun yang dipilih
			var filter_tahun = selectYear.val();

			$.ajax({
				url: "<?php echo base_url('analisa/count_analisa'); ?>",
				type: 'GET',
				dataType: 'json',
				data: {
					filter_tahun: filter_tahun // Kirim filter_tahun sebagai parameter
				},
				success: function(response) {
					// Update the HTML content with the count
					$('#jumlah-analisa-masuk').text(response.jumlah_masuk);
					$('#jumlah-analisa-approval').text(response.jumlah_approval);
					$('#jumlah-analisa-lab').text(response.jumlah_lab);
					$('#jumlah-analisa-rnd').text(response.jumlah_rnd);
					$('#jumlah-analisa-selesai').text(response.jumlah_selesai);
				},
				error: function() {
					alert("Gagal memuat data");
				}
			});
		}


		function load_tb_analisa(progress) {

			$('#tb_analisa').DataTable().clear().destroy();

			var tb_analisa = $('#tb_analisa').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					"url": "<?php echo site_url('analisa/list_analisa'); ?>",
					"type": "POST",
					"data": function(d) {
						d.filter_0 = $('#filter_0').val();
						d.filter_1 = $('#filter_1').val();
						d.filter_2 = $('#filter_2').val();
						d.filter_3 = $('#filter_3').val();
						d.filter_4 = $('#filter_4').val();
						d.filter_5 = $('#filter_5').val();
						d.filter_6 = $('#filter_6').val();
						d.filter_7 = $('#filter_7').val();
						d.filter_8 = $('#filter_8').val();
						d.filter_9 = $('#filter_9').val();
						d.filter_10 = $('#filter_10').val();
						d.filter_11 = $('#filter_11').val();
						d.filter_tahun = $('#filter_tahun').val();
						d.progress = progress; // Tambahkan parameter status ke data yang dikirim
						// Tambahkan data filter lainnya sesuai kebutuhan
					}
				},
				dom: 'Brtip',
				lengthMenu: [
					[10, 25, 50, 100, -1],
					['10 rows', '25 rows', '50 rows', '100 rows', 'Semua']
				],
				buttons: [
					'pageLength'
				],
				initComplete: function() {

					// Membungkus tabel dengan div untuk scroll
					$("#tb_analisa").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
				},

				columnDefs: [{
						"targets": '_all',
						"createdCell": function(td, cellData, rowData, row, col) {
							$(td).css('padding', '5px'); // Menambahkan padding ke semua sel
						}
					},
					{
						"width": "1%", // Mengatur lebar kolom untuk indeks tertentu
						"targets": [1, 2]
					}
				]

			});
		}



		function updateCounts() {
			$.ajax({
				url: "<?php echo site_url('analisa/count_by_progress'); ?>",
				type: "GET",
				dataType: "json",
				success: function(data) {
					$("#jumlah_sample_masuk").text(data['Pengiriman Ke Lab']);
					$("#jumlah_antrian").text(data['Administrasi Lab Analisa']);

				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.error("Error getting counts: " + textStatus, errorThrown);
				}
			});
		}

		$(document).on('change', '.multicetak', function() {
			var anyChecked = $('.multicetak:checked').length > 0;
			if (anyChecked) {
				$('#multiCetakLabel').show();
			} else {
				$('#multiCetakLabel').hide();
			}
		});
		//Buttons examples



		function formatDate(dateString) {
			var date = new Date(dateString);
			var day = String(date.getDate()).padStart(2, '0');
			var month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
			var year = date.getFullYear();
			return `${day}-${month}-${year}`;
		}


		// Fungsi untuk menyetel aksi persetujuan dan menampilkan modal
		function setApprovalAction(action) {
			$('#approval-action').val(action);
			$('#note').val('');

			$('#approval-pernr').val('<?php echo $dataSession['pernr']; ?>');
			$('#approval-id_req').val($('#input_id_req').val());
			var id_req = $('#input_id_req').val();
			var pernr = $('#approval-pernr').val();

			$.ajax({
				url: '<?php echo site_url("analisa/check_jobdesk"); ?>',
				type: 'POST',
				dataType: 'json',
				data: {
					pernr: pernr
				},
				success: function(response) {
					$.ajax({
						url: 'sample/get_jumlah_sample', // Replace with the actual URL for your sample endpoint
						type: 'POST',
						data: {
							id_req: id_req
						},
						dataType: 'json',
						success: function(response2) {

							var formattedDate = formatDate(response2.ed);
							$('#tgl_ed').val(formattedDate);

							$('#approval-modal').modal('show');

							if (response.isManager) {
								$('#input_kesimpulan').show(); // Show input for kesimpulan

								if (response2.info_usulan == 'true') {
									$('#info_usulan').show(); // Show info_usulan section

									// Fetch usulan data using the model
									$.ajax({
										url: '<?php echo site_url("analisa/get_usulan_by_id_req"); ?>', // URL for the usulan data
										type: 'POST',
										data: {
											id_req: id_req
										},
										dataType: 'json',
										success: function(response3) {
											var tableContent = '';
											if (response3 && Array.isArray(response3)) {
												// Loop through each row and add it to the table
												response3.forEach(function(row) {
													tableContent += '<tr>';
													tableContent += '<td>' + row.nama_user + '</td>';
													tableContent += '<td>' + row.jobdesk + '</td>';
													tableContent += '<td>' + row.usulan + '</td>';
													tableContent += '</tr>';
												});

												// Insert the content into the table body
												$('#usulan-details').html(tableContent);
											} else {
												$('#usulan-details').html('<tr><td colspan="3">No usulan data found.</td></tr>');
											}
										},
										error: function() {
											alert('Error loading usulan data.');
										}
									});
								}


							} else {
								$('#input_kesimpulan').hide(); // Hide input for kesimpulan
								$('#info_usulan').hide(); // Hide info_usulan section
							}

						}
					});
				},
				error: function() {
					alert('Error checking jobdesk.');
				}
			});
		}


		// Attach click events to buttons with action parameter
		$('#btn_setujui').on('click', function() {
			setApprovalAction('approve');
		});

		$('#btn_tolak').on('click', function() {
			setApprovalAction('reject');
		});

		// Event handler untuk tombol Simpan
		$('#save-approval').on('click', function() {
			var note = $('#note').val();
			var action = $('#approval-action').val();
			var pernr = $('#approval-pernr').val();
			var id_req = $('#approval-id_req').val();
			var jumlah_hari = $('#jumlah_hari').val();
			var estimasi_ed = $('#estimasi_ed').val();
			// alert(estimasi_ed);
			var kesimpulan = $('input[name="kesimpulan[]"]:checked').map(function() {
				return $(this).val();
			}).get();

			// alert(kesimpulan.join(', '));

			if (note.trim() === '') {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Keterangan mohon diisi',
				});
				return;
			}
			Swal.fire({
				title: 'Data akan dikirim apakah anda yakin ?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#364574',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Kirim Data'
			}).then((result) => {


				Swal.fire({
					title: 'Mohon tunggu...',
					text: 'Sedang mengirim data...',
					allowOutsideClick: false,
					didOpen: () => {
						Swal.showLoading();
					}
				});

				// Kirim data ke server
				$.ajax({
					url: "<?php echo site_url('approval/update_approval'); ?>",
					type: 'POST',
					data: {
						note: note,
						action: action,
						pernr: pernr,
						id_req: id_req,
						kesimpulan: kesimpulan,
						jumlah_hari: jumlah_hari,
						estimasi_ed: estimasi_ed
					},
					success: function(response) {
						Swal.fire({
							title: 'Success',
							text: response.message, // Menggunakan pesan dari response
							icon: 'success',
							confirmButtonColor: '#364574',
						});

						$('#approval-modal').modal('hide');
						$('#modal_info_analisa').modal('hide');

						$('#tb_ticket_approval').DataTable().ajax.reload();
						$('#tb_analisa').DataTable().ajax.reload();
					},

					error: function() {
						Swal.fire({
							title: 'Error',
							text: 'Terjadi kesalahan saat menyimpan keterangan.',
							icon: 'error',
						});
					}
				});


			})





		});


	});




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

	function updateTotal() {
		// Ambil nilai dari input Kimia dan Mikro
		var kimia = parseFloat($('#jumlah_sample_kimia').val()) || 0; // Default ke 0 jika kosong atau bukan angka
		var mikro = parseFloat($('#jumlah_sample_mikro').val()) || 0; // Default ke 0 jika kosong atau bukan angka

		// Jumlahkan keduanya dan masukkan ke input jumlah_sample_input
		var total = kimia + mikro;

		// Update nilai total ke dalam input
		$('#jumlah_sample_input').val(total);
	}

	function cekIndikator(id_req) {
		var url = "<?php echo site_url('sample/cek_indikator'); ?>";

		$.ajax({
			url: url,
			type: "POST",
			data: {
				id_req: id_req,
			},
			dataType: "json",
			success: function(data) {

				if (data.indicator_lab) {
					// Tampilkan input sample lab

					$('#input_sample_lab').show();
					// Jika ada data kimia
					if (data.indicator_kimia) {

						$('#input_sample_kimia').show();
					} else {

						$('#input_sample_kimia').hide();
					}

					// Jika ada data mikro
					if (data.indicator_mikro) {

						$('#input_sample_mikro').show();
					} else {
						$('#input_sample_mikro').hide();
					}
				}

				if (data.indicator_rnd) {
					$('#input_sample_rnd').show();
				} else {
					$('#input_sample_rnd').hide();
				}

			},
			error: function(xhr, status, error) {
				console.error("Terjadi kesalahan: " + error);
			},
		});
	}

	function cetak_label(no_karantina, id_req, material, desc) {
		$('#printModal').modal('show');
		$('.modal-title').text('Cetak Label');
		$('#no_karantina').text(no_karantina);
		$('#id_req_print').val(id_req);

		$('#jumlah_sample_kimia, #jumlah_sample_mikro').on('input', function() {
			updateTotal();
		});

		// alert(id);
		cekIndikator(id_req);
		// Lakukan pengecekan jumlah_sample di controller
		$.ajax({
			url: "<?php echo site_url('analisa/check_sample'); ?>", // Ubah 'your_controller' dengan nama controller Anda
			type: "POST",
			data: {
				id_req: id_req
			},
			dataType: "json",
			success: function(response) {
				$('#jumlah_sample_kimia').val(response.kimia);
				$('#jumlah_sample_mikro').val(response.mikro);
				$('#jumlah_sample_input').val(response.jumlah_sample); // Set nilai jumlah_sample ke input
				$('#jumlah_sample_rnd').val(response.jumlah_sample_rnd);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.error("Error checking sample data: ", textStatus, errorThrown);
			}
		});

		// Variabel global untuk menyimpan referensi tab yang telah dibuka
		var printTab = null;

		$('#print_button').on('click', function() {
			var jumlah_sample_lab = parseFloat($('#jumlah_sample_input').val()); // Konversi ke bilangan desimal
			var jumlah_sample_rnd = parseFloat($('#jumlah_sample_rnd').val());
			var jumlah_sample_kimia = parseFloat($('#jumlah_sample_kimia').val());
			var jumlah_sample_mikro = parseFloat($('#jumlah_sample_mikro').val());
			// alert(jumlah_sample_lab);
			// alert(jumlah_sample_rnd);
			var jumlah_sample = jumlah_sample_lab + jumlah_sample_rnd;
			// alert(jumlah_sample);
			// console.log("Print button clicked. Jumlah sample:", jumlah_sample);
			// console.log("Current printTab status:", printTab);

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
						id_req: id_req,
						jumlah_sample_lab: jumlah_sample_lab,
						jumlah_sample_kimia: jumlah_sample_kimia,
						jumlah_sample_mikro: jumlah_sample_mikro,
						jumlah_sample_rnd: jumlah_sample_rnd
					},
					success: function(response) {
						Swal.close();

						// Tampilkan notifikasi sukses
						Swal.fire({
							title: 'Sukses',
							text: 'Mohon untuk menempelkan label pada sample',
							icon: 'success',
							confirmButtonColor: '#364574',
						}).then((result) => {
							if (result.isConfirmed) {
								$.ajax({
									url: "<?= site_url('analisa/check_sample'); ?>",
									type: "POST",
									data: {
										id_req: id_req
									},
									dataType: "json",
									success: function(response) {
										if (response.show_kirim_sample) {
											$('#kirim_sample').show();
											$('#jumlah_sample_kimia').val(response.kimia);
											$('#jumlah_sample_mikro').val(response.mikro);
											$('#jumlah_sample_input').val(response.jumlah_sample);
											$('#jumlah_sample_rnd').val(response.jumlah_sample_rnd);
										} else {
											$('#kirim_sample').hide();
											$('#jumlah_sample_mikro').val('0');
											$('#jumlah_sample_kimia').val('0');
											$('#jumlah_sample_input').val('0');
											$('#jumlah_sample_rnd').val('0');
										}
									},
									error: function(xhr, textStatus, errorThrown) {
										console.error("Error checking sample data: ", textStatus, errorThrown);
									}
								});

								// Buka tab untuk mencetak label
								let url = '<?= site_url("analisa/print_labels") ?>';
								if (printTab == null || printTab.closed) {
									printTab = window.open(url, '_blank');
								} else {
									printTab.location.href = url;
									printTab.focus();
								}
							}
						});
					},
					error: function(xhr) {
						Swal.close();
						Swal.fire({
							title: 'Gagal',
							text: xhr.responseJSON?.message || 'Terjadi kesalahan saat mengirim data.',
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
				title: 'Apakah Anda yakin ingin mengirim sampel?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, kirim!',
				cancelButtonText: 'Batal',
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
					var id_req = $('#id_req_print').val(); // Pastikan variabel id_req sudah dideklarasikan sebelumnya

					$.ajax({
						url: '<?= site_url("analisa/kirim_sample") ?>',
						type: 'POST',
						data: {
							id_req: id_req
						},
						dataType: 'json', // jQuery akan otomatis mengurai JSON
						success: function(response) {
							// Menutup Swal loading
							Swal.close();

							if (response.status === 'label_not_printed') {
								Swal.fire({
									title: 'Peringatan',
									text: 'Label belum dicetak. Silakan cetak label terlebih dahulu.',
									icon: 'warning',
									confirmButtonColor: '#364574'
								});
							} else if (response.status === true) {
								// Update data di tabel
								$('#printModal').modal('hide');
								$('#tb_analisa').DataTable().ajax.reload();

								Swal.fire({
									title: 'Sukses',
									text: 'Mohon untuk segera mengirim sample',
									icon: 'success',
									confirmButtonColor: '#364574'
								});
							} else {
								Swal.fire({
									title: 'Gagal',
									text: 'Terjadi kesalahan saat mengirim data.',
									icon: 'error',
									confirmButtonColor: '#364574'
								});
							}
						},
						error: function(xhr, status, error) {
							// Menutup Swal loading
							Swal.close();

							Swal.fire({
								title: 'Gagal',
								text: 'Terjadi kesalahan saat mengirim data.',
								icon: 'error',
								confirmButtonColor: '#364574'
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

	function info_analisa(id, id_req) {
		// Show the modal
		$('#modal_info_analisa').modal('show');

		// Activate the appropriate tabs
		$('#tab_tracking').addClass('active');
		$('#tracking').addClass('active');

		$('#tab_approval').removeClass('active');
		$('#tab_lab').removeClass('active');
		$('#tab_rnd').removeClass('active');
		$('#tab_qc').removeClass('active');
		$('#approval').removeClass('active');

		$('#qc').removeClass('active');
		$('#lab').removeClass('active');
		$('#rnd').removeClass('active');

		// Set the title of the modal
		$('.modal-title').text('Info Proses Analisa');

		// Set the input ID
		$('#input_id_req').val(id_req);
		// alert(id);

		// Check request validity
		$.ajax({
			url: "<?php echo site_url('approval/validate_request'); ?>",
			type: 'POST',
			data: {
				id_req: id_req
			},
			success: function(response) {
				var data = JSON.parse(response);
				if (data.show_footer) {
					$('#footer_approval').show(); // Show the footer if valid
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
				} else {
					$('#footer_approval').hide(); // Show the footer if valid
				}
			},
			error: function() {
				console.error('An error occurred while validating the request.');
			}
		});

		// Load other data
		loadRequestData(id_req);
		load_data_tb_approval(id_req);
		loadLabParameters(id_req);
		load_data_tracking();
		load_data_tracking_rnd()
	}


	function load_data_tb_approval(id_req) {
		// Menentukan ID yang digunakan
		var id_req = id_req || $('#input_id_req').val();

		// Menghancurkan DataTable yang ada dan menghapus datanya
		$('#tb_ticket_approval').DataTable().clear().destroy();

		// Inisialisasi DataTable
		var tb_ticket_approval = $('#tb_ticket_approval').DataTable({
			processing: true,
			serverSide: true,
			autoWidth: false,
			ajax: {
				"url": "<?php echo site_url('analisa/list_approval'); ?>",
				"type": "POST",
				"data": {
					id_req: id_req
				}
			},
			dom: 'rt',
			lengthMenu: [
				[10, 25, 50, 100, -1],
				['10 rows', '25 rows', '50 rows', '100 rows', 'Semua']
			],
			buttons: [
				'pageLength'
			],
			initComplete: function(settings, json) {
				// Membungkus tabel dengan div untuk scroll
				$("#tb_ticket_approval").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

				// Mengatur wrapping text untuk kolom tertentu
				$('#tb_ticket_approval').find('tr').each(function() {
					$(this).find('td').eq(5).css({
						'white-space': 'normal', // Membolehkan wrapping
						'word-break': 'break-word', // Memecah kata jika terlalu panjang
						'overflow': 'hidden' // Menyembunyikan overflow
					});
				});

			},

			columnDefs: [{
					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px'); // Mengatur padding semua sel
					}
				},
				{
					"targets": '_all',
					"orderable": false // Membuat semua kolom tidak dapat diurutkan
				},
				{
					"targets": [0], // Menyembunyikan kolom pertama
					"visible": false
				},
				{
					"targets": [1, 3, 4, 6, 7], // Mengatur lebar kolom tertentu
					"width": "11%"
				},
				{
					"targets": [5], // Mengatur lebar kolom dan rata tengah
					"width": "10%",
					"className": "text-center" // Memberikan class untuk rata tengah
				}
			]

		});
	}

	function load_data_tracking_rnd() {
		var id_req = $('#input_id_req').val(); // Ambil ID dari input

		// alert(id_req);

		$.ajax({
			url: '<?= site_url('analisa/load_data_tracking_rnd'); ?>',
			type: 'POST',
			data: {
				id_req: id_req
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

					// Update list activity di view
					$('#tracking_rnd ul.activity-wid').html(activityList);

					// Tampilkan elemen yang sebelumnya disembunyikan
					$('#tracking_rnd').removeAttr('hidden');
				}
			},
			error: function(xhr, status, error) {
				console.error("Terjadi kesalahan: " + error);
			}
		});
	}


	function load_data_tracking() {
		var id_req = $('#input_id_req').val(); // Ambil ID dari input

		// alert(id_req);

		$.ajax({
			url: '<?= site_url('analisa/load_data_tracking'); ?>',
			type: 'POST',
			data: {
				id_req: id_req
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

					// Update list activity di view
					$('#tracking_lab ul.activity-wid').html(activityList);

					// Tampilkan elemen yang sebelumnya disembunyikan
					$('#tracking_lab').removeAttr('hidden');
				}
			},
			error: function(xhr, status, error) {
				console.error("Terjadi kesalahan: " + error);
			}
		});
	}






	function loadLabParameters(id_req) {
		var id_req = $('#input_id_req').val(); // Ambil ID dari input

		getAnalisLab(id_req);
		getAnalisaRnd(id_req);
		getAnalisaQc(id_req);
		getProgressStatus(id_req);
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
			if (!id_req) {
				alert('Tidak ada file yang tersedia untuk ditampilkan.');
				return;
			}

			$.ajax({
				url: "<?php echo site_url('sample/get_file_url'); ?>",
				type: "POST",
				data: {
					id_req: id_req
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
					id_req: id_req
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
					id_req: id_req
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

	function getAnalisaRnd(id_req) {
		$.ajax({
			url: "<?php echo site_url('analisa/get_analisa_rnd'); ?>",
			type: "POST",
			data: {
				id_req: id_req
			},
			dataType: "json",
			success: function(data) {
				var tableBody = $('#parameter-table-rnd tbody');
				tableBody.empty(); // Clear previous rows if any
				var counter = 1;

				if (data.data.length > 0) {
					$('#tab_rnd').removeAttr('hidden'); // Show the tab
					$('#tracking_rnd').removeAttr('hidden'); // Show the tab
					$('#div_jumlah_sample_rnd').removeAttr('hidden');

					data.data.forEach(function(item) {
						var row = `
                        <tr>
                            <td style="padding: 2px 5px;">${counter++}</td>
                            <td style="padding: 2px 5px;">${item.short_text}</td>
                            <td style="padding: 2px 5px;">${item.spec}</td>
                            <td style="padding: 2px 5px;">${item.zresult}</td>
                            <td style="padding: 2px 5px;">${item.valid}</td>
                        </tr>
                    `;
						tableBody.append(row);
					});
				} else {
					$('#tab_rnd').attr('hidden', true); // Hide the tab
					$('#tracking_rnd').attr('hidden', true); // Hide the tab
					$('#div_jumlah_sample_rnd').attr('hidden', true); // Hide the tab
				}
			},
			error: function(xhr, status, error) {
				console.error(error);
				alert('Terjadi kesalahan saat memuat data parameter R&D.');
			}
		});
	}

	function getAnalisaQc(id_req) {
		$.ajax({
			url: "<?php echo site_url('analisa/get_analisa_qc'); ?>",
			type: "POST",
			data: {
				id_req: id_req
			},
			dataType: "json",
			success: function(data) {
				var tableBody = $('#parameter-table-qc tbody');
				tableBody.empty(); // Kosongkan tabel sebelumnya

				var counter = 1;
				data.data.forEach(function(item) {
					var row = `
                  <tr>
						<td style="padding: 2px 5px;">${counter++}</td>
						<td style="padding: 2px 5px;">${item.short_text}</td>
						<td style="padding: 2px 5px;">${item.spec}</td>
						<td style="padding: 2px 5px;">${item.type_mic}</td>
						<td style="padding: 2px 5px;">${item.zresult}</td>
						<td style="padding: 2px 5px;">
							${item.valid === 'A' && item.type_mic === 'qualitatif' ? 'Sesuai' : 
							item.valid === 'R' && item.type_mic === 'qualitatif' ? 'Tidak Sesuai' : ''}
						</td>
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

	function getProgressStatus(id_req) {
		$.ajax({
			url: "<?php echo site_url('analisa/get_progress_status'); ?>",
			type: "POST",
			data: {
				id_req: id_req
			},
			dataType: "json",
			success: function(progressData) {
				if (progressData.status) {
					var progress = progressData.progress;
					getAnalisaLab(id_req, progress);
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

	function getAnalisaLab(id_req, progress) {
		var url = "<?php echo site_url('analisa/get_analisa_lab'); ?>";
		$.ajax({
			url: url,
			type: "POST",
			data: {
				id_req: id_req,
			},
			dataType: "json",
			success: function(data) {
				// Cek jika ada data yang memiliki nilai lebih dari 0
				// if (data.indicator == true) {
				// 	$('#tab_lab').removeAttr('hidden');
				// 	$('#div_jumlah_sample_lab').removeAttr('hidden');
				// 	// Menampilkan tab
				// 	var counter = 1;
				// 	// alert(progress);
				// 	if (progress === "Analisa Lab selesai" || progress === "Approval Manager QC") {
				// 		$.ajax({
				// 			url: 'sample/get_jumlah_sample', // Ganti dengan URL endpoint Anda
				// 			type: 'POST',
				// 			data: {
				// 				id_req: id_req
				// 			},
				// 			dataType: 'json',
				// 			success: function(response) {
				// 				var jumlah_sample = response.jumlah_sample;

				// 				// Jika jumlah_sample adalah 0, maka set perulangan_sample ke 1
				// 				var perulangan_sample = (jumlah_sample == 0) ? 1 : jumlah_sample;

				// 				// Menyembunyikan elemen yang tidak diperlukan
				// 				$('#input_analis_lab').hide();
				// 				$('#footer_analisa_selesai').hide();
				// 				$('#footer_input_analisa').hide();
				// 				$('#form_hasil_lab').show();
				// 				// Tidak perlu memanggil dua kali hide pada #footer_input_analisa

				// 				// Buat elemen tab list dan tab content
				// 				var tabList = $('<ul class="nav nav-tabs" role="tablist"></ul>');
				// 				var tabContent = $('<div class="tab-content p-3 text-muted"></div>');

				// 				// Loop untuk membuat tab dinamis
				// 				for (var i = 1; i <= perulangan_sample; i++) {
				// 					// Membuat tab dinamis
				// 					tabList.append(`
				// 					<li class="nav-item">
				// 						<a class="nav-link ${i === 1 ? 'active' : ''}" data-bs-toggle="tab" href="#sample${i}" role="tab" data-iteration="${i}">
				// 							<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
				// 							<span class="d-none d-sm-block">Sample ${i}</span>
				// 						</a>
				// 					</li>
				// 				`);

				// 					// Membuat konten tab dinamis
				// 					tabContent.append(`
				//                 <div class="tab-pane ${i === 1 ? 'active' : ''}" id="sample${i}" role="tabpanel">
				//                     <table id="parameter-table-lab-${i}" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
				//                         <thead>
				//                             <tr>
				//                                 <th style="padding: 2px 5px;">No</th>
				//                                 <th style="padding: 2px 5px;">Parameter</th>
				//                                 <th style="padding: 2px 5px;">Spesifikasi</th>
				//                                 <th style="padding: 2px 5px;">Hasil</th>
				// 								<th style="padding: 2px 5px;">Evaluation</th>
				//                             </tr>
				//                         </thead>
				//                         <tbody>
				//                             <!-- Baris akan ditambahkan di sini secara dinamis -->
				//                         </tbody>
				//                     </table>
				//                 </div>
				//             `);
				// 				}

				// 				// Gabungkan tabList dan tabContent ke dalam div load_data_sample_lab
				// 				$('#load_data_sample_lab').empty().append(tabList).append(tabContent);

				// 				// Tambahkan event listener untuk setiap tab
				// 				// Event listener ketika tab diklik
				// 				$('.nav-link').on('click', function() {
				// 					var iterationValue = $(this).data('iteration');
				// 					var tableBody = $(`#parameter-table-lab-${iterationValue} tbody`);
				// 					tableBody.empty(); // Kosongkan baris tabel sebelumnya

				// 					// Filter data berdasarkan sample_ke
				// 					var filteredData = data.data.filter(function(item) {
				// 						return item.sample_ke == iterationValue;
				// 					});

				// 					// Reset counter untuk penomoran yang sesuai
				// 					var counter = 1;

				// 					// Tambahkan baris data yang terfilter ke tabel
				// 					filteredData.forEach(function(item) {
				// 						var row = `
				// 					<tr>
				// 						<td style="padding: 2px 5px;">${counter++}</td>
				// 						<td style="padding: 2px 5px;">${item.short_text}</td>
				// 						<td style="padding: 2px 5px;">${item.spec}</td>
				// 						<td style="padding: 2px 5px;">${item.zresult}</td>
				// 						<td style="padding: 2px 5px;">${item.valid}</td>

				// 					</tr>
				// 				`;
				// 						tableBody.append(row);
				// 					});
				// 				});


				// 				// Trigger klik pada tab pertama secara default untuk mengisi data awal
				// 				tabList.find('.nav-link.active').trigger('click');
				// 			}
				// 		});
				// 	} else if (progress === "Karantina Selesai") {
				// 		$.ajax({
				// 			url: 'sample/get_jumlah_sample', // Ganti dengan URL endpoint Anda
				// 			type: 'POST',
				// 			data: {
				// 				id_req: id_req
				// 			},
				// 			dataType: 'json',
				// 			success: function(response) {
				// 				var jumlah_sample = response.jumlah_sample;

				// 				$('#input_analis_lab').hide();
				// 				$('#footer_analisa_selesai').hide();
				// 				$('#footer_input_analisa').hide();
				// 				$('#form_hasil_lab').show();
				// 				$('#footer_input_analisa').hide();
				// 				$('#footer_analisa_lab_selesai').hide();


				// 				var tabList = $('<ul class="nav nav-tabs" role="tablist"></ul>');
				// 				var tabContent = $('<div class="tab-content p-3 text-muted"></div>');

				// 				// Membuat tab dan konten tab dinamis
				// 				for (var i = 1; i <= jumlah_sample; i++) {
				// 					// Membuat tab dinamis
				// 					tabList.append(`
				//                 <li class="nav-item">
				//                     <a class="nav-link ${i === 1 ? 'active' : ''}" data-bs-toggle="tab" href="#sample${i}" role="tab" data-iteration="${i}">
				//                         <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
				//                         <span class="d-none d-sm-block">Sample ${i}</span>
				//                     </a>
				//                 </li>
				//             `);

				// 					// Membuat konten tab dinamis
				// 					tabContent.append(`
				//                 <div class="tab-pane ${i === 1 ? 'active' : ''}" id="sample${i}" role="tabpanel">
				//                     <table id="parameter-table-lab-${i}" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
				//                         <thead>
				//                             <tr>
				//                                 <th style="padding: 2px 5px;">No</th>
				//                                 <th style="padding: 2px 5px;">Parameter</th>
				//                                 <th style="padding: 2px 5px;">Spesifikasi</th>
				//                                 <th style="padding: 2px 5px;">Hasil</th>
				// 								<th style="padding: 2px 5px;">Evaluation</th>
				//                             </tr>
				//                         </thead>
				//                         <tbody>
				//                             <!-- Baris akan ditambahkan di sini secara dinamis -->
				//                         </tbody>
				//                     </table>
				//                 </div>
				//             `);
				// 				}

				// 				// Gabungkan tabList dan tabContent ke dalam div load_data_sample_lab
				// 				$('#load_data_sample_lab').empty().append(tabList).append(tabContent);

				// 				// Tambahkan event listener untuk setiap tab
				// 				// Event listener ketika tab diklik
				// 				$('.nav-link').on('click', function() {
				// 					var iterationValue = $(this).data('iteration');
				// 					var tableBody = $(`#parameter-table-lab-${iterationValue} tbody`);
				// 					tableBody.empty(); // Kosongkan baris tabel sebelumnya

				// 					// Filter data berdasarkan sample_ke
				// 					var filteredData = data.data.filter(function(item) {
				// 						return item.sample_ke == iterationValue;
				// 					});

				// 					// Reset counter untuk penomoran yang sesuai
				// 					var counter = 1;

				// 					// Tambahkan baris data yang terfilter ke tabel
				// 					filteredData.forEach(function(item) {
				// 						var row = `
				// 					<tr>
				// 						<td style="padding: 2px 5px;">${counter++}</td>
				// 						<td style="padding: 2px 5px;">${item.short_text}</td>
				// 						<td style="padding: 2px 5px;">${item.spec}</td>
				// 						<td style="padding: 2px 5px;">${item.zresult}</td>
				// 						<td style="padding: 2px 5px;">${item.valid}</td>

				// 					</tr>
				// 				`;
				// 						tableBody.append(row);
				// 					});
				// 				});


				// 				// Trigger klik pada tab pertama secara default untuk mengisi data awal
				// 				tabList.find('.nav-link.active').trigger('click');
				// 			}
				// 		});
				// 	} else {

				// 		$.ajax({
				// 			url: 'sample/get_jumlah_sample', // Ganti dengan URL endpoint Anda
				// 			type: 'POST',
				// 			data: {
				// 				id_req: id_req
				// 			},
				// 			dataType: 'json',
				// 			success: function(response) {
				// 				var jumlah_sample = response.jumlah_sample;

				// 				$('#input_analis_lab').hide();
				// 				$('#footer_analisa_selesai').hide();
				// 				$('#footer_input_analisa').hide();
				// 				$('#form_hasil_lab').hide();
				// 				$('#footer_analisa_lab_selesai').hide();


				// 				var tabList = $('<ul class="nav nav-tabs" role="tablist"></ul>');
				// 				var tabContent = $('<div class="tab-content p-3 text-muted"></div>');

				// 				// Membuat tab dan konten tab dinamis
				// 				for (var i = 1; i <= jumlah_sample; i++) {
				// 					// Membuat tab dinamis
				// 					tabList.append(`
				//                 <li class="nav-item">
				//                     <a class="nav-link ${i === 1 ? 'active' : ''}" data-bs-toggle="tab" href="#sample${i}" role="tab" data-iteration="${i}">
				//                         <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
				//                         <span class="d-none d-sm-block">Sample ${i}</span>
				//                     </a>
				//                 </li>
				//             `);

				// 					// Membuat konten tab dinamis
				// 					tabContent.append(`
				//                 <div class="tab-pane ${i === 1 ? 'active' : ''}" id="sample${i}" role="tabpanel">
				//                     <table id="parameter-table-lab-${i}" class="table table-bordered" style="border: 1px solid #dee2e6; padding: 2px 5px; width: 80%;">
				//                         <thead>
				//                             <tr>
				//                                 <th style="padding: 2px 5px;">No</th>
				//                                 <th style="padding: 2px 5px;">Parameter</th>
				//                                 <th style="padding: 2px 5px;">Spesifikasi</th>
				//                                 <th style="padding: 2px 5px;">Hasil</th>
				//                                 <th style="padding: 2px 5px;">Evaluation</th>
				//                             </tr>
				//                         </thead>
				//                         <tbody>
				//                             <!-- Baris akan ditambahkan di sini secara dinamis -->
				//                         </tbody>
				//                     </table>
				//                 </div>
				//             `);
				// 				}

				// 				// Gabungkan tabList dan tabContent ke dalam div load_data_sample_lab
				// 				$('#load_data_sample_lab').empty().append(tabList).append(tabContent);

				// 				// Tambahkan event listener untuk setiap tab
				// 				// Event listener ketika tab diklik
				// 				$('.nav-link').on('click', function() {
				// 					var iterationValue = $(this).data('iteration');
				// 					var tableBody = $(`#parameter-table-lab-${iterationValue} tbody`);
				// 					tableBody.empty(); // Kosongkan baris tabel sebelumnya

				// 					// Filter data berdasarkan sample_ke
				// 					var filteredData = data.data.filter(function(item) {
				// 						return item.sample_ke == iterationValue;
				// 					});

				// 					// Reset counter untuk penomoran yang sesuai
				// 					var counter = 1;

				// 					// Tambahkan baris data yang terfilter ke tabel
				// 					filteredData.forEach(function(item) {
				// 						var row = `
				// 					<tr>
				// 						<td style="padding: 2px 5px;">${counter++}</td>
				// 						<td style="padding: 2px 5px;">${item.short_text}</td>
				// 						<td style="padding: 2px 5px;">${item.spec}</td>
				// 						<td style="padding: 2px 5px;">${item.zresult}</td>
				// 						<td style="padding: 2px 5px;">${item.valid}</td>
				// 					</tr>
				// 				`;
				// 						tableBody.append(row);
				// 					});
				// 				});


				// 				// Trigger klik pada tab pertama secara default untuk mengisi data awal
				// 				tabList.find('.nav-link.active').trigger('click');
				// 			}
				// 		});
				// 	}
				// } else {
				// 	// Jika tidak ada data, sembunyikan tab (opsional)
				// 	$('#tab_lab').attr('hidden', true);

				// 	$('#div_jumlah_sample_lab').attr('hidden', true);
				// }

				if (data.indicator == true) {
					$('#tab_lab').removeAttr('hidden');
					$('#div_jumlah_sample_lab').removeAttr('hidden');

					// Memuat navbar jenis lab berdasarkan id_req
					$.ajax({
						url: '<?= site_url("analisa/check_lab_data") ?>',
						type: 'POST',
						data: {
							id_req: id_req
						},
						dataType: 'json',
						success: function(response) {
							if (response.status) {
								let navbarHtml = '<ul class="nav nav-tabs" role="tablist">';
								// Jika ada Mikro, buatkan navbar Mikro
								if (response.mikro) {

									navbarHtml += `
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-mikro" data-bs-toggle="tab" href="#mikroTab" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-microscope"></i></span>
                                <span class="d-none d-sm-block">Mikro</span>
                            </a>
                        </li>`;
								}

								// Jika ada Kimia, buatkan navbar Kimia
								if (response.kimia) {
									navbarHtml += `
                        <li class="nav-item">
                            <a class="nav-link" id="nav-kimia" data-bs-toggle="tab" href="#kimiaTab" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-flask"></i></span>
                                <span class="d-none d-sm-block">Kimia</span>
                            </a>
                        </li>`;
								}

								navbarHtml += '</ul>';

								// Tampilkan navbar di elemen target
								$('#load_lab_navbar').html(navbarHtml);

								// Event listener untuk tab Mikro
								$('#nav-mikro').on('click', function() {
									loadSampleNavbar(id_req, 'Mikro');
								});

								// Event listener untuk tab Kimia
								$('#nav-kimia').on('click', function() {
									loadSampleNavbar(id_req, 'Kimia');
								});

								// Muat DataTables default (aktifkan tab pertama secara otomatis)
								if (response.mikro) {
									loadSampleNavbar(id_req, 'Mikro');
								} else if (response.kimia) {
									loadSampleNavbar(id_req, 'Kimia');
								}
							} else {
								console.error('Tidak ada data ditemukan:', response.message);
							}
						},
						error: function(xhr, status, error) {
							console.error('Error saat memeriksa data:', error);
						}
					});
				} else {
					// Jika tidak ada data, sembunyikan tab (opsional)
					$('#tab_lab').attr('hidden', true);
					$('#div_jumlah_sample_lab').attr('hidden', true);
				}


			},
			error: function(xhr, status, error) {
				console.log("Terjadi kesalahan: " + error);
			}
		});
	}
	// Fungsi untuk memuat navbar sample berdasarkan jenis lab dan id_req
	function loadSampleNavbar(id_req, zjenis_lab) {
		$.ajax({
			url: '<?= site_url("analisa/check_lab_data_jumlah_sample") ?>', // URL untuk mengambil data jumlah sample
			type: 'POST',
			data: {
				id_req: id_req,
				zjenis_lab: zjenis_lab // Mengirimkan jenis lab (mikro/kimia)
			},
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					let sampleNavbarHtml = '<ul class="nav nav-tabs" role="tablist">';
					let sampleTabContentHtml = '<div class="tab-content">';

					// Looping untuk membuat tab sample berdasarkan data yang diterima
					response.samples.forEach((sample, index) => {
						const isActive = index === 0 ? 'active' : ''; // Menentukan apakah tab pertama aktif

						// Navbar item untuk setiap sample
						sampleNavbarHtml += `
                        <li class="nav-item">
                            <a class="nav-link ${isActive}" data-bs-toggle="tab" href="#sampleTab${sample.sample_ke}" role="tab" id="nav-sample-${sample.sample_ke}">
                                <span class="d-block d-sm-none"><i class="fas fa-vial"></i></span>
                                <span class="d-none d-sm-block">Sample ${sample.sample_ke}</span>
                            </a>
                        </li>
                    `;

						// Tab content untuk setiap sample
						sampleTabContentHtml += `
                        <div class="tab-pane ${isActive}" id="sampleTab${sample.sample_ke}" role="tabpanel">
                            <table id="table-sample-${sample.sample_ke}" class="table table-striped table-bordered" style="width:100%"></table>
                        </div>
                    `;
					});

					sampleNavbarHtml += '</ul>'; // Menutup navbar
					sampleTabContentHtml += '</div>'; // Menutup tab content

					// Tampilkan navbar sample pada elemen yang sesuai
					if (zjenis_lab === 'Mikro') {
						$('#sample-navbar-mikro').html(sampleNavbarHtml + sampleTabContentHtml);
					} else if (zjenis_lab === 'Kimia') {
						$('#sample-navbar-kimia').html(sampleNavbarHtml + sampleTabContentHtml);
					}

					// Inisialisasi DataTables untuk sample pertama
					response.samples.forEach((sample, index) => {
						if (index === 0) {
							loadDataTable(id_req, zjenis_lab, sample.sample_ke); // Memuat DataTable untuk sample pertama
						}

						// Event listener untuk setiap tab sample
						$(`#nav-sample-${sample.sample_ke}`).on('click', function() {
							loadDataTable(id_req, zjenis_lab, sample.sample_ke); // Memuat DataTable saat tab dipilih
						});
					});
				} else {
					console.error('Tidak ada data sample ditemukan:', response.message);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error saat memeriksa data sample:', error);
			}
		});
	}
	// Fungsi untuk memuat data ke dalam DataTable berdasarkan sample
	function loadDataTable(id_req, zjenis_lab, sample_ke) {
		$('#table-sample-' + sample_ke).DataTable({
			ajax: {
				url: '<?= site_url("analisa/load_lab_data") ?>', // URL untuk mengambil data sample
				type: 'POST',
				data: {
					id_req: id_req,
					zjenis_lab: zjenis_lab,
					sample_ke: sample_ke
				},
				dataSrc: function(json) {
					return json.data; // Pastikan data yang diterima dari server sesuai dengan format DataTable
				}
			},
			columns: [{
					data: 'sample_ke'
				}, // Ganti dengan nama kolom yang sesuai
				{
					data: 'short_text_method'
				}, // Ganti dengan nama kolom yang sesuai
				{
					data: 'spec'
				}, // Ganti dengan nama kolom yang sesuai
			]
		});
	}

	function getAnalisLab(id_req) {

		// alert(id_req);
		$.ajax({
			url: "<?php echo site_url('analisa/get_analis_lab'); ?>",
			type: "POST",
			data: {
				id_req: id_req
			},
			dataType: "json",
			success: function(response) {
				if (response.status) {
					var defaultAnalisLab = response.analis_lab;
					$('#info_nama_analis').text(defaultAnalisLab);
					initSelect2(defaultAnalisLab);
					fetchAnalisList(defaultAnalisLab, id_req);
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

	function updateAnalisLabOnSelect(id_req) {
		$('#nama_analis').on('select2:close', function() {
			var selectedAnalis = $(this).val();
			$.ajax({
				url: "<?php echo site_url('analisa/update_analis_lab'); ?>",
				type: "POST",
				data: {
					id_req: id_req,
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

	function loadRequestData(id_req) {
		// alert(id_req);
		$.ajax({
			url: "<?php echo site_url('analisa/get_request_data'); ?>", // URL untuk mengambil data
			type: "POST",
			data: {
				id_req: id_req
			},
			dataType: "json",
			success: function(data) {
				$('#info_nama_qc').text(data.nama_qc || "");
				$('#info_material').html(
					(data.material ? +data.material.replace(/^0+/, "") + '<strong>' : '') +
					' | Karantina Ke : ' + (data.lv_total || '') + '</strong>'
				);
				$('#info_created_at').text(data.created_at === '0000-00-00' ? '' : formatDate(data.created_at));
				$('#info_desc').text(data.desc || "");
				$('#info_no_karantina').text(data.no_karantina || "");
				// Combine quantity and uom
				var quantityText = (data.quantity || "") + " " + (data.uom || "");
				$('#info_quantity').text(quantityText.trim());
				$('#info_zmasalah').text(data.zmasalah || "");
				$('#info_pengerjaan_qc').text(data.waktu_pengerjaan_qc + ' Hari' || "");
				// Menampilkan estimasi untuk waktu_in_qc
				$('#info_mulai_qc').text(formatDate(data.waktu_in_qc) || "");
				$('#info_pengerjaan_lab').text(data.waktu_pengerjaan_lab + ' Hari' || "");
				$('#info_pengerjaan_rnd').text(data.waktu_pengerjaan_rnd + ' Hari' || "");
				// Format fungsi untuk mengubah ke format DD-MM-YYYY
				// Format fungsi untuk mengubah ke format DD-MM-YYYY, dan memeriksa tanggal kosong
				function formatDate(date) {
					// Cek apakah tanggal kosong atau invalid
					if (!date || date === "0000-00-00 00:00:00") {
						return ''; // Jika tanggal adalah 0000-00-00 atau tidak ada, kembalikan kosong
					}

					let tanggal = new Date(date);
					let day = String(tanggal.getDate()).padStart(2, '0'); // Format jadi 2 digit
					let month = String(tanggal.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0, jadi tambahkan 1
					let year = tanggal.getFullYear();

					return `${day}-${month}-${year}`;
				}

				// Fungsi untuk menambahkan hari kerja, menghindari akhir pekan
				function addWorkingDays(date, daysToAdd) {
					let currentDate = new Date(date);
					let addedDays = 0;

					while (addedDays < daysToAdd) {
						currentDate.setDate(currentDate.getDate() + 1); // Tambah satu hari
						// Cek apakah hari Sabtu (6) atau Minggu (0)
						if (currentDate.getDay() !== 0 && currentDate.getDay() !== 6) {
							addedDays++;
						}
					}

					return currentDate;
				}

				// Fungsi umum untuk menghitung dan menampilkan estimasi tanggal
				function updateEstimation(elementId, startDate, daysToAdd) {
					// Cek jika tanggal awal adalah kosong, maka langsung return tanpa perubahan
					if (!startDate || startDate === "0000-00-00 00:00:00") {
						$(elementId).text(''); // Tampilkan kosong
						return;
					}

					let tanggalAwal = new Date(startDate); // Konversi ke objek Date
					let jumlahHari = parseInt(daysToAdd, 10); // Pastikan ini adalah integer

					// Jika jumlah hari yang ditambahkan adalah 0, gunakan tanggal awal tanpa perubahan
					let tanggalSelesai;
					if (jumlahHari === 0) {
						tanggalSelesai = tanggalAwal;
					} else {
						// Tambahkan jumlah hari kerja ke tanggal awal
						tanggalSelesai = addWorkingDays(tanggalAwal, jumlahHari);
					}

					// Format tanggal hasil menjadi DD-MM-YYYY
					let tanggalHasil = formatDate(tanggalSelesai);

					// Tampilkan hasilnya pada elemen dengan id yang diberikan
					$(elementId).text(tanggalHasil || "");
				}



				// Estimasi untuk info_estimasi_qc
				updateEstimation('#info_estimasi_qc', data.waktu_in_qc, data.waktu_pengerjaan_qc);

				// Estimasi untuk info_estimasi_lab
				updateEstimation('#info_estimasi_lab', data.waktu_in_lab, data.waktu_pengerjaan_lab);

				// Estimasi untuk info_estimasi_rnd
				updateEstimation('#info_estimasi_rnd', data.waktu_in_rnd, data.waktu_pengerjaan_rnd);


				// Menampilkan waktu_out_qc dalam format DD-MM-YYYY atau kosong jika 0000-00-00
				$('#info_realisasi_qc').text(formatDate(data.waktu_out_qc) || "");
				$('#info_mulai_lab').text(formatDate(data.waktu_in_lab) || "");

				$('#info_realisasi_lab').text(formatDate(data.waktu_out_lab) || "");
				$('#info_mulai_rnd').text(formatDate(data.waktu_in_rnd) || "");

				$('#info_realisasi_rnd').text(formatDate(data.waktu_out_rnd) || "");
				$('#info_keputusan_rnd').text(data.keputusan_rnd || "");
				$('#info_distribusi').text(data.info_distribusi + " ( " + data.total_waktu_pengerjaan + " " + data.satuan_waktu + " ) " || "");
				$('#info_sample_lab').text(data.jumlah_sample || "");
				$('#info_sample_rnd').text(data.jumlah_sample_rnd || "");
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
					$('#tanggal_uji_ulang').text(formatDate(data.qndat));
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