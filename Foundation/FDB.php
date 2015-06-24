<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FDB
 *
 * @author juan
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
        $this->connect('localhost', 'root', '', 'MyShopDB');
    }
    
    public function connect($host,$user,$password,$database) {
        $col = "mysql:host=".$host.";dbname=".$database;
        try {
        // connessione tramite creazione di un oggetto PDO
            $this->db = new PDO($col, $user, $password);
            
        }
        // blocco catch per la gestione delle eccezioni
        catch(PDOException $e) {    
        // notifica in caso di errorre
        echo 'Attenzione: '.$e->getMessage();
        }
    }
    
    public function query($query) {
	/*
	var_dump($query);
        $this->db->beginTransaction();
        $sql = $this->db->prepare($query);
        // esecuzione delle query
        $sql = $this->db->query($query);
        $this->db->commit();
        if($sql) {
           $result = $sql->fetchAll();
        }
        return $result;
	*/
	$sql = $this->db->prepare($query);
	$sql->execute();

	/* Fetch all of the remaining rows in the result set */
	$result = $sql->fetchAll();
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
    
    public function close() {
        
        
        
        
    }
    
    
}

