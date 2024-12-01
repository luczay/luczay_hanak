<?php
require_once 'db.php'; 

class FelhasznalokModel {
    private $db;

    public function __construct() {
        $database = new DatabaseHandle();
        $this->db = $database->connect();
    }

    public function getFelhasznaloAll() {
        $query = 'SELECT * FROM felhasznalo';

        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeFelhasznalo($az) {
        $sql = "DELETE FROM felhasznalo WHERE az = :az";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':az', $az, PDO::PARAM_INT);

        $stmt->execute();
    }
}
?>