<?php

require_once 'config/config.php';
    
    function sessionAuth($res) {
        if(isset($_SESSION['IDUSUARIO'])){
            $res->user = new stdClass();
            $res->user->id = $_SESSION['IDUSUARIO'];
            $res->user->name = $_SESSION['name'];
        } else {
            header('Location: ' . BASE_URL . 'login');
            exit();
        }
    }
?>