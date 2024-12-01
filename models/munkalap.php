<?php
require_once 'db.php'; // Adjust the path as needed

class MunkalapModel {
    private $db;

    public function __construct() {
        $database = new DatabaseHandle();
        $this->db = $database->connect();
    }

    public function getMunkalapAll() {
        $query = 'SELECT * FROM munkalap';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMunkalapAllInDetail() {
        $query = "
            SELECT
            munkalap.az AS munkalap_id,
            munkalap.bedatum,
            munkalap.javdatum,
            munkalap.munkaora,
            munkalap.anyagar,
            szerelo.nev AS szerelo_nev,
            szerelo.kezdev AS szerelo_kezdev,
            hely.telepules AS hely_telepules,
            hely.utca AS hely_utca
            FROM munkalap
            INNER JOIN szerelo ON munkalap.szereloaz = szerelo.az
            INNER JOIN hely ON munkalap.helyaz = hely.az
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveMunkalapChanges($vars) {
        $munkalapId = (int)$vars['azonosito'];
        $bedatum = $vars['bedatum'];
        $javdatum = $vars['javdatum'];
        $helyaz = (int)$vars['helyaz'];
        $szereloaz = (int)$vars['szereloaz'];
        $munkaora = (int)$vars['munkaora'];
        $anyagar = (int)$vars['anyagar'];

        // Update query
        $sql = "
            UPDATE munkalap
            SET bedatum = :bedatum,
                javdatum = :javdatum,
                helyaz = :helyaz,
                szereloaz = :szereloaz,
                munkaora = :munkaora,
                anyagar = :anyagar
            WHERE az = :munkalap_id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':bedatum' => $bedatum,
            ':javdatum' => $javdatum,
            ':helyaz' => $helyaz,
            ':szereloaz' => $szereloaz,
            ':munkaora' => $munkaora,
            ':anyagar' => $anyagar,
            ':munkalap_id' => $munkalapId,
        ]);
    }

    public function getMunkalapByIDDetailed($munkalapId) {
        $sql = "
                SELECT munkalap.*, hely.telepules, hely.utca, szerelo.nev AS szerelo_nev 
                FROM munkalap
                INNER JOIN hely ON munkalap.helyaz = hely.az
                INNER JOIN szerelo ON munkalap.szereloaz = szerelo.az
                WHERE munkalap.az = :munkalap_id
            ";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':munkalap_id' => $munkalapId]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $helyek = $this->db->query("SELECT * FROM hely")->fetchAll(PDO::FETCH_ASSOC);
        $szerelok = $this->db->query("SELECT * FROM szerelo")->fetchAll(PDO::FETCH_ASSOC);

        $retData = [
            'munkalap' => $row,
            'helyek' => $helyek,
            'szerelok' => $szerelok
        ];

        return $retData;
    }

    public function createMunkalap($vars) {
        $telepules = $vars['telepules'];
        $utca = $vars['utca'];
        $beadasiDatum = $vars['beadasiDatum'];
        $javitasDatum = $vars['javitasDatum'];
        $munkaora = $vars['munkaora'];
        $anyagar = $vars['anyagar'];
        $szerelo = $vars['szerelo'];
        $szereloNev = $vars['ujSzereloNev'] ?? null;
        $szereloKezdev = $vars['munkabaAllasDatum'] ?? null;

        $retData['eredmeny'] = "";
        try {
            $this->db->begin_transaction();
        
            // hely létezik
            $query = "SELECT az FROM hely WHERE telepules = ? AND utca = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ss", $telepules, $utca);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($helyaz);
                $stmt->fetch();
            } else {
                // uj hely létrehozása, ha nem létezik
                $query = "INSERT INTO hely (telepules, utca) VALUES (?, ?)";
                $stmt = $this->db->prepare($query);
                $stmt->bind_param("ss", $telepules, $utca);
                $stmt->execute();
                $helyaz = $conn->insert_id;
            }
            $stmt->close();
        
            // megnézzük, hogy kell-e új szerelőt létrehozni
            if ($szerelo === 'new' && $szereloNev && $szereloKezdev) {
                // Insert new szerelo
                $query = "INSERT INTO szerelo (nev, kezdev) VALUES (?, ?)";
                $stmt = $this->db->prepare($query);
                $stmt->bind_param("si", $szereloNev, $szereloKezdev);
                $stmt->execute();
                $szereloaz = $conn->insert_id;
                $stmt->close();
            } else {
                $szereloaz = $szerelo;
            }
        
            // új munkalap
            $query = "INSERT INTO munkalap (bedatum, javdatum, helyaz, szereloaz, munkaora, anyagar) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ssiiii", $beadasiDatum, $javitasDatum, $helyaz, $szereloaz, $munkaora, $anyagar);
            $stmt->execute();
            $stmt->close();
        
            $this->db->commit();
        
            $retData['eredmeny'] = "ERROR";
        } catch (Exception $e) {
            $this->db->rollback();
            $retData['eredmeny'] = "ERROR";
        }

        return $retData;
    }

    public function removeMunkalap($az) {
        $sql = "DELETE FROM munkalap WHERE az = :az";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':az', $az, PDO::PARAM_INT);

        $stmt->execute();
    }
}
?>