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
    
    function RicercaPerCategoria($Categoria) {
        
        $CRicercaProdotto = new CRicercaProdotto();
        $Prodotti = $CRicercaProdotto->RicercaPerCategoria($Categoria);
        $Json = json_encode($Prodotti);
        return $Json;
    }
    
    function Categorie() {
        $ProdottoDAO = new FProdotto();
        $NumProdotti = $ProdottoDAO->ContaProdotti();
        $NumProdotti = $NumProdotti[0][0];
        $CRicercaProdotto = new CRicercaProdotto();
        $ArrayProd = array();
        for ($i = 0; $i < $NumProdotti; $i++) {
            
            $ArrayProd [] = $CRicercaProdotto->RicercaPerId($i);
        }
        $ArrayCategorie = array();
    }
        
        
    
}
