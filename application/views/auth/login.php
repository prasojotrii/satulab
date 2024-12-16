<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="QC Sido Muncul" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

    <!-- preloader css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- <body data-layout="horizontal"> -->
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">

                                <div class="auth-content my-auto">
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="<?= base_url(); ?>" class="d-block auth-logo">
                                            <img src="<?= base_url(); ?>assets/images/logopendek.png" alt="" height="50">
                                            <h1>Sido Muncul</h1>
                                            <h5>Sistem Informasi Satu Lab</h5>
                                            <hr>
                                            </span>
                                        </a>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>

                                    <form class="custom-form mt-4 pt-2" method="post" action="<?= base_url('auth/index'); ?>">
                                        <div class="mb-3" style="display: none;">
                                            <label class="form-label">apps_name</label>
                                            <input type="text" class="form-control" name="apps_name" id="apps_name" placeholder="Masukan Perner" value="SM-Workspace">

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pernr</label>
                                            <input type="text" class="form-control" name="pernr" id="pernr" placeholder="Masukan Perner" value="<?= $this->session->flashdata('pernr') ?>">
                                            <?= form_error('pernr', '<small class="text-danger pl-3" >', '</small>'); ?>
                                        </div>


                                        <div class="mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Password</label>
                                                </div>

                                            </div>

                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Masukan password" aria-label="Password" aria-describedby="password-addon" id="password" name="password">
                                                <button class="btn btn-light ms-0" type="button" id="password-addon" name="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>

                                            <?= form_error('password', '<small class="text-danger pl-3" >', '</small>'); ?>
                                        </div>
                                        <!-- <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                        </div> -->
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Login</button>
                                        </div>
                                    </form>


                                    <div class="mt-5 text-center">
                                        <p class="text-muted mb-0">Jika ada kendala, <br><a class="text-primary fw-semibold"> Silahkan menghubungi IT ( 429 ) </a> </p>
                                    </div>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <!-- <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Labsm System . Made with <i class="mdi mdi-heart text-danger"></i> by IT SM</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->
                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class=" bg-primary"></div>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- end bubble effect -->

                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>


    <!-- JAVASCRIPT -->
    <script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="<?= base_url(); ?>assets/libs/pace-js/pace.min.js"></script>
    <!-- password addon init -->
    <script src="<?= base_url(); ?>assets/js/pages/pass-addon.init.js"></script>

</body>

</html>