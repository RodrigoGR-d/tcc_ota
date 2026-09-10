<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */
$id_pag = $_POST['id_pag'];
$forma_pag = $_POST['forma_pag'];

$sql = "INSERT INTO pagamento(id_pag,forma_pag) 
VALUES ('$id_pag','$forma_pag')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formPag.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>