<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Administrator</title>
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
    <h3 class="text-center" style="margin-bottom: 50px;">Data Administrator <br> Sistem Informasi Komunitas</h3>

    <table cellpadding="5">
        <thead>
            <tr class="bg-primary clr-white">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Tanggal Bergabung</th>
                </tr>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $index => $item) { ?>
                    <tr>
                        <td>
                            <?= $item?->code ?? $index + 1 ?>
                        </td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->alamat ?></td>
                        <td><?= $item->no_telp ?></td>
                        <td><?= date('d F Y', strtotime($item->tgl_dibuat)) ?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>