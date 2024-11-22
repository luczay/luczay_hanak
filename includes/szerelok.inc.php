<?php
require_once(SERVER_ROOT . 'models/' . 'szerelo.php');

Class Szerelok {
    public static function getSzerelok() {
        $szerelo_model = new SzereloModel();
        $results = $szerelo_model->getSzerelo();
        $szerelo_selects = "";

        foreach ($results as $select) {
            $szerelo_selects .= "<option value=\"".$select['az']."\">".$select['nev']."</option>";
        }
        return $szerelo_selects;
    }

    public static function getSzerelokInTable() {
        $szerelo_model = new SzereloModel();
        $results = $szerelo_model->getSzerelo();
        $tabla_sorok = "";

        foreach ($results as $row) {
            $tabla_sorok .= "<tr>";
            $tabla_sorok .= "<td>".$row['nev']."</td>";
            $tabla_sorok .= "<td>".$row['kezdev']."</td>";

            if ($_SESSION['userlevel'] == '__1') {
                $tabla_sorok .= "<td> 
                                <a href=\"szerelo_edit?azonosito=".$row['az']."\" class=\"btn btn-warning btn-sm\">Szerkeszt</a>
                                <a href=\"szerelo_torol?azonosito=".$row['az']."\" class=\"btn btn-danger btn-sm\">Töröl</a> 
                            </td>";
                $tabla_sorok .= "</tr>";
            } else {
                $tabla_sorok .= "<td> - </td>";
                $tabla_sorok .= "</tr>";
            }
        }
        return $tabla_sorok;
    }
}
?>
