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
        //header('Content-Type: application/json');
        $nome = mysql_escape_string($_POST['name']);
        $pagina = file_get_contents($url);
        $Utente=  json_decode($pagina,true);
        $UtenteDAO = new FUtente ();
        if ($UtenteDAO->VerificaEmailUnica($Utente[1]))
        {
            $UtenteDAO->MemorizzaUtente($Utente[0],$Utente[1],$Utente[2],$Utente[3]);
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
