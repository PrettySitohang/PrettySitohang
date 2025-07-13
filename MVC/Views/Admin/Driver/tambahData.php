<?php
require_once '../../../Cores/Database.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password']; // untuk keamanan sebaiknya di-hash
  $role = 'Driver';

  // Insert data ke tabel users
  $db->query("INSERT INTO users (name, username, email, password, role) 
              VALUES (:name, :username, :email, :password, :role)");
  $db->bind(':name', $name);
  $db->bind(':username', $username);
  $db->bind(':email', $email);
  $db->bind(':password', $password); // bisa pakai password_hash()
  $db->bind(':role', $role);
  $db->execute();

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Driver</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center">

  <div class="bg-white p-10 rounded-xl shadow-xl w-full max-w-lg">
    <h2 class="text-2xl font-bold text-green-800 mb-6 text-center">Tambah Data Driver</h2>
    
    <form method="POST" class="space-y-5">
      <div>
        <label class="block mb-1 text-gray-700 font-semibold">Nama</label>
        <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500">
      </div>
      <div>
        <label class="block mb-1 text-gray-700 font-semibold">Username</label>
        <input type="text" name="username" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500">
      </div>
      <div>
        <label class="block mb-1 text-gray-700 font-semibold">Email</label>
        <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500">
      </div>
      <div>
        <label class="block mb-1 text-gray-700 font-semibold">Password</label>
        <input type="text" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500">
      </div>
      <div>
        <button type="submit" class="w-full bg-green-700 text-white py-3 rounded-md font-semibold hover:bg-green-800 transition">
          Simpan
        </button>
      </div>
    </form>
  </div>

</body>
</html>
