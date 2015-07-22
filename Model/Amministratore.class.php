<?php
/**
 * Description of Immagine
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

class Amministratore {
   /**
    *
    * @var type
    * Attributo password 
    */
    private $Password;
    /**
     *
     * @var type 
     * Attributo username
     */
    private $Username;
    /**
     * 
     * @param type $Password
     * @param type $Username
     * costruttore Amministratore
     */
    function __construct($Password, $Username) {
        $this->Password = $Password;
        $this->Username = $Username;
    }
    /**
     * 
     * @return type
     * Restituisce la password
     * dell'Amministratore
     */
    public function getPassword() {
        return $this->Password;
    }
    /**
     * 
     * @param type $Password
     * Imposta La Password
     */
    public function setPassword($Password) {
        $this->Password = $Password;
    }
    /**
     * 
     * @return type
     * Restituisce l'Username
     * dell'Amministratore
     */
    public function getUsername() {
        return $this->Username;
    }
    /**
     * 
     * @param type $Username
     * Imposta La Username
     */
    public function setUsername($Username) {
        $this->Username = $Username;
    }
    /**
     * 
     * @param type $Id
     * @param type $Size
     * @param type $Type
     * @param type $Immagine_originale
     * Aggiunge L'Immagine nella Tabella Immagini
     */
    function AddImmagine($Id, $Size, $Type, $Immagine_originale){
        $Fdb = new FDB();
        $ElencoColonne = "`Id`, `Size`, `Type`, `Immagine_Originale`";
        $TuplaValori = "'$Id', '$Size', '$Type', '$Immagine_originale'";
        $Fdb->AddTupla("Immagine", $ElencoColonne, $TuplaValori);
    }
    /**
     * 
     * @param type $Colonna
     * @param type $Valore
     * @param type $ValChiave
     * Modifica L'Immagine sulla Tabella Immagini
     */
    function UpdateImmagine($Colonna, $Valore, $ValChiave) {
        $Fdb = new FDB();
        $Fdb->UpdateAttributo("Immagine", $Colonna, $Valore, "Id", "$ValChiave");
    }
    /**
     * 
     * @param type $Id
     * Rimuove L'Immagine dalla Tabella Immagini
     */
    function RemoveImmagine($Id) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("Immagine", "Id", $Id);
    }
    /**
     * 
     * @param type $Id
     * @param type $Nome
     * @param type $Descrizione
     * @param type $Prezzo
     * @param type $Ids
     * @param type $Categoria
     * Aggiunge il prodotto nella tabella Catalogo
     */
    function AddProdotto($Id, $Nome, $Descrizione, $Prezzo, $Ids, $Categoria) {
        $Fdb = new FDB();
        $ElencoColonne = "`Id`, `Nome`, `Descrizione`, `Prezzo`, `Ids`, `Categoria`";
        $TuplaValori = "'$Id', '$Nome', '$Descrizione', '$Prezzo', '$Ids', '$Categoria'";
        $Fdb->AddTupla("Catalogo", $ElencoColonne, $TuplaValori);
    }
    /**
     * 
     * @param type $Colonna
     * @param type $Valore
     * @param type $ValChiave
     * Modifica il prodotto nella tabella Catalogo
     */
    Function UpdateProdotto($Colonna, $Valore, $ValChiave){
        $Fdb = new FDB();
        $Fdb->UpdateAttributo("Catalogo", $Colonna, $Valore, "Id", "$ValChiave");
    }
    /**
     * 
     * @param type $Id
     * Rimuove il prodotto dalla tabella Catalogo
     */
    function RemoveProdotto($Id) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("Catalogo", "Id", $Id);
    }
    /**
     * 
     * @param type $Ids
     * @param type $Nome
     * @param type $Via
     * @param type $Città
     * @param type $Civico
     * Aggiunge un supermerrcatoc sulla tabella Supermercato
     */
    function AddSupermercato($Ids, $Nome, $Via, $Città, $Civico) {
        $Fdb = new FDB();
        $ElencoColonne = "`Ids`, `Nome`, `Via`, `Citta`, `Civico`";
        $TuplaValori = "'$Ids', '$Nome', '$Via', '$Città', '$Civico'";
        $Fdb->AddTupla("Supermercato", $ElencoColonne, $TuplaValori);
    }
    /**
     * 
     * @param type $Colonna
     * @param type $Valore
     * @param type $ValChiave
     * Modifica un supermerrcatoc sulla tabella Supermercato
     */
    function UpdateSupermercato($Colonna, $Valore, $ValChiave) {
        $Fdb = new FDB();
        $Fdb->UpdateAttributo("Supermercato", $Colonna, $Valore, "Ids", "$ValChiave");
    }
    /**
     * 
     * @param type $Id
     * Rimuove un supermerrcato dalla tabella Supermercato
     */
    function RemoveSupermercato($Id) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("Supermercato", "Ids", $Id);
    }
    /**
     * 
     * @param type $Colonna
     * @param type $Valore
     * @param type $ValChiave
     * Aggiorna un utente sulla tabella UtenteRegistrato
     */
    Function UpdateUtente($Colonna, $Valore, $ValChiave){
        $Fdb = new FDB();
        $Fdb->UpdateAttributo("UtenteRegistrato", $Colonna, $Valore, "Email", "$ValChiave");
    }
    /**
     * 
     * @param type $Email
     * Rimuove un utente sulla tabella UtenteRegistrato
     */
    function RemoveUtente($Email) {
        $Fdb = new FDB();
        $Fdb->EliminaTupla("UtenteRegistrato", "Email", $Email);
    }
    
}
?>