<?php

class Munkalap_Edit_Save_Controller
{
	public $baseName = 'munkalapok';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$munkalapModel = new MunkalapModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$munkalapModel->saveMunkalapChanges($vars);
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName.'_main');
	}
}

?>