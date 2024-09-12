<?php

//Conexão do banco
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','dbpessoas');

$conn = new mysqli(HOST, USER, PASS, DB) or die ('Erro de conexão');
?>

