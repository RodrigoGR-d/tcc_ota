<?php
session_start();
include "../conexao.php";
$erro = "";

/*O login precisa solicitar acesso ao servidor
SGBD MySQL para que ele possa verificar o login
e senha para entrar no sistema*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf_adm = $_POST['cpf_adm'];
    $email_adm = $_POST['email_adm'];
    $senha_adm = $_POST['senha_adm'];

    /*Na linha SQL será realizado através do comando
    SELECT o login pegando a cpf e a senha do administrador
    e adicionado o comando LIMIT 1 para dizer que só
    pode pegar 1 dado apenas*/
    $sql = "SELECT * FROM adm
    WHERE cpf_adm = ? AND email_adm = ? LIMIT 1";

    /*Na sequência dos códigos abaixo a variável $stmt
    recebe o comando SQL e através do bind_param (
    que é utilizado para se comunicar com o bd) ele 
    envia a quantidade de informações que o banco precisa
    para logar, o banco recebe, consulta na tabela
    administrador e retorna se este usuário existe*/
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $cpf_adm, $email_adm); // corrigido
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        //if (password_verify($senha_adm, $usuario['senha_adm'])) { // Linha com criptografia
        if ($senha_adm === $usuario['senha_adm']) {
            $_SESSION['admin'] = $usuario['nome_adm'];
            $_SESSION['admin_id'] = $usuario['id_adm'];

            header("Location: menu.php");
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
    <!--Ícone do Bootstrap-->
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
</head>

<body class="bg-light">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 350px;">
            <!--Ícone do Bootstrap-->
            <div class="text-center">
                <i class="bi bi-person-circle fs-1"></i>
            </div>

            <?php if ($erro): ?>
                <div class="alert alert-danger"><?= $erro ?></div>
            <?php endif; ?>
            
            <!--Inicio do Form-->
        
                <form method="POST" action="" class="row g-5 ">
                    <div class="col-auto">
                        
                    
                    <div class="col-auto">
                        <label for="inputPassword2" class="visually-hidden">CPF</label>
                        <input type="text" class="form-control" id="inputPassword2" placeholder="CPF"
                        name="cpf_adm" required>
                    </div>
                    <br>

                    <div class="row">
                    <div class="col-6">
                        <label for="inputPassword2" class="visually-hidden">Email</label>
                        <input type="email" class="form-control" id="inputPassword2" placeholder="Email"
                        name="email_adm" required>
                    </div>

                    <div class="col-6">
                        <label for="inputPassword2" class="visually-hidden">Senha</label>
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Senha"
                        name="senha_adm" required>
                    </div>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-3">Entrar</button>
                    </div>
                </form>
           
            <!--Fechamento do Form-->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>