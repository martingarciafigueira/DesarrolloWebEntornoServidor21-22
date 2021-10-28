<?php

abstract class Usuario {
    protected $username;
    abstract public function estableceRol();
    
    function getUsername() {
        return $this->username;
    }

    function setUsername($username) {
        $this->username = $username;
    }
}
