<?php
require_once 'app/controller/BookingController.php';

class BookingView{
    
    function showBookings($reservas){
        foreach($reservas as $reserva){
            echo $reserva->destination;
        }
    }

    function showFormBooking(){
        require_once 'templates/formBooking.phtml';
    }

    function showMessage($message){
        echo "<p>$message</p>";
    }


}