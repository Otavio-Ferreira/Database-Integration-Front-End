<?php 
    //essa é a página da conexão com o banco OBS: Para a conexão funcionar é preciso que essa pasta com os arquivos esteje na pasta 'htdocs' dos arquivos da pasta 'Xamp'

    //inicialmete definir variáveis com a rota, usuario, senha e nome, tudo isso do banco
    $dbHost = 'LocalHost';
    $dbUsername = 'root';
    $dbPassword = ''; 
    $dbName = 'logusers';

    //variável que recebe um objeto mysql conectado ao banco
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

?>