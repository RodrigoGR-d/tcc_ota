<?php
/* =========================================================
   CONCLUIR PEDIDO
   Chamado pelo botão "Confirmar pedido" (confirmar.php).
   Grava no banco: endereco, pedido e carrinho (itens).
========================================================= */

include "funcoes_carrinho.php";

/* Faz o mysqli lançar exceções, para o try/catch funcionar */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

date_default_timezone_set('America/Sao_Paulo');

/* Só aceita quem clicou no botão (POST) */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: carrinho.php");
    exit;
}

/* Precisa estar logado, com carrinho e com os dados de entrega */
if (!isset($_SESSION['clie'])) {
    $_SESSION['voltar_login'] = "carrinho/carrinho.php";
    header("Location: ../login_user.php");
    exit;
}

$cart = carrinho_itens($conn);

if (empty($cart['itens'])) {
    header("Location: carrinho.php");
    exit;
}

if (empty($_SESSION['entrega'])) {
    header("Location: finalizar.php");
    exit;
}

$e = $_SESSION['entrega'];
$cpf = (string)$_SESSION['clie_id'];

try {

    $conn->begin_transaction();

    /* ---------- 1) ENDEREÇO ----------
       Se o cliente já tem esse endereço, reaproveita. */
    $numero = (int)preg_replace('/\D/', '', $e['numero']);
    $estado = "SP";

    $stmt = $conn->prepare(
        "SELECT id_endereco FROM endereco
         WHERE cpf_cli4 = ? AND logradouro_cli = ? AND numero_cli = ? AND cep_cli = ?
         LIMIT 1"
    );
    $stmt->bind_param("ssis", $cpf, $e['rua'], $numero, $e['cep']);
    $stmt->execute();
    $achou = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$achou) {
        $stmt = $conn->prepare(
            "INSERT INTO endereco
             (logradouro_cli, numero_cli, complemento_cli, bairro_cli,
              cidade_cli, estado_cli, cep_cli, cpf_cli4)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "sissssss",
            $e['rua'],
            $numero,
            $e['complemento'],
            $e['bairro'],
            $e['cidade'],
            $estado,
            $e['cep'],
            $cpf
        );
        $stmt->execute();
        $stmt->close();
    }

    /* ---------- 2) PEDIDO ----------
       O total é recalculado aqui com os preços do banco. */
    $total = (float)$cart['total'];
    $idPag = (int)$e['id_pag'];
    $data = date('Y-m-d');
    $hora = date('H:i:s');

    $stmt = $conn->prepare(
        "INSERT INTO pedido (data_pedido, horario_pedido, total_ped, id_pag2, cpf_cli2)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("ssdis", $data, $hora, $total, $idPag, $cpf);
    $stmt->execute();
    $idPedido = $conn->insert_id;
    $stmt->close();

    /* ---------- 3) ITENS DO CARRINHO ----------
       A tabela carrinho não tem coluna de quantidade, então
       é gravada uma linha para cada unidade do produto. */
    $stmt = $conn->prepare(
        "INSERT INTO carrinho (id_item, id_pedido3, id_produto) VALUES (?, ?, ?)"
    );

    $numeroItem = 1;

    foreach ($cart['itens'] as $item) {
        for ($i = 0; $i < $item['qtd']; $i++) {
            $idProduto = $item['id'];
            $stmt->bind_param("iii", $numeroItem, $idPedido, $idProduto);
            $stmt->execute();
            $numeroItem++;
        }
    }

    $stmt->close();

    $conn->commit();

} catch (Throwable $erro) {

    $conn->rollback();

    $_SESSION['erro_entrega'] = "Não foi possível concluir o pedido. Tente novamente.";
    header("Location: finalizar.php");
    exit;
}

/* Pedido gravado: esvazia o carrinho e vai para a tela de sucesso */
$_SESSION['carrinho'] = [];
unset($_SESSION['entrega']);

header("Location: sucesso.php?id=" . $idPedido);
exit;
