<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of CRicercaImmaginiLoghi
 *
 * @author juan
 */
  foreach (glob("File/*.txt") as $filename){
  require_once $filename;}
  foreach (glob("Model/*.php") as $filename){
    require_once $filename;
}
  foreach (glob("Foundation/*.php") as $filename){
    require_once $filename;
}
class CRicercaImmagini  {
    public function RicercaImmagine($Id) {
        
        $Immagine=new Immagine();
        $Immagine->fetchDB($Id);
        //$src='data:image/jpeg;base64,';// bisogna metterlo per far visualizzare l'immagine
        return json_encode($Immagine);   
        /*
        $Immagine=new Immagine();
        $Immagine->fetchDB($Id);// ho una riga della tab imm
       
        $Risultato=$Immagine->getImmagine();       
        $f=base64_encode($Risultato);
        $src='data:image/jpeg;base64,'.$f;
        echo '<img src="'.$src.'">'; */
    } 
}
?>