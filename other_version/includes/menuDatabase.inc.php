<?php
    class MenuDatabase {
        const HOST = 'localhost';
        const DATABASE = 'web2';
        const USER = 'root';
        const PASSWORD = '';
        private static $connection = FALSE;
        
        public static function getConnection() {
            if(! self::$connection) {
                self::$connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DATABASE, self::USER, self::PASSWORD,
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                self::$connection->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            }
            return self::$connection;
        }
    }

?>