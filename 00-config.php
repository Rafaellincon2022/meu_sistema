<?php 

    $hostname = 'localhost';
    $banco_de_dados = 'cadastro_livros';
    $usuario = 'admin';
    $senha = 'GIGA@bx92sq41!@#_';
    
    

    // Criamos as variáveis de conexão
    $conexao = mysqli_connect($hostname, $usuario, $senha, $banco_de_dados) or die ("Erro de Conexão");
    
?>