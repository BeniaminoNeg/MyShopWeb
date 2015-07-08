<?php

/**
 * 
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano 
 */

require_once 'Controller/CRicercaProdotto.php';
require_once 'Controller/CRicercaSupermercato.php';
require_once 'Controller/CHome.php';
require_once 'Foundation/FDB.php';
require_once 'Foundation/FProdotto.php';
require_once 'Foundation/FSupermercato.php';
require_once 'Model/Indirizzo.class.php';
require_once 'Model/Prodotto.class.php';
require_once 'Model/Supermercato.class.php';
require_once 'Model/Utente.class.PHP';
require_once 'Controller/CSpotlight.php';
require_once 'Controller/CMarket.php';
require_once 'Controller/CCategoria.php';





foreach (glob("Model/*.php") as $filename){
    require_once $filename;

}
foreach (glob("Foundation/*.php") as $filename){
    require_once $filename;
}

$p = new CCategoria();
$p->RicercaPerCategoria("Frutta");
$Bho=new CHome;
$Bho->ProdottiInEvidenza();
$Bho->RicercaSupermercatiPerIds($ArrayIds);
$Prodotto=new CMarket();
$Prodotto->CatalogoSup($Ids);
$Prodotto->RicercaMarket();
$Servealdottore= new CSpotlight();
$Servealdottore->RicercaProdottiById($IdProdottiOsservati);
$Servealdottore->RicercaProdottiOsservati($Email);
$Servealdottore->RicercaUtente($Email);
//quelli di CRicercaProdotto e CRicercaSUpermercato non te li scrivo che non dovrebbero servirti


?>
