<?php
include "../../conexao.php";

/* As variáveis criadas do PHP recebem o name do HTML */ 
$id_prod = $_POST['id_prod'];
$prod_nome = $_POST['prod_nome'];
$prod_foto = $_POST['prod_foto'];
$prod_preco = $_POST['prod_preco'];
$prod_descricao = $_POST['prod_descricao'];
$prod_categoria = $_POST['categoria'];

$sql = "UPDATE produtos SET 
id_prod = '$id_prod',
prod_nome = '$prod_nome',
prod_foto = '$prod_foto', 
prod_preco = '$prod_preco',
prod_descricao = '$prod_descricao',
categoria = '$prod_categoria'
WHERE id_prod = $id_prod";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados alterados com sucesso!');
    window.location.href='formProd.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}

?>