<?php

class Vizvezetek_Controller
{
	public $baseName = 'vizvezetek_rest_api';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$munkalapModel = new MunkalapModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t

		$request_method = $vars['request_method'];
		if ($request_method === 'POST') {
			$kiir = $munkalapModel->createMunkalap($vars);
		} elseif ($request_method === 'GET') {
			$result = $munkalapModel->getSzerelo($vars);

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
                                    <a href=\"munkalap_torol?az=".$row['munkalap_id']."\" class=\"btn btn-danger btn-sm\">Töröl</a> 
                                </td>";
                $tabla_sorok .= "</tr>";
            }

			$kiir = $tabla_sorok;
		} elseif ($request_method === 'DELETE') {
			$kiir = $munkalapModel->removeSzerelo($vars['az']);
		} elseif ($request_method === 'PUT') {
			$kiir = $munkalapModel->updateSzerelo($vars);
		}
		
		echo $result;
	}
}

?>