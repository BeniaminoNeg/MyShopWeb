<?php

/**
 * Description of CSpotlight
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

foreach (glob("Model/*.php") as $filename){
    require_once $filename;

}
foreach (glob("Foundation/*.php") as $filename){
    require_once $filename;
}

class CSpotlight {
/**
 * 
 * @param type $Email chiave per identificare univocamente l' utente
 * @return \Utente
 */
    function RicercaUtente($Email) {
        $UtenteDAO = new FUtente();
        $UtenteDB = $UtenteDAO->GetUtenteByMail($Email);
        $Utente = new Utente($UtenteDB[0][0], $UtenteDB[0][1], $UtenteDB[0][2], $UtenteDB[0][3], $UtenteDB[0][4]);
        return $Utente;
    }
    /**
     * Per il lato Web
     * @return type Json dei prodotti osservati
     */
    function RicercaProdottiOsservati() {
            $Utente= $_SESSION ['oggetto_utente_loggato'];
            return $StringaIdProdottiOsservati=$Utente->getProdottiOsservati();
    }
    /**
     * Utilizzata dall' App 
     * @param type $ArrayIdString
     * @return type prodotti seguiti dall' utente App
     */
    function RicercaProdottiById($ArrayIdString) {
        $ArrayId= array();
        $ArrayId= explode(",", $ArrayIdString);
        $CRicercaProdotto=new CRicercaProdotto();
        $ProdottiOsservati=array();
        for ($i = 0; $i < count($ArrayId) ; $i++) {
            $ProdottiOsservati[] = $CRicercaProdotto->RicercaPerId($ArrayId[$i]);
        }
        $Json=  json_encode($ProdottiOsservati);
        return $Json;
    }
    /**
     * Utilizzata dal Web
     * @param type $Idp  Id dl prodotto da seguire
     */
    function addPref ($Idp) {
        $Utente= $_SESSION ['oggetto_utente_loggato'];
        $email=$Utente->getEmail();
        $UtenteDAO= new FUtente();
        $UtenteDAO->addPreferito($Idp, $email);
        $this->updateOggettoSessione($email); 
    }
    /**
     * Utilizzata dal Web
     * @param type $Idp  Id del prodotto da seguire
     */
    function remPref ($Idp) {
        $Utente= $_SESSION ['oggetto_utente_loggato'];
        $email=$Utente->getEmail();
        $UtenteDAO= new FUtente();
        $UtenteDAO->removePreferito($Idp, $email);
        $this->updateOggettoSessione($email);
    }
    /**
     * Se l' utente modifica i preferiti durante la sessione, occore che si modifichino anche i dati in 
     * sessione oltre che quelli presenti nel db
     * @param type $email 
     */
    function updateOggettoSessione($email) {
        $UtenteDAO= new FUtente();
        $Risult=$UtenteDAO->searchColonnaSelect("UtenteRegistrato", "Prodottiosservati", "Email", $email);
        $ProdottiOsservati=$Risult[0]["Prodottiosservati"];
        $_SESSION ['oggetto_utente_loggato']->setProdottiOsservati($ProdottiOsservati);
    }
}
?>