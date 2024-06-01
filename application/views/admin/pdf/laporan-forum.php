<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Forum</title>
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
    <h3 class="text-center" style="margin-bottom: 50px;">Laporan Forum <br> Sistem Informasi Komunitas</h3>

    <table cellpadding="5">
        <thead>
            <tr class="bg-primary clr-white">
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
</body>
</html>