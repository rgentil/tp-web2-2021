<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';
require_once 'View.php';

class LoginView extends View{

    function __construct() {
        $this->smarty = new Smarty();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }

    function showLogin($mensaje = ""){
        $this->smarty->assign('admin',false);
        $this->smarty->assign('usuario_logueado',null);
        $this->smarty->assign('usuario_id',null);
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