<?php
 require_once __DIR__ . '/../../includes/db_connect.php';


$avaliacao = $_POST['avaliacao'];
$nota = $_POST['nota'];
$nivel = $_POST['nivel'];
$aluno = $_POST['aluno'];

$sql = "insert into AVALIACAO (Tipo_Avaliacao, Nota_Avaliacao, Nivel_Id, Aluno_Id) values('$avaliacao', '$nota', '$nivel', '$aluno')";

$conexao->query($sql);


header('Location: ../../app/aluno/aluno.php' );
?>