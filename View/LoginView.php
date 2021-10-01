<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class LoginView{

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

    function showLogin($mensaje = ""){
        $this->smarty->assign('usuario_logueado',null);
        $this->smarty->assign('titulo_header','Aeródromo');
        $this->smarty->assign('titulo_login','Ingrese código y password de usuario para iniciar sesión');
        $this->smarty->assign('mensaje',$mensaje);
        $this->smarty->assign('mensajeRegExitoso',null);
        $this->smarty->display('templates/login.tpl');
    }

    function showHome(){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Aeródromo');
        $this->smarty->display('templates/home.tpl');
    }

}