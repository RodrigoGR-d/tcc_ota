<?php
session_start();
include "../conexao.php";
$erro = "";

/* O login precisa solicitar acesso ao servidor
SGBD MySQL para que ele possa verificar o login
e senha para entrar no sistema */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf_adm = $_POST['cpf_adm'];
    $email_adm = $_POST['email_adm'];
    $senha_adm = $_POST['senha_adm'];

    /* Consulta no banco */
    $sql = "SELECT * FROM adm
    WHERE cpf_adm = ? AND email_adm = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $cpf_adm, $email_adm);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if ($senha_adm === $usuario['senha_adm']) {

            $_SESSION['admin'] = $usuario['nome_adm'];
            $_SESSION['admin_id'] = $usuario['id_adm'];

            header("Location: menu.php");
            exit;

        } else {
            $erro = "Login ou senha incorretos.";
        }

    } else {
        $erro = "Login ou senha incorretos.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Administrador - Ota Pastéis</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            min-height: 100vh;
            background: #333;
            font-family: Arial, Helvetica, sans-serif;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;
            overflow-x: hidden;
        }


        /* =========================
           DETALHES DO FUNDO
        ========================= */

        body::before {
            content: "";
            position: fixed;

            width: 500px;
            height: 500px;

            background: rgba(255, 193, 7, 0.04);

            border-radius: 50%;

            top: -200px;
            left: -200px;
        }

        body::after {
            content: "";
            position: fixed;

            width: 450px;
            height: 450px;

            background: rgba(220, 53, 69, 0.04);

            border-radius: 50%;

            bottom: -200px;
            right: -150px;
        }


        /* =========================
           CONTAINER
        ========================= */

        .login-container {
            width: 100%;
            max-width: 480px;

            padding: 20px;

            position: relative;
            z-index: 2;
        }


        /* =========================
           CARD
        ========================= */

        .login-card {

            background: #222;

            border: 1px solid #444;

            border-radius: 20px;

            padding: 40px;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.45);

        }


        /* =========================
           LOGO
        ========================= */

        .logo-area {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-area img {

            width: 120px;
            height: 120px;

            object-fit: cover;

            border-radius: 50%;

            border: 3px solid #ffc107;

            box-shadow:
                0 0 20px rgba(255, 193, 7, 0.15);

        }


        /* =========================
           TÍTULO
        ========================= */

        .titulo {

            text-align: center;

            font-size: 28px;

            font-weight: bold;

            margin-bottom: 8px;

            color: white;
        }

        .titulo i {
            color: #ffc107;
            margin-right: 8px;
        }


        .subtitulo {

            text-align: center;

            color: #aaa;

            font-size: 15px;

            margin-bottom: 30px;
        }


        /* =========================
           LINHA DECORATIVA
        ========================= */

        .linha {

            width: 60px;

            height: 4px;

            background: #ffc107;

            border-radius: 10px;

            margin: 12px auto 25px;
        }


        /* =========================
           CAMPOS
        ========================= */

        .campo {

            position: relative;

            margin-bottom: 18px;
        }


        .campo i {

            position: absolute;

            left: 16px;

            top: 50%;

            transform: translateY(-50%);

            color: #ffc107;

            font-size: 18px;

            z-index: 2;
        }


        .campo input {

            width: 100%;

            height: 55px;

            background: #292929;

            border: 1px solid #555;

            border-radius: 10px;

            color: white;

            padding: 0 45px;

            font-size: 15px;

            outline: none;

            transition: 0.3s;
        }


        .campo input::placeholder {
            color: #999;
        }


        .campo input:focus {

            border-color: #ffc107;

            box-shadow:
                0 0 0 3px rgba(255, 193, 7, 0.10);

            background: #2d2d2d;
        }


        /* =========================
           BOTÃO
        ========================= */

        .btn-entrar {

            width: 100%;

            height: 55px;

            border: none;

            border-radius: 10px;

            background: #dc3545;

            color: white;

            font-size: 17px;

            font-weight: bold;

            margin-top: 8px;

            transition: 0.3s;

            cursor: pointer;
        }


        .btn-entrar i {

            margin-right: 8px;

            font-size: 19px;
        }


        .btn-entrar:hover {

            background: #bb2d3b;

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(220, 53, 69, 0.25);
        }


        /* =========================
           ERRO
        ========================= */

        .erro-login {

            background: rgba(220, 53, 69, 0.12);

            border: 1px solid #dc3545;

            color: #ff7b86;

            border-radius: 8px;

            padding: 12px;

            text-align: center;

            font-size: 14px;

            margin-bottom: 20px;
        }


        /* =========================
           RODAPÉ DO CARD
        ========================= */

        .rodape-login {

            border-top: 1px solid #444;

            margin-top: 30px;

            padding-top: 20px;

            text-align: center;

            color: #777;

            font-size: 13px;
        }


        .rodape-login i {

            color: #ffc107;

            margin-right: 5px;

        }


        .rodape-login strong {

            color: #aaa;

        }


        /* =========================
           RESPONSIVIDADE
        ========================= */

        @media (max-width: 576px) {

            body {
                padding: 15px;
            }

            .login-container {
                padding: 0;
            }

            .login-card {
                padding: 30px 22px;
                border-radius: 15px;
            }

            .logo-area img {
                width: 100px;
                height: 100px;
            }

            .titulo {
                font-size: 23px;
            }

            .subtitulo {
                font-size: 14px;
            }

        }

    </style>

</head>


<body>


    <div class="login-container">

        <div class="login-card">


            <!-- LOGO -->

            <div class="logo-area">

                <!--
                Coloque aqui o caminho da sua logo.
                Estou considerando que a pasta imagens
                está um nível acima da pasta do administrador.
                -->

                <img src="../imagens/logoota.jpeg"
                    alt="Logo Ota Pastéis">

            </div>


            <!-- TÍTULO -->

            <h1 class="titulo">

                <i class="bi bi-shield-lock"></i>

                Área do Administrador

            </h1>


            <div class="linha"></div>


            <p class="subtitulo">

                Faça login para acessar o sistema da Ota Pastéis.

            </p>


            <!-- MENSAGEM DE ERRO -->

            <?php if ($erro): ?>

                <div class="erro-login">

                    <i class="bi bi-exclamation-circle"></i>

                    <?= $erro ?>

                </div>

            <?php endif; ?>


            <!-- FORMULÁRIO -->

            <form method="POST" action="">


                <!-- CPF -->

                <div class="campo">

                    <i class="bi bi-person"></i>

                    <input
                        type="text"
                        name="cpf_adm"
                        placeholder="CPF"
                        required
                    >

                </div>


                <!-- EMAIL -->

                <div class="campo">

                    <i class="bi bi-envelope"></i>

                    <input
                        type="email"
                        name="email_adm"
                        placeholder="E-mail"
                        required
                    >

                </div>


                <!-- SENHA -->

                <div class="campo">

                    <i class="bi bi-lock"></i>

                    <input
                        type="password"
                        name="senha_adm"
                        placeholder="Senha"
                        required
                    >

                </div>


                <!-- BOTÃO -->

                <button
                    type="submit"
                    class="btn-entrar"
                >

                    <i class="bi bi-box-arrow-in-right"></i>

                    Entrar

                </button>


            </form>


            <!-- RODAPÉ -->

            <div class="rodape-login">

                <i class="bi bi-shop"></i>

                <strong>Ota Pastéis</strong>

                <br>

                Sistema Administrativo

            </div>


        </div>

    </div>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>