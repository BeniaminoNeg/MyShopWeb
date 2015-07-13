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
    
    public function Registrazione($nome,$cognome,$passwd,$email) {
      
       $UtenteDAO = new FUtente ();
       if (!$UtenteDAO->VerificaEmail($email)){
           $UtenteDAO->MemorizzaUtente($passwd, $email, $nome, $cognome);
       }
    }
    /**
     * 
     * @param type $email
     * @return type boolean ritorna true se l' email non è già nel database
     */
    public function VerificaEmailUnica ($email)
    {
        
        $Bool=false;
        $UtenteDAO= new FUtente ();
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false )
        {
                if (!$UtenteDAO->VerificaEmail($email)){//la funz è true se l' email c'è >> voglio invertire il risultao
                $Bool=true;
            }
        }
        
        $JsonRisultato=  json_encode($Bool);
        return $JsonRisultato;
    }
}
?>
