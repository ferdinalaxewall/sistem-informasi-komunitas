 <!-- Main Content start -->
 <main class="main-content">
    <div class="container sidebar-toggler">
        <div class="row">
            <!-- Sidebar Content -->
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-6 cus-z2">
                <div class="d-inline-block d-lg-none">
                    <button class="button profile-active mb-4 mb-lg-0 d-flex align-items-center gap-2">
                        <i class="material-symbols-outlined mat-icon"> tune </i>
                        <span>My profile</span>
                    </button>
                </div>
                <div class="profile-sidebar cus-scrollbar p-5">
                    <div class="d-block d-lg-none position-absolute end-0 top-0">
                        <button class="button profile-close">
                            <i class="material-symbols-outlined mat-icon fs-xl"> close </i>
                        </button>
                    </div>
                    <div class="profile-pic d-flex gap-2 align-items-center">
                        <div class="avatar position-relative">
                            <img class="avatar-img max-un" src='<?= base_url("public/system/img/profile/{$user->image}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/avatar-1.png') ?>'" alt="avatar" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
                        </div>
                        <div class="text-area">
                            <h6 class="m-0 mb-1"><?= $user?->nama ?></h6>
                            <p class="mdtxt text-muted" style="text-transform: capitalize;"><?= $user?->role ?></p>
                        </div>
                    </div>
                    <ul class="profile-link mt-7 mb-7 pb-7">
                        <li>
                            <a href="<?= base_url() ?>" class="d-flex gap-4">
                                <i class="material-symbols-outlined mat-icon"> home </i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('event') ?>" class="d-flex gap-4">
                                <i class="material-symbols-outlined mat-icon"> workspace_premium </i>
                                <span>Event</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('forum') ?>" class="d-flex gap-4">
                                <i class="material-symbols-outlined mat-icon"> workspaces </i>
                                <span>Forum</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('profil') ?>" class="d-flex gap-4">
                                <i class="material-symbols-outlined mat-icon"> settings </i>
                                <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Sidebar Content -->