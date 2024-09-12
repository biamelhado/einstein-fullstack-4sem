<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar usuário</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #000000; /* Fundo preto */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #f4f4f4; /* Cor do texto */
        }

        .container {
            max-width: 400px;
            width: 100%;
            background: #f1c40f; /* Amarelo */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
        }

        .logo {
            position: absolute;
        top: 10px;
        right: 10px;
        width: 60px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333; /* Título escuro */
            font-size: 28px;
            font-weight: 700;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
            color: #333; /* Texto escuro */
        }

        input {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 12px;
            background-color: #000000;
            color: yellow;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c82333; /* Vermelho escuro */
        }


        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button-container a {
            display: center;
            padding: 10px 20px;
            background-color: #000000; /* Botão de saída preto */
            color: #f1c40f; /* Texto amarelo */
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button-container a:hover {
            background-color: #333333; /* Escurece o botão de saída no hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="EinsteinLogo.jpeg" alt="Logo da Faculdade" class="logo">
        <h1>Cadastrar usuário</h1>
        <form method="POST" action="AddUserBack.php">
            <label for="id">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="id">Idade:</label>
            <input type="number" id="idade" name="idade" required>
            <button type="submit">Salvar</button>
        </form>
        <div id="result">
            <?php
            // Verifique se há uma mensagem passada via GET para exibir o resultado
            if (isset($_GET['msg'])) {
                echo '<p>' . htmlspecialchars($_GET['msg']) . '</p>';
            }
            ?>
        </div>
        <div class="button-container">
        <a href="index.php">Sair</a>
    </div>
    </div>
    
</body>
</html>
