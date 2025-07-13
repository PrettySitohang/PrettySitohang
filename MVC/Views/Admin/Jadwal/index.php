<?php
require_once 'D:\MyProjek\XAMM\htdocs\GithubPretty\PrettySitohang\MVC\Cores\Database.php'; 
$db = new Database();

$db->query("SELECT * FROM trips ORDER BY created_at DESC");
$trips = $db->resultSet();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Jadwal Perjalanan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
  <div class="max-w-7xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold text-green-700">Data Jadwal Perjalanan</h1>
      <a href="tambahData.php" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">
        + Tambah Jadwal
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse text-sm">
        <thead class="bg-green-700 text-white">
          <tr>
            <th class="py-3 px-4 text-left border">No</th>
            <th class="py-3 px-4 text-left border">Driver</th>
            <th class="py-3 px-4 text-left border">Dari</th>
            <th class="py-3 px-4 text-left border">Tujuan</th>
            <th class="py-3 px-4 text-left border">Jumlah Tim</th>
            <th class="py-3 px-4 text-left border">Kuantitas CPO</th>
            <th class="py-3 px-4 text-left border">Tanggal Berangkat</th>
            <th class="py-3 px-4 text-left border">Estimasi Tiba</th>
            <th class="py-3 px-4 text-left border">Status</th>
            <th class="py-3 px-4 text-left border">Tiba Sebenarnya</th>
            <th class="py-3 px-4 text-left border">Dibuat</th>
            <th class="py-3 px-4 text-left border">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-800">
          <?php $no = 1; foreach ($trips as $trip): ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-4 border"><?= $no++ ?></td>
            <td class="py-2 px-4 border"><?= $trip['driver_name'] ?? '-' ?></td>
            <td class="py-2 px-4 border"><?= $trip['from'] ?? '-' ?></td>
            <td class="py-2 px-4 border"><?= $trip['destination'] ?? '-' ?></td>
            <td class="py-2 px-4 border"><?= $trip['total_teams'] ?? '-' ?></td>
            <td class="py-2 px-4 border"><?= $trip['quantity_of_cpo'] ?? '-' ?> L</td>
            <td class="py-2 px-4 border"><?= date('d-m-Y H:i', strtotime($trip['departure_date'])) ?></td>
            <td class="py-2 px-4 border"><?= date('d-m-Y H:i', strtotime($trip['estimation_arrival_date'])) ?></td>
            <td class="py-2 px-4 border"><?= $trip['status'] ?? '-' ?></td>
            <td class="py-2 px-4 border">
              <?= $trip['actual_arrival_date'] ? date('d-m-Y H:i', strtotime($trip['actual_arrival_date'])) : '-' ?>
            </td>
            <td class="py-2 px-4 border"><?= date('d-m-Y H:i', strtotime($trip['created_at'])) ?></td>
            <td class="py-2 px-4 border space-x-2">
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
