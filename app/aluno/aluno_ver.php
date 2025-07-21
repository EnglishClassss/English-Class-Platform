<?php
    include '../header/header.php' ;
    require_once __DIR__ . '/../../includes/db_connect.php';


$id = $_GET['id'];

$sql = "select * from ALUNO where Id_Aluno = $id";
$resultado = $conexao->query($sql);

$pessoa = $resultado->fetch_assoc();

?>

<!doctype html>
<html lang="pt-BR">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Detalhes Aluno</title>
  </head>
  <body>

      <?php 
        include '../menu/menu.php'
    ?>
    <div class="container">
        <?php if($pessoa){ ?>
        <ul class="list-group mt-4">
            <li class="list-group-item">
                Nome: 
                <?php echo $pessoa['Nome_Aluno']; ?> 
            </li>
            <li class="list-group-item">
                Email: 
                <?php echo $pessoa['Email_Aluno']; ?> 
            </li>
            <!-- <li class="list-group-item">                
                Telefone: 
                <?php echo $pessoa['Telefone_Pessoa']; ?> 
            </li>
            <li class="list-group-item">
                Descrição: 
                <?php echo $pessoa['Descricao_Pessoa']; ?> 
            </li> -->
        </ul>

        <?php }else{
            echo '<div class="alert alert-warning mt-4">Contato não encontrado.</div>';
        } ?>

        <a href="aluno.php"
        class="btn btn-secondary btn-sm my-4"
        >
        Voltar</a>  
         <a class="btn btn-success btn-sm my-4" href="notas.php?id=<?php echo $pessoa['Id_Aluno']?>">Notas</a>  
    </div>


 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>