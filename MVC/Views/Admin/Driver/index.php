<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Indeks</title>
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Data Driver</h1>
    <div class="flex justify-end mb-4">
        <a href="tambahData.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">+ Tambah Driver</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 border-b">No</th>
                    <th class="py-3 px-4 border-b">Nama</th>
                    <th class="py-3 px-4 border-b">Username</th>
                    <th class="py-3 px-4 border-b">Email</th>
                    <th class="py-3 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data['driver'] as $d) : ?>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b text-center"><?= $no++; ?></td>
                        <td class="py-2 px-4 border-b"><?= $d['name']; ?></td>
                        <td class="py-2 px-4 border-b"><?= $d['username']; ?></td>
                        <td class="py-2 px-4 border-b"><?= $d['email']; ?></td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="edit.php?id=<?= $d['id']; ?>" class="text-yellow-600 hover:underline mr-2">Edit</a>
                            <a href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Hapus driver ini?')" class="text-red-600 hover:underline">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>