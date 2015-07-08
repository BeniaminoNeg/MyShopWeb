<?php

/**
 * Description of C
 *
* @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano
 */

foreach (glob("Model/*.php") as $filename){
    require_once $filename;

}
foreach (glob("Foundation/*.php") as $filename){
    require_once $filename;
}

class CRicercaSupermercato {

    function RicercaPerIds($Ids) {
       
        header('Content-Type: application/json; charset=UTF-8');
        $SupermercatoDAO=new FSupermercato();
        $ArayRisultatiSup= $SupermercatoDAO->RicercaPerIds($Ids);
        $ArraySup=array();
        foreach ($ArayRisultatiSup as $key => $value) {
            $ArraySup[]=new Supermercato($value[0], $value[1], $value[2], $value[3], $value[4]);  
        }
        $ArraySupString=array();
        foreach ($ArraySup as $key => $value) {
            $ArraySupString[] = $value->getAsArray(); 
        }
        return $ArraySupString;
    }
}
