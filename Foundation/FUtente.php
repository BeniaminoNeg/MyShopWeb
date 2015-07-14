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
    
    function MemorizzaUtente ($Password, $Email, $Nome, $Cognome){
        $ElencoColonne="`Nome`, `Cognome`, `Password`, `Email`, `Prodottiosservati`";
        $TuplaValori= "'$Nome', '$Cognome', '$Password', '$Email', ''";
        $result=parent::putintoDB("UtenteRegistrato", $ElencoColonne, $TuplaValori);
    }
    
    function GetUtenteByMail($mail) {
        $Utente=  parent::search_equals("UtenteRegistrato", "Email", $mail);
        return $Utente;
    }
    
    function VerificaPassword($mail, $passwd) {
        $PasswdCorretta=false;
        $arrpasswdDB=  parent::searchColonnaSelect("UtenteRegistrato", "Password", "Email", $mail);
        //var_dump($arrpasswdDB);
        $passwdDB=$arrpasswdDB [0]["Password"];
        if ($passwd==$passwdDB){
            $PasswdCorretta=true;
        }
        
        return $PasswdCorretta;
    }
    
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
    
    function removePreferito($IdpPreferito,$email) {
        $Risult=  parent::searchColonnaSelect("UtenteRegistrato", "ProdottiOsservati", "Email", $email);
        $StringaPreferiti=$Risult [0]["ProdottiOsservati"];
        $ArrayPreferiti=  explode(",", $StringaPreferiti);
        //var_dump($ArrayPreferiti);
        if (in_array($IdpPreferito, $ArrayPreferiti))
        {
            unset($ArrayPreferiti[array_search($IdpPreferito, $ArrayPreferiti)]);
        }
        //var_dump($ArrayPreferiti);
        $StringaPreferiti= implode(",", $ArrayPreferiti);
        //var_dump($StringaPreferiti);
        parent::UpdateAttributo("UtenteRegistrato", "Prodottiosservati", $StringaPreferiti, "Email", $email);
            
    }
}
?>
