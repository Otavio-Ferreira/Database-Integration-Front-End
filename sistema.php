<?php
    session_start();
    include_once('config.php');

    //Se a sessão email e senha estiver vazio executar
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){

        //destruir qualquer sessão existente e direcionar para o login
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

    //Para mostrar na tela
    $logado = $_SESSION['email'];

    //Pegar o valor da url caso ela não esteje vazia
    if(!empty($_GET['search']))
    {
        //Armazenar o valor que for passado para a url
        $data = $_GET['search'];

        //Comando em sql para requisição
        $sql = "SELECT * FROM users WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id asc";
    }
    else
    {
        //Comando em sql para requisição
        $sql = "SELECT * FROM users ORDER BY id asc";
    }

    //Recebendo a requisição a tabela
    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            background-image: linear-gradient(to right, #622773, #200726);
        }
        h1{
            text-align: center;
            font-size: 30px;
            background-color: #A192A6;
            padding: 5px;
        }
        .table-bg{
            background: rgba(0,0,0,0.3);
            color: white;
        }
        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
        .navbar{
            background-color: #200726;
           
        }
        .navbar-brand{
            color: white;
        }
        .bt{
            background-color: #622773;
        }
        .bt:hover{
            background-color: #200726;
            border: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Área Usuario</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger">Sair</a>
        </div>
    </nav>
    <?php echo "<h1>Bem Vindo <strong>$logado<strong></h1>" ?>
     <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary bt">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-3">
        <table class="table table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    //Executar enquanto users_data receber valores do banco/tabela
                    while($users_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$users_data['id']."</td>";
                        echo "<td>".$users_data['nome']."</td>";
                        echo "<td>".$users_data['email']."</td>";
                        echo "<td>".$users_data['senha']."</td>";
                        echo "<td>".$users_data['telefone']."</td>";
                        echo "<td>".$users_data['sexo']."</td>";
                        echo "<td>".$users_data['nascimento']."</td>";
                        echo "<td>".$users_data['cidade']."</td>";
                        echo "<td>".$users_data['estado']."</td>";
                        echo "<td>".$users_data['endereco']."</td>";
                        echo "<td>
                                <a class='btn btn-primary btn-sm'  href='edit.php?id=$users_data[id]' title='Editar''>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                    </svg>
                                </a>
                                <a class='btn btn-danger btn-sm'href='delete.php?id=$users_data[id]' title='Deletar'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                                    </svg>
                                </a>
                             </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table>
    </div>
    <script>
        //Variável recebendo o elemento de pesquisa
        var search = document.getElementById('pesquisar')

        //Adicionando um evento para o elemento aramazenado em 'search', para quando a tecla 'Enter' for pressionada executar a função searchdata()
        search.addEventListener("keydown", (event) => {
            if(event.key === "Enter"){
                searchData()
            }
        })

        //Função que passa para a url o que foi digitado no campo de pesquisa
        function searchData(){
            window.location = `sistema.php?search=${search.value}`
        }
    </script>
</body>
</html>