<?php

/**
 * Description of CCategoria
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


class CCategoria {
    /**
     * 
     * @param type string $Categoria 
     * @return type json di un array di prodotti appartenenti alla categoria
     */
    function RicercaPerCategoria($Categoria) {
        
        $CRicercaProdotto = new CRicercaProdotto();
        $Prodotti = $CRicercaProdotto->RicercaPerCategoria($Categoria);
        $Json = json_encode($Prodotti);
        return $Json;
    }
}
?>