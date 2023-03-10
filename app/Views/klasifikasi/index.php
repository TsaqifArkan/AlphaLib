<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?php //echo dd($datas); ?>

<div class="row my-3 mx-1">
    <div class="col pb-0">
        <div class="alert alert-breadcrumb-ave mb-0" role="alert">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-6">
                    <li class="breadcrumb-item active" aria-current="page">Klasifikasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row my-2">
        <div class="col">
            <h1 class="h3 text-gray-800">Daftar Klasifikasi Keilmuan</h1>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button"
                class="btn btn-success tombolTambahKlasifikasi d-flex justify-content-between align-items-center"
                data-bs-target="#modalTambahKlasifikasi">
                <span class="me-1"><i class="fa-solid fa-fw fa-circle-plus"></i></span>
                <span>Tambah Data Klasifikasi</span>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h6 class="m-1 fw-bold text-uppercase">Tabel Klasifikasi</h6>
                </div>
                <div class="card-body">
                    <div class="sectiondataklasifikasi">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="viewModalKlasifikasi" style="display: none;"></div>

<script>
    function tableKlasifikasi() {
        $.ajax({
            url: "<?= base_url('klasifikasi/getData'); ?>",
            dataType: "JSON",
            success: function (response) {
                $('.sectiondataklasifikasi').html(response.data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                var tab = window.open('about:blank', '_blank');
                tab.document.write(xhr.responseText); // where 'html' is a variable containing your HTML
                tab.document.close(); // to finish loading the page
            }
        });
    }

    // Konfigurasi Modal Tambah Klasifikasi di index.php (klasifikasi)
    $(document).ready(function () {
        tableKlasifikasi();
        $('.tombolTambahKlasifikasi').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('klasifikasi/formtambah'); ?>",
                dataType: "JSON",
                success: function (response) {
                    $('.viewModalKlasifikasi').html(response.data).show();
                    $('#modalTambahKlasifikasi').modal('show');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    var tab = window.open('about:blank', '_blank');
                    tab.document.write(xhr.responseText); // where 'html' is a variable containing your HTML
                    tab.document.close(); // to finish loading the page
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>