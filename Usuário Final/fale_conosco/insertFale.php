<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */
$id_fale = $_POST['id_fale'];
$nome_fale = $_POST['nome_fale'];
$assunto_fale = $_POST['assunto_fale'];
$telefone_fale = $_POST['telefone_fale'];
$email_fale = $_POST['email_fale'];
$mensagem_fale = $_POST['mensagem_fale'];

$sql = "INSERT INTO fale_conosco(id_fale, nome_fale, assunto_fale, email_fale, mensagem_fale ) 
VALUES ('$id_fale', '$nome_fale', '$assunto_fale', '$email_fale', '$mensagem_fale')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='contato.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>