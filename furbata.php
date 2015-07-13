<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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

$ProdottoDAO= new FProdotto();
$query="SELECT * FROM `Catalogo` ";
$result=$ProdottoDAO->query($query);
//var_dump($result);
$arraynomi=array();
for ($index = 0; $index < 51; $index++) {
    $arraynomi[]=$result [$index]["Nome"];
}
//var_dump($arraynomi);
$nomigrossi=array();
foreach ($arraynomi as $value) {
    //var_dump($value);
    $value= strtoupper(rtrim($value));
    $nomigrossi[]=$value;
}
//var_dump($nomigrossi);
$arrayid=array();
for ($index = 0; $index < 51; $index++) {
    $arrayid[]=$result [$index]["Id"];
}
//var_dump($arrayid);
for ($index1 = 0; $index1 < 51; $index1++) {
    $ProdottoDAO->UpdateAttributo("Catalogo", "Nome", $nomigrossi[$index1], "Id", $arrayid[$index1]);
}