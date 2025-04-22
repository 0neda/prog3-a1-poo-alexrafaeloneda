<?php

class Session {
    
    private $loggedUser;
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function logIn($user) {
        $_SESSION['user'] = serialize($user);
        $this->loggedUser = $user;
}

    public function logOut() {
        unset($_SESSION['user']);
        $this->loggedUser = null;
    }    

    public function isUserLogged() {
        return isset($_SESSION['user']);
    }

    public function getLoggedUser() {
        if ($this->isUserLogged()) {
            return unserialize($_SESSION['user']);
        }
        return null;
    }

}

?>