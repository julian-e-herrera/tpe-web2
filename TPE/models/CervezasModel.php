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

}