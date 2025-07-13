<?php
require_once '../../../Cores/Database.php';
$db = new Database();

// Ambil semua data user dengan role 'Driver'
$db->query("SELECT * FROM users WHERE role = 'Driver' ORDER BY id ASC");
$drivers = $db->resultSet();
?>

<?php include_once('../../Navbar.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Driver</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-image: url('../../../gambar/logo-cpo.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
  </style>
</head>
<body class="backdrop-blur-md min-h-screen">
  <div class="container mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-6 bg-white bg-opacity-80 p-6 rounded-xl shadow">
      <h1 class="text-3xl font-bold text-green-800">Daftar Driver</h1>
      <a href="tambahData.php" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 shadow">+ Tambah Driver</a>
    </div>

    <div class="bg-white bg-opacity-90 rounded-xl shadow-lg overflow-x-auto">
      <table class="min-w-full divide-y divide-green-200">
        <thead class="bg-green-200">
          <tr>
            <th class="px-6 py-4 text-left text-sm font-bold text-green-900">No</th>
            <th class="px-6 py-4 text-left text-sm font-bold text-green-900">Nama</th>
            <th class="px-6 py-4 text-left text-sm font-bold text-green-900">Username</th>
            <th class="px-6 py-4 text-left text-sm font-bold text-green-900">Email</th>
            <th class="px-6 py-4 text-left text-sm font-bold text-green-900">Password</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-300">
          <?php $no = 1; foreach ($drivers as $driver): ?>
          <tr class="hover:bg-green-50">
            <td class="px-6 py-4 text-sm text-gray-800 font-medium"><?= $no++ ?></td>
            <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($driver['name']) ?></td>
            <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($driver['username']) ?></td>
            <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($driver['email']) ?></td>
            <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($driver['password']) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include_once('../../Footer.php'); ?>
</body>
</html>
