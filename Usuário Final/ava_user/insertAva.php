<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */

$avaliacao = $_POST['avaliacao'];

$sql = "INSERT INTO avaliacao (avaliacao) 
VALUES ('$avaliacao')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='../../Painel adm/avaliacao/VizuAva.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>