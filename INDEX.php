<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
foreach (glob("Model/*.php") as $filename){
    require_once $filename;

}
foreach (glob("Foundation/*.php") as $filename){
    require_once $filename;
}
foreach (glob("Controller/*.php") as $filename){
    require_once $filename;
}

$CCategoria = new CCategoria();
$CCategoria->RicercaPerCategoria($Categoria);//ritorna tutti i prodotti di una determinata categoria

$CHome = new CHome();
$CHome->ProdottiInEvidenza(); //estrae 6 prodotti a caso dal database  cerca i supermercati correlati
$CHome->RicercaSupermercatiPerIds($ArrayIds); //cerca i supermercati in base all ids passato

$CMarket = new CMarket();
$CMarket->CatalogoSup($Ids);//restituisce il catalogo di un supermercato
$CMarket->RicercaMarket();//restituisce tutti i market sul db

$CRicercaImmagini = new CRicercaImmagini();
$CRicercaImmagini->RicercaImmagine($Id);//restituisce un immagine dato un idp o ids

$CSpotlight = new CSpotlight();
$CSpotlight->RicercaProdottiById($IdProdottiOsservati);//restituisce i prodotti osservato dall utente






