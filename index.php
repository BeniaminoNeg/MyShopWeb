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
        $ArrayIdS= array();
        $ArrayIdS=  explode(",", $StringIdS);
        echo $Controllore->RicercaSupermercatiPerIds($ArrayIdS);
    }
    	break;
    	case "SpotProdApp":
    		{
    			$Controllore= new CSpotlight();
    			$ArrayIdString=  mysql_escape_string($_GET ["dati"]);
    			$ArrayId= array();
    			$ArrayId= explode(",", $ArrayIdString);
    			echo $Controllore->RicercaProdottiById($ArrayId);
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
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Dati =  mysql_escape_string($_GET['dati']);
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Controllore= new CAmministratore();
        $Controllore->AddImmagine($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $ArrayDati[3], $Password, $Email);
    }
        break;
    case "AdminUpdateImg":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Dati =  mysql_escape_string($_GET['dati']);
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Controllore= new CAmministratore();
        $Controllore->UpdateImmagine($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $Password, $Email);
    }
        break;
    case "AdminRemoveImg":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Id =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveImmagine($Id, $Password, $Email);
    }
        break;
    case "AdminAddProd":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Dati =  mysql_escape_string($_GET['dati']);
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Controllore= new CAmministratore();
        $Controllore->AddProdotto($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $ArrayDati[3], $ArrayDati[4], $ArrayDati[5], $Password, $Email);
    }
        break;
    case "AdminUpdateProd":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Dati =  mysql_escape_string($_GET['dati']);
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Controllore= new CAmministratore();
        $Controllore->UpdateProdotto($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $Password, $Email);
    }
        break;
    case "AdminRemoveProd":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Id =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveProdotto($Id, $Password, $Email);
    }
        break;
    case "AdminAddSup":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Dati =  mysql_escape_string($_GET['dati']);
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Controllore= new CAmministratore();
        $Controllore->AddSupermercato($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $ArrayDati[3], $ArrayDati[4], $Password, $Email);
    }
        break;
    case "AdminUpdateSup":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Dati =  mysql_escape_string($_GET['dati']);
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Controllore= new CAmministratore();
        $Controllore->UpdateSupermercato($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $Password, $Email);
    }
        break;
    case "AdminRemoveSup":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Id =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveSupermercato($Id, $Password, $Email);
    }
        break;
    case "AdminUpdateUtente":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Dati =  mysql_escape_string($_GET['dati']);
        $ArrayDati = array();
        $ArrayDati = explode(",", $Dati);
        $Controllore= new CAmministratore();
        $Controllore->UpdateUtente($ArrayDati[0], $ArrayDati[1], $ArrayDati[2], $Password, $Email);
    }
        break;
    case "AdminRemoveUtente":
    {
        $Email = mysql_escape_string($_POST['email']);
        $Password = mysql_escape_string($_POST['password']);
        $Id =  mysql_escape_string($_GET['dati']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveUtente($Id, $Password, $Email);
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





        
        



