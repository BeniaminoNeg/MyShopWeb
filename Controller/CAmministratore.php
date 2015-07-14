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
    
    function AddImmagine($Id, $Size, $Type, $Immagine_originale, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->AddImmagine($Id, $Size, $Type, $Immagine_originale);
    }
    
    function UpdateImmagine($Colonna, $Valore, $ValChiave, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->UpdateImmagine($Colonna, $Valore, $ValChiave);
    }
    
    function RemoveImmagine($Id, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->RemoveImmagine($Id);        
    }
    
    function AddProdotto($Id, $Nome, $Descrizione, $Prezzo, $Ids, $Categoria, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->AddProdotto($Id, $Nome, $Descrizione, $Prezzo, $Ids, $Categoria);        
    }
    
    function UpdateProdotto($Colonna, $Valore, $ValChiave, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->UpdateProdotto($Colonna, $Valore, $ValChiave);
    }
    
    function RemoveProdotto($Id, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->RemoveProdotto($Id);        
    }
    
    function AddSupermercato($Ids, $Nome, $Via, $Città, $Civico, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->AddSupermercato($Ids, $Nome, $Via, $Città, $Civico);
    }
    
    function UpdateSupermercato($Colonna, $Valore, $ValChiave, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->UpdateSupermercato($Colonna, $Valore, $ValChiave);
    }
    
    function RemoveSupermercato($Id, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->RemoveSupermercato($Id);        
    }
    
    function UpdateUtente($Colonna, $Valore, $ValChiave, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->UpdateUtente($Colonna, $Valore, $ValChiave);
    }
    
    function RemoveUtente($Id, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->RemoveUtente($Id);        
    } 
}
