<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="row my-3 mx-1">
    <div class="col pb-0">
        <div class="alert alert-breadcrumb-ave mb-0" role="alert">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-6">
                    <li class="breadcrumb-item"><a class="a-bread-ave" href="<?= base_url('klasifikasi'); ?>">Klasifikasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row my-2">
        <div class="col">
            <h1 class="h3 text-gray-800">Daftar Buku - Klasifikasi (<?= esc($klas['noklas']); ?>)
                <?= esc($klas['nama']); ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h6 class="m-1 fw-bold text-uppercase">Tabel Buku</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable-detailKlas">
                            <thead class="ave-bg-th">
                                <tr>
                                    <th class="text-uppercase fw-bold head-no">No</th>
                                    <th class="text-uppercase fw-bold">Judul Buku</th>
                                    <th class="text-uppercase fw-bold">ISBN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datas as $i => $data): ?>
                                    <tr>
                                        <td><?= $i + 1; ?></td>
                                        <td><?= esc($data['judul']); ?></td>
                                        <td><?= esc($data['isbn']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#dataTable-detailKlas').DataTable({
            "pageLength": 25,
            "columnDefs": [
                {
                    targets: "_all",
                    className: 'dt-head-center'
                },
                {
                    targets: [0],
                    // targets: "_all",
                    className: 'dt-body-center'
                }
            ]
        });
    });
</script>

<?= $this->endSection(); ?>