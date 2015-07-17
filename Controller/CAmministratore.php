<?php

/**
 * Description of CAmministratore
 *
 * @author juan
 */

foreach (glob("Controller/*.php") as $filename){
    require_once $filename;
}

foreach (glob("Model/*.php") as $filename){
    require_once $filename;
}

foreach (glob("Foundation/*.php") as $filename){
    require_once $filename;
}

class CAmministratore {
    
    /**
     * 
     * @param type $Dati stringa con i dati dell' immagine
     */
    function AddImmagine($Dati) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Admin->AddImmagine($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $ArrayDati[3]);
    }
    /**
     * 
     * @param type $Dati stringa
     */
    function UpdateImmagine($Dati) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Admin->UpdateImmagine($ArrayDati[0], $ArrayDati[1], $ArrayDati[2]);
    }
    /**
     * 
     * @param type $Id stringa
     */
    function RemoveImmagine($Id) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveImmagine($Id);        
    }
    /**
     * 
     * @param type $Dati stringa da suddividere per array
     */
    function AddProdotto($Dati) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Admin->AddProdotto($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $ArrayDati[3], $ArrayDati[4], $ArrayDati[5]);        
    }
    /**
     * 
     * @param type $Dati stringa da suddividere per array
     */
    function UpdateProdotto($Dati) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Admin->UpdateProdotto($ArrayDati[0], $ArrayDati[1], $ArrayDati[2]);
    }
    
    function RemoveProdotto($Id) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveProdotto($Id);        
    }
    
    function AddSupermercato($Dati) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Admin->AddSupermercato($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $ArrayDati[3], $ArrayDati[4]);
    }
    
    function UpdateSupermercato($Dati) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Admin->UpdateSupermercato($ArrayDati[0], $ArrayDati[1], $ArrayDati[2]);
    }
    
    function RemoveSupermercato($Id) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveSupermercato($Id);        
    }
    
    function UpdateUtente($Dati) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Admin->UpdateUtente($ArrayDati[0], $ArrayDati[1], $ArrayDati[2]);
    }
    
    function RemoveUtente($Id) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveUtente($Id);        
    } 
}
