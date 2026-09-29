<?php
include "../../conexao.php";

$id_func = $_GET['id_func'];

$sql = "SELECT * FROM horario_funcionamento 
        WHERE id_func = $id_func";

$result = $conn->query($sql);
$hora = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Horário Funcionamento</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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

            <div class="logo-container">

                <a href="javascript:history.back()">

                    <img
                        src="../../imagens/logoota.jpeg"
                        class="logo"
                        alt="Logo OTA">

                </a>

            </div>


            <!-- TÍTULO -->

            <h1 class="tituloheader">

                Editar Horário Funcionamento

            </h1>


            <!-- MENUS -->

            <div class="menus-header">


                <!-- PAINEL ADMINISTRADOR -->

                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle btn-painel"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        Painel Administrador

                    </button>


                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a
                                class="dropdown-item"
                                href="../adm/FormAdm.php">

                                Acesso Admin

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="../produto/FormProd.php">

                                Acesso Produtos

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="../horario_funcionamento/FormHora.php">

                                Acesso H. Funcionamento

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="../avaliacao/VizuAva.php">

                                Acesso Avaliação

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </header>



    <!-- =========================
         CONTEÚDO
    ========================= -->

    <main>

        <div class="container">

            <div class="caixa-formulario">

                <h2 class="titulo-formulario">

                    Editar Horário Funcionamento

                </h2>


                <form
                    method="post"
                    action="updateHora.php"
                    enctype="multipart/form-data">


                    <!-- ID -->

                    <input
                        type="hidden"
                        name="id_func"
                        value="<?= $hora['id_func'] ?>">


                    <!-- DIA -->

                    <div class="mb-3">

                        <label
                            for="dia_func"
                            class="form-label">

                            Dia Funcionamento:

                        </label>

                        <input
                            type="text"
                            name="dia_func"
                            id="dia_func"
                            class="form-control"
                            value="<?= $hora['dia_func'] ?>">

                    </div>


                    <!-- HORÁRIO -->

                    <div class="mb-3">

                        <label
                            for="inicio_func"
                            class="form-label">

                            Horário de Início:

                        </label>

                        <input
                            type="text"
                            name="inicio_func"
                            id="inicio_func"
                            class="form-control"
                            value="<?= $hora['inicio_func'] ?>">

                    </div>


                    <div class="mb-3">

                        <label
                            for="final_func"
                            class="form-label">

                            Horário de Final:

                        </label>

                        <input
                            type="text"
                            name="final_func"
                            id="final_func"
                            class="form-control"
                            value="<?= $hora['final_func'] ?>">

                    </div>


                    <!-- CIDADE -->

                    <div class="mb-3">

                        <label
                            for="cidade_func"
                            class="form-label">

                            Cidade:

                        </label>

                        <input
                            type="text"
                            name="cidade_func"
                            id="cidade_func"
                            class="form-control"
                            value="<?= $hora['cidade_func'] ?>">

                    </div>


                    <!-- LOCAL / BAIRRO -->

                    <div class="mb-3">

                        <label
                            for="bairro_func"
                            class="form-label">

                            Local/Bairro:

                        </label>

                        <input
                            type="text"
                            name="bairro_func"
                            id="bairro_func"
                            class="form-control"
                            value="<?= $hora['bairro_func'] ?>">

                    </div>


                    <!-- BOTÃO -->

                    <div class="botoes-formulario">

                        <input
                            type="submit"
                            value="EDITAR"
                            class="btn btn-success"
                            required>

                    </div>


                </form>

            </div>

        </div>

    </main>



    <!-- =========================
         RODAPÉ
    ========================= -->

    <footer class="rodape">

        <div class="rodape-container">

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