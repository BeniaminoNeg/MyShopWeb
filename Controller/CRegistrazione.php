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
    public function Registrazione($JsonUtente) {
        $Utente=  json_decode($JsonUtente);
        $UtenteDAO = new FUtente ();
        if ($UtenteDAO->VerificaEmailUnica($Utente[1]))
        {
            $UtenteDAO->MemorizzaUtente($Utente[0],$Utente[1],$Utente[2],$Utente[3],$Utente[4]);
        }
    }
    public function VerificaEmailUnica ($JsonMail)
    {
        $Bool=false;
        $Mail=  json_decode($JsonMail);
        $UtenteDAO= new FUtente ();
        if ($UtenteDAO-> VerificaEmailUnica($Mail))
        {
            $Bool=true;
        }
        return $Bool;
    }
}
