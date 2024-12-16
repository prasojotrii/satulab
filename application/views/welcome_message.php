<div class="modal fade" id="modal_input" role="dialog">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Input Data Order</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form" class="needs-validation" novalidate>

					<div class="form-body">
						<div class="card" id="input_order">
							<div class="card-body">
								<div class="row">

									<!-- <div class="col-md-3">
									<div class="mb-1">
										<label class="form-label col-form-label-sm mb-0"  for="email">Id email</label>
										<input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Id email" value="erni.rusmalawati@sidomuncul.co.id">
										<div class="invalid-feedback">
											Please provide a Id Order.
										</div>
									</div>
								</div> -->
									<div class="col-auto">
										<label class="form-label col-form-label-sm mb-0" for="urgent">Urgent</label>
										<select class="form-select form-select-sm" id="urgent" name="urgent">
											<option value="1">Ya</option>
											<option selected value="2">Tidak</option>
										</select>
									</div>

									<div class="col-auto">
										<label class="form-label col-form-label-sm mb-0" for="kategori_barang">Kategori Barang</label>
										<select class="form-select form-select-sm" id="kategori_barang" name="kategori_barang" onchange="FilterByKategori();">
											<option selected value="">Pilih Kategori</option>
											<?php
											foreach ($dataKategori as $row) {
												echo '<option value="' . $row->kategori_barang . '">' . $row->kategori_barang . '</option>';
											}
											?>
										</select>
									</div>

									<div class="col-auto">
										<label class="form-label col-form-label-sm mb-0" for="nama_barang">Nama Barang</label>
										<input type="text" class="form-control form-select-sm autocomplete" id="nama_barang" name="nama_barang" placeholder="Nama Barang" onchange="autofill();">
									</div>

									<div class="col-md-1">
										<div class="mb-3">
											<label class="form-label col-form-label-sm mb-0" for="merek">Merek</label>
											<input type="text" class="form-control form-control-sm" id="merek" name="merek" placeholder="Merek" required>
											<div class="invalid-feedback">
												Please provide a Merek .
											</div>
										</div>
									</div>


									<div class="col-md-1" id="input_spesifikasi">
										<div class="mb-3">
											<label class="form-label col-form-label-sm mb-0" for="spesifikasi">Spesifikasi / No Katalog</label>
											<input type="text" class="form-control form-control-sm" id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi / No Katalog" required>
											<div class="invalid-feedback">
												Please provide a spesifikasi .
											</div>
										</div>
									</div>

									<div class="col-auto" id="input_ukuran">

										<label class="form-label col-form-label-sm mb-0" for="ukuran">Kapasitas Ukuran</label>
										<select class="form-select form-select-sm" id="ukuran" name="ukuran">
											<option selected value="">Pilih Ukuran</option>
											<?php
											foreach ($dataUkuran as $row) {
												echo '<option value="' . $row->ukuran . '">' . $row->ukuran . '</option>';
											}
											?>
										</select>

									</div>
									<div class="col-auto" id="input_type">
										<label class="form-label col-form-label-sm mb-0" for="type">Type</label>
										<select class="form-select form-select-sm" id="type" name="type">
											<option selected value="">Pilih Type</option>
											<option value="Borosilicate Glass">Borosilicate Glass </option>
										</select>

									</div>
									<div class="col-auto" id="input_grade">

										<label class="form-label col-form-label-sm mb-0" for="grade">Grade</label>
										<select class="form-select form-select-sm" id="grade" name="grade">
											<option selected value="">Pilih Grade</option>
											<option value="Class A">Class A</option>
											<option value="Class B">Class B</option>
											<option value="Class C">Class C</option>
										</select>

									</div>


									<div class="col-md-1" style="width: 80px;">

										<label class="form-label col-form-label-sm mb-0" for="jumlah">Jumlah</label>


										<input class="form-control form-control-sm" type="text" id="jumlah" name="jumlah" value="1">

									</div>


									<div class="col-auto">
										<label class="form-label col-form-label-sm mb-0" for="satuan">Satuan</label>
										<select class="form-select form-select-sm" id="satuan" name="satuan">
											<option seleted value="">Pilih Satuan</option>
											<?php
											foreach ($dataSatuan as $row) {
												echo '<option value="' . $row->satuan . '">' . $row->satuan . '</option>';
											}
											?>
										</select>
									</div>


									<div class="col-md-1">

										<label class="form-label col-form-label-sm mb-0" for="nama">Nama PIC</label>
										<input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Pemesan" required>

									</div>
									<div class="col-sm-2 " style="width: 325px;">

										<label class="form-label col-form-label-sm mb-0" for="keterangan">Keterangan</label>
										<textarea type="text" class="form-control form-control-sm" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" rows="1"></textarea>

									</div>


								</div>
								<div class="row" id="input_tambahan">


									<div class="col-md-1">

										<label class="form-label col-form-label-sm mb-0" for="id_order">Id Order</label>
										<input type="text" class="form-control form-control-sm " id="id_order" name="id_order" placeholder="Id Order">
										<div class="invalid-feedback">
											Please provide a Id Order.
										</div>

									</div>

									<div class="col-md-1">

										<label class="form-label col-form-label-sm mb-0" for="nomor">Nomor</label>
										<input type="text" class="form-control form-control-sm " id="nomor" name="nomor" placeholder="Nomor">
										<div class="invalid-feedback">
											Please provide a Nomor.
										</div>

									</div>

									<div class="col-md-1">

										<label class="form-label col-form-label-sm mb-0" for="id_batch">id_batch</label>
										<input type="text" class="form-control form-control-sm " id="id_batch" name="id_batch" placeholder="id_batch" value="<?= $id_batch; ?>">
										<div class="invalid-feedback">
											Please provide a Nomor.
										</div>

									</div>

									<div class="col-auto">

										<label class="form-label col-form-label-sm mb-0" for="penawaran">Apakah Perlu Pernawaran ? </label>
										<select class="form-select form-select-sm" name="penawaran" id="penawaran">
											<option value="0">Tidak</option>
											<option value="1">Ya</option>
											<option selected value="2">Belum Ditentukan</option>
										</select>

									</div>
									<div class="col-auto">

										<label class="form-label col-form-label-sm mb-0" for="status">status</label>
										<select class="form-select form-select-sm" name="status" id="status_ordeddr">
											<?php
											foreach ($dataStatus as $row) {
												echo '<option value="' . $row->id_status . '">' . $row->status . '</option>';
											}
											?>
										</select>

									</div>

									<div class="col-md-1">
										<div class="mb-3">
											<label class="form-label col-form-label-sm mb-0" for="id_instrumen">Kode Instrumen</label>
											<input type="text" class="form-control form-control-sm" id="id_instrumen" name="id_instrumen" placeholder="Kode Instrumen" readonly>
											<div class="invalid-feedback">
												Please provide a Kode Instrumen.
											</div>
										</div>
									</div>

									<div class="col-md-1">
										<div class="mb-3">
											<label class="form-label col-form-label-sm mb-0" for="rumus">rumus_instrumen</label>
											<input type="text" class="form-control form-control-sm" id="rumus_instrumen" name="rumus_instrumen" placeholder="Kode Instrumen" readonly>
											<div class="invalid-feedback">
												Please provide a Kode Instrumen.
											</div>
										</div>
									</div>
									<div class="col-md-1">
										<div class="mb-3">
											<label for="tanggal_input" class="form-label col-form-label-sm mb-0">Tanggal Input</label>
											<input class="form-control form-control-sm" type="text" id="tanggal_input" name="tanggal_input" autocomplete="off" value="<?php echo date("Y-m-d"); ?>" placeholder="Tanggal tanggal_input">
										</div>
									</div>



									<div class="col-md-1">
										<div class="mb-3">
											<label for="tanggal_waktu" class="form-label col-form-label-sm mb-0">Tanggal Waktu Input</label>
											<input class="form-control form-control-sm" type="text" id="tanggal_waktu" name="tanggal_waktu" autocomplete="off" value="<?php echo date("Y-m-d H:i:s"); ?>" placeholder="Tanggal tanggal_waktu">
										</div>
									</div>

									<div class="col-md-1" id="input_last_edit">
										<div class="mb-3">
											<label class="form-label col-form-label-sm mb-0" for="last_edit">last_edit </label>
											<input type="text" class="form-control form-control-sm" name="last_edit" id="last_edit" placeholder="last_edit" value="<?= $dataSession['nama']; ?>">
											<div class="invalid-feedback">
												Please provide a last_edit .
											</div>

										</div>
									</div>
								</div>
							</div>

							<div class="card-footer">
								<div class="float-end"><button type="button float-right" id="btnSaveOrder" onclick="Tambah()" class="btn btn-primary">Tambahkan</button></div><br>

							</div>
						</div>
					</div>
				</form>

				<div class="card">
					<div class="card-body">
						<table id="tabel_order_baru" name="tabel_order_baru" class="table table-bordered nowrap w-100">
							<thead>
								<tr style="text-align: center">
									<th width="1px">#</th>
									<th width="10px">No</th>
									<th width="10px">Id Order</th>
									<th width="10px">Id Request</th>
									<th width="10px">Tanggal Input</th>
									<th width="10px">Kategori</th>
									<th>Nama Barang</th>
									<th>Spesifikasi / No Katalog </th>
									<th width="10px">Merek</th>
									<th width="10px">Ukuran</th>
									<th width="10px">Type</th>
									<th width="10px">Grade</th>
									<th width="10px">Jumlah</th>
									<th width="10px">Satuan</th>
									<th width="10px">Nama PIC</th>
									<th>Keterangan</th>
									<th>Status</th>
									<th width="10px">Tanggal Datang</th>
									<th width="10px">Urgent</th>
									<th width="10px">Penawaran</th>
									<th width="10px">No PR</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" id="btnDisetujui" onclick="saveDisetujui()" class="btn btn-primary">Disetujui</button>
				<button type="button" id="btnSimpan" name="btnSimpan" onclick="save()" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>