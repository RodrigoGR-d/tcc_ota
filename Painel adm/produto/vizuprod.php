<?php

include "../../conexao.php";

/* =========================
   BUSCAR PRODUTOS
========================= */

$sql = "SELECT * FROM produtos ORDER BY id_prod DESC";

$result = $conn->query($sql);

$produtos = [];

if ($result) {

    while ($row = $result->fetch_assoc()) {

        $produtos[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Produtos</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <style>

        * {
            box-sizing: border-box;
        }

        body {

            margin: 0;

            font-family: Arial, sans-serif;

            background-color: #333;

            color: white;

            min-height: 100vh;

            display: flex;

            flex-direction: column;
        }


        /* =========================
           CABEÇALHO
        ========================= */

        header {

            width: 100%;

            padding: 15px 25px;

            background-color: #222;

            border-bottom: 1px solid #444;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
        }


        .header-content {

            width: 100%;

            min-height: 90px;

            display: flex;

            align-items: center;

            justify-content: center;

            position: relative;
        }


        .logo-container {

            position: absolute;

            left: 0;
        }


        .logo {

            width: 85px;

            height: 85px;

            object-fit: cover;

            border-radius: 50%;

            border: 3px solid #ffc107;
        }


        .titulo-header {

            margin: 0;

            color: white;

            font-size: 30px;

            font-weight: bold;

            text-align: center;
        }


        .titulo-header::after {

            content: "";

            display: block;

            width: 60px;

            height: 4px;

            margin: 10px auto 0;

            background-color: #ffc107;

            border-radius: 10px;
        }


        /* =========================
           BOTÃO ADICIONAR
        ========================= */

        .botao-adicionar {

            position: absolute;

            right: 0;

            padding: 11px 18px;

            background-color: #ffc107;

            color: #222;

            border: none;

            border-radius: 8px;

            font-weight: bold;

            text-decoration: none;

            transition: 0.2s;
        }


        .botao-adicionar:hover {

            background-color: #e0a800;

            color: #222;

            transform: translateY(-2px);
        }


        /* =========================
           CONTEÚDO
        ========================= */

        main {

            flex: 1;

            width: 100%;

            padding: 55px 20px 70px;
        }


        .caixa-produtos {

            width: 100%;

            max-width: 1200px;

            margin: 0 auto;

            padding: 30px;

            background-color: #222;

            border: 1px solid #444;

            border-radius: 15px;

            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }


        .titulo-produtos {

            margin-bottom: 35px;

            color: white;

            font-size: 30px;

            font-weight: bold;

            text-align: center;
        }


        .titulo-produtos::after {

            content: "";

            display: block;

            width: 60px;

            height: 4px;

            margin: 10px auto 0;

            background-color: #ffc107;

            border-radius: 10px;
        }


        /* =========================
           TABELA
        ========================= */

        .tabela-container {

            width: 100%;

            overflow-x: auto;
        }


        .tabela-produtos {

            width: 100%;

            margin-bottom: 0;

            background-color: #222;

            border-radius: 8px;

            overflow: hidden;
        }


        .tabela-produtos thead th {

            padding: 14px;

            background-color: #ffc107;

            color: #222;

            border: none;

            text-align: center;

            white-space: nowrap;

            font-weight: bold;
        }


        .tabela-produtos tbody td {

            padding: 14px;

            color: #333;

            border-bottom: 1px solid #444;

            text-align: center;

            vertical-align: middle;
        }


        .tabela-produtos tbody tr:hover {

            background-color: #333;
        }


        .tabela-produtos tbody tr:last-child td {

            border-bottom: none;
        }


        .coluna-acao {

            width: 120px;

            text-align: center !important;

            white-space: nowrap;
        }


        /* =========================
           BOTÕES DE AÇÃO
        ========================= */

        .botao-acao {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 4px;

            margin: 0 4px;

            background: transparent;

            border: none;

            text-decoration: none;
        }


        .icone-acao {

            width: 23px;

            height: 23px;

            object-fit: contain;

            transition: 0.2s;
        }


        .icone-acao:hover {

            transform: scale(1.15);
        }


        .mensagem-vazia {

            padding: 30px !important;

            color: #aaa !important;

            text-align: center;
        }


        /* =========================
           MODAL
        ========================= */

        .modal-produto {

            background-color: #222;

            color: white;

            border: 1px solid #444;

            border-radius: 12px;
        }


        .modal-produto .modal-header,
        .modal-produto .modal-footer {

            border-color: #444;
        }


        .modal-produto .form-label {

            color: #eee;

            font-weight: 500;
        }


        .modal-produto .form-control,
        .modal-produto .form-select {

            background-color: #333;

            color: white;

            border: 1px solid #555;
        }


        .modal-produto .form-control::placeholder {

            color: #aaa;
        }


        .modal-produto .form-control:focus,
        .modal-produto .form-select:focus {

            background-color: #333;

            color: white;

            border-color: #ffc107;

            box-shadow:
                0 0 0 0.2rem
                rgba(255, 193, 7, 0.15);
        }


        .modal-produto .form-select option {

            background-color: #222;

            color: white;
        }


        .texto-ajuda {

            display: block;

            margin-top: 6px;

            color: #aaa;

            font-size: 13px;
        }


        /* =========================
           RODAPÉ
        ========================= */

        .rodape {

            width: 100%;

            margin-top: auto;

            padding: 35px 25px 20px;

            background-color: #222;

            border-top: 1px solid #444;
        }


        .rodape-container {

            width: 100%;

            max-width: 1200px;

            margin: 0 auto;
        }


        .direitos {

            padding-top: 18px;

            border-top:
                1px solid
                rgba(255, 193, 7, 0.3);

            color: #999;

            font-size: 14px;

            text-align: center;
        }


        /* =========================
           RESPONSIVO
        ========================= */

        @media (max-width: 768px) {

            header {

                padding: 15px;
            }


            .header-content {

                min-height: 180px;

                flex-direction: column;

                gap: 12px;
            }


            .logo-container {

                position: static;

                order: 1;
            }


            .logo {

                width: 70px;

                height: 70px;
            }


            .titulo-header {

                order: 2;

                font-size: 23px;
            }


            .botao-adicionar {

                position: static;

                order: 3;
            }


            main {

                padding: 40px 15px 55px;
            }


            .caixa-produtos {

                padding: 20px;
            }


            .titulo-produtos {

                font-size: 25px;
            }


            .tabela-produtos {

                min-width: 750px;
            }


            .rodape {

                text-align: center;
            }
        }

    </style>

</head>


<body>


    <!-- =========================
         CABEÇALHO
    ========================= -->

    <header>

        <div class="header-content">


            <!-- LOGO -->

            <div class="logo-container">

                <a href="../menu.php">

                    <img
                        src="../../imagens/logoota.jpeg"
                        class="logo"
                        alt="Logo OTA"
                    >

                </a>

            </div>


            <!-- TÍTULO -->

            <h1 class="titulo-header">
                Produtos
            </h1>


            <!-- ADICIONAR PRODUTO -->

            <a
                href="formProd.php"
                class="botao-adicionar"
            >
                + Adicionar produto
            </a>

        </div>

    </header>


    <!-- =========================
         CONTEÚDO
    ========================= -->

    <main>

        <div class="caixa-produtos">


            <h2 class="titulo-produtos">
                Produtos cadastrados
            </h2>


            <div class="table-responsive tabela-container">

                <table class="table tabela-produtos">


                    <!-- CABEÇALHO DA TABELA -->

                    <thead>

                        <tr>

                            <th>
                                Nome
                            </th>

                            <th>
                                Categoria
                            </th>

                            <th>
                                Preço
                            </th>

                            <th>
                                Descrição
                            </th>

                            <th class="coluna-acao">
                                Ação
                            </th>

                        </tr>

                    </thead>


                    <!-- PRODUTOS -->

                    <tbody>

                        <?php if (count($produtos) > 0): ?>

                            <?php foreach ($produtos as $produto): ?>

                                <?php

                                $id_prod =
                                    (int) $produto['id_prod'];

                                $nome =
                                    htmlspecialchars(
                                        $produto['prod_nome'] ?? '',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );

                                $categoria =
                                    htmlspecialchars(
                                        $produto['categoria'] ?? '',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );

                                $preco =
                                    htmlspecialchars(
                                        $produto['prod_preco'] ?? '',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );

                                $descricao =
                                    htmlspecialchars(
                                        $produto['prod_descricao'] ?? '',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );

                                ?>


                                <tr>

                                    <td>
                                        <?= $nome ?>
                                    </td>


                                    <td>
                                        <?= $categoria ?>
                                    </td>


                                    <td>
                                        R$ <?= $preco ?>
                                    </td>


                                    <td>
                                        <?= $descricao ?>
                                    </td>


                                    <!-- AÇÕES -->

                                    <td class="coluna-acao">


                                        <!-- EDITAR -->

                                        <button
                                            type="button"
                                            class="botao-acao"
                                            title="Editar produto"

                                            data-bs-toggle="modal"

                                            data-bs-target="#modalEditar<?= $id_prod ?>"
                                        >

                                            <img
                                                src="../../imagens/lapis.png"
                                                class="icone-acao"
                                                alt="Editar"
                                            >

                                        </button>


                                        <!-- APAGAR -->

                                        <a
                                            href="deleteProd.php?id_prod=<?= $id_prod ?>"
                                            class="botao-acao"
                                            title="Apagar produto"

                                            onclick="return confirm(
                                                'Deseja realmente excluir o produto <?= $nome ?>?'
                                            );"
                                        >

                                            <img
                                                src="../../imagens/lixeira.png"
                                                class="icone-acao"
                                                alt="Apagar"
                                            >

                                        </a>


                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        <?php else: ?>


                            <tr>

                                <td
                                    colspan="5"
                                    class="mensagem-vazia"
                                >

                                    Nenhum produto cadastrado.

                                </td>

                            </tr>


                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>


    <!-- =========================
         MODAIS DE EDIÇÃO
    ========================= -->

    <?php foreach ($produtos as $produto): ?>

        <?php

        $id_prod =
            (int) $produto['id_prod'];

        $nome =
            htmlspecialchars(
                $produto['prod_nome'] ?? '',
                ENT_QUOTES,
                'UTF-8'
            );

        $categoria =
            htmlspecialchars(
                $produto['categoria'] ?? '',
                ENT_QUOTES,
                'UTF-8'
            );

        $preco =
            htmlspecialchars(
                $produto['prod_preco'] ?? '',
                ENT_QUOTES,
                'UTF-8'
            );

        $descricao =
            htmlspecialchars(
                $produto['prod_descricao'] ?? '',
                ENT_QUOTES,
                'UTF-8'
            );

        ?>


        <div
            class="modal fade"
            id="modalEditar<?= $id_prod ?>"
            tabindex="-1"
            aria-hidden="true"
        >

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content modal-produto">


                    <form
                        method="post"
                        action="updateProd.php"
                        enctype="multipart/form-data"
                    >


                        <!-- CABEÇALHO -->

                        <div class="modal-header">

                            <h5 class="modal-title">
                                Editar Produto
                            </h5>

                            <button
                                type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal"
                                aria-label="Fechar"
                            ></button>

                        </div>


                        <!-- CORPO -->

                        <div class="modal-body">


                            <input
                                type="hidden"
                                name="id_prod"
                                value="<?= $id_prod ?>"
                            >


                            <!-- NOME -->

                            <div class="mb-3">

                                <label
                                    for="nome<?= $id_prod ?>"
                                    class="form-label"
                                >
                                    Nome:
                                </label>

                                <input
                                    type="text"
                                    id="nome<?= $id_prod ?>"
                                    name="prod_nome"
                                    class="form-control"
                                    value="<?= $nome ?>"
                                    required
                                >

                            </div>


                            <!-- CATEGORIA -->

                            <div class="mb-3">

                                <label
                                    for="categoria<?= $id_prod ?>"
                                    class="form-label"
                                >
                                    Categoria:
                                </label>

                                <select
                                    id="categoria<?= $id_prod ?>"
                                    name="categoria"
                                    class="form-select"
                                    required
                                >

                                    <option
                                        value="pastel"
                                        <?= $categoria === 'pastel'
                                            ? 'selected'
                                            : '' ?>
                                    >
                                        Pastel
                                    </option>

                                    <option
                                        value="massa"
                                        <?= $categoria === 'massa'
                                            ? 'selected'
                                            : '' ?>
                                    >
                                        Massa
                                    </option>

                                    <option
                                        value="bebida"
                                        <?= $categoria === 'bebida'
                                            ? 'selected'
                                            : '' ?>
                                    >
                                        Bebida
                                    </option>

                                </select>

                            </div>


                            <!-- PREÇO -->

                            <div class="mb-3">

                                <label
                                    for="preco<?= $id_prod ?>"
                                    class="form-label"
                                >
                                    Preço:
                                </label>

                                <input
                                    type="number"
                                    id="preco<?= $id_prod ?>"
                                    name="prod_preco"
                                    class="form-control"
                                    value="<?= $preco ?>"
                                    step="0.01"
                                    min="0"
                                    required
                                >

                            </div>


                            <!-- DESCRIÇÃO -->

                            <div class="mb-3">

                                <label
                                    for="descricao<?= $id_prod ?>"
                                    class="form-label"
                                >
                                    Descrição:
                                </label>

                                <textarea
                                    id="descricao<?= $id_prod ?>"
                                    name="prod_descricao"
                                    class="form-control"
                                    rows="3"
                                    required
                                ><?= $descricao ?></textarea>

                            </div>


                            <!-- IMAGEM -->

                            <div class="mb-3">

                                <label
                                    for="foto<?= $id_prod ?>"
                                    class="form-label"
                                >
                                    Imagem:
                                </label>

                                <input
                                    type="file"
                                    id="foto<?= $id_prod ?>"
                                    name="prod_foto"
                                    class="form-control"
                                    accept="image/*"
                                >

                                <small class="texto-ajuda">
                                    Deixe vazio para manter a imagem atual.
                                </small>

                            </div>

                        </div>


                        <!-- RODAPÉ DO MODAL -->

                        <div class="modal-footer">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Fechar
                            </button>

                            <button
                                type="submit"
                                class="btn btn-warning"
                            >
                                Salvar alterações
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    <?php endforeach; ?>


    <!-- =========================
         RODAPÉ
    ========================= -->

    <footer class="rodape">

        <div class="rodape-container">

            <div class="direitos">

                © 2026 Pastelaria OTA -
                Todos os direitos reservados.

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>