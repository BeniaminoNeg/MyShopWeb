<?php

/**
 * Description of CMarket
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
require_once 'CSessione.php';

class CMarket {
    
    function RicercaMarket() {
        
        $SupermercatoDAO = new FSupermercato();
        $numeroSup = $SupermercatoDAO->ContaSupermercati();
        $numeroSup = $numeroSup[0][0];
        $CSupermercato = new CRicercaSupermercato();
        $ArraySup = array ();
        for ($i = 1; $i <= $numeroSup; $i++) {
            $ArraySup[] = $CSupermercato->RicercaPerIds($i);
        }
        $json= json_encode($ArraySup);
        return $json;
    }
    
    function CatalogoSup($Ids) {
        $CricercaProdotti = new CRicercaProdotto();
        $Catalogo = array ();
        $Catalogo[] = $CricercaProdotti->RicercaPerIds($Ids);
        $Json = json_encode($Catalogo);
        return $Json;
        
        
        
    }
}
