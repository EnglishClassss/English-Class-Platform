<?php
 include '../header/header.php' ;
    require_once __DIR__ . '/../../includes/db_connect.php';
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
    <form  id="form_cadastro" action="aluno_inserir.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required >           
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>           
        </div>

          <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>           
        </div>

        <div class="mb-3">
            <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
            <select  class="form-control" id="forma_pagamento" name="forma_pagamento" required> 
                <option value="">Selecione...</option>
                <option value="Pix">Pix</option>
                <option value="Cartão de Crédito">Cartão de Crédito</option>
                <option value="Cartão de Débito">Cartão de Débito</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Boleto">Boleto</option>
                <option value="Transferência">Transferência</option>
            </select>           
        </div>
        
          <div class="mb-3">
            <label for="status_pagamento" class="form-label">Status de Pagamento</label>
            <select  class="form-control" id="status_pagamento" name="status_pagamento" required>
                <option value="">Selecione...</option>
                <option value="Pago">Pago</option>
                <option value="Pendente">Pendente</option>
            </select>           
        </div>
        <input type="submit" class="btn btn-success" value="Cadastrar">
    </form>

     <script>
        // Quando o formulário for enviado
        document.getElementById('form_cadastro').addEventListener('submit', function(event) {
        const status = document.getElementById('status_pagamento').value;

        if (status === "Pendente") {
            // Mostra alerta
            alert("Pagamento pendente! Por favor, regularize antes de continuar.");
            // Bloqueia o envio do formulário
            event.preventDefault();
        }
        });
    </script>
    <a href="aluno.php"class="btn btn-secondary btn-sm my-4">Voltar</a>
        

   </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>