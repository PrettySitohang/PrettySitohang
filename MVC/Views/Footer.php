<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Footer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
  <!-- Konten halaman dummy -->
  <div class="flex-grow">
    <!-- Konten utama halaman -->
    
  </div>
  <!-- Footer normal yang bisa scroll -->
  <footer class="bg-green-700 text-white pt-2 mb-2 shadow-inner ">
    <div class="container mx-auto py-2">
      <div class="flex justify-between ">

        <!-- Info Sistem -->
        <div class="w-full md:w-1/2 mb-4 items-center">
          <h5 class="uppercase font-semibold mb-2 ml-4 text-sm">Monitoring Transportasi CPO</h5>
          <p class="text-xs text-gray-300 ml-4">
            Sistem untuk memantau armada dan pengiriman CPO secara cepat dan efisien.
          </p>
        </div>

        <!-- Kontak horizontal -->
        <div class="w-full md:w-1/2 m-2 text-center">
          <div class="flex flex-row space-x-6 text-xs text-gray-300  ">
            <div class="flex items-center space-x-1">
              <span><span><i class="fa-solid fa-envelope"></i></span></span>
              <span>info@cpo-monitoring.id</span>
            </div>
            <div class="flex items-center space-x-1">
              <span><i class="fa-solid fa-phone"></i></span>
              <span>+62 812-3456-7890</span>
            </div>
            <div class="flex items-center space-x-1">
              <span><i class="fa-solid fa-location-dot"></i></span>
              <span>Pekanbaru, Indonesia</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright sticky (tetap di bawah layar) -->
  <div class="fixed bottom-0 left-0 w-full bg-green-800 text-center text-xs text-gray-300 py-2 z-50">
    &copy; <?php echo date("Y"); ?> Sistem Monitoring CPO. All rights reserved.
  </div>

</body>
</html>
