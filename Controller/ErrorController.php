<?php

require_once 'View/ErrorView.php';

class ErrorController{

    private $view;

    function __construct() {
        $this->view = new ErrorView(); 
        
    }

    function showError404(){    
        $this->view->showError404();
    }

}