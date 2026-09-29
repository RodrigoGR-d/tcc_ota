<?php
include "../../conexao.php";

$sql = "SELECT * FROM avaliacao";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Avaliações</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
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
            width: 100%;
            padding: 15px 25px;

            background-color: #222;

            border-bottom: 1px solid #444;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
        }

        .header-content {
            width: 100%;
            min-height: 90px;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;
        }

        .logo {
            width: 85px;
            height: 85px;

            object-fit: cover;
            border-radius: 50%;

            border: 3px solid #ffc107;
        }

        .logo-container {
            position: absolute;
            left: 0;
        }

        .titulo-header {
            margin: 0;

            color: white;

            font-size: 30px;
            font-weight: bold;

            text-align: center;
        }

        .titulo-header::after {
            content: "";

            display: block;

            width: 60px;
            height: 4px;

            margin: 10px auto 0;

            background-color: #ffc107;

            border-radius: 10px;
        }

        /* =========================
           CONTEÚDO
        ========================= */

        main {
            flex: 1;

            width: 100%;

            padding: 55px 20px 70px;
        }

        .caixa-avaliacoes {
            width: 100%;
            max-width: 1000px;

            margin: 0 auto;

            padding: 30px;

            background-color: #222;

            border: 1px solid #444;
            border-radius: 15px;

            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .titulo-avaliacoes {
            margin-bottom: 35px;

            color: white;

            font-size: 30px;
            font-weight: bold;

            text-align: center;
        }

        .titulo-avaliacoes::after {
            content: "";

            display: block;

            width: 60px;
            height: 4px;

            margin: 10px auto 0;

            background-color: #ffc107;

            border-radius: 10px;
        }

        /* =========================
           TABELA
        ========================= */

        .tabela-avaliacoes {
            width: 100%;

            margin-bottom: 0;

            background-color: #222;

            border-radius: 8px;

            overflow: hidden;
        }

        .tabela-avaliacoes thead th {
            padding: 14px;

            background-color: #ffc107;

            color: #222;

            border: none;

            font-weight: bold;
        }

        .tabela-avaliacoes tbody td {
            padding: 14px;

            color: #333;

            border-bottom: 1px solid #444;

            vertical-align: middle;
        }

        .tabela-avaliacoes tbody tr:hover {
            background-color: #333;
        }

        .tabela-avaliacoes tbody tr:last-child td {
            border-bottom: none;
        }

        .coluna-acao {
            width: 100px;

            text-align: center !important;
        }

        /* =========================
           BOTÃO EXCLUIR
        ========================= */

        .botao-excluir {
            display: inline-flex;

            padding: 4px;

            background: transparent;

            border: none;
        }

        .icone-lixeira {
            width: 22px;
            height: 22px;

            object-fit: contain;

            transition: 0.2s;
        }

        .icone-lixeira:hover {
            transform: scale(1.15);
        }

        .sem-avaliacoes {
            padding: 30px !important;

            color: #aaa !important;

            text-align: center;
        }

        /* =========================
           RODAPÉ
        ========================= */

        .rodape {
            width: 100%;

            margin-top: auto;

            padding: 35px 25px 20px;

            background-color: #222;

            border-top: 1px solid #444;
        }

        .rodape-container {
            width: 100%;
            max-width: 1200px;

            margin: 0 auto;
        }

        .direitos {
            padding-top: 18px;

            border-top: 1px solid rgba(255, 193, 7, 0.3);

            color: #999;

            font-size: 14px;

            text-align: center;
        }

        /* =========================
           RESPONSIVO
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

            .logo-container {
                position: static;

                order: 1;
            }

            .logo {
                width: 70px;
                height: 70px;
            }

            .titulo-header {
                font-size: 23px;

                order: 2;
            }

            main {
                padding: 40px 15px 55px;
            }

            .caixa-avaliacoes {
                padding: 20px;
            }

            .titulo-avaliacoes {
                font-size: 25px;
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

            <div class="logo-container">

                <a href="../menu.php">

                    <img
                        src="../../imagens/logoota.jpeg"
                        class="logo"
                        alt="Logo OTA"
                    >

                </a>

            </div>

            <h1 class="titulo-header">
                Avaliações
            </h1>

        </div>

    </header>


    <!-- =========================
         CONTEÚDO
    ========================= -->

    <main>

        <div class="caixa-avaliacoes">

            <h2 class="titulo-avaliacoes">
                Avaliações cadastradas
            </h2>

            <div class="table-responsive">

                <table class="table tabela-avaliacoes">

                    <thead>

                        <tr>

                            <th>
                                Avaliação
                            </th>

                            <th class="coluna-acao">
                                Ação
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if ($result && $result->num_rows > 0): ?>

                            <?php while ($row = $result->fetch_assoc()): ?>

                                <?php
                                $id_ava = (int) $row['id_ava'];

                                $avaliacao = htmlspecialchars(
                                    $row['avaliacao'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                );
                                ?>

                                <tr>

                                    <td>
                                        <?= $avaliacao ?>
                                    </td>

                                    <td class="coluna-acao">

                                        <a
                                            href="deleteAva.php?id_ava=<?= $id_ava ?>"
                                            class="botao-excluir"
                                            title="Excluir avaliação"
                                            onclick="return confirm(
                                                'Deseja realmente excluir esta avaliação?'
                                            );"
                                        >

                                            <img
                                                src="../../imagens/lixo.png"
                                                class="icone-lixeira"
                                                alt="Excluir"
                                            >

                                        </a>

                                    </td>

                                </tr>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <tr>

                                <td
                                    colspan="2"
                                    class="sem-avaliacoes"
                                >
                                    Nenhuma avaliação cadastrada.
                                </td>

                            </tr>

                        <?php endif; ?>

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