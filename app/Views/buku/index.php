<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<?php //echo dd($datas); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row my-2">
        <div class="col">
            <h1 class="h3 text-gray-800">Daftar Data Buku</h1>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button"
                class="btn btn-success tombolTambahBuku d-flex justify-content-between align-items-center"
                data-bs-target="#modalTambahBuku">
                <!-- See ave-notes.txt for more explanation! -->
                <span class="me-1"><i class="fa-solid fa-fw fa-circle-plus"></i></span>
                <span>Tambah Data Buku</span>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h6 class="m-1 fw-bold text-uppercase">Tabel Buku</h6>
                </div>
                <div class="card-body">
                    <div class="sectiondatabuku">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="viewModalBuku" style="display: none;"></div>

<script>
    function tableBuku() {
        $.ajax({
            url: "<?= base_url('buku/getData'); ?>",
            dataType: "JSON",
            success: function (response) {
                $('.sectiondatabuku').html(response.data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                var tab = window.open('about:blank', '_blank');
                tab.document.write(xhr.responseText); // where 'html' is a variable containing your HTML
                tab.document.close(); // to finish loading the page
            }
        });
    }

    // Konfigurasi Modal Tambah Buku di index.php (buku)
    $(document).ready(function () {
        tableBuku();
        $('.tombolTambahBuku').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('buku/formtambah'); ?>",
                dataType: "JSON",
                success: function (response) {
                    $('.viewModalBuku').html(response.data).show();
                    $('#modalTambahBuku').modal('show');
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