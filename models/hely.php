<?php
    require_once 'userDatabase.php';

    class HelyModel {
        private $db;

        public function __construct() {
            $database = new UserDatabase();
            $this->db = $database->getConnection();
        }

        public function getHely($az = null, $telepules = null, $utca = null) {

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
