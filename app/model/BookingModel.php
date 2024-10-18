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
        $query= $db-> prepare('INSERT INTO reserva (IDUSUARIO, destination, housing, checkin, checkout) VALUES(?, ?, ?, ?, ?)');
        $query-> execute([$userId,$destination,$housing,$chekin,$chekout]);
    }

    public function removeBooking($bookingId){
        $db = $this->getConnection();
        $query = $db->prepare('DELETE FROM reserva WHERE IDRESERVA = ?');
        return $query->execute(([$bookingId]));
    }

}