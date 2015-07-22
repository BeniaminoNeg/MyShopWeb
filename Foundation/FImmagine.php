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
    /**
     * Eredita il costruttore
     * di FDB
     */
    function __construct() {
	parent::__construct();
    }
    /**
     * Ricerca un immagine
     * sulla Tabella Immgine
     * tramite l'id
     * 
     * @param type $Id
     * @return type
     */
    function RicercaImmagine($Id) {
        
        $Risultato= parent::search_equals("Immagine", "Id", $Id);
        return $Risultato;   
    }
}

?>