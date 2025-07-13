<?php
require_once '../../../Cores/Database.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $volume = $_POST['volume'];
  $plat_number = $_POST['plat_number'];
  $description = $_POST['description'];

  $db->query("INSERT INTO vehicles (name, type, volume, plat_number, description) VALUES (:name, :type, :volume, :plat_number, :description)");
  $db->bind(':name', $name);
  $db->bind(':type', $type);
  $db->bind(':volume', $volume);
  $db->bind(':plat_number', $plat_number);
  $db->bind(':description', $description);
  $db->execute();

  header('Location: index.php');
  exit;
}
?>

<?php include_once('../../Navbar.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Armada</title>
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
      background-color: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center">
  <div class="glass max-w-2xl w-full p-8  shadow-2xl">
    <h1 class="text-3xl font-bold text-green-800 mb-6 text-center">Tambah Data Armada</h1>

    <form method="post" class="space-y-5">
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Nama Kendaraan</label>
        <input type="text" name="name" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-700">
      </div>
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Tipe</label>
        <select name="type" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-700">
          <option value="">-- Pilih Tipe --</option>
          <option value="small">Small</option>
          <option value="big">Big</option>
          <option value="jumbo">Jumbo</option>
        </select>
      </div>
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Volume</label>
        <input type="text" name="volume" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-700">
      </div>
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Plat Nomor</label>
        <input type="text" name="plat_number" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-700">
      </div>
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Deskripsi</label>
        <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-700"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-6 rounded-lg transition">Simpan</button>
      </div>
    </form>
  </div>
  <?php include_once('../../Footer.php'); ?>
</body>
</html>
