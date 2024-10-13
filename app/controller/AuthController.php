<?php
require_once 'app/model/UserModel.php';
require_once 'app/view/AuthView.php';
require_once 'app/controller/BookingController.php';

class AuthController{
    private $model;
    private $view;

    public function __construct() {
        session_start();
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    function showLogin(){
        // Si el usuario ya esta logueado, redirigimos al home
        if (isset($_SESSION['ID_USUARIO'])) {
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
        
        if($userFromDb){
            if(password_verify($password, $userFromDb->password)){
                // Guardo en la sesión el ID del usuario
                $_SESSION['ID_USUARIO'] = $userFromDb->ID_USUARIO;
                $_SESSION['NOMBRE'] = $userFromDb->name;
                $_SESSION['LAST_ACTIVITY'] = time();
                var_dump($_SESSION);
                header('Location: ' . BASE_URL . 'home'); // Asegúrate de redirigir correctamente
                exit();
            } else {
                return $this->view->showLogin('Nombre de usuario o contraseña incorrectos'); // Corregido aquí
            }
    
            }
        }

      

    function logout() {
         session_destroy(); // Borra la cookie que se busco
         header('Location: ' . BASE_URL . 'home');
         exit();
    }
    
}