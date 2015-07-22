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