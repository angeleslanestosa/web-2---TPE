<?php
require_once 'app/model/UserModel.php';
require_once 'app/view/AuthView.php';

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
            header('Location: ' . BASE_URL . 'Home');
            exit();
        }
        return $this->view->showLogin();
    }

    function login(){
        if(!isset($_POST ['nombre']) || empty($_POST ['nombre'])){
            return $this->view->showLogin('Nombre de usuario incocrrecto');
        }

        if(!isset($_POST ['password']) || empty($_POST ['password'])){
            return $this->view->showLogin('Contraseña incocrrecta');
        }

        $nombre = $_POST ['nombre'];
        $password = $_POST ['password'];

        $userFromDb = $this->model->getUser($nombre);
        

        if($userFromDb && password_verify($password, $userFromDb->password)){
            // Guardo en la sesión el ID del usuario
            $_SESSION['ID_USUARIO'] = $userFromDb->id;
            $_SESSION['NOMBRE'] = $userFromDb->nombre;
            $_SESSION['LAST_ACTIVITY'] = time();

            header('Location: ' . BASE_URL . 'home'); // Asegúrate de redirigir correctamente
            exit;
        } else {
            return $this->view->showLogin('Nombre de usuario o contraseña incorrectos'); // Corregido aquí
    }

        }
    }

    function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se busco
        header('Location: ' . BASE_URL);
    }
    

    
