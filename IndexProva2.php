<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Controller/CRicercaProdotto.php';
require_once 'Controller/CRicercaSupermercato.php';
require_once 'Controller/CHome.php';
require_once 'Controller/CRicercaImmagini.php';
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

$Controllore=new CRicercaImmagini();
$Controllore->RicercaImmagine("P001");
