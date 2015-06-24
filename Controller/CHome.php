<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CHome
 *
 * @author beniamino
 */
require_once './Foundation/FDB.php';
require_once './Foundation/FProdotto.php';
require_once './Foundation/FSupermercato.php';
require_once './Model/Prodotto.class.php';
require_once './Model/Supermercato.class.php';
require_once './View/ViewHome.php';



class CHome {
    
    public function ProdottiInEvidenza(){
        $ProdottoDAO= new FProdotto();
        $risultato= $ProdottoDAO->Conta($colonna, $tabella);
        $Indicicasuali = array();
        $MaxPerPagina=6;
        for ($index = 0; $index < $MaxPerPagina; $index++) {
           
            $ArrayIDr []=  rand(1, $risultato );          
        }
        $ArrayRisultatiProd=array();
        foreach ($ArrayIDr as $key => $value) {
           
            $ArrayRisultatiProd[]= $ProdottoDAO->GetProdottiById($value);
         }
        foreach ($ArrayRisultatiProd as $key => $value) {
                
            $ArrayProdotti= new Prodotto($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]);
         }         
        $Supermercati=  $this->GetSupermercati($ArrayProdotti);
        /*$ArrayNomiSup=array();
        foreach ($Supermercati as $key => $value) {
            $ArrayNomiSup[]=$value->getNome();
        }*/
        
        $JsonProdotti= json_encode($ArrayProdotti);
        $JsonSupermercati= json_encode($Supermercati);
        
        
        /*$VHome= new ViewHome();
        $VHome->PassaggioArray($ArrayProdotti, $Supermercati);
        $VHome->mostraPagina();*/
        
         
    }
    
    public function GetSupermercati($ArrayProdotti) {
        
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
        return $ArraySupermercati; 
            
  }
  
  
  
  
        
    
}

