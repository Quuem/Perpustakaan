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
    <link rel="icon" href="<?= base_url('Assets/dist/img/LABOR.png') ?>">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?= base_url('Assets') ?>/dist/css/tabler.css?1744816591" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PLUGINS STYLES -->
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-flags.css?1744816591" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-socials.css?1744816591" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-payments.css?1744816591" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-vendors.css?1744816591" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-marketing.css?1744816591" rel="stylesheet" />
    <link href="<?= base_url('Assets') ?>/dist/css/tabler-themes.css?1744816591" rel="stylesheet" />
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN DEMO STYLES -->
    <link href="<?= base_url('Assets') ?>/preview/css/demo.css?1744816591" rel="stylesheet" />
    <!-- END DEMO STYLES -->
    <!-- BEGIN CUSTOM FONT -->
    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
    <!-- END CUSTOM FONT -->
</head>

<body>
    <!-- BEGIN GLOBAL THEME SCRIPT -->
    <script src="<?= base_url('Assets') ?>/dist/js/tabler-theme.min.js?1744816591"></script>
    <!-- END GLOBAL THEME SCRIPT -->
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <!-- BEGIN NAVBAR LOGO --><a href="." style="font-size: 25px;"
                    class="navbar-brand navbar-brand-autodark">
                    Perpustakaan Digital M. Zein
                </a><!-- END NAVBAR LOGO -->
            </div>


            <!-- Alert -->

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="alert-icon">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/alert-circle -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon alert-icon icon-2">
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                            <path d="M12 8v4" />
                            <path d="M12 16h.01" />
                        </svg>
                    </div>
                    <?= $this->session->flashdata('error'); ?>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            <?php endif; ?>



            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Siliahkan Login</h2>
                    <form action="<?= base_url('Auth/loginUser') ?>" method="post" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Email Atau Username</label>
                            <input type="text" name="EmailUsername" autocomplete="off"
                                value="<?= set_value('EmailUsername') ?>" class="form-control"
                                placeholder="Email Atau Username">
                            <?= form_error('EmailUsername', '<small class= "text-danger">', '</small>') ?>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" name="password" id="password-input"
                                    placeholder="Password" autocomplete="off" />
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" data-bs-toggle="tooltip" id="toggle-password">
                                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <!-- JavaScript to toggle visibility -->


                        <div class="mb-2">
                            <label class="form-check">
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- <div class="text-center text-secondary mt-3">Belum Punya Akun ? <a href="<?= base_url('Auth/Register') ?>"
                    tabindex="-1">Register</a></div> -->
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('Assets') ?>/dist/js/tabler.min.js?1744816591" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <script src="<?= base_url('Assets') ?>/preview/js/demo.min.js?1744816591" defer></script>
    <!-- END DEMO SCRIPTS -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggle = document.getElementById("toggle-password");
            const passwordInput = document.getElementById("password-input");
            const eyeIcon = document.getElementById("eye-icon");

            const eyeOpen = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icon-tabler-eye">
                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
            </svg>`;

            const eyeOff = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icon-tabler-eye-off">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                <path
                    d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                <path d="M3 3l18 18" />
            </svg>`;

            toggle.addEventListener("click", function (e) {
                e.preventDefault();
                const isPassword = passwordInput.getAttribute("type") === "password";
                passwordInput.setAttribute("type", isPassword ? "text" : "password");
                eyeIcon.innerHTML = isPassword ? eyeOff : eyeOpen;
            });
        });
    </script>
</body>

</html>