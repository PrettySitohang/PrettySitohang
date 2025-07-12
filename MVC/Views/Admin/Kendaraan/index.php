<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Armada</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#f0fdf4',
              100: '#e2f7e9',
              200: '#c5efd3',
              300: '#99e2b4',
              400: '#65ce8f',
              500: '#3dbd73',
              600: '#1a8641',
              700: '#15803d',
              800: '#166534',
              900: '#14532d',
            }
          }
        }
      }
    }
  </script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-primary-50 min-h-screen py-10 px-4 md:px-12 font-sans">
  <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-primary-700">
        <i class="fa-solid fa-truck mr-2"></i>Data Armada
      </h1>
      <a href="tambahData.php" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-2 rounded-md shadow-md hover:shadow-lg transition">
        <i class="fa-solid fa-plus mr-1"></i>Tambah Armada
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border border-gray-300 rounded-md overflow-hidden">
        <thead class="bg-primary-100 text-primary-800">
          <tr>
            <th class="px-4 py-3 text-left">No</th>
            <th class="px-4 py-3 text-left">Nama</th>
            <th class="px-4 py-3 text-left">Tipe</th>
            <th class="px-4 py-3 text-left">Volume</th>
            <th class="px-4 py-3 text-left">Plat Nomor</th>
            <th class="px-4 py-3 text-left">Deskripsi</th>
            <th class="px-4 py-3 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          <?php $no = 1; foreach ($data['armada'] as $armada): ?>
          <tr class="hover:bg-primary-50 border-b">
            <td class="px-4 py-2"><?= $no++; ?></td>
            <td class="px-4 py-2"><?= $armada['name']; ?></td>
            <td class="px-4 py-2 capitalize"><?= $armada['type']; ?></td>
            <td class="px-4 py-2"><?= $armada['volume']; ?></td>
            <td class="px-4 py-2"><?= $armada['plat_number']; ?></td>
            <td class="px-4 py-2"><?= $armada['description']; ?></td>
            <td class="px-4 py-2">
              <a href="edit.php?id=<?= $armada['id']; ?>" class="text-blue-600 hover:underline mr-2">
                <i class="fa-solid fa-pen-to-square"></i> Edit
              </a>
              <a href="hapus.php?id=<?= $armada['id']; ?>" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">
                <i class="fa-solid fa-trash"></i> Hapus
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
