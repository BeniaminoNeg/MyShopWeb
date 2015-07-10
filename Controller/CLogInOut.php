<?php

/**
 * Description of CLogInOut
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

require_once './Model/Utente.class.php';
require_once './Foundation/FUtente.php';
require_once 'CSessione.php';

class CLogInOut {
    public function LogIn() {
        
        $email= mysql_escape_string($_POST['email']);
        $passwd= mysql_escape_string($_POST['password']);
        $UtenteDAO = new FUtente ();
        if ($UtenteDAO->VerificaEmail($email))//è registrato?
        {
            if ($UtenteDAO->VerificaPassword($mail, $passwd))
            {
                // a questo punto la la passwd corrisponde alla mail
                $AttrUtente=$UtenteDAO->GetUtenteByMail($mail);
                $Utente= new Utente($AttrUtente[2], $AttrUtente[3], $AttrUtente[0], $AttrUtente[1]);
                $_SESSION['oggetto_utente_loggato']=$Utente;
                $_SESSION['stato_log']='in';
                //MANCANO I PRODOTTI TENUTI SOTTO OSSERVAZIONE, NON CI SONO NEANCHE NEL DATABASE!
            }
        }
    }
    
    public function LogOut() {
        session_start();
        $_SESSION['stato_log']='out';
        session_destroy();
    }
}
?>
