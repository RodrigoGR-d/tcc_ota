<?php
/* Aqui virá o código de busca utilizando o comando SQL */
include "../../conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Avaliação</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>

        /* =========================
           CONFIGURAÇÕES GERAIS
        ========================= */

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
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Logo */

        .logoota {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
        }

        /* Área do menu */

        .menu-header {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        /* Botão Painel Administrador */

        .btn-painel {
            font-size: 16px;
            padding: 10px 18px;
            border-radius: 6px;
        }

        /* Menu dropdown */

        .dropdown-menu {
            margin-top: 8px !important;
        }


        /* =========================
           CONTEÚDO
        ========================= */

        main {
            flex: 1;
            width: 100%;
            padding: 50px 20px;
        }

        .caixa-avaliacao {
            background-color: white;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .titulo-avaliacao {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            font-weight: bold;
        }


        /* =========================
           TABELA
        ========================= */

        .tabela-avaliacao {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border-radius: 8px;
        }

        .tabela-avaliacao thead th {
            background-color: #dc3545;
            color: white;
            padding: 14px;
            border: none;
            text-align: left;
        }

        .tabela-avaliacao tbody td {
            padding: 14px;
            vertical-align: middle;
            border-bottom: 1px solid #ddd;
        }

        .tabela-avaliacao tbody tr:last-child td {
            border-bottom: none;
        }

        .tabela-avaliacao tbody tr:hover {
            background-color: #f8f8f8;
        }

        /* Coluna da avaliação */

        .coluna-avaliacao {
            width: 85%;
        }

        /* Coluna da lixeira */

        .coluna-acao {
            width: 15%;
            text-align: center !important;
        }

        /* Ícone da lixeira */

        .icone-lixeira {
            width: 22px !important;
            height: 22px !important;
            object-fit: contain;
            margin: 0;
            transition: transform 0.2s;
        }

        .icone-lixeira:hover {
            transform: scale(1.15);
        }


        /* =========================
           MENSAGEM SEM AVALIAÇÕES
        ========================= */

        .sem-avaliacoes {
            text-align: center;
            color: #777;
            padding: 20px;
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
                padding: 12px 15px;
            }

            .logoota {
                width: 75px;
                height: 75px;
            }

            .btn-painel {
                font-size: 14px;
                padding: 8px 12px;
            }

            main {
                padding: 30px 15px;
            }

            .caixa-avaliacao {
                padding: 20px;
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

        <a href="../menu.php">

            <img
                class="logoota"
                src="../../imagens/logoota.jpeg"
                alt="Logo OTA">

        </a>


        <!-- MENU -->

        <div class="menu-header">

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

              <!-- PAINEL ADMINISTRADOR -->

            <div class="menu-header">

                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle btn-painel"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        Listagem dos Cadastros

                    </button>


                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a
                                class="dropdown-item"
                                href="../adm/VizuAdm.php">

                                Acesso Admin

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="../produto/pastel.php">

                                Acesso Pastel

                            </a>

                        </li>

                          <li>

                            <a
                                class="dropdown-item"
                                href="../produto/bebidas.php">

                                Acesso Bebidas

                            </a>

                        </li>

                          <li>

                            <a
                                class="dropdown-item"
                                href="../produto/massas.php">

                                Acesso Massas

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="../horario_funcionamento/VizuHora.php">

                                Acesso H. Funcionamento

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

    <div class="caixa-avaliacao">

        <h2 class="titulo-avaliacao">
            Avaliações
        </h2>


        <div class="table-responsive">

            <table class="table tabela-avaliacao">

                <thead>

                    <tr>

                        <th class="coluna-avaliacao">
                            Avaliação
                        </th>

                        <th class="coluna-acao">
                            Ação
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php

                    /* Busca as avaliações no banco */

                    $sql = "SELECT * FROM avaliacao";

                    $result = $conn->query($sql);


                    if ($result && $result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                            $id_ava = $row['id_ava'];

                            echo "

                            <tr>

                                <td>
                                    {$row['avaliacao']}
                                </td>

                                <td class='coluna-acao'>

                                    <a
                                        href='deleteAva.php?id_ava=$id_ava'
                                        onclick=\"return confirm('Deseja realmente excluir a Avaliação {$row['avaliacao']}?');\">

                                        <img
                                            class='icone-lixeira'
                                            src='../../imagens/lixo.png'
                                            alt='Excluir avaliação'>

                                    </a>

                                </td>

                            </tr>

                            ";

                        }

                    } else {

                        echo "

                        <tr>

                            <td
                                colspan='2'
                                class='sem-avaliacoes'>

                                Nenhuma avaliação cadastrada.

                            </td>

                        </tr>

                        ";

                    }

                    ?>

                </tbody>

            </table>

        </div>

    </div>

</main>



  <!-- =========================
     RODAPÉ
========================= -->

<footer class="rodape">

<div class="rodape-container">

    <div class="row">


    <!-- DIREITOS -->

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