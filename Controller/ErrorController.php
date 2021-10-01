<?php

require_once 'View/ErrorView.php';
require_once 'Helpers/ControlLoginHelper.php';

class ErrorController{

    private $view;
    private $controlLoginHelper;

    function __construct() {
        $this->view = new ErrorView(); 
        $this->controlLoginHelper = new ControlLoginHelper();          
    }

    function showError404(){    
        $this->controlLoginHelper->checkLoggedIn();
        $this->view->showError404();
    }

}