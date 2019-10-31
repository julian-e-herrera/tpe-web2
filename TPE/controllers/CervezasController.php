<?php

require_once('./models/CervezasModel.php');
require_once('./views/CervezasView.php');
include_once('helpers/auth.helper.php');

class CervezasController{

    private $cervezasModel;
    private $cervezasView;

    function __construct(){
        // $authHelper = new AuthHelper();
        // $authHelper->checkLoggedIn();
//////barrera de logueo
        $this->cervezasModel = new CervezaModel();
        $this->cervezasView = new CervezaView();
    }

    public function showCerveza($params = null) {
        $idCerveza = $params[':ID'];
        $cerveza = $this->cervezasModel->get($idCerveza);

        if ($cerveza){ // si existe la tarea
            $this->cervezasView->DisplayCerveza($cerveza);
        }
        else{
            $this->cervezasView->showError('La cerveza no existe');
        }
    }
    function showCervezas(){
        $cervezas = $this->cervezasModel->getAll();
        $this->cervezasView->DisplayCervezas($cervezas);
       
    }
    public function showFamiliaCerveza($params = null) {
        $idCerveza = $params[':ID'];
        $cerveza = $this->cervezasModel->getFamAll($idCerveza);
        $this->cervezasView->DisplayFamiliaCerveza($cerveza);
    }

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

    public function InsertarCervezas(){
        $this->checkLogIn();
        $this->cervezasModel->InsertarCervezas($_POST['nombre'],$_POST['graduacion_porcentaje'],$_POST['ibu'],$_POST['amargor'],$_POST['original_gravity'],$_POST['id_familia']);
        header("Location: " . ver);
    }

    public function BorrarCerveza($id){
        $this->checkLogIn();
        $this->cervezasModel->BorrarCerveza($id);
        header("Location: " . ver);
    }
}