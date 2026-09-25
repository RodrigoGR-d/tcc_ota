<?php
/*Aqui virá o código de busca ultilizando o comando SQL*/
include "../../conexao.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Clinte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<style>
    body{
        font-family:Arial;
        text-align:center;
        background-color:#f2f2f2;
    }
    .container{
        background:white;
        width:600px;
        margin:auto;
        margin-top:30px;
        padding:20px;
        border-radius:10px;
    }
    .caixa{
        width:80%;
        padding:5px;
        margin:5px;
    }
    img{
        width:100px;
        margin-bottom:10px;
    }
    .grupo{
        text-align:left;
        width:80%;
        margin:auto;
    }
    .grupo label{
        display:block;
        margin:5px 0;
    }
    .ota{
        color: white;
        font-weight: bold;
    }
    header{
        background-color: red;
        padding: 22px;
        text-align: center;
    }
    .logoota{
        height: 125px;
        border-radius: 80%;
        overflow: hidden;
        
    }
    .pastelescrita{
        color:yellow;
        
        font-weight: bold;
    }
</style>

</head>
<body>

<header>
        <div class="container-fluid">
            <div class="row">
            <div class="col-1">
            <a href="../../menu.php">
        <img class="logoota" src="../imagens/logoota.jpeg">
        </a> 
        </div>
        <div class="col-11 d-flex justify-content-center align-items-center">
            
            <div class="tituloheader">
        
            <h1><span class="ota">OTA</span> <span class="pastelescrita">Pásteis</span></h1>

            </div>
        </div>

       
        </div>
        </div>
    </header>

    <a href="../menu.php">
    <img src="">
    </a>



    <div class="container col-6 mb-4">    
    <h2>Cadastro de Clientes</h2>
    <form method="post" action="insertCli.php" enctype="multipart/form-data">
    <div class="col-12 m-6">
        
    
        <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
            <label for="cpf_cli" class="form-label" >CPF</label><br>
            <input type="text" name="cpf_cli"  class="form-control" placeholder="Insira seu CPF">
            
        </div>

        <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
           <label for="nome_cli" class="form-label">Nome:</label><br>
            <input type="text" name="nome_cli" class="form-control"  placeholder="Insira seu Nome"><br>
        </div>

        <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
        <label for="email_cli" class="form-label">Email:</label><br>
            <input type="email" name="email_cli" class="form-control"  placeholder="Insira seu email"><br>
        </div>

        <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
            <label for="senha_cli" class="form-label">Senha:</label><br>
            <input type="password" name="senha_cli" class="form-control" placeholder="Insira sua Senha"><br>
        </div>

        <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
            <label for="telefone_cli" class="form-label">Telefone:</label><br>
            <input type="text" name="telefone_cli" class="form-control" placeholder="Insira seu Telefone"><br>
        </div>

<br>


<!--Botõs de Enviar e Limpar-->
    <input type="submit" value="CADASTRAR" class="btn btn-success">
    <input type="reset" value="CANCELAR" class="btn btn-danger">


</form>

<!--Início da tabela de visualização de usuário-->

<table>
    <thead>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Telefone</th>
        </tr>
    </thead>

<!-- A partir da segunda linha da tabela os dados serão em PHP e virão do banco de dados -->

    <tbody>
        <?php
        /*Verifica se há registros retornados utilizando 
        o comando em select da tabela tbl_aluno*/

        $sql = "SELECT * FROM cliente";
        $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()){
/*Na linha abaixo ele solicita que o campo chave primária seja 
adicionada dentro de uma variável PHP para utilizar como condição*/

                $cpf_cli = $row['cpf_cli'];
                
    /*Dentro dos colchetes na sequência abaixo virá o nome do 
    campo da tabela que exibirá os dados do banco. */
                echo "<tr>

                <td>{$row['cpf_cli']}</td>
                <td>{$row['nome_cli']}</td>
                <td>{$row['email_cli']}</td>
                <td>{$row['senha_cli']}</td>
                <td>{$row['telefone_cli']}</td>
                
                
            <td>
            <a href='editarformCli.php?cpf_cli=$cpf_cli'>
            <img src='../../imagens/lapis.png' width='20' height='20'>
            </a>

            <a href='deleteCli.php?cpf_cli=$cpf_cli'
            onclick=\"return confirm('Deseja realmente excluir o Cliente
            {$row['nome_cli']}?');\">
            <img src='../../imagens/lixeira.png'            
            width='20' height='20'>

                            
            </a>
                            
            </td>
            </tr>";

            }
            
        ?>
    </tbody>

</table>


</div>

</body>
</html>