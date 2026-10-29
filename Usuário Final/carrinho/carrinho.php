<?php
include "funcoes_carrinho.php";

/* Botões de + / - / lixeira do carrinho */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = (int) ($_POST['id_prod'] ?? 0);
    $acao = $_POST['acao'] ?? '';

    if ($id > 0 && isset($_SESSION['carrinho'][$id])) {

        if ($acao === 'mais' && $_SESSION['carrinho'][$id] < 20) {
            $_SESSION['carrinho'][$id]++;
        } elseif ($acao === 'menos') {
            $_SESSION['carrinho'][$id]--;
            if ($_SESSION['carrinho'][$id] <= 0) {
                unset($_SESSION['carrinho'][$id]);
            }
        } elseif ($acao === 'remover') {
            unset($_SESSION['carrinho'][$id]);
        }
    }

    header("Location: carrinho.php");
    exit;
}

$cart = carrinho_itens($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu Carrinho | Pastelaria OTA</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --ota-dark: #333333;
            --ota-red: #e21b23;
            --ota-yellow: #ffc107;
            --ota-muted: #747474;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f5f5;
            color: var(--ota-dark);
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            max-width: 1180px;
        }

        .topo-carrinho {
            background: var(--ota-dark);
            color: #fff;
            border-radius: 16px;
            padding: 25px 28px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 7px 20px rgba(0, 0, 0, .10);
        }

        .topo-carrinho:after {
            content: "";
            position: absolute;
            width: 145px;
            height: 145px;
            border: 22px solid rgba(255, 193, 7, .13);
            border-radius: 50%;
            right: -28px;
            top: -52px;
        }

        .topo-carrinho .titulo {
            color: #fff;
            font-size: clamp(1.65rem, 4vw, 2.2rem);
            font-weight: 800;
            margin: 0 0 8px;
        }

        .topo-carrinho .titulo i {
            color: var(--ota-yellow);
            margin-right: 8px;
        }

        .descricao {
            color: #dedede;
            margin: 0;
        }

        .etiqueta-cliente {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--ota-yellow);
            font-size: .78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .card-ota {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, .045);
            height: 100%;
        }

        .subtitulo {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--ota-dark);
            margin-bottom: 22px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .subtitulo i {
            color: var(--ota-red);
            margin-right: 8px;
        }

        .produto {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 19px 0;
            border-bottom: 1px solid #eee;
        }

        .produto:first-of-type {
            padding-top: 0;
        }

        .produto:last-of-type {
            border-bottom: 0;
        }

        .produto-img {
            width: 94px;
            height: 94px;
            object-fit: cover;
            border-radius: 12px;
            background: #eee;
            border: 1px solid #eee;
            flex-shrink: 0;
        }

        .produto-info {
            flex: 1;
            min-width: 0;
        }

        .produto-nome {
            font-size: 1rem;
            font-weight: 800;
            margin: 0 0 5px;
            line-height: 1.35;
        }

        .produto-descricao {
            color: var(--ota-muted);
            font-size: .85rem;
            margin: 0 0 8px;
        }

        .preco {
            color: var(--ota-red);
            font-weight: 800;
            font-size: 1rem;
        }

        .quantidade {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .quantidade span {
            min-width: 18px;
            text-align: center;
            font-weight: 700;
        }

        .btn-qtd {
            width: 31px;
            height: 31px;
            background: #fff;
            color: var(--ota-dark);
            border: 1px solid #d9d9d9;
            border-radius: 8px;
            font-weight: 800;
            transition: .2s;
        }

        .btn-qtd:hover {
            background: var(--ota-yellow);
            border-color: var(--ota-yellow);
            color: var(--ota-dark);
        }

        .btn-remover {
            background: #fff5f5;
            border: 0;
            color: var(--ota-red);
            font-size: 18px;
            padding: 8px 10px;
            border-radius: 8px;
            transition: .2s;
        }

        .btn-remover:hover {
            background: var(--ota-red);
            color: #fff;
        }

        .resumo-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            font-size: .92rem;
        }

        .resumo-item span:last-child {
            text-align: right;
        }

        .total {
            color: var(--ota-red);
            font-size: 1.55rem;
            font-weight: 900;
        }

        .divisor {
            border-color: #e5e5e5;
            opacity: 1;
            margin: 20px 0;
        }

        .btn-ota {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            background: var(--ota-red);
            color: #fff;
            border: 1px solid var(--ota-red);
            border-radius: 9px;
            padding: 13px 18px;
            font-weight: 800;
            transition: .25s;
        }

        .btn-ota:hover {
            background: #bd1018;
            border-color: #bd1018;
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-voltar {
            color: var(--ota-dark);
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-voltar:hover {
            color: var(--ota-red);
        }

        .aviso {
            background: #fff9e6;
            border: 1px solid #f4df9b;
            border-radius: 10px;
            padding: 13px;
            color: #5e5129;
            font-size: .82rem;
            line-height: 1.5;
        }

        .aviso i {
            color: #9a7200;
            font-size: 18px;
            margin-right: 7px;
        }

        .resumo-selo {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #4f7b45;
            font-size: .82rem;
            font-weight: 700;
            margin-top: 17px;
        }

        .resumo-selo i {
            font-size: 1.1rem;
        }

        @media (min-width: 992px) {
            .resumo-coluna {
                align-self: flex-start;
                position: sticky;
                top: 20px;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 14px;
                padding-right: 14px;
            }

            .topo-carrinho {
                padding: 22px 19px;
                border-radius: 13px;
            }

            .card-ota {
                padding: 18px;
                border-radius: 13px;
            }

            .produto {
                gap: 11px;
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .produto-img {
                width: 74px;
                height: 74px;
            }

            .produto-nome {
                font-size: .9rem;
            }

            .produto-descricao {
                font-size: .78rem;
            }

            .btn-remover {
                margin-left: auto;
            }

            .total {
                font-size: 1.35rem;
            }
        }

        /* Acabamento visual compartilhado da área do cliente OTA */
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            line-height: 1.55;
        }

        .container {
            max-width: 1180px;
        }

        .card-ota {
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, .055);
            transition: box-shadow .2s ease;
        }

        .subtitulo {
            padding-bottom: 13px;
            border-bottom: 1px solid #eeeeee;
        }

        .form-control,
        .form-select {
            min-height: 45px;
            transition: border-color .2s, box-shadow .2s;
        }

        .btn-ota {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-ota:focus-visible,
        .btn-voltar-topo:focus-visible {
            outline: 3px solid rgba(255, 193, 7, .75);
            outline-offset: 3px;
        }

        .btn-voltar-topo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin: 0 0 20px;
            padding: 10px 15px;
            border: 1px solid #dedede;
            border-radius: 9px;
            background: #fff;
            color: #333;
            text-decoration: none;
            font-weight: 700;
            transition: .2s ease;
        }

        .btn-voltar-topo:hover {
            background: #ffc107;
            border-color: #ffc107;
            color: #333;
            transform: translateX(-2px);
        }

        .titulo {
            line-height: 1.2;
            margin-bottom: 10px;
        }

        img {
            max-width: 100%;
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 14px;
                padding-right: 14px;
            }

            .card-ota {
                padding: 18px;
                border-radius: 13px;
            }

            .btn-ota {
                width: 100%;
            }

            .btn-voltar-topo {
                margin-bottom: 16px;
            }
        }
    </style>
