<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_usuarios;charset=utf8', 'root', '');
    }

     public function GetPassword($user){
         $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE .'password'. = ?");
         $sentencia->execute(array($user));
        
         $password = $sentencia->fetch(PDO::FETCH_OBJ);
        
         return $password;
     }
    public function getByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre = ?');
        $query->execute(array($username));

        return $query->fetch(PDO::FETCH_OBJ);
    }
}

?>