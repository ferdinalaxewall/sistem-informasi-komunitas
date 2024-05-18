<div class="col-xl-9 col-lg-8">
    <div class="single-box text-start p-sm-5 p-3">
        <div class="head-area mb-6">
            <h6>Tambah Event </h6>
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
                <label for="judul" class="form-label required">Judul Event</label>
                <input type="text" class="form-control" name="judul" id="judul" value="<?= $item?->judul ?>" placeholder="Masukkan Judul Event" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="kategori_event_id" class="form-label required">Kategori Event</label>
                <select name="kategori_event_id" id="kategori_event_id" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach($categories as $category) { ?>
                        <option value="<?= $category->id ?>" <?php if ($item?->kategori_event_id == $category->id): ?> selected <?php endif ?>><?= $category->nama_kategori ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="tipe" class="form-label required">Tipe Event</label>
                <select name="tipe" id="tipe" class="form-select" required>
                    <option value="">Pilih Tipe</option>
                    <?php foreach($this->event->tipe as $tipe => $name) { ?>
                        <option value="<?= $tipe ?>" <?php if ($item?->tipe == $tipe): ?> selected <?php endif ?>>Event <?= $name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="kapasitas" class="form-label required">Kapasitas</label>
                <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="<?= $item?->kapasitas ?>" placeholder="0" required>
            </div>
            <div class="col-12 mb-3">
                <label for="deskripsi" class="form-label required">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" rows="5" required><?= $item?->deskripsi ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="waktu_mulai" class="form-label required">Waktu Mulai</label>
                <input type="date" class="form-control" name="waktu_mulai" id="waktu_mulai" value="<?= date('Y-m-d', strtotime($item?->waktu_mulai ?? date('Y-m-d'))) ?>" placeholder="Masukkan Tanggal Mulai" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="waktu_selesai" class="form-label required">Waktu Selesai</label>
                <input type="date" class="form-control" name="waktu_selesai" id="waktu_selesai" value="<?= date('Y-m-d', strtotime($item?->waktu_selesai ?? date('Y-m-d'))) ?>" placeholder="Masukkan Tanggal Selesai" required>
            </div>
            <div class="col-12 mb-3">
                <label for="lokasi" class="form-label required">Lokasi/Link Event</label>
                <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?= $item?->lokasi ?>" placeholder="Masukkan Lokasi/Link Event" required>
            </div>
            <div class="col-12 mb-3">
                <label for="thumbnail" class="form-label <?php if (!$is_update): ?> required <?php endif ?>">Thumbnail</label>
                <input type="file" class="form-control mb-1" accept="image/*" name="thumbnail" id="thumbnail" onchange="previewFile(this, 'preview-image')" <?php if (!$is_update): ?> required <?php endif ?>>
                <img src="<?= base_url('public/system/img/event/' . $item?->thumbnail) ?>" alt="" id="preview-image" style="width: 200px;">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center gap-2">
                    <i class="bx bx-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>