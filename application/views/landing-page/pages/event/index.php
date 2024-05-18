
<div class="col-xl-9 col-lg-8">
    <div class="head-area mb-4 mb-lg-5 mt-5 mt-lg-0">
        <h6>Event</h6>
    </div>
    <div class="top-area mb-5 d-center flex-wrap gap-3 justify-content-between">
        <ul class="nav flex-wrap gap-2 tab-area" role="tablist">
            <?php foreach ($kategori as $index => $item) { ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link d-center <?php if ($index == 0): ?> active <?php endif ?>" id="tab-<?= $index ?>" data-bs-toggle="tab" data-bs-target="#tab-<?= $index ?>-pane"
                        type="button" role="tab" aria-controls="tab-<?= $index ?>-pane" aria-selected="true"><?= $item->nama_kategori ?></button>
                </li>
            <?php } ?>
        </ul>
        <div class="btn-item">
            <a href="<?= base_url('event/buat_event') ?>" class="cmn-btn gap-1">
                <i class="material-symbols-outlined mat-icon"> add </i>
                Buat Event
            </a>
        </div>
    </div>
    <div class="tab-content">
        <?php foreach ($kategori as $index => $item) { ?>
            <div class="tab-pane fade show <?php if ($index == 0): ?> active <?php endif ?>" id="tab-<?= $index ?>-pane" role="tabpanel" aria-labelledby="tab-<?= $index ?>" tabindex="0">
                <div class="row cus-mar friend-request">
                    <?php foreach ($event as $i => $data) { ?> 
                        <?php if ($data->kategori_event_id == $item->id): ?>
                            <div class="col-xl-4 col-sm-6 col-8">
                                <div class="single-box p-5">
                                    <div class="avatar-box position-relative">
                                        <img class="avatar-img w-100 rounded" src='<?= base_url("public/system/img/event/{$data->thumbnail}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/event-img-1.png') ?>'" alt="avatar" style="height: 150px; object-fit: cover; background-color: #fff; overflow-hidden;">
                                        <div class="abs-area w-100 position-absolute top-0 p-3 d-center justify-content-between">
                                            <span class="date-area mdtxt"><?= date('d M Y', strtotime($data->waktu_mulai)) ?></span>
                                        </div>
                                    </div>
                                    <a href="<?= base_url('event/detail/' . $data->id) ?>"><h6 class="m-0 mt-4"><?= $data->judul ?></h6></a>
                                    <span class="smtxt city-area text-muted mt-1">
                                        <small style="text-transform: capitalize;"><?= $data->tipe ?></small> - <small>Maks. <?= $data->kapasitas ?> Orang</small>
                                    </span>
                                    <div class="d-center gap-2 mt-4">
                                        <a href="<?= base_url('event/detail/' . $data->id) ?>" class="cmn-btn">Lihat Event</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>