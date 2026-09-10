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
           BOTÕES DO FORMULÁRIO
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
           ÁREA DOS PRODUTOS
        ========================= */

        .caixa-produtos {
            max-width: 1200px;

            margin: 40px auto 0;

            background-color: white;

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
           CARDS DOS PRODUTOS
        ========================= */

        .card-produto {
            height: 100%;

            background-color: white;

            border: 1px solid #e5e5e5;

            border-radius: 12px;

            overflow: hidden;

            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);

            transition: transform 0.2s, box-shadow 0.2s;

            display: flex;
            flex-direction: column;
        }

        .card-produto:hover {
            transform: translateY(-4px);

            box-shadow: 0 7px 18px rgba(0, 0, 0, 0.13);
        }


        /* IMAGEM */

        .imagem-produto {
            width: 100%;

            height: 220px;

            object-fit: cover;

            display: block;

            background-color: #eee;
        }


        /* CORPO DO CARD */

        .card-produto-body {
            padding: 20px;

            display: flex;
            flex-direction: column;

            flex: 1;
        }

        .nome-produto {
            font-size: 20px;

            font-weight: bold;

            color: #333;

            margin-bottom: 10px;
        }

        .categoria-produto {
            display: inline-block;

            width: fit-content;

            background-color: #dc3545;

            color: white;

            padding: 4px 9px;

            border-radius: 5px;

            font-size: 12px;

            margin-bottom: 12px;
        }

        .descricao-produto {
            color: #666;

            font-size: 14px;

            line-height: 1.5;

            margin-bottom: 15px;

            flex: 1;
        }

        .preco-produto {
            color: #dc3545;

            font-size: 20px;

            font-weight: bold;

            margin-bottom: 15px;
        }


        /* BOTÕES DOS CARDS */

        .acoes-produto {
            display: flex;

            gap: 8px;
        }

        .acoes-produto .btn {
            flex: 1;

            font-size: 14px;
        }


        /* =========================
           SEM PRODUTOS
        ========================= */

        .sem-produtos {
            text-align: center;

            color: #777;

            padding: 30px;
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

            .menu-header {
                gap: 5px;
            }

            .btn-painel {
                font-size: 14px;

                padding: 8px 10px;
            }

            main {
                padding: 30px 15px;
            }

            .caixa-formulario,
            .caixa-produtos {
                padding: 20px;
            }

            .imagem-produto {
                height: 200px;
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