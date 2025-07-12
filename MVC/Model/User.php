<?php
class User extends Database {
    public function getRandomDriverName() {
        $this->query("SELECT name FROM users WHERE role = 'Driver' ORDER BY RAND() LIMIT 1");
        $result = $this->single();
        $name = $result['name'] ?? 'Driver Tidak Ditemukan';

        // Simpan ke session
        $_SESSION['selected_driver_name'] = $name;

        return $name;
    }
}
