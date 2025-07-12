<?php
session_start();
require_once 'D:\MyProjek\XAMM\htdocs\GithubPretty\PrettySitohang\MVC\Cores\Database.php';
$db = new Database();

// Ambil satu driver acak
$db->query("SELECT name FROM users WHERE role = 'Driver' ORDER BY RAND() LIMIT 1");
$driver = $db->single();
$driver_name = $driver ? $driver['name'] : 'Tidak ada driver';

// Simpan ke session agar bisa di index.php
$_SESSION['latest_driver_name'] = $driver_name;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $departure_date = $_POST['departure_date'];
    $from = $_POST['from'];
    $destination = $_POST['destination'];
    $total_teams = $_POST['total_teams'];
    $quantity_of_cpo = $_POST['quantity_of_cpo'];
    $estimation_arrival_date = $_POST['estimation_arrival_date'];

    $db->query("INSERT INTO trips (departure_date, `from`, destination, total_teams, quantity_of_cpo, estimation_arrival_date, created_at) 
                VALUES (:departure_date, :from, :destination, :total_teams, :quantity_of_cpo, :estimation_arrival_date, CURRENT_TIMESTAMP)");
    $db->bind(':departure_date', $departure_date);
    $db->bind(':from', $from);
    $db->bind(':destination', $destination);
    $db->bind(':total_teams', $total_teams);
    $db->bind(':quantity_of_cpo', $quantity_of_cpo);
    $db->bind(':estimation_arrival_date', $estimation_arrival_date);
    $db->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Jadwal</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-2xl">
    <h2 class="text-2xl font-bold text-green-700 mb-4 text-center">Tambah Jadwal Perjalanan</h2>

    <div class="mb-4 p-3 bg-green-100 border border-green-300 rounded text-green-800 text-center">
      <strong>Driver yang Bertugas:</strong> <?= htmlspecialchars($driver_name) ?>
    </div>

    <form method="post" class="space-y-5">
      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Berangkat</label>
        <input type="datetime-local" name="departure_date" required
               class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-700">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">Lokasi Awal</label>
        <input type="text" name="from" required
               class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-700">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">Lokasi Tujuan</label>
        <input type="text" name="destination" required
               class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-700">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Tim</label>
        <input type="text" name="total_teams" required
               class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-700">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah CPO (L)</label>
        <input type="number" name="quantity_of_cpo" required
               class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-700">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">Estimasi Tiba</label>
        <input type="datetime-local" name="estimation_arrival_date" required
               class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-700">
      </div>
      <div>
        <button type="submit"
                class="w-full bg-green-700 text-white py-3 rounded-md font-bold uppercase hover:bg-green-800 transition">
          Simpan
        </button>
      </div>
    </form>
  </div>
</body>
</html>
