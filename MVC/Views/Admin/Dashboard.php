<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('http://localhost/GithubPretty/PrettySitohang/MVC/gambar/logo-cpo.jpg'); /* Gambar latar belakang */
            background-size: cover;
            background-color: rgba(19, 81, 10, 0.5);
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            margin: 10;
            min-height: 500vh;
            height: auto;
        }

        .bg-blur {
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px); /* Aktifkan blur */
        }
    </style>
</head>

<body class=" min-h-screen">
<?php include_once '../Navbar.php'; ?>
   <main class="flex items-center justify-center">
     <div class=" w-full px-8 py-10">
        <div class="bg-blur rounded-x shadow-2xl overflow-hidden p-8 ">
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
                        <a href="rute/index.php" class="group">
                        <div class="text-center">
                                <button class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2 rounded-md transition">
                                    Masuk
                                </button>
                            </a>
                        </div>
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
    </main>

    <!-- JS Ganti Nama Admin -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // const adminName = "<?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Admin'; ?>";
            document.getElementById('welcome-title').textContent = `Selamat Datang di Bagian ${adminName}`;
        });
    </script>
   </div>
<?php include_once '../Footer.php'; ?>
</body>
</html>
