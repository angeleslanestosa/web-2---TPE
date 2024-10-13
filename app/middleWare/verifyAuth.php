<?php

function verifyAuth($res){
    if(isset ($res->user)){
        echo "Bienvenido, " . htmlspecialchars($res->user->name); // Protección básica de XSS
    }else{
        echo "Usuario no autenticado.";
    }
}