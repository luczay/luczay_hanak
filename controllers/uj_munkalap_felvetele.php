<?php

class Uj_Munkalap_Felvetele_Controller
{
	public $baseName = 'beleptet';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$beleptetModel = new BeleptetModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$retData = $beleptetModel->belep($vars['login'], $vars['password']);
		if($retData['eredmeny'] == "ERROR")
			$this->baseName = "belepes";
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName.'_main');
		//�tadjuk a lek�rdezett adatokat a n�zetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>