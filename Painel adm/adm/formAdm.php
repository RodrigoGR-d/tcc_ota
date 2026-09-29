<?php
/* Aqui virá o código de busca utilizando o comando SQL */
include "../../conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Adm</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>

*{box-sizing:border-box}
body{margin:0;font-family:Arial,sans-serif;background:#333;color:white;min-height:100vh;display:flex;flex-direction:column}
header{background:#222;width:100%;padding:15px 25px;border-bottom:1px solid #444;box-shadow:0 4px 15px rgba(0,0,0,.25)}
.header-content{width:100%;min-height:90px;display:flex;align-items:center;justify-content:center;position:relative}
.logo{width:85px;height:85px;object-fit:cover;border-radius:50%;display:block;border:3px solid #ffc107}
.logo-container,.header-content>a{position:absolute;left:0;display:flex;align-items:center}
.tituloheader{color:white;font-size:30px;font-weight:bold;margin:0;text-align:center;white-space:nowrap}
.tituloheader::after{content:"";display:block;width:55px;height:4px;background:#ffc107;border-radius:10px;margin:8px auto 0}
.menu-header{display:none!important}
main{flex:1;width:100%;padding:55px 20px 70px}
.container{max-width:1200px}
.caixa-formulario,.caixa-produtos{background:#222;color:white;width:100%;max-width:800px;margin:0 auto;padding:30px;border-radius:15px;border:1px solid #444;box-shadow:0 8px 20px rgba(0,0,0,.25)}
.caixa-produtos{max-width:1200px}
.titulo-formulario,.titulo-produtos{color:white;text-align:center;font-weight:bold;margin-bottom:35px;font-size:30px}
.titulo-formulario::after,.titulo-produtos::after{content:"";display:block;width:65px;height:4px;background:#ffc107;border-radius:10px;margin:12px auto 0}
.form-label{font-weight:500;color:#eee}
.form-control,.form-select{border-radius:7px;background:#333;color:white;border:1px solid #555}
.form-control::placeholder{color:#aaa}
.form-control:focus,.form-select:focus{border-color:#ffc107;box-shadow:0 0 0 .2rem rgba(255,193,7,.15);background:#333;color:white}
.form-select option{background:#222;color:white}
.botoes-formulario{display:flex;justify-content:center;gap:10px;margin-top:25px}
.botoes-formulario .btn{min-width:120px}
.tabela-container{width:100%;overflow-x:auto}
.tabela-produtos{width:100%;margin-bottom:0;border-collapse:separate;border-spacing:0;overflow:hidden;border-radius:8px;background:#222}
.tabela-produtos thead th{background:#ffc107;color:#222;padding:14px;border:none;text-align:center;white-space:nowrap;font-weight:bold}
.tabela-produtos tbody td{padding:14px;vertical-align:middle;border-bottom:1px solid #444;text-align:center;color:#ddd}
.tabela-produtos tbody tr:last-child td{border-bottom:none}
.tabela-produtos tbody tr:hover{background:#333}
.coluna-acao{width:120px;text-align:center!important;white-space:nowrap}
.acao{display:inline-flex;align-items:center;justify-content:center;margin:0 5px;text-decoration:none}
.icone-acao{width:22px;height:22px;object-fit:contain;transition:.2s}
.icone-acao:hover{transform:scale(1.15)}
.mensagem-vazia,.sem-produtos{text-align:center;padding:30px;color:#aaa;font-size:17px}
.rodape{width:100%;background:#222;color:white;padding:35px 25px 20px;margin-top:auto;border-top:1px solid #444}
.rodape-container{width:100%;max-width:1200px;margin:0 auto}
.direitos{border-top:1px solid rgba(255,193,7,.3);margin-top:10px;padding-top:18px;text-align:center;color:#999;font-size:14px}
@media(max-width:768px){
 header{padding:15px}.header-content{min-height:150px;flex-direction:column;gap:12px}
 .header-content>a,.logo-container{position:static;margin:0}.logo{width:70px;height:70px}
 .tituloheader{font-size:23px;order:2}.menu-header{display:none!important}
 main{padding:40px 15px 55px}.titulo-formulario,.titulo-produtos{font-size:25px}
 .caixa-formulario,.caixa-produtos{padding:20px}.tabela-produtos{min-width:650px}.rodape{text-align:center}
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

            <a href="javascript:history.back()">

                <img src="../../imagens/logoota.jpeg" class="logo" alt="Logo OTA">

            </a>

            <h1 class="tituloheader">Cadastro de Administrador</h1>


            <!-- PAINEL ADMINISTRADOR -->

            

    </header>



    <!-- =========================
     CONTEÚDO PRINCIPAL
========================= -->

    <main>


        <!-- =========================
         FORMULÁRIO
    ========================= -->

        <div class="caixa-formulario">

            <h2 class="titulo-formulario">
                Cadastro de Adm
            </h2>


            <form method="post" action="insertAdm.php" enctype="multipart/form-data">


                <!-- CPF -->

                <div class="mb-3">

                    <label for="cpf_adm" class="form-label">

                        CPF:

                    </label>

                    <input type="text" name="cpf_adm" id="cpf_adm" class="form-control" placeholder="Insira o CPF"
                        required>

                </div>


                <!-- NOME -->

                <div class="mb-3">

                    <label for="nome_adm" class="form-label">

                        Nome:

                    </label>

                    <input type="text" name="nome_adm" id="nome_adm" class="form-control" placeholder="Insira seu nome"
                        required>

                </div>


                <!-- EMAIL -->

                <div class="mb-3">

                    <label for="email_adm" class="form-label">

                        Email:

                    </label>

                    <input type="email" name="email_adm" id="email_adm" class="form-control"
                        placeholder="Insira seu email" required>

                </div>


                <!-- SENHA -->

                <div class="mb-3">

                    <label for="senha_adm" class="form-label">

                        Senha:

                    </label>

                    <input type="text" name="senha_adm" id="senha_adm" class="form-control"
                        placeholder="Insira sua senha" required>

                </div>


                <!-- BOTÕES -->

                <div class="botoes-formulario">

                    <input type="submit" value="CADASTRAR" class="btn btn-success">

                    <input type="reset" value="CANCELAR" class="btn btn-secondary">

                </div>

            </form>

        </div>



       



    </main>



    <!-- =========================
     RODAPÉ
========================= -->

    <footer class="rodape">

        <div class="rodape-container">

            <div class="row">


            <!-- DIREITOS -->

            <div class="direitos">

                © 2026 Pastelaria OTA - Todos os direitos reservados.

            </div>

        </div>

    </footer>



    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>