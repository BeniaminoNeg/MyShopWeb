<?php

/**
 * Description of FProdotto
 *
  @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

class FProdotto extends FDB {

    function __construct() {
	parent::__construct();
    }
    
    function RicercaPerNome($tag) {
        $tag=  strtoupper($tag); //Nel DB sono tutte maiuscole
        $ArrayRisultati=parent::search_contains("Catalogo", "Nome", $tag);
        return $ArrayRisultati;
    }
    
    function RicercaPerId($Id) {
        
        $ArrayRisultati=parent::search_equals("Catalogo", "Id", $Id);
        return $ArrayRisultati;
    }
    
    function RicercaPerCategoria($Categoria) {
       
        $ArrayRisultati=parent::search_equals("Catalogo", "Categoria", $Categoria);
        return $ArrayRisultati;
    }
    
    function RicercaPerIds($Ids) {
        $ArrayRisultati=parent::search_equals("Catalogo", "Ids", $Ids);
        return $ArrayRisultati;
    }
    
    function ContaProdotti() {
       
        $NumProdotti=  parent::Conta("Id", "Catalogo");
        return $NumProdotti;
    }
    
    function GetProdottiById($id) {
        
        $Prodotto=  parent::search_equals("Catalogo", "id", $id);
        return $Prodotto;
    }
}
?>
