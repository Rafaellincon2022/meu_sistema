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
            include("00-config.php");
            $livro = $_POST['nome_livro'] ?? '';
            $autor = $_POST['nome_autor'] ?? '';
            $editora = $_POST['nome_editora'] ?? '';
            $categoria = $_POST['nome_categoria'] ?? '';
            $data = date('Y-m-d'); //date('d/m/Y')

            /*print "<p>O livro cadastrado foi:</p>";
            print "<ol><li>Nome do Livro: <strong>$livro</strong></li>";
            print "<li>Nome do Autor: <strong>$autor</strong></li>";
            print "<li>Nome da Editora: <strong>$editora</strong></li>";
            print "<li>Data do Cadastro: <strong>$data</strong></li>";*/
            
            if (isset($_POST['botao_cadastrar'])) {
                // Verifica se o livro já existe
                $sql_verificar = "SELECT nome_livro FROM livros WHERE nome_livro = ?";
                $stmt_verificar = $conexao->prepare($sql_verificar);
                $stmt_verificar->bind_param("s", $livro);
                $stmt_verificar->execute();
                $stmt_verificar->store_result();
                
                if ($stmt_verificar->num_rows > 0) {
                    // O livro já existe, exibe uma mensagem informando
                    print "<p>O livro <strong>$livro</strong> já existe!</p>";
                } else {
                    // O livro não existe, realiza a inclusão
                    $sql_inserir = "INSERT INTO livros (nome_livro, nome_autor, nome_editora, nome_categoria, data_cadastro) VALUES (?, ?, ?, ?, ?)";
                    $stmt_inserir = $conexao->prepare($sql_inserir);
                    $stmt_inserir->bind_param("sssss", $livro, $autor, $editora, $categoria, $data);
                    $stmt_inserir->execute();
                    $stmt_inserir->close();
                    
                    print "<p>Livro <strong>$livro</strong> cadastrado com sucesso!</p>";
                }
                
                $stmt_verificar->close();
            }
        ?>
        <button onclick="window.location.href='03-tela_consulta.php'">Voltar</button>
        <button onclick="window.location.href='01-index.php'">Página Inicial</button>
    </main>
</body>
</html>