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
    <title>Exclusão de Livros</title>
</head>
<body>
    <main>
        <h1>Excluir Livro</h1>
        <?php 
            include("00-config.php");

            if (isset($_POST['botao_excluir'])) {

                $livro_excluir = $_POST['nome_livro'] ?? '';

                // Verifica se o livro existe
                $sql_verificar = "SELECT nome_livro FROM livros WHERE nome_livro = ?";
                $stmt_verificar = $conexao->prepare($sql_verificar);
                $stmt_verificar->bind_param("s", $livro_excluir);
                $stmt_verificar->execute();
                $stmt_verificar->store_result();

                if ($stmt_verificar->num_rows > 0) {
                    // O livro existe, realiza a exclusão
                    $sql_excluir = "DELETE FROM livros WHERE nome_livro = ?";
                    $stmt_excluir = $conexao->prepare($sql_excluir);
                    $stmt_excluir->bind_param("s", $livro_excluir);
                    $stmt_excluir->execute();
                    $stmt_excluir->close();
                    
                    print "<p>Livro <strong>$livro_excluir</strong> excluído com sucesso!</p>";
                } else {
                    // O livro não existe, exibe uma mensagem informando
                    print "<p>O livro <strong>$livro_excluir</strong> não existe!</p>";
                }
                
                $stmt_verificar->close();
            }
        ?>
        <form method="post" action="">
            <label for="nome_livro">Nome do Livro:</label>
            <input type="text" id="nome_livro" name="nome_livro" required><br>

            <button type="submit" name="botao_excluir">Excluir</button>
        </form>

        <button onclick="window.location.href='03-tela_consulta.php'">Voltar</button>
        <button onclick="window.location.href='01-index.php'">Página Inicial</button>
    </main>
</body>
</html>
