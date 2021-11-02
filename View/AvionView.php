<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';
require_once 'View.php';

class AvionView extends View{

    function __construct() {
        $this->smarty = new Smarty();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }

    function showAll($aviones){
        $this->usuarioLogueado();
        $titulo = 'Listado de Aviones';
        $this->smarty->assign('titulo_header', $titulo);
        $this->smarty->assign('titulo_listado',$titulo);
        $this->smarty->assign('titulo_crear','Crear Avión');
        $this->smarty->assign('aviones',$aviones);
        $this->smarty->display('templates/avionList.tpl');
    }

    function showAllByHangar($aviones){
        $this->usuarioLogueado();
        $titulo = 'Listado de Aviones en el Hangar ' . $aviones[0]->h_nombre;
        $this->smarty->assign('titulo_header', $titulo);
        $this->smarty->assign('titulo_listado',$titulo);
        $this->smarty->assign('titulo_crear','Crear Avión');
        $this->smarty->assign('aviones',$aviones);
        $this->smarty->display('templates/avionList.tpl');
    }

    function showAvion($avion){
        $this->usuarioLogueado();
        $titulo = 'Avión ' . $avion->nombre;
        $this->smarty->assign('titulo_header',$titulo);
        $this->smarty->assign('avion',$avion);
        $this->smarty->display('templates/avionDetail.tpl');
    }

    function showAvionAlta($hangaresDisponibles,$mensaje = null){
        $this->usuarioLogueado();
        $this->smarty->assign('hangaresDisponibles',$hangaresDisponibles);
        $this->smarty->assign('titulo_header','Crear Avión');
        $this->smarty->assign('titulo_crear','Crear Avión');
        $this->smarty->assign('mensaje_valores_requeridos', $mensaje);
        $this->smarty->display('templates/avionAlta.tpl');
    }

    function showAvionUpdate($avion,$hangaresDisponibles,$mensaje = null){
        $this->usuarioLogueado();
        $this->smarty->assign('hangaresDisponibles',$hangaresDisponibles);
        if ($avion != null && !empty($avion)){
            $titulo = 'Avión ' . $avion->nombre;
            $this->smarty->assign('titulo_header',$titulo);
            $this->smarty->assign('titulo_update',$titulo);
            $this->smarty->assign('avion',$avion);
            $this->smarty->assign('mensaje_valores_requeridos', $mensaje);
            $this->smarty->display('templates/avionUpdate.tpl');
        }        
    }
}