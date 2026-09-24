<?php
/* Aqui virá o código de busca utilizando o comando SQL */
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pastelaria OTA</title>

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
            background-color: #dc3545;

            width: 100%;

            padding: 15px 25px;

            position: relative;

            background-color: #333;
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
           MENU DE NAVEGAÇÃO
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

            transition: all 0.3s ease;
        }


        .menu-navegacao a::after {
            content: "";

            position: absolute;

            width: 0;

            height: 3px;

            background-color: #ffc107;

            left: 50%;

            bottom: 4px;

            transform: translateX(-50%);

            border-radius: 10px;

            transition: width 0.3s ease;
        }


        .menu-navegacao a:hover {
            color: #fff;

            background-color: rgba(255, 193, 7, 0.12);

            transform: translateY(-3px);
        }


        .menu-navegacao a:hover::after {
            width: 65%;
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
            color: #ffc107;

            text-decoration: none;

            display: flex;

            align-items: center;

            gap: 8px;

            transition: all 0.3s ease;
        }


        .conta-link:hover {
            transform: translateY(-2px);

            opacity: 0.75;
        }


        .conta {
            margin: 0;

            font-weight: bold;

            color: white;
        }


        .user {
            font-size: 28px;

            color: white;
        }


        .carrinho {
            font-size: 30px;

            color: white;

            cursor: pointer;

            transition: all 0.3s ease;
        }


        .carrinho:hover {
            transform: scale(1.15);

            color: #ffc107;
        }



        /* =========================
           CARROSSEL
        ========================= */

        .carrossel-full {
            width: 100%;

            margin: 0;

            padding: 0;

            overflow: hidden;

        }


        .carrossel-full .carousel {
            width: 100%;

            margin: 0;

            padding: 0;

        }


        .carrossel-full .carousel-inner {
            width: 100%;

            margin: 0;

            padding: 0;

            
        }

        .carrossel-full .carousel-item img {
            width: 100%;

            height: 500px;

            display: block;

            margin: 0;

            padding: 0;

            object-fit: fill;
        }

        .destaque{
            font-weight: bold;

            color: #fff;
        }

        /* =========================
           CONTEÚDO
        ========================= */

        .vermelho{
            color: red;
        }

        main {
            flex: 1;

            width: 100%;

            padding: 45px 20px 60px;
        }


        .titulo-conteudo {

            font-size: 20px;

            font-weight: 600;

            margin-bottom: 5px;

            color: red;

            font-weight: bold;
        }

        .valores{
            font-size: 40px;
            font-weight: 570;
            line-height: 1.10;
            margin-top: 18px;
        }

        .escrita-conteudo{
            font-size: 21px;
            line-height: 1.4;
            max-width: 100%;
        }

        .imagem-essencial{
            width:100%;
            margin-top: 10px;
        }

        .cardq{
        height: 300px;

        width: 100%;

        border-radius: 18px 0 0 18px;

        overflow: hidden;

        }

        .container-fluid .row{
            padding-bottom: 50px;
        }

        /* =========================
           CARDS PRINCIPAIS
        ========================= */

        .card-home {
            background-color: white;

            border-radius: 12px;

            padding: 30px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);

            width: 100%;

            height: 100%;
        }


        /* =========================================
   DO NOSSO BALCÃO PARA VOCÊ
========================================= */

.local-pedido {
    width: 100%;
    background-color: #333;
    color: #ffffff;

    padding-top: 30px;

    margin: 0;
}


/* =========================================
   TÍTULO
========================================= */

.titulo-local {
    margin-bottom: 70px;
}

.titulo-local h2 {
    margin: 0;

    color: #ffffff;

    font-size: 40px;
    font-weight: 800;
}

.titulo-local p {
    margin-top: 12px;

    color: #bdbdbd;

    font-size: 17px;
}


/* =========================================
   CONTEÚDO
========================================= */

.local-conteudo {
    min-height: 270px;
}


/* =========================================
   INFORMAÇÕES LATERAIS
========================================= */

.info-local {
    padding: 20px 10px;

    text-align: center;
}


/* ÍCONES */

.info-local > i {
    display: block;

    color: #e21b23;

    font-size: 42px;

    margin-bottom: 18px;
}


/* TÍTULOS */

.info-local h3 {
    color: #ffffff;

    font-size: 23px;
    font-weight: 700;

    margin-bottom: 12px;
}


/* TEXTOS */

.info-local p {
    color: #bdbdbd;

    font-size: 16px;

    line-height: 1.7;

    margin-bottom: 22px;
}


/* =========================================
   BOTÃO VERMELHO
========================================= */

.btn-local {
    display: inline-flex;

    align-items: center;
    gap: 8px;

    padding: 12px 21px;

    background-color: #e21b23;

    color: #ffffff;

    text-decoration: none;

    border-radius: 30px;

    font-size: 15px;
    font-weight: 700;

    transition: 0.3s;
}


