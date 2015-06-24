<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CRicercaProdotto
 *
 * @author beniamino
 */
foreach (glob("Model/*.php") as $filename)
{
    include $filename;
}
foreach (glob("Foundation/*.php") as $filename)
{
    include $filename;
}

class CRicercaProdotto {
    function __construct() {
        
    }
    function RicercaPerNome($nome) {
        $ProdottoDAO=new FProdotto();
        $ArrayRisultatiProd=$ProdottoDAO->RicercaPerNome($nome);
        $ArrayProdotti=array();
        foreach ($ArrayRisultatiProd as $key => $value) {
            $ArrayProdotti[]= new Prodotto($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]);
            }
        $ArrayIds=array();
        foreach ($ArrayProdotti as $key => $value) {
		//var_dump($value);
            $ArrayIds[] = $value->getSupermercatoId();     
        }
        $ArrayIds_NoDopp =  array_unique($ArrayIds);
        $SupermercatoDAO=new FSupermercato();
        $ArraySupermercati=array();
        foreach ($ArrayIds_NoDopp as $key => $value) {
            $ArrayRisultatoSup=$SupermercatoDAO->RicercaPerId($value);
	    //var_dump($ArrayRisultatoSup);
            $Indirizzo = new Indirizzo($ArrayRisultatoSup[0][2], $ArrayRisultatoSup[0][3], $ArrayRisultatoSup[0][4]);
            $ArraySupermercati[] = new Supermercato($ArrayRisultatoSup[0][1], $ArrayRisultatoSup[0][5], $Indirizzo, $ArrayRisultatoSup[0][0]);
            
            
            
        }
        $JsonProdotti= json_encode($ArrayProdotti);
        $JsonSupermercati=  json_encode($ArraySupermercati);
	
        //return $ArrayProdotti;
    }
    
}
