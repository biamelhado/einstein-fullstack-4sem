<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de usuários</title>
    <style>
        /* Seu CSS já está bem estruturado */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #000000;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            width: 100%;
            background: #f1c40f;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
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
            color: #333;
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
            color: #f1c40f;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #333333;
        }
        #result {
            margin-top: 20px;
            background-color: #ffffff;
            color: #333333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            text-align: left;
            line-height: 1.5;
            font-size: 16px;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000000;
            color: #f1c40f;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .button-container a:hover {
            background-color: #333333;
        }
        .logo {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 60px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="EinsteinLogo.jpeg" class="logo">
        <h1>Consulta de usuários</h1>
        <form method="POST" action="">
            <label for="nome">Digite o nome do usuário:</label>
            <input type="text" id="nome" name="nome" required>
            <button type="submit">Consultar</button>
        </form>

        <div id="result">
            <?php
            // Exibe o resultado da pesquisa
            if (!empty($result)) {
                echo $result;
            }
            ?>
        </div>

        <div class="button-container">
            <a href="index.php">Sair</a>
        </div>
    </div>
</body>
</html>
