<?php
require_once(SERVER_ROOT . 'models/' . 'munkalap.php');

Class Munkalapok {
    public static function getTableRows() {
        $munkalap_model = new MunkalapModel();
        $results = $munkalap_model->getMunkalapAllInDetail();
        $tabla_sorok = "";

        foreach ($results as $row) {
            $tabla_sorok .= "<tr>";
            $tabla_sorok .= "<td>".$row['munkalap_id']."</td>";
            $tabla_sorok .= "<td>".$row['bedatum']."</td>";
            $tabla_sorok .= "<td>".$row['javdatum']."</td>";
            $tabla_sorok .= "<td>".$row['hely_telepules']."</td>";
            $tabla_sorok .= "<td>".$row['szerelo_nev']."</td>";
            $tabla_sorok .= "<td>".$row['munkaora']."</td>";
            $tabla_sorok .= "<td>".$row['anyagar']."</td>";
            $tabla_sorok .= "<td> 
                                <a href=\"munkalap_edit?azonosito=".$row['munkalap_id']."\" class=\"btn btn-warning btn-sm\">Szerkeszt</a>
                                <a href=\"torol?azonosito=".$row['munkalap_id']."\" class=\"btn btn-danger btn-sm\">Töröl</a> 
                            </td>";
            $tabla_sorok .= "</tr>";
        }
        
        return $tabla_sorok;
    }
}
?>
