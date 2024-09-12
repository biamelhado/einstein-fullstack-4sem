<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APIs dos usuários</title>
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
            position: relative;
        }

        .container {
            max-width: 500px;
            width: 100%;
            background: #f1c40f; /* Fundo amarelo */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
        }

        h1 {
            margin-bottom: 20px;
            color: #333; /* Cor escura para o título */
            font-size: 28px;
            font-weight: 700;
        }

        a {
            display: inline-block;
            margin: 15px 0;
            padding: 15px 20px;
            background-color: #333333; /* Cor do bloco */
            color: #f1c40f; /* Cor do texto */
            text-decoration: none;
            border-radius: 8px;
            font-size: 20px;
            font-weight: 600;
            transition: background-color 0.3s, transform 0.2s;
        }

        a:hover {
            background-color: #e67e22; /* Sombra ao passar o mouse */
            transform: translateY(-3px);
        }

        a:active {
            background-color: #d35400; /* Laranja escuro */
            transform: translateY(1px);
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
        <h1>APIs dos Usuários</h1>
        <a href="http://localhost/AlexP1Ex/ResultUser.php" target="_blank">Consultar usuário</a>
        <a href="http://localhost/AlexP1Ex/AddUser.php" target="_blank">Cadastrar usuário</a>
        <a href="http://localhost/AlexP1Ex/EditUser.php" target="_blank">Editar usuário</a>
        <a href="http://localhost/AlexP1Ex/DeleteUser.php" target="_blank">Deletar usuário</a>
        <img src="EinsteinLogo.jpeg" class="logo">
    </div>
</body>
</html>