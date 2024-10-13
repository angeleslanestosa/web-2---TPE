<?php 
require_once 'app/controller/BookingController.php';
require_once 'app/controller/AuthController.php';
require_once 'app/controller/UserController.php';    

    // base_url para redirecciones y base tag
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    $action = 'home'; 
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }
    
    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);
    
    switch ($params[0]) {
        case 'home':
          $controller = new BookingController();
          $controller->showHome();                                                                                   
          break;
        case 'register':
          $controller= new UserController();
          $controller->showRegister();
          break;
        case'booking':
          $controller= new BookingController();
          if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $controller-> addBooking();
          }else{
            $controller->addBooking();
          }
          break;
        case 'deleteBooking':
          if(isset($params[1])){
            $controller = new BookingController();
            $controller->deleteBooking($params[1]);
          }
          break;
        case 'login':
            $controller = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $controller->login();
            }else{
              $controller->showLogin();
            }
            break;
        case 'logout':
          $controller = new AuthController();
          $controller->logout();
          
        default: 
            echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
            break;
        
    }
    