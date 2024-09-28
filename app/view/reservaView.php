<?php
require_once 'app/controller/reservaController.php';
class reservaView{
    
    function showReservas($reservas){
        foreach($reservas as $reserva){
            echo $reserva->id;
        }
    }
}