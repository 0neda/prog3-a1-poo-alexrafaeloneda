<?php
session_start();
require_once 'classes/Auth.php';

// Limpar a sessão
$auth = new Auth();
$auth->logout();

// Redirecionar para a página de login
$_SESSION['success'] = "Você saiu com sucesso!";
header('Location: index.php');
exit();