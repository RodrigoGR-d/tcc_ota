<?php
session_start();
include "../conexao.php";
$erro = "";

/*O login precisa solicitar acesso ao servidor
SGBD MySQL para que ele possa verificar o login
e senha para entrar no sistema*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf_cli = $_POST['cpf_cli'];
    $email_cli = $_POST['email_cli'];
    $senha_cli = $_POST['senha_cli'];

/*Na linha SQL será realizado através do comando
SELECT o login pegando a cpf e a senha do administrador
e adicionado o comando LIMIT 1 para dizer que só
pode pegar 1 dado apenas*/
    $sql = "SELECT * FROM cliente
    WHERE cpf_cli = ? AND email_cli = ? LIMIT 1";
    
/*Na sequência dos códigos abaixo a variável $stmt
recebe o comando SQL e através do bind_param (
que é utilizado para se comunicar com o bd) ele 
envia a quantidade de informações que o banco precisa
para logar, o banco recebe, consulta na tabela
administrador e retorna se este usuário existe*/    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $cpf_cli, $email_cli); // corrigido
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        //if (password_verify($senha_adm, $usuario['senha_adm'])) { // Linha com criptografia
        if ($senha_cli === $usuario['senha_cli']) {
            $_SESSION['clie'] = $usuario['nome_cli'];
            $_SESSION['clie_id'] = $usuario['id_cli'];
           
            header("Location: ../index.php");
            exit;
        } else {
            $erro = "Login/senha incorretos.";
        }
    } else {
        $erro = "Login/senha incorretos.";
    }
}
?>


<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Cliente | Pastelaria OTA</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

    body {
        background-color: #333;
        font-family: Arial, Helvetica, sans-serif;
    }

    .login-container {
        min-height: 100vh;
    }

    .login-card {
        width: 350px;
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }

    .login-topo {
        background-color: #333;
        padding: 25px 20px;
        text-align: center;
    }

    .login-topo img {
        width: 85px;
        height: 85px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #ffc107;
        margin-bottom: 12px;
    }

    .login-topo h3 {
        color: white;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .login-topo p {
        color: #ffc107;
        margin: 0;
        font-size: 14px;
    }

    .login-conteudo {
        padding: 25px;
        background-color: white;
    }

    .form-label {
        font-weight: bold;
        color: #333;
    }

    .form-control {
        border: 1px solid #999;
        border-radius: 8px;
        height: 45px;
    }

    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.15rem rgba(255, 193, 7, 0.25);
    }

    .btn-entrar {
        background-color: #e21b23;
        border: none;
        color: white;
        font-weight: bold;
        height: 45px;
        border-radius: 8px;
        width: 100%;
    }

    .btn-entrar:hover {
        background-color: #c9161d;
        color: white;
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

    .btn-cadastro {
        background-color: #ffc107;
        border: none;
        color: #333;
        font-weight: bold;
        height: 45px;
        border-radius: 8px;
        width: 100%;
    }

    .btn-cadastro:hover {
        background-color: #e0a800;
        color: #333;
    }

    .divisor {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 18px 0;
        color: #777;
        font-size: 13px;
    }

    .divisor::before,
    .divisor::after {
        content: "";
        height: 1px;
        background-color: #ddd;
        flex: 1;
    }

    .rodape-login {
        text-align: center;
        font-size: 13px;
        color: #777;
        margin-top: 20px;
    }

    .rodape-login span {
        color: #e21b23;
        font-weight: bold;
    }

</style>

</head>
<body>
    
<div class="login-container d-flex justify-content-center align-items-center">

    <div class="card login-card shadow-lg">

        <!-- CABEÇALHO -->
        <div class="login-topo">

            <img src="../imagens/logoota.jpeg" alt="Logo Pastelaria OTA">

            <h3>Login Cliente</h3>

            <p>Bem-vindo à Pastelaria OTA!</p>

        </div>


        <!-- CONTEÚDO -->
        <div class="login-conteudo">

            <?php if($erro): ?>

                <div class="alert alert-danger text-center">
                    <i class="bi bi-exclamation-circle"></i>
                    <?= $erro ?>
                </div>

            <?php endif; ?>


            <form method="POST" action="">

                <!-- CPF -->
                <div class="mb-3">

                    <label class="form-label">
                        <i class="bi bi-person-vcard"></i>
                        CPF
                    </label>

                    <input
                        type="text"
                        name="cpf_cli"
                        class="form-control"
                        placeholder="Digite seu CPF"
                        required>

                </div>


                <!-- EMAIL -->
                <div class="mb-3">

                    <label class="form-label">
                        <i class="bi bi-envelope"></i>
                        Email
                    </label>

                    <input
                        type="email"
                        name="email_cli"
                        class="form-control"
                        placeholder="Digite seu email"
                        required>

                </div>


                <!-- SENHA -->
                <div class="mb-3">

                    <label class="form-label">
                        <i class="bi bi-lock"></i>
                        Senha
                    </label>

                    <input
                        type="password"
                        name="senha_cli"
                        class="form-control"
                        placeholder="Digite sua senha"
                        required>

                </div>


                <!-- BOTÃO ENTRAR -->
                <button type="submit" class="btn btn-entrar">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Entrar
                </button>

                <a href="../index.php" class="btn btn-voltar w-100 mt-3">
                <i class="bi bi-arrow-left"></i>
                    Voltar
                </a>

            </form>


            <!-- DIVISOR -->
            <div class="divisor">
                ou
            </div>


            <!-- BOTÃO CADASTRO -->
            <a href="cadastro_user.php"
               class="btn btn-cadastro">

                <i class="bi bi-person-plus"></i>
                Criar minha conta

            </a>


            <!-- RODAPÉ -->
            <div class="rodape-login">

                <i class="bi bi-shop"></i>
                Pastelaria <span>OTA</span>

                <br>

                Sabor que conquista!

            </div>

        </div>

    </div>

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>