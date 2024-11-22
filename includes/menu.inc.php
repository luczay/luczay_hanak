<?php
require_once(SERVER_ROOT . '/includes/db.php');

Class Menu {
    public static $menu = array();
    
    public static function setMenu() {
        self::$menu = array();
        $connection = DatabaseHandle::connect();
        $stmt = $connection->query("
                                    SELECT url, nev, szulo, jogosultsag 
                                    FROM menu 
                                    WHERE jogosultsag LIKE '".$_SESSION['userlevel']."'
                                    ORDER BY sorrend");
        while($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            self::$menu[$menuitem['url']] = array($menuitem['nev'], $menuitem['szulo'], $menuitem['jogosultsag']);
        }
    }
    public static function getMenu($sItems) {
        $submenu = "";
        
        $menu = "<ul class=\"navbar-nav mr-auto\">";
        foreach (self::$menu as $menuindex => $menuitem) {
            if ($menuitem[1] == "") { // Főmenüpontok
                $menu .= "<li class=\"nav-item\">"
                    . "<a class=\"nav-link\" href='" . SITE_ROOT . "controllers/" . $menuindex . "' "
                    . ($menuindex == $sItems[0] ? "class='selected'" : "") . ">"
                    . $menuitem[0] . "</a></li>";
            } elseif ($menuitem[1] == $sItems[0]) { // Almenüpontok
                $submenu .= "<li class=\"nav-item\">"
                    . "<a class=\"nav-link\" href='" . SITE_ROOT . $sItems[0] . "/" . $menuindex . "' "
                    . ($menuindex == $sItems[1] ? "class='selected'" : "")
                    . ">"
                    . $menuitem[0] . "</a></li>";
            }
        }

        $menu.="</ul>";
        $_SESSION['page'] = $menu;
        if($submenu != "")
            $submenu = "<ul>".$submenu."</ul>";
        $_SESSION['menu'] = $menu.$submenu;
        return $menu.$submenu;
    }
}

Menu::setMenu();

?>
