<?php

class Felhasznalo_Torol_Controller
{
	public $baseName = 'felhasznalok';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$felhasznalokModel = new FelhasznalokModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$felhasznalokModel->removeFelhasznalo($vars['az']);

		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName);
	}
}

?>