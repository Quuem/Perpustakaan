<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.2.0
* @link https://tabler.io
* Copyright 2018-2025 The Tabler Authors
* Copyright 2018-2025 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Perpustakaan Digital M. Zein</title>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?= base_url('Assets') ?>/libs/jsvectormap/dist/jsvectormap.css?1744816593" rel="stylesheet" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?= base_url('Assets') ?>/dist/css/tabler.css?1744816593" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="icon" href="<?= base_url('Assets/dist/img/LABOR.png') ?>">

    <!-- BEGIN PLUGINS STYLES -->
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-flags.css?1744816593" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-socials.css?1744816593" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-payments.css?1744816593" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-vendors.css?1744816593" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-marketing.css?1744816593" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-themes.css?1744816593" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN DEMO STYLES -->
    <link href="<?= base_url('Assets') ?>/preview/css/demo.css?1744816593" rel="stylesheet" />
    <!-- END DEMO STYLES -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>

    <!-- BEGIN CUSTOM FONT -->
    <style>
        @import url("https://rsms.me/inter/inter.css");

        tbody {
            counter-reset: nomor;
        }

        td.nomor::before {
            counter-increment: nomor;
            content: counter(nomor);
        }
    </style>

    <!-- END CUSTOM FONT -->
</head>

<body>
    <!-- BEGIN GLOBAL THEME SCRIPT -->
    <script src="<?= base_url('Assets') ?>/dist/js/tabler-theme.min.js?1744816593"></script>
    <!-- END GLOBAL THEME SCRIPT -->
    <div class="page">
        <!--  BEGIN SIDEBAR  -->
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <!-- BEGIN NAVBAR TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- END NAVBAR TOGGLER -->
                <!-- BEGIN NAVBAR LOGO -->
                <div class="d-flex align-items-center ">
                    <!-- Logo di kiri -->
                    <div class="navbar-brand navbar-brand-autodark mb-0">
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url('Assets/dist/img/Labor.png') ?>" alt="Logo" style="height: 75px;">
                        </a>
                    </div>

                    <!-- Teks di kanan logo -->
                    <div class="d-flex flex-column">
                        <span class="nav-link-title">Selamat Datang</span>
                        <span class="nav-link-title">
                            <?= $this->session->userdata('nama_lengkap'); ?>
                        </span>
                    </div>
                </div>



                <!-- END NAVBAR LOGO -->
                <div class="navbar-nav flex-row d-lg-none">

                    <div class="d-none d-lg-flex">
                        <div class="nav-item">
                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/moon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-1">
                                    <path
                                        d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/sun -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-1">
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path
                                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </a>
                        </div>
                        <div class="nav-item dropdown d-none d-md-flex">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show notifications" data-bs-auto-close="outside" aria-expanded="false">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-1">
                                    <path
                                        d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                </svg>
                                <span class="badge bg-red"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h3 class="card-title">Notifications</h3>
                                        <div class="btn-close ms-auto" data-bs-dismiss="dropdown"></div>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-red d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 1</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Change
                                                        deprecated html tags to text decoration classes (#29604)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 2</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">
                                                        justify-content:between ⇒ justify-content:space-between (#29734)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions show">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="icon text-yellow icon-2">
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 3</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Update
                                                        change-version.js (#29736)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-green d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 4</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Regenerate
                                                        package-lock.json (#29730)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="btn btn-2 w-100"> Archive all </a>
                                            </div>
                                            <div class="col">
                                                <a href="#" class="btn btn-2 w-100"> Mark all as read </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show app menu" data-bs-auto-close="outside" aria-expanded="false">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/apps -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-1">
                                    <path
                                        d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    <path
                                        d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    <path
                                        d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    <path d="M14 7l6 0" />
                                    <path d="M17 4l0 6" />
                                </svg>
                            </a>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(<?= base_url('Assets') ?>/static/avatars/000m.jpg)">
                            </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>
                                    <?=
                                        $this->session->userdata('nama_lengkap');
                                    ?>
                                </div>
                                <div class="mt-1 small text-secondary">
                                    <?=
                                        $this->session->userdata('nama_role');
                                    ?>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <!-- <a href="#" class="dropdown-item">Status</a> -->
                            <?php
                            if (
                                $this->session->userdata('nama_role') == "Admin"
                            ) {
                                ?>
                                <a href="<?= base_url('Users') ?>" class="dropdown-item">Data Users</a>
                                <?php
                            }
                            ?>
                            <!-- <a href="<?= base_url('Assets') ?>/profile.html" class="dropdown-item">Profile</a> -->
                            <!-- <a href="#" class="dropdown-item">Feedback</a> -->
                            <div class="dropdown-divider"></div>
                            <!-- <a href="<?= base_url('Assets') ?>/settings.html" class="dropdown-item">Settings</a> -->
                            <a href="<?= base_url('Assets') ?>/sign-in.html" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>



                <!--  -->
                <!-- SIDEBAR  -->
                <!--  -->

                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <!-- BEGIN NAVBAR MENU -->
                    <ul class="navbar-nav ">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="icon icon-1">
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                    </svg></span>
                                <span class="nav-link-title"> Home </span>
                            </a>
                        </li> -->



                        <li class="nav-item <?= $this->uri->segment(1) == 'KM_Pelatihan' ? 'active' : ''
                            ?>">
                            <a class="nav-link" href="<?= base_url('KM_Pelatihan') ?>">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-target-arrow">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M12 7a5 5 0 1 0 5 5" />
                                        <path d="M13 3.055a9 9 0 1 0 7.941 7.945" />
                                        <path d="M15 6v3h3l3 -3h-3v-3z" />
                                        <path d="M15 9l-3 3" />
                                    </svg></span>
                                <span class="nav-link-title"> KM Pelatihan </span>
                            </a>
                        </li>

                        <li class="nav-item <?= $this->uri->segment(1) == 'KM_Pengetahuan' ? 'active' : ''
                            ?>">
                            <a class="nav-link" href="<?= base_url('KM_Pengetahuan') ?>">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                    </svg></span>


                                <span class="nav-link-title"> KM Pengetahuan </span>
                            </a>
                        </li>

                        <li class="nav-item <?= $this->uri->segment(1) == 'KM_Berita' ? 'active' : ''
                            ?>">
                            <a class="nav-link" href="<?= base_url('KM_Berita') ?>">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-ad-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M11.933 5h-6.933v16h13v-8" />
                                        <path d="M14 17h-5" />
                                        <path d="M9 13h5v-4h-5z" />
                                        <path d="M15 5v-2" />
                                        <path d="M18 6l2 -2" />
                                        <path d="M19 9h2" />
                                    </svg></span>


                                <span class="nav-link-title"> KM Berita </span>
                            </a>
                        </li>

                        <li class="nav-item dropdown  <?= $this->uri->segment(1) == 'Forum' ? 'active' : '' ?>">
                            <a class="nav-link  dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-library">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                        <path
                                            d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                                        <path d="M11 7h5" />
                                        <path d="M11 10h6" />
                                        <path d="M11 13h3" />
                                    </svg></span>
                                <span class="nav-link-title"> Forum </span>
                            </a>
                            <div class="dropdown-menu <?= $this->uri->segment(1) == 'Forum' ? 'show' : ''
                                ?>">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">


                                        <?php
                                        if ($this->session->userdata('nama_role') == "Admin" || $this->session->userdata('nama_role') == "Pustakawan") {
                                            ?>
                                            <a class="dropdown-item <?= $this->uri->segment(2) == 'Komunitas' ? 'active' : ''
                                                ?>" href="<?= base_url('Forum/Komunitas') ?>">
                                                Komunitas </a>
                                        <?php } ?>

                                        <a class="dropdown-item  <?= $this->uri->segment(2) == 'Threads' ? 'active' : ''
                                            ?>" href="<?= base_url('Forum/Threads/Page/') ?>"> Threads </a>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <?php
                        if ($this->session->userdata('nama_role') == "Admin" || $this->session->userdata('nama_role') == "Pustakawan") {
                            ?>
                            <li class="nav-item dropdown  <?= $this->uri->segment(1) == 'KM_Akreditasi' ? 'active' : '' ?>">
                                <a class="nav-link  dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                                    data-bs-auto-close="false" role="button" aria-expanded="false">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="icon icon-1">
                                            <path
                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                        </svg></span>
                                    <span class="nav-link-title"> KM Akreditasi </span>
                                </a>
                                <div class="dropdown-menu <?= $this->uri->segment(1) == 'KM_Akreditasi' ? 'show' : ''
                                    ?>">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item <?= $this->uri->segment(2) == 'Komponen_Kelola' ? 'active' : ''
                                                ?>" href="<?= base_url('KM_Akreditasi/Komponen_Kelola') ?>">
                                                Komponen Kelola </a>
                                            <a class="dropdown-item  <?= $this->uri->segment(2) == 'Sarana_Dan_Prasarana' ? 'active' : ''
                                                // ?>" href="<?= base_url('KM_Akreditasi/Sarana_Dan_Prasarana') ?>">
                                                Sarana Dan
                                                Prasarana </a>
                                            <a class="dropdown-item <?= $this->uri->segment(2) == 'Pelayanan' ? 'active' : ''
                                                ?>" href="<?= base_url('KM_Akreditasi/Pelayanan') ?>">
                                                Pelayanan</a>
                                            <a class="dropdown-item <?= $this->uri->segment(2) == 'Tenaga' ? 'active' : ''
                                                ?>" href="<?= base_url('KM_Akreditasi/Tenaga') ?>"> Tenaga
                                            </a>
                                            <div class="dropend">
                                                <a class="dropdown-item dropdown-toggle <?= $this->uri->segment(2) == 'Penyelenggara' ? 'active' : ''
                                                    ?> " href="<?= base_url('') ?>" data-bs-toggle="dropdown"
                                                    data-bs-auto-close="false" role="button" aria-expanded="false">
                                                    Penyelenggara </a>
                                                <div class="dropdown-menu <?= $this->uri->segment(2) == 'Penyelenggara' ? 'show' : ''
                                                    ?> ">
                                                    <div class="dropend">
                                                        <a class="dropdown-item  dropdown-toggle <?= $this->uri->segment(3) == 'Pendirian_Perpustakaan' ? 'active' : ''
                                                            ?>" href="#" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                                            Pendirian Perpustakaan
                                                        </a>
                                                        <div class="dropdown-menu <?= $this->uri->segment(3) == 'Pendirian_Perpustakaan' ? 'show' : ''
                                                            ?>  ">
                                                            <a class="dropdown-item <?= $this->uri->segment(4) == 'Pendirian' ? 'active' : ''
                                                                ?>"
                                                                href="<?= base_url('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pendirian') ?>">
                                                                Pendirian </a>
                                                            </a>
                                                            <a class="dropdown-item <?= $this->uri->segment(4) == 'Pencantuman_NPP' ? 'active' : ''
                                                                ?> "
                                                                href="<?= base_url('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP') ?>">
                                                                Pencantuman NPP</a>
                                                        </div>
                                                    </div>

                                                    <a class="dropdown-item <?= $this->uri->segment(3) == 'Struktur_Organisasi' ? 'active' : ''
                                                        ?>"
                                                        href="<?= base_url('KM_Akreditasi/Penyelenggara/Struktur_Organisasi') ?>">
                                                        Struktur
                                                        Organisasi </a>
                                                    <a class="dropdown-item <?= $this->uri->segment(3) == 'Program_Perpustakaan' ? 'active' : '' ?>"
                                                        href="<?= base_url('KM_Akreditasi/Penyelenggara/Program_Perpustakaan') ?>">
                                                        Program Perpustakaan </a>
                                                </div>
                                            </div>


                                            <a class="dropdown-item <?= $this->uri->segment(2) == 'Pengelolaan' ? 'active' : ''
                                                ?> " href="<?= base_url('KM_Akreditasi/Pengelolaan') ?>"> Pengelolaan
                                            </a>
                                            <a class="dropdown-item <?= $this->uri->segment(2) == 'Inovasi_Dan_Kreativitas' ? 'active' : ''
                                                ?>" href="<?= base_url('KM_Akreditasi/Inovasi_Dan_Kreativitas') ?>">
                                                Inovasi Dan Kreativitas
                                            </a>
                                            <a title="Indeks Pembangunan Literasi Sekolah" class="dropdown-item text-truncate <?= $this->uri->segment(2) == 'Tingkat_Kegemaran_Membaca' ? 'active' : ''
                                                ?>" href="<?= base_url('KM_Akreditasi/Tingkat_Kegemaran_Membaca') ?>">
                                                Tingkat Kegemaran Membaca
                                            </a>
                                            <a data-toggle="tooltip" title="Indeks Pembangunan Literasi Sekolah" class="dropdown-item text-truncate <?= $this->uri->segment(2) == 'Indeks_Pembangunan_Literasi_Sekolah' ? 'active' : ''
                                                ?>"
                                                href="<?= base_url('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah') ?>">
                                                Indeks Pembangunan Literasi Sekolah
                                            </a>

                                            <?php
                                            if ($this->session->userdata('nama_role') == "Admin" || $this->session->userdata('nama_role') == "Pustakawan") {
                                                ?>
                                                <a class="dropdown-item <?= $this->uri->segment(2) == 'Kategori' ? 'active' : ''
                                                    ?>" href="<?= base_url('Forum/Kategori') ?>">
                                                    Kategori </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>


                        <li class="nav-item <?= $this->uri->segment(1) == 'Faq' ? 'active' : ''
                            ?>">
                            <a class="nav-link" href="<?= base_url('Faq') ?>">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-bubble-text">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 10h10" />
                                        <path d="M9 14h5" />
                                        <path
                                            d="M12.4 3a5.34 5.34 0 0 1 4.906 3.239a5.333 5.333 0 0 1 -1.195 10.6a4.26 4.26 0 0 1 -5.28 1.863l-3.831 2.298v-3.134a2.668 2.668 0 0 1 -1.795 -3.773a4.8 4.8 0 0 1 2.908 -8.933a5.33 5.33 0 0 1 4.287 -2.16" />
                                    </svg></span>


                                <span class="nav-link-title"> Faq </span>
                            </a>
                        </li>
                    </ul>
                    <!-- END NAVBAR MENU -->
                </div>







            </div>
        </aside>
        <!--  END SIDEBAR  -->
        <!-- BEGIN NAVBAR  -->
        <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
            <div class="container-xl">
                <!-- BEGIN NAVBAR TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- END NAVBAR TOGGLER -->
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex">
                        <div class="nav-item">
                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-1">
                                    <path
                                        d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-1">
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path
                                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </a>
                        </div>


                        <!-- <div class="nav-item dropdown d-none d-md-flex">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show notifications" data-bs-auto-close="outside" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-1">
                                    <path
                                        d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                </svg>
                                <span class="badge bg-red"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h3 class="card-title">Notifications</h3>
                                        <div class="btn-close ms-auto" data-bs-dismiss="dropdown"></div>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-red d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 1</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Change
                                                        deprecated html tags to text decoration classes (#29604)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 2</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">
                                                        justify-content:between ⇒ justify-content:space-between (#29734)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions show">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="icon text-yellow icon-2">
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 3</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Update
                                                        change-version.js (#29736)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-green d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 4</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Regenerate
                                                        package-lock.json (#29730)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="btn btn-2 w-100"> Archive all </a>
                                            </div>
                                            <div class="col">
                                                <a href="#" class="btn btn-2 w-100"> Mark all as read </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->



                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(<?= base_url('Assets') ?>/static/avatars/000m.jpg)">
                            </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>
                                    <?=
                                        $this->session->userdata('nama_lengkap');
                                    ?>
                                </div>
                                <div class="mt-1 small text-secondary">
                                    <?=
                                        $this->session->userdata('nama_role');
                                    ?>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <!-- <a href="#" class="dropdown-item">Status</a> -->
                            <?php
                            if (
                                $this->session->userdata('nama_role') == "Admin"
                            ) {
                                ?>
                                <a href="<?= base_url('Users') ?>" class="dropdown-item">Data Users</a>
                                <?php
                            }
                            ?>
                            <!-- <a href="#" class="dropdown-item">Feedback</a> -->
                            <div class="dropdown-divider"></div>
                            <!-- <a href="<?= base_url('Assets') ?>/settings.html" class="dropdown-item">Settings</a> -->
                            <a href="<?= base_url('Dashboard/Logout') ?>" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <!-- BEGIN NAVBAR MENU -->
                    <div onclick="window.location.href='<?= base_url('') ?>'" style="font-size: 25px;"
                        class="fw-bold text-decoration-none ">
                        Perpustakaan Digital M. Zein
                    </div>
                    <!-- END NAVBAR MENU -->
                </div>
            </div>
        </header>
        <!-- END NAVBAR  -->
        <div class="page-wrapper">