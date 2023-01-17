<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?= $title; ?>
    </title>
    <!-- Font Awesome Icons v6.2.1 -->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free-6.2.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- CSS from Template -->
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" />
    <!-- DataTable Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendor/datatables/datatables.min.css">
    <!-- Aveneraa's Style -->
    <link href="<?= base_url(); ?>/css/ave-style.css" rel="stylesheet">
    <!-- Jquery Default File -->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <!-- TopBar -->
    <?= $this->include('templates/topbar'); ?>
    <!-- End of TopBar -->

    <div id="layoutSidenav">
        <!-- Sidebar -->
        <?= $this->include('templates/sidebar'); ?>
        <!-- End of SideBar -->

        <!-- Content Wrapper -->
        <div id="layoutSidenav_content">

            <!-- Main Content -->
            <?= $this->renderSection('page-content'); ?>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('templates/footer') ?>
            <!-- End of Footer -->
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- JS from Template -->
    <script src="<?= base_url(); ?>/js/core/scripts.js"></script>
    <!-- Sweet Alert Javascript and JQuery (include CSS) -->
    <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>

    <!-- JQuery Datatable -->
    <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <!-- JS DataTable -->
    <script src="<?= base_url(); ?>/vendor/datatables/datatables.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
    <!-- <script src="js/datatables-simple-demo.js"></script> -->
</body>

</html>