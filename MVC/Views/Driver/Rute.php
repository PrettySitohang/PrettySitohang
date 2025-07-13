<?php include_once('../../Controllers/CheckpointsController.php'); ?>
<?php include_once('../Navbar.php'); ?>
<?php

  // Buat progress bar agar tidak error
$checkedCheckpoints = 0;
foreach ($checkpoints as $c) {
  if ($c['is_checked']) $checkedCheckpoints++;
}
$progressPercent = min(100, round(($checkedCheckpoints / 4) * 100));


  $origin = urlencode($trip['from']);
  $destination = urlencode($trip['destination']);
  $mapsUrl = "https://www.google.com/maps/dir/$origin/$destination";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rute Pengiriman</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    .checkpoint:before {
      content: '';
      position: absolute;
      left: 1rem;
      top: 1.5rem;
      width: 2px;
      height: 100%;
      background: #D1FAE5;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen flex flex-col">

<main class="container mx-auto px-6 py-10 flex-grow">
  <!-- Header -->
  <div class="mb-10 flex items-center gap-4">
    <div class="bg-green-100 text-green-700 p-3 rounded-full">
      <i class="fas fa-route text-xl"></i>
    </div>
    <div>
      <h1 class="text-3xl font-bold text-green-800">
  Rute Pengiriman (<?= htmlspecialchars($trip['from']) ?> → <?= htmlspecialchars($trip['destination']) ?>)
</h1>
    </div>
  </div>

  <!-- Informasi Pengiriman -->
  <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
      <div>
        <p class="text-gray-700">
  <i class="fas fa-user mr-1 text-green-600"></i> 
  Driver: <strong><?= htmlspecialchars($trip['driver_name'] ?? 'Belum ditentukan') ?></strong>
</p>
<p class="text-gray-700">
  <i class="fas fa-calendar-alt mr-1 text-green-600"></i> 
  Tanggal: <?= date('d F Y', strtotime($trip['departure_date'])) ?>
</p>

      </div>
      <a href="<?= $mapsUrl ?>" target="_blank" 
        class="mt-4 md:mt-0 inline-flex items-center gap-2 px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-800 transition">
        <i class="fas fa-map"></i> Lihat Peta
      </a>
    </div>

    <!-- Progress Bar -->
    <div class="mt-6">
      <p class="text-sm font-medium text-green-700 mb-2">Progress Perjalanan</p>
      <div class="w-full bg-green-100 rounded-full h-4">
        <div class="bg-green-600 h-4 rounded-full transition-all duration-700" style="width: <?= $progressPercent ?>%;"></div>
      </div>
      <p class="text-right text-xs text-gray-500 mt-1"><?= $progressPercent ?>% selesai</p>
    </div>
  </div>

  <!-- Timeline Checkpoint Dinamis -->
<div class="relative ml-4 checkpoint space-y-10">
  <?php foreach ($checkpoints as $index => $checkpoint): ?>
    <form method="POST" action="" class="relative pl-10 bg-white rounded-lg p-4 shadow">

      <!-- Icon -->
      <div class="absolute -left-3 top-0 w-6 h-6 flex items-center justify-center rounded-full shadow-md
        <?= $checkpoint['is_checked'] ? 'bg-green-600 text-white' : 'bg-gray-400 text-white' ?>">
        <i class="fas <?= $checkpoint['is_checked'] ? 'fa-check' : ($index == 0 ? 'fa-play' : 'fa-truck') ?> text-xs"></i>
      </div>

      <!-- Nama Checkpoint -->
      <h3 class="text-lg font-semibold text-gray-800">
        Checkpoint <?= $index + 1 ?>: <?= htmlspecialchars($checkpoint['notes']) ?>
      </h3>

      <p class="text-gray-600">
        <?= $checkpoint['is_checked'] ? 'Sudah dilewati' : ($index == 0 ? 'Berangkat pukul 07:00 WIB' : 'Sedang menuju checkpoint...') ?>
      </p>

      <!-- Badges -->
      <?php if ($checkpoint['is_checked']): ?>
        <span class="inline-block mt-2 px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">✔ Sudah Diperiksa</span>
      <?php elseif ($index == 0): ?>
        <span class="inline-block mt-2 px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">✔ Berangkat</span>
      <?php elseif ($index == count($checkpoints) - 1): ?>
        <span class="inline-block mt-2 px-3 py-1 bg-gray-200 text-gray-700 rounded-full text-xs font-semibold">⏳ Belum Tiba</span>
      <?php else: ?>
        <span class="inline-block mt-2 px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">🕒 Dalam Perjalanan</span>
      <?php endif; ?>

      <!-- Form Update -->
      <input type="hidden" name="checkpoint_id" value="<?= $checkpoint['id'] ?>">
      <input type="hidden" name="trip_id" value="<?= $checkpoint['trip_id'] ?>">

      <div class="mt-4 flex items-center gap-2">
        <select name="is_checked" class="text-sm border px-2 py-1 rounded">
          <option value="0" <?= $checkpoint['is_checked'] == 0 ? 'selected' : '' ?>>Belum Diperiksa</option>
          <option value="1" <?= $checkpoint['is_checked'] == 1 ? 'selected' : '' ?>>Sudah Diperiksa</option>
        </select>

        <input type="text" name="notes" value="<?= htmlspecialchars($checkpoint['notes']) ?>" class="text-sm border px-2 py-1 rounded w-full">
        
        <button type="submit" name="update_checkpoint" class="text-sm bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">
          Update
        </button>
      </div>
    </form>
  <?php endforeach; ?>
</div>

</main>

<!-- Footer -->
<?php include_once('../Footer.php'); ?>
</body>
</html>