<?php
/**
 * Description of Indirizzo
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

class Indirizzo {
    /**
     *
     * @var type 
     * Attributo via
     */
    private $Via;
    /**
     *
     * @var type 
     * Attributo Città
     */
    private $Città;
    /**
     *
     * @var type 
     * Attributo Civico
     */
    private $NumeroCivico;
    /**
     * 
     * @param type $Via
     * @param type $Città
     * @param type $NumeroCivico
     * costruttore Indirizzo
     */
    public function __construct($Via, $Città, $NumeroCivico) {
        $this->Via=$Via;
        $this->Città=$Città;
        $this->NumeroCivico=$NumeroCivico;
    }
    /**
     * 
     * @return type
     * restituisce la via
     */
    public function getVia() {
        return $this->Via;
    }
    /**
     * 
     * @return type
     * restituisce la città
     */
    public function getCittà(){
        return $this->Città;
    }
    /**
     * 
     * @return type
     * restituisce il numero civico
     */
    public function getNumeroCivico (){
        return $this->NumeroCivico;
    }
    /**
     * 
     * @param type $Via
     * imposta la via
     */
    public function setVia($Via) {
        $this->Via= $Via;      
    }
    /**
     * 
     * @param type $Città
     * imposta la città
     */
    public function setCittà($Città) {
        $this->Città=$Città;
    }
    /**
     * 
     * @param type $NumeroCivico
     * imposta il numero civico
     */
    public function set($NumeroCivico) {
        $this->NumeroCivico=$NUmeroCivico;
    }
    /**
     * 
     * @return type
     * Restituisce l' oggetto come un'array
     */
    public function toArray(){
        $array = (array) $this;
        array_walk_recursive($array, function (&$property) {
            if ($property instanceof Indirizzo) {
                $property = $property->toArray();
            }
        });
        return $array;
    }
}
?>