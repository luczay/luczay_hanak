<?php

class Regisztral_Controller
{
	public $baseName = 'nyitolap';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$regisztralModel = new RegisztralModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$regisztralModel->regisztral($vars);

		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName.'_main');
	}
}

?>