<?php
require_once("./models/CervezasModel.php");
require_once("./api/JSONView.php");
require_once("./api/ApiController.php");
class CervezasApiController extends ApiController{

    public function getCervezas($params = null) {
        $cervezas = $this->model->getCervezas();
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
        
        $cerveza = $this->model->getCerveza($id);
        
        if ($cerveza) {
            $this->view->response($cerveza, 200);   
        } else {
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }
    }
    ///////
    // TareasApiController.php
    public function deleteCerveza($params = []) {
        $cerv_id = $params[':ID'];
        $cerveza = $this->model->GetCerveza($cerv_id);

        if ($cerveza) {
            $this->model->BorrarTarea($cerv_id);
            $this->view->response("Cerveza id=$cerv_id eliminada con éxito", 200);
        }
        else 
            $this->view->response("Cerveza id=$cerv_id not found", 404);
    }

    // TareaApiController.php
   public function addCerveza($params = []) {     
        $body = $this->getData();

        // inserta la tarea
        $nombre = $body->nombre;
        $graduacion = $body->graduacion_alcoholica;
        $ibu = $body->ibu;
        $amargor = $body->amargor;
        $og =$body->original_gravity;
        $cerveza = $this->model->InsertarCerveza( $nombre,$graduacion,$ibu,$amargor,$og);///editar las cualidades columnas de c fila
    }

    // TaskApiController.php
    public function updateCerveza($params = []) {
        $cerv_id = $params[':ID'];
        $cerveza = $this->model->GetCerveza($cerv_id);

        if ($cerveza) {
            $body = $this->getData();
            $nombre = $body->nombre;
            $graduacion = $body->graduacion_alcoholica;
            $ibu = $body->ibu;
            $amargor = $body->amargor;
            $og =$body->original_gravity;
            $cerveza = $this->model->ActualizarCerveza($cerv_id,$nombre,$graduacion,$ibu,$amargor,$og);
            $this->view->response("Cerveza id=$cerv_id actualizada con éxito", 200);
        }
        else 
            $this->view->response("Cerveza id=$cerv_id not found", 404);
    }
}