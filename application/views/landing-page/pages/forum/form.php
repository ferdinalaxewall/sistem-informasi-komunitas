<div class="col-xl-9 col-lg-8">
    <div class="single-box text-start p-sm-5 p-3">
        <div class="head-area mb-6">
            <h6>Tambah Forum </h6>
        </div>
        
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
            <div class="col-12">
                <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center gap-2">
                    <i class="bx bx-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>