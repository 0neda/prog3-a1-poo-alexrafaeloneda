<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registro de novo usuário">
    <meta name="author" content="Oneda">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Registro</title>
</head>

<body>
    <div class="flex flex-col h-screen bg-gray-100 justify-center items-center">
        <div class="bg-white shadow-sm p-8 rounded-lg">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Criar Conta</h2>

            <form action="doRegister.php" method="POST">
                <div class="form-group mt-2">
                    <label for="name" class="text-gray-500">Nome:</label>
                    <input type="text" name="name" required class="border border-gray-300 rounded-md p-2 w-full">
                </div>

                <div class="form-group mt-2">
                    <label for="email" class="text-gray-500">Email:</label>
                    <input type="email" name="email" required class="border border-gray-300 rounded-md p-2 w-full">
                </div>

                <div class="form-group mt-2">
                    <label for="password" class="text-gray-500">Senha:</label>
                    <input type="password" name="password" required
                        class="border border-gray-300 rounded-md p-2 w-full">
                </div>

                <button type="submit"
                    class="w-full text-white p-2 bg-green-400 hover:bg-green-500 hover:cursor-pointer rounded-lg my-4">
                    Cadastrar
                </button>
            </form>

            <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
            <?php endif; ?>

            <div class="mt-4">
                <p class="text-gray-500">Já possui uma conta?
                    <a href="index.php" class="text-green-500 hover:text-green-600">
                        Fazer login
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>