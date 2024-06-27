<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Tabel Laporan Forum -->

    <div class="card">
        <div class="d-flex align-items-center justify-content-between pe-4">
            <div class="d-flex flex-column card-header" style="row-gap: 10px;">
                <h5 class="mb-0">Laporan Forum</h5>

                <?php
                    if (!empty($filter['start_date'] && !empty($filter['end_date']))) {
                        $start_date = date('d F Y', strtotime($filter['start_date']));
                        $end_date = date('d F Y', strtotime($filter['end_date']));
                        $dateDesc = "Hasil pencarian dari periode {$start_date} sampai {$end_date}";
                    } elseif (!empty($filter['start_date'])) {
                        $start_date = date('d F Y', strtotime($filter['start_date']));
                        $dateDesc = "Hasil pencarian dari tanggal {$start_date} ke depan";
                    } elseif (!empty($filter['end_date'])) {
                        $end_date = date('d F Y', strtotime($filter['end_date']));
                        $dateDesc = "Hasil pencarian hingga tanggal {$end_date}";
                    } else {
                        $dateDesc = "Hasil pencarian untuk semua periode waktu";
                    }
                ?>

                <h6 class="text-muted mb-0">
                    <?= $dateDesc ?>
                </h6>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="<?= base_url('admin/laporan/cetak_laporan_forum') . "?start_date={$filter['start_date']}&end_date={$filter['end_date']}" ?>" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Cetak Laporan Forum" target="_blank">
                    <i class="bx bx-printer"></i>
                </a>
                <!-- Enable Backdrop -->
                <button class="btn btn-primary btn-icon d-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Filter Laporan Forum" >
                    <i class="bx bx-search-alt"></i>
                </button>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <caption class="ms-4">
                    List Laporan Forum
                </caption>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Jumlah Bergabung</th>
                        <th>Jumlah Diskusi</th>
                        <th>Dibuat Oleh</th>
                        <th>Tanggal Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $index => $item) { ?>
                    <tr>
                        <td>
                            <?= $item?->code ?>
                        </td>
                        <td><?= $item->judul ?></td>
                        <td>
                            <?= $item->total_join ?>
                        </td>
                        <td>
                            <?= $item->total_diskusi ?>
                        </td>
                        <td>
                            <?= $item->dibuat_oleh ?>
                        </td>
                        <td>
                            <?= date('d F Y', strtotime($item->tgl_dibuat)) ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Tabel Laporan Forum -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop" aria-labelledby="offcanvasBackdropLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Filter Laporan Forum</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0">
            <form action="<?= base_url('admin/laporan/forum') ?>" class="row pt-4" method="GET" style="row-gap: 15px;">
                <div class="col-12">
                    <label for="start_date" class="form-label">Tanggal Awal</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bx-calendar"></i>
                        </span>
                        <input type="date" class="form-control" placeholder="Pilih Tanggal Awal" name="start_date" aria-label="Tanggal Awal" value="<?= $filter['start_date'] ?>" id="start_date" aria-describedby="basic-addon11" />
                    </div>
                </div>
                <div class="col-12">
                    <label for="end_date" class="form-label">Tanggal Akhir</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon12">
                            <i class="bx bx-calendar"></i>
                        </span>
                        <input type="date" class="form-control" placeholder="Pilih Tanggal Awal" name="end_date" aria-label="Tanggal Awal" value="<?= $filter['end_date'] ?>" id="end_date" aria-describedby="basic-addon12" />
                    </div>
                </div>
                <div class="col-8 pe-1">
                    <button type="submit" class="btn btn-primary w-100">
                        <span class="tf-icons bx bx-filter-alt me-2"></span>
                        Filter
                    </button>
                </div>
                <div class="col-4 ps-1">
                    <a href="<?= base_url('admin/laporan/forum') ?>" class="btn btn-secondary w-100">
                        <span class="tf-icons bx bx-refresh me-2"></span>
                        Clear
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->