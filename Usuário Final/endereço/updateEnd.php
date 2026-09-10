<?php
include "../../conexao.php";

/* As variáveis criadas do PHP recebem o name do HTML */ 
$id_endereco = $_POST['id_endereco'];
$logradouro_cli = $_POST['logradouro_cli'];
$numero_cli = $_POST['numero_cli'];
$complemento_cli = $_POST['complemento_cli'];
$estado_cli = $_POST['estado_cli'];
$bairro_cli = $_POST['bairro_cli'];
$cidade_cli = $_POST['cidade_cli'];
$cep_cli = $_POST['cep_cli'];


$sql = "UPDATE endereco SET  
logradouro_cli = '$logradouro_cli',
numero_cli = '$numero_cli',
complemento_cli = '$complemento_cli',
estado_cli = '$estado_cli',
bairro_cli = '$bairro_cli',
cidade_cli = '$cidade_cli',
cep_cli = '$cep_cli'
WHERE id_endereco = $id_endereco";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formEnd.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>