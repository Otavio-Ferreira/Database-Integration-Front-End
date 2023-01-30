<?php

    //se a rota GET(url) não estiver vazia, pegar o id
    if(!empty($_GET['id'])){

        //inclue a conexão
        include_once('config.php');

        //variáveiid recebe o valor id da rota get
        $id = $_GET['id'];

        //variável recebe comando SQL
        $sqlSlect = "SELECT * FROM users WHERE id='$id'";

        //variável recebe query da tabela
        $result = $conexao->query($sqlSlect);

        //se o número de linhas provenientes da variável result for maior que zero
        if($result -> num_rows > 0){

            //receber os valores dos campos e colocar em seus devidos lugares no formulário
            while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];
            $telefone = $user_data['telefone'];
            $sexo = $user_data['sexo'];
            $nascimento = $user_data['nascimento'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];
        }
        }
        else{
            header('Location: sistema.php');
        }

    
    }
    else{
        header('Location: sistema.php');
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
        #update{
            background-image: linear-gradient(to right, #4A1259, #350C40);
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #update:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
    <a href="sistema.php">Voltar</a>
    <div class="box">
        <form action="saveUpdate.php" method="POST">
            <fieldset>
                <legend><b>Formulário de cliente</b></legend> <br>
            
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome; ?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div><br><br>

                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email; ?>"  required>
                    <label for="email" class="labelInput">Email</label>
                </div><br><br>

                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" value="<?php echo $senha; ?>"  required>
                    <label for="senha" class="labelInput">Senha</label>
                </div><br><br>
                
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone; ?>"  required>
                    <label for="tel" class="labelInput">Telefone</label>
                </div><br><br>
                
                <p>Sexo:</p>
                    <input type="radio" name="genero" id="feminino" value="feminino" <?php echo ($sexo == 'feminino')?'checked': ''; ?> required>
                    <label for="feminino">Feminino</label>

                    <input type="radio" name="genero" id="masculino" value="masculino" <?php echo ($sexo == 'masculino')?'checked': ''; ?> required>
                    <label for="masculino">Masculino</label>

                    <input type="radio" name="genero" id="outro" value="outro" <?php echo ($sexo == 'outro')?'checked': ''; ?>  required>
                    <label for="outro">Outro</label><br><br>
                
                <div class="inputBox">
                    <label for="data_nascimento" class="labelInput"><b>Data de Nascimento</b></label> <br><br>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" value="<?php echo $nascimento; ?>"  required>
                </div> <br><br>
            
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade; ?>"  required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div><br><br>
                
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado; ?>" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div><br><br>
                
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco; ?>" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div><br><br>
                
                <input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    
    </div>
</body>
</html>