<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cardápio - Pastelaria OTA</title>

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

        }


        .header-content {

            width: 100%;

            min-height: 70px;

            display: flex;

            align-items: center;

            justify-content: center;

            position: relative;

        }


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

            transition: all 0.3s ease;

        }


        .conta-link:hover {

            transform: translateY(-2px);

            opacity: 0.75;

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

            transition: all 0.3s ease;

        }


        .carrinho:hover {

            transform: scale(1.15);

            color: #ffc107;

        }


        /* =========================
           TÍTULO DO CARDÁPIO
        ========================= */

        .titulo-cardapio {

            text-align: center;

            margin-top: 40px;

            margin-bottom: 35px;

        }


        .titulo-cardapio h1 {

            color: #dc3545;

            font-weight: bold;

            margin-bottom: 10px;

        }


        .titulo-cardapio p {

            color: #555;

            font-size: 17px;

        }


        /* =========================
           PRODUTOS
        ========================= */

        .area-cardapio {

            width: 90%;

            max-width: 1200px;

            margin: 0 auto 50px auto;

        }


        .categoria-titulo {

            color: #dc3545;

            font-weight: bold;

            border-bottom: 3px solid #ffc107;

            padding-bottom: 8px;

            margin-top: 35px;

            margin-bottom: 25px;

        }


        .produto {

            background-color: white;

            border-radius: 12px;

            overflow: hidden;

            height: 100%;

            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.12);

            transition: all 0.3s ease;

        }


        .produto:hover {

            transform: translateY(-5px);

            box-shadow: 0 7px 18px rgba(0, 0, 0, 0.18);

        }


        .produto-imagem {

            width: 100%;

            height: 200px;

            object-fit: cover;

            background-color: #eee;

        }


        .produto-conteudo {

            padding: 18px;

            text-align: center;

        }


        .produto-conteudo h4 {

            color: #dc3545;

            font-weight: bold;

            margin-bottom: 10px;

        }


        .produto-descricao {

            color: #666;

            min-height: 45px;

            margin-bottom: 12px;

        }


        .produto-preco {

            color: #198754;

            font-size: 21px;

            font-weight: bold;

            margin-bottom: 15px;

        }


        .btn-carrinho {

            background-color: #dc3545;

            color: white;

            border: none;

            padding: 9px 18px;

            border-radius: 7px;

            font-weight: bold;

            transition: 0.3s;

        }


        .btn-carrinho:hover {

            background-color: #bb2d3b;

            color: white;

        }


        .sem-produtos {

            text-align: center;

            padding: 40px;

            color: #666;

        }


        /* =========================
           FOOTER
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


        .link-sobre-footer {

            color: white;

            text-decoration: none;

            transition: all 0.3s ease;

        }


        .link-sobre-footer:hover {

            color: #ffc107;

            text-decoration: underline;

        }


        .redes-sociais {

            display: flex;

            justify-content: center;

            gap: 20px;

        }


        .redes-sociais a {

            font-size: 28px;

            transition: transform 0.2s;

            color: white;

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


            .menu-navegacao {

                gap: 5px;

            }


            .menu-navegacao a {

                font-size: 14px;

                padding: 8px;

            }


            .header-direita {

                gap: 18px;

            }


            .conta {

                display: none;

            }

        }


        @media (max-width: 768px) {

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

        }

    </style>

</head>


<body>


    <!-- =========================
         CABEÇALHO
    ========================= -->

    <header>

        <div class="header-content">


            <div class="logo-container">

                <img
                    class="logoota"
                    src="imagens/logoota.jpeg"
                    alt="Logo OTA">

            </div>


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
         TÍTULO
    ========================= -->

    <div class="titulo-cardapio">

        <h1>Nosso Cardápio</h1>

        <p>
            Confira nossos pastéis e bebidas
        </p>

    </div>


    <!-- =========================
         CARDÁPIO
    ========================= -->

    <main class="area-cardapio">


        <?php

        $sql = "SELECT * FROM produtos ORDER BY categoria, prod_nome";

        $resultado = $conn->query($sql);


        if ($resultado && $resultado->num_rows > 0) {

            $categoriaAtual = "";


            while ($produto = $resultado->fetch_assoc()) {


                if ($categoriaAtual != $produto['categoria']) {

                    if ($categoriaAtual != "") {

                        echo '</div>';

                    }


                    $categoriaAtual = $produto['categoria'];


                    echo '<h2 class="categoria-titulo">';

                    echo ucfirst($produto['categoria']);

                    echo '</h2>';

                    echo '<div class="row g-4">';

                }

                ?>


                <div class="col-lg-4 col-md-6 col-sm-12">


                    <div class="produto">


                        <?php

                        if (!empty($produto['prod_foto'])) {

                            ?>

                            <img
                                src="imagens/<?php echo htmlspecialchars($produto['prod_foto']); ?>"
                                class="produto-imagem"
                                alt="<?php echo htmlspecialchars($produto['prod_nome']); ?>">

                            <?php

                        } else {

                            ?>

                            <div
                                class="produto-imagem d-flex align-items-center justify-content-center">

                                <i
                                    class="bi bi-image"
                                    style="font-size: 50px; color: #aaa;">
                                </i>

                            </div>

                            <?php

                        }

                        ?>


                        <div class="produto-conteudo">


                            <h4>

                                <?php

                                echo htmlspecialchars(
                                    $produto['prod_nome']
                                );

                                ?>

                            </h4>


                            <p class="produto-descricao">

                                <?php

                                echo htmlspecialchars(
                                    $produto['prod_descricao']
                                );

                                ?>

                            </p>


                            <div class="produto-preco">

                                R$

                                <?php

                                echo number_format(
                                    $produto['prod_preco'],
                                    2,
                                    ',',
                                    '.'
                                );

                                ?>

                            </div>


                            <button
                                type="button"
                                class="btn-carrinho"
                                onclick="adicionarCarrinho()">

                                <i class="bi bi-cart-plus"></i>

                                Adicionar ao carrinho

                            </button>


                        </div>


                    </div>


                </div>


                <?php

            }


            if ($categoriaAtual != "") {

                echo '</div>';

            }


        } else {

            ?>

            <div class="sem-produtos">

                <i
                    class="bi bi-emoji-frown"
                    style="font-size: 45px;">
                </i>

                <h3>
                    Nenhum produto encontrado
                </h3>

                <p>
                    O cardápio está sendo atualizado.
                </p>

            </div>

            <?php

        }

        ?>


    </main>


    <!-- =========================
         FOOTER
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


                <!-- =========================
                     LINKS
                ========================= -->

                <div class="col-lg-4 col-sm-12 mb-4 text-center">


                    <h5>

                        Links

                    </h5>


                    <p>

                        <a
                            href="faleconosco"
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


    <script>

        function adicionarCarrinho() {

            alert("Produto adicionado ao carrinho!");

        }

    </script>


</body>

</html>