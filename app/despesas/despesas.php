<?php
    include '../header/header.php' ;
    require_once __DIR__ . '/../../includes/db_connect.php';

$sql = "select sum(Valor_Salario) as Total_Despesas from SALARIO where Status_Pagamento_Salario = 'Pago'";

$resultado = $conexao->query($sql);


?>

<!doctype html>
<html lang="pt-BR">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="../menu/menu.css">
     <link rel="stylesheet" href="../../src/assets/css/tables.css">
    <title>Detalhes Aluno</title>
  </head>
  <body>

      <?php 
        include '../menu/menu.php'
    ?>
    <section class= "content">
            <table class="tables">
                <thead>
                    <tr>
                        <th scope="col">Total de Despesas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     while($linha = $resultado->fetch_assoc()){
                    ?>
                <tr>

                    <td><?php echo $linha['Total_Despesas']?></td>
                </tr>
                <?php } ?>  
            </tbody>
        </table>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>