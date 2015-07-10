<?php

/**
 * Description of Immagine
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

class Immagine {
    
        
	/**
	 * @var int $size Dimensione dell'immagine in byte
	 */
	private $Size;
	/**
	 * 
	 * @var string $type Mime-Type dell'immagine
	 */
	private $Type;
	
	/**
	 * @var string $immagine_originale Immagine originale
	 */
	private $Immagine;
        
        /**
         *
         * @var string
         */
        private $Id;


        /**
	 * Costruisce l'oggetto immagine
	 * @param string $_nome
	 * @param int_type $_size
	 * @param string $_type
	 * @param string $_file_temp
	 */
	/*public function __construct($_id,$_size,$_type,$_file_temp) {
            $this->setId($_id);
            $this->setSize($_size);
            $this->setType($_type);
            $this->setImmagine($_file_temp);
	}*/
        
     public function __construct() {
         //ho creato il fetchDB
         
     }
        
	
	/**
	 * Setta il nome dell'immagine
	 * @param string $_nome
	 */
	public function setNome($_nome) {
			$this->Nome = $_nome;
	}
	
	/**
	 * Setta la dimensione in byte dell'immagine
	 * @param int $_size
	 */
	public function setSize($_size) {
			$this->Size = $_size;
	}
	/**
	 * Setta il Mime-Type passato per parametro
	 * @param string $_type 
	 */
	public function setType($_type) {
			$this->Type = $_type;
	}
        
        public function setId ($Id) {
            $this->Id=$Id;
        }

                /**
	 * Setta gli attributi dell'immagine e fa le dovute trasformazioni di dimensioni
	 * @param string $_file_temp Path temporaneo dell'immagine
	 */
	public function setImmagine($_file_temp) {
            $this->Immagine=$_file_temp;
            /*
		$this->Immagine = file_get_contents($_file_temp);
		if ($this->Type == "image/jpeg" || $this->Type == "image/jpg" || $this->Type == "image/pjpeg") {
			$src = imagecreatefromjpeg($_file_temp);
		} elseif ($this->Type == "image/gif") {
			$src = imagecreatefromgif($_file_temp);
		} else {
			$src = imagecreatefrompng($_file_temp);			
		}
		list($width,$height)=getimagesize($_file_temp);
		$immagine=imagecreatetruecolor(182,114);
		imagecopyresampled($immagine,$src,0,0,0,0,182,114,$width,$height);
		$path="./tmp/";
		if ($this->Type == "image/jpeg" || $this->Type == "image/jpg" || $this->Type == "image/pjpeg") {
			imagejpeg($immagine,$path."_".$this->Nome);
		} elseif ($this->Type == "image/gif") {
			imagegif($immagine,$path."_".$this->Nome);
		} else {
			imagepng($immagine,$path."_".$this->nome);
		}
		$this->Immagine = file_get_contents($path."_".$this->Nome);
		unlink($path."_".$this->Nome);*/
	}
	
	/**
	 *funzione che restitusce il nome dell'immagine
	 * @return string Nome dell'immagine
	 */
	public function getNome() {
		return $this->Nome;
	}
	
	/**
	 *funzione che restituisce la grandezza dell'immagine
	 * @return int La grandezza dell'immagine in byte
	 */
	public function getSize() {
		return $this->Size;
	}
	
	/**
	 *funzione che restituisce il mime-type dell'immagine
	 * @return string Mime-Type dell'immagine
	 */
	public function getType() {
		return $this->Type;
	}
	/**
	 * funzione che restituisce l'immagine nella dimensione richiesta
	 * @param string $_grandezza
	 * @return Ritorna l'immagine nella dimensione richiesta
	 */
	public function getImmagine() {
                return $this->Immagine;

	}
	
        public function getId() {
                return $this->Id;

	}
        
        public function fetchDB($Id) {
            $ImmagineDAO= new FImmagine();
            $ImgRisult=$ImmagineDAO->RicercaImmagine($Id);
            $this->setId($ImgRisult[0][2]);
            $this->setSize($ImgRisult[0][0]);
            $this->setType($ImgRisult[0][1]);
            $this->setImmagine($ImgRisult[0][3]);
        }
	/**
	 *funzione che restituisce l'array associativo associato all'oggetto immagine
	 * @return array Trasforma l'oggetto in una array associativo
	 *
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
        
        public function toArray(){
        $array = (array) $this;
        array_walk_recursive($array, function (&$property) {
            if ($property instanceof Immagine) {
                $property = $property->toArray();
            }
        });
        return $array;
    }
}

?>