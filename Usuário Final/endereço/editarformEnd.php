<?php
include "../../conexao.php";
$id_endereco = $_GET['id_endereco'];
$sql="SELECT * FROM endereco WHERE id_endereco = $id_endereco";
$result = $conn->query($sql);
$endereco = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário alteração de Produtos</title>
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

<div class="container">
    <img src="">

    <h2>Edição de Produtos</h2>

    <form method="post" action="updateEnd.php" enctype="multipart/form-data">

    
    <input type="hidden" name="id_endereco" class="caixa" value="<?= $endereco['id_endereco']?>"><br>

    endereço:<br>
    <input type="text" name="logradouro_cli" class="caixa" value="<?= $endereco['logradouro_cli']?>"><br>

    Numero:<br>
    <input type="text" name="numero_cli" class="caixa" value="<?=$endereco['numero_cli']?>"><br>

    Complemento:<br>
    <input type="text" name="complemento_cli" class="caixa" value="<?= $endereco['complemento_cli']?>"><br>

    estado:<br>
    <input type="text" name="estado_cli" class="caixa" value="<?= $endereco['estado_cli']?>"><br>

    cidade:<br>
    <input type="text" name="cidade_cli" class="caixa" value="<?= $endereco['cidade_cli']?>"><br>

    Bairro:<br>
    <input type="text" name=" bairro_cli" class="caixa" value="<?= $endereco['bairro_cli']?>"><br>

    CEP:<br>
    <input type="text" name=" cep_cli" class="caixa" value="<?= $endereco['cep_cli']?>"><br>



<!--Botõs de Enviar e Limpar-->
    <input type="submit" value="EDITAR" class="caixa">

</form>

</body>
</html>