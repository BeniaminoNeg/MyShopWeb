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
        $StringIdS=mysql_escape_string($_GET ["dati"]);
        echo $Controllore->RicercaSupermercatiPerIds($StringIdS);
    }
    	break;
    	case "SpotProdApp":
        {
            $Controllore= new CSpotlight();
            $ArrayIdString=  mysql_escape_string($_GET ["dati"]);
            echo $Controllore->RicercaProdottiById($ArrayIdString);
        }
    		break;
    case "GetImmagine":
    {
        $ric = new CRicercaImmagini();
        $IdImmagine=mysql_escape_string($_GET["Id"]);
        $Risultato = $ric->RicercaImmagine($IdImmagine);
        echo $Risultato;   
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
        $nome= mysql_escape_string($_POST['nome']);
        $cognome= mysql_escape_string($_POST['cognome']);
        $email= mysql_escape_string($_POST['email']);
        $passwd= mysql_escape_string($_POST['password']);
        $Controllore= new CRegistrazione();
        $Controllore->Registrazione($nome, $cognome, $passwd, $email);  
    }
        break;

    case "LogIn":
    {//FARE IL POST!!!!!!!!!
        $email= mysql_escape_string($_POST['email']);
        $passwd= mysql_escape_string($_POST['password']);
        $Controllore= new CLogInOut();
        $Controllore->LogIn($email, $passwd);  
    }
        break;
    
    case "LogInAdmin":
    {//FARE IL POST!!!!!!!!!
        $Username= mysql_escape_string($_GET['username']);
        $password= mysql_escape_string($_GET['password']);
        $Controllore= new CLogInOut();
        $Controllore->LoginAdmin($Username, $password) ; 
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
        //var_dump($Ids);
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
    
    
    case "RicercaPerNome":
    {
        $Controllore = new CRicercaProdotto();
        $tag=mysql_escape_string($_GET['nome']);
        $Risultato=$Controllore->RicercaPerNome($tag);
        echo $Risultato;
    }
        break;
    
    case "AddPref":
    {
        $Idp = $_GET["Idp"];
        $Controllore=new CSpotlight();
        $Controllore->addPref($Idp);
    }
        break;
    
    case "RemPref":
    {
        $Idp = $_GET["Idp"];
        $Controllore=new CSpotlight();
        $Controllore->remPref($Idp);
    }
        break;

    case "AdminAddImg":
    {
        $Dati =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->AddImmagine($Dati);
    }
        break;
    case "AdminUpdateImg":
    {
        $Dati =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->UpdateImmagine($Dati);
    }
        break;
    case "AdminRemoveImg":
    {
        $Id =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveImmagine($Id);
    }
        break;
    case "AdminAddProd":
    {
        $Dati =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->AddProdotto($Dati);
    }
        break;
    case "AdminUpdateProd":
    {
        $Dati =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->UpdateProdotto($Dati);
    }
        break;
    case "AdminRemoveProd":
    {
        $Id =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveProdotto($Id);
    }
        break;
    case "AdminAddSup":
    {
        $Dati =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->AddSupermercato($Dati );
    }
        break;
    case "AdminUpdateSup":
    {
        $Dati =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->UpdateSupermercato($Dati);
    }
        break;
    case "AdminRemoveSup":
    {
        $Id =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveSupermercato($Id);
    }
        break;
    case "AdminUpdateUtente":
    {
        $Dati =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->UpdateUtente($Dati);
    }
        break;
    case "AdminRemoveUtente":
    {
        $Id =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveUtente($Id);
    }
        break;
    
    
    
    
    default:
    {
        echo "HAI FATTO DANNI!";
    }
        break;
}


var_dump($_SESSION);
?>





        
        



