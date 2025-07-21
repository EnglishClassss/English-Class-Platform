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
    $sql = "select * from view_aula";
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
                        <th scope="col">Data</th>
                        <th scope="col">Conteudo</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Dia da Semana</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     while($linha = $result->fetch_assoc()){
                    ?>
                <tr>
                    <th scope="row"><?php echo $linha['Data_Aula']?></th>
                    <td><?php echo $linha['Conteudo_Aula']?></td>
                    <td><?php echo $linha['Professor']?></td>
                    <td><?php echo $linha['Aluno']?></td>
                    <td><?php echo $linha['Dia_Semana_Aula']?></td>
                    <td><?php echo $linha['Status_Aula']?></td>
                </tr>
                <?php } ?>  
            </tbody>
        </table>
       </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>