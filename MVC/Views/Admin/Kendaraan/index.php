<h1>Data Armada</h1>
<a href="tambahData.php">+ Tambah Armada</a>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tipe</th>
        <th>Volume</th>
        <th>Plat Nomor</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    foreach ($data['armada'] as $armada) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $armada['name']; ?></td>
            <td><?= $armada['type']; ?></td>
            <td><?= $armada['volume']; ?></td>
            <td><?= $armada['plat_number']; ?></td>
            <td><?= $armada['description']; ?></td>
            <td>
                <a href="edit.php?id=<?= $armada['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $armada['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
