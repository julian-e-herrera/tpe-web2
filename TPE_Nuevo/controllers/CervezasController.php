<?php

require_once('./models/CervezasModel.php');
require_once('./views/CervezasView.php');
require_once('helpers/auth.helper.php');
require_once('controllers/LoginController.php');
class CervezasController{

    private $cervezasModel;
    private $cervezasView;
    private $login;
    public function __construct(){

        // barrera para usuario logueado
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $this->cervezasModel = new CervezaModel();
        $this->cervezasView = new CervezaView();
        $this->login =new LoginController();
    }
    public function showCervezasDefault(){
        // obtengo cervezas del model
        $cervezas = $this->cervezasModel->getAll();
        $this->cervezasView->DisplayCervezasUser($cervezas);
    }
    public function showCervezas(){
        // obtengo cervezas del model
        $cervezas = $this->cervezasModel->getAll();
        // se las paso a la vista
        //if (($this->login->verifyUser())==true) {
            $this->cervezasView->DisplayCervezas($cervezas);
            
        // }
        // else {
        //     $this->cervezasView->DisplayCervezasUser($cervezas);
        // }
    }

    // public function showCervezasUser(){
    //     // obtengo cervezas del model
    //     $cervezas = $this->cervezasModel->getAll();
    //     // se las paso a la vista
    //     $this->cervezasView->DisplayCervezasUser($cervezas);
    // }

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

    public function InsertarCerveza(){
        $this->cervezasModel->InsertarCerveza($_POST['nombre'],$_POST['graduacion_porcentaje'],$_POST['ibu'],$_POST['amargor'],$_POST['original_gravity'],$_POST['id_familia']);
        header("Location: " . ver);
    }
    public function ActualizarCervezas($params = null){
        $idCerveza = $params[':ID'];
        $cerveza = $this->cervezasModel->get($idCerveza);
        $this->cervezasModel->ActualizarCervezas($_POST[$idCerveza],$_POST[$cerveza->nombre],$_POST[$cerveza->graduacion_porcentaje],$_POST[$cerveza->ibu],$_POST[$cerveza->amargor],$_POST[$cerveza->original_gravity],$_POST[$cerveza->id_familia]);
        header("Location: " . actualizar);
    }
    public function BorrarCerveza($params = null){
        $idCerveza = $params[':ID'];
        $this->cervezasModel->BorrarCerveza($idCerveza);
        header("Location: " . ver);
    }
}