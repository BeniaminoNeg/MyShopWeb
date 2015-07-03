<?php


class Indirizzo {
     
private $Via;
private $Città;
private $NumeroCivico;

    public function __construct($Via, $Città, $NumeroCivico) {
        $this->Via=$Via;
        $this->Città=$Città;
        $this->NumeroCivico;
    }

    public function getVia() {
        return $this->Via;
    }
    
    public function getCittà(){
        return $this->Città;
    }
    
    public function getNumeroCivico (){
        return $this->NumeroCivico;
    }
    
    public function setVia($Via) {
        $this->Via= $Via;      
    }
    
    public function setCittà($Città) {
        $this->Città=$Città;
    }
    
    public function set($NumeroCivico) {
        $this->NumeroCivico=$NUmeroCivico;
    }
    
    public function toArray(){
        $array = (array) $this;
        array_walk_recursive($array, function (&$property) {
            if ($property instanceof Indirizzo) {
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
