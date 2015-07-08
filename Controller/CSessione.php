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
    //put your code here
     public function Session(){
        session_start();
        if (!isset($_SESSION['count']))
        {
            $_SESSION['count']=0;
            $_SESSION['start']=  time();
        }
        $_SESSION['count']++;
    }
}
