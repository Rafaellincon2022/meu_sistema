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
            include("config.php");
            $livro = $_GET['nome_livro'] ?? '';
            $autor = $_GET['nome_autor'] ?? '';
            $editora = $_GET['nome_editora'] ?? '';
            $data = date('Y-m-d'); //date('d/m/Y')

            print "<p>O livro cadastrado foi:</p>";
            print "<ol><li>Nome do Livro: <strong>$livro</strong></li>";
            print "<li>Nome do Autor: <strong>$autor</strong></li>";
            print "<li>Nome da Editora: <strong>$editora</strong></li>";
            print "<li>Data do Cadastro: <strong>$data</strong></li>";

            if (isset($_GET['botao_cadastrar'])) {
                $sql = "INSERT INTO livros (nome_livro, nome_autor, nome_editora, data_cadastro) VALUES (?, ?, ?, ?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bind_param("ssss", $livro, $autor, $editora, $data);
                $stmt->execute();
                $stmt->close();
            }
        ?>
        <button onclick="window.history.back()">Voltar</button>
    </main>
</body>
</html>