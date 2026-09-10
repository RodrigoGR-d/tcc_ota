<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */
$id_endereco = $_POST['id_endereco'];
$logradouro_cli = $_POST['logradouro_cli'];
$numero_cli = $_POST['numero_cli'];
$complemento_cli = $_POST['complemento_cli'];
$estado_cli = $_POST['estado_cli'];
$bairro_cli = $_POST['bairro_cli'];
$cidade_cli = $_POST['cidade_cli'];
$cep_cli = $_POST['cep_cli'];


$sql = "INSERT INTO endereco(id_endereco, logradouro_cli, numero_cli,complemento_cli,estado_cli,bairro_cli,cidade_cli,cep_cli) 
VALUES ('$id_cli','$logradouro_cli','$numero_cli','$complemento_cli','$estado_cli','$bairro_cli','$cidade_cli','$cep_cli')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formEnd.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>