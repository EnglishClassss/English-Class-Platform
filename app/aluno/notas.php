 <?php
    include '../header/header.php' ;
    require_once __DIR__ . '/../../includes/db_connect.php';
    require_once __DIR__ . '../controllers/NotasController.php';


$id = $_GET['id'];

$pagina_anterior = $_SERVER['HTTP_REFERER'] ?? 'aluno.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['calcular_media'])) {
    $notasController = new NotasController($conexao);
    $executado = $notasController->mediaAluno((int)$id);
}


$sql = "SELECT an.Aluno_Id, a.Nome_Aluno, a.Email_Aluno, 
               an.Nota_Audicao, an.Nota_Leitura, an.Nota_Fala, 
               an.Nota_Escrita, format(an.Nota_Media_Aluno, 2) as Nota_Media_Aluno, n.Nome_Nivel
        FROM ALUNO_NOTA an 
        LEFT JOIN ALUNO a ON an.Aluno_id = a.Id_Aluno
        left join AVALIACAO av on an.Aluno_Id = av.Aluno_Id
        left join NIVEL n on av.Nivel_Id = n.Id_Nivel  
        WHERE a.Id_Aluno = $id";
$resultado = $conexao->query($sql);

$linha = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../aluno/aluno.css">
    <link rel="stylesheet" href="../menu/menu.css">
     <link rel="stylesheet" href="../../src/assets/css/tables.css">

    <title>Alunos</title>
</head>
<body>
    <?php 
        include '../menu/menu.php'
    ?>

      <div class="content">
        <?php if($resultado && $resultado-> num_rows > 0){ ?>
              <table class="tables">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Nome</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Nota_Audicao</th>
                        <th scope="col">Nota_Leitura</th>
                        <th scope="col">Nota_Fala</th>
                        <th scope="col">Nota_Escrita</th>
                        <th scope="col">Media</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <!-- <th scope="row"><?php echo $linha['Aluno_Id']?></th> -->
                    <td><?php echo $linha['Nome_Aluno'] ?></td>
                    <td><?php echo $linha['Nome_Nivel'] ?></td>
                    <td><?php echo $linha['Nota_Audicao'] ?? 'Em aberto';?></td>
                    <td><?php echo $linha['Nota_Leitura'] ?? 'Em aberto';?></td>
                    <td><?php echo $linha['Nota_Fala'] ?? 'Em aberto';?></td>
                    <td><?php echo $linha['Nota_Escrita'] ?? 'Em aberto';?></td>
                    <td><?php echo $linha['Nota_Media_Aluno']?></td>
                </tr>
            </tbody>
        </table>
          <form method="post">
            <div class="d-md-flex justify-content-md-end ">
                    <button type="submit" name="calcular_media" class="btn btn-outline-success mt-2 me-2">Calcular Média</button>
            </div>
           <div class="d-md-flex justify-content-md-end">
                <a class="btn btn-outline-warning btn-sm mt-2 me-2" href="formulario_inserir_avaliacao.php?id=<?php echo $linha['Aluno_Id']?>"> Inserir Avaliacao </a>
            </div>
            
        <?php }else{
            echo '<div class="alert alert-warning mt-4">Aluno não possui notas cadastradas.</div>';
        } ?>

        <a href="<?=$pagina_anterior ?>"
        class="btn btn-secondary btn-sm m-5">Voltar</a>  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>