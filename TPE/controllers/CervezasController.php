<?php

require_once('./models/CervezasModel.php');
require_once('./views/CervezasView.php');
//require_once('libs/Smarty.class.php');
class CervezasController{

    private $cervezasModel;
    private $cervezasView;

    function __construct(){
        $this->cervezasModel = new CervezaModel();
        $this->cervezasView = new CervezaView();
    }

    function showCerveza(){
        if(isset($_GET)&& isset($_GET['id'])){
            $id = $_GET['id'];
            $cerveza = $this->cervezasModel->get($id);
            $this->cervezasView->DisplayCervezas($cerveza);
        }
        else{
            $this->showCerveza();
        }
    }

    function showCervezas(){
        $cervezas = $this->cervezasModel->getAll();
        $this->cervezasView->DisplayCervezas($cervezas);
    }
    /////////////
    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['userId'])){
            header("Location: " . URL_LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header("Location: " . URL_LOGOUT);
            die(); // destruye la sesión, y vuelve al login
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    public function GetCervezas(){
        $this->checkLogIn();
        $cervezas = $this->model->getAll();
        $this->view->DisplaytCervezas($cervezas);
    }

    public function InsertarCervezas(){
        $this->checkLogIn();
        $this->model->InsertarCervezas($_POST['nombre'],$_POST['graduacion_porcentaje'],$_POST['ibu'],$_POST['amargor'],$_POST['original_gravity'],$_POST['id_familia']);
        header("Location: " . BASE_URL);
    }

    public function BorrarCerveza($id){
        $this->checkLogIn();
        $this->model->BorrarCerveza($id);
        header("Location: " . BASE_URL);
    }
}