<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */
$id_pedido = $_POST['id_pedido'];
$data_pedido = $_POST['data_pedido'];
$horario_pedido = $_POST['horario_pedido'];
$total_ped = $_POST['total_ped'];

/* Abaixo chave estrangeira

$id_pag2 = $_POST['id_pag2'];
$cpf_cli2 = $_POST['cpf_cli2'];
*/

$sql = "INSERT INTO pedido(id_pedido, data_pedido, horario_pedido, total_ped) 
VALUES ('$id_pedido','$data_pedido','$horario_pedido','$total_ped')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formPedi.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>