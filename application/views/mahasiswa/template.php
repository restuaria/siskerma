<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Informasi Kerjasama - UNIBI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url() ?>assets/img/logos.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php echo base_url('mahasiswa/dashboard') ?>" class="logo d-flex align-items-center">
                <img src="<?php echo base_url() ?>assets/img/lunibi.png" alt="" style="width: 70px;">
                <span class="d-none d-lg-block"> Siskerma</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <?php
                        $id = $this->session->userdata('user_id');
                        $foto = $this->db->query("SELECT * FROM user WHERE user_id = $id")->result();
                        foreach ($foto as $f) { ?>
                            <img src="<?php echo base_url() . 'assets/img/' . $f->user_foto ?>" alt="Profile" class="rounded-circle">
                        <?php } ?>
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $this->session->userdata('user_nama') ?></span>
                    </a><!-- End Profile Iamge Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $this->session->userdata('user_nama') ?></h6>
                            <span><?php echo $this->session->userdata('user_level') ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('login/logout') ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
            </ul>
        </nav><!-- End Icons Navigation -->
    </header><!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="<?php echo base_url('mahasiswa/dashboard') ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#mydata" data-bs-toggle="collapse" href="#">
                    <i class="ri ri-archive-drawer-line"></i><span>Mydata</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="mydata" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo base_url('mahasiswa/dashboard/mou') ?>">
                            <i class="bi bi-circle"></i><span>MOU</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('mahasiswa/dashboard/moa') ?>">
                            <i class="bi bi-circle"></i><span>MOA</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('mahasiswa/dashboard/ia') ?>">
                            <i class="bi bi-circle"></i><span>IA</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#datalain" data-bs-toggle="collapse" href="#">
                    <i class="ri ri-archive-drawer-line"></i><span>Data Lain</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="datalain" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo base_url('mahasiswa/dashboard/dlmou') ?>">
                            <i class="bi bi-circle"></i><span>MOU</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('mahasiswa/dashboard/dlmoa') ?>">
                            <i class="bi bi-circle"></i><span>MOA</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('mahasiswa/dashboard/dlia') ?>">
                            <i class="bi bi-circle"></i><span>IA</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url('mahasiswa/panduan') ?>">
                    <i class="bi bi-files"></i>
                    <span>Panduan</span>
                </a>
            </li>

        </ul>
    </aside><!-- End Sidebar-->
    <main id="main" class="main">
        <?= $content ?>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Sistem Informasi - UNIBI</span></strong>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url() ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>

</body>

</html>