<?php
/*Aqui virá o código de busca ultilizando o comando SQL*/
include "../conexao.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link para bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Formulário Adm</title>
<style>
    body{
        font-family:Trebuchet;
        text-align:center;
        background-color:#f2f2f2;
        font-size: 25px;
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
    .pastelescrita{
        color:yellow;
        
        font-weight: bold;
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
    
</style>

</head>
<body>

<!--<div class="container">-->
    <header>
        <div class="container-fluid">
            <div class="row">
            <div class="col-1">
        <img class="logoota" src="../imagens/logoota.jpeg">
        </div>
        <div class="col-11 d-flex justify-content-center align-items-center">
            
            <div class="tituloheader">
        
            <h1><span class="ota">OTA</span> <span class="pastelescrita">Pásteis</span></h1>

            </div>
        </div>

       
        </div>
        </div>
    </header>


   
    
    
<div class="container col-6 mb-4">    
    <h2>Cadastro de Adm</h2>
    <form method="post" action="insertAdm.php" enctype="multipart/form-data">
    <div class="col-12 m-6">
        
    
        <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
            <label for="cpf_adm" class="form-label" >CPF</label><br>
            <input type="text" name="cpf_adm"  class="form-control" placeholder="Insira seu CPF">
            
        </div>

        <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
           <label for="nome_adm" class="form-label">Nome:</label><br>
            <input type="text" name="nome_adm" class="form-control"  placeholder="Insira seu Nome"><br>
        </div>

        <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
        <label for="email_adm" class="form-label">Email:</label><br>
            <input type="email" name="email_adm" class="form-control"  placeholder="Insira seu email"><br>
        </div>

        <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
            <label for="senha_adm" class="form-label">Senha:</label><br>
            <input type="password" name="senha_adm" class="form-control" placeholder="Insira sua Senha"><br>
        </div>


    <br>


    <!--Botõs de Enviar e Limpar-->
        <input type="submit" value="CADASTRAR" class="btn btn-success">
        <input type="reset" value="CANCELAR" class="btn btn-danger">

    </form>
    </div>
</div>
<!--Início da tabela de visualização de usuário-->

<table>
    <thead>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
        </tr>
    </thead>

<!-- A partir da segunda linha da tabela os dados serão em PHP e virão do banco de dados -->

    <tbody>
        <?php
        /*Verifica se há registros retornados utilizando 
        o comando em select da tabela tbl_aluno*/

        $sql = "SELECT * FROM adm";
        $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()){
/*Na linha abaixo ele solicita que o campo chave primária seja 
adicionada dentro de uma variável PHP para utilizar como condição*/

                $cpf_adm = $row['cpf_adm'];
                
    /*Dentro dos colchetes na sequência abaixo virá o nome do 
    campo da tabela que exibirá os dados do banco. */
                echo "<tr>

                <td>{$row['cpf_adm']}</td>
                <td>{$row['nome_adm']}</td>
                <td>{$row['email_adm']}</td>
                <td>{$row['senha_adm']}</td>
                
            <td>
            <a href='editarAdm.php?cpf_adm=$cpf_adm'>
            <img src='../imagens/lapis.png' width='20' height='20'>
            </a>
                            
            </td>
            </tr>";

            }
            
        ?>
    </tbody>

</table>




</body>
</html>