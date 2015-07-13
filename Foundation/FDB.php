<?php

/**
 * Description of FDB
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano
 */

class FDB {
        
    private $connection;
    private $result;
    protected $Table;
    protected $Key;
    protected $Return_Class;
    protected $Auto_Increment=False;
    protected $db;// = new PDO("mysql:host=localhost;dbname=MyShopDB", 'username', 'password');
    //protected $db;

    function __construct() {    
        $this->connect('localhost', 'root', '', 'my_myshopp');
    }
    
    public function connect($host,$user,$password,$database) {
        $col = "mysql:host=".$host.";dbname=".$database;         // connessione tramite creazione di un oggetto PDO
        try {
            $this->db = new PDO($col, $user, $password);
        }
        // blocco catch per la gestione delle eccezioni
        catch(PDOException $e) {    
        // notifica in caso di errorre
        echo 'Attenzione: '.$e->getMessage();
        }
    }
    
    public function query($query) {
	$sql = $this->db->prepare($query);
	$sql->execute();
	$result = $sql->fetchAll();// Fetch all of the remaining rows in the result set 
	return $result;
    }
    
    public function search_contains($tabella, $colonna, $tag) {
        $query = "SELECT * FROM $tabella WHERE $colonna LIKE '$tag%'";
        $result = $this->query($query);
        return $result;
    }
    
    public function search_equals($tabella, $colonna, $value) {
        $query = "SELECT * FROM $tabella WHERE $colonna = $value";
        $result = $this->query($query);
        return $result;
    }
    
    public function Conta($colonna,$tabella) {
        $query = "SELECT COUNT($colonna) FROM $tabella";
        $result = $this->query($query);
        return $result;
    }
    /**
     * 
     * @param type $NomeTabella
     * @param type $ElencoColonne del tipo: `Nome`, `Cognome`, `Password`, `Email`, `Prodottiosservati`
     * @param type $TuplaValori del tipo 'peppe', 'esempio', 'gda', 'fweff', ''
     */
    public function putintoDB($NomeTabella,$ElencoColonne,$TuplaValori){
        $query="INSERT INTO `my_myshopp`.`$NomeTabella` ($ElencoColonne) "
                . "VALUES ($TuplaValori);";
        $result=$this->query($query);
        return $result;
    }
    
    /**
     * 
     * @param type $NomeTabella
     * @param type $Colonna
     * @param type $Valore attributo aggiornato
     * @param type $Chiave chiave primaria
     * @param type $ValChiave valore della chiave primaria
     */
    public function UpdateAttributo($NomeTabella,$Colonna,$Valore,$Chiave,$ValChiave) {
        $query="UPDATE `my_myshopp`.`$NomeTabella` 
                SET `$Colonna` = '$Valore' 
                WHERE `UtenteRegistrato`.`$Chiave` = '$ValChiave';";
        
    }
    
    public function searchColonnaSelect($tabella,$colonna,$chiave,$valore) {
        $query = "SELECT $colonna FROM $tabella WHERE $chiave = $valore";
        $result = $this->query($query);
        return $result;
    }
        public function close() {
    }
}
?>

