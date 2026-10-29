<?php
include "funcoes_carrinho.php";

if (!isset($_SESSION['clie'])) {
    header("Location: ../login_user.php");
    exit;
}

$idPedido = (int)($_GET['id'] ?? 0);
$cpf = (string)$_SESSION['clie_id'];

/* Só mostra o pedido se ele for deste cliente */
$stmt = $conn->prepare(
    "SELECT p.id_pedido, p.data_pedido, p.horario_pedido, p.total_ped, g.forma_pag
     FROM pedido p
     LEFT JOIN pagamento g ON g.id_pag = p.id_pag2
     WHERE p.id_pedido = ? AND p.cpf_cli2 = ?
     LIMIT 1"
);
$stmt->bind_param("is", $idPedido, $cpf);
$stmt->execute();
$pedido = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$pedido) {
    header("Location: ../../cardapio.php");
    exit;
}

/* Itens do pedido (uma linha por unidade, então agrupa e conta) */
$stmt = $conn->prepare(
    "SELECT pr.prod_nome, pr.prod_preco, COUNT(*) AS qtd
     FROM carrinho c
     INNER JOIN produtos pr ON pr.id_prod = c.id_produto
     WHERE c.id_pedido3 = ?
     GROUP BY pr.id_prod, pr.prod_nome, pr.prod_preco"
);
$stmt->bind_param("i", $idPedido);
$stmt->execute();
$itens = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pedido realizado | Pastelaria OTA</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .titulo {
            color: #e21b23;
            font-weight: bold;
        }

        .descricao {
            color: #666;
        }

        .card-ota {
            background-color: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        }

        .subtitulo {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .subtitulo i {
            color: #e21b23;
            margin-right: 8px;
        }

        .produto {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }

        .produto-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            background-color: #eee;
        }

        .produto-info {
            flex: 1;
        }

        .produto-nome {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .produto-descricao {
            font-size: 13px;
            color: #777;
            margin-bottom: 0;
        }

        .preco {
            color: #e21b23;
            font-weight: bold;
            white-space: nowrap;
        }

        .informacao {
            margin-bottom: 18px;
        }

        .informacao-titulo {
            color: #777;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .informacao-texto {
            color: #333;
            font-size: 15px;
            margin-bottom: 0;
            overflow-wrap: anywhere;
        }

        .resumo-item {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .total {
            color: #e21b23;
            font-size: 22px;
            font-weight: bold;
        }

        .divisor {
            border-color: #e5e5e5;
        }

        .aviso {
            background-color: #fff7f7;
            border: 1px solid #f2d5d5;
            border-radius: 8px;
            padding: 13px;
            color: #555;
            font-size: 13px;
        }

        .aviso i {
            color: #e21b23;
            font-size: 19px;
            margin-right: 8px;
        }

        .btn-ota {
            background-color: #e21b23;
            color: white;
            border: 1px solid #e21b23;
            border-radius: 8px;
            padding: 12px 20px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-ota:hover {
            background-color: #bd1018;
            border-color: #bd1018;
            color: white;
        }

        .btn-voltar {
            color: #e21b23;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-voltar:hover {
            color: #a9141a;
        }

        @media (max-width: 576px) {
            .card-ota {
                padding: 18px;
            }

            .produto-img {
                width: 58px;
                height: 58px;
            }

            .subtitulo {
                font-size: 18px;
            }
        }

        /* Acabamento visual compartilhado da área do cliente OTA */
        * { box-sizing: border-box; }
        body { min-height: 100vh; line-height: 1.55; }
        .container { max-width: 1180px; }
        .card-ota { border-radius: 15px; box-shadow: 0 5px 18px rgba(0,0,0,.055); transition: box-shadow .2s ease; }
        .subtitulo { padding-bottom: 13px; border-bottom: 1px solid #eeeeee; }
        .form-control, .form-select { min-height: 45px; transition: border-color .2s, box-shadow .2s; }
        .btn-ota { display: inline-flex; justify-content: center; align-items: center; gap: 8px; text-decoration: none; cursor: pointer; }
        .btn-ota:focus-visible, .btn-voltar-topo:focus-visible { outline: 3px solid rgba(255,193,7,.75); outline-offset: 3px; }
        .btn-voltar-topo { display: inline-flex; align-items: center; justify-content: center; gap: 8px; margin: 0 0 20px; padding: 10px 15px; border: 1px solid #dedede; border-radius: 9px; background: #fff; color: #333; text-decoration: none; font-weight: 700; transition: .2s ease; }
        .btn-voltar-topo:hover { background: #ffc107; border-color: #ffc107; color: #333; transform: translateX(-2px); }
        .titulo { line-height: 1.2; margin-bottom: 10px; }
        img { max-width: 100%; }
        @media (max-width: 576px) {
            .container { padding-left: 14px; padding-right: 14px; }
            .card-ota { padding: 18px; border-radius: 13px; }
            .btn-ota { width: 100%; }
            .btn-voltar-topo { margin-bottom: 16px; }
        }
    </style>
</head>

<body>

    <main class="container py-4 py-md-5">

        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="card-ota text-center">

                    <i class="bi bi-check-circle-fill"
                       style="font-size: 64px; color: #198754;"></i>

                    <h1 class="titulo mt-3">
                        Pedido realizado!
                    </h1>

                    <p class="descricao">
                        Seu pedido nº <?= (int)$pedido['id_pedido'] ?> foi enviado para a Pastelaria OTA.
                    </p>

                    <div class="text-start mt-4">

                        <?php foreach ($itens as $item): ?>
                            <div class="resumo-item">
                                <span><?= h($item['prod_nome']) ?> × <?= (int)$item['qtd'] ?></span>
                                <span><?= moeda($item['prod_preco'] * $item['qtd']) ?></span>
                            </div>
                        <?php endforeach; ?>

                        <hr class="divisor">

                        <div class="resumo-item">
                            <span>Pagamento</span>
                            <span><?= h($pedido['forma_pag']) ?></span>
                        </div>

                        <div class="resumo-item">
                            <span>Data</span>
                            <span>
                                <?= h(date('d/m/Y', strtotime($pedido['data_pedido']))) ?>
                                às <?= h(substr($pedido['horario_pedido'], 0, 5)) ?>
                            </span>
                        </div>

                        <hr class="divisor">

                        <div class="resumo-item align-items-center">
                            <strong>Total</strong>
                            <span class="total"><?= moeda($pedido['total_ped']) ?></span>
                        </div>

                    </div>

                    <a href="../../cardapio.php" class="btn btn-ota mt-4">
                        <i class="bi bi-arrow-left"></i>
                        Voltar ao cardápio
                    </a>

                </div>

            </div>
        </div>

    </main>

</body>
</html>
