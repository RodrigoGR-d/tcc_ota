<?php
include "../../conexao.php";

$id_prod = $_GET['id_prod'];

$sql = "SELECT * FROM produtos 
        WHERE id_prod = $id_prod";

$result = $conn->query($sql);
$produto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Pasteis</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }


        /* =========================
           CABEÇALHO
        ========================= */

        header {
            background-color: #dc3545;
            width: 100%;
            padding: 15px 25px;
        }

        .header-content {
            width: 100%;
            min-height: 70px;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;
        }


        /* =========================
           LOGO
        ========================= */

        .logo-container {
            position: absolute;
            left: 0;

            display: flex;
            align-items: center;
        }

        .logo {
            width: 100px;
            height: 100px;

            object-fit: cover;

            border-radius: 50%;

            display: block;
        }


        /* =========================
           TÍTULO
        ========================= */

        .tituloheader {
            color: white;

            font-size: 32px;

            font-weight: bold;

            margin: 0;

            text-align: center;
        }


        /* =========================
           MENUS DO LADO DIREITO
        ========================= */

        .menu-header {
            position: absolute;
            right: 0;

            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-painel {
            font-size: 16px;

            padding: 10px 18px;

            border-radius: 6px;
        }

        .dropdown-menu {
            margin-top: 8px !important;
        }


        /* =========================
           CONTEÚDO
        ========================= */

        main {
            flex: 1;

            width: 100%;

            padding: 45px 20px 60px;
        }


        /* =========================
           CARD DO FORMULÁRIO
        ========================= */

        .caixa-formulario {
            background-color: white;

            width: 100%;
            max-width: 800px;

            margin: 0 auto;

            padding: 30px;

            border-radius: 12px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }


        /* =========================
           TÍTULO DO FORMULÁRIO
        ========================= */

        .titulo-formulario {
            text-align: center;

            margin-bottom: 25px;

            color: #333;

            font-weight: bold;
        }


        /* =========================
           FORMULÁRIO
        ========================= */

        .form-label {
            font-weight: 500;
        }

        .form-control,
        .form-select {
            border-radius: 7px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #dc3545;

            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        }


        /* =========================
           BOTÕES
        ========================= */

        .botoes-formulario {
            display: flex;

            justify-content: center;

            gap: 10px;

            margin-top: 25px;
        }

        .botoes-formulario .btn {
            min-width: 120px;
        }


        /* =========================
           RODAPÉ
        ========================= */

        .rodape {
            width: 100%;

            background-color: #dc3545;

            color: white;

            padding: 40px 25px 20px;

            margin-top: auto;
        }

        .rodape-container {
            width: 100%;

            max-width: 1200px;

            margin: 0 auto;
        }

        .rodape h5 {
            margin-bottom: 20px;

            font-weight: bold;
        }

        .rodape p {
            margin-bottom: 10px;
        }

        .rodape a {
            color: white;

            text-decoration: none;
        }


        /* =========================
           REDES SOCIAIS
        ========================= */

        .redes-sociais {
            display: flex;

            justify-content: flex-end;

            gap: 20px;
        }

        .redes-sociais a {
            font-size: 28px;

            transition: transform 0.2s;
        }

        .redes-sociais a:hover {
            transform: scale(1.15);
        }


        /* =========================
           DIREITOS
        ========================= */

        .direitos {
            border-top: 1px solid rgba(255, 255, 255, 0.4);

            margin-top: 25px;

            padding-top: 15px;

            text-align: center;
        }


        /* =========================
           RESPONSIVIDADE
        ========================= */

        @media (max-width: 768px) {

            header {
                padding: 15px;
            }

            .header-content {
                min-height: 70px;
            }

            .logo-container {
                position: static;

                margin-right: 15px;
            }

            .logo {
                width: 70px;
                height: 70px;
            }

            .tituloheader {
                font-size: 24px;
            }

            .menu-header {
                position: static;
            }

            .btn-painel {
                font-size: 14px;

                padding: 8px 12px;
            }

            main {
                padding: 35px 15px 50px;
            }

            .caixa-formulario {
                padding: 25px 20px;
            }

            .rodape {
                text-align: center;
            }

            .redes-sociais {
                justify-content: center;
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
                        alt="Logo OTA">

                </a>

            </div>


            <!-- TÍTULO -->

            <h1 class="tituloheader">

                Editar Produto

            </h1>


            <!-- MENUS DO LADO DIREITO -->

            <div class="menu-header">


                <!-- LISTA DE PRODUTOS -->

                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle btn-painel"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        L. Produtos

                    </button>


                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a
                                class="dropdown-item"
                                href="pastel.php">

                                Pastel

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="massa.php">

                                Massa

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="bebidas.php">

                                Bebida

                            </a>

                        </li>

                    </ul>

                </div>


                <!-- PAINEL ADMINISTRADOR -->

                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle btn-painel"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        Painel Administrador

                    </button>


                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a
                                class="dropdown-item"
                                href="../adm/FormAdm.php">

                                Acesso Admin

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="../produto/FormProd.php">

                                Acesso Produtos

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="../horario_funcionamento/FormHora.php">

                                Acesso H. Funcionamento

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="../avaliacao/VizuAva.php">

                                Acesso Avaliação

                            </a>

                        </li>

                    </ul>

                </div>


            </div>

        </div>

    </header>



    <!-- =========================
         CONTEÚDO
    ========================= -->

    <main>

        <div class="container">

            <div class="caixa-formulario">

                <h2 class="titulo-formulario">

                    Editar Produto

                </h2>


                <form
                    method="post"
                    action="updateProd.php"
                    enctype="multipart/form-data">


                    <!-- ID DO PRODUTO -->

                    <input
                        type="hidden"
                        name="id_prod"
                        value="<?= $produto['id_prod'] ?>">


                    <!-- NOME -->

                    <div class="mb-3">

                        <label
                            for="prod_nome"
                            class="form-label">

                            Nome:

                        </label>

                        <input
                            type="text"
                            name="prod_nome"
                            id="prod_nome"
                            class="form-control"
                            placeholder="Insira o nome do produto"
                            value="<?= $produto['prod_nome'] ?>">

                    </div>


                    <!-- CATEGORIA -->

                    <div class="mb-3">

                        <label
                            for="categoria"
                            class="form-label">

                            Categoria:

                        </label>

                        <select
                            class="form-select"
                            name="categoria"
                            id="categoria">

                            <option disabled>

                                Insira a Categoria

                            </option>

                            <option
                                value="pastel"
                                <?= ($produto['categoria'] == 'pastel') ? 'selected' : '' ?>>

                                Pastel

                            </option>

                            <option
                                value="massa"
                                <?= ($produto['categoria'] == 'massa') ? 'selected' : '' ?>>

                                Massa

                            </option>

                            <option
                                value="bebida"
                                <?= ($produto['categoria'] == 'bebida') ? 'selected' : '' ?>>

                                Bebida

                            </option>

                        </select>

                    </div>


                    <!-- PREÇO -->

                    <div class="mb-3">

                        <label
                            for="prod_preco"
                            class="form-label">

                            Preço:

                        </label>

                        <input
                            type="text"
                            name="prod_preco"
                            id="prod_preco"
                            class="form-control"
                            placeholder="Insira o preço"
                            value="<?= $produto['prod_preco'] ?>">

                    </div>


                    <!-- DESCRIÇÃO -->

                    <div class="mb-3">

                        <label
                            for="prod_descricao"
                            class="form-label">

                            Descrição:

                        </label>

                        <input
                            type="text"
                            name="prod_descricao"
                            id="prod_descricao"
                            class="form-control"
                            placeholder="Insira a descrição"
                            value="<?= $produto['prod_descricao'] ?>">

                    </div>


                    <!-- IMAGEM -->

                    <div class="mb-3">

                        <label
                            for="prod_foto"
                            class="form-label">

                            Imagem:

                        </label>

                        <input
                            type="file"
                            class="form-control"
                            id="prod_foto"
                            name="prod_foto"
                            accept="image/*">

                    </div>


                    <!-- BOTÃO -->

                    <div class="botoes-formulario">

                        <input
                            type="submit"
                            value="EDITAR"
                            class="btn btn-success">

                    </div>


                </form>

            </div>

        </div>

    </main>



    <!-- =========================
         RODAPÉ
    ========================= -->

    <footer class="rodape">

        <div class="rodape-container">

            <div class="direitos">

                © 2026 Pastelaria OTA - Todos os direitos reservados.

            </div>

        </div>

    </footer>



    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>