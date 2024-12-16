<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Daftar Instrumen Laboratorium Sido Muncul" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

    <!-- preloader css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/preloader.min.css" type="text/css" />
    <!--Daterangepicker -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Custom Css -->
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

    <link href="<?= base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <h1 style="font-size:20pt">Ajax CRUD with Bootstrap modals and Datatables with Image Upload</h1>

        <h3>Person Data</h3>
        <br />
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Photo</th>
                    <th style="width:150px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

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
    <!-- <script src="<?= base_url(); ?>assets/js/app.js"></script> -->

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
        var save_method; //for save method string
        var table;
        var base_url = '<?php echo base_url(); ?>';

        $(document).ready(function() {

            //datatables
            table = $('#table').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('person/ajax_list') ?>",
                    "type": "POST"
                },

                //Set column definition initialisation properties.
                "columnDefs": [{
                        "targets": [-1], //last column
                        "orderable": false, //set not orderable
                    },
                    {
                        "targets": [-2], //2 last column (photo)
                        "orderable": false, //set not orderable
                    },
                ],

            });

            //datepicker
            $('.datepicker').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                todayHighlight: true,
                orientation: "top auto",
                todayBtn: true,
                todayHighlight: true,
            });

            //set input/textarea/select event when change value, remove class error and remove text help block 
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });

        });

        $("#tombol-simpan").click(function() {
            alert('tttt');
        });


        function add_person() {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title

            $('#photo-preview').hide(); // hide photo preview modal

            $('#label-photo').text('Upload Photo'); // label photo upload
        }

        function edit_person(id) {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string


            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('person/ajax_edit') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {

                    $('[name="id"]').val(data.id);
                    $('[name="firstName"]').val(data.firstName);
                    $('[name="lastName"]').val(data.lastName);
                    $('[name="gender"]').val(data.gender);
                    $('[name="address"]').val(data.address);
                    $('[name="dob"]').datepicker('update', data.dob);
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

                    $('#photo-preview').show(); // show photo preview modal

                    if (data.photo) {
                        $('#label-photo').text('Change Photo'); // label photo upload
                        $('#photo-preview div').html('<img src="' + base_url + 'upload/' + data.photo + '" class="img-responsive">'); // show photo
                        $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="' + data.photo + '"/> Remove photo when saving'); // remove photo

                    } else {
                        $('#label-photo').text('Upload Photo'); // label photo upload
                        $('#photo-preview div').text('(No photo)');
                    }


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }

        function reload_table() {
            table.ajax.reload(null, false); //reload datatable ajax 
        }

        function save() {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable 
            var url;

            if (save_method == 'add') {
                url = "<?php echo site_url('sysadmin/ajax_add') ?>";
            } else {
                url = "<?php echo site_url('sysadmin/ajax_update') ?>";
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
                        $('#modal_form').modal('hide');
                        reload_table();

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





        function delete_person(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('person/ajax_delete') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        $('#modal_form').modal('hide');
                        reload_table();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
    </script>

    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Person Form</h3>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">

                        <div class="form-body">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="id_penawaran">id_penawaran</label>
                                    <input type="text" class="form-control" id="id_penawaran" name="id" placeholder="id_penawaran" required>
                                    <div class="invalid-feedback">
                                        Please provide a nama .
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Supplier</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Nama Pemesan" required>
                                    <div class="invalid-feedback">
                                        Please provide a nama .
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Supplier</label>
                                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Pemesan" required>
                                    <div class="invalid-feedback">
                                        Please provide a nama .
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" id="input_keterangan_penawaran">
                                <div class="mb-3">
                                    <label class="form-label" for="keterangan_penawaran">Keterangan </label>
                                    <textarea type="text" class="form-control" id="keterangan_penawaran" name="keterangan_penawaran" placeholder="Masukan Keterangan " rows="1"></textarea>
                                    <div class="invalid-feedback">
                                        Please provide a keterangan_penawaran.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                                <div class="col-md-9">
                                    <input name="gambar" type="file">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="tombol-simpan" name="tombol-simpan" class="btn btn-primary">Save</button>
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->
</body>

</html>