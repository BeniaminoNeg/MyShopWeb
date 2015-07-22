<?php
/**
 * Description of FAmministratore
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

require_once 'FDB.php';

class FAmministratore extends FDB {
    /**
     * Verifica se l'admin
     * è presente sulla
     * Tabella Amministratori
     * 
     * @param type $Username
     * @return boolean
     */
    function VerificaUsername($Username) {
        
        $trovato = false;
        $UsernameTrovata=parent::search_equals("Amministratori", "Username", $Username);
        if ($UsernameTrovata != null){
            $trovato = true;
        }
        return $trovato;        
    }
    /**
     * Verifica se la password
     * inserita dall'admin
     * è presente sulla
     * Tabella Amministratori
     * 
     * @param type $Username
     * @param type $passwd
     * @return boolean
     */
    function VerificaPassword($Username, $passwd) {
        
        $PasswdCorretta=false;
        $arrpasswdDB=  parent::searchColonnaSelect("Amministratori", "Password", "Username", $Username);
        $passwdDB=$arrpasswdDB [0]["Password"];
        if ($passwd==$passwdDB){
            $PasswdCorretta=true;
        }
        return $PasswdCorretta;
    }
    /**
     * Restituisce la tupla
     * selezionata dalla Tabella Amministratori  grazie 
     * alla username
     * 
     * @param type $Username
     * @return type
     */
    function GetUtenteByUsername($Username) {
        
        $Utente=  parent::search_equals("Amministratori", "Username", $Username);
        return $Utente;
    }
}
?>