<?php
require_once 'app/model/UserModel.php';
require_once 'app/view/AuthView.php';
require_once 'app/controller/BookingController.php';

class AuthController{
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    function showLogin(){
        // Si el usuario ya esta logueado, redirigimos al home
        if (isset($_SESSION['IDUSUARIO'])) {
            header('Location: ' . BASE_URL . 'home');
            exit();
        }
        return $this->view->showLogin();
    }

    function login(){
        if(!isset($_POST ['name']) || empty($_POST ['name'])){
            return $this->view->showLogin('Completar nombre de ususario');
        }

        if(!isset($_POST ['password']) || empty($_POST ['password'])){
            return $this->view->showLogin('Completar contraseña');
        }

        $name = $_POST ['name'];
        $password = $_POST ['password'];

        $userFromDb = $this->model->getUser($name);
        
        if($userFromDb && password_verify($password, $userFromDb->password)){
            session_start();
                // Guardo en la sesión el ID del usuario
            $_SESSION['ID_USUARIO'] = $userFromDb->ID_USUARIO;
            $_SESSION['name'] = $userFromDb->name;
            $_SESSION['LAST_ACTIVITY'] = time();
        
            header('Location: ' . BASE_URL . 'home');
            exit();
        } else {
            return $this->view->showLogin('Nombre de usuario o contraseña incorrectos');
        }
    
            
    }

    function logout() {
         session_destroy(); // Borra la cookie que se busco
         header('Location: ' . BASE_URL . 'home');
         exit();
    }


    
}