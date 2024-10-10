<?php
require_once 'app/model/userModel.php';
require_once 'app/view/userView.php';
class userController{
    private $model;
    private $view;

    public function __construct() {
        $this->model= new userModel();
        $this->view= new userView();
    }

    public function showRegister(){
        $this->view->showRegister();
        if(isset( $_POST['name'])){
            $name= $_POST['name'];
            $lastName= $_POST['lastName'];
            $dni= $_POST['dni'];
            $email= $_POST['email'];
            $preferences= $_POST['preferences'];
            $this->model->insertUser($name,$lastName,$dni,$email,$preferences);
            $this->view->showRegister(); 
        }
    }
}