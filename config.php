<?php 
    // Criamos a constantes para nossa base de dados
    /*
    define('HOST', 'localhost');
    define('BASE', 'cadastro_livros');
    define('USUARIO', 'root');
    define('SENHA', '');
    */

    $usuario = 'root';
    $senha = '';
    $banco_de_dados = 'cadastro_livros';
    $hostname = 'localhost';

    // Criamos as variáveis de conexão
    $conexao = mysqli_connect($hostname, $usuario, $senha, $banco_de_dados) or die ("Erro de Conexão");
    
?>