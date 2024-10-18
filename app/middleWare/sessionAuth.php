<?php
function sessionAuth($res) {
    if (isset($_SESSION['ID_USUARIO'])) {
        $res->user = new stdClass();
        $res->user->id = $_SESSION['ID_USUARIO'];
        $res->user->name = $_SESSION['name'];
    } else {
       header('Location: ' . BASE_URL . 'login');
      exit();
    }
}
?>