<?php
require_once 'db.php'; 

class RegisztralModel {
    private $db;

    public function __construct() {
        $database = new DatabaseHandle();
        $this->db = $database->connect();
    }

    public function regisztral($vars) {
        $felhasznalonev = $vars['felhasznalonev'];
        $keresztnev = $vars['keresztnev'];
        $vezeteknev = $vars['vezeteknev'];
        $jelszo = $vars['jelszo']; 

        $jogosultsag = '_1_';
        $munkalapaz = NULL;

        $sql = "INSERT INTO felhasznalo (felhasznalonev, keresztnev, vezeteknev, jelszo, munkalapaz, jogosultsag)
                VALUES (:felhasznalonev, :keresztnev, :vezeteknev, sha1(:jelszo), :munkalapaz, :jogosultsag)";
        $stmt = $this->db->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':felhasznalonev', $felhasznalonev);
        $stmt->bindParam(':keresztnev', $keresztnev);
        $stmt->bindParam(':vezeteknev', $vezeteknev);
        $stmt->bindParam(':jelszo', $jelszo);
        $stmt->bindParam(':munkalapaz', $munkalapaz);
        $stmt->bindParam(':jogosultsag', $jogosultsag);

        $stmt->execute();
    }
}
?>