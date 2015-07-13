<?php

/**
 * Description of CLogInOut
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

require_once './Model/Utente.class.PHP';
require_once './Foundation/FUtente.php';
require_once 'CSessione.php';

class CLogInOut {
    public function LogIn($email,$passwd) { // parametri provvisori!!!!!!!!!!!!
        
        //$email= mysql_escape_string($_POST['email']);
        //$passwd= mysql_escape_string($_POST['password']);
        
        $UtenteDAO = new FUtente ();
        $email="'$email'";
        //var_dump($email);
        if ($UtenteDAO->VerificaEmail($email))//è registrato?
        {
            if ($UtenteDAO->VerificaPassword($email, $passwd))
            {
                // a questo punto la la passwd corrisponde alla mail
                $AttrUtente=$UtenteDAO->GetUtenteByMail($email);
                
                $Utente = new Utente($AttrUtente[0]["Nome"], $AttrUtente[0]["Cognome"], $AttrUtente[0]["Password"], $AttrUtente[0]["Email"], $AttrUtente[0]["Prodottiosservati"]);
                
                $_SESSION['oggetto_utente_loggato']=$Utente;
                $_SESSION['stato_log']='in';
                
                
                
            }
        }
    }
    
    public function LogOut() {
        $_SESSION['stato_log']='out';
        
        session_destroy();
    }
}
?>
