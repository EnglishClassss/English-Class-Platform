 <?php
    include '../header/header.php' ;
    require_once __DIR__ . '/../../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../menu/menu.css">
     <link rel="stylesheet" href="../../src/assets/css/tables.css">

    <title>Funcionários</title>
</head>
<body>


     <?php 
    $sql = "select * from FUNCIONARIO";
    $result = $conexao->query($sql);
    ?>
      <?php 
        include '../menu/menu.php'
    ?>
     <!-- Conteúdo específico da página -->
        <section class= "content">
            <table class="tables">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Função</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     while($linha = $result->fetch_assoc()){
                    ?>
                <tr>
                    <th scope="row"><?php echo $linha['Id_Funcionario']?></th>
                    <td><?php echo $linha['Nome_Funcionario']?></td>
                    <td><?php echo $linha['Email_Funcionario']?></td>
                    <td><?php echo $linha['Funcao_Funcionario']?></td>
                    <td>
                        <!-- <a class="btn btn-outline-warning text-decoration-none " href="editar.php?id=<?php echo $linha['Id_Funcionario']?>">Editar</a>
                        <a  class="btn btn-outline-danger text-decoration-none " href="excluir.php?id=<?php echo $linha['Id_Funcionario']?>">Excluir</a> -->
                        <a  class="btn btn-outline-info text-decoration-none " href="funcionario_ver.php?id=<?php echo $linha['Id_Funcionario']?>">Ver</a>
                    </td>
                </tr>
                <?php } ?>  
            </tbody>
        </table>
       </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>