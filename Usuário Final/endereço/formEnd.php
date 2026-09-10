<?php
/*Aqui virá o código de busca ultilizando o comando SQL*/
include "../../conexao.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Formulário Clinte</title>
<style>
    body{
        font-family:Arial;
        text-align:center;
        background-color:#f2f2f2;
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

<!--<div class="container">-->
<header>
        <div class="container-fluid">
            <div class="row">
            <div class="col-1">
            <a href="../../menu.php">
        <img class="logoota" src="../../imagens/logoota.jpeg">
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
    <h2>Cadastro de Cliente</h2>
<form method="post" action="insertEnd.php" enctype="multipart/form-data">
    <div class="col-12 m-6">

    <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
       <label for="logradouro_cli" class="form-label" >Endereço: </label><br>
       <input type="text" name="logradouro_cli" class="form-control" placeholder="Insira seu endereço"><br>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
       <label for="numero_cli" class="form-label" >Número: </label><br>
       <input type="text" name="numero_cli" class="form-control" placeholder="Insira seu número"><br>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
       <label for="complemento_cli" class="form-label" >Complemento: </label><br>
    <input type="text" name="complemento_cli" class="form-control" placeholder="Insira o complemento"><br>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
       <label for="estado_cli" class="form-label" >Estado: </label><br>
    <input type="text" name="estado_cli" class="form-control" placeholder="Insira seu estado"><br>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
       <label for="cidade_cli" class="form-label" >Cidade: </label><br>
    <input type="text" name="cidade_cli" class="form-control" placeholder="Insira sua cidade"><br>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
       <label for="bairro_cli" class="form-label" >Bairro: </label><br>
    <input type="text" name=" bairro_cli" class="form-control" placeholder="Insira seu bairro"><br>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
       <label for="cep_cli" class="form-label" >CEP: </label><br>
    <input type="text" name=" cep_cli" class="form-control" placeholder="Insira o seu CEP"><br>
    </div>

    

<br>


<!--Botõs de Enviar e Limpar-->
<input type="submit" value="CADASTRAR" class="btn btn-success">
<input type="reset" value="CANCELAR" class="btn btn-danger">

    </div>
</div>

</form>

<!--Início da tabela de visualização de usuário-->

<table>
    <thead>
        <tr>
            <th>Endereço</th>
            <th>Número</th>
            <th>complemento</th>
            <th>estado</th>
            <th>cidade</th>
            <th>Bairro</th>
            <th>CEP</th>
        </tr>
    </thead>

<!-- A partir da segunda linha da tabela os dados serão em PHP e virão do banco de dados -->

    <tbody>
        <?php
        /*Verifica se há registros retornados utilizando 
        o comando em select da tabela tbl_aluno*/

        $sql = "SELECT * FROM endereco";
        $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()){
/*Na linha abaixo ele solicita que o campo chave primária seja 
adicionada dentro de uma variável PHP para utilizar como condição*/

                $id_endereco = $row['id_endereco'];
                
    /*Dentro dos colchetes na sequência abaixo virá o nome do 
    campo da tabela que exibirá os dados do banco. */
                echo "<tr>

                <td>{$row['logradouro_cli']}</td>
                <td>{$row['numero_cli']}</td>
                <td>{$row['complemento_cli']}</td>
                <td>{$row['estado_cli']}</td>
                <td>{$row['cidade_cli']}</td>
                <td>{$row['bairro_cli']}</td>
                <td>{$row['cep_cli']}</td>
                
                
                
            <td>
            <a href='editarformEnd.php?id_endereco=$id_endereco'>
            <img src='../../imagens/lapis.png' width='20' height='20'>
            </a>

            <a href='deleteEnd.php?id_endereco=$id_endereco'
            onclick=\"return confirm('Deseja realmente excluir o Endereço
            {$row['logradouro_cli']}?');\">
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