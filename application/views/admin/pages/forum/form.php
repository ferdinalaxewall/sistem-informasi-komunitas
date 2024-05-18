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
            
            <form action="<?= $action_url ?>" method="POST" class="row" enctype="multipart/form-data">
                <div class="col-12 mb-3">
                    <label for="judul" class="form-label required">Judul Forum</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?= $item?->judul ?>" placeholder="Masukkan Judul Forum" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="kategori_forum_id" class="form-label required">Kategori Forum</label>
                    <select name="kategori_forum_id" id="kategori_forum_id" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        <?php foreach($categories as $category) { ?>
                            <option value="<?= $category->id ?>" <?php if ($item?->kategori_forum_id == $category->id): ?> selected <?php endif ?>><?= $category->nama_kategori ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="deskripsi" class="form-label required">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" rows="5" required><?= $item?->deskripsi ?></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="thumbnail" class="form-label <?php if (!$is_update): ?> required <?php endif ?>">Thumbnail</label>
                    <input type="file" class="form-control mb-1" accept="image/*" name="thumbnail" id="thumbnail" onchange="previewFile(this, 'preview-image')" <?php if (!$is_update): ?> required <?php endif ?>>
                    <img src="<?= base_url('public/system/img/forum/' . $item?->thumbnail) ?>" alt="" id="preview-image" style="width: 200px;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label required">Status Publikasi</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="true" name="is_active" id="is_active_1" <?php if ($item?->is_active): ?> checked <?php endif ?>>
                        <label class="form-check-label" for="is_active_1">
                            Aktif
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="false" name="is_active" id="is_active_2" <?php if (!$item?->is_active): ?> checked <?php endif ?>>
                        <label class="form-check-label" for="is_active_2">
                            Tidak Aktif
                        </label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label required">Status Verifikasi</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="true" name="is_verified" id="is_verified_1" <?php if ($item?->is_verified): ?> checked <?php endif ?>>
                        <label class="form-check-label" for="is_verified_1">
                            Aktif
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="false" name="is_verified" id="is_verified_2" <?php if (!$item?->is_verified): ?> checked <?php endif ?>>
                        <label class="form-check-label" for="is_verified_2">
                            Tidak Aktif
                        </label>
                    </div>
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