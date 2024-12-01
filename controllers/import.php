<?php

require_once(SERVER_ROOT . 'tcpdf/tcpdf.php');

class Import_Controller
{
	public $baseName = 'importalas';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$importModel = new ImportModel;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$results = $importModel->getFilteredMunkalapAll($vars);

        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('System');
        $pdf->SetTitle('Szerelők');
        $pdf->SetHeaderData('', 0, 'Szerelők', 'TCPDF segítségével készült');
        $pdf->setHeaderFont(['', '', 10]);
        $pdf->setFooterFont(['', '', 8]);
        $pdf->AddPage();

        $html = '<h2>Szerelők</h2>';
        if (empty($results)) {
            $html .= '<p>A megadott szűrőkre nem találtunk adatokat.</p>';
        } else {
            $html .= '<table border="1" cellpadding="5">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bejelentés Dátuma</th>
                                <th>Javítás Dátuma</th>
                                <th>Település</th>
                                <th>Utca</th>
                                <th>Szerelő</th>
                                <th>Munkaóra</th>
                                <th>Anyagár</th>
                            </tr>
                        </thead>
                        <tbody>';
            foreach ($results as $row) {
                $html .= '<tr>
                            <td>' . htmlspecialchars($row['munkalap_id']) . '</td>
                            <td>' . htmlspecialchars($row['bedatum']) . '</td>
                            <td>' . htmlspecialchars($row['javdatum']) . '</td>
                            <td>' . htmlspecialchars($row['telepules']) . '</td>
                            <td>' . htmlspecialchars($row['utca']) . '</td>
                            <td>' . htmlspecialchars($row['szerelo_nev']) . '</td>
                            <td>' . htmlspecialchars($row['munkaora']) . '</td>
                            <td>' . htmlspecialchars($row['anyagar']) . '</td>
                        </tr>';
            }
            $html .= '</tbody></table>';
        }

        $pdf->writeHTML($html);
        $pdf->Output('szerelők.pdf', 'D');


		//bet�ltj�k a n�zetet
		// $view = new View_Loader($this->baseName."_main");
		//�tadjuk a lek�rdezett adatokat a n�zetnek
	}
}

?>