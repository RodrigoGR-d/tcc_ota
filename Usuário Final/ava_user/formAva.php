<?php
/*Aqui virá o código de busca ultilizando o comando SQL*/
include "../../conexao.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação</title>
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

<header>
        <div class="container-fluid">
            <div class="row">
            <div class="col-1">
            <a href="">
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

   

<div class="container col-6 mb-4"> 
    <h2>Avaliação</h2>

<form method="post" action="insertAva.php" enctype="multipart/form-data">
    <div class="col-12 m-6">


    <div class="col-lg-12 col-md-6 col-sm-12 mb-4 mt-4">
    <label for="avaliacao" class="form-label" >avaliacao:</label><br>
    <input type="textarea" name="avaliacao" class="form-control"><br>
    </div>
<br>

<!--Botõs de Enviar e Limpar-->
    <input type="submit" value="CADASTRAR" class="btn btn-success">
    <input type="reset" value="CANCELAR"  class="btn btn-danger">

</form>
</div>
</div>
<!--Início da tabela de visualização de usuário-->



<!-- A partir da segunda linha da tabela os dados serão em PHP e virão do banco de dados -->

    


</div>

</body>
</html>