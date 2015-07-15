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
        if (isset($_SESSION ['oggetto_utente_loggato']))
        {
            $Utente= $_SESSION ['oggetto_utente_loggato'];
            $StringaIdProdottiOsservati=$Utente->getProdottiOsservati();
            $IdProdotti = explode(",", $StringaIdProdottiOsservati);
            $CRicercaProdotto=new CRicercaProdotto();
            $ProdottiOsservati=array();
            foreach ($IdProdotti as $value) {
                $ProdottiOsservati[]=$CRicercaProdotto->RicercaPerId($value);
            }
            $Json=  json_encode($ProdottiOsservati);
            return $Json;
        }
        else 
        {
            echo 'SESSIONE SCADUTA'; //RIMEDIO PROVVISORIO
        }
    }
    
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
    
    function addPref ($Idp) {
        $Utente= $_SESSION ['oggetto_utente_loggato'];
        $email=$Utente->getEmail();
        $UtenteDAO= new FUtente();
        $UtenteDAO->addPreferito($Idp, $email);
        $this->updateOggettoSessione($email); 
    }
    
    function remPref ($Idp) {
        $Utente= $_SESSION ['oggetto_utente_loggato'];
        $email=$Utente->getEmail();
        $UtenteDAO= new FUtente();
        $UtenteDAO->removePreferito($Idp, $email);
        $this->updateOggettoSessione($email);
    }
    
    function updateOggettoSessione($email) {
        $UtenteDAO= new FUtente();
        $Risult=$UtenteDAO->searchColonnaSelect("UtenteRegistrato", "Prodottiosservati", "Email", $email);
        $ProdottiOsservati=$Risult[0]["Prodottiosservati"];
        $_SESSION ['oggetto_utente_loggato']->setProdottiOsservati($ProdottiOsservati);
    }
}
?>