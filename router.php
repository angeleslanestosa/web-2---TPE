<?php 
require_once 'app/controller/BookingController.php';
require_once 'app/controller/AuthController.php';
require_once 'app/controller/UserController.php';   
require_once 'app/middleWare/sessionAuth.php';
require_once 'librerias/Response.php';
require_once 'app/controller/DestinationController.php';
require_once "config.php";

    // base_url para redirecciones y base tag
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    $res = new Response();
    
    $action = 'home'; 
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }
    
    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);
    
    switch ($params[0]) {
      case 'home':
        $controller = new BookingController($res);
        $controller->showHome();                                                                                   
        break;
      case 'register':
        $controller= new UserController();
        $controller->showRegister();
        break;
      
      case'booking':
        sessionAuth($res);
        $controller= new BookingController($res);
        $controller-> addBooking();
      break;
      case 'deleteBooking':
        sessionAuth($res);
        if(isset($params[1])){
          $controller = new BookingController($res);
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
        sessionAuth($res);
        $controller = new AuthController();
        $controller->logout();
      break;
      case 'user':
        $controller = new userController();
        $controller->showUser(); // Mostrar información del usuario
    
        if (isset($_POST['action']) && $_POST['action'] === 'deleteAccount') {
          $IDUSUARIO = $_POST['IDUSUARIO'];
          $controller->deleteAccount($IDUSUARIO); 
        }
        break;
      case'user':
      //sessionAuth($res);
       // $controller= new BookingController($res);
      //  $controller->showUserPage();
      break;
      case 'destinations':
        $controller = new DestinationController();
        $controller->showDestinations();
        $controller->addDestination();
        break; 
      //case 'addDestination': 
        //$controller = new DestinationController();
        //$controller->addDestination();
        //break;
      default:
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
      break;

    }
    