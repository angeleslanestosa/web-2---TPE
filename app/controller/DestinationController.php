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


    public function deleteDestination($IDDESTINATION){
        $this->model->deleteDestination($IDDESTINATION);
        header('Location: ' .BASE_URL. 'destinations');
        exit();
    }

    public function editDestination($IDDESTINATION){
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $attractions = $_POST['attractions'];
            $season = $_POST['season'];
            $this->model->updateDestination($IDDESTINATION, $name, $description, $attractions, $season);
            header('Location: ' .BASE_URL. 'destinations');
            exit();
        }else{
            $destinations = $this->model->getDestinations($IDDESTINATION);
            $this->view->showDestinations($destinations);
        }
    }

    public function addDestination(){
        $this->view->showFormDestination();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $attractions = $_POST['attractions'];
            $season = $_POST['season'];

            if($this->model->insertDestination($name, $description, $attractions, $season)){
                header('Location: ' .BASE_URL. 'destinations');
            }else{
                return $this->view->showFormDestination("Error, revise que los campos esten completados");
            }
            
        }
        return $this->view->showFormDestination();
        
    }
}