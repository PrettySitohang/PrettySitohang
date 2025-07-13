<?php
require_once 'D:\MyProjek\XAMM\htdocs\GithubPretty\PrettySitohang\MVC\Models\TripModel.php';

class Armada {
    private $model;

    public function __construct() {
        $this->model = new TripModel();
    }

    public function tambah() {
        session_start();

        // Ambil nama driver dari session login
        $driverName = $_SESSION['user']['name'] ?? null;
        $_SESSION['latest_driver_name'] = $driverName;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->tambahTrip($_POST);
            header("Location:../Views/Driver/Jadwal/index.php?page=trip");
            exit;
        }

        $data['title'] = 'Tambah Jadwal';
        require_once '../Views/Driver/Jadwal/tambahData.php';
    }
}
