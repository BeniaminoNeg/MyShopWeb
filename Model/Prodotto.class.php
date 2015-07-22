<?php
/**
 * Description of Prodotto
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */
class Prodotto {
    /**
     *
     * @var type 
     * Attributo id
     */
    private $Id;
    /**
     *
     * @var type 
     * Attributo Nome
     */
    private $Nome;
    /**
     *
     * @var type 
     * Attributo Decrizione
     */
    private $Descrizione;
    /**
     *
     * @var type 
     * Attributo Prezzo
     */
    private $Prezzo;
    /**
     *
     * @var type 
     * Attributo SupermercatoId
     */
    private $SupermercatoId;  
    /**
     *
     * @var type 
     * Attributo Categorie
     */
    private $Categorie;
   /**
    * 
    * @param type $Id
    * @param type $Nome
    * @param type $Immagine
    * @param type $Descrizione
    * @param type $Prezzo
    * @param type $SupermercatoId
    * @param type $Categorie
    * costruttore di Prodotto
    */
    function __construct($Id, $Nome, $Descrizione, $Prezzo, $SupermercatoId, $Categorie) {
        $this->Id = $Id;
        $this->Nome = $Nome;
        $this->Descrizione = $Descrizione;
        $this->Prezzo = $Prezzo;
        $this->SupermercatoId = $SupermercatoId;
        $this->Categorie = $Categorie;
    }
    /**
     * 
     * @return String
     * Restituisce l'id
     */
    function getId() {
        return $this->Id;
    }
    /**
     * 
     * @return String
     * Restituisce il Nome
     */
    function getNome() {
        return $this->Nome;
    }
    /**
     * 
     * @return Stringa
     * Restituisce La Descrizione
     */
    function getDescrizione() {
        return $this->Descrizione;
    }
    /**
     * 
     * @return Intero
     * Retituisce il Prezzo
     */
    function getPrezzo() {
        return $this->Prezzo;
    }
    /**
     * 
     * @return Stringa
     * Restituisce l'id del Supermercato
     */
    function getSupermercatoId() {
        return $this->SupermercatoId;
    }
   /**
    * 
    * @return type
    * Restituisce la Categoria
    */
    function getCategorie(){
        return $this->Categorie;
    }
     /**
     * 
     * @param type $Id
      * Imposta l'id
     */
    function setId($Id) {
        $this->Id = $Id;
    }
    /**
     * 
     * @param type $Nome
     * Imposta il Nome
     */
    function setNome($Nome) {
        $this->Nome = $Nome;
    }
    /**
     * 
     * @param type $Descrizione
     * Imposta la Descrizione
     */
    function setDescrizione($Descrizione) {
        $this->Descrizione = $Descrizione;
    }
    /**
     * 
     * @param type $Prezzo
     * Imposta il Prezzo
     */
    function setPrezzo($Prezzo) {
        $this->Prezzo = $Prezzo;
    }
    /**
     * 
     * @param type $SupermercatoId
     * Imposta l'id del Supermercato
     */
    function setSupermercatoId($SupermercatoId) {
        $this->SupermercatoId = $SupermercatoId;
    }
    /**
     * 
     * @param type $Categorie
     * Imposta La Categoria
     */
    function setCategorie($Categorie){
        $this->Categorie = $Categorie;
    }
    /**
     * 
     * @return type
     * Restituisce l'oggetto come un Array
     */
    public function getAsArray(){
        $result=array();
        foreach($this as $key => $value) {
                if (!is_array($value)) {
                        $result[$key]= $value;
                }
        }
        return $result;
    }
}
?>