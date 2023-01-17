<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- FLASH DATA -->
<!-- <div class="flash-data" data-flashdata="<?php // echo session()->getFlashdata('pesan'); ?>"></div> -->

<div class="container-fluid">

    <div class="row my-2">
        <div class="col">
            <div class="p-5 mb-4 rounded-3 bg-jumbotron-ave">
                <div class="container-fluid py-5">
                    <h1 class="display-5 text-center">Assalamu'alaikum. Selamat <?= $greet; ?>, <?= esc($admindata['username']); ?> !</h1>
                    <hr class="my-4">
                    <div class="row justify-content-center">
                        <div class="card mb-3 shadow" style="width: 50%;">
                            <div class="row no-gutters">
                                <div class="col p-0">
                                    <div class="usr-card">
                                        <!-- <div class="usr-display-picture">
                                        <img src="" alt="" class="img-thumbnail">
                                    </div> -->
                                        <div class="usr-banner"><img src="<?= base_url('img/curved5-small.jpg'); ?>"
                                                alt="">
                                        </div>
                                        <div class="usr-content">
                                            <div class="row" style="font-size: large;">
                                                <div class="col-5 text-center">
                                                    Username
                                                </div>
                                                <div class="col-7 fw-bold text-center">
                                                    <?= esc($admindata['username']); ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row" style="font-size: large;">
                                                <div class="col-5 text-center">
                                                    Fullname
                                                </div>
                                                <div class="col-7 fw-bold text-center">
                                                    <?= esc($admindata['namalengkap']) ? esc($admindata['namalengkap']) : '-'; ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row" style="font-size: large;">
                                                <div class="col-5 text-center">
                                                    Email Address
                                                </div>
                                                <div class="col-7 fw-bold text-center">
                                                    <?= esc($admindata['email']) ? esc($admindata['email']) : '-'; ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col text-center">
                                                    <a href="<?= base_url('user/editprofile/'); ?>"
                                                        class="btn btn-warning">Edit Profile</a>
                                                    <a href="<?= base_url('user/password/'); ?>"
                                                        class="btn btn-secondary">Ubah Password</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>