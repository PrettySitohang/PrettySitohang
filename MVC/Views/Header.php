<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistem Monitoring CPO</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }
        .header {
            background-color: #005D9E;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: bold;
        }
        .logo img {
            width: 35px;
            height: 35px;
        }
        .tools {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .tools i {
            font-size: 18px;
            cursor: pointer;
        }
        .sign-button {
            background-color: white;
            color: #005D9E;
            padding: 6px 16px;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s ease;
        }
        .sign-button:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>

<div class="header">
    <!-- Kiri: Logo Sistem -->
    <div class="logo">
        <img src="assets/img/logo-cpo.png" alt="Logo">
        Sistem Monitoring CPO
    </div>

    <!-- Kanan: Notifikasi & Tombol Sign -->
    <div class="tools">
        <i class="fas fa-bell"></i>

        <!-- Sign in button -->
        <form action="login.php" method="get">
            <button class="sign-button" type="submit">Sign In</button>
        </form>
    </div>
</div>

</body>
</html>
