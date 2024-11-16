<?php


    class UserModel{
        function getConnection(){
            $db= new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');
            return $db;
        }
    
        function getUser($nombre) {    
            $db = $this->getConnection();
            $query = $db->prepare("SELECT * FROM usuario WHERE name = ?");
            $query->execute([$nombre]);
        
            $user = $query->fetch(PDO::FETCH_OBJ);
        
            return $user;
        }

    }
    