<?php
require_once 'app/controller/DestinationController.php';



class DestinationView{
    public function showDestinations($destinations){
        require_once 'templates/destinations.phtml';
        require_once "templates/formDestination.phtml";
    }

    public function showFormAddDestination(){
        require_once "templates/formDestination.phtml";

    }

}

