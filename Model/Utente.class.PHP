<?php
/**
 * Description of Utente
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */
class Utente {
    /**
     *
     * @var type 
     * Attributo Nome
     */
    private $Nome;
    /**
     *
     * @var type 
     * Attributo Cognome
     */
    private $Cognome;
    /**
     *
     * @var type 
     * Attributo Password
     */
    private $Password;
    /**
     *
     * @var type 
     * Attributo Email
     */
    private $email;
    /**
     *
     * @var type 
     * Attributo Prodotti Osservati
     */
    private $ProdottiOsservati;
    /**
     * 
     * @param type $Nome
     * @param type $Cognome
     * @param type $Password
     * @param type $email
     * @param type $ProdottiOsservati
     * Costruttore Utente
     */
    function __construct($Nome, $Cognome, $Password, $email, $ProdottiOsservati) {
        $this->Nome = $Nome;
        $this->Cognome = $Cognome;
        $this->Password = $Password;
        $this->email = $email;
        $this->ProdottiOsservati= $ProdottiOsservati;
    }
    /**
     * 
     * @return type
     * Restituisce il Nome
     */
    public function getNome() {
        return $this->Nome;
    }
    /**
     * 
     * @param type $Nome
     * Imposta Il nome
     */
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }
    /**
     * 
     * @return type
     * Restituisce il Cognome
     */
    public function getCognome() {
        return $this->Cognome;
    }
    /**
     * 
     * @param type $Cognome
     * Imposta il Cognome
     */
    public function setCognome($Cognome) {
        $this->Cognome = $Cognome;
    }
    /**
     * 
     * @return type
     * Restituisce la password
     */
    public function getPassword() {
        return $this->Password;
    }
    /**
     * 
     * @param type $Password
     * Imposta la Password
     */
    public function setPassword($Password) {
        $this->Password = $Password;
    }
    /**
     * 
     * @return type
     * Restituisce l'Email
     */
    public function getEmail() {
        return $this->email;
    }
    /**
     * 
     * @param type $email
     * Imposta l'email
     */
    public function setEmail($email) {
        $this->email = $email;
    }
    /**
     * 
     * @return type
     * restituisce i prodotti osservati
     */
    public function getProdottiOsservati() {
        return $this->ProdottiOsservati;
    }
    /**
     * 
     * @param type $ProdottiOsservati
     * imposta i Prodotti osservati
     */
    public function setProdottiOsservati($ProdottiOsservati) {
        $this->ProdottiOsservati= $ProdottiOsservati;
    }
    /**
     * 
     * @return type
     * Restituisce l'oggeto come un'array
     */
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