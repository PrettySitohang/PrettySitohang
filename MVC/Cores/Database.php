<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'projek_monitoringcpo_10';

    private $dbh;   // PDO handler
    private $stmt;  // Statement handler

    public function __construct()
    {
        // Data Source Name (DSN)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die('Koneksi DB Gagal: ' . $e->getMessage());
        }
    }

    // Kembalikan koneksi PDO (untuk penggunaan di luar class ini)
    public function connect()
    {
        return $this->dbh;
    }

    // Buat dan simpan query
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Binding data ke query
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Eksekusi query
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Ambil semua hasil
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil 1 baris saja
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Hitung baris
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    public function lastInsertId()
{
    return $this->dbh->lastInsertId();
}

}
