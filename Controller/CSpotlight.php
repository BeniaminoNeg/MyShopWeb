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
    //put your code here
    function RicercaUtente($Email) {
        $UtenteDAO = new FUtente();
        $UtenteDB = $UtenteDAO->GetUtenteByMail($Email);
        $Utente = new Utente($UtenteDB[0][0], $UtenteDB[0][1], $UtenteDB[0][2], $UtenteDB[0][3], $UtenteDB[0][4]);
        return $Utente;
    }
    
    function RicercaProdottiOsservati() {
        var_dump($_SESSION);
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
    
    function RicercaProdottiById($IdProdottiOsservati) {
        $CRicercaProdotto=new CRicercaProdotto();
        $ProdottiOsservati=array();
        for ($i = 0; $i < count($IdProdottiOsservati) ; $i++) {
            $ProdottiOsservati[] = $CRicercaProdotto->RicercaPerId($IdProdottiOsservati[$i]);
        }
        $Json=  json_encode($ProdottiOsservati);
        return $Json;
    }
    
}
?>