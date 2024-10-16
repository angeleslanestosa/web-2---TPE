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

    function showHome() {
        $this->view->showHome();
    }
    
    //añadir una reserva
    function addBooking(){
        session_start();
        $this->view->showFormBooking();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $destination = $_POST['destination'];
            $housing = $_POST['housing'];
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];

            if(isset($_SESSION['ID_USUARIO'])){
                $userId = $_SESSION['ID_USUARIO'];
                $this->model->insertBooking($userId, $destination, $housing, $checkin, $checkout);
                header('Location: ' .BASE_URL. 'home');
                exit();
            }else{
                $this->view->showMessage("Usuario no registrado");
                $this->view->showFormBooking();
            }
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
}

   

