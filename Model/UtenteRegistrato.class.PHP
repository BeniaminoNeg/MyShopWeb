<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utente
 *
 * @author Silvia
 */
class UtenteRegistrato {
    private $Nome;
    private $Cognome;
    private $Password;
    private $email;
    private $ProdottiOsservati;

    
    function __construct($Nome, $Cognome, $Username, $Password, $email) {
        $this->Nome = $Nome;
        $this->Cognome = $Cognome;
        $this->Username = $Username;
        $this->Password = $Password;
        $this->email = $email;
     
    }
    
    
    public function getNome() {
        return $this->Nome;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function getCognome() {
        return $this->Cognome;
    }

    public function setCognome($Cognome) {
        $this->Cognome = $Cognome;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function setPassword($Password) {
        $this->Password = $Password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getProdottiOsservati() {
        return $this->ProdottiOsservati;
    }

    public function setProdottiOsservati($ProdottiOsservati) {
        $this->ProdottiOsservati = $ProdottiOsservati;
    }


    
}

?>
