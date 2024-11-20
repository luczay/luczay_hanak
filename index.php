<?php

//alkalmaz�s gy�k�r k�nyvt�ra a szerveren
// define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/beadandoweb2mvc/');
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/web_II_beadando/');

//URL c�m az alkalmaz�s gy�ker�hez
// define('SITE_ROOT', 'http://localhost/beadandoweb2mvc/');
define('SITE_ROOT', 'http://localhost/web_II_beadando/');

// a router.php vez�rl� bet�lt�se
require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>