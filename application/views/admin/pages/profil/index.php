<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="<?= base_url('public/admin/assets/img/pages/profile-banner.png') ?>" alt="Banner image" class="rounded-top w-100">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="<?= base_url("public/system/img/profile/{$user->image}") ?>" onerror="this.src='<?= base_url('public/admin/assets/img/avatars/1.png') ?>'" alt="user image" class="d-block h-100 ms-0 ms-sm-4 rounded user-profile-img" id="avatar-profile">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4><?= $user->nama ?></h4>
                                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-medium" style="text-transform: capitalize;">
                                        <i class='bx bx-pen'></i> <?= $user->role ?>
                                    </li>
                                    <li class="list-inline-item fw-medium">
                                        <i class='bx bx-calendar-alt'></i> Terdaftar <?= date('d F Y', strtotime($user->tgl_dibuat)) ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Form Administrator -->
    <div class="card">
        <div class="d-flex align-items-center justify-content-between pe-4">
            <h5 class="card-header mb-0">Ubah Profil Saya</h5>
        </div>
        <div class="card-body pt-0">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert" data-type="validation-notification">
                    <?= validation_errors() ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            <?php } ?>

            <form action="<?= base_url('admin/profil') ?>" method="POST" class="row" enctype="multipart/form-data">
                <div class="col-12 mb-3">
                    <label for="nama" class="form-label required">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $user?->nama ?>" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $user?->email ?>" placeholder="Masukkan Email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="no_telp" class="form-label required">No. HP</label>
                    <input type="tel" class="form-control" name="no_telp" id="no_telp" value="<?= $user?->no_telp ?>" placeholder="Masukkan Nomor HP" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Foto Profil</label>
                    <input type="file" name="image" id="image" class="form-control" onchange="previewFile(this, 'avatar-profile')" accept="image/*">
                </div>
                <div class="col-12 mb-3">
                    <label for="alamat" class="form-label required">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat"><?= $user?->alamat ?></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center gap-2">
                        <i class="bx bx-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Form Administrator -->
</div>
<!-- / Content -->