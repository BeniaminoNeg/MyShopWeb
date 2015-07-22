<?php

/**
 * Description of CRicercaProdotto
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

class CRicercaProdotto {
    function __construct() {
    }
    /**
     * 
     * @param type $nome nome da trovare nel db
     * @return type json del prodotto
     */
    function RicercaPerNome($nome) {
        
       
        header('Content-Type: application/json; charset=UTF-8');
        $ProdottoDAO=new FProdotto();
        $ArrayRisultatiProd=$ProdottoDAO->RicercaPerNome($nome);
        $ArrayProdotti=array();
        foreach ($ArrayRisultatiProd as $key => $value) {
            $ArrayProdotti[]= new Prodotto($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]);
        }       
        $ArrayProdString=array();
        foreach ($ArrayProdotti as $key => $value) {
            $ArrayProdString[] = $value->getAsArray(); 
        }
        $JSonRisultato=  json_encode($ArrayProdString);
        return $JSonRisultato;
    }
    /**
     * 
     * @param type $Id chiave per trovare nel db
     * @return type jason del oggetto prodotto
     */
    function RicercaPerId($Id){
        header('Content-Type: application/json; charset=UTF-8');
        $ProdottoDAO=new FProdotto();
        $ProdTrovato= $ProdottoDAO->RicercaPerId($Id);
        $Prodotto =new Prodotto($ProdTrovato[0]["Id"], $ProdTrovato[0]["Nome"], $ProdTrovato[0]["Descrizione"], $ProdTrovato[0]["Prezzo"], $ProdTrovato[0]["Ids"], $ProdTrovato[0]["Categoria"]);  
        $ProdString = $Prodotto->getAsArray();
        return $ProdString;
    }
    /**
     * 
     * @param type $Categoria
     * @return type jason di un array di prodotti
     */
    function RicercaPerCategoria($Categoria){//lo chiama ccategoria
        
        header('Content-Type: application/json; charset=UTF-8');
        $ProdottoDAO=new FProdotto();
        $ArayRisultatiProd= $ProdottoDAO->RicercaPerCategoria($Categoria);
        $ArrayProd=array();
        foreach ($ArayRisultatiProd as $key => $value) {
            $ArrayProd[]=new Prodotto($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]);            
        }
        $ArrayProdString=array();
        foreach ($ArrayProd as $key => $value) {
            $ArrayProdString[] = $value->getAsArray(); 
        }
        return $ArrayProdString;
    }
    /**
     * 
     * @param type $Ids chiave
     * @return type json di array di prodotti
     */
    function RicercaPerIds($Ids) {//lo chiama Cmarket
        
        header('Content-Type: application/json; charset=UTF-8');
        $ProdottoDAO=new FProdotto();
        $ArayRisultatiProd= $ProdottoDAO->RicercaPerIds($Ids);
        //var_dump($ArayRisultatiProd);
        $ArrayProd=array();
        foreach ($ArayRisultatiProd as $key => $value) {
            $ArrayProd[]=new Prodotto($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]);            
        }
        $ArrayProdString=array();
        foreach ($ArrayProd as $key => $value) {
            $ArrayProdString[] = $value->getAsArray(); 
        }
        return $ArrayProdString;
    }
}
?>