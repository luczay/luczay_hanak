<?php

class Szerelok_Controller
{
	public $baseName = 'szerelok';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$szereloModel = new SzereloModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t

        $view = new View_Loader($this->baseName);
	}
}

?>