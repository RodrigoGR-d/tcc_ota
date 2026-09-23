<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */
$cpf_cli = $_POST['cpf_cli'];
$nome_cli = $_POST['nome_cli'];
$senha_cli = $_POST['senha_cli'];
$email_cli = $_POST['email_cli'];
$telefone_cli = $_POST['telefone_cli'];

$sql = "INSERT INTO cliente(cpf_cli, nome_cli,senha_cli,email_cli,telefone_cli) 
VALUES ('$cpf_cli','$nome_cli','$senha_cli','$email_cli','$telefone_cli')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formCli.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>