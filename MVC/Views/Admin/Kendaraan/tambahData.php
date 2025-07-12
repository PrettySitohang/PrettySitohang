<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Data Armada</title>

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

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />
</head>


<body class="min-h-screen bg-gradient-to-br from-primary-100 via-white to-primary-200 flex items-center justify-center px-4 py-12">
  <div class="bg-white bg-opacity-90 backdrop-blur-xl shadow-2xl rounded-3xl p-10 w-full max-w-2xl transition-all duration-500 hover:shadow-primary-200">
    <h1 class="text-4xl font-extrabold text-primary-700 text-center mb-10 tracking-tight">
      <i class="fa-solid fa-truck mr-2"></i>Tambah Data Armada
    </h1>

    <form action="" method="post" class="space-y-6">
      <!-- Nama Kendaraan -->
      <div>
        <label for="name" class="block text-lg font-medium text-primary-700 mb-1">Nama Kendaraan</label>
        <input type="text" id="name" name="name" required
          class="w-full px-5 py-3 border border-primary-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition duration-200" />
      </div>

      <!-- Tipe Kendaraan -->
      <div>
        <label for="type" class="block text-lg font-medium text-primary-700 mb-1">Tipe Kendaraan</label>
        <select id="type" name="type" required
          class="w-full px-5 py-3 border border-primary-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 transition duration-200">
          <option value="">-- Pilih Tipe --</option>
          <option value="small">Small</option>
          <option value="big">Big</option>
          <option value="jumbo">Jumbo</option>
        </select>
      </div>

      <!-- Volume -->
      <div>
        <label for="volume" class="block text-lg font-medium text-primary-700 mb-1">Volume</label>
        <input type="text" id="volume" name="volume" required
          class="w-full px-5 py-3 border border-primary-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition duration-200" />
      </div>

      <!-- Plat Nomor -->
      <div>
        <label for="plat_number" class="block text-lg font-medium text-primary-700 mb-1">Plat Nomor</label>
        <input type="text" id="plat_number" name="plat_number" required
          class="w-full px-5 py-3 border border-primary-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition duration-200" />
      </div>

      <!-- Deskripsi -->
      <div>
        <label for="description" class="block text-lg font-medium text-primary-700 mb-1">Deskripsi</label>
        <textarea id="description" name="description" rows="4"
          class="w-full px-5 py-3 border border-primary-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition duration-200"></textarea>
      </div>

      <!-- Tombol Simpan -->
      <div class="text-center pt-4">
        <button type="submit" name="submit"
          class="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-10 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
          <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan
        </button>
      </div>
    </form>
  </div>

</body>
</html>
