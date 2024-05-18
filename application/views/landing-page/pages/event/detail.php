
<div class="col-xl-9 col-lg-8">
    <div class="banner-area mb-5">
        <div class="single-box">
            <div class="avatar-box position-relative">
                <img class="avatar-img w-100" src='<?= base_url("public/system/img/event/{$item->thumbnail}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/event-img-1.png') ?>'">
                <div class="abs-area position-absolute top-0 p-3 p-lg-5 p-xl-10">
                    <span class="date-area mdtxt"><?= date('d M Y', strtotime($item->waktu_mulai)) ?></span>
                </div>
                <div class="abs-area position-absolute bottom-0 p-3 p-lg-5 p-xl-10 pb-3 pb-lg-5 pb-xl-8">
                    <h4><?= $item->judul ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="details-area p-5 mb-5">
        <div class="top-area pb-6 mb-6 d-center flex-wrap gap-3 justify-content-between">
            <ul class="nav flex-wrap gap-2 tab-area" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link d-center active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-tab-pane"
                        type="button" role="tab" aria-controls="about-tab-pane" aria-selected="true">about</button>
                </li>
            </ul>
            <div class="btn-item d-center flex-wrap gap-3">
                <?php if (!$is_joined): ?>
                    <a href="<?= base_url('event/ikuti/' . $item->id) ?>" class="cmn-btn d-center third gap-1">
                        <i class="material-symbols-outlined mat-icon fs-xl"> grade </i>
                        Ikuti Event
                    </a>
                <?php else: ?>
                    <button class="cmn-btn fourth gap-1">
                        <i class="material-symbols-outlined mat-icon fs-xl"> grade </i>
                        Diikuti
                    </button>
                <?php endif ?>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab" tabindex="0">
                <div class="row gap-5 gap-xl-0">
                    <div class="col-12">
                        <div class="friends-list d-flex gap-3 align-items-center text-center">
                            <ul class="d-flex align-items-center justify-content-center">
                                <li><img src="<?= base_url('public/landing-page/assets/images/avatar-2.png') ?>" alt="image"></li>
                                <li><img src="<?= base_url('public/landing-page/assets/images/avatar-3.png') ?>" alt="image"></li>
                                <li><img src="<?= base_url('public/landing-page/assets/images/avatar-4.png') ?>" alt="image"></li>
                            </ul>
                            <span class="mdtxt d-center"><?= count($joined_event) ?> Orang Bergabung</span>
                        </div>
                        <ul class="d-grid gap-2 my-5">
                            <li class="d-flex align-items-center gap-2">
                                <i class="material-symbols-outlined mat-icon"> schedule </i>
                                <span class="mdtxt"><?= date('d F Y', strtotime($item->waktu_mulai)) ?> - <?= date('d F Y', strtotime($item->waktu_selesai)) ?></span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="material-symbols-outlined mat-icon"> smart_display </i>
                                <span class="mdtxt" style="text-transform: capitalize;">Event <?= $item->tipe ?></span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="material-symbols-outlined mat-icon"> flag </i>
                                <?php if ($item->tipe == 'offline'): ?>
                                    <span class="mdtxt"><?= $item->lokasi ?></span>
                                <?php else: ?>
                                    <a href="<?= $item->lokasi ?>" class="btn btn-primary btn-sm" target="_blank">
                                        Link Event
                                    </a>
                                <?php endif ?>
                            </li>
                        </ul>
                        
                        <div class="description-box mt-4">
                            <p class="mdtxt"><?= htmlspecialchars($item->deskripsi) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>