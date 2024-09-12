<?php
include 'conexao.php';

$result = "";  // Inicialize a variável de resultado

// Verifique se o formulário foi enviado para buscar o usuário
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'buscar') {
    $id = $_POST['id'];

    // Valide se o ID é um número inteiro
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        // Verifique se a conexão foi estabelecida
        if ($conn) {
            // Prepare a consulta SQL para seleção
            $query = "SELECT * FROM pessoas WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                // Vincule o parâmetro e execute a consulta
                mysqli_stmt_bind_param($stmt, 'i', $id);
                $execute = mysqli_stmt_execute($stmt);
                $resultSet = mysqli_stmt_get_result($stmt);

                // Verifique se o usuário foi encontrado
                if ($row = mysqli_fetch_assoc($resultSet)) {
                    $user = $row;
                    // Redirecione para o formulário de edição com os dados
                    header("Location: EditUser.php?id=" . urlencode($user['id']) . "&nome=" . urlencode($user['nome']) . "&idade=" . urlencode($user['idade']));
                    exit;
                } else {
                    $result = "Usuário não encontrado.";
                }

                // Feche a declaração
                mysqli_stmt_close($stmt);
            } else {
                $result = "Erro na preparação da consulta SQL: " . mysqli_error($conn);
            }
        } else {
            $result = "Erro na conexão com o banco de dados.";
        }
    } else {
        $result = "ID inválido. Por favor, insira um número inteiro.";
    }
    // Redirecione de volta com a mensagem de erro
    header("Location: EditUser.php?msg=" . urlencode($result));
    exit;
}

// Verifique se o formulário foi enviado para atualizar o usuário
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'atualizar') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    // Valide os dados recebidos
    if (filter_var($id, FILTER_VALIDATE_INT) && !empty($nome) && filter_var($idade, FILTER_VALIDATE_INT)) {
        // Verifique se a conexão foi estabelecida
        if ($conn) {
            // Prepare a consulta SQL para atualização
            $query = "UPDATE pessoas SET nome = ?, idade = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                // Vincule os parâmetros e execute a consulta
                mysqli_stmt_bind_param($stmt, 'sii', $nome, $idade, $id);
                $execute = mysqli_stmt_execute($stmt);

                // Verifique se a atualização foi bem-sucedida
                if ($execute) {
                    $result = "Usuário atualizado com sucesso.";
                } else {
                    $result = "Erro na atualização do usuário: " . mysqli_error($conn);
                }

                // Feche a declaração
                mysqli_stmt_close($stmt);
            } else {
                $result = "Erro na preparação da consulta SQL: " . mysqli_error($conn);
            }
        } else {
            $result = "Erro na conexão com o banco de dados.";
        }
    } else {
        $result = "Dados inválidos. Por favor, insira valores válidos.";
    }
    // Redirecione de volta para o formulário com a mensagem de resultado
    header("Location: EditUser.php?id=" . urlencode($id) . "&nome=" . urlencode($nome) . "&idade=" . urlencode($idade) . "&msg=" . urlencode($result));
    exit;
} else {
    // Caso o acesso ao arquivo seja direto, redirecione para o formulário de busca
    header("Location: EditUser.php");
    exit;
}