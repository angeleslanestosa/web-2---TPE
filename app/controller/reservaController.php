<?php
require_once 'app/model/reservasModel.php';
require_once 'app/view/reservaView.php';

class reservaController{
    private $model;
    private $view;

    public function __construct() {
        $this->model= new reservasModel();
        $this->view= new reservaView();

        
    }

    function showHome(){
       $reservas=$this->model->getReservas();
       $this->view->showReservas($reservas);
       require_once 'app/view/homeView.php';   
       
       
    }                                  

}