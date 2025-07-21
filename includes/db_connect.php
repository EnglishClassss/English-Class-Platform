<?php

 $host = "localhost";
 $user = "root";
 $password = "root";
 $db = "english_class";

 $conexao = new mysqli($host, $user, $password, $db);

 if($conexao->connect_error){
    die("Erro na conexão" . $conexao->connect_error);
 }

?>