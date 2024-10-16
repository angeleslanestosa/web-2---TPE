<?php
class BookingModel{   

    function getConnection(){
        $db= new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');
        return $db;

    }

    public function getBookings(){
        $db = $this->getConnection();
        $query= $db->prepare ('SELECT * FROM reserva');
        $query -> execute();
        $reservas= $query-> fetchAll(PDO::FETCH_OBJ);
        return $reservas;
    }

    public function insertBooking($userId, $destination, $housing, $chekin, $chekout){
        $db= $this->getConnection();
        $query= $db-> prepare('INSERT INTO reserva(ID_USUARIO, destination, housing, checkin, checkout) VALUES(?,?,?,?,?)');
        $query-> execute([$userId,$destination,$housing,$chekin,$chekout]);
    }

    public function removeBooking($bookingId){
        $db = $this->getConnection();
        $query = $db->prepare('DELETE FROM reserva WHERE ID_RESERVA = ?');
        return $query->execute(([$bookingId]));
    }

}