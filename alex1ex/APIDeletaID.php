<?php
    include 'conexao.php';
    
    $result = "";  // Inicialize a variável de resultado

    // Verifique se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        // Valide se o ID é um número inteiro
        if (filter_var($id, FILTER_VALIDATE_INT)) {
            // Verifique se a conexão foi estabelecida
            if ($conn) {
                // Prepare a consulta SQL para exclusão
                $query = "DELETE FROM pessoas WHERE id = ?";
                $stmt = mysqli_prepare($conn, $query);

                if ($stmt) {
                    // Vincule o parâmetro e execute a consulta
                    mysqli_stmt_bind_param($stmt, 'i', $id);
                    $execute = mysqli_stmt_execute($stmt);

                    // Verifique se a exclusão foi bem-sucedida
                    if ($execute && mysqli_stmt_affected_rows($stmt) > 0) {
                        $result = "<p>Usuário excluído com sucesso.</p>";
                    } elseif ($execute && mysqli_stmt_affected_rows($stmt) == 0) {
                        $result = "<p>Usuário não encontrado.</p>";
                    } else {
                        $result = "<p>Erro ao tentar excluir o usuário.</p>";
                    }

                    // Feche a declaração
                    mysqli_stmt_close($stmt);
                } else {
                    $result = "<p>Erro na preparação da consulta SQL: " . mysqli_error($conn) . "</p>";
                }
            } else {
                $result = "<p>Erro na conexão com o banco de dados.</p>";
            }
        } else {
            $result = "<p>ID inválido. Por favor, insira um número inteiro.</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333;
        }

        #result {
            margin-top: 20px;
        }
        
        .button-container {
        margin-top: 20px;
        text-align: center;
        }

        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .button-container a:hover {
            background-color: #333333;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Excluir Usuário</h1>
        <form method="POST">
            <label for="id">Digite o ID do usuário para excluir:</label>
            <input type="text" id="id" name="id" required>
            <button type="submit">Excluir usuário</button>
        </form>
        <div id="result">
            <?php echo $result; ?>
        </div>
    </div>
    <div class="button-container">
    <a href="index.php">Sair</a>
</div>
</body>
</html>