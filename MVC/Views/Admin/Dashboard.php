<?php
require_once __DIR__ .'/../../Cores/Database.php'; 
$db = new Database();

$db->query("SELECT * FROM trips ORDER BY created_at DESC");
$trips = $db->resultSet();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transport Management Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#e2f7e9',
                            200: '#c5efd3',
                            300: '#99e2b4',
                            400: '#65ce8f',
                            500: '#3dbd73',
                            600: '#1a8641',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            margin: 0;
            min-height: 100vh;
        }
    </style>
</head>
<body class="min-h-screen relative">

<!-- Background Transparan -->
<div class="absolute inset-0 z-0">
    <div class="w-full h-full bg-cover bg-center" style="
        background-image: url('../../gambar/logo-cpo.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    "></div>
</div>

<!-- Konten Utama -->
<div class="relative z-10">
    <?php include_once '../Navbar.php'; ?>

    <main class="flex items-center justify-center bg-transparent min-h-screen">
        <div class="w-full px-8 py-10">
            <div class="bg-white bg-opacity-80 backdrop-blur-md rounded-xl shadow-2xl overflow-hidden p-8">
                <div class="text-center border-b border-primary-200 pb-6 mb-8">
                    <h1 id="welcome-title" class="text-3xl font-bold text-primary-700">Selamat Datang di Bagian</h1>
                    <p class="text-primary-600 mt-1 text-lg">Sistem Manajemen Transportasi CPO</p>
                </div>

                <!-- Menu Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:height-auto">
                    <!-- Kendaraan -->
                    <div class="bg-white bg-opacity-70 rounded-lg p-6 border-l-4 border-primary-600 shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="text-4xl mb-4 text-center text-primary-600">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-center text-primary-700">Kendaraan</h3>
                        <p class="text-center text-primary-600 text-sm mb-4">Kelola data kendaraan</p>
                        <a href="Kendaraan/index.php" class="group">
                            <div class="text-center">
                                <button class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2 rounded-md transition">
                                    Masuk
                                </button>
                            </div>
                        </a>
                    </div>

                    <!-- Rute -->
                    <div class="bg-white bg-opacity-70 rounded-lg p-6 border-l-4 border-primary-600 shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="text-4xl mb-4 text-center text-primary-600">
                            <i class="fa-solid fa-map"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-center text-primary-700">Rute</h3>
                        <p class="text-center text-primary-600 text-sm mb-4">Pantau dan kelola rute</p>
                        <a href="../Driver/Rute.php" class="group">
                            <div class="text-center">
                                <button class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2 rounded-md transition">
                                    Masuk
                                </button>
                            </div>
                        </a>
                    </div>

                    <!-- Driver -->
                    <div class="bg-white bg-opacity-70 rounded-lg p-6 border-l-4 border-primary-600 shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="text-4xl mb-4 text-center text-primary-600">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-center text-primary-700">Driver</h3>
                        <p class="text-center text-primary-600 text-sm mb-4">Kelola data driver</p>
                        <a href="Driver/index.php" class="group">
                            <div class="text-center">
                                <button class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2 rounded-md transition">
                                    Masuk
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once '../Footer.php'; ?>
</div>

<!-- Script Ganti Nama Admin -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const adminName = "<?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Admin'; ?>";
        document.getElementById('welcome-title').textContent = `Selamat Datang di Bagian ${adminName}`;
    });
</script>

</body>
</html>
