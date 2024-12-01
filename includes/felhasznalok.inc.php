<?php
require_once(SERVER_ROOT . 'models/' . 'megrendeles_model.php');

Class Felhasznalok {
    public static function getTableRows() {
        $felhasznalok_model = new FelhasznalokModel();
        $results = $felhasznalok_model->getFelhasznaloAll();
        $tabla_sorok = "";

        foreach ($results as $row) {
            $tabla_sorok .= "<tr>";
            $tabla_sorok .= "<td>".$row['az']."</td>";
            $tabla_sorok .= "<td>".$row['keresztnev']."</td>";
            $tabla_sorok .= "<td>".$row['vezeteknev']."</td>";
            $tabla_sorok .= "<td>".$row['jogosultsag']."</td>";
            $tabla_sorok .= "<td>".$row['felhasznalonev']."</td>";
            $tabla_sorok .= "<td> 
                                <a href=\"felhasznalo_torol?az=".$row['az']."\" class=\"btn btn-danger btn-sm\">Töröl</a> 
                            </td>";
            $tabla_sorok .= "</tr>";
        }
        
        return $tabla_sorok;
    }
}
?>
