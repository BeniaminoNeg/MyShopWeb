<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FProdotto
 *
 * @author beniamino
 */

class FProdotto extends FDB {

    function __construct() {
	parent::__construct();
    }
    
    function RicercaPerNome($tag) {
        $ArrayRisultati=parent::search_contains("Catalogo", "Nome", $tag);
        foreach ($ArrayRisultati as $Prod) {
                $Prod[2]= utf8_encode($Prod[2]);
        }
        return $ArrayRisultati;
        
    }
    function ContaProdotti() {
        $NumProdotti=  parent::Conta("Id", "Catalogo");
        return $NumProdotti;
        
    }
    function GetProdottiById($id) {
        $Prodotto=  parent::search_equals("Catalogo", "id", $id);
        foreach ($ArrayRisultati as $Prod) {
                $Prod[2]= utf8_encode($Prod[2]);
        }
        return $Prodotto;
        
    }
}
