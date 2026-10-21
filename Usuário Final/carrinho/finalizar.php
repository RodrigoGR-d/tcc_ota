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
    </style>
</head>

<body>

    <main class="container py-4 py-md-5">

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

                    <!-- Apenas visual -->
                    <form>

                        <div class="row g-3">

                            <div class="col-12">
                                <label class="form-label">
                                    Nome completo
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="Digite seu nome completo">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    E-mail
                                </label>

                                <input type="email"
                                       class="form-control"
                                       placeholder="seuemail@exemplo.com">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Telefone
                                </label>

                                <input type="tel"
                                       class="form-control"
                                       placeholder="(12) 99999-9999">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">
                                    CEP
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="00000-000">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">
                                    Rua ou avenida
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="Nome da rua ou avenida">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">
                                    Número
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="Nº da residência">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">
                                    Complemento (opcional)
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="Casa, apartamento, bloco...">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Bairro
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="Digite seu bairro">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Cidade
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="Digite sua cidade">
                            </div>

                            <div class="col-12">
                                <label class="form-label">
                                    Ponto de referência (opcional)
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="Ex.: próximo à praça">
                            </div>

                            <div class="col-12">
                                <label class="form-label">
                                    Observações para a entrega
                                </label>

                                <textarea class="form-control"
                                          rows="3"
                                          placeholder="Informações adicionais para o entregador"></textarea>
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

                            <a href="confirmar.php" class="btn-voltar">
                            
                            <button type="button" class="btn btn-ota">
                                Continuar para pagamento
                                <i class="bi bi-arrow-right"></i>
                            </button>

                            </a>

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

                    <div class="resumo-item">
                        <span>Pastel de queijo</span>
                        <span>R$ 8,00</span>
                    </div>

                    <div class="resumo-item">
                        <span>Pastel de carne</span>
                        <span>R$ 8,00</span>
                    </div>

                    <hr class="divisor">

                    <div class="resumo-item">
                        <span>Subtotal</span>
                        <span>R$ 16,00</span>
                    </div>

                    <div class="resumo-item">
                        <span>Entrega</span>
                        <span>A calcular</span>
                    </div>

                    <hr class="divisor">

                    <div class="resumo-item align-items-center">
                        <strong>Total dos produtos</strong>

                        <span class="total">
                            R$ 16,00
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