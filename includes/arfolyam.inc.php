<?php
require_once(SERVER_ROOT . 'models/' . 'arfolyam.php');

Class Arfolyam {
    public static function getCurrencyRates($vars, $column) {
        $arfolyam_model = new ArfolyamModel();

        $dateOption = $vars['dateOption'];

        if ($dateOption === 'current') {
            $results = $arfolyam_model->getCurrent($vars['currency']);
        } elseif ($dateOption === 'last_month') {
            $results = $arfolyam_model->getLastMonth($vars['currency']);
        } elseif ($dateOption === 'custom') {
            $results = $arfolyam_model->getCustom($vars['currency'], $vars['customDate']);
        }

        if ($column == 'dates') {
            return $results['dates'];
        }
        else {
            return $results['rates'];
        }
        
        return $tabla_sorok;
    }
}
?>
