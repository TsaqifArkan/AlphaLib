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
                <div class="sb-sidenav-menu-heading">Database</div>
                <a class="nav-link <?= url('buku'); ?>" href="<?= base_url('buku'); ?>">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-book-open"></i></div>
                    Buku
                </a>
                <a class="nav-link <?= url('kategori'); ?>" href="<?= base_url('kategori'); ?>">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-book-open"></i></div>
                    Kategori
                </a>
                <a class="nav-link" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                    Blank Document
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin
        </div>
    </nav>
</div>