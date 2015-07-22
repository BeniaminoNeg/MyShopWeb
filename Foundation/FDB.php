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
    protected $db;
    /**
     * Costruttore Fdb si 
     * connette al db
     */
    function __construct() {    
        
        $this->connect('localhost', 'root', '', 'my_myshopp');
    }
    /**
     * Connessione al db 
     * tramite creazione
     * di un oggetto
     * PDO
     * 
     * @param type $host
     * @param type $user
     * @param type $password
     * @param type $database
     */
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
    /**
     * Esecuzione della
     * query
     * 
     * @param type $query
     * @return type
     */
    public function query($query) {
	
        $sql = $this->db->prepare($query);
	$sql->execute();
	$result = $sql->fetchAll();// Fetch all of the remaining rows in the result set 
	return $result;
    }
    /**
     * Query che ,passandogli parte 
     * del nome dell'elemento,
     * verifica secnella colonna selezionata
     * è presente quell'elemento
     * 
     * @param type $tabella
     * @param type $colonna
     * @param type $tag
     * @return type
     */
    public function search_contains($tabella, $colonna, $tag) {
        
        $query = "SELECT * FROM $tabella WHERE $colonna LIKE '$tag%'";
        $result = $this->query($query);
        return $result;
    }
    /**
     * Query che verifica se 
     * un valore è uguale ad 
     * un valore della colonna
     * della tabella
     * 
     * @param type $tabella
     * @param type $colonna
     * @param type $value
     * @return type
     */
    public function search_equals($tabella, $colonna, $value) {
        
        $query = "SELECT * FROM $tabella WHERE $colonna = '$value'";
        $result = $this->query($query);
        return $result;
    }
    /**
     * Conta gli elementi di
     * una tabella
     * 
     * @param type $colonna
     * @param type $tabella
     * @return type
     */
    public function Conta($colonna,$tabella) {
        
        $query = "SELECT COUNT($colonna) FROM $tabella";
        $result = $this->query($query);
        return $result;
    }
    /**
     * Inserisce una tupla
     * nella Tabella
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
     * Aggiorna l'attributo 
     * di una tupla di una
     * tabella
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
                WHERE $NomeTabella.`$Chiave` = '$ValChiave'";
        $result = $this->query($query);
        return $result;
        
    }
    /**
     * Seleziona una colonn
     * di una tabella
     * 
     * @param type $tabella
     * @param type $colonna
     * @param type $chiave
     * @param type $valore
     * @return type
     */
    public function searchColonnaSelect($tabella,$colonna,$chiave,$valore) {
        
        $query = "SELECT $colonna FROM $tabella WHERE $chiave = '$valore'";
        $result = $this->query($query);
        
        
        return $result;
    }
    /**
     * Elimina una tupla
     * da una tabella
     * 
     * @param type $tabella
     * @param type $Chiave
     * @param type $Id
     */
    public function EliminaTupla($tabella, $Chiave, $Id) {
        
        $query= "DELETE FROM `my_myshopp`.`$tabella` WHERE `$tabella`.`$Chiave` = '$Id'";
        $this->query($query);
    }
    /**
     * Aggiunge una tupla
     * in una tabella
     * @param type $NomeTabella
     * @param type $ElencoColonne
     * @param type $TuplaValori
     */
    public function AddTupla($NomeTabella,$ElencoColonne,$TuplaValori) {
        
        $query = "INSERT INTO `$NomeTabella` ($ElencoColonne)Values($TuplaValori)";
        $this->query($query);
    }
}
?>