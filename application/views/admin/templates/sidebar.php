<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo justify-content-center mb-3">
        <a href="<?= base_url() ?>" class="app-brand-link">
            <img src="<?= base_url("public/system/img/logo/small-logo-tda.png") ?>" alt="TDA Logo" height="55">
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <!-- Apps -->

        <li class="menu-item <?= set_active('dashboard') ?>">
            <a
            href="<?= base_url('admin/dashboard') ?>"
            class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid-alt"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Users -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Users</span></li>

        <!-- Administrator -->
        <li class="menu-item <?= set_active('administrator') ?>">
            <a
            href="<?= base_url('admin/administrator') ?>"
            class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Administrator">Administrator</div>
            </a>
        </li>

        <!-- Pengguna -->
        <li class="menu-item <?= set_active('pengguna') ?>">
            <a
            href="<?= base_url('admin/pengguna') ?>"
            class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Pengguna">Pengguna</div>
            </a>
        </li>

        <!-- Forum Diskusi -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Forum Diskusi</span></li>

        <!-- Kategori Forum -->
        <li class="menu-item <?= set_active('kategori_forum') ?>">
            <a
            href="<?= base_url('admin/kategori_forum') ?>"
            class="menu-link">
                <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                <div data-i18n="Kategori Forum">Kategori Forum</div>
            </a>
        </li>

        <!-- Forum -->
        <li class="menu-item <?= set_active('forum') ?>">
            <a
            href="<?= base_url('admin/forum') ?>"
            class="menu-link">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div data-i18n="Forum">Forum</div>
            </a>
        </li>

        <!-- Event -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Event</span></li>

        <!-- Kategori Event -->
        <li class="menu-item <?= set_active('kategori_event') ?>">
            <a
            href="<?= base_url('admin/kategori_event') ?>"
            class="menu-link">
                <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                <div data-i18n="Kategori Event">Kategori Event</div>
            </a>
        </li>

        <!-- Event -->
        <li class="menu-item <?= set_active('event') ?>">
            <a
            href="<?= base_url('admin/event') ?>"
            class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div data-i18n="Event">Event</div>
            </a>
        </li>

        <!-- Event -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>

        <!-- Laporan Forum -->
        <li class="menu-item <?= set_active('forum', 3) ?>">
            <a
            href="<?= base_url('admin/laporan/forum') ?>"
            class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Laporan Forum">Laporan Forum</div>
            </a>
        </li>

        <!-- Laporan Event -->
        <li class="menu-item <?= set_active('event', 3) ?>">
            <a
            href="<?= base_url('admin/laporan/event') ?>"
            class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Laporan Event">Laporan Event</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->


<!-- Layout container -->
<div class="layout-page">