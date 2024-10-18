<?php
require_once 'app/controller/DestinationController.php';



class DestinationView{
    public function showDestinations($destinations){
        require_once 'templates/destinations.phtml';
    }

    public function showFormDestination(){
        require_once "templates/formDestination.phtml";

    }
}

