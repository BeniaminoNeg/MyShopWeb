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

/*La variabile $FunzioneRichiesta contiene una stringa
 *  che identifica quale Controller e quale funzione di questo chiamare
 *   
 * nei commenti si trova la struttura delle url  */

switch ($FunzioneRichiesta) {
    //func=HomeProd    genera dei prodotti da mettere in evidenza
    case "HomeProd":
    {
        $Controllore= new CHome();
        echo $Controllore->ProdottiInEvidenza();
    }
        break;
    
    //func=RicercaSup ---->  &dati=S00001,S00002, ... , 00n,  (Id Sup) ricerca supermercati tramite ids
    case "RicercaSup":
    {
        $Controllore= new CHome();
        $StringIdS=mysql_escape_string($_GET ["dati"]);
        echo $Controllore->RicercaSupermercatiPerIds($StringIdS);
    }
    	break;
    
    //func=SpotProdApp ---->  &dati=P001, P002, ... , (Id Prod) PER APP: dato il loro Id fornisce i prodotti seguiti
    case "SpotProdApp":
    {
        $Controllore= new CSpotlight();
        $ArrayIdString=  mysql_escape_string($_GET ["dati"]);
        echo $Controllore->RicercaProdottiById($ArrayIdString);
    }
            break;
        
    //func=GetImmagine---->  &Id=P001 oppure S00001 (Id Img) Data Id dà Immagine
    case "GetImmagine":
    {
        $ric = new CRicercaImmagini();
        $IdImmagine=mysql_escape_string($_GET["Id"]);
        $Risultato = $ric->RicercaImmagine($IdImmagine);
        echo $Risultato;   
    }
        break;
    
    //func=SpotProdWeb   PER WEB: Restituisce i prodotti osservati dell' utente Loggato
    case "SpotProdWeb": //da sistemare, deve ridarmi una stringa di id del tipo P001,P002,P003
    {
        $Controllore= new CSpotlight();
        echo $Controllore->RicercaProdottiOsservati();
    }
        break;
    
    case "GetNomeCognome":
    {
        $Controllore= new CSpotlight();
        $Risultato=$Controllore->RicercaProdottiOsservati();
        echo $Risultato;
    }
        break;
    
    //func=Reg ---->  tramite POST email password nome cognome
    case "Reg":
    {
        $nome= mysql_escape_string($_POST['nome']);
        $cognome= mysql_escape_string($_POST['cognome']);
        $email= mysql_escape_string($_POST['email']);
        $passwd= mysql_escape_string($_POST['password']);
        $Controllore= new CRegistrazione();
        echo $Controllore->Registrazione($nome, $cognome, $passwd, $email);
    }
        break;

    //func=LogIn -----> tramite POST email e password
    case "LogIn":
    {
        $email= mysql_escape_string($_POST['email']);
        $passwd= mysql_escape_string($_POST['password']);
        $Controllore= new CLogInOut();
        $Controllore->LogIn($email, $passwd);
    }
        break;
    
    //func=LogInAdmin ----> tramite POST username e password // è il LogIn per accedere come amministratore
    case "LogInAdmin":
    {
        $Username= mysql_escape_string($_POST['username']);
        $password= mysql_escape_string($_POST['password']);
        $Controllore= new CLogInOut();
        ($Controllore->LoginAdmin($Username, $password)) ; 
        var_dump($_SESSION);
    }
        break;
    
    //func=LogOut  
    case "LogOut":
    {
        $Controllore= new CLogInOut();
        $Controllore->LogOut();
    }
        break;
    
    //func=MailUnica ---->  POST email verrà richiamata durante il riempimento form
    case "MailUnica":
    {
        $email= mysql_escape_string($_GET['email']);
        $Controllore= new CRegistrazione();
        echo $Controllore->VerificaEmailUnica($email);
    }
        break;
    
    //func=Sup restituisce l' elenco dei supermercati
    case "Sup":
    {
        $CSupermercato = new CMarket();
        echo $CSupermercato->RicercaMarket();
    }
        break;
    
    //func=Catalogo ----> Ids=S00001 dato un ids restituisce i suoi prodotti
    case "Catalogo":
    {
        $CMarket = new CMarket();
        $Ids = $_GET["Ids"];
        echo $CMarket->CatalogoSup($Ids);
    }
        break;
    
    //func=RicercaPerCategoria ---->  &Categoria=Pasta  restituisce tutti prodotti appartenenti a questa categoria
    case "RicercaPerCategoria":
    {
        $CCategoria = new CCategoria();
        $Categoria = $_GET["Categoria"];
        echo $CCategoria->RicercaPerCategoria($Categoria);
    }
        break;
    
    //func=RicercaPerNome ---->  &nome=Riso ricerca tramite parola chiave
    case "RicercaPerNome":
    {
        $Controllore = new CRicercaProdotto();
        $tag=mysql_escape_string($_GET['nome']);
        $Risultato=$Controllore->RicercaPerNome($tag);
        echo $Risultato;
    }
        break;
    
    //func=AddPref ----->  &Idp=P001 aggiunge preferito
    case "AddPref":
    {
        $Idp = $_GET["Idp"];
        $Controllore=new CSpotlight();
        $Controllore->addPref($Idp);
    }
        break;
    
    //func=RemPref ----->  &Idp=P001 rimuove preferito
    case "RemPref":
    {
        $Idp = $_GET["Idp"];
        $Controllore=new CSpotlight();
        $Controllore->remPref($Idp);
    }
        break;
    default:
    {
        echo "PAGE NOT FOUND - MYSHOP - PROGETTO DI PROGRAMMAZIONE WEB";
    }
        break;
}

?>





        
        



