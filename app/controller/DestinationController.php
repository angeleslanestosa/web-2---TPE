<?php

require_once 'app/model/DestinationModel.php';
require_once 'app/view/DestinationView.php';

Class DestinationController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new DestinationModel();
        $this->view = new DestinationView();
        
    }

    public function showDestinations(){
        $destinations = $this->model->getDestinations();
        $this->view-> showDestinations($destinations);
    }


    public function deleteDestination($ID_DESTINATION){
        $this->model->deleteDestination($ID_DESTINATION);
        header('Location: ' .BASE_URL. 'destinations');
        exit();
    }

    public function editDestination($ID_DESTINATION){
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $attractions = $_POST['attractions'];
            $season = $_POST['season'];
            $this->model->updateDestination($ID_DESTINATION, $name, $description, $attractions, $season);
            header('Location: ' .BASE_URL. 'destinations');
            exit();
        }else{
            $destinations = $this->model->getDestinations($ID_DESTINATION);
            $this->view->showDestinations($destinations);
        }
    }
}