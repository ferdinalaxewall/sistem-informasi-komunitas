<!-- Main Content -->

<div class="col-xl-9 col-lg-8">
    <!-- Rekomendasi Forum -->
    <div class="mb-5">
        <div class="head-area mb-5 d-flex flex-wrap align-items-center justify-content-between gap-2">
            <h6 class="mb-0">Rekomendasi Forum</h6>
        </div>
        <div class="row cus-mar friend-request">
            <?php foreach ($forum as $index => $item) { ?>
                <div class="col-xl-4 col-sm-6 col-8">
                    <div class="single-box p-5">
                        <div class="avatar-box position-relative">
                            <img class="avatar-img w-100" src="<?= base_url('public/landing-page/assets/images/group-img-1.png') ?>" alt="avatar">
                        </div>
                        <div class="abs-avatar-item">
                            <img class="avatar-img max-un rounded" src='<?= base_url("public/system/img/forum/{$item->thumbnail}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/group-avatar-1.png') ?>'" alt="avatar" style="width: 80px; height: 80px; object-fit: cover; object-position: center;">
                        </div>
                        <a href="<?= base_url('forum/detail/' . $item->id) ?>"><h6 class="m-0 mb-2 mt-3"><?= $item->judul ?></h6></a>
                        <p class="smtxt public-group">Sejak <?= date('d F Y', strtotime($item->tgl_dibuat)) ?></p>
                        <div class="d-center btn-border pt-5 gap-2 mt-4">
                            <a href="<?= base_url('forum/detail/' . $item->id) ?>" class="cmn-btn fourth">Lihat Forum</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End Rekomendasi Forum -->

    <!-- Rekomendasi Event -->
    <div class="mt-3">
        <div class="head-area mb-4 mb-lg-5 mt-5 mt-lg-0 d-flex flex-wrap align-items-center justify-content-between gap-2">
            <h6 class="mb-0">Rekomendasi Event</h6>
        </div>
        <div class="row cus-mar friend-request">
            <?php foreach ($event as $index => $item) { ?>
                <div class="col-xl-4 col-sm-6 col-8">
                    <div class="single-box p-5">
                        <div class="avatar-box position-relative">
                            <img class="avatar-img w-100 rounded" src='<?= base_url("public/system/img/event/{$item->thumbnail}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/event-img-1.png') ?>'" alt="avatar" style="height: 150px; object-fit: cover; background-color: #fff; overflow-hidden;">
                            <div class="abs-area w-100 position-absolute top-0 p-3 d-center justify-content-between">
                                <span class="date-area mdtxt"><?= date('d M Y', strtotime($item->waktu_mulai)) ?></span>
                            </div>
                        </div>
                        <a href="<?= base_url('event/detail/' . $item->id) ?>">
                            <h6 class="m-0 mt-4"><?= $item->judul ?></h6>
                        </a>
                        <span class="smtxt city-area text-muted mt-1">
                            <small style="text-transform: capitalize;"><?= $item->tipe ?></small> - <small>Maks. <?= $item->kapasitas ?> Orang</small>
                        </span>
                        <div class="d-center gap-2 mt-4">
                            <a href="<?= base_url('event/detail/' . $item->id) ?>" class="cmn-btn">Lihat Event</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End Rekomendasi Event -->
</div>

<!-- End Main Content -->