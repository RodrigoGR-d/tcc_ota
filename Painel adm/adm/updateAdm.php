<?php
include "../../conexao.php";

/* As variáveis criadas do PHP recebem o name do HTML */
$cpf_adm = $_POST['cpf_adm'];
$nome_adm = $_POST['nome_adm'];
$senha_adm = $_POST['senha_adm'];
$email_adm = $_POST['email_adm'];

$sql = "UPDATE adm SET 
nome_adm = '$nome_adm', 
email_adm = '$email_adm',
senha_adm = '$senha_adm'
WHERE cpf_adm = $cpf_adm";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formAdm.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>