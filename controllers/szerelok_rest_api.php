<?php

class Szerelok_Rest_Api_Controller
{
	public $baseName = 'szerelok_rest_api';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$szereloModel = new SzereloModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t

		$request_method = $vars['request_method'];
		if ($request_method === 'POST') {
			$kiir = $szereloModel->createSzerelo($vars);
		} elseif ($request_method === 'GET') {
			$result = $szereloModel->getSzerelo($vars);

			foreach ($results as $row) {
				$tabla_sorok .= "<tr>";
				$tabla_sorok .= "<td>".$row['nev']."</td>";
				$tabla_sorok .= "<td>".$row['kezdev']."</td>";
	
				if ($_SESSION['userlevel'] == '__1') {
					$tabla_sorok .= "<td> 
									<a href=\"szerelo_torol?az=".$row['az']."\" class=\"btn btn-danger btn-sm\">Töröl</a> 
								</td>";
					$tabla_sorok .= "</tr>";
				} else {
					$tabla_sorok .= "<td> - </td>";
					$tabla_sorok .= "</tr>";
				}
			}

			$kiir = $tabla_sorok;
		} elseif ($request_method === 'DELETE') {
			$kiir = $szereloModel->removeSzerelo($vars['az']);
		} elseif ($request_method === 'PUT') {
			$kiir = $szereloModel->updateSzerelo($vars['az'], $vars['uj_nev'], $vars['uj_kezdev']);
		}
		
		echo $result;
	}
}

?>