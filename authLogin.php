<?php 
session_start();
require_once 'classes/Auth.php';

$auth = new Auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Por favor, preencha todos os campos";
        header('Location: index.php');
        exit();
    }

    if ($auth->login($email, $password)) {
        if (isset($_POST['lembrar_email'])) {
            setcookie('email', $email, time() + (86400 * 30), "/");
        }
        $_SESSION['success'] = "Login realizado com sucesso!";
        header('Location: dashboard.php');
        exit();
    } else {
        $_SESSION['error'] = "Email ou senha inválidos";
        header('Location: index.php');
        exit();
    }
}
?>