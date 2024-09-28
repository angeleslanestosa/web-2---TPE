<?php
require_once 'app/model/dbReservas.php';
require_once 'app/view/reservaView.php';

class reservaController{
    private $model;
    private $view;

    public function __construct() {
        $this->model= new dbReservas();
        $this->view= new reservaView();

        
    }

    function showHome(){
       $reservas=$this->model->getReservas();
       $this->view->showReservas($reservas);
    }

}