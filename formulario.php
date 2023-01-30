<?php
    //essa página cadastra novos usuários

    //se houver um post de um subimit
    if(isset($_POST['submit'])){

        //inclue a conexão
        include_once('config.php');

        //cria variáveis que recebem o valores dos inputs que vinheram com o subimit do post
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $nascimento = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        //variável que recebe o comando para inserir os dados na tabela
        $result = mysqli_query($conexao, "INSERT INTO users (nome, email, senha, telefone, sexo, nascimento, cidade, estado, endereco) VALUES ('$nome', '$email', '$senha', '$telefone', '$sexo', '$nascimento', '$cidade', '$estado', '$endereco')");

        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, #622773, #200726);
        }
        .box{
            color: white;
            margin: auto;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 400px;
        }
        fieldset{
            border: 3px solid #4A1259;
        }
        legend{
            border: 1px solid #4A1259;
            padding: 10px;
            text-align: center;
            background-color: #4A1259;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right, #4A1259, #350C40);
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background: #A192A6;
        }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Formulário de cliente</b></legend> <br>
            
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div><br><br>

                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div><br><br>

                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div><br><br>
                
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="tel" class="labelInput">Telefone</label>
                </div><br><br>
                
                <p>Sexo:</p>
                    <input type="radio" name="genero" id="feminino" value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <input type="radio" name="genero" id="masculino" value="masculino" required>
                    <label for="masculino">Masculino</label>
                    <input type="radio" name="genero" id="outro" value="outro" required>
                    <label for="outro">Outro</label><br><br>
                
                <div class="inputBox">
                    <label for="data_nascimento" class="labelInput"><b>Data de Nascimento</b></label> <br><br>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" required>
                </div> <br><br>
            
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div><br><br>
                
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div><br><br>
                
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div><br><br>
                
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    
    </div>
</body>
</html>