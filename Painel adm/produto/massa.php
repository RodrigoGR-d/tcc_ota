<?php
include "../../conexao.php";

// Busca os produtos cadastrados
$sql = "SELECT * FROM produtos WHERE prod_idcategoria = 'bebida'";
$result = $conn->query($sql);
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

    <title>Visualização de Massas</title>

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

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;
        }


        /* LOGO */

        .logo {
            width: 100px;

            height: 100px;

            object-fit: cover;

            border-radius: 50%;

            display: block;
        }


        /* MENU */

        .menu-header {
            margin-left: auto;

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 10px;

            flex-wrap: wrap;
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

            padding: 40px 20px 50px;
        }


        /* =========================
           CARD DOS PRODUTOS
        ========================= */

        .caixa-produtos {
            background-color: white;

            max-width: 1200px;

            margin: 0 auto;

            padding: 30px;

            border-radius: 12px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }


        .titulo-produtos {
            text-align: center;

            margin-bottom: 30px;

            color: #333;

            font-weight: bold;
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

            border-collapse: separate;

            border-spacing: 0;

            border-radius: 8px;

            overflow: hidden;
        }


        /* CABEÇALHO */

        .tabela-produtos thead th {
            background-color: #dc3545;

            color: white;

            padding: 14px;

            border: none;

            text-align: center;

            white-space: nowrap;
        }


        /* DADOS */

        .tabela-produtos tbody td {
            padding: 14px;

            vertical-align: middle;

            border-bottom: 1px solid #ddd;

            text-align: center;
        }


        .tabela-produtos tbody tr:last-child td {
            border-bottom: none;
        }


        .tabela-produtos tbody tr:hover {
            background-color: #f8f8f8;
        }


        /* =========================
           COLUNA AÇÕES
        ========================= */

        .coluna-acao {
            width: 150px;

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

            transition: transform 0.2s;
        }


        .icone-acao:hover {
            transform: scale(1.15);
        }


        /* =========================
           MENSAGEM
        ========================= */

        .mensagem-vazia {
            text-align: center;

            padding: 30px;

            color: #666;

            font-size: 17px;
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


            .header-content {
                flex-direction: column;
            }


            .logo {
                width: 75px;

                height: 75px;
            }


            .menu-header {
                margin-left: 0;

                justify-content: center;
            }


            .btn-painel {
                font-size: 14px;

                padding: 8px 12px;
            }


            main {
                padding: 30px 15px;
            }


            .caixa-produtos {
                padding: 20px;
            }


            .tabela-produtos {
                min-width: 650px;
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

            <a href="../menu.php">

                <img
                    src="../../imagens/logoota.jpeg"
                    class="logo"
                    alt="Logo OTA">

            </a>


            <!-- MENUS -->

            <div class="menu-header">


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


                <!-- LISTAGEM DOS CADASTROS -->

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


        <div class="caixa-produtos">


            <h2 class="titulo-produtos">

                Massas cadastradas

            </h2>


            <div class="tabela-container">


                <table class="tabela-produtos">


                    <thead>

                        <tr>

                            <th>
                                Nome
                            </th>

                            <th>
                                Preço
                            </th>

                            <th>
                                Descrição
                            </th>

                            <th class="coluna-acao">
                                Ações
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php

                        if ($result && $result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {

                                $id_prod = $row['id_prod'];

                                $nome = htmlspecialchars($row['prod_nome']);

                                $preco = htmlspecialchars($row['prod_preco']);

                                $descricao = htmlspecialchars($row['prod_descricao']);

                                ?>


                                <tr>


                                    <!-- NOME -->

                                    <td>

                                        <?php echo $nome; ?>

                                    </td>


                                    <!-- PREÇO -->

                                    <td>

                                        R$ <?php echo $preco; ?>

                                    </td>


                                    <!-- DESCRIÇÃO -->

                                    <td>

                                        <?php echo $descricao; ?>

                                    </td>


                                    <!-- AÇÕES -->

                                    <td class="coluna-acao">


                                        <!-- EDITAR -->

                                        <a
                                            href="editarProd.php?id_prod=<?php echo $id_prod; ?>"
                                            class="acao"
                                            title="Editar produto">

                                            <img
                                                src="../../imagens/lapis.png"
                                                class="icone-acao"
                                                alt="Editar">

                                        </a>


                                        <!-- EXCLUIR -->

                                        <a
                                            href="deleteProd.php?id_prod=<?php echo $id_prod; ?>"
                                            class="acao"
                                            title="Excluir produto"
                                            onclick="return confirm('Deseja realmente excluir o produto <?php echo $nome; ?>?');">

                                            <img
                                                src="../../imagens/lixeira.png"
                                                class="icone-acao"
                                                alt="Excluir">

                                        </a>


                                    </td>


                                </tr>


                                <?php

                            }

                        } else {

                            ?>


                            <tr>

                                <td
                                    colspan="4"
                                    class="mensagem-vazia">

                                    Nenhuma massa cadastrada.

                                </td>

                            </tr>


                            <?php

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


            <div class="direitos">

                © 2026 Pastelaria OTA - Todos os direitos reservados.

            </div>


        </div>


    </footer>



    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
