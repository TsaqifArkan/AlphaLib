<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row my-2">
        <div class="col">
            <div class="card mb-3 shadow">
                <div class="card-header py-3">
                    <h6 class="m-1 fw-bold text-uppercase">Detail Buku</h6>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Nomor Inventaris
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['noinvent']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Judul Buku
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['judul']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                ISBN
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['isbn']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Klasifikasi Keilmuan
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['idklas']) ? ('(' . esc($klas['noklas']) . ') - ' . esc($klas['nama'])) : ' - ' ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Pengarang
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['pengarang']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Penerbit
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['penerbit']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Tempat Terbit
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['tempatterbit']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Jumlah Halaman
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['jmlhal']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Tahun Terbit
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['thnterbit']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Jumlah Eksemplar
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['jmleksemplar']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col fw-bold text-center">
                                Edisi Cetakan
                            </div>
                            <div class="col-1 fw-bold text-center">
                                :
                            </div>
                            <div class="col m-auto">
                                <?= esc($buku['edisicetak']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col text-center">
                                <a href="<?= base_url('buku'); ?>" class="btn btn-dark fw-bold">
                                    <i class="fa-solid fa-fw fa-arrow-left"></i> Kembali ke Daftar Buku</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>