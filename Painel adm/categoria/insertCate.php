<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */
$id_categoria = $_POST['id_cate'];
$cate_nome = $_POST['cate_nome'];

$sql = "INSERT INTO pedido(id_cate,cate_nome) 
VALUES ('$id_cate','$cate_nome')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formCate.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>