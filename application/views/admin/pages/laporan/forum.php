<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Tabel Laporan Forum -->

    <div class="card">
        <div class="d-flex align-items-center justify-content-between pe-4  ">
            <h5 class="card-header mb-0">Laporan Forum</h5>
            <a href="<?= base_url('admin/laporan/cetak_laporan_forum') ?>" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Cetak Laporan Forum" target="_blank">
                <i class="bx bx-printer"></i>
            </a>
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
</div>
<!-- / Content -->