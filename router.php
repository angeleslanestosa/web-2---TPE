<?php 
require_once 'app/controller/reservaController.php';
    // base_url para redirecciones y base tag
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    $action = 'home'; 
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }
    
    // tabla de ruteo
    
    // home  -> srController->showHome();
    // destinations  -> SrController->showwDestinations();
    // housings -> srController->showHousings();
    // user -> srController->user($id);
    // login -> srController->login; 
    // logout -> srController -> logout;
    
    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);
    
    switch ($params[0]) {
        case 'home':
            $controller = new reservaController();
            $controller->showHome();
            break;
        //case'booking':
        //    $controller= new resrvaControlesr();
        //    $controller-> addBooking($params[1]);
        //case 'user':
        //    $controller = new usarioController();
          //  $controller->user($params[1]);
            //break;
        //case 'login':
          //  $controller = new usuarioController();
            //$controller->login();
            //break;
        //case 'logout':
          //  $controller = new usuarioController();
            //$controller->logout();
            //break;
        default: 
            echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
            break;
        
    }
    