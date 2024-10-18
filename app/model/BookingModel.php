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

    public function insertBooking( $destination, $housing, $chekin, $chekout,$userId){
        $db= $this->getConnection();
        $query= $db-> prepare('INSERT INTO reserva ( destination, housing, checkin, checkout,IDUSUARIO) VALUES(?, ?, ?, ?, ?)');
        $query-> execute([$destination,$housing,$chekin,$chekout,$userId]);
    }

    public function removeBooking($bookingId){
        $db = $this->getConnection();
        $query = $db->prepare('DELETE FROM reserva WHERE ID_RESERVA = ?');
        return $query->execute(([$bookingId]));
    }

    public function Cositas($userId, $destination){
        echo $userId+ $destination;
    }

}