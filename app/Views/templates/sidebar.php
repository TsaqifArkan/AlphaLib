<?php
function url($needle)
{
    return (substr(uri_string(), 0, strlen($needle)) === $needle ? 'active' : '');
}
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Admin Page</div>
                <a class="nav-link <?=(substr(uri_string(), 0, strlen('admin')) === 'admin' || uri_string() === '/' ? 'active' : '') ?>"
                    href="<?= base_url('admin'); ?>">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-user"></i></div>
                    Profil Admin
                </a>
                <div class="sb-sidenav-menu-heading">Database</div>
                <a class="nav-link <?= url('buku'); ?>" href="<?= base_url('buku'); ?>">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-book-open"></i></div>
                    Buku
                </a>
                <a class="nav-link <?= url('klasifikasi'); ?>" href="<?= base_url('klasifikasi'); ?>">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-rectangle-list"></i></div>
                    Klasifikasi
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?= session('admin_session.uname'); ?>
        </div>
    </nav>
</div>