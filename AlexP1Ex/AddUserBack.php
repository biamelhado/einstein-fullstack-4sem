<?php
    include 'conexao.php';

    // Verifique se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];

        // Valide se o nome não está vazio e a idade é um número inteiro
        if (!empty($nome) && filter_var($idade, FILTER_VALIDATE_INT)) {
            // Verifique se a conexão foi estabelecida
            if ($conn) {
                // Prepare a consulta SQL para inserção, sem incluir o ID
                $query = "INSERT INTO `pessoas` (`nome`, `idade`) VALUES (?, ?)";
                $stmt = mysqli_prepare($conn, $query);

                if ($stmt) {
                    // Vincule os parâmetros e execute a consulta
                    mysqli_stmt_bind_param($stmt, 'si', $nome, $idade);
                    $execute = mysqli_stmt_execute($stmt);

                    // Verifique se a inserção foi bem-sucedida
                    if ($execute && mysqli_stmt_affected_rows($stmt) > 0) {
                        $msg = "Usuário cadastrado com sucesso.";
                    } else {
                        $msg = "Erro ao tentar cadastrar usuário.";
                    }

                    // Feche a declaração
                    mysqli_stmt_close($stmt);
                } else {
                    $msg = "Erro na preparação da consulta SQL: " . mysqli_error($conn);
                }
            } else {
                $msg = "Erro na conexão com o banco de dados.";
            }
        } else {
            $msg = "Dados inválidos. Verifique os campos.";
        }

        // Redirecione de volta para o formulário com a mensagem
        header("Location: AddUser.php?msg=" . urlencode($msg));
        exit;
    } else {
        // Caso o acesso ao arquivo seja direto, redirecione de volta
        header("Location: AddUser.php");
        exit;
    }
?>