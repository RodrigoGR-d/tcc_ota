<?php
/* Aqui virá o código de busca utilizando o comando SQL */
include "../../conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Cadastro de Produtos</title>


    <style>

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #333;
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #222;
            width: 100%;
            padding: 15px 25px;
            border-bottom: 1px solid #444;
            box-shadow: 0 4px 15px rgba(0,0,0,.25);
        }

        .header-content {
            width: 100%;
            min-height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logo {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
            border: 3px solid #ffc107;
        }

        .header-content > a,
        .logo-container {
            position: absolute;
            left: 0;
            display: flex;
            align-items: center;
        }

        .tituloheader {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 30px;
            font-weight: bold;
            margin: 0;
            text-align: center;
            white-space: nowrap;
        }

        .tituloheader::after {
            content: "";
            display: block;
            width: 55px;
            height: 4px;
            background-color: #ffc107;
            border-radius: 10px;
            margin: 8px auto 0;
        }

        .menu-header {
            margin-left: auto;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-painel {
            font-size: 15px !important;
            font-weight: bold !important;
            padding: 11px 18px !important;
            border-radius: 8px !important;
            background-color: #ffc107 !important;
            color: #222 !important;
            border: none !important;
            transition: .3s;
        }

        .btn-painel:hover {
            background-color: #e0a800 !important;
            color: #222 !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255,193,7,.18);
        }

        .dropdown-menu {
            margin-top: 10px !important;
            background-color: #222;
            border: 1px solid #444;
            border-radius: 10px;
            padding: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,.35);
        }

        .dropdown-item {
            color: #ddd;
            border-radius: 7px;
            padding: 10px 13px;
            transition: .2s;
        }

        .dropdown-item:hover {
            background-color: #dc3545;
            color: white;
        }

        main {
            flex: 1;
            width: 100%;
            padding: 55px 20px 70px;
        }

        .titulo-produtos,
        .titulo-formulario {
            text-align: center;
            margin-bottom: 35px;
            color: white;
            font-weight: bold;
            font-size: 30px;
        }

        .titulo-produtos::after,
        .titulo-formulario::after {
            content: "";
            display: block;
            width: 65px;
            height: 4px;
            background-color: #ffc107;
            border-radius: 10px;
            margin: 12px auto 0;
        }

        .caixa-produtos,
        .caixa-formulario {
            background-color: #222;
            color: white;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #444;
            box-shadow: 0 8px 20px rgba(0,0,0,.25);
        }

        .caixa-formulario { max-width: 800px; }

        .tabela-container {
            width: 100%;
            overflow-x: auto;
        }

        .tabela-produtos {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border-radius: 8px;
            background-color: #222;
        }

        .tabela-produtos thead th {
            background-color: #ffc107;
            color: #222;
            padding: 14px;
            border: none;
            text-align: center;
            white-space: nowrap;
            font-weight: bold;
        }

        .tabela-produtos tbody td {
            padding: 14px;
            vertical-align: middle;
            border-bottom: 1px solid #444;
            text-align: center;
            color: #ddd;
        }

        .tabela-produtos tbody tr:last-child td { border-bottom: none; }
        .tabela-produtos tbody tr:hover { background-color: #333; }

        .coluna-acao {
            width: 120px;
            text-align: center !important;
            white-space: nowrap;
        }

        .acao {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            text-decoration: none;
        }

        .icone-acao {
            width: 22px;
            height: 22px;
            object-fit: contain;
            transition: transform .2s;
        }

        .icone-acao:hover { transform: scale(1.15); }

        .mensagem-vazia,
        .sem-produtos {
            text-align: center;
            padding: 30px;
            color: #aaa;
            font-size: 17px;
        }

        .form-label {
            font-weight: 500;
            color: #eee;
        }

        .form-control,
        .form-select {
            border-radius: 7px;
            background-color: #333;
            color: white;
            border: 1px solid #555;
        }

        .form-control::placeholder { color: #aaa; }

        .form-control:focus,
        .form-select:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 .2rem rgba(255,193,7,.15);
            background-color: #333;
            color: white;
        }

        .form-select option {
            background-color: #222;
            color: white;
        }

        .botoes-formulario {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
        }

        .botoes-formulario .btn { min-width: 120px; }

        .rodape {
            width: 100%;
            background-color: #222;
            color: white;
            padding: 35px 25px 20px;
            margin-top: auto;
            border-top: 1px solid #444;
        }

        .rodape-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .rodape h5 { margin-bottom: 20px; font-weight: bold; }
        .rodape p { margin-bottom: 10px; }
        .rodape a { color: white; text-decoration: none; }

        .direitos {
            border-top: 1px solid rgba(255,193,7,.3);
            margin-top: 10px;
            padding-top: 18px;
            text-align: center;
            color: #999;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            header { padding: 15px; }

            .header-content {
                min-height: 150px;
                flex-direction: column;
                gap: 12px;
            }

            .header-content > a,
            .logo-container {
                position: static;
                margin: 0;
            }

            .logo { width: 70px; height: 70px; }

            .tituloheader {
                position: static;
                transform: none;
                font-size: 23px;
                order: 2;
            }

            .menu-header {
                margin-left: 0;
                justify-content: center;
                order: 3;
            }

            .btn-painel {
                font-size: 14px !important;
                padding: 8px 12px !important;
            }

            main { padding: 40px 15px 55px; }

            .titulo-produtos,
            .titulo-formulario {
                font-size: 25px;
                margin-bottom: 35px;
            }

            .caixa-produtos,
            .caixa-formulario { padding: 20px; }

            .tabela-produtos { min-width: 650px; }

            .rodape { text-align: center; }
        }

        @media (max-width: 480px) {
            .tituloheader { font-size: 21px; }
            .titulo-produtos,
            .titulo-formulario { font-size: 23px; }
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

            <a href="../menu.php">

                <img src="../../imagens/logoota.jpeg" class="logo" alt="Logo OTA">

            </a>

            <h1 class="tituloheader">
                Cadastro de Produtos
            </h1>


            <!-- MENUS -->

            <div class="menu-header">


                <!-- PAINEL ADMINISTRADOR -->

                <div class="dropdown">

                    <button class="btn btn-light dropdown-toggle btn-painel" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">

                        Painel Administrador

                    </button>


                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="../adm/FormAdm.php">

                                Acesso Admin

                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="../produto/FormProd.php">

                                Acesso Produtos

                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="../horario_funcionamento/FormHora.php">

                                Acesso H. Funcionamento

                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="../avaliacao/VizuAva.php">

                                Acesso Avaliação

                            </a>
                        </li>

                    </ul>

                </div>


                <!-- LISTA DE PRODUTOS -->

                <div class="dropdown">

                    <button class="btn btn-light dropdown-toggle btn-painel" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">

                        L. Produtos

                    </button>


                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="pastel.php">

                                Pastel

                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="massa.php">

                                Massa

                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="bebidas.php">

                                Bebida

                            </a>
                        </li>

                    </ul>

                </div>


            </div>

        </div>

    </header>



    <!-- =========================
     CONTEÚDO PRINCIPAL
========================= -->

    <main>


        <!-- =========================
         FORMULÁRIO
    ========================= -->

        <div class="caixa-formulario">

            <h2 class="titulo-formulario">
                Cadastro de Produtos
            </h2>


            <form method="post" action="insertProd.php" enctype="multipart/form-data">


                <input type="hidden" name="id_prod">


                <!-- NOME -->

                <div class="mb-3">

                    <label for="prod_nome" class="form-label">

                        Nome:

                    </label>

                    <input type="text" name="prod_nome" id="prod_nome" class="form-control"
                        placeholder="Insira o nome do produto" required>

                </div>


                <!-- CATEGORIA -->

                <div class="mb-3">

                    <label for="categoria" class="form-label">

                        Categoria:

                    </label>

                    <select class="form-select" name="categoria" id="categoria" required>

                        <option selected disabled value="">

                            Insira a Categoria

                        </option>

                        <option value="pastel">
                            Pastel
                        </option>

                        <option value="massa">
                            Massa
                        </option>

                        <option value="bebida">
                            Bebida
                        </option>

                    </select>

                </div>


                <!-- PREÇO -->

                <div class="mb-3">

                    <label for="prod_preco" class="form-label">

                        Preço:

                    </label>

                    <input type="text" name="prod_preco" id="prod_preco" class="form-control"
                        placeholder="Insira o preço" required>

                </div>


                <!-- DESCRIÇÃO -->

                <div class="mb-3">

                    <label for="prod_descricao" class="form-label">

                        Descrição:

                    </label>

                    <input type="text" name="prod_descricao" id="prod_descricao" class="form-control"
                        placeholder="Insira a descrição" required>

                </div>


                <!-- IMAGEM -->

                <div class="mb-3">

                    <label for="prod_foto" class="form-label">

                        Imagem:

                    </label>

                    <input type="file" class="form-control" id="prod_foto" name="prod_foto" accept="image/*" required>

                </div>


                <!-- BOTÕES -->

                <div class="botoes-formulario">

                    <input type="submit" value="CADASTRAR" class="btn btn-success">

                    <input type="reset" value="CANCELAR" class="btn btn-secondary">

                </div>

            </form>

        </div>



        <!-- =========================
         PRODUTOS CADASTRADOS
    ========================= -->

        <div class="caixa-produtos">

            <h2 class="titulo-produtos">
                Produtos cadastrados
            </h2>


            <div class="row g-4">

                <?php

                /* Busca os produtos no banco */

                $sql = "SELECT * FROM produtos";

                $result = $conn->query($sql);


                if ($result && $result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        $id_prod = $row['id_prod'];


                        /* Verifica se existe imagem */

                        $img = !empty($row['prod_foto'])
                            ? $row['prod_foto']
                            : "../../icones/semfoto.png";


                        echo "

                    <div class='col-12 col-sm-6 col-lg-4 col-xl-3'>

                        <div class='card-produto'>


                            <!-- IMAGEM -->

                            <img
                                src='$img'
                                class='imagem-produto'
                                alt='{$row['prod_foto']}'>


                            <!-- INFORMAÇÕES -->

                            <div class='card-produto-body'>


                                <h5 class='nome-produto'>
                                    {$row['prod_nome']}
                                </h5>


                                <span class='categoria-produto'>
                                    {$row['categoria']}
                                </span>


                                <p class='descricao-produto'>
                                    {$row['prod_descricao']}
                                </p>


                                <p class='preco-produto'>
                                    R$ {$row['prod_preco']}
                                </p>


                                <!-- AÇÕES -->

                                <div class='acoes-produto'>


                                    <a
                                        href='editarProd.php?id_prod=$id_prod'
                                        class='btn btn-warning'>

                                        <i class='bi bi-pencil'></i>
                                        Editar

                                    </a>


                                    <a
                                        href='deleteProd.php?id_prod=$id_prod'
                                        class='btn btn-danger'
                                        onclick=\"return confirm('Deseja excluir este produto {$row['prod_nome']}?');\">

                                        <i class='bi bi-trash'></i>
                                        Excluir

                                    </a>


                                </div>

                            </div>

                        </div>

                    </div>

                    ";

                    }

                } else {

                    echo "

                <div class='col-12'>

                    <div class='sem-produtos'>

                        Nenhum produto cadastrado.

                    </div>

                </div>

                ";

                }

                ?>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>