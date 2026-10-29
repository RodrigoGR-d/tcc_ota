<?php
include "funcoes_carrinho.php";

/* Precisa estar logado para informar a entrega */
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

$pagamentos = carregar_pagamentos($conn);

/* Mensagem de erro vinda do confirmar.php / concluir.php */
$erro = $_SESSION['erro_entrega'] ?? '';
unset($_SESSION['erro_entrega']);

/* Valores que aparecem preenchidos no formulário:
   1) o que o cliente acabou de digitar (se deu erro)
   2) o que ele já tinha informado antes
   3) os dados do cadastro dele */
$f = [];

if (!empty($_SESSION['rascunho'])) {
    $f = $_SESSION['rascunho'];
    unset($_SESSION['rascunho']);
} elseif (!empty($_SESSION['entrega'])) {
    $f = $_SESSION['entrega'];
} else {
    $cpf = (string)$_SESSION['clie_id'];
    $stmt = $conn->prepare("SELECT nome_cli, email_cli, telefone_cli FROM cliente WHERE cpf_cli = ? LIMIT 1");
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $cli = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($cli) {
        $f['nome'] = $cli['nome_cli'];
        $f['email'] = $cli['email_cli'];
        $f['telefone'] = $cli['telefone_cli'];
    }
}

/* Devolve o valor de um campo já protegido para o HTML */
function campo($f, $nome)
{
    return h($f[$nome] ?? '');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dados de Entrega | Pastelaria OTA</title>

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

        /* Título */
        .titulo {
            color: #e21b23;
            font-weight: bold;
        }

        .descricao {
            color: #666;
        }

        /* Cards */
        .card-ota {
            background-color: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 25px;
            height: auto;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        }

        .subtitulo {
            font-size: 21px;
            font-weight: bold;
            color: #333;
            margin-bottom: 22px;
        }

        .subtitulo i {
            color: #e21b23;
            margin-right: 8px;
        }

        /* Campos */
        .form-label {
            color: #333;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            background-color: #fff;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 7px;
            padding: 11px 12px;
        }

        .form-control::placeholder {
            color: #999;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #fff;
            color: #333;
            border-color: #e21b23;
            box-shadow: 0 0 0 0.2rem rgba(226, 27, 35, 0.12);
        }

        /* Resumo */
        .resumo-item {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .resumo-item span:last-child {
            text-align: right;
        }

        .total {
            color: #e21b23;
            font-size: 21px;
            font-weight: bold;
        }

        .divisor {
            border-color: #e5e5e5;
        }

        /* Avisos */
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

        /* Botões */
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

            .subtitulo {
                font-size: 19px;
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

        <a href="carrinho.php" class="btn-voltar-topo" onclick="if (window.history.length > 1) { event.preventDefault(); window.history.back(); }">
            <i class="bi bi-arrow-left"></i> Voltar à página anterior
        </a>

        <!-- TÍTULO -->
        <div class="mb-4">
            <h1 class="titulo">
                <i class="bi bi-geo-alt-fill"></i>
                Dados de entrega
            </h1>

            <p class="descricao">
                Informe onde deseja receber seu pedido da OTA.
            </p>
        </div>

        <div class="row g-4">

            <!-- FORMULÁRIO DE ENTREGA -->
            <div class="col-lg-8">

                <div class="card-ota">

                    <h2 class="subtitulo">
                        <i class="bi bi-person-vcard"></i>
                        Informações para entrega
                    </h2>

                    <?php if ($erro !== ''): ?>
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-circle"></i>
                            <?= h($erro) ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="confirmar.php">

                        <div class="row g-3">

                            <div class="col-12">
                                <label class="form-label">
                                    Nome completo
                                </label>
                                <input type="text"
                                       name="nome"
                                       class="form-control"
                                       placeholder="Digite seu nome completo"
                                       value="<?= campo($f, 'nome') ?>"
                                       maxlength="100"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    E-mail
                                </label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="seuemail@exemplo.com"
                                       value="<?= campo($f, 'email') ?>"
                                       maxlength="100">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Telefone
                                </label>
                                <input type="tel"
                                       name="telefone"
                                       class="form-control"
                                       placeholder="(12) 99999-9999"
                                       value="<?= campo($f, 'telefone') ?>"
                                       maxlength="20"
                                       required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">
                                    CEP
                                </label>
                                <input type="text"
                                       name="cep"
                                       class="form-control"
                                       placeholder="00000-000"
                                       value="<?= campo($f, 'cep') ?>"
                                       maxlength="12"
                                       required>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">
                                    Rua ou avenida
                                </label>
                                <input type="text"
                                       name="rua"
                                       class="form-control"
                                       placeholder="Nome da rua ou avenida"
                                       value="<?= campo($f, 'rua') ?>"
                                       maxlength="50"
                                       required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">
                                    Número
                                </label>
                                <input type="text"
                                       name="numero"
                                       class="form-control"
                                       placeholder="Nº da residência"
                                       value="<?= campo($f, 'numero') ?>"
                                       maxlength="10"
                                       required>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">
                                    Complemento (opcional)
                                </label>
                                <input type="text"
                                       name="complemento"
                                       class="form-control"
                                       placeholder="Casa, apartamento, bloco..."
                                       value="<?= campo($f, 'complemento') ?>"
                                       maxlength="30">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Bairro
                                </label>
                                <input type="text"
                                       name="bairro"
                                       class="form-control"
                                       placeholder="Digite seu bairro"
                                       value="<?= campo($f, 'bairro') ?>"
                                       maxlength="35"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Cidade
                                </label>
                                <input type="text"
                                       name="cidade"
                                       class="form-control"
                                       placeholder="Digite sua cidade"
                                       value="<?= campo($f, 'cidade') ?>"
                                       maxlength="30"
                                       required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">
                                    Ponto de referência (opcional)
                                </label>
                                <input type="text"
                                       name="referencia"
                                       class="form-control"
                                       placeholder="Ex.: próximo à praça"
                                       value="<?= campo($f, 'referencia') ?>"
                                       maxlength="100">
                            </div>

                            <div class="col-12">
                                <label class="form-label">
                                    Observações para a entrega
                                </label>
                                <textarea name="observacoes"
                                          class="form-control"
                                          rows="3"
                                          maxlength="300"
                                          placeholder="Informações adicionais para o entregador"><?= campo($f, 'observacoes') ?></textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">
                                    Forma de pagamento
                                </label>

                                <?php foreach ($pagamentos as $pg): ?>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="id_pag"
                                               id="pag<?= (int)$pg['id_pag'] ?>"
                                               value="<?= (int)$pg['id_pag'] ?>"
                                               <?= ((int)($f['id_pag'] ?? 0) === (int)$pg['id_pag']) ? 'checked' : '' ?>
                                               required>
                                        <label class="form-check-label" for="pag<?= (int)$pg['id_pag'] ?>">
                                            <i class="bi <?= icone_pagamento($pg['forma_pag']) ?>"></i>
                                            <?= h($pg['forma_pag']) ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>

                        <div class="aviso mt-4">
                            <i class="bi bi-shield-check"></i>
                            Confira seus dados para ajudar a garantir
                            que seu pedido chegue ao endereço correto.
                        </div>

                        <div class="d-flex flex-column flex-sm-row
                                    justify-content-between gap-3 mt-4">

                            <a href="carrinho.php" class="btn-voltar">
                                <i class="bi bi-arrow-left"></i>
                                Voltar ao carrinho
                            </a>

                            <button type="submit" class="btn btn-ota">
                                Continuar para pagamento
                                <i class="bi bi-arrow-right"></i>
                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- RESUMO DO PEDIDO -->
            <div class="col-lg-4">

                <div class="card-ota">

                    <h2 class="subtitulo">
                        <i class="bi bi-receipt"></i>
                        Resumo do pedido
                    </h2>

                    <?php foreach ($cart['itens'] as $item): ?>
                        <div class="resumo-item">
                            <span><?= h($item['nome']) ?> × <?= $item['qtd'] ?></span>
                            <span><?= moeda($item['subtotal']) ?></span>
                        </div>
                    <?php endforeach; ?>

                    <hr class="divisor">

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

                    <div class="aviso mt-4">
                        <i class="bi bi-info-circle"></i>
                        Confira o endereço antes de continuar.
                        O valor da entrega ainda será definido.
                    </div>

                </div>

            </div>

        </div>

    </main>

</body>
</html>