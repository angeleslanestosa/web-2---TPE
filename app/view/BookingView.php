<?php
require_once 'app/controller/BookingController.php';

class BookingView{
    
    function showBookings($reservas){
        foreach($reservas as $reserva){
            echo $reserva->DESTINO;
        }
    }

    function showFormBookin(){
        require_once 'templates/formBooking.phtml';
    }

}