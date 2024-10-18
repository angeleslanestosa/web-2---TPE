<?php

function verifyAuth($res){
    if(isset ($res->user)){
        echo "Bienvenido, " . htmlspecialchars($res->user->name);
    }else{
        echo "Usuario no autenticado.";
    }
}