<?php
 require_once __DIR__ . '/../../includes/db_connect.php';


$nome = $_POST['nome'];
$email = $_POST['email'];
$valor = $_POST['valor'];
$forma_pagamento = $_POST['forma_pagamento'];
$status_pagamento = $_POST['status_pagamento'];


$sql = "call ps_cadastrar_aluno_com_pagamento('$nome', '$email', '$valor', '$forma_pagamento', '$status_pagamento')";

$conexao->query($sql);


header('Location: aluno.php' );
?>