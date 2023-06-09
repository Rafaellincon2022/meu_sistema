<?php 
    // INCLUI O ARQUIVO DE CONEXÃO COM O BANCO DE DADOS
    include("00-config.php");


    // CONDIÇÃO PARA VERIFICAR SE EXISTE O CAMPO E-MAIL E SENHA
    if (isset($_POST['campo_nome']) || isset($_POST['campo_senha'])) {

        // Verifica se o campo nome está vazio
        if (strlen($_POST['campo_nome']) == 0) {
            print "Informe o nome de usuário!";
        // Verifica se o campo senha está vazio
        } else if (strlen($_POST['campo_senha']) == 0) {
            print "Informe a senha do usuário!";
        // Se tudo acima estiver correto, ele prossegue com o código do login
        } else {
            
            // Aqui iremos limpar o campo email com a função do MYSQLI - Real Escape String
            // Essa variável $conexão não existe neste arquivo, mas existe no arquivo que incluimos no inicio (config.php)
            $usuario = $conexao->real_escape_string($_POST['campo_nome']);
            $senha = $conexao->real_escape_string($_POST['campo_senha']);

            // Aqui ele inicia a consulta no banco de dados
            $codigo_sql = "SELECT * FROM usuarios WHERE nome_usuario = '$usuario' AND senha_usuario = '$senha'";

            // Aqui ele irá rodar a query 
            $consulta_sql = $conexao->query($codigo_sql) or die("Falha na execução do código SQL: " . $conexao->error);

            // Verificaremos agora a quantidade de registros retornados
            $quantidade = $consulta_sql->num_rows;

            if ($quantidade == 1) {
                $usuario = $consulta_sql->fetch_assoc();

                // Criar uma nova sessão
                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome_usuario'] = $usuario['nome_usuario'];

                // Usuário logado, ele é redirecionado para a página principal do site
                header("Location: 01-index.php");
            } else {
                print "Falha ao logar! Usuário e/ou Senha incorretos.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <h1>Acesse sua conta</h1>
        <label>Usuário</label>
        <input type="text" name="campo_nome">
        <label>Senha</label>
        <input type="password" name="campo_senha">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>