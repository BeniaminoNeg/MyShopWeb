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
$FunzioneRichiesta=  mysql_escape_string($_GET ["func"]);

switch ($FunzioneRichiesta) {
    //Registra l' utente
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
    //Effettua il login
    case "LogIn":
    {
        header('Content-Type: text/html');
        $email= mysql_escape_string($_POST['email']);
        $passwd= mysql_escape_string($_POST['password']);
        $Controllore= new CLogInOut();
        echo $Controllore->LogIn($email, $passwd);  
    }
        break;
        
    //func=SpotProdWeb   PER WEB: Restituisce i prodotti osservati dell' utente Loggato
    case "SpotProdWeb": //da sistemare, deve ridarmi una stringa di id del tipo P001,P002,P003
    {
        $Controllore= new CSpotlight();
        echo $Controllore->RicercaProdottiOsservati();
    }
        break;

    //func=LogInAdmin ----> tramite POST username e password // è il LogIn per accedere come amministratore
    case "LogInAdmin":
    {
        $Username= mysql_escape_string($_POST['username']);
        $password= mysql_escape_string($_POST['password']);
        $Controllore= new CLogInOut();
        $Risultato=$Controllore->LoginAdmin($Username, $password) ; 
        echo $Risultato;
    }
        break;
    
    //func=LogOut  
    case "LogOut":
    {
        $Controllore= new CLogInOut();
        $Controllore->LogOut();
    }
        break;
    //func=AdminAddImg funzione per amministratore
    case "AdminAddImg":
    {
        $Id =  mysql_escape_string($_GET['Id']);
        $Size =  mysql_escape_string($_GET['Size']);
        $Type =  mysql_escape_string($_GET['Type']);
        $Immagine_originale =  mysql_escape_string($_GET['Immagine_originale']);
        $Controllore= new CAmministratore();
        $Controllore->AddImmagine($Id, $Size, $Type, $Immagine_originale);
        echo 'Immagine Aggiunta Con Successo';
    }
        break;
    
    //func=AdminUpdateImg funzione per amministratore
    case "AdminUpdateImg":
    {
        $Colonna =  mysql_escape_string($_GET['Colonna']);
        $Valore =  mysql_escape_string($_GET['Valore']);
        $ValChiave =  mysql_escape_string($_GET['ValChiave']);
        $Controllore= new CAmministratore();
        $Controllore->UpdateImmagine($Colonna, $Valore, $ValChiave);
        echo 'Immagine Modificata Con Successo';
    }
        break;
    
    //func=AdminRemoveImg funzione per amministratore
    case "AdminRemoveImg":
    {
        $Id =  mysql_escape_string($_GET['Id']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveImmagine($Id);
        echo 'Immagine Rimossa Con Successo';
    }
        break;
    
    //func=AdminAddProd funzione per amministratore
    case "AdminAddProd":
    {
        $Id =  mysql_escape_string($_GET['Id']);
        $Nome =  mysql_escape_string($_GET['Nome']);
        $Descrizione =  mysql_escape_string($_GET['Descrizione']);
        $Prezzo =  mysql_escape_string($_GET['Prezzo']);
        $Ids =  mysql_escape_string($_GET['Ids']);
        $Categoria =  mysql_escape_string($_GET['Categoria']);
        $Controllore= new CAmministratore();
        $Controllore->AddProdotto($Id, $Nome, $Descrizione, $Prezzo, $Ids, $Categoria);
        echo 'Prodotto Aggiunto Con Successo';
    }
        break;
    
    //func=AdminUpdateProd funzione per amministratore
    case "AdminUpdateProd":
    {
        $Colonna =  mysql_escape_string($_GET['Colonna']);
        $Valore =  mysql_escape_string($_GET['Valore']);
        $ValChiave =  mysql_escape_string($_GET['ValChiave']);
        $Controllore= new CAmministratore();
        $Controllore->UpdateProdotto($Colonna, $Valore, $ValChiave);
        echo 'Prodotto Modificato Con Successo';
    }
        break;
    
    //func=AdminRemoveProd funzione per amministratore
    case "AdminRemoveProd":
    {
        $Id =  mysql_escape_string($_GET['Id']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveProdotto($Id);
        echo 'Prodotto Rimosso Con Successo';
    }
        break;
    
    //func=AdminAddSup funzione per amministratore
    case "AdminAddSup":
    {
        $Ids =  mysql_escape_string($_GET['Ids']);
        $Nome =  mysql_escape_string($_GET['Nome']);
        $Via =  mysql_escape_string($_GET['Via']);
        $Città =  mysql_escape_string($_GET['Città']);
        $Civico =  mysql_escape_string($_GET['Civico']);
        $Controllore= new CAmministratore();
        $Controllore->AddSupermercato($Ids, $Nome, $Via, $Città, $Civico);
        echo 'Supermercato Aggiunto Con Successo';
    }
        break;
    
    //func=AdminUpdateSup funzione per amministratore
    case "AdminUpdateSup":
    {
        $Colonna =  mysql_escape_string($_GET['Colonna']);
        $Valore =  mysql_escape_string($_GET['Valore']);
        $ValChiave =  mysql_escape_string($_GET['ValChiave']);
        $Controllore= new CAmministratore();
        $Controllore->UpdateSupermercato($Colonna, $Valore, $ValChiave);
        echo 'Supermercato Modificato Con Successo';
    }
        break;
    
    //func=AdminRemoveSup funzione per amministratore
    case "AdminRemoveSup":
    {
        $Id =  mysql_escape_string($_GET['Ids']);
        $Controllore = new CAmministratore();
        $Controllore->RemoveSupermercato($Id);
        echo 'Supermercato Rimosso Con Successo';
    }
        break;
    
    //func=AdminUpdateUtente funzione per amministratore
    case "AdminUpdateUtente":
    {
        $Colonna =  mysql_escape_string($_GET['Colonna']);
        $Valore =  mysql_escape_string($_GET['Valore']);
        $ValChiave =  mysql_escape_string($_GET['ValChiave']);
        $Controllore= new CAmministratore();
        $Controllore->UpdateUtente($Colonna, $Valore, $ValChiave);
        echo 'Utente Modificato Con Successo';
    }
        break;
    
    //func=AdminRemoveUtente funzione per amministratore
    case "AdminRemoveUtente":
    {
        $Email =  mysql_escape_string($_GET['Id']);
        $Controllore= new CAmministratore();
        $Controllore->RemoveUtente($Email);
        echo 'Utente Rimosso Con Successo';
    }
        break;
    
    default:
    {
        echo "PAGE NOT FOUND - MYSHOP - PROGETTO DI PROGRAMMAZIONE WEB";
    }
        break;
}
?>