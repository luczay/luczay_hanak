<?php
require_once 'userDatabase.php'; // Adjust the path as needed

class MunkalapModel {
    private $db;

    public function __construct() {
        $database = new UserDatabase();
        $this->db = $database->getConnection();
    }

    public function getMunkalapAll() {
        $query = 'SELECT * FROM munkalap';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
