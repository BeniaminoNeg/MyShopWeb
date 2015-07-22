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
    /**
     * Eredita il costruttore
     * di FDB
     */
    function __construct() {
	parent::__construct();
    }
    /**
     * Ricerca sulla Tabella
     * Catalogo se è presente
     * quel Prodotto con quel
     * nome
     * @param type $tag
     * @return type
     */
    function RicercaPerNome($tag) {
        
        $tag=  strtoupper($tag); //Nel DB sono tutte maiuscole
        $ArrayRisultati=parent::search_contains("Catalogo", "Nome", $tag);
        return $ArrayRisultati;
    }
    /**
     * Ricerca sulla Tabella
     * Catalogo il prodotto
     * tramite l'id
     * @param type $Id
     * @return type
     */
    function RicercaPerId($Id) {
       
        $ArrayRisultati=parent::search_equals("Catalogo", "Id", $Id);
        return $ArrayRisultati;
    }
    /**
     * Ricerca sulla Tabella
     * Catalogo il prodotto
     * tramite la Categoria
     * @param type $Categoria
     * @return type
     */
    function RicercaPerCategoria($Categoria) {
       
        $ArrayRisultati=parent::search_equals("Catalogo", "Categoria", $Categoria);
        return $ArrayRisultati;
    }
    /**
     * Ricerca sulla Tabella
     * Catalogo il prodotto
     * tramite l'ids
     * @param type $Ids
     * @return type
     */
    function RicercaPerIds($Ids) {
        
        $ArrayRisultati=parent::search_equals("Catalogo", "Ids", $Ids);
        return $ArrayRisultati;
    }
    /**
     * Conta le tuple
     * presenti sulla
     * Tabella Supermercato
     * @return type
     */
    function ContaProdotti() {
       
        $NumProdotti=  parent::Conta("Id", "Catalogo");
        return $NumProdotti;
    }
    /**
     * Ricerca sulla Tabella
     * Catalogo il prodotto
     * tramite l'id
     * @param type $id
     * @return type
     */
    function GetProdottiById($id) {
        
        $Prodotto=  parent::search_equals("Catalogo", "id", $id);
        return $Prodotto;
    }
}
?>