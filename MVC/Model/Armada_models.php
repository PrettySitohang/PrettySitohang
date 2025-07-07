<?php

class Armada_model
{
    private $table = 'vehicles';
    private $db;

    public function __construct()
    {
        $this->db = new Database; // Memanggil class Database di folder Cores
    }

    public function getAllArmada()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function getArmadaById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahArmada($data)
    {
        $query = "INSERT INTO $this->table (name, type, volume, plat_number, description) 
                  VALUES (:name, :type, :volume, :plat_number, :description)";

        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':plat_number', $data['plat_number']);
        $this->db->bind(':description', $data['description']);

        return $this->db->execute();
    }

    public function updateArmada($data)
    {
        $query = "UPDATE $this->table SET 
                    name = :name,
                    type = :type,
                    volume = :volume,
                    plat_number = :plat_number,
                    description = :description
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':plat_number', $data['plat_number']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    }

    public function hapusArmada($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
