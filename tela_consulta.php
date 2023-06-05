<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Consulta de Livros</title>
</head>
<body>
    <?php 
        include("config.php");
        $consultar_livro = $_GET['consultar_livro'] ?? '';
        $consultar_autor = $_GET['consultar_autor'] ?? '';
        $consultar_editora = $_GET['consultar_editora'] ?? '';
    ?>

    <main>
        <form action="resultado_pesquisa.php" method="get">
            <h1>Consulta de Livros</h1>
            <label for="consulta_livro">Pesquisar Livro</label>
            <input type="text" name="consultar_livro" id="consulta_livro">
            <label for="consulta_livro">Pesquisar Autor</label>
            <input type="text" name="consultar_autor" id="consulta_autor">
            <label for="consulta_livro">Pesquisar Editora</label>
            <input type="text" name="consultar_editora" id="consulta_editora">
            <input type="submit" name="botao_pesquisar" value="Pesquisar">
        </form>
        <button onclick="window.location.href = 'index.php'">Retornar à página inicial</button>
    </main>

</body>
</html>