<?php

/**
 * Description of CAmministratore
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
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
    /**
     * 
     * @param type $Id id del prodotto da rimuovere
     */
    function RemoveProdotto($Id) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveProdotto($Id);        
    }
    /**
     * Vengono passati tutti i campi del nuovo supermercato
     * @param type $Ids
     * @param type $Nome
     * @param type $Via
     * @param type $Città
     * @param type $Civico
     */
    function AddSupermercato($Ids, $Nome, $Via, $Città, $Civico) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->AddSupermercato($Ids, $Nome, $Via, $Città, $Civico);
    }
    /**
     * 
     * @param type $Colonna attributo da modificare
     * @param type $Valore nuovo valore
     * @param type $ValChiave identifica il prodotto da modificare
     */
    function UpdateSupermercato($Colonna, $Valore, $ValChiave) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->UpdateSupermercato($Colonna, $Valore, $ValChiave);
    }
    /**
     * 
     * @param type $Id id del supermercato da rimuovere
     */
    function RemoveSupermercato($Id) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveSupermercato($Id);        
    }
    /**
     * 
     * @param type $Colonna attributo da modificare
     * @param type $Valore nuovo valore
     * @param type $ValChiave identifica il prodotto da modificare
     */
    function UpdateUtente($Colonna, $Valore, $ValChiave) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->UpdateUtente($Colonna, $Valore, $ValChiave);
    }
    /**
     * 
     * @param type $Email identifica l' utente da rimuovere
     */
    function RemoveUtente($Email) {
        $Admin= $_SESSION ['oggetto_admin_loggato'];
        $Admin->RemoveUtente($Email);        
    } 
}
