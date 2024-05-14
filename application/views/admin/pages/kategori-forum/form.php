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
                    <label for="nama_kategori" class="form-label required">Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?= $item?->nama_kategori ?>" placeholder="Masukkan Nama Kategori" required>
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