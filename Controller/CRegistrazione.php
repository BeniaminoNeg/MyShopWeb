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
       
       $Bool= false;
       $UtenteDAO = new FUtente ();
       if (!$UtenteDAO->VerificaEmail($email)){
            if(strpos($email, '@') !== false){ //andrebbe sostituito con qlks di migliore
              $UtenteDAO->MemorizzaUtente($passwd, $email, $nome, $cognome);
              $Bool=true;
            }
       }       
       return $Bool;
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
        var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
                if (!$UtenteDAO->VerificaEmail($email)){//la funz è true se l' email c'è >> voglio invertire il risultao
                   $Bool=true;
            }
        }
        var_dump($Bool);
        return $Bool;
    }
}
?>
