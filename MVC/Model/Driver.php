<?php
class Driver {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fungsi untuk menambahkan driver baru
    public function tambahDriver($data) {
        $query = "INSERT INTO drivers (name, username, email, password, role) 
                  VALUES (:name, :username, :email, :password, :role)";
        
        $stmt = $this->conn->prepare($query);

        // Amankan password sebelum disimpan
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $data['role']);

        return $stmt->execute(); // true jika berhasil, false jika gagal
    }

    // (Opsional) Fungsi lain misalnya: getAllDrivers(), getDriverById(), updateDriver(), deleteDriver() bisa ditambahkan di sini.
}
