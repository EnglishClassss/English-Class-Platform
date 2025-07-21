 <?php
    include '../header/header.php' ;
    require_once __DIR__ . '/../../includes/db_connect.php';


$id = $_GET['id'];

$pagina_anterior = $_SERVER['HTTP_REFERER'] ?? 'aluno.php';


$sql = "select F.Nome_Funcionario, S.* from SALARIO S
inner join FUNCIONARIO F on S.Funcionario_Id = F.Id_Funcionario
where Funcionario_Id = $id";

$resultado = $conexao->query($sql);

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
                        <th scope="col">Nome</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Data de Pagamento</th>
                        <th scope="col">Status</th>
                        <th scope="col">Forma de Pagamento</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($linha = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $linha['Nome_Funcionario'] ?></td>
                    <td><?php echo $linha['Valor_Salario'] ?></td>
                    <td><?php echo $linha['Data_Salario'] ?></td>
                    <td><?php echo $linha['Status_Pagamento_Salario'] ?></td>
                    <td><?php echo $linha['Forma_Pagamento_Salario'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php }else{
            echo '<div class="alert alert-warning mt-4">Funcionário não tem registro de pagamento</div>';
        } ?>

        <a href="<?=$pagina_anterior ?>"
        class="btn btn-secondary btn-sm m-5">Voltar</a>  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>