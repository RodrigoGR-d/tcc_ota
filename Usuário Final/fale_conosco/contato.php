<?php
/* Aqui virá o código de busca utilizando o comando SQL */
include "../../conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fale Conosco</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
           FORMULÁRIO
        ========================= */

        .area-formulario {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            flex: 1;
        }

        .card-formulario {
            background-color: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.12);
        }

        .titulo-formulario {
            color: #dc3545;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitulo-formulario {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 7px;
            padding: 10px 12px;
        }

        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        }

        textarea.form-control {
            min-height: 130px;
            resize: vertical;
        }

        .botoes-formulario {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
        }

        /* =========================
           RODAPÉ
        ========================= */

        .rodape {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 40px 0 20px 0;
            margin-top: auto;
        }

        .rodape-container {
            width: 90%;
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
           LINKS DO FOOTER
        ========================= */

        .link-sobre-footer {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .link-sobre-footer:hover {
            color: #ffc107;
            text-decoration: underline;
        }

        /* =========================
           REDES SOCIAIS
        ========================= */

        .redes-sociais {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .redes-sociais a {
            font-size: 28px;
            transition: transform 0.2s;
        }

        .redes-sociais a:hover {
            transform: scale(1.15);
            color: #ffc107;
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

            .area-formulario {
                width: 95%;
            }
        }

        @media (max-width: 768px) {

            .card-formulario {
                padding: 25px 20px;
            }

            .menu-navegacao {
                gap: 3px;
            }

            .menu-navegacao a {
                font-size: 14px;
                padding: 8px 9px;
            }

            .rodape {
                text-align: center;
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
            }

            .header-direita {
                gap: 18px;
            }

            .area-formulario {
                width: 95%;
                margin-top: 30px;
            }

            .card-formulario {
                padding: 20px 15px;
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
                    src="../../imagens/logoota.jpeg"
                    alt="Logo OTA">

            </div>


            <!-- MENU -->

            <nav class="menu-navegacao">

                <a href="../../index.php">
                    <i class="bi bi-house-door"></i>
                    Home
                </a>

                <a href="../../cardapio.php">
                    <i class="bi bi-shop"></i>
                    Cardápio
                </a>

                <a href="../../sobre.php">
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
         FORMULÁRIO
    ========================= -->

    <main class="area-formulario">

        <div class="card-formulario">

            <h2 class="titulo-formulario">
                Fale Conosco
            </h2>

            <p class="subtitulo-formulario">
                Preencha o formulário abaixo e entre em contato conosco.
            </p>


            <form
                method="post"
                action="insertFale.php"
                enctype="multipart/form-data">


                <!-- NOME -->

                <div class="mb-4">

                    <label
                        for="nome_fale"
                        class="form-label">

                        Nome:

                    </label>

                    <input
                        type="text"
                        name="nome_fale"
                        id="nome_fale"
                        class="form-control"
                        placeholder="Insira seu nome"
                        required>

                </div>


                <!-- EMAIL -->

                <div class="mb-4">

                    <label
                        for="email_fale"
                        class="form-label">

                        Email:

                    </label>

                    <input
                        type="email"
                        name="email_fale"
                        id="email_fale"
                        class="form-control"
                        placeholder="Insira seu email"
                        required>

                </div>


                <!-- TELEFONE -->

                <div class="mb-4">

                    <label
                        for="telefone_fale"
                        class="form-label">

                        Telefone:

                    </label>

                    <input
                        type="text"
                        name="telefone_fale"
                        id="telefone_fale"
                        class="form-control"
                        placeholder="Insira seu telefone"
                        required>

                </div>


                <!-- ASSUNTO -->

                <div class="mb-4">

                    <label
                        for="assunto_fale"
                        class="form-label">

                        Assunto:

                    </label>

                    <input
                        type="text"
                        name="assunto_fale"
                        id="assunto_fale"
                        class="form-control"
                        placeholder="Insira o assunto"
                        required>

                </div>


                <!-- MENSAGEM -->

                <div class="mb-4">

                    <label
                        for="mensagem_fale"
                        class="form-label">

                        Mensagem:

                    </label>

                    <textarea
                        name="mensagem_fale"
                        id="mensagem_fale"
                        class="form-control"
                        placeholder="Insira sua mensagem"
                        required></textarea>

                </div>


                <!-- BOTÕES -->

                <div class="botoes-formulario">

                    <input
                        type="submit"
                        value="CADASTRAR"
                        class="btn btn-success">

                    <input
                        type="reset"
                        value="CANCELAR"
                        class="btn btn-danger">

                </div>

            </form>

        </div>

    </main>


    <!-- =========================
         RODAPÉ
    ========================= -->

    <footer
        class="rodape"
        id="contato">

        <div class="rodape-container">

            <div class="row">


                <!-- FALE CONOSCO -->

                <div class="col-lg-4 col-md-4 col-sm-12 mb-4 text-center">

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


                <!-- LINKS -->

                <div class="col-lg-4 col-md-4 col-sm-12 mb-4 text-center">

                    <h5>
                        Links
                    </h5>

                    <p>

                        <a
                            href="contato.php"
                            class="link-sobre-footer">

                            Fale Conosco

                        </a>

                    </p>

                    <p>

                        <a
                            href="sobre.php"
                            class="link-sobre-footer">

                            Sobre Nós

                        </a>

                    </p>

                </div>


                <!-- REDES SOCIAIS -->

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


            <!-- DIREITOS -->

            <div class="direitos">

                © 2026 Pastelaria OTA - Todos os direitos reservados.

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWwO4X8jV5wV5V6z9Xk5m2M"
        crossorigin="anonymous">
    </script>

</body>
</html>