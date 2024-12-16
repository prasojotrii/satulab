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

											<a class="btn btn-primary" onclick="add_user()"><i class="bx bx-plus me-1"></i> User</a>
											<a class="btn btn-primary" onclick="add_unit()"><i class="bx bx-plus me-1"></i> Unit</a>
											<a class="btn btn-primary" onclick="add_default_approval()"><i class="bx bx-plus me-1"></i> Approval</a>

											<!-- <a class="btn btn-primary" onclick="Tambah_Atasan()"><i class="bx bx-plus me-1"></i>Daftar Spv dan Ka Unit</a>
											<a class="btn btn-primary" onclick="add_unit()"><i class="bx bx-plus me-1"></i> Tambah Halaman</a>
											<a class="btn btn-primary" onclick="Tambah_Role()"><i class="bx bx-plus me-1"></i> Tambah Akses Role </a> -->
											<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
										</div>


									</div>

								</div>
							</div>
						</div>
						<div class="card-body">
							<table id="tabel_user" class="table table-bordered nowrap w-100 ">
								<thead>
									<tr>
										<th width="10px">Edit</th>
										<th width="10px">Del</th>
										<th width="10px">No</th>

										<th width="10px">Lock</th>
										<th width="10px">Tipe</th>
										<th>Pernr</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Sub Unit</th>
										<th>Unit</th>

										<th width="10px">Job</th>
										<th>Last Login</th>




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
<div class="modal fade" id="modal_form_user" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_user" class="needs-validation" novalidate>
					<div class="row">

						<div class="col-md-1" style="display: none;">
							<div class="mb-1">
								<label class="form-label" for="id_user">id_user</label>
								<input type="text" class="form-control" id="id_user" name="id_user" placeholder="Id Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-1">
								<label class="form-label" for="pernr">Perner</label>
								<input type="text" class="form-control" id="pernr" name="pernr" placeholder="pernr">
								<div class="invalid-feedback">
									Please provide a Perner.
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="name">Nama</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
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
						<div class="col-md-3" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="id_plant">id_plant</label>
								<input type="text" class="form-control" id="id_plant" name="id_plant" placeholder="Password" value="1">
								<div class="invalid-feedback">
									Please provide a Password .
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="id_unit">Unit</label>
								<select class="form-select" id="id_unit" name="id_unit">
									<!-- <option selected value="">Pilih Tipe</option>
									<option value="Admin">Admin</option>
									<option value="User">User</option> -->

								</select>

							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="list_unit_sub">Sub Unit</label>
								<!-- <select class="form-select" id="id_unit_sub" name="id_unit_sub">
									<option selected value="">Pilih Tipe</option>
									<option value="Admin">Admin</option>
									<option value="User">User</option>

								</select> -->

								<select class="form-control" data-trigger name="list_unit_sub[]" id="list_unit_sub" placeholder="This is a placeholder" multiple>


								</select>
							</div>


						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="email">Email</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="email">

							</div>
						</div>

						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="jobdesk">Jobdesk</label>
								<input type="text" class="form-control" id="jobdesk" name="jobdesk" placeholder="jobdesk">

							</div>
						</div>


						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="tipe">Tipe User</label>
								<select class="form-select" id="tipe" name="tipe">
									<option selected value="">Pilih Tipe</option>
									<option value="Admin">Admin</option>
									<option value="User">User</option>

								</select>

							</div>
						</div>



					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btn_update_password" onclick="save_user_change_password()" class="btn btn-primary">Update Password</button>
				<button type="button" id="btnSave" onclick="save_user()" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_form_unit" role=" dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_unit" class="needs-validation" novalidate>
					<div class="row">
						<div class="col-md-1" style="display: none;">
							<div class="mb-1">
								<label class="form-label" for="id_unit">Id</label>
								<input type="text" class="form-control" id="id_unit" name="id_unit" placeholder="Id" readonly>
								<div class="invalid-feedback">
									Please provide a id_unit.
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="unit_name">Nama Unit</label>
								<input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="Nama unit" required>
								<div class="invalid-feedback">
									Please provide a Nama Halaman.
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="unit_cost_center">Cost Center</label>
								<input type="text" class="form-control" id="unit_cost_center" name="unit_cost_center" placeholder="Cost Center" required>
								<div class="invalid-feedback">
									Please provide a Title .
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="unit_email">Email</label>
								<input type="text" class="form-control" id="unit_email" name="unit_email" placeholder="Email" required>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>

						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="company_parent">company_parent</label>
								<input type="text" class="form-control" id="company_parent" name="company_parent" placeholder="company_parent" value="SM-Bergas" required>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>
						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="id_company">id_company</label>
								<input type="text" class="form-control" id="id_company" name="id_company" placeholder="id_company" value="1" required>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>

						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="company_code">company_code</label>
								<input type="text" class="form-control" id="company_code" name="company_code" placeholder="company_code" value="S100" required>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>
						<div class="col-md-2" style="display: none;">
							<div class="mb-3">
								<label class="form-label" for="company_name">company_name</label>
								<input type="text" class="form-control" id="company_name" name="company_name" placeholder="company_name" value="PT Jamu dan Farmasi Sido Muncul Tbk" required>
								<div class="invalid-feedback">
									Please provide a Url .
								</div>
							</div>
						</div>

						<div class="col-md-2">
							<div class="mt-4">
								<button type="button" id="btn_save_unit" onclick="save_unit()" class="btn btn-primary "> Simpan</button>


							</div>
						</div>


					</div>
				</form>
				<hr>
				<div class="card-body">
					<table id="tabel_unit" class="table table-bordered nowrap w-100 ">
						<thead>
							<tr>
								<th width="2px">Edit</th>
								<th width="2px">Del</th>
								<th width="2px">No</th>
								<th>Nama Unit</th>
								<th>Cost Center</th>
								<th>Email</th>
								<th>Perusahaan</th>
							</tr>
						</thead>

					</table>
				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_form_unit_sub" role=" dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_unit_sub" class="needs-validation" novalidate>
					<div class="row">
						<div class="col-md-1">
							<div class="mb-1">
								<label class="form-label" for="id_unit_master">id_unit</label>
								<input type="text" class="form-control" id="id_unit_master" name="id_unit_master" placeholder="Id" readonly>
								<div class="invalid-feedback">
									Please provide a id_halaman.
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<div class="mb-1">
								<label class="form-label" for="id_unit_sub">id_unit_sub</label>
								<input type="text" class="form-control" id="id_unit_sub" name="id_unit_sub" placeholder="Id" readonly>
								<div class="invalid-feedback">
									Please provide a id_unit_sub.
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="sub_unit_name">Nama Sub Unit</label>
								<input type="text" class="form-control" id="sub_unit_name" name="sub_unit_name" placeholder="Nama Halaman" required>
								<div class="invalid-feedback">
									Please provide a Nama Sub Unit.
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label class="form-label" for="sub_unit_inisial">Inisial</label>
								<input type="text" class="form-control" id="sub_unit_inisial" name="sub_unit_inisial" placeholder="Inisial" required>
								<div class="invalid-feedback">
									Please provide a Inisial .
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="email_sub_unit">Email</label>
								<input type="text" class="form-control" id="email_sub_unit" name="email_sub_unit" placeholder="Email" required>
								<div class="invalid-feedback">
									Please provide a Email .
								</div>
							</div>
						</div>



						<div class="col-md-2">
							<div class="mt-4">
								<button type="button" id="btn_save_unit_sub" onclick="save_unit_sub()" class="btn btn-primary ">Simpan</button>


							</div>
						</div>


					</div>
				</form>
				<hr>
				<div class="card-body">
					<table id="tabel_unit_sub" class="table table-bordered nowrap w-100 ">
						<thead>
							<tr>
								<th width="2px">Edit</th>
								<th width="2px">Del</th>
								<th width="2px">No</th>
								<th>Nama Sub Unit</th>
								<th>Inisial</th>
								<th>Email</th>

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
								<label class="form-label" for="id_akses">Id akses</label>
								<input type="text" class="form-control" id="id_akses" name="id_akses" placeholder="Id Instrumen" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="mb-1">
								<label class="form-label" for="akses_pernr">Pernr</label>
								<input type="text" class="form-control" id="akses_pernr" name="akses_pernr" placeholder="Id" readonly>
								<div class="invalid-feedback">
									Please provide a Kode Instrumen.
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label" for="akses_namahalaman">Nama Menu</label>
								<select class="form-select" id="akses_namahalaman" name="akses_namahalaman">

								</select>
								<div class="invalid-feedback">
									Please provide a Nama Halaman.
								</div>
							</div>
						</div>

						<div class="col-md-2">
							<div class="mt-4">
								<button type="button" id="btnHTambahAkses" onclick="tambah_akses_user()" class="btn btn-primary ">Tambah Akses</button>
							</div>
						</div>

					</div>
				</form>
				<div class="card-body">
					<table id="tabel_user_akses" class="table table-bordered dt-responsive compact nowrap w-100 ">
						<thead>
							<tr>
								<th width="10px">Del </th>
								<th>No</th>
								<th>Pernr</th>
								<th>Id Menu</th>
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

