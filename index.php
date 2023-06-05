<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="funcoes.js"></script>
    <title>Página Principal</title>
</head>
<body>

    <?php 

        $livro = $_GET['nome_livro'] ?? '';
        $autor = $_GET['nome_autor'] ?? '';
        $editora = $_GET['nome_editora'] ?? '';
        $data = date('Y-m-d'); //date('d/m/Y')
    ?>

    <main>
        <h1>Cadastro de Livros</h1>
        <form action="cadastro.php" method="get">
            <label for="">Informe o nome do livro</label>
            <input type="text" name="nome_livro" id="nome_livro" size="40" placeholder="Informe o nome do livro" required>
            <label for="nome_autor">Informe o nome do autor</label>
            <input type="text" name="nome_autor" id="nome_autor" size="40" placeholder="Informe o nome do autor" required>
            <label for="nome_editora">Informe a editora</label>
            <input type="text" name="nome_editora" id="nome_editora" placeholder="Informe o nome da editora" required>
            <label for="data_cadastro">Data do Cadastro</label>
            <input type="text" name="data_cadastro" id="data_cadastro" value="<?=$data?>">
            <input type="submit" name="botao_cadastrar" value="Cadastrar">
        </form>
    </main>

    <?php 
        
        if (isset($_GET['botao_cadastrar'])) {
            $sql = "INSERT INTO livros (nome_livro, nome_autor, nome_editora, data_cadastro) VALUES (?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssss", $livro, $autor, $editora, $data);
            $stmt->execute();
            $stmt->close();
        }
        

        /*
        if ($_GET['botao_cadastrar']) {

            $sql = mysqli_query($conexao, "INSERT INTO livros (nome_livro, nome_autor, nome_editora, data_cadastro) VALUES ('{$livro}', '{$autor}', '{$editora}', '{$data}')");

        } else {
            print "Não consegui";
        }
        */
        
        //$resultado = $conexao->query($sql);
    ?>
</body>
</html>