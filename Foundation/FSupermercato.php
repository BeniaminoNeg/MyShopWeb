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

    function __construct() {
	parent::__construct();
    }
    
    function RicercaPerIds($Ids) {
		$ArrayRisultati=parent::search_contains("Supermercato", "Ids", $Ids);
        return $ArrayRisultati;
    }
    
    function ContaSupermercati() {
        
        $NumSupermercati=  parent::Conta("Ids", "Supermercato");
        return $NumSupermercati;
    }
}
?>