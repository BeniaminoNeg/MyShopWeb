<?php

/**
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

require_once 'Controller/CRicercaProdotto.class.php';
require_once 'Controller/CHome.php';
require_once 'Cintroller/CRicercaImmagini.php';
require_once 'Foundation/FDB.php';
require_once 'Foundation/FProdotto.php';
require_once 'Foundation/FSupermercato.php';
require_once 'Model/Indirizzo.class.php';
require_once 'Model/Prodotto.class.php';
require_once 'Model/Supermercato.class.php';
require_once 'Model/Utente.class.PHP';


session_start();
if (!isset($_SESSION['count']))
{
    $_SESSION['count']=0;
    $_SESSION['start']=  time();
}
$_SESSION['count']++;
header('Content-Type: application/json');

$FunzioneRichiesta=$_GET ["func"];


switch ($FunzioneRichiesta) {
    case "HomeProd":
    {
        $Controllore= new CHome();
        $Risultato=$Controllore->ProdottiInEvidenza();
        echo $Risultato;
    }
        break;
    case "HomeSup":
    {
        $Controllore= new CHome();
        $ArrayIdSString=$_GET ["dati"];
        $ArrayIdS= array();
        $j=0;
        for ($i=0; $i<strlen($ArrayIdSString); $i++){
            if($ArrayIdSString[$i]==',')$j++;
            else $ArrayIdS[$j]=$ArrayIdSString[$i];
        }
        $Risultato=$Controllore->GetSupermercati($ArrayIdS);
        echo $Risultato;
    }
    case "GetImmagine":
    {
        $Controllore= new CRicercaImmagini();
        $IdImmagine=$_GET ["Id"];
        $Risultato=$Controllore->RicercaImmagine($IdImmagine);
        echo $Risultato;
    }
        break;
    default:
    {
        echo "HAI FATTO DANNI!";
    }
        break;
}
?>





        
        



