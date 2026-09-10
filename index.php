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
           CARDS PRINCIPAIS
        ========================= */

        .card-home {
            background-color: white;

            border-radius: 12px;

            padding: 30px;

            min-height: 400px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }


        /* =========================
           CARDÁPIO
        ========================= */

        .titulo-cardapio {
            text-align: center;

            margin-bottom: 25px;

            color: #333;

            font-weight: bold;
        }


        .cardapio-conteudo {
            height: 300px;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            text-align: center;
        }


        .icone-cardapio {
            font-size: 70px;

            color: #dc3545;

            margin-bottom: 20px;
        }


        .cardapio-conteudo p {
            font-size: 18px;

            color: #555;

            margin-bottom: 30px;
        }


        .btn_cardapio {
            display: inline-block;

            background-color: #dc3545;

            color: white;

            text-decoration: none;

            padding: 15px 40px;

            border-radius: 8px;

            font-weight: bold;

            transition: all 0.25s ease;
        }


        .btn_cardapio:hover {
            background-color: #bb2d3b;

            transform: translateY(-3px);

            color: white;
        }


        /* =========================
           TABELA DE HORÁRIOS
        ========================= */

        .titulo-tabela {
            text-align: center;

            margin-bottom: 25px;

            color: #333;

            font-weight: bold;
        }


        .tabela-horarios {
            width: 100%;

            margin-bottom: 0;

            border-collapse: separate;

            border-spacing: 0;

            overflow: hidden;

            border-radius: 8px;
        }


        .tabela-horarios thead th {
            background-color: #dc3545;

            color: white;

            padding: 14px;

            border: none;

            text-align: center;

            white-space: nowrap;
        }


        .tabela-horarios tbody td {
            padding: 14px;

            vertical-align: middle;

            text-align: center;

            border-bottom: 1px solid #ddd;
        }


        .tabela-horarios tbody tr:last-child td {
            border-bottom: none;
        }


        .tabela-horarios tbody tr:hover {
            background-color: #f8f8f8;
        }


        .sem-horarios {
            text-align: center !important;

            color: #777;

            padding: 25px !important;
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

        @media (max-width: 991px) {

            .header-direita {
                position: static;

                margin-top: 15px;

                justify-content: center;
            }


            .header-content {
                flex-wrap: wrap;
            }


            .logo-container {
                position: static;

                transform: none;
            }


            .card-home {
                min-height: auto;
            }


            .redes-sociais {
                justify-content: center;
            }


            .rodape {
                text-align: center;
            }

        }


        @media (max-width: 768px) {

            .tabela-horarios {
                font-size: 14px;
            }


            .tabela-horarios thead th,
            .tabela-horarios tbody td {
                padding: 10px;
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
            Bem-vindo à Pastelaria OTA
        </h2>


        <div class="row g-4">


            <!-- =========================
                 CARDÁPIO - ESQUERDA
            ========================= -->

            <div class="col-12 col-lg-5">

                <div class="card-home">


                    <h2 class="titulo-cardapio">
                        Cardápio
                    </h2>


                    <div class="cardapio-conteudo">


                        <i class="bi bi-shop icone-cardapio"></i>


                        <p>
                            Confira nossos produtos e escolha
                            seus pastéis favoritos.
                        </p>


                        <a
                            class="btn_cardapio"
                            href="cardapio.php">

                            Ver Cardápio

                        </a>


                    </div>

                </div>

            </div>



            <!-- =========================
                 HORÁRIOS - DIREITA
            ========================= -->

            <div class="col-12 col-lg-7">

                <div class="card-home">


                    <h2 class="titulo-tabela">
                        Horários de Funcionamento
                    </h2>


                    <div class="table-responsive">


                        <table class="table tabela-horarios">


                            <thead>

                                <tr>

                                    <th>
                                        Dia de Funcionamento
                                    </th>

                                    <th>
                                        Horário de Início
                                    </th>

                                    <th>
                                        Horário de Final
                                    </th>

                                    <th>
                                        Cidade
                                    </th>

                                    <th>
                                        Local/Bairro
                                    </th>

                                </tr>

                            </thead>



                            <tbody>

                                <?php

                                /* Busca os horários no banco */

                                $sql = "SELECT * FROM horario_funcionamento";

                                $result = $conn->query($sql);


                                if ($result && $result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {

                                        echo "

                                        <tr>

                                            <td>
                                                {$row['dia_func']}
                                            </td>

                                            <td>
                                                {$row['inicio_func']}
                                            </td>

                                            <td>
                                                {$row['final_func']}
                                            </td>

                                            <td>
                                                {$row['cidade_func']}
                                            </td>

                                            <td>
                                                {$row['bairro_func']}
                                            </td>

                                        </tr>

                                        ";

                                    }

                                } else {

                                    echo "

                                    <tr>

                                        <td
                                            colspan='5'
                                            class='sem-horarios'>

                                            Nenhum horário cadastrado.

                                        </td>

                                    </tr>

                                    ";

                                }

                                ?>

                            </tbody>


                        </table>


                    </div>

                </div>

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


            <!-- CONTATO -->

            <div class="col-lg-6 col-md-6 col-sm-12 mb-4 text-start">


                <h5>
                    Contato
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



            <!-- REDES SOCIAIS -->

            <div class="col-lg-6 col-md-6 col-sm-12 mb-4 text-end">


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