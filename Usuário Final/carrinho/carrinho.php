<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu Carrinho | Pastelaria OTA</title>

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

        /* Produtos */
        .produto {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px 0;
            border-bottom: 1px solid #eee;
        }

        .produto:first-of-type {
            padding-top: 0;
        }

        .produto-img {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 9px;
            background-color: #eee;
        }

        .produto-info {
            flex: 1;
            min-width: 0;
        }

        .produto-nome {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .produto-descricao {
            color: #777;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .preco {
            color: #e21b23;
            font-weight: bold;
        }

        /* Quantidade */
        .quantidade {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 8px;
        }

        .btn-qtd {
            width: 29px;
            height: 29px;
            background-color: white;
            color: #e21b23;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-qtd:hover {
            background-color: #e21b23;
            color: white;
        }

        .btn-remover {
            background: none;
            border: none;
            color: #e21b23;
            font-size: 19px;
            padding: 5px;
        }

        /* Resumo */
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

        /* Carrinho vazio */
        .carrinho-vazio {
            text-align: center;
            padding: 40px 15px;
        }

        .carrinho-vazio i {
            font-size: 55px;
            color: #e21b23;
        }

        @media (max-width: 576px) {
            .card-ota {
                padding: 18px;
            }

            .produto {
                gap: 10px;
                flex-wrap: wrap;
            }

            .produto-img {
                width: 70px;
                height: 70px;
            }

            .produto-nome {
                font-size: 14px;
            }

            .btn-remover {
                margin-left: auto;
            }
        }
    </style>
</head>

<body>

    <main class="container py-4 py-md-5">

        <!-- TÍTULO -->
        <div class="mb-4">
            <h1 class="titulo">
                <i class="bi bi-cart3"></i>
                Meu carrinho
            </h1>

            <p class="descricao">
                Confira seus produtos antes de finalizar o pedido.
            </p>
        </div>

        <div class="row g-4">

            <!-- LISTA DE PRODUTOS -->
            <div class="col-lg-8">

                <div class="card-ota">

                    <h2 class="subtitulo">
                        <i class="bi bi-bag"></i>
                        Produtos selecionados
                    </h2>

                    <!-- PRODUTO 1 -->
                    <div class="produto">

                        <img src="imagens/pastel_queijo.jpg"
                             alt="Pastel de queijo"
                             class="produto-img">

                        <div class="produto-info">

                            <h3 class="produto-nome">
                                Pastel de Queijo
                            </h3>

                            <p class="produto-descricao">
                                Pastel crocante com recheio de queijo.
                            </p>

                            <span class="preco">R$ 8,00</span>

                            <div class="quantidade">
                                <button type="button" class="btn-qtd">
                                    −
                                </button>

                                <span>1</span>

                                <button type="button" class="btn-qtd">
                                    +
                                </button>
                            </div>

                        </div>

                        <button type="button"
                                class="btn-remover"
                                aria-label="Remover pastel de queijo">
                            <i class="bi bi-trash"></i>
                        </button>

                    </div>

                    <!-- PRODUTO 2 -->
                    <div class="produto">

                        <img src="imagens/pastel_carne.jpg"
                             alt="Pastel de carne"
                             class="produto-img">

                        <div class="produto-info">

                            <h3 class="produto-nome">
                                Pastel de Carne
                            </h3>

                            <p class="produto-descricao">
                                Pastel recheado com carne temperada.
                            </p>

                            <span class="preco">R$ 8,00</span>

                            <div class="quantidade">
                                <button type="button" class="btn-qtd">
                                    −
                                </button>

                                <span>2</span>

                                <button type="button" class="btn-qtd">
                                    +
                                </button>
                            </div>

                        </div>

                        <button type="button"
                                class="btn-remover"
                                aria-label="Remover pastel de carne">
                            <i class="bi bi-trash"></i>
                        </button>

                    </div>

                    <!-- PRODUTO 3 -->
                    <div class="produto">

                        <img src="imagens/pastel_chocolate.jpg"
                             alt="Pastel de chocolate com morango"
                             class="produto-img">

                        <div class="produto-info">

                            <h3 class="produto-nome">
                                Pastel de Chocolate com Morango
                            </h3>

                            <p class="produto-descricao">
                                Uma opção doce para finalizar seu pedido.
                            </p>

                            <span class="preco">R$ 12,00</span>

                            <div class="quantidade">
                                <button type="button" class="btn-qtd">
                                    −
                                </button>

                                <span>1</span>

                                <button type="button" class="btn-qtd">
                                    +
                                </button>
                            </div>

                        </div>

                        <button type="button"
                                class="btn-remover"
                                aria-label="Remover pastel de chocolate">
                            <i class="bi bi-trash"></i>
                        </button>

                    </div>

                    <div class="mt-4">
                        <a href="../../cardapio.php" class="btn-voltar">
                            <i class="bi bi-arrow-left"></i>
                            Continuar comprando
                        </a>
                    </div>

                </div>

            </div>

            <!-- RESUMO DO PEDIDO -->
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
                        <strong>Total dos produtos</strong>

                        <span class="total">
                            R$ 36,00
                        </span>
                    </div>

                    <a href="finalizar.php"
                       class="btn btn-ota w-100 mt-3">
                        Finalizar pedido
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <div class="aviso mt-4">
                        <i class="bi bi-info-circle"></i>
                        Confira os produtos e as quantidades antes
                        de continuar para os dados de entrega.
                    </div>

                </div>

            </div>

        </div>

    </main>

</body>
</html>