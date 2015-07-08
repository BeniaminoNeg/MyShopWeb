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
    
    public function ProdottiInEvidenza(){
        
        $CSessione=new CSessione();
        $CSessione->Session();
        $ProdottoDAO= new FProdotto();
        $risultato= $ProdottoDAO->ContaProdotti();
        $risultato=$risultato[0][0];
        $Indicicasuali = array();
        for ($index = 0; $index < 6; $index++) {
            $Indicicasuali []=  rand(1, $risultato );          
        }
        $CRicercaProdotto=new CRicercaProdotto();
        $ArrayProdotti=array();
        foreach ($Indicicasuali as $key => $value) {
            $ArrayProdotti[]= $CRicercaProdotto->RicercaPerId($value);
         }
        $JsonRisultato= json_encode($ArrayProdotti);
        echo $JsonRisultato;
    }
    
    public function RicercaSupermercatiPerIds($ArrayIds) {
       
        $CSupermercato = new CRicercaSupermercato();  
        $ArraySupermercati=array();
        foreach ($ArrayIds as $key =>$value) {
           $ArraySupermercati[] = $CSupermercato->RicercaPerIds($value);
        }
        $JsonRisultato= json_encode($ArraySupermercati);
        echo $JsonRisultato;
  }
}
?>

