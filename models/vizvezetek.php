<?php
require_once 'db.php'; 

class SzereloModel {
    private $db;

    public function __construct() {
        $database = new DatabaseHandle();
        $this->db = $database->connect();
    }

    public function createMunkalap($vars) {
        $telepules = $vars['telepules'];
        $utca = $vars['utca'];
        $beadasiDatum = $vars['beadasi_datum'];
        $javitasDatum = $vars['javitasi_datum'];
        $munkaora = $vars['munkaora'];
        $anyagar = $vars['anyagar'];
        $szerelo = $vars['szerelo'];
        $szereloNev = $vars['szerelo_nev'];
        $szereloKezdev = $vars['munkaba_allas_datum'];

        $retData = "";
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
        
            $retData = "Created";
        } catch (Exception $e) {
            $this->db->rollback();
            $retData = "ERROR";
        }

        return $retData;
    }

    public function getMunkalap() {
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
    

    public function removeMunkalap($az) {
        $sql = "DELETE FROM munkalap WHERE az = :az";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':az', $az, PDO::PARAM_INT);

        $stmt->execute();

        return $az." azonosítójú munkalap sikeresen törölve lett!";
    }

    public function updateMunkalap($vars) { 
        $telepules = $vars['telepules'];
        $utca = $vars['utca'];
        $beadasiDatum = $vars['beadasi_datum'];
        $javitasDatum = $vars['javitasi_datum'];
        $munkaora = $vars['munkaora'];
        $anyagar = $vars['anyagar'];
        $szerelo = $vars['szerelo'];
        $szereloNev = $vars['szerelo_nev'];
        $szereloKezdev = $vars['munkaba_allas_datum'];

        $retData = "";
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
                $query = "INSERT INTO szerelo (nev, kezdev) VALUES (?, ?)";
                $stmt = $this->db->prepare($query);
                $stmt->bind_param("si", $szereloNev, $szereloKezdev);
                $stmt->execute();
                $szereloaz = $conn->insert_id;
                $stmt->close();
            } else {
                $szereloaz = $szerelo;
            }
        
            $sql = "UPDATE munkalap SET bedatum=:bedatum, javdatum=:javdatum, helyaz=:helyaz, szereloaz=:szereloaz, munkaora=:munkaora, anyagar=:anyagar  WHERE az = :az";


            // új munkalap
            $query = "INSERT INTO munkalap (bedatum, javdatum, helyaz, szereloaz, munkaora, anyagar) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ssiiii", $beadasiDatum, $javitasDatum, $helyaz, $szereloaz, $munkaora, $anyagar);
            $stmt->execute();
            $stmt->close();
        
            $this->db->commit();
        
            $retData = $az." azonosítójú szerelő sikeresen frissítve lett!";
        } catch (Exception $e) {
            $this->db->rollback();
            $retData = "ERROR";
        }

        return $retData;
    }
}
?>