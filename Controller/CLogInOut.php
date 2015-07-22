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
        $Log=false;
        $UtenteDAO = new FUtente ();
        
        if ($UtenteDAO->VerificaEmail($email))//è registrato?
        {
            if ($UtenteDAO->VerificaPassword($email, $passwd))
            {
                $AttrUtente=$UtenteDAO->GetUtenteByMail($email);
                $Utente = new Utente($AttrUtente[0]["Nome"], $AttrUtente[0]["Cognome"], $AttrUtente[0]["Password"], $AttrUtente[0]["Email"], $AttrUtente[0]["Prodottiosservati"]);
                $_SESSION['oggetto_utente_loggato']=$Utente;
                $_SESSION['stato_log']='in';
                $Log= array();
                $Log ['Nome'] = $Utente->getNome();
                $Log ['Cognome'] = $Utente->getCognome(); 
                return $Log;
            }
        }
        return $Log;
    }
    
    public function LoginAdmin($Username,$password) {
        
        $AdminDAO = new FAmministratore();
        $Log=false;
        if($AdminDAO->VerificaUsername($Username))
        {
            if($AdminDAO->VerificaPassword($Username, $password))
            {
                $AttrAmministratore = $AdminDAO->GetUtenteByUsername($Username);
                $Amministratore = new Amministratore($AttrAmministratore[0]["Password"], $AttrAmministratore[0]["Username"]);
                $_SESSION['oggetto_admin_loggato']=$Amministratore;
                $_SESSION['stato_log']='in';
                $Log= array();
                $Log ['Username'] = $Amministratore->getUsername();
            }
        }
            return $Log;

    }
        public function LogOut() {
        $_SESSION['stato_log']='out';
        
        session_destroy();
    }
    
    
}
?>
