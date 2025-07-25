<?php
session_start();
require_once '../Cores/Database.php'; // Koneksi OOP PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);

    // Gunakan class Database
    $db = new Database();
    $db->query("SELECT * FROM users WHERE name = :name AND email = :email AND role = :role");
    $db->bind(':name', $name);
    $db->bind(':email', $email);
    $db->bind(':role', $role);
    $user = $db->single();

    if ($user && $user['password'] === $password) {
        $_SESSION['user'] = $user;

        $redirectUrl = ($role === 'Admin') ? '../Views/Admin/Dashboard.php' : '../Views/Driver/Dashboard.php';

        // Tampilkan verifikasi dan redirect
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Data Terverifikasi</title>
            <meta http-equiv='refresh' content='2;url=$redirectUrl'>
            <script src='https://cdn.tailwindcss.com'></script>
        </head>
        <body class='flex items-center justify-center h-screen bg-gray-100'>
            <div class='bg-white p-10 rounded-xl shadow-lg w-[480px] text-center'>
                <img src='../gambar/logo-cpo.jpg' alt='Logo' class='w-32 mx-auto mb-5'>
                <h2 class='text-xl font-bold uppercase text-gray-700 mb-4'>Data Terverifikasi</h2>
                <div class='text-left bg-gray-100 p-5 rounded-lg'>
                    <p class='mb-2'><span class='font-semibold'>Nama:</span> $name</p>
                    <p class='mb-2'><span class='font-semibold'>Email:</span> $email</p>
                    <p class='mb-2'><span class='font-semibold'>Role:</span> $role</p>
                    <p><span class='font-semibold'>Password:</span> " . str_repeat('*', strlen($password)) . "</p>
                </div>
                <p class='mt-5 text-sm text-gray-500'>Mengalihkan ke dashboard...</p>
            </div>
        </body>
        </html>";
        exit;
    }

    // Jika gagal login
    $_SESSION['login_error'] = "Login gagal! Data tidak cocok.";
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Verifikasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
  <div class="bg-white p-10 rounded-xl shadow-lg w-[480px] text-center">
    <img src="../gambar/logo-cpo.jpg" alt="Logo CPO" class="w-32 mx-auto mb-5">
    <h2 class="text-xl font-bold text-gray-700 uppercase mb-6">Verifikasi Data</h2>

    <?php if (isset($_SESSION['login_error'])): ?>
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-5 text-left">
      <div>
        <label for="name" class="block text-sm font-semibold text-gray-600 uppercase mb-1">Nama</label>
        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
      </div>
      <div>
        <label for="email" class="block text-sm font-semibold text-gray-600 uppercase mb-1">Email</label>
        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
      </div>
      <div>
        <label for="password" class="block text-sm font-semibold text-gray-600 uppercase mb-1">Password</label>
        <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
      </div>
      <div>
        <label for="role" class="block text-sm font-semibold text-gray-600 uppercase mb-1">Login Sebagai</label>
        <select id="role" name="role" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
          <option value="">-- Pilih --</option>
          <option value="Admin">Admin</option>
          <option value="Driver">Driver</option>
        </select>
      </div>
      <div>
        <button type="submit" class="w-full bg-green-700 text-white py-3 rounded-md font-bold uppercase hover:bg-green-800 transition">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
