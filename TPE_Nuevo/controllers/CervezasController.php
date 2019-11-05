<?php

include_once('./models/CervezasModel.php');
include_once('./views/CervezasView.php');
include_once('helpers/auth.helper.php');

class CervezasController{

    private $cervezasModel;
    private $cervezasView;

    public function __construct(){

        // barrera para usuario logueado
        //$authHelper = new AuthHelper();
        //$authHelper->checkLoggedIn();

        $this->cervezasModel = new CervezaModel();
        $this->cervezasView = new CervezaView();
    }

    public function showCervezas(){
        // obtengo cervezas del model
        $cervezas = $this->cervezasModel->getAll();
        // se las paso a la vista
        $this->cervezasView->DisplayCervezas($cervezas);
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

    public function InsertarCervezas(){
        $this->cervezasModel->InsertarCervezas($_POST['nombre'],$_POST['graduacion_porcentaje'],$_POST['ibu'],$_POST['amargor'],$_POST['original_gravity'],$_POST['id_familia']);
        header("Location: " . ver);
    }

    public function BorrarCerveza($params = null){
        $idCerveza = $params[':ID'];
        $this->cervezasModel->BorrarCerveza($idCerveza);
        header("Location: " . ver);
    }
}