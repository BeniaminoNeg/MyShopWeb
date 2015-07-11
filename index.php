<?php

/**
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

require_once 'Controller/CRicercaProdotto.php';
require_once 'Controller/CHome.php';
require_once 'Controller/CRicercaImmagini.php';
require_once 'Controller/CSpotlight.php';
require_once 'Foundation/FDB.php';
require_once 'Foundation/FProdotto.php';
require_once 'Foundation/FSupermercato.php';
require_once 'Model/Indirizzo.class.php';
require_once 'Model/Prodotto.class.php';
require_once 'Model/Supermercato.class.php';
require_once 'Model/Utente.class.PHP';


$Sess=new CSessione();
$Sess->Session();
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
        $IdS = "";
        for ($i=0; $i<strlen($ArrayIdSString); $i++){
            if($ArrayIdSString[$i] !=',') $IdS = $IdS.$ArrayIdSString[$i];
            else {
            	$ArrayIdS[$j] = $IdS;
            	$IdS = "";
            	$j++;
            }
        }
        $Risultato=$Controllore->RicercaSupermercatiPerIds($ArrayIdS);
        echo $Risultato;
    }
    	break;
    	case "SpotProdApp":
    		{
    			$Controllore= new CSpotlight();
    			$ArrayIdString=$_GET ["dati"];
    			$ArrayId= array();
    			$j=0;
    			$Id = "";
    			for ($i=0; $i<strlen($ArrayIdString); $i++){
    				if($ArrayIdString[$i] !=',') $Id = $Id.$ArrayIdString[$i];
    				else {
    					$ArrayId[$j] = $Id;
    					$Id = "";
    					$j++;
    				}
    			}
    			$Risultato=$Controllore->RicercaProdottiById($ArrayId);
    			echo $Risultato;
    		}
    		break;
    case "GetImmagine":
    {
        $Controllore= new CRicercaImmagini();
        $IdImmagine=$_GET ["Id"];
        $Risultato=$Controllore->RicercaImmagine($IdImmagine);
        $html = "<div><img src=\"";
        $html2 = "\">";
        $html3 = "</div>";
        $Risultato = $html.$Risultato.$html2.$Risultato.$html3;
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





        
        



