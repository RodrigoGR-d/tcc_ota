<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */

$dia_func = $_POST['dia_func'];
$inicio_func = $_POST['inicio_func'];
$final_func = $_POST['final_func'];
$bairro_func = $_POST['bairro_func'];
$cidade_func = $_POST['cidade_func'];

$sql = "INSERT INTO horario_funcionamento(dia_func, inicio_func,final_func , bairro_func,cidade_func) 
VALUES ('$dia_func','$inicio_func','$final_func','$bairro_func','$cidade_func')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formHora.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>