<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Prodotto
 *
 * @author beniamino
 */
class Prodotto {
    private $Id; 
    private $Nome;
    private $Immagine;
    private $Descrizione;
    private $Prezzo;
    private $SupermercatoId;  
    
    /**
     * 
     * @param type $Id
     * @param type $Nome
     * @param type $Immagine
     * @param type $Descrizione
     * @param type $Prezzo
     * @param type $SupermercatoId
     */
    function __construct($Id, $Nome, $Immagine, $Descrizione, $Prezzo, $SupermercatoId) {
        $this->Id = $Id;
        $this->Nome = $Nome;
        $this->Immagine = $Immagine;
        $this->Descrizione = $Descrizione;
        $this->Prezzo = $Prezzo;
        $this->SupermercatoId = $SupermercatoId;
    }
    
    /**
     * 
     * @return String
     */
   
    
    function getId() {
        return $this->Id;
    }
    
    /**
     * 
     * @return String
     */
    function getNome() {
        return $this->Nome;
    }
    
    /**
     * 
     * @return Immagine del Prodotto
     */
    function getImmagine() {
        return $this->Immagine;
    }
    
    /**
     * 
     * @return Stringa
     */
    function getDescrizione() {
        return $this->Descrizione;
    }
    
    /**
     * 
     * @return Intero
     */
    function getPrezzo() {
        return $this->Prezzo;
    }
    
    /**
     * 
     * @return Stringa
     */
    function getSupermercatoId() {
        return $this->SupermercatoId;
    }
    
    /**
     * 
     * @param type $Id
     */
    function setId($Id) {
        $this->Id = $Id;
    }
    
    /**
     * 
     * @param type $Nome
     */
    
    function setNome($Nome) {
        $this->Nome = $Nome;
    }
    
    /**
     * 
     * @param type $Immagine
     */
    function setImmagine($Immagine) {
        $this->Immagine = $Immagine;
    }
    
    /**
     * 
     * @param type $Descrizione
     */
    
    function setDescrizione($Descrizione) {
        $this->Descrizione = $Descrizione;
    }
    /**
     * 
     * @param type $Prezzo
     */
    
    function setPrezzo($Prezzo) {
        $this->Prezzo = $Prezzo;
    }
    
    /**
     * 
     * @param type $SupermercatoId
     */
    
    function setSupermercatoId($SupermercatoId) {
        $this->SupermercatoId = $SupermercatoId;
    }

}
