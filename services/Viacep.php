<?php

class ServiceViacep {

    public static function getAdress($cep) {
        // formatar o cep removendo caracteres nao numericos
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";

        $xml = simplexml_load_file($url);
        return $xml;
    }
}

// $newServiveGet = ServiceViacep::getAdress('53250040');
// echo($newServiveGet->uf.' - ');
// echo($newServiveGet->localidade.' - ');
// echo($newServiveGet->logradouro.' - ');

