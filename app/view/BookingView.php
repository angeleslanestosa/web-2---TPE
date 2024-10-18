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

    function showHome(){
        require_once "app/view/HomeView.php";
    }

    public function showUserPage(){
        require_once "templates/userPage.phtml";
    }



}