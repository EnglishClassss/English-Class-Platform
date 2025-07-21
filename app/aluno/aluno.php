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

    <title>Alunos</title>
</head>
<body>


     <?php 
    $sql = "select * from ALUNO where Status_Aluno = 1";
    $result = $conexao->query($sql);
    ?>
      <?php 
        include '../menu/menu.php'
    ?>
     <!-- Conteúdo específico da página -->
        <section class= "content">
            <div class="d-md-flex justify-content-md-end">
                <a href="formulario_inserir_aluno.php"class="btn btn-outline-success btn-sm mt-2 me-2">Inserir Aluno</a>
            </div>
         
            <table class="tables">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     while($linha = $result->fetch_assoc()){
                    ?>
                <tr>
                    <th scope="row"><?php echo $linha['Id_Aluno']?></th>
                    <td><?php echo $linha['Nome_Aluno']?></td>
                    <td><?php echo $linha['Email_Aluno']?></td>
                    <td>
                        <a class="btn btn-outline-warning text-decoration-none" href="formulario_editar_aluno.php?id=<?php echo $linha['Id_Aluno'];?>">Editar</a>
                        <a class="btn btn-outline-danger text-decoration-none" href="aluno_deletar.php?id=<?php echo $linha['Id_Aluno']?>" onclick="return confirm('Tem certeza que deseja deletar?') ">Excluir</a>
                        <a class="btn btn-outline-info text-decoration-none" href="aluno_ver.php?id=<?php echo $linha['Id_Aluno']?>">Ver</a>
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