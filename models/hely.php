<?php
require_once 'db.php'; // Adjust the path as needed

class HelyModel {
    private $db;

    public function __construct() {
        $database = new DatabaseHandle();
        $this->db = $database->connect();
    }

    public function getHely($az = null, $telepules = null, $utca = null) {
        // WHERE 1 mindig true lesz, így ez egy egyszerűsítés, hogy string concat egyszerűbb legyen
        $query = 'SELECT * FROM hely WHERE 1';
    
        $params = [];
    
        if ($az !== null) {
            $query .= ' AND az = :az';
            $params[':az'] = $az;
        }
    
        if ($telepules !== null) {
            $query .= ' AND telepules = :telepules';
            $params[':telepules'] = $telepules;
        }
    
        if ($utca !== null) {
            $query .= ' AND utca LIKE :utca';
            $params[':utca'] = '%' . $utca . '%'; 
        }
    
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>