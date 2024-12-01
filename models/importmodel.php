<?php

require_once 'db.php';

class ImportModel {

    private $db;

    public function __construct() {
        $database = new DatabaseHandle();
        $this->db = $database->connect();
    }

    public function getFilteredMunkalapAll($vars) {
        
        $telepules = $vars['telepules'];
        $kezdev = $vars['kezdev'];
        $bedatum = $vars['bedatum'];

        $query = "SELECT munkalap.az AS munkalap_id, munkalap.bedatum, munkalap.javdatum, 
        hely.telepules, hely.utca, szerelo.nev AS szerelo_nev, 
        munkalap.munkaora, munkalap.anyagar
        FROM munkalap
        JOIN hely ON munkalap.helyaz = hely.az
        JOIN szerelo ON munkalap.szereloaz = szerelo.az
        WHERE 1=1";

        $params = [];
        if (!empty($telepules)) {
        $query .= " AND hely.telepules LIKE :telepules";
        $params[':telepules'] = "%$telepules%";
        }
        if (!empty($kezdev)) {
        $query .= " AND szerelo.kezdev > :kezdev";
        $params[':kezdev'] = $kezdev;
        }
        if (!empty($bedatum)) {
        $query .= " AND munkalap.bedatum > :bedatum";
        $params[':bedatum'] = $bedatum;
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}
