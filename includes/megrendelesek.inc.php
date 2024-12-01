<?php
require_once(SERVER_ROOT . 'models/' . 'megrendeles_model.php');

Class Megrendelesek {
    public static function getTableRows() {
        $munkalap_model = new MegrendelesModel();
        $results = $munkalap_model->getMegrendelesAll();
        $tabla_sorok = "";

        foreach ($results as $row) {
            if ($_SESSION['userlevel'] != '__1') {
                if ($_SESSION['userid'] == $row['felhasznaloaz']) {
                    $tabla_sorok .= "<tr>";
                    $tabla_sorok .= "<td>".$row['az']."</td>";
                    $tabla_sorok .= "<td>".$row['keresztnev']."</td>";
                    $tabla_sorok .= "<td>".$row['vezeteknev']."</td>";
                    $tabla_sorok .= "<td>".$row['telepules']."</td>";
                    $tabla_sorok .= "<td>".$row['utca']."</td>";
                    $tabla_sorok .= "<td>".$row['leiras']."</td>";
                    $tabla_sorok .= "<td>".$row['szerelonev']."</td>";
                    $tabla_sorok .= "<td> 
                                        <a href=\"megrendeles_torol?az=".$row['az']."\" class=\"btn btn-danger btn-sm\">Töröl</a> 
                                    </td>";
                    $tabla_sorok .= "</tr>";
                }
            }
            else {
                $tabla_sorok .= "<tr>";
                $tabla_sorok .= "<td>".$row['az']."</td>";
                $tabla_sorok .= "<td>".$row['keresztnev']."</td>";
                $tabla_sorok .= "<td>".$row['vezeteknev']."</td>";
                $tabla_sorok .= "<td>".$row['telepules']."</td>";
                $tabla_sorok .= "<td>".$row['utca']."</td>";
                $tabla_sorok .= "<td>".$row['leiras']."</td>";
                $tabla_sorok .= "<td>".$row['szerelonev']."</td>";
                $tabla_sorok .= "<td> 
                                    <a href=\"megrendeles_torol?az=".$row['az']."\" class=\"btn btn-danger btn-sm\">Töröl</a> 
                                </td>";
                $tabla_sorok .= "</tr>";
            }
            
        }
        
        return $tabla_sorok;
    }
}
?>
