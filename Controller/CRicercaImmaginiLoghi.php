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
require_once 'CSessione.php';

class CRicercaImmaginiLoghi {
    function RicercaImmagine($Idp,$Size) {
        $ImmagineDAO= new FImmagine();
        switch ($Size) {
            case "Piccola":
            {
                $Immagine=$ImmagineDAO->RicercaImgPiccola($Idp);
            }
                break;
            
            case "Media":
            {
                $Immagine
            }
                break;
            
            case "Grande":
            {
                
            }
                break;
            
            case "Originale":
            {
                
            }
                break;

            default:
                break;
        }
        
        
        
        
    }
}
