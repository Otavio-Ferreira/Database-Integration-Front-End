<?php
    //essa página faz o teste se o usuário foi registrado ou não

    //usando sessões para melhorar a segurança do login
    session_start();

    //se exitir um post com um submit, e o post email não estiver vazio, e o post senha não 
    //estiver vazio
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){

        //incluir a conexão ao banco, definir variaveis recebendo o post do email e senha
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //variável com o comando sql para buscar na tabela
        $sql = "SELECT * FROM users WHERE email = '$email' and senha = '$senha' ";

        //variável que recebe o comando para usar a conexão ao banco atravez do comando sql e ir 
        //até a tabela
        $result = $conexao->query($sql);

            //se o numero de linhas na tabela for menor que 1
            if(mysqli_num_rows($result) < 1){

                //destroi as sessões do email e senha, direciona para a mesma página
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                header('Location: login.php');
            }
            else {
                //se não, cria sessões que recebem os valores das variáveis definidas e
                //direciona para a página sistema
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                header('Location: sistema.php');
            }
    }
    else{
        //se não existir um post, mantem na página
        header('location: login.php');
    }
?>
