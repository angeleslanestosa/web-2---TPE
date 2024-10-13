<?php


    class UserModel{
        function getConnection(){
            $db= new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');
            return $db;
        }
    
        function getUser($name) {    
            $db = $this->getConnection();
            $query = $db->prepare("SELECT * FROM usuario WHERE name = ?");
            $query->execute([$name]);
        
            return $query->fetch(PDO::FETCH_OBJ);

        }

        public function insertUser($name, $lastname, $dni, $email, $hashedPassword, $preferences){
            $db= $this->getConnection();
            $query= $db->prepare("INSERT INTO usuario(name, lastname, dni, email, password, preferences) VALUES(?,?,?,?,?,?)");
            $query->execute([$name, $lastname, $dni, $email,$hashedPassword, $preferences]);
        }

}
    
    