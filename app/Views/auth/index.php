<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        AlphaLib | Login
    </title>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons v6.2.1 -->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free-6.2.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- CSS from Template -->
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" />
    <!-- Aveneraa's Style -->
    <link href="<?= base_url(); ?>/css/ave-style.css" rel="stylesheet">
    <!-- CSS from Argon-Dashboard -->
    <link id="pagestyle" href="<?= base_url(); ?>/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="login-bg-ave">
    <!-- Content -->
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 rounded-3" style="background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Selamat Datang di AlphaLib!</h1>
                        <p class="text-lead text-white mb-0">Perpustakaan SDN 01 Tlogosari, Giritontro, Wonogiri</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4 pb-2">
                            <h4 class="mb-4">Login</h4>
                            <div class="row">
                                <div class="col text-center fs-6">
                                    <marquee>Silahkan masukkan username dan password Anda</marquee>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-2">
                            <?php if (session('errors.login')): ?>
                                <div class="alert alert-danger text-white" style="font-size: small;" role="alert">
                                    <?= session('errors.login') ?>
                                </div>
                            <?php endif; ?>
                            <form action="<?= base_url('auth/attemptlogin'); ?>" method="post" class="admin">
                                <div class="form-floating mb-3">
                                    <input
                                        class="form-control <?php if (session('errors.username')): ?>is-invalid<?php endif; ?>"
                                        id="username" name="username" type="text" placeholder="Username">
                                    <label for="username" class="fw-normal">Username</label>
                                    <div class="invalid-feedback">
                                        <?= session('errors.username'); ?>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input
                                        class="form-control <?php if (session('errors.password')): ?>is-invalid<?php endif; ?>"
                                        id="password" name="password" type="password" placeholder="Password"
                                        autocomplete>
                                    <label for="inputPassword" class="fw-normal">Password</label>
                                    <div class="invalid-feedback">
                                        <?= session('errors.password'); ?>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-2 mb-2">Login</button>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of Content -->
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <?= $this->include('auth/footer'); ?>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!-- Core JS Files -->
    <script src="<?= base_url(); ?>/js/core/popper.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script> -->
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url(); ?>/js/argon-dashboard.js"></script>
</body>

</html>