<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */
$cpf_adm = $_POST['cpf_adm'];
$nome_adm = $_POST['nome_adm'];
$senha_adm = $_POST['senha_adm'];
$email_adm = $_POST['email_adm'];

$sql = "INSERT INTO adm(cpf_adm,nome_adm,senha_adm,email_adm) 
VALUES ('$cpf_adm','$nome_adm','$senha_adm','$email_adm')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formAdm.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>