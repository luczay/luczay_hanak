<?php
class UserDatabase
{
    const HOST = 'localhost';
    const dbName = 'vizvezetek_szerelok';
    const username = 'root';
    const password = '';
    private static $connection = false;

    public static function getConnection()
    {
        if (!self::$connection) {
            try {
                self::$connection = new PDO('mysql:host=' . self::HOST, self::username, self::password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection error: " . $e->getMessage();
            }
        }
        return self::$connection;
    }
}