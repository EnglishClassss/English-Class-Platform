<?php
 require_once __DIR__ . '/../../includes/db_connect.php';
 
$id = $_POST['id'];

if($_POST){
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "update ALUNO set 

            Nome_Aluno = '$nome',
            Email_Aluno = '$email'
            where Id_Aluno = $id;";
// echo $sql;
    $conexao->query($sql);
    header("Location:aluno.php");
    exit;
}


?>