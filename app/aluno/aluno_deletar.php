<?php
 require_once __DIR__ . '/../../includes/db_connect.php';

$id = $_GET['id'];

// echo $id;


$sql = "call ps_desativar_aluno('$id')";
// echo $sql;

$conexao->query($sql);

header("Location: aluno.php");
exit;

?>