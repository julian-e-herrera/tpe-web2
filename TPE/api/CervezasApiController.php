<?php
require_once("./models/CervezasModel.php");
require_once("./api/JSONView.php");
require_once("./api/ApiController.php");
class CervezasApiController extends ApiController{
    // abstract class ApiController {
    //     protected $model;
    //     protected $view;
    //     private $data; 
    
    //     public function __construct() {
    //         $this->view = new JSONView();
    //         $this->data = file_get_contents("php://input"); 
    //         $this->model = new CervezaModel();
    //     }
    
    //     function getData(){ 
    //         return json_decode($this->data); 
    //     }  
    // }

    public function getCervezas($params = null) {
        $cervezas = $this->model->getAll();
        //$titulo = $cervezas->titulo;
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
        
        $cerveza = $this->model->get($id);
        
        if ($cerveza) {
            $this->view->response($cerveza, 200);   
        } else {
            $this->view->response("No existe la cerveza con el id={$id}", 404);
        }
    }
    public function getFamiliaCerveza($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $cerveza = $this->model->getFamAll($id);
        
        if ($cerveza) {
            $this->view->response($cerveza, 200);   
        } else {
            $this->view->response("No existe la familia con el id={$id}", 404);
        }
    }
    ///////

    public function deleteCerveza($params = null) {
        $cerv_id = $params[':ID'];
        $cerveza = $this->model->get($cerv_id);

        if ($cerveza) {
            $this->model->BorrarCerveza($cerv_id);
            $this->view->response("Cerveza fue borrada con éxito", 200);
        }
        else 
            $this->view->response("Cerveza id={$cerv_id} not found", 404);
    }

    // public function deleteTask($params = null) {
    //     $id = $params[':ID'];
    //     $tarea = $this->model->get($id);
    //     if ($tarea) {
    //         $this->model->delete($id);
    //         $this->view->response("La tarea fue borrada con exito.", 200);
    //     } else
    //         $this->view->response("La tarea con el id={$id} no existe", 404);
    // }
    // inserta la cerveza
   public function addCerveza($params = null) {     
        $body = $this->getData();
        $id = $this->model->InsertarCerveza($body->nombre, $body->graduacion_porcentaje,$body->ibu, $body->amargor,$body->original_gravity,$body->id_familia);///editar las cualidades columnas de c fila
        $cerveza = $this->model->get($id);
         if ($cerveza)
             $this->view->response($cerveza, 200);
         else
            $this->view->response("La cerveza no fue creada", 500);

    }
    
    public function updateCerveza($params = []) {
        $cerv_id = $params[':ID'];
        $data = $this->getData();
        $cerveza = $this->model->get($cerv_id);
        if ($cerveza) {
            $this->model->ActualizarCerveza($cerv_id,$data->nombre,$data->graduacion_porcentaje,$data->ibu,$data->amargor,$data->original_gravity,$data->id_familia);
            $this->view->response("Cerveza id=$cerv_id actualizada con éxito", 200);
        }
        else 
            $this->view->response("Cerveza id=$cerv_id not found", 404);
    }
}
