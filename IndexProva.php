<?php

require_once 'Controller/CRicercaProdotto.class.php';
require_once 'Foundation/FDB.php';
require_once 'Foundation/FProdotto.php';
require_once 'Foundation/FSupermercato.php';
require_once 'Model/Indirizzo.class.php';
require_once 'Model/Prodotto.class.php';
require_once 'Model/Supermercato.class.php';
require_once 'Model/Utente.class.PHP';
$Controllore = new CRicercaProdotto();
$Risultato=$Controllore->RicercaPerNome("Riso");
//var_dump($Risultato);

//$Name=$Risultato[0]->getNome();
//$img = $Risultato[0]->getNome();
//echo ($img);
//var_dump($Risultato);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
