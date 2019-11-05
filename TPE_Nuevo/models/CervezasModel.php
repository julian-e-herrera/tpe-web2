<?php
class CervezaModel{

    private $db;
    private $CervezaApiController;

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
    
    function getFamAll($id){
    
        //preparo la consulta
        $query = $this->db->prepare('SELECT * FROM cerveza WHERE id_familia = ?');
        $query->execute(array($id));
        $cerveza = $query->fetchAll(PDO::FETCH_OBJ);
        return $cerveza;
    }

    function get($id){

        $query = $this->db->prepare('SELECT * FROM cerveza WHERE cerveza.id_cerveza = ?');
        $query->execute(array($id));
        $cerveza = $query->fetch(PDO::FETCH_OBJ);
        
        return $cerveza;
    }
//////////////////////////////////////////////////////////

public function InsertarCerveza($nombre,$grad,$ibu,$amargor,$og,$id_fam){
    $sentencia = $this->db->prepare("INSERT INTO cerveza(nombre,graduacion_porcentaje,ibu,amargor,original_gravity,id_familia) VALUES(?,?,?,?,?,?)");
    $sentencia->execute([$nombre,$grad,$ibu,$amargor,$og,$id_fam]);
    return $this->db->lastInsertId();
}

public function ActualizarCerveza($id,$nombre,$grad,$ibu,$amargor,$og,$id_fam){
    $sentencia =  $this->db->prepare("UPDATE cerveza SET nombre=?, graduacion_porcentaje=?, ibu=?,amargor=?,original_gravity=?,id_familia=? WHERE id_cerveza=?");
    $sentencia->execute([$nombre,$grad,$ibu,$amargor,$og,$id_fam,$id]);
}

public function BorrarCerveza($id){
    $sentencia = $this->db->prepare("DELETE FROM cerveza WHERE id_cerveza=?");
    $sentencia->execute([$id]);
}

}