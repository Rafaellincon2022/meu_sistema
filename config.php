<?php 
    // Criamos a constantes para nossa base de dados
    /*
    define('HOST', 'localhost');
    define('BASE', 'cadastro_livros');
    define('USUARIO', 'root');
    define('SENHA', '');
    */

    $hostname = 'localhost';
    $banco_de_dados = 'cadastro_livros';
    $usuario = 'root';
    $senha = '';
    
    

    // Criamos as variáveis de conexão
    $conexao = mysqli_connect($hostname, $usuario, $senha, $banco_de_dados) or die ("Erro de Conexão");
    
?>