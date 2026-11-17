<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
require_once __DIR__ . '/../../conexao.php';

function ota_escape($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function ota_money($v) { return 'R$ ' . number_format((float)$v, 2, ',', '.'); }
function ota_cart_init() { if (!isset($_SESSION['ota_carrinho']) || !is_array($_SESSION['ota_carrinho'])) $_SESSION['ota_carrinho'] = []; }
function ota_cart_items($conn) {
    ota_cart_init(); $items=[];
    if (!$_SESSION['ota_carrinho']) return $items;
    $ids=array_values(array_filter(array_map('intval', array_keys($_SESSION['ota_carrinho']))));
    if (!$ids) return $items;
    $res=$conn->query('SELECT id_prod, prod_nome, prod_foto, prod_preco, prod_descricao FROM produtos WHERE id_prod IN ('.implode(',', $ids).')');
    if ($res) while($p=$res->fetch_assoc()) {
        $id=(int)$p['id_prod']; $q=max(1,min(99,(int)($_SESSION['ota_carrinho'][$id]??1)));
        $p['quantidade']=$q; $p['subtotal']=$q*(float)$p['prod_preco']; $items[$id]=$p;
    }
    // Remove products deleted from the catalog.
    foreach(array_keys($_SESSION['ota_carrinho']) as $id) if(!isset($items[(int)$id])) unset($_SESSION['ota_carrinho'][$id]);
    return $items;
}
function ota_cart_total($items) { $total=0; foreach($items as $p) $total+=(float)$p['subtotal']; return $total; }
function ota_redirect($to) { header('Location: '.$to); exit; }
function ota_ensure_order_tables($conn) {
    $conn->query("CREATE TABLE IF NOT EXISTS pedido_itens (
      id_item INT NOT NULL AUTO_INCREMENT PRIMARY KEY, id_pedido INT NOT NULL, id_prod INT NOT NULL,
      nome_produto VARCHAR(120) NOT NULL, quantidade INT NOT NULL, preco_unitario DECIMAL(10,2) NOT NULL,
      subtotal DECIMAL(10,2) NOT NULL, INDEX (id_pedido), INDEX (id_prod)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    $conn->query("CREATE TABLE IF NOT EXISTS pedido_entrega (
      id_pedido INT NOT NULL PRIMARY KEY, nome_cliente VARCHAR(100) NOT NULL, email VARCHAR(120) DEFAULT NULL,
      telefone VARCHAR(30) NOT NULL, cep VARCHAR(15) DEFAULT NULL, logradouro VARCHAR(120) NOT NULL,
      numero VARCHAR(20) NOT NULL, complemento VARCHAR(100) DEFAULT NULL, bairro VARCHAR(80) NOT NULL,
      cidade VARCHAR(80) NOT NULL, estado VARCHAR(2) DEFAULT NULL, referencia VARCHAR(180) DEFAULT NULL,
      observacoes TEXT DEFAULT NULL, forma_pagamento VARCHAR(30) NOT NULL, criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}
ota_cart_init();
