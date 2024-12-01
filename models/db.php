<?php
class DatabaseHandle {
    private static $host = 'sql304.infinityfree.com';
    private static $dbName = 'if0_37791146_vizvezetek_szerelok';
    private static $username = 'if0_37791146';
    private static $password = '99JelszoNincs99';
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