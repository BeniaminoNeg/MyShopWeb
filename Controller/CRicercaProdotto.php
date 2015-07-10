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
require_once 'CSessione.php';

class CRicercaProdotto {
    function __construct() {
    }
    
    function RicercaPerNome($nome) {
        
       $CSessione=new CSessione();
       $CSessione->Session();
        header('Content-Type: application/json; charset=UTF-8');
        $ProdottoDAO=new FProdotto();
        $ArrayRisultatiProd=$ProdottoDAO->RicercaPerNome($nome);//SOLO PER PROVA, ANDRÀ SOSTITUITO CON IL CAMPO DI POST
        $ArrayProdotti=array();
        foreach ($ArrayRisultatiProd as $key => $value) {
            $ArrayProdotti[]= new Prodotto($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]);
        }       
        $ArrayProdString=array();
        foreach ($ArrayProdotti as $key => $value) {
            $ArrayProdString[] = $value->getAsArray(); 
        }
        return $ArrayProdString;
    }
    
    function RicercaPerId($Id){
        
        header('Content-Type: application/json; charset=UTF-8');
        $ProdottoDAO=new FProdotto();
        $ArayRisultatiProd= $ProdottoDAO->RicercaPerId($Id);
        $ArrayProd=array();
        foreach ($ArayRisultatiProd as $key => $value) {
            $ArrayProd[]=new Prodotto($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]);  
            //var_dump($ArrayProd);
        }
        $ArrayProdString=array();
        foreach ($ArrayProd as $key => $value) {
            $ArrayProdString[] = $value->getAsArray(); 
        }
        return $ArrayProdString;
    }
    
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
    
    function RicercaPerIds($Ids) {//lo chiama Cmarket
        
        header('Content-Type: application/json; charset=UTF-8');
        $ProdottoDAO=new FProdotto();
        $ArayRisultatiProd= $ProdottoDAO->RicercaPerIds($Ids);
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