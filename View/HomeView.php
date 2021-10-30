<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';
require_once 'View.php';

class HomeView extends View{

    function __construct() {
        $this->smarty = new Smarty();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }

    function showHome(){
        $this->usuarioLogueado();
        $this->smarty->assign('titulo_header','Aeródromo');
        $this->smarty->display('templates/home.tpl');
    }

}