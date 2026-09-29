<?php

include "../../conexao.php";

$id_prod = $_POST['id_prod'] ?? '';
$prod_nome = $_POST['prod_nome'] ?? '';
$prod_preco = $_POST['prod_preco'] ?? '';
$prod_descricao = $_POST['prod_descricao'] ?? '';
$prod_categoria = $_POST['categoria'] ?? '';

if ($id_prod === '' || $prod_nome === '' || $prod_preco === '' || $prod_descricao === '' || $prod_categoria === '') {
    die("Dados do produto incompletos.");
}

/* Busca a imagem atual */
$stmt = $conn->prepare("SELECT prod_foto FROM produtos WHERE id_prod = ?");
$stmt->bind_param("i", $id_prod);
$stmt->execute();
$resultado = $stmt->get_result();
$produtoAtual = $resultado->fetch_assoc();
$prod_foto = $produtoAtual['prod_foto'] ?? '';

/* Se uma nova imagem foi escolhida, faz o upload */
if (isset($_FILES['prod_foto']) && $_FILES['prod_foto']['error'] === UPLOAD_ERR_OK) {

    $pasta = "../uploads/";

    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $nomeArquivo = time() . "_" . basename($_FILES['prod_foto']['name']);
    $caminho = $pasta . $nomeArquivo;

    if (move_uploaded_file($_FILES['prod_foto']['tmp_name'], $caminho)) {
        $prod_foto = $caminho;
    }
}

/* Atualiza o produto */
$stmt = $conn->prepare(
    "UPDATE produtos
     SET prod_nome = ?, prod_preco = ?, prod_descricao = ?, categoria = ?, prod_foto = ?
     WHERE id_prod = ?"
);

$stmt->bind_param(
    "sssssi",
    $prod_nome,
    $prod_preco,
    $prod_descricao,
    $prod_categoria,
    $prod_foto,
    $id_prod
);

if ($stmt->execute()) {

    echo "
    <script>
        alert('Dados alterados com sucesso!');
        window.location.href='vizuprod.php';
    </script>";

} else {

    echo "Erro ao alterar: " . $conn->error;
}

?>
