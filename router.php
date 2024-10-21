<?php 
require_once 'app/controller/BookingController.php';
require_once 'app/controller/AuthController.php';
require_once 'app/controller/UserController.php';   
require_once 'app/middleWare/sessionAuth.php';
require_once 'librerias/Response.php';
require_once 'app/controller/DestinationController.php';
require_once "config/config.php";

    
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    $res = new Response();
    
    $action = 'home'; 
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }
    
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
      case 'formBooking':
        sessionAuth($res);
        $controller = new BookingController($res);
        $controller->ShowForm("booking/", $params[1],"Agregar reserva");
        break;
      case 'removeBooking':
        sessionAuth($res);
        if(isset($params[1])){
          $controller = new BookingController($res);
          $controller->removeBooking($params[1]);
        }
        break;
      case 'editBooking':
        sessionAuth($res);
        if(isset($params[1])){
          $controller = new BookingController($res);
          $controller->editBooking($params[1]);
        }
      break;
      case 'formEdit':
        sessionAuth($res);
        $controller= new BookingController($res);
        $controller->ShowForm("editBooking/",$params[1],"Editar reserva");
      break;
      case 'showItem':
        sessionAuth($res);
        if(isset($params[1])){
          $controller= new BookingController($res);
          $controller->ShowItem($params[1]);
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
        sessionAuth($res);
        $controller= new BookingController($res);
        $controller->showBookin();
      break;
      case 'user':
        $controller = new userController();
        $controller->showUser();
        if (isset($_POST['action']) && $_POST['action'] === 'logout') {
          $IDUSUARIO = $_POST['IDUSUARIO'];
          $controller->deleteAccount($IDUSUARIO); 
        }else{
          $controller->showUser();
        }
        break;
      case 'destinations':
        $controller = new DestinationController();
        $controller->showDestinations();
        break; 
      case 'addDestination': 
        $controller = new DestinationController();
        $controller->addDestination();
        break;
      case 'deleteDestination':
        if (isset($params[1])) { 
          $IDDESTINATION = $params[1];
          $controller = new DestinationController();
          $controller->deleteDestination($IDDESTINATION);
        } else {
          echo "404 Page Not Found"; 
        }
        break;
      case 'editDestination':
        if (isset($params[1])) { 
          $controller = new DestinationController();
          $controller->editDestination($params[1]);
        } else {
          echo "404 Page Not Found"; 
        }
        break;
      default:
        echo "404 Page Not Found"; 
      break;

    }
    