<?php
$client = new SoapClient(null, [
    'location' => 'http://localhost/soap_server.php', 
    'uri' => 'http://localhost/soap'                
]);

$allData = $client->getAllData(); 

echo "Data from all tables:\n";
foreach ($allData as $table => $data) {
    echo "\nTable: $table\n";
    print_r($data); 
}
?>
