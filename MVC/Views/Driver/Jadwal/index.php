<?php
require_once 'D:\MyProjek\XAMM\htdocs\GithubPretty\PrettySitohang\MVC\Cores\Database.php'; 
$db = new Database();

$db->query("SELECT * FROM trips");
$trips = $db->resultSet();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Jadwal</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
  <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold text-green-700">Data Jadwal Perjalanan</h1>
      <a href="tambahData.php" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">
        + Tambah Jadwal
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse">
        <thead class="bg-green-700 text-white">
          <tr>
            <th class="py-3 px-4 text-left">No</th>
            <th class="py-3 px-4 text-left">Tanggal Berangkat</th>
            <th class="py-3 px-4 text-left">Lokasi Awal</th>
            <th class="py-3 px-4 text-left">Lokasi Tujuan</th>
            <th class="py-3 px-4 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          <?php $no = 1; foreach($trips as $trip): ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4"><?= $no++ ?></td>
            <td class="py-3 px-4"><?= date('d-m-Y H:i', strtotime($trip['departure_date'])) ?></td>
            <td class="py-3 px-4"><?= $trip['from'] ?? '-' ?></td>
            <td class="py-3 px-4"><?= $trip['destination'] ?? '-' ?></td>
            <td class="py-3 px-4 space-x-2">
              <a href="#" class="text-blue-600 hover:underline">Edit</a>
              <a href="#" class="text-red-600 hover:underline">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
