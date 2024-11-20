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
        // munkalapok teljes hellyel es szerelovel
        return "";
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
            $conn->begin_transaction();
        
            // hely létezik
            $query = "SELECT az FROM hely WHERE telepules = ? AND utca = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $telepules, $utca);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($helyaz);
                $stmt->fetch();
            } else {
                // uj hely létrehozása, ha nem létezik
                $query = "INSERT INTO hely (telepules, utca) VALUES (?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $telepules, $utca);
                $stmt->execute();
                $helyaz = $conn->insert_id;
            }
            $stmt->close();
        
            // megnézzük, hogy kell-e új szerelőt létrehozni
            if ($szerelo === 'new' && $szereloNev && $szereloKezdev) {
                // Insert new szerelo
                $query = "INSERT INTO szerelo (nev, kezdev) VALUES (?, ?)";
                $stmt = $conn->prepare($query);
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
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssiiii", $beadasiDatum, $javitasDatum, $helyaz, $szereloaz, $munkaora, $anyagar);
            $stmt->execute();
            $stmt->close();
        
            $conn->commit();
        
            $retData['eredmeny'] = "ERROR";
        } catch (Exception $e) {
            // Rollback on error
            $conn->rollback();
            $retData['eredmeny'] = "ERROR";
        }

        return $retData;
    }
}
?>