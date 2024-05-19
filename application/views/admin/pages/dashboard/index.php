<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="row">
        <div class="col-md-3 mb-4">
            <a href="<?= base_url('admin/administrator') ?>" class="card card-hover">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text mb-0">Total Administrator</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2"><?= $count_admin ?></h4>
                            </div>
                        </div>
                        <div class="card-icon align-self-center">
                            <span class="badge bg-label-primary rounded p-2">
                              <i class="bx bxs-group bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-4">
            <a href="<?= base_url('admin/pengguna') ?>" class="card card-hover">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text mb-0">Total Pengguna</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2"><?= $count_user ?></h4>
                            </div>
                        </div>
                        <div class="card-icon align-self-center">
                            <span class="badge bg-label-primary rounded p-2">
                              <i class="bx bxs-user bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-4">
            <a href="<?= base_url('admin/forum') ?>" class="card card-hover">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text mb-0">Total Forum</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2"><?= $count_forum ?></h4>
                            </div>
                        </div>
                        <div class="card-icon align-self-center">
                            <span class="badge bg-label-primary rounded p-2">
                              <i class="bx bxs-conversation bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-4">
            <a href="<?= base_url('admin/event') ?>" class="card card-hover">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text mb-0">Total Event</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2"><?= $count_event ?></h4>
                            </div>
                        </div>
                        <div class="card-icon align-self-center">
                            <span class="badge bg-label-primary rounded p-2">
                              <i class="bx bxs-calendar-event bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Visualisasi Data Forum</h5>
                    </div>
                </div>
                <div class="card-body" style="position: relative;">
                    <div id="forumChart">
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 949px; height: 425px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Visualisasi Data Event</h5>
                    </div>
                </div>
                <div class="card-body" style="position: relative;">
                    <div id="eventChart">
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 949px; height: 425px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<!-- / Content -->