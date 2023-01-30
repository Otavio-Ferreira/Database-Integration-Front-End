<?php

    //Iniciando uma sessão
    session_start();

    //Destruindo qualquer sessão existente com email senha
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: login.php");
?>