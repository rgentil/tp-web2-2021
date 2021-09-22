<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class HangarView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showAll($hangares){
        $this->smarty->assign('titulo_header','Listado de Hangares');
        $this->smarty->assign('titulo_listado','Listado de Hangares');
        $this->smarty->assign('titulo_crear','Crear Hangar');
        $this->smarty->assign('hangares',$hangares);
        $this->smarty->display('templates/hangarList.tpl');
    }

    function showHangar($hangar){
        $titulo = 'Hangar ' . $hangar->nombre;
        $this->smarty->assign('titulo_header',$titulo);
        $this->smarty->assign('hangar',$hangar);
        $this->smarty->display('templates/hangarDetail.tpl');

    }

}