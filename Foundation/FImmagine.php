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
    
    function RicercaPerNome($tag) {
        $ArrayRisultati=parent::search_contains("Immagine", "Nome", $tag);
        return $ArrayRisultati;
    }
    
    function RicercaPerId($Id) {
        $ArrayRisultati=parent::search_equals("Immagine", "Id", $Id);
        return $ArrayRisultati;
    }
}
