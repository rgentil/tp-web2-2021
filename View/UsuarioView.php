<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';
require_once 'View.php';

class UsuarioView extends View{

    function __construct() {
        $this->smarty = new Smarty();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }

    function showAll($usuarios){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Listado de Usuarios');
        $this->smarty->assign('titulo_listado','Listado de Usuarios');
        $this->smarty->assign('titulo_crear','Crear Usuario');
        $this->smarty->assign('usuarios',$usuarios);
        $this->smarty->display('templates/usuarioList.tpl');
    }

    function showUsuario($usuarios){
        $this->usuarioLogueado();
        $titulo = 'Usuario ' . $usuarios->nombre;
        $this->smarty->assign('titulo_header',$titulo);
        $this->smarty->assign('usuario',$usuarios);
        $this->smarty->display('templates/usuarioDetail.tpl');
    }

    function showUsuarioAlta($mensaje = null){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Crear Usuario');
        $this->smarty->assign('titulo_crear','Crear Usuario');
        $this->smarty->assign('mensaje_valores_requeridos', $mensaje);
        $this->smarty->display('templates/usuarioAlta.tpl');
    }

    function showUsuarioUpdate($usuario,$mensaje = null){
        $this->usuarioLogueado();
        if ($usuario != null && !empty($usuario)){
            $titulo = 'Usuario ' . $usuario->nombre;
            $this->smarty->assign('titulo_header',$titulo);
            $this->smarty->assign('titulo_update',$titulo);
            $this->smarty->assign('mensaje_valores_requeridos', $mensaje);
            $this->smarty->assign('usuario',$usuario);
            $this->smarty->display('templates/usuarioUpdate.tpl');
        }
    }

    function showRegistro($mensaje = ""){
        $this->smarty->assign('admin',false);
        $this->smarty->assign('usuario_logueado',null);
        $this->smarty->assign('titulo_header','Nuevo Registro');
        $this->smarty->assign('titulo_crear','Nuevo Registro');
        $this->smarty->assign('mensaje',$mensaje);
        $this->smarty->display('templates/registro.tpl');
    }

    function showLogin(){
        $this->smarty->assign('admin',false);
        $this->smarty->assign('titulo_header','Aeródromo');
        $this->smarty->assign('usuario_logueado',null);
        $this->smarty->assign('titulo_login','Bienvenido, ingrese por favor con código y password de usuario');
        $this->smarty->assign('mensajeRegExitoso','Registro exitoso.');
        $this->smarty->assign('mensaje',null);
        $this->smarty->display('templates/login.tpl');
    }

    function showHome(){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Aeródromo');
        $this->smarty->display('templates/home.tpl');
    }

}