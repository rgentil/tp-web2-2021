<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class HangarView{

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

    function showHangarAlta(){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Crear Hangar');
        $this->smarty->assign('titulo_crear','Crear Hangar');
        $this->smarty->display('templates/hangarAlta.tpl');
    }

    function showHangarUpdate($hangar){
        $this->usuarioLogueado();
        if ($hangar != null && !empty($hangar)){
            $titulo = 'Hangar ' . $hangar->nombre;
            $this->smarty->assign('titulo_header',$titulo);
            $this->smarty->assign('titulo_update',$titulo);
            $this->smarty->assign('hangar',$hangar);
            $this->smarty->display('templates/hangarUpdate.tpl');
        }
    }

}