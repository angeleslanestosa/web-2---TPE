<?php
    require_once 'app/middleWare/verifyAuth.php';
    
    function sessionAuth($res) {
        session_start();
        if(isset($_SESSION['ID_USUARIO'])){
            $res->user = new stdClass();
            $res->user->id = $_SESSION['ID_USUARIO'];
            $res->user->name = $_SESSION['NOMBRE'];
            return true;
        } else {
            header('Location: ' . BASE_URL . 'login');
            exit();
        }
    }

