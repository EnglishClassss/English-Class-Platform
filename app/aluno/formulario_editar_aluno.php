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

  </head>
  <body>
     <?php 
        include '../menu/menu.php'
    ?>
   
   <div class="container">
    <form action="aluno_editar.php" method="POST" class="mt-4">

        <input type="hidden" value="<?= $pessoa['Id_Aluno']?>" name="id">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $pessoa['Nome_Aluno'];?>" >           
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required value="<?php echo $pessoa['Email_Aluno'];?>">           
        </div>

      
        <a href="aluno.php"class="btn btn-secondary btn-sm my-4">Voltar</a>
          <input type="submit" class="btn btn-success" value="Editar">
    </form>
   </div>
   
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>