<?php

class Uj_Munkalap_Controller
{
	public $baseName = 'munkalapok';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$beleptetModel = new MunkalapModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$retData = $beleptetModel->createMunkalap($vars);

		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName);
		//�tadjuk a lek�rdezett adatokat a n�zetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>