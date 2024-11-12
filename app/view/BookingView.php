<?php
require_once 'app/controller/BookingController.php';


class BookingView{
    

    function showFormBooking($ruta, $bookingId = null,$button, $destinations) {
        require_once 'templates/formBooking.phtml';
    }

    function showMessage($message){
        echo "<p>$message</p>";
    }

    function showHome(){
        require_once "app/view/homeView.php";
    }

    public function showUserPage($id){
        require_once "templates/userPage.phtml";
    }

    public function showBookings($bookins) {
        $count = count($bookins);
        require 'templates/userPage.phtml';
    }

    public function showItem($booking){
        require_once 'templates/showItem.phtml';
    }


}