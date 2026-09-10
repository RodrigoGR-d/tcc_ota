<?php
include "../../conexao.php";

/* As variáveis criadas do PHP recebem o name do HTML */ 
$cpf_cli = $_POST['cpf_cli'];
$nome_cli = $_POST['nome_cli'];
$senha_cli = $_POST['senha_cli'];
$email_cli = $_POST['email_cli'];
$telefone_cli = $_POST['telefone_cli'];

$sql = "UPDATE cliente SET 
nome_cli = '$nome_cli', 
cpf_cli = '$cpf_cli',
email_cli = '$email_cli',
senha_cli = '$senha_cli',
telefone_cli = '$telefone_cli'
WHERE cpf_cli = $cpf_cli";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formCli.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>