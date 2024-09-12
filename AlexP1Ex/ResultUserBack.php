<?php
include 'conexao.php';

// Inicializa a variável resultado
$result = "";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    // Verifica se o nome não está vazio
    if (!empty($nome)) {
        // Verifica se a conexão foi estabelecida
        if ($conn) {
            // Prepara a consulta do SQL para buscar usuários pelo nome
            $query = "SELECT id, nome, idade FROM pessoas WHERE nome LIKE ?";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                $nomeBusca = "%" . $nome . "%"; // Permite pesquisa parcial
                // Vincula o parâmetro e executa a consulta
                mysqli_stmt_bind_param($stmt, 's', $nomeBusca);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $nome, $idade);

                // Monta uma lista de resultados
                $result = "<h3>Usuários encontrados:</h3><ul>";
                while (mysqli_stmt_fetch($stmt)) {
                    $result .= "<li><strong>Nome:</strong> $nome - <strong>Idade:</strong> $idade 
                                <form action='ResultUsers.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='id' value='$id'>
                                    <button type='submit'>Excluir</button>
                                </form></li>";
                }
                $result .= "</ul>";

                // Verifica se nenhum usuário foi encontrado
                if (empty($result)) {
                    $result = "<p>Nenhum usuário encontrado.</p>";
                }

                mysqli_stmt_close($stmt);
            } else {
                $result = "<p>Erro na preparação da consulta SQL: " . mysqli_error($conn) . "</p>";
            }
        } else {
            $result = "<p>Erro na conexão com o banco de dados.</p>";
        }
    } else {
        $result = "<p>Nome inválido. Por favor, verifique novamente o nome do usuário.</p>";
    }

    // Exibe o resultado diretamente na página atual
    echo $result;
    exit;
} else {
    // Se o acesso for direto, redireciona para o formulário
    header("Location: ResultUser.php");
    exit;
}
?>