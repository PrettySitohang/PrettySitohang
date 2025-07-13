<?php
class TripModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function tambahTrip($data) {
        $this->db->query("INSERT INTO trips (departure_date, `from`, destination, total_teams, quantity_of_cpo, estimation_arrival_date, created_at)
                          VALUES (:departure_date, :from, :destination, :total_teams, :quantity_of_cpo, :estimation_arrival_date, CURRENT_TIMESTAMP)");
        $this->db->bind(':departure_date', $data['departure_date']);
        $this->db->bind(':from', $data['from']);
        $this->db->bind(':destination', $data['destination']);
        $this->db->bind(':total_teams', $data['total_teams']);
        $this->db->bind(':quantity_of_cpo', $data['quantity_of_cpo']);
        $this->db->bind(':estimation_arrival_date', $data['estimation_arrival_date']);
        return $this->db->execute();
    }
}
