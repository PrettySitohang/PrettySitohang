<h1>Data Rute Perjalanan</h1>
<a href="tambahData.php">+ Tambah Rute</a>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Tujuan</th>
        <th>Jumlah Tim</th>
        <th>Dari</th>
        <th>Tanggal Berangkat</th>
        <th>Estimasi Tiba</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    foreach ($data['rute'] as $r) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $r['destination']; ?></td>
            <td><?= $r['total_teams']; ?></td>
            <td><?= $r['from']; ?></td>
            <td><?= $r['departure_date']; ?></td>
            <td><?= $r['estimation_arrival_date']; ?></td>
            <td><?= $r['status']; ?></td>
            <td>
                <a href="detail.php?id=<?= $r['id']; ?>">Detail</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
