<?php
/**
 * Description of Supermercato
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */
require_once 'Prodotto.class.php';
require_once 'Indirizzo.class.php';

class Supermercato {
    /**
     *
     * @var type 
     * Attributo Nome
     */
    private $Nome;
    /**
     *
     * @var type 
     * Attributo Catalogo
     */
    private $Catalogo;
    /**
     *
     * @var type 
     * Attributo Indirizzo
     */
    private $Indirizzo;
    /**
     *
     * @var type 
     * Attributo Ids
     */
    private $Ids;
    /**
     * 
     * @param type $Nome tipo Stringa
     * @param type $Logo Immagine
     * @param type $Indirizzo istanza della classe Indirizzo.class
     * @param type $Ids Stringa
     * Costruttore Supermercato
     */
    function __construct($Nome, $Indirizzo, $Ids) {
        $this->Nome = $Nome;
        $this->Indirizzo = $Indirizzo;
        $this->Ids = $Ids;
        $this->Catalogo= array();
    }
    /**
     * 
     * @return type String
     * Restituisce il nome
     */
    function getNome() {
        return $this->Nome;
    }
    /**
     * 
     * @return type Indirizzo
     * Restituisce l'indirizzo
     */
    function getIndirizzo() {
        return $this->Indirizzo;
    }
    /**
     * 
     * @return type String
     * Restituisce l'Ids Del supermercato
     */
    function getIds() {
        return $this->Ids;
    }
    /**
     * 
     * @param type $Nome String
     * Imposta il Nome
     */
    function setNome($Nome) {
        $this->Nome = $Nome;
    }
    /**
     * 
     * @param type $Indirizzo Indirizzo
     * Imposta l'indirizzo
     */
    function setIndirizzo($Indirizzo) {
        $this->Indirizzo = $Indirizzo;
    }
    /**
     * 
     * @param type $Id String
     * Imposta l'Ids del Supermercato
     */
    function setIds($Ids) {
        $this->Ids = $Ids;
    }
    /**
     * 
     * @param type $IdProd Stringa
     * @return type Prodotto
     * Restituisce un prodotto presente
     * sul Catalogo del Supermercato
     */
    function getProdotto($IdProd)
    {
        $ProdottoCercato=false; //usato come booleano
        foreach ($this->Catalogo as $key => $value) {
            if (gettype($value)=="Prodotto")
            {
                if ($value->Ids==$IdProd)
                {
                    $ProdottoCercato=$value;
                }
            }
        }
        return $ProdottoCercato;
    }
    /**
     * 
     * @param type $Prodotto Prodotto
     * Aggiunge un Prodotto nel Catalogo
     */
    function addProdotto($Prodotto) {
        $IdCercato=$Prodotto->Ids;
        if($this->VerificaProdotto($IdCercato)==false)
        {
            $this->Catalogo[]=$Prodotto;
        }
    }
    /**
     * 
     * @return type Array
     * Retsituisce il Catalogo
     */
    function getCatalogo() {
        return $this->Catalogo;
    }
    /**
     * 
     * @return type
     * restituisce Un ggetto come un Array
     */
    public function getAsArray() {
	$result=array();
    	foreach($this as $key => $value) {
            if (!is_array($value) && !is_object($value)) {
                $result[$key] = $value;
            }else if(is_object ($value)){
                $result[$key]=$value;
            }
    	}
        return $result;
    }
}
?>