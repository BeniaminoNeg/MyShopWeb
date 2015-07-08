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
    private $Nome;
    private $Catalogo;
    private $Indirizzo;
    private $Ids;
    /**
     * 
     * @param type $Nome tipo Stringa
     * @param type $Logo Immagine
     * @param type $Indirizzo istanza della classe Indirizzo.class
     * @param type $Id Stringa
     */
    function __construct($Nome, $Logo, $Indirizzo, $Ids) {
        $this->Nome = $Nome;
        $this->Indirizzo = $Indirizzo;
        $this->Ids = $Ids;
        $this->Catalogo= array();
    }
    /**
     * 
     * @return type String
     */
    function getNome() {
        return $this->Nome;
    }
    /**
     * 
     * @return type Indirizzo
     */
    function getIndirizzo() {
        return $this->Indirizzo;
    }
    /**
     * 
     * @return type String
     */
    function getIds() {
        return $this->Ids;
    }
    /**
     * 
     * @param type $Nome String
     */
    function setNome($Nome) {
        $this->Nome = $Nome;
    }
    /**
     * 
     * @param type $Indirizzo Indirizzo
     */
    function setIndirizzo($Indirizzo) {
        $this->Indirizzo = $Indirizzo;
    }
    /**
     * 
     * @param type $Id String
     */
    function setIds($Ids) {
       
        $this->Ids = $Ids;
    }
    /**
     * 
     * @param type $IdProd Stringa
     * @return type Prodotto
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
     */
    function getCatalogo() {
        return $this->Catalogo;
    }
    
    public function toArray()
    {
        $array = (array) $this;
        array_walk_recursive($array, function (&$property) {
            if ($property instanceof Supermercato) {
             $property = $property->toArray();
            }
        });
        return $array;
    }
    
    public function getAsArray() {
	$result=array();
    	foreach($this as $key => $value) {
            if (!is_array($value) && !is_object($value)) {
                $result[$key] = $value;
            }else if(is_object ($value)){
                $result[$key]=$value->getAsArray();
            }
    	}
    return $result;
    }
}
?>