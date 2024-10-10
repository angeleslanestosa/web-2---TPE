<?php


    class UserModel{
        function getConnection(){
            $db= new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');
            return $db;
        }
    
        function getUser($nombre) {    
            $db = $this->getConnection();
            $query = $db->prepare("SELECT * FROM usuario WHERE nombre = ?");
            $query->execute([$nombre]);
        
            $user = $query->fetch(PDO::FETCH_OBJ);
        
            return $user;
        }

        public function insertUser($name,$lastName,$dni,$email,$preferences){
            $db= $this->getConnection();
            $query= $db->prepare("INSERT INTO usuario(NOMBRE, APELLIDO,DNI, EMAIL,PREFERENCIAS) VALUES(?,?,?,?,?)");
            $query->execute([$name,$lastName,$dni,$email,$preferences]);
        }

}
    