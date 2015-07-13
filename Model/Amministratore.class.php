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

class Amministratore  {
    
    function _construct() {
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
    
    function RemoveImmagine($Chiave, $Id) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("Immagine", $Chiave, $Id);
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
    
    function RemoveProdotto($Chiave, $Id) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("Catalogo", $Chiave, $Id);
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
    
    function RemoveSupermercato($Chiave, $Id) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("Supermercato", $Chiave, $Id);
    }
    
    function RemoveUtente($Chiave, $Email) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("UtenteRegistrato", $Chiave, $Email);
    }
    
    Function UpdateUtente($Colonna, $Valore, $ValChiave){
        $Fdb = new FDB();
        $Fdb->UpdateAttributo("UtenteRegistrato", $Colonna, $Valore, "Email", "$ValChiave");
    }
    
    
}
