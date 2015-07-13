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

foreach (glob("Model/*.php") as $filename){
    require_once $filename;

}

foreach (glob("Foundation/*.php") as $filename){
    require_once $filename;
}


$Sess=new CSessione();
$Sess->Session();
header('Content-Type: application/json');


$FunzioneRichiesta=  mysql_escape_string($_GET ["func"]);


switch ($FunzioneRichiesta) {
    case "HomeProd":
    {
        $Controllore= new CHome();
        echo $Controllore->ProdottiInEvidenza();
    }
        break;
    case "RicercaSup":
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
        echo $Controllore->RicercaSupermercatiPerIds($ArrayIdS);
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
    			echo $Controllore->RicercaProdottiById($ArrayId);
    		}
    		break;
    case "GetImmagine":
    {
        $Controllore= new CRicercaImmagini();
        $IdImmagine=$_GET ["Id"];
        echo $Controllore->RicercaImmagine($IdImmagine);
    }
        break;
    
    case "SpotProdWeb":
    {
        $Controllore= new CSpotlight();
        $Risultato=$Controllore->RicercaProdottiOsservati();
        echo $Risultato;
    }
        break;
    
    case "Reg":
    {//FARE IL POST!!!!!!!!!
        $nome= mysql_escape_string($_GET['nome']);
        $cognome= mysql_escape_string($_GET['cognome']);
        $email= mysql_escape_string($_GET['email']);
        $passwd= mysql_escape_string($_GET['password']);
        $Controllore= new CRegistrazione();
        $Controllore->Registrazione($nome, $cognome, $passwd, $email);  
    }
        break;

    case "LogIn":
    {//FARE IL POST!!!!!!!!!
        $email= mysql_escape_string($_GET['email']);
        $passwd= mysql_escape_string($_GET['password']);
        $Controllore= new CLogInOut();
        $Controllore->LogIn($email, $passwd);  
    }
        break;
    
    case "LogOut":
    {
        $Controllore= new CLogInOut();
        $Controllore->LogOut();
    }
        break;
    
    case "MailUnica":
    {//FARE IL POST
        $email= mysql_escape_string($_GET['email']);
        $Controllore= new CRegistrazione();
        $Risultato=$Controllore->VerificaEmailUnica($email);
        echo $Risultato;
    }
        break;
    
    
    case "Sup":
    {
        $CSupermercato = new CMarket();
        echo $CSupermercato->RicercaMarket();
    }
        break;
    
    case "Catalogo":
    {
        $CMarket = new CMarket();
        $Ids = $_GET["Ids"];
        echo $CMarket->CatalogoSup($Ids);
    }
        break;
    case "RicercaPerCategoria":
    {
        $CCategoria = new CCategoria();
        $Categoria = $_GET["Categoria"];
        echo $CCategoria->RicercaPerCategoria($Categoria);
    }
        break;
    default:
    {
        echo "HAI FATTO DANNI!";
    }
        break;
}
?>





        
        



