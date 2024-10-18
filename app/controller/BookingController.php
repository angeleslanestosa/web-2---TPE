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
    
    //añadir una reserva
    function addBooking(){
        $this->view->showFormBooking();

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
    
    

    //eliminar una reserva
    function deleteBooking($bookingId){
        if($this->model->removeBooking($bookingId)){
            $this->view->showMessage("Reserva eliminada con éxito");
        }else{
            $this->view->showMessage("Error al eliminar la reserva");
        }
        header ('Location: ' .BASE_URL. 'home');
        exit();

    }

    function showBooking(){
        $bookin= $this->model->getBookings();
       // $this->model->showBookin($bookin);
    }

    
    //public function showUserPage(){
    //    $this->view->showUserPage();
    //}

}

   

