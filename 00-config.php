<?php 

    $hostname = 'localhost';
    $banco_de_dados = 'cadastro_livros';
    $usuario = 'root';
    $senha = '';
    
    

    // Criamos as variáveis de conexão
    $conexao = mysqli_connect($hostname, $usuario, $senha, $banco_de_dados);

    if (mysqli_connect_error()) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
    }
    
?>