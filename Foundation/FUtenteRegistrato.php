<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FUtenteRegistrato
 *
 * @author juan
 */
class FUtenteRegistrato extends FDB {
 
     function __construct() {
	parent::__construct();
    }
    
     function VerificaEmailUnica($email) {
         $trovato = false;
        $EmailTrovata=parent::search_contains("UtenteRegistrato", "Email", $email);
        if ($EmailTrovata= null)
        {
            $trovato = true;
        }
        return $trovato;        
    }
    
    function MemorizzaUtente ($Password, $Email, $Nome, $Cognome){
        parent::putintoDB("UtenteRegistrato", $password, $email, $Nome, $cognome);
    }
}
