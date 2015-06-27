<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CRegistrazione
 *
 * @author beniamino
 */
class CRegistrazione {
    public function Registrazione() {
        session_start();
        if (!isset($_SESSION['count']))
        {
            $_SESSION['count']=0;
            $_SESSION['start']=  time();
        }
        $_SESSION['count']++;
        $nome = mysql_escape_string($_POST['nome']);
        $cognome= mysql_escape_string($_POST['cognome']);
        $passwd= mysql_escape_string($_POST['password']);
        $email= mysql_escape_string($_POST['email']);

        
        
        $UtenteDAO = new FUtente ();
        if (!$UtenteDAO->VerificaEmail($email))
        {
            $UtenteDAO->MemorizzaUtente($nome,$cognome,$passwd,$email);
        }
    }
    public function VerificaEmailUnica ($JsonMail)
    {
        header('Content-Type: application/json');
        $Bool=false;
        $Mail=  json_decode($JsonMail);
        $UtenteDAO= new FUtente ();
        if ($UtenteDAO-> VerificaEmailUnica($Mail))
        {
            $Bool=true;
        }
        $JsonRisultato=  json_encode($Bool);
        return $JsonRisultato;
    }
}
