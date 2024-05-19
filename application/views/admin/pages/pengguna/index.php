<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Tabel Pengguna -->

    <div class="card">
        <div class="d-flex align-items-center justify-content-between pe-4  ">
            <h5 class="card-header mb-0">Pengguna</h5>
            <a href="<?= base_url('admin/pengguna/tambah') ?>" class="btn btn-icon btn-primary" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Tambah">
                <i class="bx bx-plus-circle"></i>
            </a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <caption class="ms-4">
                    List Pengguna
                </caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Tanggal Bergabung</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $index => $item) { ?>
                    <tr>
                        <td>
                            <?= $index + 1 ?>
                        </td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->no_telp ?></td>
                        <td><?= date('d F Y', strtotime($item->tgl_dibuat)) ?></td>
                        <td>
                            <div class="d-flex flex-wrap align-items-center justify-content-center gap-2">
                                <a href="<?= base_url("admin/pengguna/ubah/{$item->id}") ?>" class="btn btn-info btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Ubah">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <a href="<?= base_url("admin/pengguna/hapus/{$item->id}") ?>" class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Hapus">
                                    <i class="bx bx-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Tabel Pengguna -->
</div>
<!-- / Content -->