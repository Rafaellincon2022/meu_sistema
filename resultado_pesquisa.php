<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado da Pesquisa</title>
</head>
<body>

    <?php 
        include('config.php');
        $consultar_livro = $_GET['consultar_livro'] ?? '';
        $consultar_autor = $_GET['consultar_autor'] ?? '';
        $consultar_editora = $_GET['consultar_editora'] ?? '';
    ?>

    <main>
        <h1>Resultado da Pesquisa</h1>
        <?php 
        if (isset($_GET['botao_pesquisar'])) {
            // Verificar qual campo de pesquisa foi preenchido e construir a consulta SQL correspondente
            $sql = "SELECT * FROM livros WHERE 1=1"; // Filtro base
    
            if (!empty($consultar_livro)) {
                $sql .= " AND nome_livro LIKE '%$consultar_livro%'";
            }
    
            if (!empty($consultar_autor)) {
                $sql .= " AND nome_autor LIKE '%$consultar_autor%'";
            }
    
            if (!empty($consultar_editora)) {
                $sql .= " AND nome_editora LIKE '%$consultar_editora%'";
            }
    
            $resultado = $conexao->query($sql);
    
            // Exibir os resultados da pesquisa
            if ($resultado->num_rows > 0) {
                while ($livro = $resultado->fetch_assoc()) {
                    echo "<p>Nome do Livro: " . $livro['nome_livro'] . "</p>";
                    echo "<p>Nome do Autor: " . $livro['nome_autor'] . "</p>";
                    echo "<p>Nome da Editora: " . $livro['nome_editora'] . "</p>";
                    echo "<p>Data do Cadastro: " . $livro['data_cadastro'] . "</p>";
                    echo "<hr>";
                }
            } else {
                echo "Nenhum livro encontrado.";
            }
        }
    ?>

        <button onclick="window.location.href = 'consulta.php'">Voltar</button>
        <button onclick="window.location.href = 'index.php'">Retornar à página inicial</button>
    </main>
</body>
</html>