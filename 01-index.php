<?php 
    include('08-protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela Inicial</title>
</head>
<body>
    <section>
        <h1 style="text-align: center; font-size: 50px">Biblioteca RaDi</h1>
        <h2>Bem-vindo ao sistema de cadastro de livros!</h2>
        <div class="welcome-buttons">
            <button onclick="window.location.href='02-tela_cadastro.php'">Cadastrar Novo Livro</button>
            <button onclick="window.location.href='03-tela_consulta.php'">Consultar Livros</button>
            <button onclick="window.location.href='09-atualizar.php'">Atualizar Livro</button>
         </div>
        <a href="07-logout.php">Sair</a>
    </section>

</body>
</html>