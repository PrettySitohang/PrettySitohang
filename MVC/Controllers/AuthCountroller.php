<?php
require_once '../Cores/Database.php';
require_once '../Models/UserModel.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $model = new UserModel();
    $user = $model->getUser($_POST['email'], $_POST['password'], $_POST['role']);

    if ($user) {
        $_SESSION['user'] = $user;

        // Redirect berdasarkan role
        if ($user['role'] === 'Admin') {
            header("Location: ../Views/Admin/Dashboard.php");
        } elseif ($user['role'] === 'Driver') {
            header("Location: ../Views/Driver/Dashboard.php");
        }
        exit;
    } else {
        $_SESSION['login_error'] = "Login gagal. Cek kembali data Anda.";
        header("Location: ../Views/Login.php");
        exit;
    }
}
