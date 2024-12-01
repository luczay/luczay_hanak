<?php
// import database

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$db = 'your_database_name'; 
$user = 'root';             
$password = '';            
try {
    
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


function getAllData() {
    global $pdo;

    $tables = ['szerelo', 'hely', 'munkalap'];

    $result = [];
    
    foreach ($tables as $table) {
        $stmt = $pdo->query("SELECT * FROM $table");
        $result[$table] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $result;
}

class SoapMenu {
    public function getAllData() {
        return getAllData(); 
    }
}

$options = ['uri' => 'http://localhost/soap'];
$server = new SoapServer(null, $options);
$server->setClass('SoapMenu'); 
$server->handle(); 
?>
