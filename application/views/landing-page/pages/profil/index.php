<form class="col-xl-9 col-lg-8 cus-mar setting-row" action="<?= base_url('profil') ?>" method="POST" enctype="multipart/form-data">
    <div class="head-area mb-6 text-start">
        <h5>Settings</h5>
    </div>
    <div class="single-box p-sm-5 p-3">
        <div class="row gap-6">
            <div class="col-xxl-2 col-md-3 col-sm-5 col-6 pe-0">
                <div class="upload-single">
                    <div class="head-area mb-2 text-start">
                        <h6>Gambar Profil</h6>
                    </div>
                    <div class="profile-picture text-start">
                        <img class="preview-image w-100" src='<?= base_url("public/system/img/profile/{$user->image}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/profile-picture.png') ?>'" alt="Preview Image" id="avatar-profile">
                    </div>
                    <div class="file-upload">
                        <label class="file text-start mt-2">
                            <input type="file" name="image" onchange="previewFile(this, 'avatar-profile')" accept="image/*">
                            <span class="cmn-btn">Change Profile</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-box text-start p-sm-5 p-3">
        <div class="head-area mb-6">
            <h6>Data Profil </h6>
        </div>
        <div action="#" class="d-grid gap-4">
            <div class="row">
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
                <div class="col-12 mb-3">
                    <label for="alamat" class="form-label required">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat"><?= $user?->alamat ?></textarea>
                </div>
                <div class="col-sm-12 mt-4">
                    <div class="btn-area text-end" type="submit">
                        <button class="cmn-btn">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>