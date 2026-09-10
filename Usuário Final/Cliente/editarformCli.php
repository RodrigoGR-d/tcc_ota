<?php
include "../../conexao.php";
$cpf_cli = $_GET['cpf_cli'];

$sql="SELECT * FROM cliente 
WHERE cpf_cli = $cpf_cli";
$result = $conn->query($sql);
$cli = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulário de Alteração de Aluno</title>

<style>
body{
    font-family:Arial;
    background-color:#f2f2f2;
    text-align:center;
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
</style>

</head>
<body>

<div class="container">

<img src="../../img/logo.png">    

<h2>Edição de Aluno</h2>

<form method="post" action="updateAluno.php" enctype="multipart/form-data">
    CPF:<br>
    <input type="number" name="cpf_cli" class="caixa" value="<?= $cpf_cli['cpf_cli']?>"><br>
    
    Nome:<br>
    <input type="text" name="nome_cli" class="caixa" value="<?= $cli['nome_cli']?>"><br>
    
    Email:<br>
    <input type="email" name="email_cli" class="caixa" value="<?= $cli['email_cli']?>"><br>
     
    Senha:<br>
    <input type="password" name="senha_cli" class="caixa" value="<?= $cli['senha_cli']?>"><br>
    
    |Telefone:<br>
    <input type="text" name="telefone_cli" class="caixa" value="<?= $cli['telefone_cli']?>"><br>

    <br>
    <br>
<!--Botões de Enviar e Limpar-->
<input type="submit" value="EDITAR" class="caixa">

</form>