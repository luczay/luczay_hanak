<?php

class ArfolyamModel {    
    function getCurrent($valuta) {
        $client = new SoapClient('http://www.mnb.hu/arfolyamok.asmx?wsdl');
        $result = (array)simplexml_load_string($client->GetExchangeRates('2024-09-20', '2024-09-10', 'EUR')->GetExchangeRatesResult);

        error_log(print_r($result, true));

        error_log("day rate".$result['Day']->Rate);
        error_log("day rate".$result['Day']->Rate[0]);
        error_log("day rate".$result['Rate']);
    }

    function getLastMonth($valuta) {
        $client = new SoapClient('http://www.mnb.hu/arfolyamok.asmx?wsdl');
        $tömb = (array)simplexml_load_string($client->GetExchangeRates());
    }

    function getCustom($valuta, $date) {
        $client = new SoapClient('http://www.mnb.hu/arfolyamok.asmx?wsdl');
        $tömb = (array)simplexml_load_string($client->GetExchangeRates());
    }
}