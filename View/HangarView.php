<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';
require_once 'View.php';

class HangarView extends View{

    function __construct() {
        $this->smarty = new Smarty();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }

    function showAll($hangares){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Listado de Hangares');
        $this->smarty->assign('titulo_listado','Listado de Hangares');
        $this->smarty->assign('titulo_crear','Crear Hangar');
        $this->smarty->assign('hangares',$hangares);
        $this->smarty->display('templates/hangarList.tpl');
    }

    function showHangar($hangar){
        $this->usuarioLogueado();
        $titulo = 'Hangar ' . $hangar->nombre;
        $this->smarty->assign('titulo_header',$titulo);
        $this->smarty->assign('hangar',$hangar);
        $this->smarty->display('templates/hangarDetail.tpl');
    }

    function showHangarAlta($mensaje = null){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Crear Hangar');
        $this->smarty->assign('titulo_crear','Crear Hangar');
        $this->smarty->assign('mensaje_valores_requeridos', $mensaje);
        $this->smarty->display('templates/hangarAlta.tpl');
    }

    function showHangarUpdate($hangar,$mensaje = null){
        $this->usuarioLogueado();
        if ($hangar != null && !empty($hangar)){
            $titulo = 'Hangar ' . $hangar->nombre;
            $this->smarty->assign('titulo_header',$titulo);
            $this->smarty->assign('titulo_update',$titulo);
            $this->smarty->assign('mensaje_valores_requeridos', $mensaje);
            $this->smarty->assign('hangar',$hangar);
            $this->smarty->display('templates/hangarUpdate.tpl');
        }
    }

}