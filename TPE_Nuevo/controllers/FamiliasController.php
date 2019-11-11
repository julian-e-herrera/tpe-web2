<?php

include_once('./models/FamiliasModel.php');
include_once('./views/FamiliasView.php');
include_once('helpers/auth.helper.php');
include_once('./models/CervezasModel.php');
require_once('controllers/LoginController.php');


class FamiliaController{

    private $familiaModel;
    private $cervezaModel;
    private $login;

    private $familiaView;

    public function __construct(){

        // barrera para usuario logueado
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $this->familiaModel = new FamiliaModel();
        $this->cervezaModel = new CervezaModel();
        $this->login =new LoginController();
        
        $this->familiaView = new FamiliaView();
    }

    public function showFamilias(){
        // obtengo cervezas del model
        $familias = $this->familiaModel->getAll();
        $cervezas =  $this->cervezaModel->getAll();
        // se las paso a la vista
        if ($this->login->verifyUser()) {
            $this->familiaView->DisplayFamilias($familias,$cervezas);
            
            
        }
        else {
            $this->familiasView->DisplayFamiliasUser($familias,$cervezas);
        }
    }

    public function showFamilia($params = null) {
        $idFamilia = $params[':ID'];
        $familia = $this->familiaModel->getFamilia($idFamilia);
        $cervezas =  $this->cervezaModel->getFamAll($idFamilia);

        if ($familia){ // si existe la tarea
           // $this->familiaView->DisplayFamilia($familia);
            $this->familiaView->DisplayFamilia($familia,$cervezas);
            

        }
        else{
            $this->familiaView->showError('La familia no existe');
        }
    }

    public function InsertarFamilia(){
        $this->familiaModel->InsertarFamilia($_POST['nombre'],$_POST['caracteristicas']);
        header("Location: " . ver);
    }
    public function ActualizarFamilia($params = null){
        $idFamilia= $params[':ID'];
        $familia = $this->familiaModel->get($idFamilia);
        $this->familiaModel->ActualizarFamilia($_POST[$idFamilia],$_POST[$familia->nombre],$_POST[$familia->caracteristicas]);
        header("Location: " . ver);
    }

    public function BorrarFamilia($params = null){
        $idFamilia = $params[':ID'];
        $this->familiaModel->BorrarFamilia($idFamilia);
        header("Location: " . ver);
    }
}