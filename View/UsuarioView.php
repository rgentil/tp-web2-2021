<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class UsuarioView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function usuarioLogueado(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        if (isset($_SESSION["codigo"]) && !empty($_SESSION["codigo"])){
            $this->smarty->assign('usuario_logueado',$_SESSION["codigo"]);
        }else{
            $this->smarty->assign('usuario_logueado',null);
        }
    }

    function showAll($usuarios){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Listado de Usuarios');
        $this->smarty->assign('titulo_listado','Listado de Usuarios');
        $this->smarty->assign('titulo_crear','Crear Usuario');
        $this->smarty->assign('usuarios',$usuarios);
        $this->smarty->display('templates/usuario/usuarioList.tpl');
    }

    function showUsuario($usuarios){
        $this->usuarioLogueado();
        $titulo = 'Usuario ' . $usuarios->nombre;
        $this->smarty->assign('titulo_header',$titulo);
        $this->smarty->assign('usuario',$usuarios);
        $this->smarty->display('templates/usuario/usuarioDetail.tpl');
    }

    function showUsuarioCrud($usuarios = null){
        $this->usuarioLogueado();
        if ($usuarios != null && !empty($usuarios)){
            $titulo = 'Usuario ' . $usuarios->nombre;
            $this->smarty->assign('titulo_header',$titulo);
            $this->smarty->assign('titulo_crear',$titulo);
            $this->smarty->assign('usuario',$usuarios);
        }else{
            $this->smarty->assign('titulo_header','Crear Usuario');
            $this->smarty->assign('titulo_crear','Crear Usuario');
        }        
        $this->smarty->display('templates/usuario/usuarioCrud.tpl');
    }

    function showRegistro($mensaje = ""){
        $this->smarty->assign('usuario_logueado',null);
        $this->smarty->assign('titulo_header','Nuevo Registro');
        $this->smarty->assign('titulo_crear','Nuevo Registro');
        $this->smarty->assign('mensaje',$mensaje);
        $this->smarty->display('templates/registro.tpl');
    }

    function showLogin(){
        $this->smarty->assign('titulo_header','Aeródromo');
        $this->smarty->assign('usuario_logueado',null);
        $this->smarty->assign('titulo_login','Bienvenido, ingrese por favor con código y password de usuario');
        $this->smarty->assign('mensajeRegExitoso','Registro exitoso. Ahora logueese');
        $this->smarty->assign('mensaje',null);
        $this->smarty->display('templates/login.tpl');
    }

}