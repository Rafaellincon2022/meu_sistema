<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

    header("Location: 06-tela_login.php");
?>