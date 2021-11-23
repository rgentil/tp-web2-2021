<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';
require_once 'View.php';

class AvionView extends View{

    function __construct() {
        $this->smarty = new Smarty();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }
    function showAll($aviones,$pag_numero,$previous_page,$next_page,$total_pages){
        $this->usuarioLogueado();
        $titulo = 'Listado de Aviones';
        $this->smarty->assign('viene_hangar', false);
        $this->smarty->assign('titulo_header', $titulo);
        $this->smarty->assign('titulo_listado',$titulo);
        $this->smarty->assign('titulo_filtrado','Búsqueda');
        $this->smarty->assign('titulo_crear','Crear Avión');
        $this->smarty->assign('aviones',$aviones);
        $this->smarty->assign('titulo_paginacion','Paginación ---> '.$pag_numero.'/'.$total_pages);
        $this->smarty->assign('pag_numero',$pag_numero);
        $this->smarty->assign('previous_page',$previous_page);
        $this->smarty->assign('next_page',$next_page);
        $this->smarty->assign('total_pages',$total_pages);
        $this->smarty->display('templates/avionList.tpl');
    }

    function showAllByHangar($aviones){
        $this->usuarioLogueado();
        $titulo = 'Listado de Aviones en el Hangar ' . $aviones[0]->h_nombre;
        $this->smarty->assign('viene_hangar', true);
        $this->smarty->assign('titulo_header', $titulo);
        $this->smarty->assign('titulo_listado',$titulo);
        $this->smarty->assign('titulo_filtrado','Búsqueda');
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