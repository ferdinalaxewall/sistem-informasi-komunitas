<!-- header-section start -->
<header class="header-section header-menu">
    <nav class="navbar navbar-expand-lg p-0">
        <div class="container">
            <nav class="navbar w-100 navbar-expand-lg justify-content-between">
                <a href="index.html" class="navbar-brand">
                    <img src="<?= base_url('public/landing-page/assets/images/logo.png') ?>" class="logo" alt="logo">
                </a>
                <ul class="navbar-nav feed flex-row gap-xl-20 gap-lg-10 gap-sm-7 gap-1 py-4 py-lg-0 m-lg-auto ms-auto ms-aut align-self-center">
                    <li>
                        <a href="<?= base_url() ?>" class="nav-icon home active"><i class="mat-icon fs-xxl material-symbols-outlined mat-icon">home</i></a>
                    </li>
                    <li>
                        <a href="<?= base_url('forum') ?>" class="nav-icon"><i class="mat-icon fs-xxl material-symbols-outlined mat-icon">group</i></a>
                    </li>
                    <li>
                        <a href="<?= base_url('event') ?>" class="nav-icon"><i class="mat-icon fs-xxl material-symbols-outlined mat-icon">smart_display</i></a>
                    </li>
                </ul>
                <div class="right-area position-relative d-flex gap-3 gap-xxl-6 align-items-center">
                    <div class="single-item d-none d-lg-block profile-area position-relative">
                        <div class="profile-pic d-flex align-items-center">
                            <span class="avatar cmn-head active-status">
                                <img class="avatar-img max-un" src='<?= base_url("public/system/img/profile/{$user->image}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/avatar-1.png') ?>'" alt="avatar" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
                            </span>
                        </div>
                        <div class="main-area p-5 profile-content">
                            <div class="head-area">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="avatar-item">
                                        <img class="avatar-img max-un" src='<?= base_url("public/system/img/profile/{$user->image}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/avatar-1.png') ?>'" alt="avatar" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
                                    </div>
                                    <div class="text-area">
                                        <h6 class="m-0 mb-1"><?= $user?->nama ?></h6>
                                        <p class="mdtxt" style="text-transform: capitalize;"><?= $user?->role ?></p>
                                    </div>
                                </div>
                            </div>
                            <ul class="pt-3">
                                <li>
                                    <a href="<?= base_url('profil') ?>" class="mdtxt">
                                        <i class="material-symbols-outlined mat-icon"> settings </i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('autentikasi/logout') ?>" class="mdtxt">
                                        <i class="material-symbols-outlined mat-icon"> power_settings_new </i>
                                        Sign Out
                                    </a>
                                </li>
                            </ul>
                            <div class="switch-wrapper mt-4 d-flex gap-1 align-items-center">
                                <i class="mat-icon material-symbols-outlined sun icon"> light_mode </i>
                                <label class="switch">
                                    <input type="checkbox" class="checkbox">
                                    <span class="slider"></span>
                                </label>
                                <i class="mat-icon material-symbols-outlined moon icon"> dark_mode </i>
                                <span class="mdtxt ms-2">Dark mode</span>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </nav>
</header>
<!-- header-section end -->
