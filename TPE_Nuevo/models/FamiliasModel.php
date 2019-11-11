<?php
class FamiliaModel{

    private $db;
    private $nombres;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_cerveza_artesanal;charset=utf8','root','');
    }

    function getAll(){
    
        //preparo la consulta
        $query = $this->db->prepare('SELECT * FROM familia');
    
        //ejecuto la consulta
        $query->execute();
    
        //obtengo la respuesta
        $familias = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $familias;
    }

    function getFamilia($id){///este devuelve una familia completa con sus datos

        $query = $this->db->prepare('SELECT * FROM familia WHERE id_familia = ?');
        $query->execute(array($id));
        $familia = $query->fetch(PDO::FETCH_OBJ);
        
        return $familia;
    }
    //////////////////////////////
    public function getCervezasFamilia($id){///este devuelve una lista de nombres de cervezas q coinciden
        $sentencia=$this->db->prepare("SELECT cerveza.nombre FROM cerveza INNER JOIN familia where familia.id_familia = cerveza.id_familia and familia.id_familia =?");
        $sentencia->execute([$id]);
        $lista = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $lista;
    }


    public function getNombres($id_familia){
        $query = $this->db->prepare("SELECT nombre FROM cerveza INNER JOIN familia WHERE cerveza.id_familia = familia.id_familia");
        $query->execute(array($id_familia));/////////////////////
        $nombre = $query->fetchAll(PDO::FETCH_OBJ); //REVISAR.
        return $nombre;
    }
//////////////////////////////////////////////////////////

public function InsertarFamilia($nombre,$carac){
    $sentencia = $this->db->prepare("INSERT INTO familia(nombre,caracteristicas) VALUES(?,?)");
    $sentencia->execute([$nombre,$carac]);
    return $this->db->lastInsertId();
}

public function ActualizarFamilia($id,$nombre,$carac){
    $sentencia =  $this->db->prepare("UPDATE familia SET nombre=?, caracteristicas=? WHERE id_familia=?");
    $sentencia->execute([$nombre,$carac,$id]);
}

public function BorrarFamilia($id){
    $sentencia = $this->db->prepare("DELETE FROM familia WHERE id_familia=?");
    $sentencia->execute([$id]);
}

}