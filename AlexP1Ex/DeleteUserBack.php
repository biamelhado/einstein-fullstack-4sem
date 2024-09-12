<?php
    include 'conexao.php';

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
                        $msg = "Usuário excluído com sucesso.";
                    } elseif ($execute && mysqli_stmt_affected_rows($stmt) == 0) {
                        $msg = "Usuário não encontrado.";
                    } else {
                        $msg = "Erro ao tentar excluir o usuário.";
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
            $msg = "ID inválido. Por favor, insira um número inteiro.";
        }

        // Redirecione de volta para o formulário com a mensagem
        header("Location: DeleteUser.php?msg=" . urlencode($msg));
        exit;
    } else {
        // Caso o acesso ao arquivo seja direto, redirecione de volta
        header("Location: DeleteUser.php");
        exit;
    }
?>