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




class CHome {
    
    public function ProdottiInEvidenza(){
        /*session_start();
        if (!isset($_SESSION['count']))
        {
            $_SESSION['count']=0;
            $_SESSION['start']=  time();
        }
        $_SESSION['count']++;
        header('Content-Type: application/json');*/
        $ProdottoDAO= new FProdotto();
        $risultato= $ProdottoDAO->ContaProdotti();
        $risultato=$risultato[0][0];
        //var_dump($risultato);
        $Indicicasuali = array();
        $MaxPerPagina=6;
        for ($index = 0; $index < $MaxPerPagina; $index++) {
           
            $Indicicasuali []=  rand(1, $risultato );          
        }
        //var_dump($Indicicasuali);
        $ArrayRisultatiProd=array();
        foreach ($Indicicasuali as $key => $value) {
           
            $ArrayRisultatiProd[]= $ProdottoDAO->GetProdottiById($value);
         }
        //var_dump($ArrayRisultatiProd);
         $ArrayProdotti = array ();
         
        foreach ($ArrayRisultatiProd as $key => $value) {
            //var_dump($value);    
            $ArrayProdotti[]= new Prodotto($value[0][0], $value[0][1], $value[0][2], $value[0][3], $value[0][4], $value[0][5]);
         }  
         //var_dump($ArrayProdotti);
         
         
          $ArrayProdString=array();
        foreach ($ArrayProdotti as $key => $value) {
            $value->setImmagine(NULL);
            $ArrayProdString[] = $value->getAsArray(); 
        }
        //var_dump($ArrayProdotti);
        $JsonRisultato= json_encode($ArrayProdString);
        echo $JsonRisultato;
       
        
         
    }
    
    public function GetSupermercati($ArrayIdS) {
        /*$ProdottoDAO= new FProdotto;
        $ArrayRisultatiProd=array();
        foreach ($ArrayIdp as $key => $value) {
           
            $ArrayRisultatiProd[]= $ProdottoDAO->GetProdottiById($value);
         }
         //var_dump($ArrayRisultatiProd);
        $ArrayProdotti= array ();
        foreach ($ArrayRisultatiProd as $key => $value) {
                
            $ArrayProdotti[]= new Prodotto($value[0][0], $value[0][1], $value[0][2], $value[0][3], $value[0][4], $value[0][5]);
         }
         //var_dump($ArrayProdotti);
        
        $ArrayIds=array();
        foreach ($ArrayProdotti as $value) {
            
            $ArrayIds[]=$value->getSupermercatoId();
        }
        //var_dump($ArrayIds);
        $ArrayIds_NoDopp =  array_unique($ArrayIds);*/
         
         $SupermercatoDAO=new FSupermercato();
         $ArraySupermercati=array();
         //var_dump($ArrayIdS);
        foreach ($ArrayIdS as $key =>$value) {
            $ArrayRisultatoSup=$SupermercatoDAO->RicercaPerId($value);
            //var_dump($ArrayRisultatoSup);
            $Indirizzo = new Indirizzo($ArrayRisultatoSup[0][2], $ArrayRisultatoSup[0][3], $ArrayRisultatoSup[0][4]);
            $ArraySupermercati[] = new Supermercato($ArrayRisultatoSup[0][1], $ArrayRisultatoSup[0][5], $Indirizzo, $ArrayRisultatoSup[0][0]);
            //var_dump($Indirizzo);
            //var_dump($ArraySupermercati);
        }
         
        $ArraySupString=array();
        foreach ($ArraySupermercati as $key => $value) {
            $value->setLogo(NULL);
            $ArraySupString[] = $value->getAsArray(); 
        }
        $JsonRisultato= json_encode($ArraySupString);
        return $JsonRisultato;
        
            
  }
  
  
  
  
        
    
}

