<?php
require_once 'D:\MyProjek\XAMM\htdocs\GithubPretty\PrettySitohang\MVC\Cores\Database.php';
$db = new Database();

// Ambil salah satu driver dari tabel users
$db->query("SELECT name FROM users WHERE role = 'Driver' LIMIT 1");
$driver = $db->single();
$driverName = $driver ? $driver['name'] : 'Driver Tidak Ditemukan';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $departure_date = $_POST['departure_date'];
    $from = $_POST['from'];
    $destination = $_POST['destination'];

    // Simpan ke session agar bisa dipakai di index.php
    $_SESSION['latest_driver_name'] = $driverName;

    $db->query("INSERT INTO trips (departure_date, `from`, destination) 
                VALUES (:departure_date, :from, :destination)");
    $db->bind(':departure_date', $departure_date);
    $db->bind(':from', $from);
    $db->bind(':destination', $destination);
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
  <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-lg">
    <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Tambah Jadwal Perjalanan</h2>

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
      <div class="text-sm text-gray-600">Driver yang bertugas: <strong><?= $driverName ?></strong></div>
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
