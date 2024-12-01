<?php
require_once 'db.php'; 

class MegrendelesModel {
    private $db;

    public function __construct() {
        $database = new DatabaseHandle();
        $this->db = $database->connect();
    }

    public function getMegrendelesAll() {
        $sql = "
            SELECT 
                m.az, 
                m.felhasznaloaz, 
                f.felhasznalonev, 
                f.keresztnev, 
                f.vezeteknev,
                h.telepules, 
                h.utca, 
                m.leiras, 
                m.szereloaz, 
                sz.nev AS szerelonev 
            FROM megrendeles m
            JOIN hely h ON m.helyaz = h.az
            JOIN felhasznalo f ON m.felhasznaloaz = f.az
            JOIN szerelo sz ON m.szereloaz = sz.az
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createMegrendeles($vars) {
        $felhasznaloaz = $_SESSION['userid'];
        $leiras = $vars['leiras'];
        $szereloaz = $vars['szerelo'];
        $varos = $vars['varos'];
        $utca = $vars['utca'];

        // megnezzuk, hogy letezik-e a hely amit megadtak
        $query = 'SELECT * FROM hely WHERE telepules = :telepules AND utca LIKE :utca';
        $stmt_hely = $this->db->prepare($query);

        $utca_like = "%".$utca."%";

        $stmt_hely->bindParam(':telepules', $varos, PDO::PARAM_STR);
        $stmt_hely->bindParam(':utca', $utca_like, PDO::PARAM_STR);

        $stmt_hely->execute();

        $result = $stmt_hely->fetchAll(PDO::FETCH_ASSOC);

        $helyaz = -1;
        if (!empty($result)) {
            $helyaz = $result[0]['az'];
        } 

        // ha nem letezik, akkor letrehozzuk
        if ($helyaz == -1) {
            $stmt_hely_create = $this->db->prepare("INSERT INTO hely (telepules, utca) VALUES (:telepules, :utca)");
            
            $stmt_hely_create->bindParam(':telepules', $varos, PDO::PARAM_STR);
            $stmt_hely_create->bindParam(':utca', $utca, PDO::PARAM_STR);

            
            $stmt_hely_create->execute();

            // majd megszerezzuk az azonositojat
            $stmt_hely_az = $this->db->prepare($query);

            $stmt_hely_az->bindParam(':telepules', $varos, PDO::PARAM_STR);
            $stmt_hely_az->bindParam(':utca', $utca_like, PDO::PARAM_STR);

            $stmt_hely_az->execute();

            $result = $stmt_hely_az->fetchAll(PDO::FETCH_ASSOC);
            $helyaz = $result[0]['az'];

        }

        $stmt = $this->db->prepare("INSERT INTO megrendeles (felhasznaloaz, helyaz, leiras, szereloaz) VALUES (:felhasznaloaz, :helyaz, :leiras, :szereloaz)");
            
        $stmt->bindParam(':felhasznaloaz', $felhasznaloaz, PDO::PARAM_INT);
        $stmt->bindParam(':helyaz', $helyaz, PDO::PARAM_INT);
        $stmt->bindParam(':leiras', $leiras, PDO::PARAM_STR);
        $stmt->bindParam(':szereloaz', $szereloaz, PDO::PARAM_INT);  
        
        $stmt->execute();
    }

    public function removeMegrendeles($az) {
        $sql = "DELETE FROM megrendeles WHERE az = :az";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':az', $az, PDO::PARAM_INT);

        $stmt->execute();
    }
}
?>