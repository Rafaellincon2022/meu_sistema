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
    <title>Página de Cadastro</title>
</head>
<body>

    <?php 
        $livro = $_POST['nome_livro'] ?? '';
        $autor = $_POST['nome_autor'] ?? '';
        $editora = $_POST['nome_editora'] ?? '';
        $data = date('Y-m-d'); //date('d/m/Y')
    ?>

    <main>
        <h1>Cadastro de Livros</h1>
        <form action="05-cadastro.php" method="post">
            <label for="">Informe o nome do livro</label>
            <input type="text" name="nome_livro" id="nome_livro" size="40" placeholder="Informe o nome do livro" required>
            <label for="nome_autor">Informe o nome do autor</label>
            <input type="text" name="nome_autor" id="nome_autor" size="40" placeholder="Informe o nome do autor" required>
            <label for="nome_editora">Informe a editora</label>
            <input type="text" name="nome_editora" id="nome_editora" placeholder="Informe o nome da editora" required>
            <label for="nome_editora">Informe a categoria</label>
            <select name="nome_categoria" id="nome_categoria" required>
                <option value="">Selecione a categoria</option>
                <option value="Bíblias">Bíblias</option>
                <option value="Casamento">Casamento</option>
                <option value="Comentário Biblico">Comentário Bíblico</option>
                <option value="Dicionário Biblico">Dicionário Bíblico</option>
                <option value="Doutrina">Doutrina</option>
                <option value="Enciclopédia Biblica">Enciclopédia Bíblica</option>
                <option value="Geográfia e História Bíblica">Geografia e História Biblica</option>
                <option value="Homens">Homens</option>
                <option value="Mulheres">Mulheres</option>
                <option value="Revistas Escola Domnical">Revistas Escola Dominical</option>
                <option value="Teologia">Teologia</option>
                <option value="Teologia Sistemática">Teologia Sistemática</option>
                <option value="Vida Cristã">Vida Cristã</option>
                <!-- Adicione outras opções de categoria conforme necessário -->
            </select>
            <label for="data_cadastro">Data do Cadastro</label>
            <input type="text" name="data_cadastro" id="data_cadastro" value="<?=$data?>">
            <input type="submit" name="botao_cadastrar" value="Cadastrar">
        </form>
        <button onclick="window.location.href='01-index.php'">Voltar</button>
    </main>
</body>
</html>