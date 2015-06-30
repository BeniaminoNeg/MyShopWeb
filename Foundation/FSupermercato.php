<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FSupermercato
 *
 * @author beniamino
 */
class FSupermercato extends FDB{

    function __construct() {
	parent::__construct();
    }
    
    function RicercaPerId($Ids) {
        $ArrayRisultati = parent::search_equals("Supermercato", "Ids", $Ids);
        //var_dump($ArrayRisultati);
        foreach ($ArrayRisultati as $Sup) {
                $Sup[5]= utf8_encode($Sup[5]);
        }
        return $ArrayRisultati;
        
    }
}
