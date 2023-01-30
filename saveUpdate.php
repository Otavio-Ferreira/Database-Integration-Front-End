<?php
       //Incluindo arquivo de conexão ao banco
       include_once('config.php');

       //se houver um post com id = upadate
       if(isset($_POST['update'])){

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        $sqlInsert = "UPDATE users
        SET nome='$nome',senha='$senha',email='$email',telefone='$telefone',sexo='$sexo',nascimento='$data_nasc',cidade='$cidade',estado='$estado',endereco='$endereco'
        WHERE id='$id'";

        $result = $conexao->query($sqlInsert);
    }
    header('Location: sistema.php');
?>