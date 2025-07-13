<?php
require_once '../../../Cores/Database.php';
$db = new Database();

// Ambil semua kendaraan
$db->query("SELECT * FROM vehicles ORDER BY id ASC");
$vehicles = $db->resultSet();
?>

<?php include_once('../../Navbar.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengelolaan Armada</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-image: url('../../../gambar/logo-cpo.jpg');
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-position: center;
    }
    .glass {
      background-color: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(8px);
    }
  </style>
</head>
<body class="min-h-screen">
  <div class="container mx-auto px-6 py-12">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-4xl font-bold text-green-900 drop-shadow">Pengelolaan Armada</h1>
      <a href="tambahData.php" class="bg-green-700 text-white px-6 py-2 rounded-lg shadow hover:bg-green-800 transition-all">+ Tambah Armada</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($vehicles as $vehicle): ?>
        <div class="glass rounded-xl p-6 shadow-xl border-l-4 border-green-700">
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-green-800"><i class="fa-solid fa-truck mr-2"></i><?= htmlspecialchars($vehicle['name']) ?></h2>
            <span class="text-sm text-gray-500 bg-green-100 px-2 py-1 rounded"><?= htmlspecialchars($vehicle['type']) ?></span>
          </div>
          <ul class="text-gray-700 text-sm space-y-2">
            <li><strong>Volume:</strong> <?= htmlspecialchars($vehicle['volume']) ?></li>
            <li><strong>Plat Nomor:</strong> <?= htmlspecialchars($vehicle['plat_number']) ?></li>
            <li><strong>Deskripsi:</strong><br> <?= nl2br(htmlspecialchars($vehicle['description'])) ?></li>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <?php include_once('../../Footer.php'); ?>
</body>
</html>
