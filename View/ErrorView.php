<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class ErrorView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showError404(){
        $this->smarty->assign('titulo_header','Error 404 - Volando cielos desconocidos - ');
        $this->smarty->display('templates/error.tpl');
    }

}