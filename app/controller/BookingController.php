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

}