<?php

require_once "Model/AvionModel.php";
require_once "View/AvionView.php";
require_once 'Helpers/ControlLoginHelper.php';

class AvionController {

    private $model;
    private $view;
    private $controlLoginHelper;

    public function __construct(){
        $this->model = new AvionModel();
        $this->view = new AvionView();
        $this->controlLoginHelper = new ControlLoginHelper();
    }

    public function showAll(){
        $this->controlLoginHelper->checkLoggedIn();

        //PAGINADO
        //Página inicial
        $pag_numero = 1;
        if (isset($_GET['pagenumero']) && !empty($_GET['pagenumero'])){
            $pag_numero = intval($_GET['pagenumero']);
        }

        //Total de items por página
        $pag_totales_items_mostrar = 4;

        $offset = ($pag_numero-1) * $pag_totales_items_mostrar;
        $previous_page = $pag_numero - 1;
        $next_page = $pag_numero + 1;

        
        //Total de items en la base de datos.
        $totalAviones = $this->model->getTotalAviones();
        
        //Total de páginas para mostrar
        $total_pages = intval( ceil($totalAviones->total / $pag_totales_items_mostrar) );
        
        //FILTROS
        $filtro_nombre = null;
        if (isset($_GET['filtro_nombre']) && !empty($_GET['filtro_nombre'])){
            $filtro_nombre = $_GET['filtro_nombre'];
        }

        $aviones = $this->model->getAllPagenation($offset, $total_pages, $filtro_nombre);

        $this->view->showAll($aviones,$pag_numero,$previous_page,$next_page,$total_pages);
    }

    public function showById($id){
        $this->controlLoginHelper->checkLoggedIn();
        $avion = $this->model->getById($id);
        $this->view->showAvion($avion);
    }

    public function showByIdHangar($id_hangar){
        $this->controlLoginHelper->checkLoggedIn();
        $aviones = $this->model->getByIdHangar($id_hangar);
        $this->view->showAllByHangar($aviones);
    }

    public function showAlta(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $hangaresDisponibles = $this->model->getHangaresDisponibles();
        $this->view->showAvionAlta($hangaresDisponibles);
    }  

    public function showUpdate($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $hangaresDisponibles = $this->model->getHangaresDisponibles($id);
        $avion = $this->model->getById($id);        
        $this->view->showAvionUpdate($avion,$hangaresDisponibles);
    }  

    function createAvion(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $mensaje_valores_requeridos = "Se debe ingresar nombre, fabricante, tipo y hangar";

        if ($_FILES['imagen']['name']) {
            if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
                if (!isset($_POST['nombre']) || !isset($_POST['fabricante']) || !isset($_POST['tipo']) || !isset($_POST['idHangar'])){
                    $this->view->showAvionAlta($mensaje_valores_requeridos);            
                }else{
                    $id = $this->model->insert($_POST['nombre'], $_POST['fabricante'], $_POST['tipo'],$_POST['idHangar'], $_FILES['imagen']);
                    $this->showById($id);
                }
            }
            else {
                $this->view->showAvionAlta("El formato de la imágen no es correcto. Acepta .jpeg, .jpg o .png");
                die();
            }
        }else{
            if (!isset($_POST['nombre']) || !isset($_POST['fabricante']) || !isset($_POST['tipo']) || !isset($_POST['idHangar'])){
                $this->view->showAvionAlta($mensaje_valores_requeridos);            
            }else{
                $id = $this->model->insert($_POST['nombre'], $_POST['fabricante'], $_POST['tipo'],$_POST['idHangar']);
                $this->showById($id);
            }
        }
        
    }

    function updateAvion(){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        if (!isset($_POST['id'])){
            $this->showAll();
        }
        else{
            $id = $_POST['id'];  
            $mensaje_valores_requeridos = "Se debe ingresar nombre, fabricante, tipo y hangar";
            $errorImagen = false;
            $agregarImagen = false;

            if ($_FILES['imagen']['name']) {                
                if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
                    $errorImagen = false;
                    $agregarImagen = true;
                }else{
                    $errorImagen = true;
                }
            }

            if (!isset($_POST['nombre']) || !isset($_POST['fabricante']) || !isset($_POST['tipo']) || !isset($_POST['idHangar']) || $errorImagen){
                $avion = $this->model->getById($id);
                $hangaresDisponibles = $this->model->getHangaresDisponibles($id);
                if ($errorImagen){
                    $this->view->showAvionUpdate($avion,$hangaresDisponibles,"El formato de la imágen no es correcto. Acepta .jpeg, .jpg o .png");
                }else{
                    $this->view->showAvionUpdate($avion,$hangaresDisponibles,$mensaje_valores_requeridos);
                }                
            }else{
                if ($agregarImagen){
                    $this->model->update($_POST['nombre'], $_POST['fabricante'], $_POST['tipo'],$_POST['idHangar'],$id, $_FILES['imagen']);
                }else{
                    $this->model->update($_POST['nombre'], $_POST['fabricante'], $_POST['tipo'],$_POST['idHangar'],$id);
                }
                
                $this->showById($id);
            }    
        }        
    }

    function deleteAvion($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $this->model->delete($id);
        $this->showAll();
    }

    function deleteImagen($id){
        $this->controlLoginHelper->checkLoggedIn();
        $this->controlLoginHelper->checkRolLoggedIn();
        $avion = $this->model->getById($id);
        //Busco el path para eliminarla del disco si existe.
        $this->model->deleteImagen($id, $avion->imagen);
        $this->showAll();
    }

}