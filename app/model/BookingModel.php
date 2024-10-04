<?php
class BookingModel{   

    function getConnection(){
        $db= new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');
        return $db;

    }

    public function getBookings(){
        $db = $this->getConnection();
        $query= $db->prepare('SELECT * from reserva');
        $query -> execute();
        $reservas= $query-> fetchAll(PDO::FETCH_OBJ);
        return $reservas;
    }

}