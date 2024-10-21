<?php
    class UserModel{
        private $db;
        public function __construct() {
            $this->db = new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');
         }
      
     
        public function getUser($name) {;
            $query =$this->db->prepare("SELECT * FROM usuario WHERE name = ?");
            $query->execute([$name]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function insertUser($name, $lastname, $dni, $email, $hashedPassword, $preferences){
            $query= $this->db->prepare("INSERT INTO usuario(name, lastname, dni, email, password, preferences) VALUES(?,?,?,?,?,?)");
            $query->execute([$name, $lastname, $dni, $email,$hashedPassword, $preferences]);
        }

        public function deleteUser($IDUSUARIO) {
            $query =$this->db->prepare('DELETE FROM usuario WHERE IDUSUARIO = ?');
            return $query->execute([$IDUSUARIO]); 
        }
    }
    