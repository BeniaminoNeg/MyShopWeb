<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CRicercaImmaginiLoghi
 *
 * @author juan
 */
foreach (glob("Model/*.php") as $filename){
    require_once $filename;

}
foreach (glob("Foundation/*.php") as $filename){
    require_once $filename;
}


class CRicercaImmagini  {
    public function RicercaImmagine($Id) {
        
        header('Content-Type: application/json; charset=UTF-8');
        $Immagine=new Immagine();
        $Immagine->fetchDB($Id);
        $Risultato=$Immagine->getImmagine();
       
        $Risultato= base64_encode($Risultato);
        $JsonRisultato= json_encode($Risultato);
        return $JsonRisultato;
        
        
        
    } 
}
