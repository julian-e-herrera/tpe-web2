<?php
require_once("./models/CervezasModel.php");
require_once("./api/JSONView.php");

class CervezasApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new CervezasModel();
        $this->view = new JSONView();
    }

    public function getCervezas($params = null) {
        $cervezas = $this->model->getCervezas();
        $this->view->response($cervezas, 200);
    }

    /**
     * Obtiene una tarea dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    public function getCerveza($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $cerveza = $this->model->getCerveza($id);
        
        if ($cerveza) {
            $this->view->response($cerveza, 200);   
        } else {
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }
    }
}