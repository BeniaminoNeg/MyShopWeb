<?php

/**
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

foreach (glob("Controller/*.php") as $filename){
    require_once $filename;
}
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
echo'HOME PAGE PROVVISORIA DI MYSHOP             ';
echo 'Gateano Fichera, Beniamino Negrini, Giovanni Lezzi, Silvia Montecchia          ';
echo 'Progetto di Programmazione Web              ';

$FunzioneRichiesta=  mysql_escape_string($_GET ["func"]);


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
        $ArrayIdSString=mysql_escape_string($_GET ["dati"]);
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
    			$ArrayIdString=  mysql_escape_string($_GET ["dati"]);
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
        //var_dump($Risultato);
        echo $Risultato;
        //echo $Risultato;
    }
        break;
    
    case "SpotProdWeb":
    {
        $Controllore= new CSpotlight();
        $Risultato=$Controllore->RicercaProdottiOsservati();
        echo $Risultato;
    }
        break;
    
    case "LogIn":
    {
        $email= mysql_escape_string($_GET['email']);
        $passwd= mysql_escape_string($_GET['password']);
        $Controllore= new CLogInOut();
        $Controllore->LogIn($email, $passwd);
        
    }
        break;
    
    default:
    {
        echo "HAI FATTO DANNI!";
    }
        break;
}
?>





        
        



