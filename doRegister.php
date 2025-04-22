<?php
require_once 'classes/Auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth = new Auth();
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($auth->register($name, $email, $password)) {
        header('Location: index.php?success=1');
        exit();
    } else {
        $error = "Erro ao cadastrar usuário";
        header('Location: doRegister.php?error=' . urlencode($error));
        exit();
    }
}
?>