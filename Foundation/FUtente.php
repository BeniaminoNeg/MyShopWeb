<?php

/**
 * Description of FUtente
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
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
    
    function MemorizzaUtente ($Password, $Email, $Nome, $Cognome, $Prodottiosservati){
        parent::putintoDB("UtenteRegistrato", $password, $email, $Nome, $cognome, $Prodottiosservati);
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
