<?php

class Megrendeles_Torol_Controller
{
	public $baseName = 'megrendelesek';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$megrendelesModel = new MegrendelesModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$megrendelesModel->removeMegrendeles($vars['az']);

		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName);
	}
}

?>