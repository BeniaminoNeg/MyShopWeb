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
    /**
     * Verifica se l'email
     * dell'utente è presente
     * sulla Tabella UtenteRegistrato
     * 
     * @param type $email
     * @return boolean vede se nel database c'è l' email del parametro
     */
    function VerificaEmail($email) {
        $trovato = false;
        $EmailTrovata = parent::search_equals("UtenteRegistrato", "Email", $email);
        if ($EmailTrovata != null){
            $trovato = true;
        }
        return $trovato;        
    }
    /**
     * Inserisce l'utente nella
     * Tabella UtenteRegistrato
     * 
     * @param type $Password
     * @param type $Email
     * @param type $Nome
     * @param type $Cognome
     */
    function MemorizzaUtente ($Password, $Email, $Nome, $Cognome){
        $ElencoColonne="`Nome`, `Cognome`, `Password`, `Email`, `Prodottiosservati`";
        $TuplaValori= "'$Nome', '$Cognome', '$Password', '$Email', ''";
        $result=parent::putintoDB("UtenteRegistrato", $ElencoColonne, $TuplaValori);
    }
    /**
     * Restituisce la tupla
     * della Tabella UtenteRegistrato
     * tramite l'email
     * @param type $mail
     * @return type
     */
    function GetUtenteByMail($mail) {
        $Utente=  parent::search_equals("UtenteRegistrato", "Email", $mail);
        return $Utente;
    }
    /**
     * Verifica se la password inserita dall' utente
     * corrisponde a quella sulla Tabella UtenteRegistrato
     * @param type $mail
     * @param type $passwd
     * @return boolean
     */
    function VerificaPassword($mail, $passwd) {
        $PasswdCorretta=false;
        $arrpasswdDB=  parent::searchColonnaSelect("UtenteRegistrato", "Password", "Email", $mail);
        $passwdDB=$arrpasswdDB [0]["Password"];
        if ($passwd==$passwdDB){
            $PasswdCorretta=true;
        }
        
        return $PasswdCorretta;
    }
    /**
     * Aggiunge i prodotti osservati 
     * nella corrispondente colonna
     * della Tabella UtenteRegistrato
     * @param type $IdpPreferito
     * @param type $email
     */
    function addPreferito($IdpPreferito,$email) {
     
        $Risult=  parent::searchColonnaSelect("UtenteRegistrato", "Prodottiosservati", "Email", $email);
        $StringaPreferiti=$Risult [0]["Prodottiosservati"];
        if($StringaPreferiti=="")
        {
            $StringaPreferiti="$IdpPreferito";
        }
        else
        {
            $StringaPreferiti=$StringaPreferiti.",".$IdpPreferito;
        }
        parent::UpdateAttributo("UtenteRegistrato", "Prodottiosservati", $StringaPreferiti, "Email", $email);    
    }
    /**
     * Rimuove i prodotti osservati 
     * dalla corrispondente colonna
     * @param type $IdpPreferito
     * @param type $email
     */
    function removePreferito($IdpPreferito,$email) {
        $Risult=  parent::searchColonnaSelect("UtenteRegistrato", "ProdottiOsservati", "Email", $email);
        $StringaPreferiti=$Risult [0]["ProdottiOsservati"];
        $ArrayPreferiti=  explode(",", $StringaPreferiti);
        if (in_array($IdpPreferito, $ArrayPreferiti))
        {
            unset($ArrayPreferiti[array_search($IdpPreferito, $ArrayPreferiti)]);
        }
        $StringaPreferiti= implode(",", $ArrayPreferiti);
        parent::UpdateAttributo("UtenteRegistrato", "Prodottiosservati", $StringaPreferiti, "Email", $email);
            
    }
}
?>
