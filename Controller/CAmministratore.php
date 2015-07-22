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
    function AddImmagine($Id, $Size, $Type, $Immagine_originale) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->AddImmagine($Id, $Size, $Type, $Immagine_originale);
    }
    /**
     * 
     * @param type $Dati stringa
     */
    function UpdateImmagine($Colonna, $Valore, $ValChiave) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->UpdateImmagine($Colonna, $Valore, $ValChiave);
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
    function AddProdotto($Id, $Nome, $Descrizione, $Prezzo, $Ids, $Categoria) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->AddProdotto($Id, $Nome, $Descrizione, $Prezzo, $Ids, $Categoria);        
    }
    /**
     * 
     * @param type $Dati stringa da suddividere per array
     */
    function UpdateProdotto($Colonna, $Valore, $ValChiave) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->UpdateProdotto($Colonna, $Valore, $ValChiave);
    }
    
    function RemoveProdotto($Id) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveProdotto($Id);        
    }
    
    function AddSupermercato($Ids, $Nome, $Via, $Città, $Civico) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->AddSupermercato($Ids, $Nome, $Via, $Città, $Civico);
    }
    
    function UpdateSupermercato($Colonna, $Valore, $ValChiave) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->UpdateSupermercato($Colonna, $Valore, $ValChiave);
    }
    
    function RemoveSupermercato($Id) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveSupermercato($Id);        
    }
    
    function UpdateUtente($Colonna, $Valore, $ValChiave) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->UpdateUtente($Colonna, $Valore, $ValChiave);
    }
    
    function RemoveUtente($Email) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveUtente($Email);        
    } 
}
