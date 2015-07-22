<?php

/**
 * Description of CSssione
 *
* @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano
 */

class CSessione {
    
     public function Session(){
        session_start();
        ini_set('session.name', "PHPSESSID_MYSHOP");
        ini_set('session.cookie_lifetime', '1800');
        ini_set('session.gc_maxlifetime', '1800');
        ini_set('session.cookie_httponly', 'true');
        if (!isset($_SESSION['count']))
        {
            $_SESSION['count']=0;
            $_SESSION['start']=  time();
        }
        $_SESSION['count']++;
    }
}
?>