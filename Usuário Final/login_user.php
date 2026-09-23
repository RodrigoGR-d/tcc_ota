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


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login Administrador</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 350px;">
        <h3 class="text-center mb-4">Login Cliente</h3>

        <?php if($erro): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" name="cpf_cli" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email_cli" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="senha_cli" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>