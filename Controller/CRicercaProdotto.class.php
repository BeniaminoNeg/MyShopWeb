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
        session_start();
        if (!isset($_SESSION['count']))
        {
            $_SESSION['count']=0;
            $_SESSION['start']=  time();
        }
        $_SESSION['count']++;
        //$nome = mysql_escape_string($_POST['prodotto']);
        
        header('Content-Type: application/json');
        $ProdottoDAO=new FProdotto();
        $ArrayRisultatiProd=$ProdottoDAO->RicercaPerNome($nome);//SOLO PER PROVA, ANDRÀ SOSTITUITO CON IL CAMPO DI POST
        $ArrayProdotti=array();
        foreach ($ArrayRisultatiProd as $key => $value) {
            $ArrayProdotti[]= new Prodotto($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]);
            }
        $ArrayIds=array();
        foreach ($ArrayProdotti as $key => $value) {
		//var_dump($value);
            $ArrayIds[] = $value->getSupermercatoId();     
        }
        //var_dump($ArrayIds);
        $ArrayIds_NoDopp =  array_unique($ArrayIds);
        //var_dump($ArrayIds_NoDopp);
        $SupermercatoDAO=new FSupermercato();
        $ArraySupermercati=array();
        //var_dump($ArrayProdotti);
        foreach ($ArrayIds_NoDopp as $key => $value) {
            $ArrayRisultatoSup=$SupermercatoDAO->RicercaPerId($value);
	    //var_dump($value);
            $Indirizzo = new Indirizzo($ArrayRisultatoSup[0][2], $ArrayRisultatoSup[0][3], $ArrayRisultatoSup[0][4]);
            $ArraySupermercati[] = new Supermercato($ArrayRisultatoSup[0][1], $ArrayRisultatoSup[0][5], $Indirizzo, $ArrayRisultatoSup[0][0]);
            
            
            
        }
        
        foreach ($ArraySupermercati as $key => $value) {
            $arraysuostring= $value->getAsArray();            
        }
        
        foreach ($ArrayProdotti as $key => $value) {
            $arrayprodstring=$value->getAsArray();            
        }
        
        
        
        
        
        /*
        foreach ($ArrayProdotti as $key => $value) {
            $ArrayProdString[] = $value->toArray(); 
        }
        $ArraySupString=array();
        foreach ($ArraySupermercati as $key => $value) {
            
            $ArraySupString[] = $value->getNome();             
        }
        
        $ArrayRisultato =  array($ArrayProdString, $ArraySupString);
        //var_dump($ArrayRisultato);
        //$ArrayRisultato = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($ArrayRisultato));
         * 
         */
        $Arraytot= array_merge($arrayprodstring, $arraysuostring);
        //var_dump($Arraytot);
        $json=  json_encode($Arraytot);
        //var_dump($json);
        /*$arrayutf8=  utf8_encode($ArraySupermercati);
        $JsonRisultato = json_encode($arrayutf8);
        $json=  json_encode($ArraySupermercati);
        var_dump($json);
        var_dump($JsonRisultato);*/
        //var_dump($ArraySupermercati[0]->getAsArray());
        $jas= $ArraySupermercati[0]->getAsArray();
        //var_dump($jas);
        $jsonmm=  json_encode($jas);
        
        //echo json_last_error();
        //var_dump($JsonRisultato);
        
        
        echo $jsonmm;
        //echo $json;
        
        
        
	
        //return $ArrayProdotti;
    }
    
}