.btn-local:hover {
    background-color: #ff2b32;

    color: #ffffff;

    transform: translateY(-2px);
}


/* =========================================
   MAPA
========================================= */

.mapa-local {

    width: 100%;
    height: 250px;

    overflow: hidden;

    border-radius: 20px;

    background-color: #171717;

    text-align: center;
}


        /* =========================
           SOBRE NÓS
        ========================= */

        .titulo-sobre {
            text-align: center;

            margin-bottom: 25px;

            color: #333;

            font-weight: bold;
        }


        .sobre-conteudo {
            min-height: 300px;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            text-align: center;

            padding: 10px 20px;
        }


        .sobre-conteudo h3 {
            color: #ffc107;

            font-weight: bold;

            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }


        .icone-sobre {
            font-size: 65px;

            color: #dc3545;

            margin-bottom: 20px;
        }


        .sobre-conteudo p {
            font-size: 17px;

            line-height: 1.6;

            color: #555;

            max-width: 800px;

            margin-bottom: 15px;
        }


        /* =========================
           TABELA DE HORÁRIOS
        ========================= */

        .card{
            padding: 25px;
            margin: 10px 0;
            text-align: center;
            background-color: #e9ecef;
        }


        /* =========================
           RODAPÉ
        ========================= */

        .rodape {
            width: 100%;

            background-color: #333;

            color: white;

            padding: 40px 0 20px 0px;

            margin-top: 30px;
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
           SOBRE NÓS DO FOOTER
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

            transition: all 0.3s ease;
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
            font-size: 20px;

            margin-right: 20px;
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

        @media (max-width: 1100px) {

            .menu-navegacao a {
                font-size: 15px;

                padding: 8px 10px;
            }

        }


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


            .sobre-footer {
                padding: 0 10px;
            }


            /* CARROSSEL TABLET */

            .carrossel-full .carousel-item img {
                height: 400px;
            }

        }


        @media (max-width: 768px) {

            /* CARROSSEL CELULAR */

            .carrossel-full .carousel-item img {
                height: 300px;
            }


            .tabela-horarios {
                font-size: 14px;
            }


            .tabela-horarios thead th,
            .tabela-horarios tbody td {
                padding: 10px;
            }


            .card-home {
                padding: 25px 20px;
            }


            .cardapio-conteudo,
            .sobre-conteudo {
                min-height: 250px;
            }


            .menu-navegacao {
                gap: 3px;
            }


            .menu-navegacao a {
                font-size: 14px;

                padding: 8px 9px;
            }

        }


        @media (max-width: 480px) {

            .logoota {
                width: 60px;

                height: 60px;
            }


            /* CARROSSEL CELULAR PEQUENO */

            .carrossel-full .carousel-item img {
                height: 230px;
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
            }


            .header-direita {
                gap: 18px;
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


            <a href="contato.php">

                <i class="bi bi-telephone"></i>

                Fale Conosco

            </a>

        </nav>


        <!-- CONTA E CARRINHO -->

        <div class="header-direita">

            <a
                href="Usuário Final/login_user.php"
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
     CARROSSEL
========================= -->

<div class="carrossel-full col-12">


    <div
        id="carouselExampleAutoplaying"
        class="carousel slide"
        data-bs-ride="carousel"
        data-bs-interval="2300">


        <div class="carousel-inner">


            <div class="carousel-item active">

                <img
                    src="imagens/WhatsApp Image 2026-09-17 at 18.00.00.jpeg"
                    alt="Pastelaria OTA">

                    <div class="carousel-caption d-none d-md-block">
                <h3 class="destaque">Destaques da Semana</h3>
              </div>
            </div>


            <div class="carousel-item">

                <img
                    src="imagens/WhatsApp Image 2026-09-17 at 18.00.02.jpeg"
                    alt="Pastéis OTA">

                    <div class="carousel-caption d-none d-md-block">
                <h2 class="destaque">Destaques da Semana</h2>
              </div>

            </div>


            <div class="carousel-item">

                <img
                    src="imagens/WhatsApp Image 2026-09-17 at 18.00.01.jpeg"
                    alt="Pastéis OTA">

                    <div class="carousel-caption d-none d-md-block">
                <h2 class="destaque">Destaques da Semana</h2>
              </div>

            </div>


        </div>


        <!-- BOTÃO ANTERIOR -->

        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">

            <span
                class="carousel-control-prev-icon"
                aria-hidden="true">
            </span>

            <span class="visually-hidden">
                Anterior
            </span>

        </button>


        <!-- BOTÃO PRÓXIMO -->

        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">

            <span
                class="carousel-control-next-icon"
                aria-hidden="true">
            </span>

            <span class="visually-hidden">
                Próximo
            </span>

        </button>


    </div>

</div>


<!-- =========================
     CONTEÚDO
========================= -->

<main id="home">

    <div class="container-fluid">

    <div class="row">

        <div class="col-lg-5 col-md-5 col-sm-12">

        
        <h5 class="titulo-conteudo">

            A NOSSA ESSÊNCIA

        </h5>

        <h3 class="valores">

        Feito para matar a fome.
        Feito para <span class="vermelho">
            você</span>.

        </h3>

        <p class="escrita-conteudo">Na Ota Pasteís, cada pastel é preparado com 
        carinho, ingredientes selecionados e muito sabor.
        Mais do que uma refeição, é uma experiência!
        </p>

        </div>

        <div class="col-lg-7 col-md-7 col-sm-12">
                
            <img class="cardq" src="imagens/WhatsApp Image 2026-09-23 at 13.36.40.jpeg">
        </div>

        
    </div>

    </div>
<!---
CONTEUDO DO NOS VISITE
-->

    <!-- =========================
         CONTEÚDO ANTERIOR
         A NOSSA ESSÊNCIA
    ========================== -->

    <section class="essencia">
        <!-- Seu conteúdo anterior fica aqui -->
    </section>


    <!-- =========================
         DO NOSSO BALCÃO PARA VOCÊ
    ========================== -->

    <section class="local-pedido">

        <div class="container">

            <!-- Título -->
            <div class="titulo-local text-center">

                <h2>Do nosso balcão para você</h2>

                <p>
                    Venha nos visitar ou peça seu pastel sem sair de casa.
                </p>

            </div>


            <!-- Conteúdo -->
            <div class="row align-items-center local-conteudo">

                <!-- =====================
                     LOCALIZAÇÃO
                ====================== -->

                <div class="col-lg-3 col-md-4">

                    <div class="info-local">

                        <i class="bi bi-geo-alt-fill"></i>

                        <h3>Venha nos visitar</h3>

                        <p>
                            Avenida João Paulo II - 420<br>
                            Aparecida - SP
                        </p>

                        <a href="https://www.google.com/maps/place/Av.+Jo%C3%A3o+Paulo+II,+Aparecida+-+SP,+12575-050/@-22.844812,-45.23239,15z/data=!4m6!3m5!1s0x94ccc3666e659ad9:0x27568b4dd0a109b4!8m2!3d-22.8448118!4d-45.2323898!16s%2Fg%2F11z7qc7f43?hl=pt-BR&entry=ttu&g_ep=EgoyMDI2MDkyMi4wIKXMDSoASAFQAw%3D%3D" class="btn-local">
                            <i class="bi bi-map"></i>
                            Maps Google
                        </a>

                    </div>

                </div>


                <!-- =====================
                     MAPA
                ====================== -->

                <div class="col-lg-6 col-md-4">

                    <div class="mapa-local">

                        <!-- Coloque sua imagem do mapa aqui -->
                        
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.8562617126704!2d-45.23496472595337!3d-22.84480683565638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccc3666e659ad9%3A0x27568b4dd0a109b4!2sAv.%20Jo%C3%A3o%20Paulo%20II%2C%20Aparecida%20-%20SP%2C%2012575-050!5e0!3m2!1spt-BR!2sbr!4v1789588626173!5m2!1spt-BR!2sbr" 
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>

                    </div>

                </div>


                <!-- =====================
                     DELIVERY
                ====================== -->

                <div class="col-lg-3 col-md-4">

                    <div class="info-local">

                        <i class="bi bi-bicycle"></i>

                        <h3>Prefere receber em casa?</h3>

                        <p>
                            Faça seu pedido online e
                            receba seu pastel quentinho.
                        </p>

                        <a href="cardapio.php" class="btn-local">
                            <i class="bi bi-cart"></i>
                            Fazer pedido
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>   
        
        
</main>


<!-- =========================
     RODAPÉ
========================= -->

<footer
    class="rodape"
    id="contato">


    <div class="rodape-container">


        <div class="row ">


            <!-- =========================
                 FALE CONOSCO
            ========================= -->

            <div class="col-lg-4 col-md-4 col-sm-12 mb-4 text-center">

                <h5>

                    Fale Conosco

                </h5>


                <p>

                    <i class="bi bi-telephone"></i>

                    (12) 99241-5366

                </p>


                <p>

                    <i class="bi bi-geo-alt"></i>

                    Avenida João Paulo II - 420

                </p>


                <p>

                    Aparecida - SP

                </p>

            </div>


            <!-- =========================
                 SOBRE NÓS
            ========================= -->

            <div class="col-lg-4 col-sm-12 mb-4 text-center">


                    <h5>

                    Links                        

                    </h5>

                    <p>
                        <a href="faleconosco" 
                        class="link-sobre-footer">
                            Fale Conosco
                        </a>
                    </p>

                    <p>

                    <a href="sobre.php" 
                    class="link-sobre-footer">

                            Sobre Nós

                        </a>
                    </p>


            </div>


            <!-- =========================
                 REDES SOCIAIS
            ========================= -->

            <div class="col-lg-4 col-md-4 col-sm-12 mb-4 text-center">


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


        <!-- =========================
             DIREITOS
        ========================= -->

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