<?php
class DatabaseHandle {
    private static $host = 'localhost';
    private static $dbName = 'vizvezetek_szerelok';
    private static $username = 'root';
    private static $password = '';
    private static $conn = NULL;

    public static function connect() {
        try {
            if (self::$conn == NULL) {
                self::$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return self::$conn;
    }
}
?>