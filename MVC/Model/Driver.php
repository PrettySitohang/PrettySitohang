<?php
class Driver
{
    private $conn;
    private $table = "users";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Ambil semua driver (role = 'driver')
    public function getAllDrivers()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE role = 'driver'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Ambil satu driver berdasarkan ID
    public function getDriverById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? AND role = 'driver'";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Tambah driver baru
    public function createDriver($name, $username, $email, $password)
    {
        $role = 'driver';
        $query = "INSERT INTO " . $this->table . " (name, username, email, password, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss", $name, $username, $email, $password, $role);
        return $stmt->execute();
    }

    // Update data driver
    public function updateDriver($id, $name, $username, $email, $password)
    {
        $query = "UPDATE " . $this->table . " 
                  SET name = ?, username = ?, email = ?, password = ?
                  WHERE id = ? AND role = 'driver'";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $name, $username, $email, $password, $id);
        return $stmt->execute();
    }

    // Hapus driver
    public function deleteDriver($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = ? AND role = 'driver'";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Ambil semua trip yang dimiliki oleh driver ini
    public function getTripsByDriver($driver_id)
    {
        $query = "SELECT t.*, v.name AS vehicle_name
                  FROM trip_has_vehicles thv
                  JOIN trips t ON thv.trip_id = t.id
                  JOIN vehicles v ON thv.vehicle_id = v.id
                  WHERE thv.driver_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $driver_id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>