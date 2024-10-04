<?php 
require_once 'app/controller/reservaController.php';
require_once 'app/controller/userController.php';    

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
          $controller = new reservaController();
          $controller->showHome();                                                                                   
          break;
        case 'registrarse':
          $controller= new userController();
          $controller->showRegister();
          break;
        //case'booking':
        //    $controller= new resrvaController();
        //    if(loggedo)
        //    $controller-> addBooking($params[1]);
        //    else
        //    advertencia
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
    