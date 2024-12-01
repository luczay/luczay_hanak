<?php

class Arfolyam_Chart_Controller
{
	public $baseName = 'arfolyam_chart';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$view = new View_Loader($this->baseName);
        $view->assign('vars', $vars);
	}
}

?>