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
    
    public function putintoDB($tabella, $password, $email, $Nome, $cognome){
        "INSERT INTO $tabella(`Password`, `Email`, `Nome`, `Cognome`) VALUES ($password, $email, $Nome, $cognome)";
    }
    
    public function searchColonnaSelect($tabella,$colonna,$chiave,$valore) {
        $query = "SELECT $colonna FROM $tabella WHERE $chiave = $value";
        $result = $this->query($query);
        return $result;
    }
        public function close() {
    }
}
?>

