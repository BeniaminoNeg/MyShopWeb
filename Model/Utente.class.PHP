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
    private $Nome;
    private $Cognome;
    private $Password;
    private $email;
    private $ProdottiOsservati;
    
    function __construct($Nome, $Cognome, $Password, $email, $ProdottiOsservati) {
        $this->Nome = $Nome;
        $this->Cognome = $Cognome;
        $this->Password = $Password;
        $this->email = $email;
        $this->ProdottiOsservati= $ProdottiOsservati;
     
    }
    
    public function getNome() {
        return $this->Nome;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function getCognome() {
        return $this->Cognome;
    }

    public function setCognome($Cognome) {
        $this->Cognome = $Cognome;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function setPassword($Password) {
        $this->Password = $Password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getProdottiOsservati() {
        return $this->ProdottiOsservati;
    }

    public function setProdottiOsservati($ProdottiOsservati) {
        $this->ProdottiOsservati= $ProdottiOsservati;
    }
    
    public function toArray(){
        $array = (array) $this;
        array_walk_recursive($array, function (&$property) {
            if ($property instanceof UtenteRegistrato) {
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
