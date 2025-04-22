<?php
class Auth {
    private $users = [];

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->users = $_SESSION['users'] ?? [];
    }

    public function register($name, $email, $password) {
        if ($this->emailExists($email)) {
            return false;
        }

        $this->users[] = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $_SESSION['users'] = $this->users;
        return true;
    }

    public function login($email, $password) {
        foreach ($this->users as $user) {
            if ($user['email'] === $email && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'name' => $user['name'],
                    'email' => $user['email']
                ];
                return true;
            }
        }
        return false;
    }

    private function emailExists($email) {
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                return true;
            }
        }
        return false;
    }

    public function logout() {
        unset($_SESSION['user']);
    }

    public function isLoggedIn() {
        return isset($_SESSION['user']);
    }
}
?>