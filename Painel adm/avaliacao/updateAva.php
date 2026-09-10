<?php
include "../../conexao.php";

/* As variáveis criadas do PHP recebem o name do HTML */ 
$id_func = $_POST['id_func'];
$avaliacao = $_POST['avaliacao'];

$sql = "UPDATE avaliacao SET 
avaliacao = '$avaliacao'
WHERE id_ava = $id_ava";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formAva.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>