<?php

/**
 * Description of FImmagine
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

class FImmagine extends FDB {
    //put your code here
    function __construct() {
	parent::__construct();
    }
    
    function RicercaImmagine($Id) {
        //var_dump($Id);
        $Id="'$Id'";
        //var_dump($Id);
        $Risultato= parent::search_equals("Immagine", "Id", $Id);
        return $Risultato;   
    }
}

?>
