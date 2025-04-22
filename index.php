<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Index">
    <meta name="author" content="Oneda">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title></title>
</head>

<body>
    <div class="flex flex-col h-screen bg-gray-100 justify-center items-center">
        <div class="bg-white shadow-sm p-8 rounded-lg">
            <form action="authLogin.php" method="POST">
                <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']);
                    ?>
                </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['success'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </div>
                <?php endif; ?>

                <div class="form-group mt-2">
                    <label for="email" class="text-gray-500">Email:</label>
                    <input type="email" name="email" id="email"
                        value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" required
                        class="border border-gray-300 rounded-md p-2 w-full">
                </div>

                <div class="form-group mt-2">
                    <label for="password" class="text-gray-500">Senha:</label>
                    <input type="password" name="password" id="password" required
                        class="border border-gray-300 rounded-md p-2 w-full">
                </div>

                <div class="form-group mt-2">
                    <input type="checkbox" name="lembrar_email" id="lembrar_email"
                        <?= isset($_COOKIE['email']) ? 'checked' : '' ?>>
                    <label for="lembrar_email" class="text-gray-500">
                        Lembrar email
                    </label>
                </div>

                <button type="submit" class="w-full text-white p-2 bg-green-400 hover:bg-green-500 rounded-lg my-4">
                    Entrar
                </button>
            </form>

            <div class="mt-4">
                <p class="text-gray-500">Não possui uma conta?
                    <a href="register.php" class="text-green-500 hover:text-green-600">
                        Cadastre-se
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>