<div class="modal fade" id="modal_form_default_approval" role=" dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_default_approval" class="needs-validation" novalidate>
					<div class="row">
						<div class="col-md-1" style="display: none;">
							<div class="mb-1">
								<label class="form-label" for="id_default_approval">Id</label>
								<input type="text" class="form-control" id="id_default_approval" name="id_default_approval" placeholder="Id" readonly>
								<div class="invalid-feedback">
									Please provide a id_unit.
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label" for="name_default">Nama Default</label>
								<input type="text" class="form-control" id="name_default" name="name_default" placeholder="Nama unit" required>
								<div class="invalid-feedback">
									Please provide a Nama Halaman.
								</div>
							</div>
						</div>


						<div class="col-md-2">
							<div class="mt-4">
								<button type="button" id="btn_save_default_approval" onclick="save_default_approval()" class="btn btn-primary "> Simpan</button>


							</div>
						</div>


					</div>
				</form>
				<hr>
				<div class="card-body">
					<table id="tabel_default_approval" class="table table-bordered nowrap w-100 ">
						<thead>
							<tr>
								<th width="10px">Edit</th>
								<th width="10px">Del</th>
								<th width="10px">No</th>

								<th>Nama Default</th>

							</tr>
						</thead>

					</table>
				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_form_list_approval" role=" dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Instrumen</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form_list_approval" class="needs-validation" novalidate>
					<div class="row">
						<div class="col-md-1">
							<div class="mb-1">
								<label class="form-label" for="id_default_approval_list">id_unit</label>
								<input type="text" class="form-control" id="id_default_approval_list" name="id_default_approval_list" placeholder="Id" readonly>
								<div class="invalid-feedback">
									Please provide a id_halaman.
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<div class="mb-1">
								<label class="form-label" for="id_approval">id_list_approval</label>
								<input type="text" class="form-control" id="id_approval" name="id_approval" placeholder="Id" readonly>
								<div class="invalid-feedback">
									Please provide a id_list_approval.
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label class="form-label" for="pernr_approval">Pernr</label>
								<input type="text" class="form-control" id="pernr_approval" name="pernr_approval" placeholder="Pernr" required>
								<div class="invalid-feedback">
									Please provide a Nama Sub Unit.
								</div>
							</div>
						</div>




						<div class="col-md-2">
							<div class="mt-4">
								<button type="button" id="btn_save_approval" onclick="save_approval()" class="btn btn-primary ">Simpan</button>


							</div>
						</div>


					</div>
				</form>
				<hr>
				<div class="card-body">
					<table id="tabel_list_approval" class="table table-bordered nowrap w-100 ">
						<thead>
							<tr>

								<th width="2px">Edit</th>
								<th width="2px">Del</th>
								<th width="2px">No</th>
								<th>Pernr</th>
								<th>Nama</th>

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
		$('#tabel_user').DataTable().clear().destroy();
		var table = $('#tabel_user').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"scrollX": true,
			"order": [
				[3, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('master/list_master_user') ?>",
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
					"targets": [0, 1, 2], //last column
					"orderable": false, //set not orderable
				}

			],

		});



	});


	function add_user() {
		save_method = 'add';
		$('#form_user')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_user').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah User'); // Set Title to Bootstrap modal title
		$('#list_unit_sub').empty();
		$('#btn_update_password').modal('hide');
		load_list_unit();

	}

	function list_menu() {
		$.ajax({
			url: "<?php echo base_url('master/get_data_menu_all'); ?>",
			type: "POST",
			// data: {
			//     id_company: id_company
			// },
			dataType: "json",
			success: function(data) {

				$('#akses_namahalaman').empty();
				$('#akses_namahalaman').append('<option value="">-- Pilih Menu --</option>');
				$.each(data, function(key, value) {
					$('#akses_namahalaman').append('<option value="' + value.id_menu + '">' + value.menu_name + '</option>');
				});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}


	function list_akses_menu(pernr) {
		save_method = 'add';
		$('#form_akses')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_akses').modal('show'); // show bootstrap modal
		$('.modal-title').text('List User Akses'); // Set Title to Bootstrap modal title
		$('#tabel_user_akses').DataTable().clear().destroy();
		document.getElementById('akses_pernr').value = pernr;
		list_menu();



		var tabel_user_akses = $('#tabel_user_akses').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true,
			//Feature control DataTables' server-side processing mode.
			"order": [
				[1, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('master/list_user_akses') ?>",
				"type": "POST",
				"data": function(data) {
					data.pernr = pernr;

				}
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
			initComplete: function(settings, json) {


				$("#tabel_user_akses").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},

		});

	}

	function klikview(id_akses, view) {
		$.ajax({
			url: "<?php echo site_url('master/Akses_View') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_akses: id_akses,
				view: view,
				pernr: $('#akses_pernr').val()
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

	function klikcreate(id_akses, create) {
		$.ajax({
			url: "<?php echo site_url('master/Akses_create') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_akses: id_akses,
				create: create,
				pernr: $('#akses_pernr').val()
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

	function klikupdate(id_akses, update) {
		$.ajax({
			url: "<?php echo site_url('master/Akses_update') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_akses: id_akses,
				update: update,
				pernr: $('#akses_pernr').val()
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

	function klikdelete(id_akses, del) {
		$.ajax({
			url: "<?php echo site_url('master/Akses_delete') ?>/",
			type: "POST",
			dataType: "JSON",
			data: {
				id_akses: id_akses,
				delete: del,
				pernr: $('#akses_pernr').val()

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

	function load_list_unit() {
		$.ajax({
			url: "<?php echo base_url('master/get_data_all_unit'); ?>",
			type: "POST",
			// data: {
			//     id_company: id_company
			// },
			dataType: "json",
			success: function(data) {

				$('#id_unit').empty();
				$('#id_unit').append('<option value="">-- Pilih Unit --</option>');
				$.each(data, function(key, value) {
					$('#id_unit').append('<option value="' + value.id_unit + '">' + value.unit_name + '</option>');
				});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	$('#id_unit').change(function() {
		var id_unit = $('#id_unit').val();


		$.ajax({
			type: "POST",
			url: "<?php echo site_url('master/get_data_by_id_unit'); ?>",
			data: {
				id_unit: id_unit,

			},
			dataType: "json",
			success: function(data) {

				$('#list_unit_sub').empty();

				$.each(data, function(key, value) {
					$('#list_unit_sub').append('<option value="' + value.id_unit_sub + '">' + value.sub_unit_name + '</option>');
				});

			},

			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});

	});


	// $('#list_unit_sub').change(function() {
	// 	var list_unit_sub = $('#list_unit_sub').val();

	// 	alert(list_unit_sub);

	// });

	function add_unit(id_unit) {
		save_method = 'add';
		$('#form_unit')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_unit').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah Unit'); // Set Title to Bootstrap modal title
		// document.getElementById('id_unit_master').value = id_unit;

		load_tabel_unit(id_unit);

	}

	function add_default_approval() {
		save_method = 'add';
		$('#form_default_approval')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_default_approval').modal('show'); // show bootstrap modal
		$('.modal-title').text('Default Approval'); // Set Title to Bootstrap modal title




		$('#tabel_default_approval').DataTable().clear().destroy();

		var tabel_default_approval = $('#tabel_default_approval').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[3, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('master/list_default_approval') ?>",
				"type": "POST",
				// "data": function(data) {
				// 	data.id_unit = id_unit;

				// }
			},



			// //Set column definition initialisation properties.
			"columnDefs": [{

					"targets": '_all',
					"createdCell": function(td, cellData, rowData, row, col) {
						$(td).css('padding', '5px')
					}
				},
				{
					"targets": [0, 1, 2],
					"className": "text-center",
					"width": "1%"
				},

				{
					"targets": [3],
					"className": "text-center",
					"width": "98%"
				}


			],
			initComplete: function(settings, json) {
				$("#tabel_default_approval").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");



			},


		});
	}


	function list_default_approval(id_default_approval) {
		save_method = 'add';
		$('#form_list_approval')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_list_approval').modal('show'); // show bootstrap modal
		$('.modal-title').text('List Approval'); // Set Title to Bootstrap modal title

		document.getElementById('id_default_approval_list').value = id_default_approval;
		$('#tabel_list_approval').DataTable().clear().destroy();

		var tabel_list_approval = $('#tabel_list_approval').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[3, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('master/list_approval') ?>",
				"type": "POST",
				"data": function(data) {
					data.id_default_approval = id_default_approval;

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
					"targets": [0, 1, 2],
					"className": "text-center",
					"width": "1%"
				},

				{
					"targets": [3],
					"className": "text-center",
					"width": "98%"
				}


			],
			initComplete: function(settings, json) {
				$("#tabel_list_approval").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");



			},


		});

	}




	function load_tabel_unit(id_unit) {

		$('#tabel_unit').DataTable().clear().destroy();
		var tabel_unit = $('#tabel_unit').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			// "scrollX": true,
			"order": [
				[3, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('master/list_master_unit') ?>",
				"type": "POST",
				// "data": function(data) {
				// 	data.id_unit = id_unit;

				// }
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
			initComplete: function(settings, json) {


				$("#tabel_unit").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");

			},

		});
	}





	function add_unit_sub(id_unit) {
		save_method = 'add';
		$('#form_unit_sub')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_unit_sub').modal('show'); // show bootstrap modal
		$('.modal-title').text('Tambah Unit Sub'); // Set Title to Bootstrap modal title

		load_tabel_unit_sub(id_unit);
		document.getElementById('id_unit_master').value = id_unit;
	}

	function load_tabel_unit_sub(id_unit) {

		$('#tabel_unit_sub').DataTable().clear().destroy();

		var tabel_unit_sub = $('#tabel_unit_sub').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [
				[3, 'asc']
			], //Initial no order.
			// "buttons": ['excel'],
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('master/list_master_unit_sub') ?>",
				"type": "POST",
				"data": function(data) {
					data.id_unit = id_unit;

				}
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
			initComplete: function(settings, json) {
				$("#tabel_unit_sub").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");



			},


		});
	}



	function tambah_akses_user() {



		url = "<?php echo site_url('master/save_user_akses') ?>";



		var formData = new FormData($('#form_akses')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				Swal.fire(
					'Done',
					'Data sudah berhasil tersimpan.',
					'success'
				)



				$('#tabel_user_akses').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}


	function save_default_approval() {

		var baru = document.getElementById('id_default_approval').value;

		if (baru == '') {
			url = "<?php echo site_url('master/save_default_approval') ?>";
		} else {
			url = "<?php echo site_url('master/update_default_approval') ?>";
		}



		var formData = new FormData($('#form_default_approval')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				Swal.fire(
					'Done',
					'Data sudah berhasil tersimpan.',
					'success'
				)
				$('#form_default_approval')[0].reset();

				$('#modal_default_approval').modal('hide');
				$('#tabel_default_approval').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}

	function delete_default_approval(id_default_approval) {


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
					url: "<?php echo site_url('master/delete_default_approval') ?>/" + id_default_approval,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table


						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_default_approval').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}


	function edit_default_approval(id_default_approval) {
		// $('#modal_master_menu').modal('show');
		save_method = 'update';

		$.ajax({
			url: "<?php echo site_url('master/get_data_default_approval') ?>/" + id_default_approval,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_default_approval"]').val(data.id_default_approval);
				$('[name="name_default"]').val(data.name_default);

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function save_approval() {

		var baru = document.getElementById('id_approval').value;

		if (baru == '') {
			url = "<?php echo site_url('master/save_approval') ?>";
		} else {
			url = "<?php echo site_url('master/update_approval') ?>";
		}



		var formData = new FormData($('#form_list_approval')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				Swal.fire(
					'Done',
					'Data sudah berhasil tersimpan.',
					'success'
				)

				document.getElementById('id_approval').value = '';
				document.getElementById('pernr_approval').value = '';

				$('#tabel_list_approval').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}

	function delete_approval(id_approval) {


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
					url: "<?php echo site_url('master/delete_approval') ?>/" + id_approval,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table


						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_list_approval').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}


	function edit_approval(id_approval) {
		// $('#modal_master_menu').modal('show');
		save_method = 'update';

		$.ajax({
			url: "<?php echo site_url('master/get_data_approval') ?>/" + id_approval,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_default_approval_list"]').val(data.id_default_approval);

				$('[name="id_approval"]').val(data.id_approval);
				$('[name="pernr_approval"]').val(data.pernr);

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function save_user() {

		var baru = document.getElementById('id_user').value;

		if (baru == '') {
			url = "<?php echo site_url('master/save_user') ?>";
		} else {
			url = "<?php echo site_url('master/update_user') ?>";
		}



		var formData = new FormData($('#form_user')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				Swal.fire(
					'Done',
					'Data sudah berhasil tersimpan.',
					'success'
				)
				$('#form_user')[0].reset();

				$('#modal_form_user').modal('hide');
				$('#tabel_user').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}


	function save_user_change_password() {



		url = "<?php echo site_url('master/update_password') ?>";



		var formData = new FormData($('#form_user')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				Swal.fire(
					'Done',
					'Data sudah berhasil tersimpan.',
					'success'
				)
				$('#form_user')[0].reset();

				$('#modal_form_user').modal('hide');
				$('#tabel_user').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}

	function save_unit() {

		var baru = document.getElementById('id_unit').value;


		if (baru == '') {
			url = "<?php echo site_url('master/save_unit') ?>";
		} else {
			url = "<?php echo site_url('master/update_unit') ?>";
		}



		var formData = new FormData($('#form_unit')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				Swal.fire(
					'Done',
					'Data sudah berhasil tersimpan.',
					'success'
				)

				$('#tabel_unit').DataTable().ajax.reload();
				$('#form_unit')[0].reset();

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}




	function edit_unit(id_unit) {
		// $('#modal_master_menu').modal('show');
		save_method = 'update';

		$.ajax({
			url: "<?php echo site_url('master/get_data_unit') ?>/" + id_unit,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_unit"]').val(data.id_unit);
				$('[name="unit_name"]').val(data.unit_name);
				$('[name="unit_type"]').val(data.unit_type);
				$('[name="unit_priority"]').val(data.unit_priority);
				$('[name="unit_cost_center"]').val(data.unit_cost_center);
				$('[name="unit_email"]').val(data.unit_email);
				$('[name="company_parent"]').val(data.company_parent);
				$('[name="id_company"]').val(data.id_company);
				$('[name="company_code"]').val(data.company_code);
				$('[name="company_name"]').val(data.company_name);

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function delete_unit(id_unit) {


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
					url: "<?php echo site_url('master/delete_unit') ?>/" + id_unit,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table


						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_unit').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}


	function save_unit_sub() {

		var baru = document.getElementById('id_unit_sub').value;


		if (baru == '') {
			url = "<?php echo site_url('master/save_unit_sub') ?>";
		} else {
			url = "<?php echo site_url('master/update_unit_sub') ?>";
		}



		var formData = new FormData($('#form_unit_sub')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				Swal.fire(
					'Done',
					'Data sudah berhasil tersimpan.',
					'success'
				)

				$('#tabel_unit_sub').DataTable().ajax.reload();
				$('#form_unit_sub')[0].reset();

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');


			}
		});
	}




	function edit_unit_sub(id_unit_sub) {
		// $('#modal_master_menu').modal('show');
		save_method = 'update';

		$.ajax({
			url: "<?php echo site_url('master/get_data_unit_sub') ?>/" + id_unit_sub,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_unit_master"]').val(data.id_unit);
				$('[name="id_unit_sub"]').val(data.id_unit_sub);
				$('[name="sub_unit_name"]').val(data.sub_unit_name);
				$('[name="sub_unit_inisial"]').val(data.sub_unit_inisial);
				$('[name="email_sub_unit"]').val(data.email_sub_unit);

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function delete_unit_sub(id_unit_sub) {


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
					url: "<?php echo site_url('master/delete_unit_sub') ?>/" + id_unit_sub,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table


						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_unit_sub').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}




	function reload_table_dan_page() {
		$('#tabel_user').DataTable().ajax.reload();
		location.reload();
	}

	function reload_table() {
		$('#tabel_user').DataTable().ajax.reload();

	}

	function edit_user(id_user) {
		save_method = 'update';
		$('#form_user')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_user').modal('show'); // show bootstrap modal when complete loaded
		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('master/get_data_user') ?>/" + id_user,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="id_user"]').val(data.id_user);
				$('[name="pernr"]').val(data.pernr);
				$('[name="name"]').val(data.name);
				$('[name="email"]').val(data.email);
				// $('[name="password"]').val(data.password);
				$('[name="jobdesk"]').val(data.jobdesk);
				$('[name="tipe"]').val(data.tipe);

				$.ajax({
					url: "<?php echo base_url('master/get_data_all_unit'); ?>",
					type: "POST",
					// data: {
					//     id_company: id_company
					// },
					dataType: "json",
					success: function(data2) {

						$('#id_unit').empty();
						$('#id_unit').append('<option value="">-- Pilih Unit --</option>');
						$.each(data2, function(key, value) {
							$('#id_unit').append('<option value="' + value.id_unit + '">' + value.unit_name + '</option>');
						});
						$('#id_unit').val(data.id_unit);


					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax');
					}
				});



				$.ajax({
					type: "POST",
					url: "<?php echo site_url('master/get_data_by_id_unit'); ?>",
					data: {
						id_unit: data.id_unit,

					},
					dataType: "json",
					success: function(data3) {

						// alert(data.id_unit_sub);
						// Mengosongkan opsi sebelumnya dari elemen select
						$('#list_unit_sub').empty();

						// Menambahkan opsi berdasarkan data3
						$.each(data3, function(key, value) {
							var option = $('<option></option>').attr('value', value.id_unit_sub).text(value.sub_unit_name);
							// Memeriksa apakah nilai id_unit_sub terdapat dalam data.id_unit_sub
							if (data.id_unit_sub.indexOf(value.id_unit_sub) !== -1) {
								option.attr('selected', 'selected');
							}
							$('#list_unit_sub').append(option);
						});


					},

					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error get data from ajax');
					}
				});




			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}




	function delete_user(id_user) {


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
					url: "<?php echo site_url('master/delete_user') ?>/" + id_user,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table


						Swal.fire(
							'Data Terhapus!',
							'Data sudah berhasil terhapus.',
							'success'
						)
						$('#tabel_user').DataTable().ajax.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}

	function delete_akses(id_akses) {


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
					url: "<?php echo site_url('master/delete_akses') ?>/" + id_akses,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table


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









	function lock_user(id_user, active) {
		$.ajax({
			url: "<?php echo site_url('master/lock_user') ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				id_user: id_user,
				active: active
			},
			success: function(data) {
				//if success reload ajax table
				// $('#modal_form_akses').modal('hide');
				$('#tabel_user').DataTable().ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});
	};
</script>







</body>

</html>