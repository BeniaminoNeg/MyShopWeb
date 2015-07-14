<?php

/**
 * Description of FSupermercato
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

class FSupermercato extends FDB{
    /**
     * Eredita il costruttore
     * di FDB
     */
    function __construct() {
	
        parent::__construct();
    }  
    /**
     * Ricerca Il Supermercato
     * sulla Tabella Supermercato
     * tramite l'Ids
     * 
     * @param type $Ids
     * @return type
     */
    function RicercaPerIds($Ids) {
        $ArrayRisultati=parent::search_equals("Supermercato", "Ids", $Ids);
        return $ArrayRisultati;
    }
    /**
     * Conta le tuple
     * presenti sulla
     * Tabella Supermercato
     * 
     * @return type
     */
    function ContaSupermercati() {
        
        $NumSupermercati=  parent::Conta("Ids", "Supermercato");
        return $NumSupermercati;
    }
}
?>