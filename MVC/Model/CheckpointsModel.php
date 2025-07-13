<?php
class CheckpointsModel {
  private $db;

  public function __construct($conn) {
    $this->db = $conn;
  }

  public function getCheckpointsByTripId($trip_id) {
    $this->db->query("SELECT * FROM checkpoints WHERE trip_id = :trip_id ORDER BY id ASC");
    $this->db->bind(':trip_id', $trip_id);
    return $this->db->resultSet();
  }

  public function updateCheckpoint($id, $is_checked, $notes, $admin_id) {
     $this->db->query("UPDATE checkpoints 
                    SET is_checked = :checked, notes = :notes, admin_id = :admin 
                    WHERE id = :id");

  $this->db->bind(':checked', $is_checked);
  $this->db->bind(':notes', $notes);
  $this->db->bind(':admin', $admin_id);
  $this->db->bind(':id', $id);
    return $this->db->execute();
  }
}