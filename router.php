<?php 
require_once 'app/controller/bookingController.php';
require_once 'app/controller/authController.php';
    

    // base_url para redirecciones y base tag
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    $action = 'Home'; 
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }
    

    
    
    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);
    
    switch ($params[0]) {
        case 'Home':
            $controller = new BookingController();
            $controller->showHome();
            break;
        //case'booking':
        //    $controller= new resrvaController();
        // if(logeado){
        //    $controller-> addBooking($params[1]);
        // }else{
        //      advertencia();}
        //case 'user':
        //    $controller = new usarioController();
          //  $controller->user($params[1]);
            //break;
        case 'login':
            $controller = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $controller->login();
            }else{
              $controller->showLogin();
            }
            break;
        //case 'logout':
            //$controller = new AuthController();
            //$controller->logout();
            //break;
        //case 'logout':
          //  $controller = new usuarioController();
            //$controller->logout();
            //break;
        default: 
            echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
            break;
        
    }
    