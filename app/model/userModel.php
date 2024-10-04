<?php
class userModel{
    function getConnection(){
        $db= new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');
        return $db;
    }

    public function insertUser($name,$lastName,$dni,$email,$preferences){
        $db= $this->getConnection();
        $query= $db->prepare("INSERT INTO usuario(NOMBRE, APELLIDO,DNI, EMAIL,PREFERENCIAS) VALUES(?,?,?,?,?)");
        $query->execute([$name,$lastName,$dni,$email,$preferences]);


    }
}