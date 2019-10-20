<?php

require_once('./models/CervezasModel.php');
require_once('./views/CervezasView.php');
require_once('libs/Smarty.class.php');
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
}