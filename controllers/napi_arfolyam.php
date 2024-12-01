<?php

class Munkalap_Torol_Controller
{
	public $baseName = 'arfolyamok';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$arfolyamModel = new ArfolyamModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$munkalapModel->getCurrent($vars['currency']);

		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName);
	}
}

?>