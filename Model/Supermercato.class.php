<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supermercato
 *
 * @author beniamino
 */
require_once 'Prodotto.class.php';
require_once 'Indirizzo.class.php';
class Supermercato {
    private $Nome;
    private $Catalogo;
    private $Logo;
    private $Indirizzo;
    private $Id;
    /**
     * 
     * @param type $Nome tipo Stringa
     * @param type $Logo Immagine
     * @param type $Indirizzo istanza della classe Indirizzo.class
     * @param type $Id Stringa
     */
    function __construct($Nome, $Logo, $Indirizzo, $Id) {
        $this->Nome = $Nome;
        $this->Logo = $Logo;
        $this->Indirizzo = $Indirizzo;
        $this->Id = $Id;
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
     * @return type Immagine
     */
    function getLogo() {
        return $this->Logo;
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
    function getId() {
        return $this->Id;
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
     * @param type $Logo Immagine
     */
    function setLogo($Logo) {
        $this->Logo = $Logo;
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

    function setId($Id) {
       
        $this->Id = $Id;
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
                if ($value->Id==$IdProd)
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
        $IdCercato=$Prodotto->Id;
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


    



}
