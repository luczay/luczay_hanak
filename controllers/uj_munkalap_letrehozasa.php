<?php

class Uj_Munkalap_Letrehozasa_Controller
{
	public $baseName = 'uj_munkalap';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$view = new View_Loader($this->baseName);
		
	}
}

?>