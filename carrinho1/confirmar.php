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
    </style>
</head>

<body>

    <main class="container py-4 py-md-5">

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

                    <div class="produto">

                        <img src="imagens/pastel_queijo.jpg"
                             alt="Pastel de queijo"
                             class="produto-img">

                        <div class="produto-info">
                            <h3 class="produto-nome">
                                Pastel de Queijo
                            </h3>

                            <p class="produto-descricao">
                                Quantidade: 1
                            </p>
                        </div>

                        <span class="preco">R$ 8,00</span>

                    </div>

                    <div class="produto">

                        <img src="imagens/pastel_carne.jpg"
                             alt="Pastel de carne"
                             class="produto-img">

                        <div class="produto-info">
                            <h3 class="produto-nome">
                                Pastel de Carne
                            </h3>

                            <p class="produto-descricao">
                                Quantidade: 2
                            </p>
                        </div>

                        <span class="preco">R$ 16,00</span>

                    </div>

                    <div class="produto">

                        <img src="imagens/pastel_chocolate.jpg"
                             alt="Pastel de chocolate com morango"
                             class="produto-img">

                        <div class="produto-info">
                            <h3 class="produto-nome">
                                Pastel de Chocolate com Morango
                            </h3>

                            <p class="produto-descricao">
                                Quantidade: 1
                            </p>
                        </div>

                        <span class="preco">R$ 12,00</span>

                    </div>

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
                        <p class="informacao-texto">Nome do cliente</p>
                    </div>

                    <div class="informacao">
                        <p class="informacao-titulo">Telefone</p>
                        <p class="informacao-texto">(12) 99999-9999</p>
                    </div>

                    <div class="informacao">
                        <p class="informacao-titulo">Endereço</p>
                        <p class="informacao-texto">
                            Rua Exemplo, nº 100
                        </p>
                        <p class="informacao-texto">
                            Bairro Centro — Guaratinguetá - SP
                        </p>
                    </div>

                    <div class="informacao mb-0">
                        <p class="informacao-titulo">Complemento</p>
                        <p class="informacao-texto">
                            Não informado
                        </p>
                    </div>

                    <div class="mt-4">
                        <a href="finalizar_pedido.php" class="btn-voltar">
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
                        <i class="bi bi-qr-code"
                           style="font-size: 32px; color: #e21b23;"></i>

                        <div>
                            <strong>Pix</strong>

                            <p class="descricao mb-0">
                                Forma de pagamento selecionada
                            </p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="finalizar_pedido.php" class="btn-voltar">
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
                        <span>R$ 36,00</span>
                    </div>

                    <div class="resumo-item">
                        <span>Entrega</span>
                        <span>A calcular</span>
                    </div>

                    <hr class="divisor">

                    <div class="resumo-item align-items-center">
                        <strong>Total</strong>

                        <span class="total">
                            R$ 36,00
                        </span>
                    </div>

                    <div class="aviso mt-4 mb-4">
                        <i class="bi bi-info-circle"></i>
                        Confira os produtos, o endereço e a forma de
                        pagamento antes de confirmar.
                    </div>

                    <button type="button" class="btn btn-ota w-100">
                        <i class="bi bi-check-circle"></i>
                        Confirmar pedido
                    </button>

                    <p class="text-secondary small text-center mt-3 mb-0">
                        Ao confirmar, você conclui o envio do pedido.
                    </p>

                </div>

            </div>

        </div>

    </main>

</body>
</html>