<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen flex flex-col">    
     
  <?php include_once('../Navbar.php'); ?>

  <!-- Content -->
  <main class="flex-grow container mx-auto px-6 py-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">

      <!-- Histori -->
      <div class="bg-white shadow-xl rounded-xl p-6 flex flex-col justify-between h-full border-t-4 border-green-600">
        <div>
          <div class="flex items-center space-x-4 mb-4">
            <i class="fas fa-clock text-green-700 text-2xl"></i>
            <h2 class="text-xl font-semibold text-gray-800">Histori Pengiriman</h2>
          </div>
          <p class="text-gray-600 text-sm">Riwayat pengiriman barang yang sudah dilakukan oleh driver.</p>
        </div>
        <div class="mt-6">
          <a href="Histori/index.php" class="inline-flex items-center gap-2 bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition text-sm">
            <i class="fas fa-arrow-right"></i> Lihat Histori
          </a>
        </div>
      </div>

      <!-- Jadwal -->
      <div class="bg-white shadow-xl rounded-xl p-6 flex flex-col justify-between h-full border-t-4 border-green-600">
        <div>
          <div class="flex items-center space-x-4 mb-4">
            <i class="fas fa-calendar-alt text-green-700 text-2xl"></i>
            <h2 class="text-xl font-semibold text-gray-800">Jadwal</h2>
          </div>
          <p class="text-gray-600 text-sm">Jadwal pengiriman dan aktivitas driver berikutnya.</p>
        </div>
        <div class="mt-6">
          <a href="Jadwal.php" class="inline-flex items-center gap-2 bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition text-sm">
            <i class="fas fa-arrow-right"></i> Lihat Jadwal
          </a>
        </div>
      </div>

      <!-- Rute -->
      <div class="bg-white shadow-xl rounded-xl p-6 flex flex-col justify-between h-full border-t-4 border-green-600">
        <div>
          <div class="flex items-center space-x-4 mb-4">
            <i class="fas fa-route text-green-700 text-2xl"></i>
            <h2 class="text-xl font-semibold text-gray-800">Rute Pengiriman</h2>
          </div>
          <p class="text-gray-600 text-sm">Petunjuk dan peta rute perjalanan menuju lokasi tujuan.</p>
        </div>
        <div class="mt-6">
          <a href="Rute.php" class="inline-flex items-center gap-2 bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition text-sm">
            <i class="fas fa-arrow-right"></i> Lihat Rute
          </a>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <?php include_once('../Footer.php'); ?>
</body>
</html>
