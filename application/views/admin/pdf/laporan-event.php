<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Event</title>
</head>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, table th, table td {
        border: 1px solid #000;
    }

    table td {
        text-align: center;
    }

    .mb-0 {
        margin-bottom: 0;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
</style>

<body>
    <p class="mb-0 text-right"><?= date('d-m-Y') ?></p>
    <h3 class="text-center" style="margin-bottom: 50px;">Laporan Event <br> Sistem Informasi Komunitas</h3>

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

    <h5 style="margin-bottom: 10px; font-style: italic;">*<?= $dateDesc ?></h5>

    <table cellpadding="5">
        <thead>
            <tr class="bg-primary clr-white">
                <th>Kode</th>
                <th>Judul</th>
                <th>Jumlah Bergabung</th>
                <th>Dibuat Oleh</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($items) > 0): ?>
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
                            <?= $item->dibuat_oleh ?>
                        </td>
                        <td>
                            <?= date('d F Y', strtotime($item->tgl_dibuat)) ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Data tidak ditemukan</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</body>
</html>