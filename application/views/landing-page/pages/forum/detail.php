<div class="col-xl-9 col-lg-8">
    <div class="banner-area pages-create mb-5">
        <div class="single-box p-5">
            <div class="avatar-area">
                <img class="avatar-img w-100" src="<?= base_url('public/landing-page/assets/images/group-cover-img.png') ?>" alt="image">
            </div>
            <div class="top-area py-4 d-center flex-wrap gap-3 justify-content-between">
                <div class="d-flex gap-3 align-items-center">
                    <div class="abs-avatar-item m-0">
                        <img class="avatar-img max-un" src='<?= base_url("public/system/img/forum/{$item->thumbnail}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/group-avatar-2.png') ?>'" alt="avatar" style="width: 80px; height: 80px; object-fit: cover; object-position: center;">
                    </div>
                    <div class="text-area text-start">
                        <h5 class="m-0 mb-1"><?= $item->judul ?></h5>
                        <p class="mdtxt"><?= $item->nama_kategori ?> - <?= $total_member ?> Member</p>
                    </div>
                </div>
                <div class="btn-item d-center gap-3">
                    <?php if ($is_joined): ?>
                        <button class="cmn-btn fourth gap-1">
                            Telah Bergabung
                        </button>
                    <?php else: ?>
                        <a href="<?= base_url('forum/gabung/' . $item->id) ?>" class="cmn-btn third gap-1">
                            Gabung
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="tab-content">
        <?php if ($is_joined): ?>
            <div class="tab-pane fade show active" id="feed-tab-pane" role="tabpanel" aria-labelledby="feed-tab" tabindex="0">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-12 d-flex flex-column gap-7">
                        <div class="share-post d-flex gap-3 gap-sm-5 p-3 p-sm-5">
                            <div class="profile-box">
                                <a href="#"><img src='<?= base_url("public/system/img/profile/{$user->image}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/add-post-avatar.png') ?>'" class="max-un rounded" alt="icon" style="width: 50px; height: 50px; object-fit: cover; object-position: center;"></a>
                            </div>
                            <form action='<?= base_url("forum/tambah_diskusi/{$item->id}") ?>' class="w-100 position-relative" method="POST">
                                <textarea cols="10" rows="3" placeholder="Masukkan topik diskusi ..." style="resize: none;" name="pesan" required></textarea>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="bx bx-plus"></i> Buat Diskusi
                                </button>
                            </form>
                        </div>
                        <div class="post-item d-flex flex-column gap-5 gap-md-7">
                            <?php foreach ($diskusi as $post) { ?>
                                <div class="post-single-box p-3 p-sm-5">
                                    <div class="top-area pb-5">
                                        <div class="profile-area d-center justify-content-between">
                                            <div class="avatar-item d-flex gap-3 align-items-center">
                                                <div class="avatar position-relative">
                                                    <img class="avatar-img max-un rounded" src='<?= base_url("public/system/img/profile/{$post->image_user}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/avatar-1.png') ?>'" alt="avatar" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
                                                </div>
                                                <div class="info-area">
                                                    <h6 class="m-0"><a href="public-profile-post.html"><?= $post->nama_user ?></a></h6>
                                                    <small class="text-muted">
                                                        <?= date('d F Y', strtotime($item->tgl_dibuat)) ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-4">
                                            <p class="description"><?= $post->pesan ?></p>
                                        </div>
                                    </div>
                                    <div class="total-react-share d-center gap-2 flex-wrap justify-content-end">
                                        <div class="react-list d-flex flex-wrap gap-6 align-items-center text-center">
                                            <button class="mdtxt"><?= count($post->comments) ?> Komentar</button>
                                        </div>
                                    </div>
                                    <form action="<?= base_url("forum/tambah_diskusi/{$item->id}?parent_id={$post->id}") ?>" method="POST">
                                        <div class="d-flex mt-5 gap-3">
                                            <div class="profile-box d-none d-xxl-block">
                                                <a href="#"><img src='<?= base_url("public/system/img/profile/{$user->image}") ?>' onerror="this.src='<?= base_url('public/landing-page/assets/images/add-post-avatar.png') ?>'" class="max-un rounded" alt="icon" style="width: 50px; height: 50px; object-fit: cover; object-position: center;"></a>
                                            </div>
                                            <div class="form-content input-area py-1 d-flex gap-2 align-items-center w-100">
                                                <input name="pesan" placeholder="Masukkan komentar.." required>
                                            </div>
                                            <div class="btn-area d-flex">
                                                <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                    <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="comments-area mt-5 d-flex flex-column gap-4">
                                        <?php foreach ($post?->comments ?? [] as $comment) { ?>
                                            <div class="single-comment-area ms-1 ms-xxl-15">
                                                <div class="d-flex gap-2 gap-sm-4">
                                                    <div class="avatar-item d-center align-items-baseline">
                                                        <img class="avatar-img max-un" src="<?= base_url('public/landing-page/assets/images/avatar-3.png') ?>" alt="avatar">
                                                    </div>
                                                    <div class="info-item">
                                                        <div class="top-area px-4 py-3 d-flex gap-3 align-items-start justify-content-between">
                                                            <div class="title-area">
                                                                <h6 class="m-0 mb-3"><a href="public-profile-post.html"><?= $comment->nama_user ?></a></h6>
                                                                <p class="mdtxt"><?= $comment->pesan ?></p>
                                                            </div>
                                                        </div>
                                                        <ul class="like-share d-flex gap-6 mt-2 ps-5">
                                                            <li class="d-center flex-column">
                                                                <button class="mdtxt reply-btn">Balas</button>
                                                            </li>
                                                        </ul>
                                                        <form action="#" class="comment-form">
                                                            <div class="d-flex gap-3">
                                                                <input placeholder="Write a comment.." class="py-3">
                                                                <button class="cmn-btn px-2 px-sm-5 px-lg-6">
                                                                    <i class="material-symbols-outlined mat-icon m-0 fs-xxl"> near_me </i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-10 mt-5 mt-xl-0">
                        <div class="cus-scrollbar">
                            <div class="sidebar-wrapper d-flex al-item flex-wrap justify-content-end justify-content-xl-center flex-column flex-md-row flex-xl-column flex gap-6">
                                <div class="sidebar-area p-5">
                                    <div class="mb-3">
                                        <h6 class="d-inline-flex">
                                            About
                                        </h6>
                                    </div>
                                    <p class="mdtxt descript"><?= $item->deskripsi ?></p>
                                    <ul class="d-grid gap-2 mt-5">
                                        <li class="d-flex align-items-center gap-2">
                                            <i class="material-symbols-outlined mat-icon"> schedule </i>
                                            <span class="mdtxt">Setiap Hari</span>
                                        </li>
                                        <li class="d-flex align-items-center gap-2">
                                            <i class="material-symbols-outlined mat-icon"> flag </i>
                                            <span class="mdtxt"><?= $total_member ?> Member</span>
                                        </li>
                                        <li class="d-flex align-items-center gap-2">
                                            <i class="material-symbols-outlined mat-icon"> language </i>
                                            <span class="mdtxt">Public</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center">
                <p>Anda belum bergabung dengan forum ini. Silahkan Klik <a href="<?= base_url('forum/gabung/' . $item->id) ?>" class="text-success">Bergabung</a> terlebih dahulu!</p>
            </div>
        <?php endif ?>
    </div>
</div>