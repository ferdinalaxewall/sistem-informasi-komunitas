<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Tabel Kategori Forum -->

    <div class="card">
        <div class="d-flex align-items-center justify-content-between pe-4">
            <h5 class="card-header mb-0"><?= $title ?></h5>
        </div>
        <div class="card-body pt-0">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert" data-type="validation-notification">
                    <?= validation_errors() ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            <?php } ?>

            <form action="<?= $action_url ?>" method="POST" class="row">
                <div class="col-12 mb-3">
                    <label for="nama" class="form-label required">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $item?->nama ?>" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $item?->email ?>" placeholder="Masukkan Email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="no_telp" class="form-label required">No. HP</label>
                    <input type="tel" class="form-control" name="no_telp" id="no_telp" value="<?= $item?->no_telp ?>" placeholder="Masukkan Nomor HP" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label <?php if (!$is_update): ?> required <?php endif ?>">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" <?php if (!$is_update): ?> required <?php endif ?>>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label <?php if (!$is_update): ?> required <?php endif ?>">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" <?php if (!$is_update): ?> required <?php endif ?>>
                </div>
                <div class="col-12 mb-3">
                    <label for="alamat" class="form-label required">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat"><?= $item?->alamat ?></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center gap-2">
                        <i class="bx bx-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Tabel Kategori Forum -->
</div>
<!-- / Content -->