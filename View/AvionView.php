<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class AvionView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showAll($aviones){
        $this->smarty->assign('titulo_header','Listado de Aviones');
        $this->smarty->assign('titulo_listado','Listado de Aviones');
        $this->smarty->assign('titulo_crear','Crear Avión');
        $this->smarty->assign('aviones',$aviones);
        $this->smarty->display('templates/avionList.tpl');
    }

    function showAvion($avion){
        $titulo = 'Avión ' . $avion->nombre;
        $this->smarty->assign('titulo_header',$titulo);
        $this->smarty->assign('avion',$avion);
        $this->smarty->display('templates/avionDetail.tpl');
    }
}