<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewHome
 *
 * @author beniamino
 */
require_once 'Controller/CHome.php';


class ViewHome extends View {
    
    public function __construct($Prod, $Sup) {
        parent::__construct();
        }
        
    public function PassaggioArray($Prod, $Sup) {
        $this->assign("Prod",$Prod);
        $this->assign("Sup",$Sup);
    }
    
    public function mostraPagina() {
        $this->display('home.tpl');
    }
}
