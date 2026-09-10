<?php

/* Importar o arquivo de conexão, que está fora da pasta */
include "../../conexao.php";

/* Neste trecho o código está sendo criado uma variavel
em PHP $ para receber através do método POST o name do HTML */
$id_prod = $_POST['id_prod'];
$prod_nome = $_POST['prod_nome'];
$prod_preco = $_POST['prod_preco'];
$prod_descricao = $_POST['prod_descricao'];
$prod_categoria = $_POST['categoria'];

// Upload da imagem
$prod_foto = "";
if(isset($_FILES['prod_foto']) && $_FILES['prod_foto']['error'] == 0){
    $pasta = "../uploads/";
    if(!is_dir($pasta)){
        mkdir($pasta, 0777, true);
    }
    $nomeArquivo = time() . "_" . basename($_FILES["prod_foto"]["name"]);
    $caminho = $pasta . $nomeArquivo;
    if(move_uploaded_file($_FILES["prod_foto"]["tmp_name"], $caminho)){
        $prod_foto = $caminho;
    }
}


$sql = "INSERT INTO produtos(id_prod,prod_nome, prod_preco,prod_descricao, categoria, prod_foto) 
VALUES ('$id_prod','$prod_nome','$prod_preco','$prod_descricao','$prod_categoria','$prod_foto')";

if($conn->query($sql) === TRUE){
    echo 
    "<script>
    alert('Dados cadastrados com sucesso!');
    window.location.href='formProd.php';
    </script>";
}else{
    echo 'Erro ao inserir:'.$conn->error;
}


?>