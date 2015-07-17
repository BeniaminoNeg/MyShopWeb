<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Amministratore
 *
 * @author juan
 */


class Amministratore {
    
    private $Password;
    private $Username;
    
    function __construct($Password, $Username) {
        $this->Password = $Password;
        $this->Username = $Username;
    }
    
    public function getPassword() {
        return $this->Password;
    }

    public function setPassword($Password) {
        $this->Password = $Password;
    }

    public function getUsername() {
        return $this->Username;
    }

    public function setUsername($Username) {
        $this->Username = $Username;
    }
    
    function AddImmagine($Id, $Size, $Type, $Immagine_originale){
        $Fdb = new FDB();
        $ElencoColonne = "`Id`, `Size`, `Type`, `Immagine_Originale`";
        $TuplaValori = "'$Id', '$Size', '$Type', '$Immagine_originale'";
        $Fdb->AddTupla("Immagine", $ElencoColonne, $TuplaValori);
    }
    
    function UpdateImmagine($Colonna, $Valore, $ValChiave) {
        $Fdb = new FDB();
        $Fdb->UpdateAttributo("Immagine", $Colonna, $Valore, "Id", "$ValChiave");
    }
    
    function RemoveImmagine($Id) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("Immagine", "Id", $Id);
    }
   
    function AddProdotto($Id, $Nome, $Descrizione, $Prezzo, $Ids, $Categoria) {
        $Fdb = new FDB();
        $ElencoColonne = "`Id`, `Nome`, `Descrizione`, `Prezzo`, `Ids`, `Categoria`";
        $TuplaValori = "'$Id', '$Nome', '$Descrizione', '$Prezzo', '$Ids', '$Categoria'";
        $Fdb->AddTupla("Catalogo", $ElencoColonne, $TuplaValori);
    }
    
    Function UpdateProdotto($Colonna, $Valore, $ValChiave){
        $Fdb = new FDB();
        $Fdb->UpdateAttributo("Catalogo", $Colonna, $Valore, "Id", "$ValChiave");
    }
    
    function RemoveProdotto($Id) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("Catalogo", "Id", $Id);
    }
    
    function AddSupermercato($Ids, $Nome, $Via, $Città, $Civico) {
        $Fdb = new FDB();
        $ElencoColonne = "`Ids`, `Nome`, `Via`, `Citta`, `Civico`";
        $TuplaValori = "'$Ids', '$Nome', '$Via', '$Città', '$Civico'";
        $Fdb->AddTupla("Supermercato", $ElencoColonne, $TuplaValori);
    }
    
    function UpdateSupermercato($Colonna, $Valore, $ValChiave) {
        $Fdb = new FDB();
        $Fdb->UpdateAttributo("Supermercato", $Colonna, $Valore, "Ids", "$ValChiave");
    }
    
    function RemoveSupermercato($Id) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("Supermercato", "Ids", $Id);
    }
    
    function RemoveUtente($Email) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("UtenteRegistrato", "Email", $Email);
    }
    
    Function UpdateUtente($Colonna, $Valore, $ValChiave){
        $Fdb = new FDB();
        $Fdb->UpdateAttributo("UtenteRegistrato", $Colonna, $Valore, "Email", "$ValChiave");
    }
}
