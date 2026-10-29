<?php
include "funcoes_carrinho.php";

/* Precisa estar logado e ter produtos no carrinho */
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

/* ---------------------------------------------------------
   Recebe os dados enviados pela tela finalizar.php,
   valida e guarda na sessão. Depois recarrega esta página
   (assim, ao atualizar, o formulário não é reenviado).
--------------------------------------------------------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* campo => tamanho máximo (igual ao do banco de dados) */
    $limites = [
        'nome' => 100, 'email' => 100, 'telefone' => 20,
        'cep' => 12, 'rua' => 50, 'numero' => 10,
        'complemento' => 30, 'bairro' => 35, 'cidade' => 30,
        'referencia' => 100, 'observacoes' => 300
    ];

    $dados = [];

    foreach ($limites as $campo => $max) {
        $valor = trim($_POST[$campo] ?? '');
        $dados[$campo] = mb_substr($valor, 0, $max, 'UTF-8');
    }

    $dados['id_pag'] = (int)($_POST['id_pag'] ?? 0);

    $erro = '';

    foreach (['nome', 'telefone', 'cep', 'rua', 'numero', 'bairro', 'cidade'] as $campo) {
        if ($dados[$campo] === '') {
            $erro = "Preencha todos os campos obrigatórios.";
            break;
        }
    }

    if ($erro === '' && $dados['email'] !== '' && !filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erro = "Digite um e-mail válido.";
    }

    if ($erro === '') {
        $idPag = $dados['id_pag'];
        $stmt = $conn->prepare("SELECT id_pag FROM pagamento WHERE id_pag = ? LIMIT 1");
        $stmt->bind_param("i", $idPag);
        $stmt->execute();
        if ($stmt->get_result()->num_rows === 0) {
            $erro = "Escolha uma forma de pagamento.";
        }
        $stmt->close();
    }

    if ($erro !== '') {
        $_SESSION['rascunho'] = $dados;
        $_SESSION['erro_entrega'] = $erro;
        header("Location: finalizar.php");
        exit;
    }

    $_SESSION['entrega'] = $dados;
    header("Location: confirmar.php");
    exit;
}

/* Sem dados de entrega ainda: volta para o formulário */
if (empty($_SESSION['entrega'])) {
    header("Location: finalizar.php");
    exit;
}

$e = $_SESSION['entrega'];

/* Nome da forma de pagamento escolhida */
$idPag = (int)$e['id_pag'];
$stmt = $conn->prepare("SELECT forma_pag FROM pagamento WHERE id_pag = ? LIMIT 1");
$stmt->bind_param("i", $idPag);
$stmt->execute();
$pag = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$pag) {
    header("Location: finalizar.php");
    exit;
}

$formaPag = $pag['forma_pag'];

/* Blocos extras do endereço (o último não leva margem embaixo) */
$extras = [
    ['Complemento', $e['complemento'] !== '' ? $e['complemento'] : 'Não informado']
];

if ($e['referencia'] !== '') {
    $extras[] = ['Ponto de referência', $e['referencia']];
}

