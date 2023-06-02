<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Página Principal</title>
</head>
<body>

    <?php 
        include("config.php");
        $livro = $_POST['nome_livro'] ?? "Livro Desconhecido";
        $autor = $_POST['nome_autor'] ?? "Autor Desconhecido";
        $editora = $_POST['nome_editora'] ?? "Editora Desconhecida";
        $data = date('d/m/Y')
    ?>

    <main>
        <h1>Cadastro de Livros</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="">Informe o nome do livro</label>
            <input type="text" name="nome_livro" id="nome_livro" size="40" placeholder="Informe o nome do livro" required>
            <label for="nome_autor">Informe o nome do autor</label>
            <input type="text" name="nome_autor" id="nome_autor" size="40" placeholder="Informe o nome do autor" required>
            <label for="nome_editora">Informe a editora</label>
            <input type="text" name="nome_editora" id="nome_editora" placeholder="Informe o nome da editora">
            <label for="data_cadastro">Data do Cadastro</label>
            <input type="text" name="data_cadastro" id="data_cadastro" value="<?=$data?>">
            <input type="submit" name="botao_cadastrar" value="Cadastrar">
        </form>
    </main>

    <main>
        <h1>Livros Cadastrados</h1>
        <?php 
            print "<p>O livro cadastrado foi:</p>";
            print "<ol><li>Nome do Livro: <strong>$livro</strong></li>";
            print "<li>Nome do Autor: <strong>$autor</strong></li>";
            print "<li>Nome da Editora: <strong>$editora</strong></li>";
            print "<li>Data do Cadastro: <strong>$data</strong></li>";
            if ($_GET['botao_cadastrar']) {

                $sql = mysqli_query($conexao, "INSERT INTO livros (nome_livro, nome_autor, nome_editora, data_cadastro) VALUES ('{$livro}', '{$autor}', '{$editora}', '{$data}')");

            }
            
            //$resultado = $conexao->query($sql);
        ?>
    </main>
</body>
</html>