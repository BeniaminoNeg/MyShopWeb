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
    
    function AddImmagine($Dati, $Password, $Email) {
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->AddImmagine($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $ArrayDati[3]);
    }
    
    function UpdateImmagine($Dati, $Password, $Email) {
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->UpdateImmagine($ArrayDati[0], $ArrayDati[1], $ArrayDati[2]);
    }
    
    function RemoveImmagine($Id, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->RemoveImmagine($Id);        
    }
    
    function AddProdotto($Dati, $Password, $Email) {
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->AddProdotto($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $ArrayDati[3], $ArrayDati[4], $ArrayDati[5]);        
    }
    
    function UpdateProdotto($Dati, $Password, $Email) {
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->UpdateProdotto($ArrayDati[0], $ArrayDati[1], $ArrayDati[2]);
    }
    
    function RemoveProdotto($Id, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->RemoveProdotto($Id);        
    }
    
    function AddSupermercato($Dati, $Password, $Email) {
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->AddSupermercato($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $ArrayDati[3], $ArrayDati[4]);
    }
    
    function UpdateSupermercato($Dati, $Password, $Email) {
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->UpdateSupermercato($ArrayDati[0], $ArrayDati[1], $ArrayDati[2]);
    }
    
    function RemoveSupermercato($Id, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->RemoveSupermercato($Id);        
    }
    
    function UpdateUtente($Dati, $Password, $Email) {
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->UpdateUtente($ArrayDati[0], $ArrayDati[1], $ArrayDati[2]);
    }
    
    function RemoveUtente($Id, $Password, $Email) {
        $Amministratore = new Amministratore($Password, $Email);
        $Amministratore->RemoveUtente($Id);        
    } 
}
