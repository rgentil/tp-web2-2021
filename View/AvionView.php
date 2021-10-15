<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class AvionView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function usuarioLogueado(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        $this->smarty->assign('admin',false);
        if (isset($_SESSION["codigo"]) && !empty($_SESSION["codigo"])){
            $this->smarty->assign('usuario_logueado',$_SESSION["nombre"]);
            if ($_SESSION["rol"] == "Admin"){
                $this->smarty->assign('admin',true);
            }
        }else{
            $this->smarty->assign('usuario_logueado',null);
        }
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

    function showAvionAlta($hangaresDisponibles){
        $this->usuarioLogueado();
        $this->smarty->assign('hangaresDisponibles',$hangaresDisponibles);
        $this->smarty->assign('titulo_header','Crear Avión');
        $this->smarty->assign('titulo_crear','Crear Avión');
        $this->smarty->display('templates/avionAlta.tpl');
    }

    function showAvionUpdate($avion,$hangaresDisponibles){
        $this->usuarioLogueado();
        $this->smarty->assign('hangaresDisponibles',$hangaresDisponibles);
        if ($avion != null && !empty($avion)){
            $titulo = 'Avión ' . $avion->nombre;
            $this->smarty->assign('titulo_header',$titulo);
            $this->smarty->assign('titulo_crear',$titulo);
            $this->smarty->assign('avion',$avion);
            $this->smarty->display('templates/avionUpdate.tpl');
        }        
    }
}