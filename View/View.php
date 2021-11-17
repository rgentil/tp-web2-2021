<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';
require_once 'Helpers/ControlLoginHelper.php';

class view {

    protected $smarty;
    protected $controlLoginHelper;

    function __construct() {
        $this->smarty = new Smarty();
        $this->controlLoginHelper = new ControlLoginHelper(); 
    }

    function usuarioLogueado(){
        $this->smarty->assign('admin',false);
        if ($this->controlLoginHelper->estaLogueadoUsuario()){
            $this->smarty->assign('usuario_logueado',$this->controlLoginHelper->getNombreUsuarioLogueado());
            $this->smarty->assign('usuario_codigo',$this->controlLoginHelper->getCodigoUsuarioLogueado());
            $this->smarty->assign('usuario_id',$this->controlLoginHelper->getIdUsuarioLogueado());
            if ($this->controlLoginHelper->esUsuarioAdmin()){
                $this->smarty->assign('admin',true);
            }
        }else{
            $this->smarty->assign('usuario_logueado',null);
            $this->smarty->assign('usuario_id',null);
        }
    }
}