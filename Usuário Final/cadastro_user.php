<?php
include "../conexao.php";
include "validacoesUser.php";

$erro = "";
$sucesso = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retira os pontos e traços do CPF
    $_POST['cpf_cli'] = preg_replace('/\D/', '', $_POST['cpf_cli']);

    // Valida os dados recebidos
    $validacao = validarDadosUser($_POST);

    $nome_cli = $validacao['nome_cli'];
    $cpf_cli = $validacao['cpf_cli'];
    $email_cli = $validacao['email_cli'];
    $senha_cli = $validacao['senha_cli'];

    // Verifica se CPF ou email já estão cadastrados
    $sql_verifica = "SELECT * FROM cliente 
                     WHERE cpf_cli = ? OR email_cli = ? LIMIT 1";

    $stmt_verifica = $conn->prepare($sql_verifica);
    $stmt_verifica->bind_param("ss", $cpf_cli, $email_cli);
    $stmt_verifica->execute();

    $resultado = $stmt_verifica->get_result();

    if ($resultado->num_rows > 0) {

        $erro = "CPF ou email já cadastrado.";

    } else {

        $sql = "INSERT INTO cliente 
                (nome_cli, cpf_cli, email_cli, senha_cli)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssss",
            $nome_cli,
            $cpf_cli,
            $email_cli,
            $senha_cli
        );

        if ($stmt->execute()) {

            $sucesso = "Cadastro realizado com sucesso!";

        } else {

            $erro = "Não foi possível realizar o cadastro.";
        }

        $stmt->close();
    }

    $stmt_verifica->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Cadastro - Pastelaria OTA</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

    body {
        background-color: #333;
        min-height: 100vh;
    }

    .cadastro-container {
        min-height: 100vh;
    }

    .cadastro-card {
        width: 400px;
        border: none;
        border-radius: 18px;
        overflow: hidden;
    }

    .cadastro-header {
        background-color: #222;
        color: white;
        padding: 25px;
        text-align: center;
    }

    .cadastro-header h2 {
        margin: 0;
        color: #ffc107;
        font-weight: bold;
    }

    .cadastro-header p {
        margin-top: 8px;
        margin-bottom: 0;
        color: #ddd;
    }

    .cadastro-body {
        padding: 30px;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control {
        border: 2px solid #333;
        border-radius: 8px;
        padding: 10px;
    }

    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
    }

    .btn-cadastrar {
        background-color: #ffc107;
        color: #222;
        border: none;
        font-weight: bold;
        padding: 11px;
        border-radius: 8px;
    }

    .btn-cadastrar:hover {
        background-color: #e0a800;
        color: #222;
    }

    .btn-voltar {
        color: #333;
        border: 2px solid #333;
        font-weight: 600;
        border-radius: 8px;
        padding: 10px;
    }

    .btn-voltar:hover {
        background-color: #333;
        color: white;
    }

    .logo {
        width: 75px;
        height: 75px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 12px;
    }

    @media (max-width: 480px) {

        .cadastro-card {
            width: 90%;
        }

        .cadastro-body {
            padding: 22px;
        }

    }

</style>

</head>

<body>
    
<div class="d-flex justify-content-center align-items-center cadastro-container">

<div class="card shadow-lg cadastro-card">

    <!-- Cabeçalho -->
    <div class="cadastro-header">

        <img src="../imagens/logoota.jpeg"
             alt="Logo Pastelaria OTA"
             class="logo">

        <h2>Pastelaria OTA</h2>

        <p>Crie sua conta</p>

    </div>


    <!-- Corpo -->
    <div class="cadastro-body">

        <h4 class="text-center mb-4">
            Cadastro de Cliente
        </h4>


        <?php if ($erro): ?>

            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle"></i>
                <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
            </div>

        <?php endif; ?>


        <?php if ($sucesso): ?>

            <div class="alert alert-success">
                <i class="bi bi-check-circle"></i>
                <?= htmlspecialchars($sucesso, ENT_QUOTES, 'UTF-8') ?>
            </div>

        <?php endif; ?>


        <form 
            onsubmit="if (typeof validarUser !== 'function') 
            { alert('O arquivo validacoesUser.js não carregou. Verifique se ele está na mesma pasta do formulário.'); return false; } return validarUser();" 
            method="POST" 
            action=""
        >


            <!-- Nome -->
            <div class="mb-3">

                <label class="form-label">
                    Nome
                </label>

                <input
                    type="text"
                    name="nome_cli"
                    id="nome_cli"
                    class="form-control"
                    placeholder="Digite seu nome"
                    required
                >

            </div>


            <!-- CPF -->
            <div class="mb-3">

                <label class="form-label">
                    CPF
                </label>

                <input
                    type="text"
                    name="cpf_cli"
                    id="cpf_cli"
                    class="form-control"
                    inputmode="numeric"
                    maxlength="14"
                    required
                    placeholder="000.000.000-00"
                    oninput="mascaraCPF(this)"
                >

            </div>


            <!-- Email -->
            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email_cli"
                    id="email_cli"
                    class="form-control"
                    required
                    pattern="[^\s@]+@[^\s@.]+(\.[^\s@.]+)+"
                >

            </div>


            <!-- Senha -->
            <div class="mb-4">

                <label class="form-label">
                    Senha
                </label>

                <input
                    type="password"
                    name="senha_cli"
                    id="senha_cli"
                    class="form-control"
                    placeholder="Digite sua senha"
                    required
                >

            </div>


            <!-- Botão cadastrar -->
            <button
                type="submit"
                class="btn btn-cadastrar w-100">

                <i class="bi bi-person-plus"></i>
                Criar minha conta

            </button>


            <!-- Voltar para login -->
            <a
                href="login_user.php"
                class="btn btn-voltar w-100 mt-3">

                <i class="bi bi-arrow-left"></i>
                Já tenho uma conta

            </a>

        </form>

    </div>

</div>

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Validações do cadastro -->
<script src="validacoesUser.js"></script>

</body>
</html>