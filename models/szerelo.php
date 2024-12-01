<?php
require_once 'db.php'; 

class SzereloModel {
    private $db;

    public function __construct() {
        $database = new DatabaseHandle();
        $this->db = $database->connect();
    }

    public function createSzerelo($vars) {
        $nev = $vars['nev'];
        $kezdev = $vars['kezdev'];

        $stmt = $this->db->prepare("INSERT INTO szerelo (nev, kezdev) VALUES (:nev, :kezdev)");
            
        $stmt->bindParam(':nev', $nev, PDO::PARAM_STR);
        $stmt->bindParam(':kezdev', $kezdev, PDO::PARAM_INT);
            
        $stmt->execute();

        return "Szerelő ".$nev." ".$kezdev." kezdési évvel sikeresen létre lett hozva!";
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
    

    public function removeSzerelo($az) {
        $sql = "DELETE FROM szerelo WHERE az = :az";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':az', $az, PDO::PARAM_INT);

        $stmt->execute();

        return $az." azonosítójú szerelő sikeresen törölve lett!";
    }

    public function updateSzerelo($az, $ujNev, $ujKezdev) {       
        $updates = [];
        $params = [':az' => $az];

        if (!empty($ujNev)) {
            $updates[] = "nev = :nev";
            $params[':nev'] = $ujNev;
        }

        if (!empty($ujKezdev)) {
            $updates[] = "kezdev = :kezdev";
            $params[':kezdev'] = $ujKezdev;
        }

        $sql = "UPDATE szerelo SET " . implode(", ", $updates) . " WHERE az = :az";

        $stmt = $this->db->prepare($sql);

        $stmt->execute($params);

        return $az." azonosítójú szerelő sikeresen frissítve lett!";
    }
}
?>