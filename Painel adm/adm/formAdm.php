<?php
/* Aqui virá o código de busca utilizando o comando SQL */
include "../../conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Adm</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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

        .logo {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
        }

        /* Menu */

        .menu-header {
            margin-left: auto;

            display: flex;
            align-items: center;
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
           CARD DO FORMULÁRIO
        ========================= */

        .caixa-formulario {
            background-color: white;

            max-width: 800px;
            margin: 0 auto;

            padding: 30px;

            border-radius: 12px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .titulo-formulario {
            text-align: center;
            margin-bottom: 25px;

            color: #333;
            font-weight: bold;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 7px;
        }

        .form-control:focus {
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
           TABELA
        ========================= */

        .caixa-tabela {
            background-color: white;

            max-width: 1100px;
            margin: 40px auto 0;

            padding: 30px;

            border-radius: 12px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .titulo-tabela {
            text-align: center;

            margin-bottom: 25px;

            color: #333;
            font-weight: bold;
        }

        .tabela-adm {
            width: 100%;
            margin-bottom: 0;

            border-collapse: separate;
            border-spacing: 0;

            overflow: hidden;
            border-radius: 8px;
        }

        /* Cabeçalho */

        .tabela-adm thead th {
            background-color: #dc3545;
            color: white;

            padding: 14px;

            border: none;

            text-align: left;
            white-space: nowrap;
        }

        /* Dados */

        .tabela-adm tbody td {
            padding: 14px;

            vertical-align: middle;

            border-bottom: 1px solid #ddd;
        }

        .tabela-adm tbody tr:last-child td {
            border-bottom: none;
        }

        .tabela-adm tbody tr:hover {
            background-color: #f8f8f8;
        }


        /* =========================
           COLUNA DE AÇÕES
        ========================= */

        .coluna-acao {
            width: 110px;
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
            width: 22px !important;
            height: 22px !important;

            object-fit: contain;

            margin: 0;

            transition: transform 0.2s;
        }

        .icone-acao:hover {
            transform: scale(1.15);
        }


        /* =========================
           NENHUM ADMINISTRADOR
        ========================= */

        .sem-administradores {
            text-align: center;

            color: #777;

            padding: 20px !important;
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

            .logo {
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

            .caixa-formulario,
            .caixa-tabela {
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

                <img src="../../imagens/logoota.jpeg" class="logo" alt="Logo OTA">

            </a>


            <!-- PAINEL ADMINISTRADOR -->

            <div class="menu-header">

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
                                href="VizuAdm.php">

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


        <!-- =========================
         FORMULÁRIO
    ========================= -->

        <div class="caixa-formulario">

            <h2 class="titulo-formulario">
                Cadastro de Adm
            </h2>


            <form method="post" action="insertAdm.php" enctype="multipart/form-data">


                <!-- CPF -->

                <div class="mb-3">

                    <label for="cpf_adm" class="form-label">

                        CPF:

                    </label>

                    <input type="text" name="cpf_adm" id="cpf_adm" class="form-control" placeholder="Insira o CPF"
                        required>

                </div>


                <!-- NOME -->

                <div class="mb-3">

                    <label for="nome_adm" class="form-label">

                        Nome:

                    </label>

                    <input type="text" name="nome_adm" id="nome_adm" class="form-control" placeholder="Insira seu nome"
                        required>

                </div>


                <!-- EMAIL -->

                <div class="mb-3">

                    <label for="email_adm" class="form-label">

                        Email:

                    </label>

                    <input type="email" name="email_adm" id="email_adm" class="form-control"
                        placeholder="Insira seu email" required>

                </div>


                <!-- SENHA -->

                <div class="mb-3">

                    <label for="senha_adm" class="form-label">

                        Senha:

                    </label>

                    <input type="text" name="senha_adm" id="senha_adm" class="form-control"
                        placeholder="Insira sua senha" required>

                </div>


                <!-- BOTÕES -->

                <div class="botoes-formulario">

                    <input type="submit" value="CADASTRAR" class="btn btn-success">

                    <input type="reset" value="CANCELAR" class="btn btn-secondary">

                </div>

            </form>

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