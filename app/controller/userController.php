<?php
require_once 'app/model/UserModel.php';
require_once 'app/view/UserView.php';
class userController{
    private $model;
    private $view;

    public function __construct() {
        $this->model= new userModel();
        $this->view= new userView();
    }

    public function showRegister(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $dni = $_POST['dni'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $preferences = $_POST['preferences'];
            if(empty($name) || empty($lastname) || (empty($dni)) || empty($email) || empty($password) || empty($preferences)){
                return $this->view->showRegister("Por favor complete todos los campos requeridos");
            }
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if($this->model->insertUser($name, $lastname, $dni, $email, $hashedPassword, $preferences)){
                return $this->view->showRegister("Usuario registrado con éxito");
            }else{
                return $this->view->showRegister("Error al registrar usuario");
            }
        }
        return $this->view->showRegister();
        

    }

    public function showUser(){
        require_once 'templates/userPage.phtml';
    }

    public function deleteAccount($IDUSUARIO) {
        if (!empty($IDUSUARIO) && $this->model->deleteUser($IDUSUARIO)) {
            session_destroy(); 
            header('Location: ' . BASE_URL . 'home');
            exit(); 
        } else {

            echo "Error: No se pudo eliminar la cuenta.";
        }
    }

   

}