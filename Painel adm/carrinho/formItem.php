<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */
$id_item = $_POST['id_item'];

/* Chave estrangeira

$id_pedido3 = $_POST['id_pedido3'];
$id_produto = $_POST['id_produto'];
*/


$sql = "INSERT INTO pedido(id_item) 
VALUES ('$id_item')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formItem.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>