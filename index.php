<?php 
require_once 'includes/db_connect.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="src/assets/image/img_english_class.png" />
     <!-- Bootstrap CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/assets/css/style.css?v=<?php echo time(); ?>">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>English Class</title>
</head>
<body>
     <header class="header">
         <div class="header_title">
                <span>English </span>
                <span> Class</span> 
          
         <div class="header_icons">
              <img src="src/assets/image/icons8-pesquisar-50-removebg-preview.png" alt="" width=30px>
              <img src="src/assets/image/icons8-sino-96-removebg-preview.png" alt="" width=30px>
              <img src="src/assets/image/image_perfil.jpg" alt="">
        </div>
        </div>
    </header>

  <?php 
    $sql = "select count(*) as Total_Aulas from AULA;";
    $result = $conexao->query($sql);

    $sql0 = "select count(*) as Total_Professores from FUNCIONARIO where Funcao_Funcionario = 'Professor de Inglês';";
    $result0= $conexao->query($sql0);

    $sql1 = "select count(*) as Total_Alunos from ALUNO where Status_Aluno = 1;";
    $result1 = $conexao->query($sql1);
    ?>
    
    
     <div class="containers">
        <div class="sidebar">
            <ul class="menu">
                <li><img src="src/assets/image/icons8-casa-48-removebg-preview.png" alt=""><a href="index.php">Início</a></li>
                <li><img src="src/assets/image/icons8-aula-48.png" alt=""><a href="app/aulas/aulas.php">Aulas</a></li>
                <li><img src="src/assets/image/icons8-curso-50.png" alt=""><a href="app/cursos/cursos.php">Cursos</a></li>
                <li><img src="src/assets/image/icons8-casal-homem-mulher-48.png" alt=""><a href="app/funcionarios/funcionarios.php">Funcionários</a></li>
                <li><img src="src/assets/image/icons8-mulher-estudante-48-removebg-preview.png" alt=""><a href="app/aluno/aluno.php">Alunos</a></li>
                <li><img src="src/assets/image/icons8-crescimento-económico-64.png" alt=""><a href="app/lucros/lucros.php">Lucros</a></li>
                <li><img src="src/assets/image/icons8-despesas-50.png" alt=""><a href="app/despesas/despesas.php">Despesas</a></li>
            </ul>
        </div>
    
        <section class="content">
            <section class="container-index h-40">
                <div class="w-50">
                    <h1 class="ms-5 mt-5">English</h1>
                    <h1 class= "ms-5">Class</h1>
                    <p class= "ms-5 mt-5">Plataforma web para gerenciamento de aulas individuais de inglês, com foco em desempenho, avaliações e organização</p>
                </div>
                <div class="w-50">
                    <img src="src/assets/image/Ellipse 5.png" alt="" width=100% height=100%>
                </div>
            </section>
            <section class="container-index-cards">
                <div class="card w-25" >
                    <img src="src/assets/image/icons8-agenda-64 1.png" alt="" width=50px height=50px class=mt-2>
                    <p>Aulas Agendadas</p>
                    <?php 
                        if($result){
                        $row = $result->fetch_assoc();
                    ?>
                    <p class="text-white"><?php echo $row['Total_Aulas']?></p>
                     <?php } ?>
                </div>
                <div class="card w-25 " >
                    <img src="src/assets/image/icons8-professor-50 1.png" alt="" width=50px height=50px class=mt-2>
                    <p>Professores Ativos</p>
                     <?php 
                        if($result0){
                        $row0 = $result0->fetch_assoc();
                    ?>
                    <p class="text-white"><?php echo $row0['Total_Professores']?></p>
                     <?php } ?>
                </div>
                <div class="card w-25" >
                    <img src="src/assets/image/icons8-user-groups-64 2.png" alt="" width=60px height=60px class=mt-2>
                    <p>Alunos</p>
                     <?php 
                        if($result1){
                        $row1 = $result1->fetch_assoc();
                    ?>
                    <p class="text-white"><?php echo $row1['Total_Alunos']?></p>
                     <?php } ?>
                </div>

            </section>
        </section>
       
    </div> 


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>