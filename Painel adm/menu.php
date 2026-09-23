<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Administrador OTA</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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


        /* Título */

        .tituloheader {
            position: absolute;

            left: 50%;

            transform: translateX(-50%);

            color: white;
            font-size: 32px;
            font-weight: bold;

            margin: 0;

            text-align: center;

            white-space: nowrap;
        }


        /* =========================
           CONTEÚDO
        ========================= */

        main {
            flex: 1;
            width: 100%;
            padding: 45px 20px 60px;
        }

        .titulo-conteudo {
            text-align: center;
            margin-bottom: 35px;
            color: #333;
            font-weight: bold;
        }


        /* =========================
           CARDS DE ACESSO
        ========================= */

        .card-acesso {
            background-color: white;
            border-radius: 12px;
            padding: 30px 20px;
            min-height: 150px;

            display: flex;
            align-items: center;
            justify-content: center;

            text-decoration: none;
            color: #333;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);

            border: 2px solid transparent;

            transition: all 0.25s ease;
        }

        .card-acesso:hover {
            transform: translateY(-5px);
            border-color: #dc3545;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            color: #dc3545;
        }

        .card-acesso p {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }


        /* =========================
           CARD SAIR
        ========================= */

        .card-sair {
            background-color: white;
            border-radius: 12px;

            padding: 25px 20px;

            width: 100%;
            max-width: 300px;

            margin: 35px auto 0;

            display: flex;
            align-items: center;
            justify-content: center;

            text-decoration: none;
            color: #333;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);

            border: 2px solid transparent;

            transition: all 0.25s ease;
        }

        .card-sair:hover {
            transform: translateY(-5px);
            border-color: #dc3545;
            color: #dc3545;
        }

        .card-sair p {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
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
                justify-content: center;
            }

            .logo-container {
                position: static;
                margin-right: 15px;
            }

            .logoota {
                width: 70px;
                height: 70px;
            }

            .tituloheader {
                font-size: 24px;
            }

            main {
                padding: 35px 15px 50px;
            }

            .card-acesso {
                min-height: 130px;
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

                <img src="../imagens/logoota.jpeg" class="logo" alt="Logo OTA">



            <!-- TÍTULO -->

            <h1 class="tituloheader">
                Painel Administrador
            </h1>


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
                                href="adm/VizuAdm.php">

                                Acesso Admin

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="produto/pastel.php">

                                Acesso Pastel

                            </a>

                        </li>

                          <li>

                            <a
                                class="dropdown-item"
                                href="produto/bebidas.php">

                                Acesso Bebidas

                            </a>

                        </li>

                          <li>

                            <a
                                class="dropdown-item"
                                href="produto/massas.php">

                                Acesso Massas

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="horario_funcionamento/VizuHora.php">

                                Acesso H. Funcionamento

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

            <h2 class="titulo-conteudo">
                Acessos do Sistema
            </h2>


            <!-- CARDS -->

            <div class="row g-4 justify-content-center">


                <!-- ADMIN -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <a
                        href="adm/formAdm.php"
                        class="card-acesso">

                        <p>
                            Cadastro ADMIN
                        </p>

                    </a>

                </div>


                <!-- PRODUTOS -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <a
                        href="produto/formProd.php"
                        class="card-acesso">

                        <p>
                            Cadastro Produtos
                        </p>

                    </a>

                </div>


                <!-- HORÁRIOS -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <a
                        href="horario_funcionamento/formHora.php"
                        class="card-acesso">

                        <p>
                            Cadastro Horário Funcionamento
                        </p>

                    </a>

                </div>


                <!-- AVALIAÇÕES -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <a
                        href="avaliacao/VizuAva.php"
                        class="card-acesso">

                        <p>
                            Acesso a Avaliação
                        </p>

                    </a>

                </div>

            </div>


            <!-- SAIR -->

            <a
                href="#"
                class="card-sair">

                <p>
                    Sair
                </p>

            </a>

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

        </div>

    </footer>



    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>