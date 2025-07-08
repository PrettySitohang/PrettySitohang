<?php
require_once 'D:\MyProjek\XAMM\htdocs\GithubPretty\PrettySitohang\MVC\Cores\Database.php';
$db = new Database();

$db->query("SELECT * FROM trips ORDER BY id DESC");
$trips = $db->resultSet();

// Ambil nama driver dari session (jika ada)
$latestDriver = $_SESSION['latest_driver_name'] ?? 'Belum Ada';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Jadwal</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php include_once '../../Navbar.php'; ?>
<body class="bg-gray-50 p-8">
  <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-green-700"> Data Jadwal Perjalanan</h1>
      <a href="tambahData.php"
         class="bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-800 transition">+ Tambah Jadwal</a>
    </div>

    <p class="text-sm mb-4 text-gray-500">Driver terakhir digunakan: <strong><?= $latestDriver ?></strong></p>

    <div class="overflow-x-auto">
      <table class="min-w-full border text-sm text-left">
        <thead class="bg-green-700 text-white">
          <tr>
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Tanggal</th>
            <th class="px-4 py-2">Lokasi Awal</th>
            <th class="px-4 py-2">Lokasi Tujuan</th>
            <th class="px-4 py-2">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white text-gray-700">
          <?php $no = 1; foreach ($trips as $trip): ?>
            <tr class="border-b">
              <td class="px-4 py-2"><?= $no++ ?></td>
              <td class="px-4 py-2"><?= date('d M Y H:i', strtotime($trip['departure_date'])) ?></td>
              <td class="px-4 py-2"><?= $trip['from'] ?></td>
              <td class="px-4 py-2"><?= $trip['destination'] ?></td>
              <td class="px-4 py-2 text-blue-600">
                <a href="#">Edit</a> | <a href="#">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
