<?php
session_start();
include_once '../config/koneksi.php'; // koneksi ke DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = trim($_POST['nama']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role     = trim($_POST['role']);

    // Query untuk cek data di database
    $stmt = $conn->prepare("SELECT * FROM users WHERE nama = ? AND email = ? AND role = ?");
    $stmt->bind_param("sss", $nama, $email, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah data ditemukan
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Cek password (plain text atau hash tergantung data kamu)
        if ($user['password'] === $password) {
            $_SESSION['user'] = $user;

            // Tampilkan loading verifikasi lalu redirect
            echo "<!DOCTYPE html>
            <html lang='id'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='refresh' content='2;url=/admin/dashboard.php'>
                <title>Verifikasi</title>
                <script src='https://cdn.tailwindcss.com'></script>
            </head>
            <body class='flex items-center justify-center h-screen bg-gray-100'>
              <div class='bg-white p-10 rounded-xl shadow-lg w-[480px] text-center'>
                <img src='../gambar/logo-cpo.jpg' alt='Logo' class='w-32 mx-auto mb-5'>
                <h2 class='text-xl font-bold uppercase text-gray-700 mb-4'>Data Terverifikasi</h2>
                <div class='text-left bg-gray-100 p-5 rounded-lg'>
                  <p class='mb-2'><span class='font-semibold'>Nama:</span> {$user['nama']}</p>
                  <p class='mb-2'><span class='font-semibold'>Email:</span> {$user['email']}</p>
                  <p><span class='font-semibold'>Role:</span> {$user['role']}</p>
                </div>
                <p class='mt-5 text-sm text-gray-500'>Mengalihkan ke dashboard...</p>
              </div>
            </body>
            </html>";
            exit;
        }
    }

    // Jika gagal login
    $_SESSION['login_error'] = "Login gagal! Data tidak sesuai.";
    header("Location: ../Views/login.php");
    exit;
}
?>
