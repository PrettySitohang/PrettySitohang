<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Koneksi dari Cores/Database.php
    }

    public function getUser($email, $password, $role) {
        $this->db->query("SELECT * FROM users WHERE email = :email AND role = :role");
        $this->db->bind(':email', $email);
        $this->db->bind(':role', $role);
        $user = $this->db->single();

        if ($user && $user['password'] === $password) {
            return $user;
        }
        return false;
    }
}
    