<?php

require_once 'Controller/CRicercaProdotto.class.php';
require_once 'Controller/CHome.php';
require_once 'Foundation/FDB.php';
require_once 'Foundation/FProdotto.php';
require_once 'Foundation/FSupermercato.php';
require_once 'Model/Indirizzo.class.php';
require_once 'Model/Prodotto.class.php';
require_once 'Model/Supermercato.class.php';
require_once 'Model/Utente.class.PHP';
$Controllore = new CHome();
$Risultato=$Controllore->ProdottiInEvidenza();

?>
