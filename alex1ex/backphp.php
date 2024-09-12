<?php
//Cabeçalho informando que é JSON
header('Content-Type: application/json');

//Restringindo a API a somente acesso POST
if($_SERVER['REQUEST_METHOD']=='POST'){

//Insere o token da API
$apitoken=$_POST['apitoken'];
if($apitoken=='token123')
{
//Conexão com o banco
require_once('conexao.php');

//Consulta
$query='SELECT id, nome, idade FROM pessoas';

//Prepara a consulta ao banco
$stmt = mysqli_prepare($conn, $query);

//Executa e armazena a query na memoria
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

//Associa os campos da query com as variáveis do back
mysqli_stmt_bind_result($stmt, $id, $nome, $idade);

//Exibe os dados das variáveis do banco (TESTE)
//var_dump($stmt);

//Cria uma array para carregar os dados da tabela
$response = array();

//Carrega os dados em um array
if(mysqli_stmt_num_rows($stmt)>0){

//Checa se existe registros na tabela
    while (mysqli_stmt_fetch($stmt)){

//Associa as variáveis aos comandos
    array_push($response, array("id"=>$id, "nome"=>$nome, "idade"=>$idade));
    }
}

//Envia o array para a tela em formato json
echo json_encode($response);
}
//Valida se o token está correto ou vazio
else{
    $response['auth_token']=false;
    echo json_encode($response);
}
}
?>
