<?php

require_once 'View/HomeView.php';
require_once 'Helpers/ControlLoginHelper.php';

class HomeController{

    private $view;
    private $controlLoginHelper;

    function __construct() {
        $this->view = new HomeView(); 
        $this->controlLoginHelper = new ControlLoginHelper();        
    }

    function showHome(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->view->showHome();
    }

}