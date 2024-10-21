<?php
class BookingModel{   
    private  $db;
    public function __construct()
    {
       $this->db= new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');

    }

    public function getBookings($userId){
        $query= $this->db->prepare ('SELECT * FROM reserva WHERE IDUSUARIO = ?');
        $query -> execute([$userId]);
        $reservas= $query-> fetchAll(PDO::FETCH_OBJ);
        return $reservas;
    }


    public function insertBooking( $destination, $housing, $chekin, $chekout,$userId){
        $query= $this->db-> prepare('INSERT INTO reserva ( destination, housing, checkin, checkout,IDUSUARIO) VALUES(?, ?, ?, ?, ?)');
        $query-> execute([$destination,$housing,$chekin,$chekout,$userId]);
    }

    public function removeBooking($bookingId){
        $query = $this->db->prepare('DELETE FROM reserva WHERE IDRESERVA = ?');
        return $query->execute(([$bookingId]));
    }

    public function updateBookin($destination, $housing, $checkin, $checkout,$bookingId) {
       $query= $this->db->prepare('UPDATE reserva SET destination=?, housing=?, checkin=?, checkout=? WHERE IDRESERVA = ? ');
       $query->execute([$destination, $housing, $checkin, $checkout,$bookingId]);
    }
    

    public function getBooking($bookingId){
        $query= $this->db->prepare('SELECT * FROM reserva WHERE IDRESERVA = ?');
        $query -> execute([$bookingId]);
        $reservas= $query-> fetchAll(PDO::FETCH_OBJ);
        return $reservas;
    }

    }
    

