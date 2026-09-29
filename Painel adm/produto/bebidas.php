<?php
include "../../conexao.php";

// Busca somente os produtos da categoria bebida
$sql = "SELECT * FROM produtos WHERE categoria = 'bebida'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Visualização de Bebidas</title>

    <style>
* { box-sizing: border-box; }

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #333;
    color: white;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

header, .rodape {
    background: #222;
    border-color: #444;
}

header {
    padding: 15px 25px;
    border-bottom: 1px solid #444;
}

.header-content {
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

.header-content > a {
    position: absolute;
    left: 0;
}

.tituloheader {
    margin: 0;
    color: white;
    font-size: 30px;
    font-weight: bold;
    text-align: center;
}

.tituloheader::after,
.titulo-produtos::after,
.titulo-formulario::after {
    content: "";
    display: block;
    width: 60px;
    height: 4px;
    margin: 10px auto 0;
    background: #ffc107;
    border-radius: 10px;
}

.menu-header {
    position: absolute;
    right: 0;
    display: flex;
    gap: 10px;
}

.btn-painel {
    background: #ffc107 !important;
    color: #222 !important;
    border: 0 !important;
    font-weight: bold !important;
    border-radius: 8px !important;
}

.btn-painel:hover { background: #e0a800 !important; }

.dropdown-menu {
    background: #222;
    border: 1px solid #444;
}

.dropdown-item { color: white; }
.dropdown-item:hover { background: #dc3545; color: white; }

main {
    flex: 1;
    padding: 50px 20px 70px;
}

.titulo-produtos,
.titulo-formulario {
    margin-bottom: 30px;
    color: white;
    text-align: center;
    font-size: 30px;
    font-weight: bold;
}

.caixa-produtos,
.caixa-formulario {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    padding: 30px;
    background: #222;
    border: 1px solid #444;
    border-radius: 15px;
}

.caixa-formulario { max-width: 800px; }

.tabela-container { overflow-x: auto; }

.tabela-produtos {
    width: 100%;
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

.tabela-produtos th {
    padding: 14px;
    background: #ffc107;
    color: #000;
    text-align: center;
    border: 0;
}

.tabela-produtos td {
    padding: 14px;
    background: white;
    color: #000;
    text-align: center;
    vertical-align: middle;
    border-bottom: 1px solid #ddd;
}

.tabela-produtos tr:last-child td { border-bottom: 0; }
.tabela-produtos tbody tr:hover td { background: #f2f2f2; }

.coluna-acao {
    width: 120px;
    white-space: nowrap;
}

.acao {
    display: inline-flex;
    margin: 0 5px;
}

.icone-acao {
    width: 22px;
    height: 22px;
    object-fit: contain;
}

.icone-acao:hover { transform: scale(1.1); }

.mensagem-vazia,
.sem-produtos {
    padding: 30px;
    color: #000;
    text-align: center;
}

.form-label { color: white; font-weight: bold; }

.form-control,
.form-select {
    background: #333;
    color: white;
    border: 1px solid #555;
    border-radius: 7px;
}

.form-control:focus,
.form-select:focus {
    background: #333;
    color: white;
    border-color: #ffc107;
    box-shadow: 0 0 0 .2rem rgba(255,193,7,.15);
}

.form-select option { background: #222; color: white; }

.botoes-formulario {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 25px;
}

.rodape {
    padding: 30px 25px 20px;
    border-top: 1px solid #444;
    margin-top: auto;
}

.rodape-container {
    max-width: 1200px;
    margin: auto;
}

.rodape h5 { margin-bottom: 20px; }
.rodape p { margin-bottom: 10px; }
.rodape a { color: white; text-decoration: none; }

.direitos {
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid rgba(255,193,7,.3);
    color: #999;
    text-align: center;
    font-size: 14px;
}

@media (max-width: 768px) {
    header { padding: 15px; }

    .header-content {
        min-height: 150px;
        flex-direction: column;
        gap: 12px;
    }

    .header-content > a,
    .menu-header {
        position: static;
    }

    .logo { width: 70px; height: 70px; }
    .tituloheader { font-size: 23px; }
    .menu-header { justify-content: center; }

    main { padding: 40px 15px 55px; }

    .titulo-produtos,
    .titulo-formulario { font-size: 25px; }

    .caixa-produtos,
    .caixa-formulario { padding: 20px; }

    .tabela-produtos { min-width: 650px; }
    .rodape { text-align: center; }
}

@media (max-width: 480px) {
    .tituloheader { font-size: 21px; }
    .titulo-produtos,
    .titulo-formulario { font-size: 23px; }
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

                <img
                    src="../../imagens/logoota.jpeg"
                    class="logo"
                    alt="Logo OTA">

            </a>

            <h1 class="tituloheader">
                Bebidas
            </h1>


            <!-- MENUS -->

            <div class="menu-header">


                <!-- LISTA DE PRODUTOS -->

                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle btn-painel"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        L. Produtos

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a
                                class="dropdown-item"
                                href="pastel.php">

                                Pastel

                            </a>
                        </li>

                        <li>
                            <a
                                class="dropdown-item"
                                href="massa.php">

                                Massa

                            </a>
                        </li>

                        <li>
                            <a
                                class="dropdown-item"
                                href="bebidas.php">

                                Bebida

                            </a>
                        </li>

                    </ul>

                </div>


                
        </div>

    </header>


    <!-- =========================
         CONTEÚDO
    ========================= -->

    <main>

        <div class="caixa-produtos">

            <h2 class="titulo-produtos">

                Bebidas cadastradas

            </h2>


            <div class="tabela-container">

                <table class="tabela-produtos">

                    <thead>

                        <tr>

                            <th>
                                Nome
                            </th>

                            <th>
                                Preço
                            </th>

                            <th>
                                Descrição
                            </th>

                            <th class="coluna-acao">
                                Ações
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php

                        if ($result && $result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {

                                $id_prod = $row['id_prod'];

                                $nome = htmlspecialchars($row['prod_nome']);

                                $preco = htmlspecialchars($row['prod_preco']);

                                $descricao = htmlspecialchars($row['prod_descricao']);

                                ?>

                                <tr>

                                    <!-- NOME -->

                                    <td>

                                        <?php echo $nome; ?>

                                    </td>


                                    <!-- PREÇO -->

                                    <td>

                                        R$ <?php echo $preco; ?>

                                    </td>


                                    <!-- DESCRIÇÃO -->

                                    <td>

                                        <?php echo $descricao; ?>

                                    </td>


                                    <!-- AÇÕES -->

                                    <td class="coluna-acao">

                                        <!-- EDITAR -->

                                        <a
                                            href="editarProd.php?id_prod=<?php echo $id_prod; ?>"
                                            class="acao"
                                            title="Editar produto">

                                            <img
                                                src="../../imagens/lapis.png"
                                                class="icone-acao"
                                                alt="Editar">

                                        </a>


                                        <!-- EXCLUIR -->

                                        <a
                                            href="deleteProd.php?id_prod=<?php echo $id_prod; ?>"
                                            class="acao"
                                            title="Excluir produto"
                                            onclick="return confirm('Deseja realmente excluir o produto <?php echo $nome; ?>?');">

                                            <img
                                                src="../../imagens/lixeira.png"
                                                class="icone-acao"
                                                alt="Excluir">

                                        </a>

                                    </td>

                                </tr>

                                <?php

                            }

                        } else {

                            ?>

                            <tr>

                                <td
                                    colspan="4"
                                    class="mensagem-vazia">

                                    Nenhuma bebida cadastrada.

                                </td>

                            </tr>

                            <?php

                        }

                        ?>

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
