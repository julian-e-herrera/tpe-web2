<?php
class CervezaModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_cerveza_artesanal;charset=utf8','root','');
    }

    function getAll(){
    
        //preparo la consulta
        $query = $this->db->prepare('SELECT * FROM cerveza');
    
        //ejecuto la consulta
        $query->execute();
    
        //obtengo la respuesta
        $cervezas = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $cervezas;
    }

    function get($id){

        $query = $this->db->prepare('SELECT * FROM cerveza WHERE cerveza.id = ?');
        $query->execute(array($id));
        $cerveza = $query->fetch(PDO::FETCH_OBJ);
        
        return $cerveza;
    }
//////////////////////////////////////////////////////////

public function InsertarCerveza($nombre,$grad,$ibu,$amargor,$og,$id_fam){

    $sentencia = $this->db->prepare("INSERT INTO tarea(nombre,graduacion_porcentaje,ibu,amargor,original_gravity,id_familia) VALUES(?,?,?,?,?,?)");
    $sentencia->execute(array($nombre,$grad,$ibu,$amargor,$og,$id_fam));
}

public function ActualizarCerveza($nombre,$grad,$ibu,$amargor,$og,$id_fam){
    $sentencia =  $this->db->prepare("UPDATE cerveza SET nombre=?, graduacion_porcentaje=?, ibu=?,amargor=?,original_gravity=?,id_familia=? WHERE id=?");
    $sentencia->execute(array($nombre,$grad,$ibu,$amargor,$og,$id_fam));
}

public function BorrarCerveza($id){
    $sentencia = $this->db->prepare("DELETE FROM cerveza WHERE id=?");
    $sentencia->execute(array($id));
}

}