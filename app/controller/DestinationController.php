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
        $this->view->showDestinations($destinations);
    }


    public function deleteDestination($IDDESTINATION){
        $this->model->deleteDestination($IDDESTINATION);
        header('Location: ' .BASE_URL. 'destinations');
        exit();
    }

    public function editDestination($IDDESTINATION) {
        if (isset($_POST['name'], $_POST['IDDESTINATION'])) {
            $IDDESTINATION = $_POST['IDDESTINATION'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $attractions = $_POST['attractions'];
            $season = $_POST['season'];
            $this->model->editDestination($IDDESTINATION, $name, $description, $attractions, $season);
            header('Location: ' . BASE_URL . 'destinations');
            exit();
        }
    }

    public function addDestination(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $attractions = $_POST['attractions'];
            $season = $_POST['season'];
            if($this->model->insertDestination($name, $description, $attractions, $season)){
                header('Location: ' .BASE_URL. 'destinations');
            }
        }
        
    }

    public function showFormAddDestination(){
        require_once 'templates/formDestination.phtml';
    }
   
}