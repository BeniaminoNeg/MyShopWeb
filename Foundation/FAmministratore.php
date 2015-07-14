<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FAmministratore
 *
 * @author juan
 */
require_once 'FDB.php';

class FAmministratore extends FDB {
    
    function VerificaUsername($Username) {
        $trovato = false;
        $UsernameTrovata=parent::search_equals("Amministratori", "Username", $Username);
        if ($UsernameTrovata != null){
            $trovato = true;
        }
        return $trovato;        
    }
    
    function VerificaPassword($Username, $passwd) {
        $PasswdCorretta=false;
        $arrpasswdDB=  parent::searchColonnaSelect("Amministratori", "Password", "Username", $Username);
        $passwdDB=$arrpasswdDB [0]["Password"];
        if ($passwd==$passwdDB){
            $PasswdCorretta=true;
        }
        return $PasswdCorretta;
    }
    
    function GetUtenteByUsername($Username) {
        $Utente=  parent::search_equals("Amministratori", "Username", $Username);
        return $Utente;
    }
}
