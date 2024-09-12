<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','db_banquinho');

$conn = mysqli_connect(HOST, USER, PASS, DB) or die ('Erro de conexão');

?>