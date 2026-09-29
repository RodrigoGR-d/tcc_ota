<?php

include "../../conexao.php";

$sql = "SELECT * FROM horario_funcionamento ORDER BY id_func DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Horários de Funcionamento</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

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
            background-color: #222;
            padding: 15px 25px;
            border-bottom: 1px solid #444;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
        }

        .header-content {
            min-height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logo-container {
            position: absolute;
            left: 0;
        }

        .logo {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ffc107;
        }

        .tituloheader {
            color: white;
            font-size: 30px;
            font-weight: bold;
            margin: 0;
            text-align: center;
        }

        .tituloheader::after,
        .titulo-hora::after {
            content: "";
            display: block;
            width: 60px;
            height: 4px;
            background-color: #ffc107;
            border-radius: 10px;
            margin: 10px auto 0;
        }

        /* =========================
           CONTEÚDO
        ========================= */

        main {
            flex: 1;
            padding: 55px 20px 70px;
        }

        .caixa-hora {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            background-color: #222;
            border: 1px solid #444;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .titulo-hora {
            color: white;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
        }

        .area-botao {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .btn-adicionar {
            padding: 11px 18px;
            background-color: #ffc107;
            color: #222;
            font-weight: bold;
            border: 0;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-adicionar:hover {
            background-color: #e0a800;
            color: #222;
        }

        /* =========================
           TABELA
        ========================= */

        .tabela-container {
            width: 100%;
            overflow-x: auto;
        }

        .tabela-horarios {
            width: 100%;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }

        .tabela-horarios thead th {
            padding: 14px;
            background-color: #ffc107;
            color: #000;
            border: 0;
            text-align: center;
            white-space: nowrap;
        }

        .tabela-horarios tbody td {
            padding: 14px;
            vertical-align: middle;
            border-bottom: 1px solid #ddd;
            text-align: center;
            color: #000;
        }

        .tabela-horarios tbody tr:last-child td {
            border-bottom: 0;
        }

        .tabela-horarios tbody tr:hover td {
            background-color: #f2f2f2;
            color: #000;
        }

        /* =========================
           AÇÕES
        ========================= */

        .coluna-acao {
            width: 120px;
            white-space: nowrap;
        }

        .acao {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            text-decoration: none;
        }

        .icone-acao {
            width: 24px;
            height: 24px;
            object-fit: contain;
            transition: transform 0.2s;
        }

        .icone-acao:hover {
            transform: scale(1.15);
        }

        .mensagem-vazia {
            padding: 30px;
            text-align: center;
            color: #000;
        }

        /* =========================
           RODAPÉ
        ========================= */

        .rodape {
            margin-top: auto;
            padding: 35px 25px 20px;
            background-color: #222;
            color: white;
            border-top: 1px solid #444;
        }

        .direitos {
            margin-top: 10px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 193, 7, 0.3);
            text-align: center;
            color: #999;
            font-size: 14px;
        }

        /* =========================
           MODAL
        ========================= */

        .modal-content {
            border-radius: 12px;
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
            }

            .logo {
                width: 70px;
                height: 70px;
            }

            .tituloheader {
                font-size: 23px;
            }

            main {
                padding: 30px 15px;
            }

            .caixa-hora {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="header-content">
            <div class="logo-container">
                <a href="../menu.php">
                    <img
                        class="logo"
                        src="../../imagens/logoota.jpeg"
                        alt="Logo OTA">
                </a>
            </div>

            <h1 class="tituloheader">Horário de Funcionamento</h1>
        </div>
    </header>

    <main>
        <div class="caixa-hora">

            <h2 class="titulo-hora">Horários cadastrados</h2>

            <div class="area-botao">
                <a href="formHora.php" class="btn-adicionar">
                    + Adicionar horário
                </a>
            </div>

            <div class="tabela-container">
                <table class="tabela-horarios">
                    <thead>
                        <tr>
                            <th>Dia</th>
                            <th>Início</th>
                            <th>Final</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>

                            <?php while ($hora = $result->fetch_assoc()): ?>

                                <?php $id = (int) $hora['id_func']; ?>

                                <tr>
                                    <td><?= htmlspecialchars($hora['dia_func']) ?></td>
                                    <td><?= htmlspecialchars($hora['inicio_func']) ?></td>
                                    <td><?= htmlspecialchars($hora['final_func']) ?></td>
                                    <td><?= htmlspecialchars($hora['bairro_func']) ?></td>
                                    <td><?= htmlspecialchars($hora['cidade_func']) ?></td>

                                    <td class="coluna-acao">
                                        <a
                                            href="#"
                                            class="acao"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEditar<?= $id ?>">
                                            <img
                                                class="icone-acao"
                                                src="../../imagens/lapis.png"
                                                alt="Editar">
                                        </a>

                                        <a
                                            href="deleteHora.php?id_func=<?= $id ?>"
                                            class="acao"
                                            onclick="return confirm('Deseja excluir este horário?');">
                                            <img
                                                class="icone-acao"
                                                src="../../imagens/lixeira.png"
                                                alt="Excluir">
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal de edição -->
                                <div
                                    class="modal fade"
                                    id="modalEditar<?= $id ?>"
                                    tabindex="-1"
                                    aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content text-dark">

                                            <form action="updateHora.php" method="POST">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar horário</h5>

                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal">
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <input
                                                        type="hidden"
                                                        name="id_func"
                                                        value="<?= $id ?>">

                                                    <div class="mb-3">
                                                        <label class="form-label">Dia</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="dia_func"
                                                            value="<?= htmlspecialchars($hora['dia_func']) ?>"
                                                            required>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Início</label>
                                                            <input
                                                                type="time"
                                                                class="form-control"
                                                                name="inicio_func"
                                                                value="<?= htmlspecialchars($hora['inicio_func']) ?>"
                                                                required>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Final</label>
                                                            <input
                                                                type="time"
                                                                class="form-control"
                                                                name="final_func"
                                                                value="<?= htmlspecialchars($hora['final_func']) ?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Bairro</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="bairro_func"
                                                            value="<?= htmlspecialchars($hora['bairro_func']) ?>"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Cidade</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="cidade_func"
                                                            value="<?= htmlspecialchars($hora['cidade_func']) ?>"
                                                            required>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Cancelar
                                                    </button>

                                                    <button
                                                        type="submit"
                                                        class="btn btn-warning">
                                                        Salvar alterações
                                                    </button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="6" class="mensagem-vazia">
                                    Nenhum horário cadastrado.
                                </td>
                            </tr>

                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <footer class="rodape">
        <div class="direitos">
            © 2026 Pastelaria OTA - Todos os direitos reservados.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
