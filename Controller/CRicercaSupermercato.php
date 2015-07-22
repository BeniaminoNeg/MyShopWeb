<?php

/**
 * Description of C
 *
* @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano
 */

foreach (glob("Model/*.php") as $filename){
    require_once $filename;

}
foreach (glob("Foundation/*.php") as $filename){
    require_once $filename;
}

class CRicercaSupermercato {
    /**
     * 
     * @param type $Ids chiave per accedere alla tupla
     * @return type json di un array di supermercati
     */
    function RicercaPerIds($Ids) {
       
        header('Content-Type: application/json; charset=UTF-8');
        $SupermercatoDAO=new FSupermercato();
        $SupTrovato= $SupermercatoDAO->RicercaPerIds($Ids);
        $Indirizzo = new Indirizzo($SupTrovato[0]["Via"], $SupTrovato[0]["Citta"], $SupTrovato[0]["Civico"]);
        $Supermercato =new Supermercato($SupTrovato[0]["Nome"], $Indirizzo, $SupTrovato[0]["Ids"]);  
        $SupString = $Supermercato->getAsArray();
        return $SupString;
    }
}
?>