<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Navbar CPO</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Navbar Atas -->
  <nav class="flex justify-between items-center bg-success text-white shadow-md px-4">
    <?php include_once 'Header.php'; ?>

    <!-- Tampilkan Nama User jika sudah login -->
    <?php if (isset($_SESSION['user'])): ?>
    <?php endif; ?>

    <!-- Tombol Menu -->
    <button id="menuButton" class="p-2 rounded-md bg-white text-green-700 hover:bg-gray-200 transition">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </nav>

  <!-- Sidebar Menu -->
  <div id="sidebarMenu" class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg translate-x-full transition-transform duration-300 ease-in-out z-50">
    <div class="p-6">
      <button id="closeMenu" class="text-gray-500 hover:text-red-500 float-right text-2xl font-bold">×</button>

      <ul class="mt-12 space-y-4">

        <?php if (isset($_SESSION['user'])): ?>
          <!-- Menu untuk Admin -->
          <?php if ($_SESSION['user']['role'] === 'Admin'): ?>
            <li>
              <a href="../Admin/Dashboard.php" class="block text-green-700 font-semibold hover:text-green-900">📊 Dashboard Admin</a>
            </li>
            <li>
              <a href="../Admin/Kendaraan.php" class="block text-green-700 font-semibold hover:text-green-900">🚚 Kelola Armada</a>
            </li>
            <li>
              <a href="../Admin/Jadwal/index.php" class="block text-green-700 font-semibold hover:text-green-900">🗓 Jadwal</a>
            </li>

          <!-- Menu untuk Driver -->
          <?php elseif ($_SESSION['user']['role'] === 'Driver'): ?>
            <li>
              <a href="../Driver/Dashboard.php" class="block text-green-700 font-semibold hover:text-green-900">🚛 Dashboard Driver</a>
            </li>
            <li>
              <a href="Jadwal.php" class="block text-green-700 font-semibold hover:text-green-900">📅 Jadwal</a>
            </li>
          <?php endif; ?>

          <!-- Tombol Logout -->
          <li>
            <a href="../logout.php" class="block text-red-600 font-semibold hover:text-red-800">🚪 Logout</a>
          </li>

        <?php else: ?>
          <!-- Jika belum login -->
          <li>
            <a href="../Login.php" class="block text-green-700 font-semibold hover:text-green-900">🔐 Login</a>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>

  <!-- Script Toggle -->
  <script>
    const menuButton = document.getElementById('menuButton');
    const sidebarMenu = document.getElementById('sidebarMenu');
    const closeMenu = document.getElementById('closeMenu');

    menuButton.addEventListener('click', () => {
      sidebarMenu.classList.remove('translate-x-full');
    });

    closeMenu.addEventListener('click', () => {
      sidebarMenu.classList.add('translate-x-full');
    });
  </script>

</body>
</html>
