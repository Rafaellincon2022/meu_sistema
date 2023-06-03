<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="funcoes.js"></script>
    <title>Cadastro de Livros</title>
</head>
<body>

    <main>
        <h1>Livros Cadastrados</h1>
        <?php 
            print "<p>O livro cadastrado foi:</p>";
            print "<ol><li>Nome do Livro: <strong>$livro</strong></li>";
            print "<li>Nome do Autor: <strong>$autor</strong></li>";
            print "<li>Nome da Editora: <strong>$editora</strong></li>";
            print "<li>Data do Cadastro: <strong>$data</strong></li>";
        ?>
        <button javascript:window.history(-1)>Voltar</button>
    </main>
</body>
</html>