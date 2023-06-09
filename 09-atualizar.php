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
    <script src="funcoes.js"></script>
    <title>Cadastro de Livros</title>
</head>
<body>
    <main>
        <h1>Atualizar Livro</h1>
        <?php 
            include("00-config.php");

            if (isset($_POST['botao_atualizar'])) {

                $livro_atualizar = $_POST['nome_livro'] ?? '';
                $autor_atualizar = $_POST['nome_autor'] ?? '';
                $editora_atualizar = $_POST['nome_editora'] ?? '';
                $categoria_atualizar = $_POST['nome_categoria'] ?? '';

                // Verifica se o livro existe
                $sql_verificar = "SELECT nome_livro FROM livros WHERE nome_livro = ?";
                $stmt_verificar = $conexao->prepare($sql_verificar);
                $stmt_verificar->bind_param("s", $livro_atualizar);
                $stmt_verificar->execute();
                $stmt_verificar->store_result();

                if ($stmt_verificar->num_rows > 0) {
                    // O livro existe, realiza a atualização
                    $sql_atualizar = "UPDATE livros SET nome_livro = ?, nome_autor = ?, nome_editora = ?, nome_categoria = ? WHERE nome_livro = ?";
                    $stmt_atualizar = $conexao->prepare($sql_atualizar);
                    $stmt_atualizar->bind_param("sssss", $livro_atualizar, $autor_atualizar, $editora_atualizar, $categoria_atualizar, $livro_atualizar);
                    $stmt_atualizar->execute();
                    $stmt_atualizar->close();
                    
                    print "<p>Livro <strong>$livro_atualizar</strong> atualizado com sucesso!</p>";
                } else {
                    // O livro não existe, exibe uma mensagem informando
                    print "<p>O livro <strong>$livro_atualizar</strong> não existe!</p>";
                }
                
                $stmt_verificar->close();
            }
        ?>
        <form method="post" action="">
            <label for="nome_livro">Nome do Livro:</label>
            <input type="text" id="nome_livro" name="nome_livro" required><br>

            <label for="nome_autor">Nome do Autor:</label>
            <input type="text" id="nome_autor" name="nome_autor" required><br>

            <label for="nome_editora">Nome da Editora:</label>
            <input type="text" id="nome_editora" name="nome_editora" required><br>

            <label for="nome_categoria">Nome da Categoria:</label>
            <input type="text" id="nome_categoria" name="nome_categoria" required><br>

            <button type="submit" name="botao_atualizar">Atualizar</button>
        </form>

        <button onclick="window.location.href='03-tela_consulta.php'">Voltar</button>
        <button onclick="window.location.href='01-index.php'">Página Inicial</button>
    </main>
</body>
</html>
