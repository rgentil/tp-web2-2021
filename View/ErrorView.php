<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class ErrorView{

    private $smarty;

    function __construct(){
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

    function showError404(){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Error 404 - Volando cielos desconocidos - ');
        $this->smarty->display('templates/error.tpl');
    }

}