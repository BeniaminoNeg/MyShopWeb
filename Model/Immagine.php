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
    //put your code here
    	/**
	 * @var string $nome Nome dell'immagine
	 */	
	private $Nome;
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
	 * @var string $immagine_piccola Immagine piccola
	 */
	private $Immagine_Piccola;
	/**
	 * @var string $immagine_media Immagine media
	 */
	private $Immagine_Media;
	/**
	 * @var string $immagine_grande Immagine grande
	 */
	private $Immagine_Grande;
	/**
	 * @var string $immagine_originale Immagine originale
	 */
	private $Immagine_Originale;
	
	/**
	 * Costruisce l'oggetto immagine
	 * @param string $_nome
	 * @param int_type $_size
	 * @param string $_type
	 * @param string $_file_temp
	 */
	public function __construct($_nome,$_size,$_type,$_file_temp) {
		$this->setNome($_nome);
		$this->setSize($_size);
		$this->setType($_type);
		$this->setImmagine($_file_temp);
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
	
	/**
	 * Setta gli attributi dell'immagine e fa le dovute trasformazioni di dimensioni
	 * @param string $_file_temp Path temporaneo dell'immagine
	 */
	public function setImmagine($_file_temp) {
		$this->Immagine_Originale = file_get_contents($_file_temp);
		if ($this->Type == "image/jpeg" || $this->Type == "image/jpg" || $this->Type == "image/pjpeg") {
			$src = imagecreatefromjpeg($_file_temp);
		} elseif ($this->Type == "image/gif") {
			$src = imagecreatefromgif($_file_temp);
		} else {
			$src = imagecreatefrompng($_file_temp);			
		}
		list($width,$height)=getimagesize($_file_temp);
		$immagine_piccola=imagecreatetruecolor(70,70);
		$immagine_grande=imagecreatetruecolor(250,275);
		$immagine_media=imagecreatetruecolor(182,114);
		imagecopyresampled($immagine_piccola,$src,0,0,0,0,70,70,$width,$height);
		imagecopyresampled($immagine_grande,$src,0,0,0,0,250,275,$width,$height);
		imagecopyresampled($immagine_media,$src,0,0,0,0,182,114,$width,$height);
		$path="./tmp/";
		if ($this->Type == "image/jpeg" || $this->Type == "image/jpg" || $this->Type == "image/pjpeg") {
			imagejpeg($immagine_piccola,$path."piccola_".$this->Nome);
			imagejpeg($immagine_media,$path."media_".$this->Nome);
			imagejpeg($immagine_grande,$path."grande_".$this->Nome);
		} elseif ($this->Type == "image/gif") {
			imagegif($immagine_piccola,$path."piccola_".$this->Nome);
			imagegif($immagine_media,$path."media_".$this->Nome);
			imagegif($immagine_grande,$path."grande_".$this->nome);
		} else {
			imagepng($immagine_piccola,$path."piccola_".$this->nome);
			imagepng($immagine_media,$path."media_".$this->nome);
			imagepng($immagine_grande,$path."grande_".$this->nome);
		}
		$this->Immagine_Piccola = file_get_contents($path."piccola_".$this->Nome);
		$this->Immagine_Media = file_get_contents($path."media_".$this->Nome);
		$this->Immagine_Grande = file_get_contents($path."grande_".$this->Nome);
		unlink($path."piccola_".$this->Nome);
		unlink($path."media_".$this->Nome);
		unlink($path."grande_".$this->Nome);
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
	public function getImmagine($_grandezza) {
		if ($_grandezza == "piccola") {
			return $this->Immagine_Piccola;
		} elseif ($_grandezza == "media") {
			return $this->Immagine_Media;
		} elseif ($_grandezza == "grande") {
			return $this->Immagine_Grande;
		} else {
			return $this->Immagine_Originale;
		}
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
}

?>
