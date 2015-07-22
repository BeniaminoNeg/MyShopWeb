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
    
    default:
    {
        echo "PAGE NOT FOUND - MYSHOP - PROGETTO DI PROGRAMMAZIONE WEB";
    }
        break;
}
?>