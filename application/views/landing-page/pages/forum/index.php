
<div class="col-xl-9 col-lg-8">
    <div class="head-area mb-5">
        <h6>Forum</h6>
    </div>
    <div class="popular-area mb-5 d-center flex-wrap gap-3 justify-content-between">
        <ul class="nav flex-wrap gap-2 tab-area" role="tablist">
            <?php foreach ($kategori as $index => $item) { ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link d-center <?php if ($index == 0): ?> active <?php endif ?>" id="tab-<?= $index ?>" data-bs-toggle="tab" data-bs-target="#tab-<?= $index ?>-pane"
                        type="button" role="tab" aria-controls="tab-<?= $index ?>-pane" aria-selected="true"><?= $item->nama_kategori ?></button>
                </li>
            <?php } ?>
        </ul>
        <div class="btn-item">
            <a href="<?= base_url('forum/buat_forum') ?>" class="cmn-btn gap-1">
                <i class="material-symbols-outlined mat-icon"> add </i>
                Buat Forum
            </a>
        </div>
    </div>
    <div class="tab-content">
        <?php foreach ($kategori as $index => $item) { ?>
            <div class="tab-pane fade show <?php if ($index == 0): ?> active <?php endif ?>" id="tab-<?= $index ?>-pane" role="tabpanel" aria-labelledby="tab-<?= $index ?>" tabindex="0">
                <div class="row cus-mar friend-request">
                    <?php foreach ($forum as $i => $data) { ?>
                        <?php if ($data->kategori_forum_id == $item->id): ?>
                            <div class="col-xl-4 col-sm-6 col-8">
                                <div class="single-box p-5">
                                    <div class="avatar-box position-relative">
                                        <img class="avatar-img w-100" src="<?= base_url('public/landing-page/assets/images/group-img-1.png') ?>" alt="avatar">
                                    </div>
                                    <div class="abs-avatar-item">
                                        <img class="avatar-img max-un rounded" src='<?= base_url("public/system/img/forum/{$data->thumbnail}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/group-avatar-1.png') ?>'" alt="avatar" style="width: 80px; height: 80px; object-fit: cover; object-position: center;">
                                    </div>
                                    <a href="<?= base_url('forum/detail/' . $data->id) ?>"><h6 class="m-0 mb-2 mt-3"><?= $data->judul ?></h6></a>
                                    <p class="smtxt public-group">Sejak <?= date('d F Y', strtotime($data->tgl_dibuat)) ?></p>
                                    <div class="d-center btn-border pt-5 gap-2 mt-4">
                                        <a href="<?= base_url('forum/detail/' . $data->id) ?>" class="cmn-btn fourth">Lihat Forum</a>
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