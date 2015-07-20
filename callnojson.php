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
        header('Warning: 200');
        $nome= mysql_escape_string($_POST['nome']);
        $cognome= mysql_escape_string($_POST['cognome']);
        $email= mysql_escape_string($_POST['email']);
        $passwd= mysql_escape_string($_POST['password']);
        $Controllore= new CRegistrazione();
        $Controllore->Registrazione($nome, $cognome, $passwd, $email); 
        http_response_code(200);
    }
        break;
    default:
    {
        echo "PAGE NOT FOUND - MYSHOP - PROGETTO DI PROGRAMMAZIONE WEB";
    }
        break;
}
