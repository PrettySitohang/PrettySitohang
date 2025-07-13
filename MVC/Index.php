<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sistem Monitoring CPO</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-100 via-white to-green-200 flex flex-col items-center justify-center text-center px-6">

  <div class="bg-white rounded-xl shadow-xl p-10 max-w-2xl w-full">
    <img src="gambar/logo-cpo.jpg" alt="Logo CPO" class="w-24 mx-auto mb-6 rounded-md">

    <h1 class="text-3xl font-bold text-green-800 mb-4">Selamat Datang di Sistem Monitoring CPO</h1>
    <p class="text-gray-600 mb-6">Kelola pengiriman, armada, dan tim Anda secara efisien dan terstruktur.</p>

    <?php if (isset($_SESSION['user'])): ?>
      <div class="bg-green-100 p-4 rounded-md mb-4 text-green-800">
        Anda login sebagai <strong><?= htmlspecialchars($_SESSION['user']['name']) ?></strong> (<?= $_SESSION['user']['role'] ?>)
      </div>
      <?php if ($_SESSION['user']['role'] === 'Admin'): ?>
        <a href="Views/Admin/Dashboard.php" class="inline-block bg-green-700 text-white px-6 py-3 rounded-md font-bold hover:bg-green-800 transition">Ke Dashboard Admin</a>
      <?php elseif ($_SESSION['user']['role'] === 'Driver'): ?>
        <a href="Views/Driver/Dashboard.php" class="inline-block bg-green-700 text-white px-6 py-3 rounded-md font-bold hover:bg-green-800 transition">Ke Dashboard Driver</a>
      <?php endif; ?>
    <?php else: ?>
      <a href="Login.php" class="inline-block bg-green-600 text-white px-6 py-3 rounded-md font-bold hover:bg-green-700 transition">Login Sekarang</a>
    <?php endif; ?>
  </div>

  <p class="text-sm text-gray-400 mt-8">&copy; <?= date('Y') ?> Sistem Monitoring CPO. All rights reserved.</p>

</body>
</html>
