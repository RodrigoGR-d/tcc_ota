<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Administrador OTA</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

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

            background-color: #222;

            width: 100%;

            padding: 15px 25px;

            border-bottom: 1px solid #444;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.25);
        }


        .header-content {

            width: 100%;

            min-height: 90px;

            display: flex;

            align-items: center;

            justify-content: center;

            position: relative;
        }


        /* =========================
           LOGO
        ========================= */

        .logo {

            width: 85px;
            height: 85px;

            object-fit: cover;

            border-radius: 50%;

            display: block;

            border: 3px solid #ffc107;

        }


        /* =========================
           TÍTULO
        ========================= */

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


        /* =========================
           MENU ADMINISTRADOR
        ========================= */

        .menu-header {

            margin-left: auto;

            display: flex;

            align-items: center;
        }


        .btn-painel {

            font-size: 15px;

            font-weight: bold;

            padding: 11px 18px;

            border-radius: 8px;

            background-color: #ffc107;

            color: #222;

            border: none;

            transition: 0.3s;
        }


        .btn-painel:hover {

            background-color: #e0a800;

            color: #222;

            transform: translateY(-2px);

            box-shadow:
                0 6px 15px rgba(255, 193, 7, 0.18);
        }


        .dropdown-menu {

            margin-top: 10px !important;

            background-color: #222;

            border: 1px solid #444;

            border-radius: 10px;

            padding: 8px;

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.35);
        }


        .dropdown-item {

            color: #ddd;

            border-radius: 7px;

            padding: 10px 13px;

            transition: 0.2s;
        }


        .dropdown-item:hover {

            background-color: #dc3545;

            color: white;
        }


        /* =========================
           CONTEÚDO
        ========================= */

        main {

            flex: 1;

            width: 100%;

            padding: 55px 20px 70px;

            position: relative;
        }


        .titulo-conteudo {

            text-align: center;

            margin-bottom: 45px;

            color: white;

            font-weight: bold;

            font-size: 30px;
        }


        .titulo-conteudo::after {

            content: "";

            display: block;

            width: 65px;

            height: 4px;

            background-color: #ffc107;

            border-radius: 10px;

            margin: 12px auto 0;
        }


        /* =========================
           CARDS DE ACESSO
        ========================= */

        .card-acesso {

            background-color: #222;

            border-radius: 15px;

            padding: 35px 20px;

            min-height: 175px;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            text-decoration: none;

            color: white;

            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.25);

            border: 1px solid #444;

            position: relative;

            overflow: hidden;

            transition: all 0.3s ease;
        }


        /* Linha amarela no topo */

        .card-acesso::before {

            content: "";

            position: absolute;

            top: 0;

            left: 0;

            width: 100%;

            height: 4px;

            background-color: #ffc107;
        }


        .card-acesso i {

            font-size: 42px;

            color: #ffc107;

            margin-bottom: 15px;

            transition: 0.3s;
        }


        .card-acesso p {

            margin: 0;

            font-size: 17px;

            font-weight: bold;

            text-align: center;

            color: #eee;
        }


        .card-acesso:hover {

            transform: translateY(-7px);

            border-color: #dc3545;

            color: white;

            box-shadow:
                0 12px 28px rgba(0, 0, 0, 0.4);
        }


        .card-acesso:hover i {

            color: #dc3545;

            transform: scale(1.1);
        }


        .card-acesso:hover p {

            color: white;
        }


        /* =========================
           RODAPÉ
        ========================= */

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
           DIREITOS
        ========================= */

        .direitos {

            border-top: 1px solid rgba(255, 193, 7, 0.3);

            margin-top: 10px;

            padding-top: 18px;

            text-align: center;

            color: #999;

            font-size: 14px;
        }


        .direitos::first-letter {

            color: #ffc107;
        }


        /* =========================
           RESPONSIVIDADE
        ========================= */

        @media (max-width: 768px) {

            header {

                padding: 15px;

            }


            .header-content {

                min-height: 150px;

                flex-direction: column;

                gap: 12px;

            }


            .logo {

                width: 70px;

                height: 70px;

            }


            .tituloheader {

                position: static;

                transform: none;

                font-size: 23px;

                order: 2;

            }


            .tituloheader::after {

                margin-top: 6px;

            }


            .menu-header {

                margin-left: 0;

                order: 3;

            }


            .btn-painel {

                font-size: 14px;

            }


            main {

                padding: 40px 15px 55px;

            }


            .titulo-conteudo {

                font-size: 25px;

                margin-bottom: 35px;

            }


            .card-acesso {

                min-height: 150px;

            }


            .card-acesso i {

                font-size: 36px;

            }


            .rodape {

                text-align: center;

            }

        }


        @media (max-width: 480px) {

            .tituloheader {

                font-size: 21px;

            }


            .titulo-conteudo {

                font-size: 23px;

            }


            .card-acesso {

                padding: 30px 15px;

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

            <img
                src="../imagens/logoota.jpeg"
                class="logo"
                alt="Logo OTA">


            <!-- TÍTULO -->

            <h1 class="tituloheader">

                Painel Administrador

            </h1>


            <!-- PAINEL ADMINISTRADOR -->

            <div class="menu-header">

                <div class="dropdown">


                    <button
                        class="btn dropdown-toggle btn-painel"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="bi bi-list"></i>

                        Listagem dos Cadastros

                    </button>


                    <ul class="dropdown-menu dropdown-menu-end">


                        <li>

                            <a
                                class="dropdown-item"
                                href="adm/VizuAdm.php">

                                <i class="bi bi-person"></i>

                                Acesso Admin

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="produto/pastel.php">

                                <i class="bi bi-shop"></i>

                                Acesso Pastel

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="produto/bebidas.php">

                                <i class="bi bi-cup-straw"></i>

                                Acesso Bebidas

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="produto/massas.php">

                                <i class="bi bi-basket"></i>

                                Acesso Massas

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="horario_funcionamento/VizuHora.php">

                                <i class="bi bi-clock"></i>

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

                Gerenciador Geral 

            </h2>


            <!-- CARDS -->

            <div class="row g-4 justify-content-center">


                <!-- ADMIN -->

                <div class="col-12 col-sm-6 col-lg-6">

                    <a
                        href="adm/formAdm.php"
                        class="card-acesso">

                        <i class="bi bi-person-plus"></i>

                        <p>

                            ADMIN

                        </p>

                    </a>

                </div>



                <!-- PRODUTOS -->

                <div class="col-6 col-sm-6 col-lg-6">

                    <a
                        href="produto/formProd.php"
                        class="card-acesso">

                        <i class="bi bi-shop"></i>

                        <p>

                            Produtos

                        </p>

                    </a>

                </div>



                <!-- HORÁRIOS -->

                <div class="col-6 col-sm-6 col-lg-6">

                    <a
                        href="horario_funcionamento/formHora.php"
                        class="card-acesso">

                        <i class="bi bi-clock"></i>

                        <p>

                            Horários 

                        </p>

                    </a>

                </div>



                <!-- AVALIAÇÕES -->

                <div class="col-12 col-sm-6 col-lg-6">

                    <a
                        href="avaliacao/VizuAva.php"
                        class="card-acesso">

                        <i class="bi bi-star"></i>

                        <p>

                            Avaliação

                        </p>

                    </a>

                </div>


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

                    <i class="bi bi-shop"></i>

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
