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
        
        $Utente= $_SESSION ['oggetto_utente_loggato'];
        $IdProdottiOsservati=$Utente->getProdottiOsservati();
        $CRicercaProdotto=new CRicercaProdotto();
        $ProdottiOsservati=array();
        /*var_dump($IdProdottiOsservati);
        echo '    ';*/
        var_dump(strlen($IdProdottiOsservati));
        for ($i = 0; $i <  strlen($IdProdottiOsservati); $i+5) {
            /*var_dump($IdProdottiOsservati[$i]);
            echo '   ';
            var_dump($IdProdottiOsservati[$i+1]);
            echo '   ';
            var_dump($IdProdottiOsservati[$i+2]);
            echo '   ';
            var_dump($IdProdottiOsservati[$i+3]);*/
            $IdProdotto = $IdProdottiOsservati[$i].$IdProdottiOsservati[$i+1].$IdProdottiOsservati[$i+2].$IdProdottiOsservati[$i+3];
            var_dump($IdProdotto);
            $ProdottiOsservati[]=$CRicercaProdotto->RicercaPerId($IdProdotto);
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