<?php
    
    function sessionAuth($res) {
        session_start();
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