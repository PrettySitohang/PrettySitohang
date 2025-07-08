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

  <!-- Tombol Hamburger -->
  <nav class="flex justify-between  bg-success shadow-md ">
    <?php include_once 'Header.php'; ?>
    <button id="menuButton" class="p-2 m-8 rounded-md border h-10 bg-white hover:bg-gray-200 transition">
      <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </nav>

  <!-- Sidebar Menu di Kanan -->
  <div id="sidebarMenu" class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg translate-x-full transition-transform duration-300 ease-in-out z-50">
    <div class="p-6">
      <button id="closeMenu" class="text-gray-500 hover:text-red-500 float-right text-2xl font-bold">×</button>
      <ul class="mt-12 space-y-4">
        <li><a href="Login.php" class="block text-green-700 font-semibold hover:text-green-900">🔐 Login</a></li>
        <li><a href="Login.php" class="block text-green-700 font-semibold hover:text-green-900">📊 Dashboard</a></li>
        <li><a href="Dashboard.php" class="block text-green-700 font-semibold hover:text-green-900">🚚 Pengiriman</a></li>
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