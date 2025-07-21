<?php
 include '../header/header.php' ;
    require_once __DIR__ . '/../../includes/db_connect.php';

$id = $_GET['id'];

$pagina_anterior = $_SERVER['HTTP_REFERER'] ?? 'aluno.php';

$sql = "SELECT an.Aluno_Id, a.Nome_Aluno, a.Email_Aluno, 
               an.Nota_Audicao, an.Nota_Leitura, an.Nota_Fala, 
               an.Nota_Escrita, an.Nota_Media_Aluno, n.Id_Nivel
        FROM ALUNO_NOTA an 
        LEFT JOIN ALUNO a ON an.Aluno_id = a.Id_Aluno
        left join AVALIACAO av on an.Aluno_Id = av.Aluno_Id
        left join NIVEL n on av.Nivel_Id = n.Id_Nivel  
        WHERE a.Id_Aluno = $id";
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

    <title>Inserir Avaliacao</title>
  </head>
  <body>
     <?php 
        include '../menu/menu.php'
    ?>
   
   <div class="container">
    <form action="avaliacao_inserir.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="avaliacao" class="form-label">Avaliação</label>
            <input type="text" class="form-control" id="avaliacao" name="avaliacao">           
        </div>

        <div class="mb-3">
            <label for="nota" class="form-label">Nota</label>
            <input type="number" step="0.01" class="form-control" id="nota" name="nota">           
        </div>

        
        <div class="mb-3">
            <label for="nivel" class="form-label">Nivel</label>
            <input type="number" class="form-control" id="nivel" name="nivel" value="<?php echo $pessoa['Id_Nivel'];?>">           
        </div>

        <div class="mb-3">
            <label for="aluno" class="form-label">Aluno</label>
            <input type="number" name="aluno" id="aluno" class="form-control" value="<?php echo $pessoa['Aluno_Id'];?>"></input>       
        </div>

        
        <input type="hidden" name="id" value="<?= $pessoa['Aluno_Id'] ?>">
        <input type="submit" class="btn btn-success" value="Cadastrar">
    </form>
    <a href="<?=$pagina_anterior ?>"
        class="btn btn-secondary btn-sm my-4"
        >
        Voltar</a>
        

   </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>