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
        for ($i = 1; $i < $NumProdotti+1; $i++) {
            if(intval($i/10) == 0){
                $j="00".$i;
            }else{
                for ($k = 0; $k < 2-log10($i); $k++) {
                    $j = "0".$i;
                }
            }
            $j="P".$j;
            $ArrayProd[] = $CRicercaProdotto->RicercaPerId($j);
            var_dump($j);
        }
        
        $ArrayCategorie = array();
    }
        
        
    
}
