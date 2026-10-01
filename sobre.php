<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sobre - Pastelaria OTA</title>

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


        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
        }


        body {
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
            background-color: #333;
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
            top: 50%;
            transform: translateY(-50%);
        }


        .logoota {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
        }


        /* =========================
           MENU
        ========================= */

        .menu-navegacao {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }


        .menu-navegacao a {
            position: relative;
            color: #ffc107;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
            padding: 10px 16px;
            border-radius: 8px;
        }


        .menu-navegacao a:hover {
            color: #fff;
            background-color: rgba(255, 193, 7, 0.12);
        }


        /* =========================
           CONTA E CARRINHO
        ========================= */

        .header-direita {
            position: absolute;
            right: 0;
            display: flex;
            align-items: center;
            gap: 25px;
        }


        .conta-link {
            color: black;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }


        .conta {
            margin: 0;
            font-weight: bold;
            color: black;
        }


        .user {
            font-size: 28px;
            color: black;
        }


        .carrinho {
            font-size: 30px;
            color: black;
            cursor: pointer;
        }


        /* =========================
           CONTEÚDO SOBRE
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


        .card-sobre {
            background-color: white;
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            width: 100%;
        }


        /* =========================
           IMAGEM
        ========================= */

        .imagem-sobre {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
        }


        /* =========================
           TEXTO
        ========================= */

        .texto-sobre {
            padding: 10px 20px;
        }


        .texto-sobre h2 {
            color: #dc3545;
            font-weight: bold;
            margin-bottom: 25px;
        }


        .texto-sobre h3 {
            color: #ffc107;
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 15px;
        }


        .texto-sobre p {
            color: #555;
            font-size: 17px;
            line-height: 1.7;
            margin-bottom: 18px;
        }


        /* =========================
           DESTAQUE 1983
        ========================= */

        .ano-destaque {
            margin-top: 35px;
            background-color: #333;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
        }


        .ano-destaque h2 {
            color: #ffc107;
            font-size: 45px;
            font-weight: bold;
            margin-bottom: 10px;
        }


        .ano-destaque p {
            color: white;
            font-size: 18px;
            margin: 0;
        }


        /* =========================
           RODAPÉ
        ========================= */

        .rodape {
            width: 100%;
            background-color: #333;
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
           SOBRE FOOTER
        ========================= */

        .sobre-footer {
            text-align: center;
            padding: 0 25px;
        }


        .sobre-footer h5 {
            margin-bottom: 20px;
            font-weight: bold;
        }


        .link-sobre-footer {
            color: white;
            text-decoration: none;
        }


        .link-sobre-footer:hover {
            color: #ffc107;
            text-decoration: underline;
        }


        .sobre-footer p {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 0;
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

        @media (max-width: 991px) {

            header {
                padding: 15px 20px;
            }


            .header-content {
                min-height: auto;
                flex-direction: column;
                gap: 15px;
                padding-bottom: 5px;
            }


            .logo-container {
                position: static;
                transform: none;
                align-self: flex-start;
            }


            .menu-navegacao {
                flex-wrap: wrap;
                width: 100%;
                padding: 5px 0;
            }


            .menu-navegacao a {
                font-size: 15px;
                padding: 8px 12px;
            }


            .header-direita {
                position: static;
                margin-top: 5px;
                justify-content: center;
            }


            .redes-sociais {
                justify-content: center;
            }


            .rodape {
                text-align: center;
            }


            .rodape .text-start,
            .rodape .text-end {
                text-align: center !important;
            }


            .imagem-sobre {
                height: 350px;
            }

        }


        @media (max-width: 768px) {

            .imagem-sobre {
                height: 300px;
            }


            .card-sobre {
                padding: 25px 20px;
            }


            .texto-sobre {
                padding: 15px 5px;
            }


            .texto-sobre p {
                font-size: 16px;
            }

        }


        @media (max-width: 480px) {

            .logoota {
                width: 60px;
                height: 60px;
            }


            .menu-navegacao {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                width: 100%;
                gap: 5px;
            }


            .menu-navegacao a {
                text-align: center;
                width: 100%;
                font-size: 14px;
                padding: 8px 9px;
            }


            .imagem-sobre {
                height: 230px;
            }


            .ano-destaque h2 {
                font-size: 38px;
            }


            .ano-destaque p {
                font-size: 16px;
            }


            .sobre-footer p {
                font-size: 14px;
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

            <img
                class="logoota"
                src="imagens/logoota.jpeg"
                alt="Logo OTA">

        </div>


        <!-- MENU -->

        <nav class="menu-navegacao">

            <a href="index.php">

                <i class="bi bi-house-door"></i>

                Home

            </a>


            <a href="cardapio.php">

                <i class="bi bi-shop"></i>

                Cardápio

            </a>


            <a href="sobre.php">

                <i class="bi bi-people"></i>

                Sobre

            </a>


            <a href="Usuário Final/fale_conosco/contato.php">

                <i class="bi bi-telephone"></i>

                Fale Conosco

            </a>

        </nav>


        <!-- CONTA E CARRINHO -->

        <div class="header-direita">

            <a
                href="conta_user.php"
                class="conta-link">

                <span class="conta">

                    CONTA

                </span>

                <i class="bi bi-person-circle user"></i>

            </a>


            <i class="bi bi-cart4 carrinho"></i>

        </div>

    </div>

</header>


<!-- =========================
     CONTEÚDO
========================= -->

<main>

    <div class="container-fluid">


        <h2 class="titulo-conteudo">

            Sobre a Pastelaria OTA

        </h2>


        <div class="card-sobre">


            <div class="row align-items-center g-4">


                <!-- IMAGEM DO PASTEL -->

                <div class="col-12 col-lg-6">

                    <img
                        src="imagens/carro2.jpeg"
                        class="imagem-sobre"
                        alt="Pastelaria OTA">

                </div>


                <!-- TEXTO -->

                <div class="col-12 col-lg-6">

                    <div class="texto-sobre">


                        <h2>

                            Nossa História

                        </h2>


                        <p>

                            A Pastelaria OTA começou sua história em
                            <strong>1983</strong>, dando início a uma
                            tradição familiar que continua até os dias
                            de hoje.

                        </p>


                        <p>

                            Fundada pelo pai do atual proprietário,
                            <strong>Nelson</strong>, a pastelaria
                            cresceu preservando o fazer artesanal e
                            o cuidado presente em cada produto.

                        </p>


                        <p>

                            Ao longo dos anos, a Pastelaria OTA
                            manteve seus valores e buscou oferecer
                            aos clientes produtos preparados com
                            qualidade, sabor e dedicação.

                        </p>


                        <h3>

                            Qualidade e tradição

                        </h3>


                        <p>

                            Nossa história é construída através da
                            tradição familiar, do preparo artesanal
                            e do compromisso em oferecer um
                            atendimento acolhedor aos nossos clientes.

                        </p>


                        <p>

                            Mais do que uma pastelaria, a OTA representa
                            uma tradição que passou de geração em
                            geração, mantendo o carinho e o cuidado
                            presentes desde o seu início.

                        </p>


                    </div>

                </div>


            </div>


            <!-- =========================
                 DESTAQUE
            ========================= -->

            <div class="ano-destaque">


                <h2>

                    1983

                </h2>


                <p>

                    O começo de uma tradição familiar

                </p>


            </div>


        </div>

    </div>

</main>


<!-- =========================
     RODAPÉ
========================= -->

<footer
    class="rodape">


    <div class="rodape-container">


        <div class="row align-items-start">


            <!-- FALE CONOSCO -->

            <div class="col-lg-4 col-md-4 col-sm-12 mb-4 text-start">

                <h5>

                    Fale Conosco

                </h5>


                <p>

                    <i class="bi bi-telephone"></i>

                    (12) 99999-9999

                </p>


                <p>

                    <i class="bi bi-geo-alt"></i>

                    Rua Neymar, Centro

                </p>


                <p>

                    São Paulo - SP

                </p>

            </div>


            <!-- SOBRE NÓS -->

            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">

                <div class="sobre-footer">


                    <h5>

                        <a
                            href="sobre.php"
                            class="link-sobre-footer">

                            Sobre Nós

                        </a>

                    </h5>


                    <p>

                        A Pastelaria OTA oferece pastéis
                        saborosos e tradicionais, preparados
                        com qualidade e carinho desde 1983.

                    </p>


                </div>

            </div>


            <!-- REDES SOCIAIS -->

            <div class="col-lg-4 col-md-4 col-sm-12 mb-4 text-end">


                <h5>

                    Siga-nos

                </h5>


                <div class="redes-sociais">


                    <a href="#">

                        <i class="bi bi-facebook"></i>

                    </a>


                    <a href="#">

                        <i class="bi bi-instagram"></i>

                    </a>


                    <a href="#">

                        <i class="bi bi-twitter-x"></i>

                    </a>


                </div>


            </div>


        </div>


        <!-- DIREITOS -->

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