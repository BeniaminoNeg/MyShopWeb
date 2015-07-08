<?php

/**
 * Description of CRegistrazione
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano
 */

require_once 'CSessione.php';

class CRegistrazione {
    
    public function Registrazione() {
       
       $CSessione=new CSessione();
       $CSessione->Session();
       $nome = mysql_escape_string($_POST['nome']);
       $cognome= mysql_escape_string($_POST['cognome']);
       $passwd= mysql_escape_string($_POST['password']);
       $email= mysql_escape_string($_POST['email']);
       $UtenteDAO = new FUtente ();
       if (!$UtenteDAO->VerificaEmail($email)){
           $UtenteDAO->MemorizzaUtente($nome,$cognome,$passwd,$email);
       }
    }
    public function VerificaEmailUnica ($JsonMail)
    {
        header('Content-Type: application/json');
        $Bool=false;
        $Mail=  json_decode($JsonMail);
        $UtenteDAO= new FUtente ();
        if ($UtenteDAO-> VerificaEmailUnica($Mail)){
            $Bool=true;
        }
        $JsonRisultato=  json_encode($Bool);
        return $JsonRisultato;
    }
}
?>
