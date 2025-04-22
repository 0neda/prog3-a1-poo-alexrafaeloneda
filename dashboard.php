<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard">
    <meta name="author" content="Oneda">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Dashboard</title>
</head>

<body>
    <div class="flex flex-col h-screen bg-gray-100 justify-center items-center">
        <div class="bg-white shadow-sm p-8 rounded-lg max-w-md w-full">
            <?php if (isset($_SESSION['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
            </div>
            <?php endif; ?>

            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Bem-vindo, <?= htmlspecialchars($user['name']) ?>!</h1>
                <p class="text-gray-600 mt-2">Você está logado com o email: <?= htmlspecialchars($user['email']) ?></p>
            </div>

            <div class="mt-8">
                <form action="logout.php" method="POST">
                    <button type="submit"
                        class="w-full text-white p-2 bg-red-500 hover:bg-red-600 hover:cursor-pointer rounded-lg">
                        Sair
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>