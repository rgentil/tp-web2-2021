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
        $this->smarty->assign('titulo_header','Listado de Aviones');
        $this->smarty->assign('titulo_listado','Listado de Aviones');
        $this->smarty->assign('titulo_crear','Crear Hangar');
        $this->smarty->assign('aviones',$aviones);
        $this->smarty->display('templates/avion/avionList.tpl');
    }

    function showAvion($avion){
        $this->usuarioLogueado();
        $titulo = 'Avión ' . $avion->nombre;
        $this->smarty->assign('titulo_header',$titulo);
        $this->smarty->assign('avion',$avion);
        $this->smarty->display('templates/avion/avionDetail.tpl');
    }

    function showAvionCrud($avion,$hangaresDisponibles){
        $this->usuarioLogueado();
        $this->smarty->assign('hangaresDisponibles',$hangaresDisponibles);

        if ($avion != null && !empty($avion)){
            $titulo = 'Avión ' . $avion->nombre;
            $this->smarty->assign('titulo_header',$titulo);
            $this->smarty->assign('titulo_crear',$titulo);
            $this->smarty->assign('avion',$avion);
        }else{
            $this->smarty->assign('titulo_header','Crear Avión');
            $this->smarty->assign('titulo_crear','Crear Avión');
        }        
        $this->smarty->display('templates/avion/avionCrud.tpl');
    }
}