if ($e['observacoes'] !== '') {
    $extras[] = ['Observações para a entrega', $e['observacoes']];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Confirmar Pedido | Pastelaria OTA</title>

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

        <a href="finalizar.php" class="btn-voltar-topo" onclick="if (window.history.length > 1) { event.preventDefault(); window.history.back(); }">
            <i class="bi bi-arrow-left"></i> Voltar à página anterior
        </a>

        <!-- TÍTULO -->
        <div class="mb-4">
            <h1 class="titulo">
                <i class="bi bi-clipboard-check"></i>
                Confirmar pedido
            </h1>

            <p class="descricao">
                Confira todas as informações antes de concluir seu pedido.
            </p>
        </div>

        <div class="row g-4">

            <!-- INFORMAÇÕES DO PEDIDO -->
            <div class="col-lg-8">

                <!-- PRODUTOS -->
                <div class="card-ota mb-4">

                    <h2 class="subtitulo">
                        <i class="bi bi-bag-check"></i>
                        Produtos do pedido
                    </h2>

                    <?php foreach ($cart['itens'] as $item): ?>

                    <div class="produto">

                        <?php if ($item['foto'] !== ''): ?>
                            <img src="<?= h($item['foto']) ?>"
                                 alt="<?= h($item['nome']) ?>"
                                 class="produto-img"
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
                                Quantidade: <?= $item['qtd'] ?>
                            </p>

                        </div>

                        <span class="preco"><?= moeda($item['subtotal']) ?></span>

                    </div>

                    <?php endforeach; ?>

                    <div class="mt-4">
                        <a href="carrinho.php" class="btn-voltar">
                            <i class="bi bi-pencil"></i>
                            Alterar produtos
                        </a>
                    </div>

                </div>

                <!-- ENDEREÇO -->
                <div class="card-ota mb-4">

                    <h2 class="subtitulo">
                        <i class="bi bi-geo-alt"></i>
                        Endereço de entrega
                    </h2>

                    <div class="informacao">
                        <p class="informacao-titulo">Destinatário</p>
                        <p class="informacao-texto"><?= h($e['nome']) ?></p>
                    </div>

                    <div class="informacao">
                        <p class="informacao-titulo">Telefone</p>
                        <p class="informacao-texto"><?= h($e['telefone']) ?></p>
                    </div>

                    <div class="informacao">
                        <p class="informacao-titulo">Endereço</p>
                        <p class="informacao-texto">
                            <?= h($e['rua']) ?>, nº <?= h($e['numero']) ?>
                        </p>
                        <p class="informacao-texto">
                            Bairro <?= h($e['bairro']) ?> — <?= h($e['cidade']) ?> - SP
                        </p>
                        <p class="informacao-texto">
                            CEP <?= h($e['cep']) ?>
                        </p>
                    </div>

                    <?php foreach ($extras as $i => $extra): ?>
                        <div class="informacao<?= ($i === count($extras) - 1) ? ' mb-0' : '' ?>">
                            <p class="informacao-titulo"><?= h($extra[0]) ?></p>
                            <p class="informacao-texto"><?= h($extra[1]) ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="mt-4">
                        <a href="finalizar.php" class="btn-voltar">
                            <i class="bi bi-pencil"></i>
                            Alterar endereço
                        </a>
                    </div>

                </div>

                <!-- PAGAMENTO -->
                <div class="card-ota">

                    <h2 class="subtitulo">
                        <i class="bi bi-credit-card"></i>
                        Forma de pagamento
                    </h2>

                    <div class="d-flex align-items-center gap-3">
                        <i class="bi <?= icone_pagamento($formaPag) ?>"
                           style="font-size: 32px; color: #e21b23;"></i>

                        <div>
                            <strong><?= h($formaPag) ?></strong>

                            <p class="descricao mb-0">
                                Forma de pagamento selecionada
                            </p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="finalizar.php" class="btn-voltar">
                            <i class="bi bi-pencil"></i>
                            Alterar pagamento
                        </a>
                    </div>

                </div>

            </div>

            <!-- RESUMO E CONFIRMAÇÃO -->
            <div class="col-lg-4">

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
                        <strong>Total</strong>

                        <span class="total">
                            <?= moeda($cart['total']) ?>
                        </span>
                    </div>

                    <div class="aviso mt-4 mb-4">
                        <i class="bi bi-info-circle"></i>
                        Confira os produtos, o endereço e a forma de
                        pagamento antes de confirmar.
                    </div>

                    <form method="post" action="concluir.php">
                        <button type="submit" class="btn btn-ota w-100">
                        <i class="bi bi-check-circle"></i>
                        Confirmar pedido
                    </button>
                    </form>

                    <p class="text-secondary small text-center mt-3 mb-0">
                        Ao confirmar, você conclui o envio do pedido.
                    </p>

                </div>

            </div>

        </div>

    </main>

</body>
</html>