<?php

/**
 * Description of CHome
 *
 * @author beniamino
 * @author juan
 * @author Silvia
 * @author Gaetano
 */

require_once './Foundation/FProdotto.php';
require_once 'CSessione.php';
require_once 'CRicercaProdotto.php';
require_once 'CRicercaSupermercato.php';

class CHome {
    /**
     * 
     * @return type json dell' array dei prodotti della home
     */
    public function ProdottiInEvidenza(){
        
        
        $ProdottoDAO= new FProdotto();
        $risultato= $ProdottoDAO->ContaProdotti();
        $risultato = $risultato[0]["COUNT(Id)"];//Risultato contiene il num di prodotti presenti nel Catalogo
        $Indicicasuali = array();
        for ($index = 0; $index < 6; $index++) {
            $Indicicasuali []=  rand(1, $risultato );          
        }
        $Indicicasuali=array_unique($Indicicasuali);
        while(count($Indicicasuali)<5)
        {
            $Indicicasuali [] = rand(1, $risultato );
            $Indicicasuali=array_unique($Indicicasuali);
        } 
        $CRicercaProdotto=new CRicercaProdotto();
        $ArrayProdotti=array();
        foreach ($Indicicasuali as $key => $value) {
        	for($i = 0; $i < 2 - log10($value); $i++){
        		$value = "0".$value;
        	}
        	$value = "P".$value;
            $ArrayProdotti[]= $CRicercaProdotto->RicercaPerId($value);            
         }
        $JsonRisultato= json_encode($ArrayProdotti);
        return $JsonRisultato;
    }
    /**
     * 
     * @param type $StringIdS ids dei supermercati cercati
     * @return type jason di array dei supermeracti cercati
     */
    public function RicercaSupermercatiPerIds($StringIdS) {
        $ArrayIdS= array();
        $ArrayIdS=  explode(",", $StringIdS);
        $CSupermercato = new CRicercaSupermercato();  
        $ArraySupermercati=array();
        foreach ($ArrayIdS as $key =>$value) {
           $ArraySupermercati[] = $CSupermercato->RicercaPerIds($value);
        }
        $JsonRisultato= json_encode($ArraySupermercati);
        return $JsonRisultato;
  }
}
?>