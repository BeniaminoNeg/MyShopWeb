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
class FUtente extends FDB {
 
     function __construct() {
	parent::__construct();
    }
    
     function VerificaEmail($email) {
         $trovato = false;
        $EmailTrovata=parent::search_contains("UtenteRegistrato", "Email", $email);
        if ($EmailTrovata= null){
            $trovato = true;
        }
        return $trovato;        
    }
    
    function MemorizzaUtente ($Password, $Email, $Nome, $Cognome){
        parent::putintoDB("UtenteRegistrato", $password, $email, $Nome, $cognome);
    }
    
    function GetUtenteByMail($mail) {
        $Utente=  parent::search_equals("UtenteRegistrato", "Email", $mail);
        return $Utente;
    }
    
    function VerificaPassword($mail, $passwd) {
        $PasswdCorretta=false;
        $passwdDB=  parent::searchColonnaSelect("UtenteRegistrato", "Password", "Email", $mail);
        if ($passwd==$passwdDB){
            $PasswdCorretta=true;
        }
        return $PasswdCorretta;
    }
}
?>
