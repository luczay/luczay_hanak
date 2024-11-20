<?php
require_once(SERVER_ROOT . 'models/' . 'munkalap.php');

Class Munkalapok {
    public static $tabla_sorok = array();

    $munkalap_model = new MunkalapModel;
    $results = $munkalap_model->getMunkalapAllInDetail();

    public static function getMenu($sItems) {
        foreach($results as $row) {
            // $row['nev']
            // tabla sorokat csinalunk dinamikusan
        }
        
        return $tabla_sorok;
    }
}

Menu::setMenu();
?>
