<?php
include "../../conexao.php";

/* As variáveis criadas do PHP recebem o name do HTML */ 
$id_func = $_POST['id_func'];
$dia_func = $_POST['dia_func'];
$inicio_func = $_POST['inicio_func'];
$final_func = $_POST['final_func'];
$bairro_func = $_POST['bairro_func'];
$cidade_func = $_POST['cidade_func'];

$sql = "UPDATE horario_funcionamento SET 
id_func = '$id_func',
dia_func = '$dia_func',
inicio_func = '$inicio_func',
final_func = '$final_func',
bairro_func = '$bairro_func',
cidade_func = '$cidade_func'
WHERE id_func = $id_func";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formHora.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>