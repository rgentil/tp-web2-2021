<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';
require_once 'View.php';

class ErrorView extends View{

    function __construct() {
        $this->smarty = new Smarty();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }

    function showError404(){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Error 404 - Volando cielos desconocidos - ');
        $this->smarty->display('templates/error.tpl');
    }

}