</head>

<body>

    <main class="container py-4 py-md-5">

        <a href="../../cardapio.php" class="btn-voltar-topo"
            onclick="if (window.history.length > 1) { event.preventDefault(); window.history.back(); }">
            <i class="bi bi-arrow-left"></i> Voltar à página anterior
        </a>

        <!-- APRESENTAÇÃO DO CARRINHO PARA O CLIENTE -->
        <div class="topo-carrinho">
            <div class="etiqueta-cliente"><i class="bi bi-shop"></i> Ota Pastéis · Pedido online</div>
            <h1 class="titulo"><i class="bi bi-cart3"></i> Meu carrinho</h1>
            <p class="descricao">Confira seus pastéis favoritos antes de finalizar o pedido.</p>
        </div>

        <div class="row g-4">

            <!-- LISTA DE PRODUTOS -->
            <div class="col-lg-8">

                <div class="card-ota">

                    <h2 class="subtitulo">
                        <i class="bi bi-bag"></i>
                        Produtos selecionados
                    </h2>

                    <?php if (empty($cart['itens'])): ?>

                        <div class="text-center py-5">
                            <i class="bi bi-cart-x" style="font-size: 48px; color: #aaa;"></i>
                            <h3 class="produto-nome mt-3">Seu carrinho está vazio</h3>
                            <p class="produto-descricao">
                                Escolha seus pastéis favoritos no cardápio.
                            </p>
                        </div>

                    <?php endif; ?>

                    <?php foreach ($cart['itens'] as $item): ?>

                        <div class="produto">

                            <?php if ($item['foto'] !== ''): ?>
                                <img src="<?= h($item['foto']) ?>" alt="<?= h($item['nome']) ?>" class="produto-img"
                                    onerror="this.onerror=null; this.style.display='none';">
                            <?php else: ?>
                                <div class="produto-img d-flex align-items-center justify-content-center">
                                    <i class="bi bi-image" style="font-size: 30px; color: #aaa;"></i>
                                </div>
                            <?php endif; ?>

                            <div class="produto-info">

                                <h3 class="produto-nome">
                                    <?= h($item['nome']) ?>
                                </h3>

                                <p class="produto-descricao">
                                    <?= h($item['descricao']) ?>
                                </p>

                                <span class="preco"><?= moeda($item['preco']) ?></span>

                                <div class="quantidade">
                                    <form method="post" style="display: contents;">
                                        <input type="hidden" name="id_prod" value="<?= $item['id'] ?>">

                                        <button type="submit" name="acao" value="menos" class="btn-qtd">
                                            −
                                        </button>

                                        <span><?= $item['qtd'] ?></span>

                                        <button type="submit" name="acao" value="mais" class="btn-qtd">
                                            +
                                        </button>
                                    </form>
                                </div>

                            </div>

                            <form method="post" style="display: contents;">
                                <input type="hidden" name="id_prod" value="<?= $item['id'] ?>">

                                <button type="submit" name="acao" value="remover" class="btn-remover"
                                    aria-label="Remover <?= h($item['nome']) ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </div>

                    <?php endforeach; ?>

                    <div class="mt-4">
                        <a href="../../cardapio.php" class="btn-voltar">
                            <i class="bi bi-arrow-left"></i>
                            Continuar comprando
                        </a>
                    </div>

                </div>

            </div>

            <!-- RESUMO DO PEDIDO -->
            <div class="col-lg-4 resumo-coluna">

                <div class="card-ota">

                    <h2 class="subtitulo">
                        <i class="bi bi-receipt"></i>
                        Resumo do pedido
                    </h2>

                    <div class="resumo-item">
                        <span>Subtotal</span>
                        <span><?= moeda($cart['total']) ?></span>
                    </div>

                    <div class="resumo-item">
                        <span>Entrega</span>
                        <span>A calcular</span>
                    </div>

                    <hr class="divisor">

                    <div class="resumo-item align-items-center">
                        <strong>Total dos produtos</strong>

                        <span class="total">
                            <?= moeda($cart['total']) ?>
                        </span>
                    </div>

                    <a href="<?= $cart['itens'] ? 'finalizar.php' : '#' ?>"
                        class="btn btn-ota w-100 mt-3 <?= $cart['itens'] ? '' : 'disabled' ?>">
                        Finalizar pedido
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <div class="aviso mt-4">
                        <i class="bi bi-info-circle"></i>
                        Confira os produtos e as quantidades antes de continuar para os dados de entrega.
                    </div>
                    <div class="resumo-selo"><i class="bi bi-shield-check"></i> Mais um passo para matar a fome!</div>

                </div>

            </div>

        </div>

    </main>

</body>

</html>