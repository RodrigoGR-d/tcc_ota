<?php
/* =========================================================
   FUNÇÕES DO CARRINHO
   Usadas por: adicionar, carrinho, finalizar, confirmar,
   concluir e sucesso.

   O carrinho fica guardado na SESSÃO, em $_SESSION['carrinho'],
   no formato [ id_do_produto => quantidade ].
   Os preços NUNCA vêm da tela: são sempre buscados no banco.
========================================================= */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* Conexão com o banco (fica duas pastas acima desta) */
include_once __DIR__ . "/../../conexao.php";

if (!isset($_SESSION['carrinho']) || !is_array($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

/* Protege o texto antes de mostrar na tela */
if (!function_exists('h')) {
    function h($texto)
    {
        return htmlspecialchars((string)$texto, ENT_QUOTES, 'UTF-8');
    }
}

/* Formata um valor como dinheiro: 36.5 -> R$ 36,50 */
function moeda($valor)
{
    return "R$ " . number_format((float)$valor, 2, ',', '.');
}

/* Busca no banco os produtos que estão no carrinho e calcula os totais */
function carrinho_itens($conn)
{
    $retorno = ['itens' => [], 'total' => 0.0, 'qtd' => 0];

    if (empty($_SESSION['carrinho'])) {
        return $retorno;
    }

    $ids = array_map('intval', array_keys($_SESSION['carrinho']));
    $lista = implode(',', $ids);

    $res = $conn->query("SELECT * FROM produtos WHERE id_prod IN ($lista)");
    $encontrados = [];

    if ($res) {
        while ($p = $res->fetch_assoc()) {

            $id = (int)$p['id_prod'];
            $qtd = (int)$_SESSION['carrinho'][$id];
            $preco = (float)$p['prod_preco'];
            $subtotal = $preco * $qtd;

            /* As fotos ficam em "Painel adm/uploads" */
            $foto = "";
            if (!empty($p['prod_foto'])) {
                $foto = "../../Painel adm/uploads/" . rawurlencode(basename($p['prod_foto']));
            }

            $retorno['itens'][] = [
                'id'        => $id,
                'nome'      => $p['prod_nome'],
                'descricao' => $p['prod_descricao'],
                'preco'     => $preco,
                'qtd'       => $qtd,
                'subtotal'  => $subtotal,
                'foto'      => $foto
            ];

            $retorno['total'] += $subtotal;
            $retorno['qtd'] += $qtd;
            $encontrados[$id] = true;
        }
    }

    /* Se algum produto foi apagado do banco, tira do carrinho */
    foreach ($ids as $id) {
        if (!isset($encontrados[$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }

    $retorno['total'] = round($retorno['total'], 2);

    return $retorno;
}

/* Lista as formas de pagamento. Se a tabela estiver vazia,
   cadastra as formas básicas automaticamente. */
function carregar_pagamentos($conn)
{
    $res = $conn->query("SELECT id_pag, forma_pag FROM pagamento ORDER BY id_pag");

    if ($res && $res->num_rows === 0) {

        $formas = ['Pix', 'Cartão de crédito', 'Cartão de débito', 'Dinheiro'];

        foreach ($formas as $forma) {
            $stmt = $conn->prepare("INSERT INTO pagamento (forma_pag) VALUES (?)");
            $stmt->bind_param("s", $forma);
            $stmt->execute();
            $stmt->close();
        }

        $res = $conn->query("SELECT id_pag, forma_pag FROM pagamento ORDER BY id_pag");
    }

    $lista = [];

    while ($res && $linha = $res->fetch_assoc()) {
        $lista[] = $linha;
    }

    return $lista;
}

/* Escolhe um ícone do Bootstrap Icons conforme o nome da forma de pagamento */
function icone_pagamento($forma)
{
    $f = mb_strtolower((string)$forma, 'UTF-8');

    if (strpos($f, 'pix') !== false) {
        return 'bi-qr-code';
    }
    if (strpos($f, 'cart') !== false) {
        return 'bi-credit-card';
    }
    if (strpos($f, 'dinheiro') !== false) {
        return 'bi-cash-coin';
    }

    return 'bi-wallet2';
}
