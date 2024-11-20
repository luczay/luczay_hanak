<?php
    session_start();

    if (!isset($_SESSION['userid'])) $_SESSION['userid'] = 0;
    if (!isset($_SESSION['userfirstname'])) $_SESSION['userfirstname'] = "";
    if (!isset($_SESSION['userlastname'])) $_SESSION['userlastname'] = "";
    if (!isset($_SESSION['userlevel'])) $_SESSION['userlevel'] = "1__";

    require_once SERVER_ROOT . 'includes/menuDatabase.inc.php';
    require_once SERVER_ROOT . 'includes/menu.inc.php';

    if(!isset($_GET['page']))
        $page = "nyitolap";
    else
        $page = $_GET['page'];

    $subpage = "";
    $vars = array();

    $request = $_SERVER['QUERY_STRING'];

    if($request != "")
    {
        $params = explode('/', $request);
        $page = array_shift($params); // a kért oldal neve

        if(array_key_exists($page, Menu::$menu) && count($params)>0) // Az oldal egy menüpont oldala és van még adat az url-ben
        {
            $subpage = array_shift($params); // a kért aloldal
            if(! (array_key_exists($subpage, Menu::$menu) && Menu::$menu[$subpage][1] == $page)) // ha nem egy alolal
            {
                $vars[] = $subpage; // akkor ez egy parameter
//                $subpage = ""; // és nincs aloldal
            }
        }
        $vars += $_POST;

        foreach($params as $p) // a paraméterek tömbje feltöltése
        {
            $vars[] = $p;
        }
    }

    $controllerfile = $page . ($subpage != "" ? "_" . $subpage : "");
    $target = SERVER_ROOT . 'controllers/' . $controllerfile . '.php';

    if (!file_exists($target)) {
        // Ha a fájl nem található, az error404 vezérlőt töltjük be
        $controllerfile = "error404";
        $target = SERVER_ROOT . 'controllers/' . $controllerfile . '.php';
    }

    include_once($target);

    $class = ucfirst($controllerfile) . '_Controller';
    if (class_exists($class)) {
        $controller = new $class;
    } else {
        die("A vezérlő osztály nem létezik: " . $class);
    }

    spl_autoload_register(function ($className) {
        $file = SERVER_ROOT . 'models/' . strtolower($className) . '.php';
        if (file_exists($file)) {
            include_once($file);
        } else {
            die("A modell osztály nem található: " . $className);
        }
    });

    $controller->main($vars);
?>