<?php
/* =========================================================
   ADICIONAR PRODUTO AO CARRINHO
   Chamado pelo botão "Adicionar ao carrinho" do cardápio.
   Recebe o id do produto (POST) e responde em JSON.
========================================================= */

include "funcoes_carrinho.php";

header('Content-Type: application/json; charset=utf-8');

$id = isset($_POST['id_prod']) ? (int)$_POST['id_prod'] : 0;

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $id <= 0) {
    http_response_code(400);
    echo json_encode(['ok' => false]);
    exit;
}

/* Confere se o produto existe mesmo no banco */
$stmt = $conn->prepare("SELECT id_prod FROM produtos WHERE id_prod = ? LIMIT 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$existe = $stmt->get_result()->num_rows === 1;
$stmt->close();

if (!$existe) {
    http_response_code(404);
    echo json_encode(['ok' => false]);
    exit;
}

/* Soma 1 na quantidade (máximo de 20 por produto) */
if (!isset($_SESSION['carrinho'][$id])) {
    $_SESSION['carrinho'][$id] = 0;
}

if ($_SESSION['carrinho'][$id] < 20) {
    $_SESSION['carrinho'][$id]++;
}

echo json_encode([
    'ok'  => true,
    'qtd' => array_sum($_SESSION['carrinho'])
]);
