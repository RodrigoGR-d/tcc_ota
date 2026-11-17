<?php
require_once __DIR__ . '/funcoes_carrinho.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') ota_redirect('../../cardapio.php');
$id = filter_input(INPUT_POST, 'id_prod', FILTER_VALIDATE_INT);
$qtd = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT) ?: 1;
if (!$id || $qtd < 1 || $qtd > 99) { $_SESSION['ota_aviso']='Produto ou quantidade inválida.'; ota_redirect('../../cardapio.php'); }
$stmt=$conn->prepare('SELECT id_prod FROM produtos WHERE id_prod=?'); $stmt->bind_param('i',$id); $stmt->execute(); $ok=$stmt->get_result()->num_rows>0; $stmt->close();
if (!$ok) { $_SESSION['ota_aviso']='Esse produto não está mais disponível.'; ota_redirect('../../cardapio.php'); }
ota_cart_init(); $_SESSION['ota_carrinho'][$id]=min(99,(int)($_SESSION['ota_carrinho'][$id]??0)+$qtd);
$_SESSION['ota_aviso']='Produto adicionado ao carrinho!'; ota_redirect('carrinho.php');
