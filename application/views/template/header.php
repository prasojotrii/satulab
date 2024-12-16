<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?= $title ?></title>
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
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


    <style type="text/css">
        div .dt-buttons {
            float: left;
        }

        .ui-autocomplete {
            position: fixed;
            background-color: #ffffff;
        }


        .ui-front {
            z-index: 9999999 !important;
        }

        .modal.fade {
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-backdrop.fade {
            opacity: 0;
        }

        .dataTables_length {
            float: right;
        }

        .ui-front {
            z-index: 9999999 !important;
        }

        #filter_bahan {
            width: 350px;
            /* Sesuaikan lebar sesuai kebutuhan */
            height: 40px;
            /* Sesuaikan tinggi sesuai kebutuhan */
        }

        .custom-table th,
        .custom-table td {
            border: none;
            /* Menghilangkan border */
            padding: 5px;
            /* Mengatur padding */
        }

        .custom-table th,
        .custom-table td {
            width: 25%;
            /* Mengatur lebar kolom yang sama */
        }
    </style>



</head>

<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="<?= base_url(); ?>dashboard" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logopendek.png" alt="" height="35">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logopendek.png" alt="" height="35"> <img src="<?= base_url(); ?>assets/images/logopanjang.png" alt="" height="35">
                            </span>
                        </a>

                        <a href="<?= base_url(); ?>dashboard" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logopendek.png" alt="" height="35">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logopendek.png" height=" 35"> <img src="<?= base_url(); ?>assets/images/logopanjang.png" alt="" height="35">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3
                            font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>


                </div>

                <div class="d-flex">

                    <!-- <div class="dropdown d-inline-block d-lg-none ms-2">
						<button type="button" class="btn header-item" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i data-feather="search" class="icon-lg"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-lg
                                dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
							<form class="p-3">
								<div class="form-group m-0">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">
										<button class="btn btn-primary" type="submit"><i class="mdi
                                                    mdi-magnify"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div> -->

                    <!-- 
					<div class="dropdown d-none d-sm-inline-block">
						<button type="button" class="btn header-item" id="mode-setting-btn">
							<i data-feather="moon" class="icon-lg
                                    layout-mode-dark"></i>
							<i data-feather="sun" class="icon-lg
                                    layout-mode-light"></i>
						</button>
					</div> -->




                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item
                                right-bar-toggle me-2">
                            <i data-feather="settings" class="icon-lg"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item
                                bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?= base_url(); ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1
                                    fw-medium"><?= $dataSession['name']; ?></span>
                            <i class="mdi mdi-chevron-down d-none
                                    d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="<?php echo base_url('profile') ?>"><i class="mdi
                                        mdi-face-profile font-size-16
                                        align-middle me-1"></i> Profile</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>"><i class="mdi
                                        mdi-logout font-size-16 align-middle
                                        me-1"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" data-key="t-menu">Menu</li>
                        <?php
                        $pernr = $this->session->userdata('pernr');
                        $QueryMenu = "SELECT *
                  FROM `vw_user_access_menu`
                  WHERE `vw_user_access_menu`.`pernr` = '$pernr' 
                  AND `vw_user_access_menu`.`menu_level` = '0'
                  ORDER BY `vw_user_access_menu`.`id_menu_parent` ASC";

                        $MenuUtama = $this->db->query($QueryMenu)->result_array();

                        foreach ($MenuUtama as $m) :
                        ?>
                            <li class="nav-item <?php if ($title == $m['menu_title']) echo 'active'; ?>">
                                <a href="<?= base_url($m['menu_url']); ?>">
                                    <i class="bx <?= base_url($m['menu_icon']); ?>"></i>
                                    <span data-key="t-dashboard"><?= $m['menu_title']; ?></span>
                                </a>

                                <?php
                                $QueryMenu = "SELECT *
                          FROM `vw_user_access_menu`
                          WHERE `vw_user_access_menu`.`pernr` = '$pernr' 
                          AND `vw_user_access_menu`.`menu_level` = '1'
                       
                          ORDER BY `vw_user_access_menu`.`id_menu_parent` ASC";

                                $Menu2 = $this->db->query($QueryMenu)->result_array();

                                foreach ($Menu2 as $mm) :
                                ?>
                            <li class="nav-item <?php if ($title == $mm['menu_title']) echo 'active'; ?>">
                                <a href="javascript:void(0);" class="has-arrow">
                                    <i class="bx <?= base_url($mm['menu_icon']); ?>"></i>
                                    <span data-key="t-dashboard"><?= $mm['menu_title']; ?></span>
                                </a>

                                <?php
                                    $QueryMenu = "SELECT *
                                  FROM `vw_user_access_menu`
                                  WHERE `vw_user_access_menu`.`pernr` = '$pernr' 
                                  AND `vw_user_access_menu`.`menu_level` = '2'
                                  AND `vw_user_access_menu`.`id_menu_parent` = '{$mm['id_menu_parent']}'
                                  AND `vw_user_access_menu`.`view` = '1'
                                  ORDER BY `vw_user_access_menu`.`menu_title` ASC";

                                    $SubMenu1 = $this->db->query($QueryMenu)->result_array();
                                ?>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php foreach ($SubMenu1 as $m) : ?>
                                        <li class="nav-item <?php if ($title == $m['menu_title']) echo 'active'; ?>">
                                            <a class="nav-link" href="<?= base_url($m['menu_url']); ?>">
                                                <span><?= $m['menu_title']; ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>



                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->