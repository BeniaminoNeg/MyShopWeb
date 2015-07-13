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
        $EmailTrovata=parent::search_equals("UtenteRegistrato", "Email", $email);
        //var_dump($EmailTrovata);
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
        $passwdDB=$arrpasswdDB [0]["Password"];
        /*var_dump($passwdDB);
        echo '   ';
        var_dump($passwd);*/
        if ($passwd==$passwdDB){
            $PasswdCorretta=true;
        }
        //var_dump($PasswdCorretta);
        return $PasswdCorretta;
    }
}
?>
