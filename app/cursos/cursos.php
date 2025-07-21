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
    <title>Cursos</title>
</head>
<body>
      <?php 
    $sql = "select n.Nome_Nivel, m.Nome_Modulo, count(a.aluno_id) as Total_Aluno from MODULO m 
        left join AULA a on a.Modulo_Id = m.Id_Modulo
        left join NIVEL n on n.Id_Nivel = m.Nivel_Id
        group by n.Nome_Nivel, m.Nome_Modulo order by n.Nome_Nivel;";
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
                       
                        <th scope="col">Nivel</th>
                        <th scope="col">Modulo</th>
                        <th scope="col">Total de Alunos</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     while($linha = $result->fetch_assoc()){
                    ?>
                <tr>
                   
                    <td><?php echo $linha['Nome_Nivel']?></td>
                    <td><?php echo $linha['Nome_Modulo']?></td>
                     <td><?php echo $linha['Total_Aluno']?></td>
                   
                </tr>
                <?php } ?>  
            </tbody>
        </table>
       </section>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>