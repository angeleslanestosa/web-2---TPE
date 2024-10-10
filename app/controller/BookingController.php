<?php
require_once 'app/model/BookingModel.php';
require_once 'app/view/BookingView.php';

class BookingController{
    private $model;
    private $view;

    public function __construct() {
        $this->model= new BookingModel();
        $this->view= new BookingView();

        
    }

    function showHome(){
       $reservas=$this->model->getBookings();
       $this->view->showBookings($reservas);
       require_once 'app/view/homeView.php';   
       
       
    } 
    
    function addBooking(){
        $this->view->showFormBookin();
        if(isset ($_POST['destination'])){
            $destination= $_POST['destination'];
            $housing= $_POST['housing'];
            $checkIn= $_POST['checkin'];
            $checkOut= $_POST['checkout'];
            $userId=2;
            $this->model->insertBooking($userId,$destination, $housing, $checkIn,$checkOut);
        }
    }

}