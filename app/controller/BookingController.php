<?php
require_once 'app/model/BookingModel.php';
require_once 'app/view/BookingView.php';

class BookingController{
    private $model;
    private $view;
    private $res;

    public function __construct($res) {
        $this->model= new BookingModel();
        $this->view= new BookingView();
        $this->res= $res;    
    }

    function showHome() {
        $this->view->showHome();
    }
    
    
    public function addBooking(){
        $ruta = "booking/" ;
        $bookingId=null;
        $button="Agregar reserva";
        $this->view->showFormBooking($ruta, $bookingId,$button);

        if (!isset($_POST['destination']) || empty($_POST['destination'])) {
            return $this->view->showMessage('Falta completar el destino');
        }
        
        if (!isset($_POST['housing']) || empty($_POST['housing'])) {
            return $this->view->showMessage('Falta completar alojamiento');
        }
        
        $userId= $this->res->user->id;
        $destination = $_POST['destination'];
        $housing = $_POST['housing'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        
        if($this->model->insertBooking($destination, $housing, $checkin,$checkout,$userId)){
            return $this->view->showMessage("Reserva exitosa");
        } else{
            return  $this->view->showMessage("Error al registrar la reserva");
        }
            
    }
    
    

 
    function removeBooking($bookingId){
        $bookin = $this->model->getBookings($bookingId);
        $this->model->removeBooking($bookingId);
        $this->showBookin();

    }


    function showBookin(){
        $userId= $_SESSION['IDUSUARIO'];
        $bookins= $this->model->getBookings($userId);

        $this->view->showBookings($bookins);
        require_once 'templates/userPage.phtml'; 

    }

    public function ShowForm($ruta,$bookingId,$button){
        $this->view->showFormBooking($ruta, $bookingId,$button);
    }
    public function editBooking($bookingId) {
        $booking = $this->model->getBookings($bookingId);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookingId = $_POST['bookingId'];
            $destination = $_POST['destination'];
            $housing = $_POST['housing'];
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
    
            if (!empty($destination) && !empty($housing) && !empty($checkin) && !empty($checkout)) {
                $this->model->updateBookin( $destination, $housing, $checkin, $checkout,$bookingId);
                $this->showBookin();
            } 
        }
    }
    
    public function ShowItem($bookingId){ 
        $booking = $this->model->getBooking($bookingId);
        $this->view->showItem($booking);
    }  
    
        
    }
 

