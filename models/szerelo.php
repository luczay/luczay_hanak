<?php
require_once 'userDatabase.php';

class SzereloModel {
    private $db;

    public function __construct() {
        $database = new UserDatabase();
        $this->db = $database->getConnection();
    }

    public function getSzerelo($az = null, $kezdev = null, $nev = null) {
        // WHERE 1 mindig true lesz, így ez egy egyszerűsítés, hogy string concat egyszerűbb legyen
        $query = 'SELECT * FROM szerelo WHERE 1';
    
        $params = [];
    
        if ($az !== null) {
            $query .= ' AND az = :az';
            $params[':az'] = $az;
        }
    
        if ($kezdev !== null) {
            $query .= ' AND kezdev = :kezdev';
            $params[':kezdev'] = $kezdev;
        }
    
        if ($nev !== null) {
            $query .= ' AND nev LIKE :nev';
            $params[':nev'] = '%' . $nev . '%'; 
        }
    
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
