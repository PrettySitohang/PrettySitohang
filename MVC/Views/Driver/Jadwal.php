<?php
require_once '../../Cores/Database.php'; // Koneksi OOP PDO

$db = new Database();

// Ambil semua data trip dengan driver yang memiliki role driver
$db->query("
  SELECT 
    trips.*, 
    users.name AS driver_name
  FROM trips
  LEFT JOIN trip_has_vehicles ON trips.id = trip_has_vehicles.trip_id
  LEFT JOIN users ON trip_has_vehicles.driver_id = users.id
  WHERE users.role = 'Driver'
  ORDER BY departure_date DESC
");
$trips = $db->resultSet();
?>

<?php include_once('../Navbar.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Jadwal Pengiriman</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-b from-green-50 via-white to-green-100 min-h-screen flex flex-col">

<main class="container mx-auto px-6 py-10 flex-grow">
  <!-- Header -->
  <div class="mb-8 flex items-center gap-4">
    <div class="bg-green-100 text-green-700 p-3 rounded-full">
      <i class="fas fa-calendar-check text-xl"></i>
    </div>
    <div>
      <h1 class="text-3xl font-bold text-green-800">Jadwal Pengiriman Aktif</h1>
      <p class="text-gray-600">Lihat dan kelola pengiriman mendatang untuk armada Anda.</p>
    </div>
  </div>

  <!-- Search -->
  <div class="mb-8 relative w-full md:w-1/2">
    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-green-600">
      <i class="fas fa-search"></i>
    </span>
    <input type="text" id="searchInput" placeholder="Cari nama driver, rute, atau status..." 
           class="pl-10 pr-4 py-2 w-full border border-green-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 bg-white"/>
  </div>

  <!-- Jadwal Cards -->
  <div id="cardContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($trips as $trip): ?>
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
      <div class="flex items-center justify-between mb-2">
        <h3 class="text-lg font-semibold text-green-800"><?= htmlspecialchars($trip['driver_name'] ?? '-') ?></h3>
        <span class="text-sm text-gray-500">
          <i class="fas fa-calendar-day mr-1"></i> <?= date('d M Y', strtotime($trip['departure_date'])) ?>
        </span>
      </div>
      <p class="text-gray-700 mb-4">
        <i class="fas fa-map-marker-alt text-green-600 mr-1"></i> <?= htmlspecialchars($trip['from']) ?> → <?= htmlspecialchars($trip['destination']) ?>
      </p>
      <?php
        $status = strtolower($trip['status']);
        $label = '';
        $style = '';
        if ($status === 'on the way') {
          $label = 'Menunggu';
          $style = 'text-blue-700 bg-blue-100';
        } elseif ($status === 'arrived') {
          $label = 'Tiba';
          $style = 'text-green-700 bg-green-100';
        } else {
          $label = 'Tertunda';
          $style = 'text-yellow-800 bg-yellow-100';
        }
      ?>
      <span class="inline-flex items-center gap-1 <?= $style ?> px-3 py-1 rounded-full text-sm font-semibold">
        <i class="fas fa-circle"></i> <?= $label ?>
      </span>
    </div>
    <?php endforeach; ?>
  </div>
</main>

<!-- Footer -->
<?php include_once('../../Footer.php'); ?>

<!-- Script pencarian -->
<script>
  const searchInput = document.getElementById('searchInput');
  const cards = document.getElementById('cardContainer').children;

  searchInput.addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    for (let card of cards) {
      const text = card.textContent.toLowerCase();
      card.style.display = text.includes(filter) ? '' : 'none';
    }
  });
</script>
</body>
</html>
