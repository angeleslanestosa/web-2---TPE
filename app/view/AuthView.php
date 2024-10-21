<?php
require_once 'config/config.php';

class AuthView{
    private $use = null;

    function showLogin($error = ''){
        require_once 'templates/formLogin.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }


}