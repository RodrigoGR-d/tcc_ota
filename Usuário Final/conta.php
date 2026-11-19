<?php
session_start();
include "../conexao.php";
if (empty($_SESSION['clie_id'])) { header("Location: login_user.php"); exit; }
$cpf_cli = $_SESSION['clie_id'];
$stmt = $conn->prepare("SELECT cpf_cli, nome_cli, email_cli, telefone_cli FROM cliente WHERE cpf_cli = ? LIMIT 1");
$stmt->bind_param("s", $cpf_cli); $stmt->execute();
$cliente = $stmt->get_result()->fetch_assoc();
if (!$cliente) { unset($_SESSION['clie'], $_SESSION['clie_id']); header("Location: login_user.php"); exit; }
$stmtEndereco = $conn->prepare("SELECT logradouro_cli, numero_cli, complemento_cli, bairro_cli, cidade_cli, estado_cli, cep_cli FROM endereco WHERE cpf_cli4 = ? LIMIT 1");
$stmtEndereco->bind_param("s", $cpf_cli); $stmtEndereco->execute();
$endereco = $stmtEndereco->get_result()->fetch_assoc();
function e($valor) { return htmlspecialchars((string)($valor ?? ''), ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="pt-br"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Minha conta | Pastelaria OTA</title>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
*{box-sizing:border-box}body{margin:0;min-height:100vh;background:#f2f2f2;font-family:Arial,sans-serif;color:#222}
header{background:#333;padding:14px 24px;display:flex;align-items:center;gap:15px}.logo{width:65px;height:65px;object-fit:cover;border-radius:50%}header h1{color:#ffc107;font-size:25px;margin:0}header h1 span{color:#fff}.voltar{color:#ffc107;text-decoration:none;font-size:25px;margin-left:auto}
main{width:min(850px,92%);margin:38px auto}.titulo{margin-bottom:22px}.titulo h2{font-weight:700;margin-bottom:5px}.titulo p{color:#666;margin:0}.painel{background:#fff;border-radius:14px;padding:28px;box-shadow:0 3px 14px #00000012;margin-bottom:20px}
.perfil{display:flex;align-items:center;gap:17px;border-bottom:1px solid #eee;padding-bottom:22px;margin-bottom:20px}.avatar{width:68px;height:68px;border-radius:50%;background:#fff3cd;color:#333;display:grid;place-items:center;font-size:30px}.perfil h3{margin:0 0 5px;font-size:21px;font-weight:700}.perfil p{margin:0;color:#777}
.dados{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.campo small{display:block;color:#777;margin-bottom:6px}.campo strong{display:block;overflow-wrap:anywhere;font-size:16px;font-weight:600}.acoes{display:flex;flex-wrap:wrap;gap:10px;margin-top:24px}.btn-voltar{background:#333;color:#fff}.btn-voltar:hover{background:#222;color:#fff}.sem-endereco{color:#777;margin:0}
@media(max-width:600px){header{padding:12px 16px}.logo{width:52px;height:52px}header h1{font-size:21px}main{margin:25px auto}.painel{padding:20px}.dados{grid-template-columns:1fr;gap:16px}}
</style></head><body>
<header><a href="../../index.php"><img class="logo" src="../../imagens/logoota.jpeg" alt="Logo OTA"></a><h1><span>OTA</span> Pastéis</h1><a class="voltar" href="../../index.php" title="Voltar para o início"><i class="bi bi-arrow-left-circle"></i></a></header>
<main><div class="titulo"><h2>Minha conta</h2><p>Confira as informações cadastradas na sua conta.</p></div>
<section class="painel"><div class="perfil"><div class="avatar"><i class="bi bi-person"></i></div><div><h3><?= e($cliente['nome_cli']) ?></h3><p>Dados pessoais</p></div></div>
<div class="dados"><div class="campo"><small>CPF</small><strong><?= e($cliente['cpf_cli']) ?></strong></div><div class="campo"><small>Nome completo</small><strong><?= e($cliente['nome_cli']) ?></strong></div><div class="campo"><small>E-mail</small><strong><?= e($cliente['email_cli']) ?></strong></div><div class="campo"><small>Telefone</small><strong><?= $cliente['telefone_cli'] ? e($cliente['telefone_cli']) : 'Não informado' ?></strong></div></div>
<div class="acoes"><a href="../../index.php" class="btn btn-voltar"><i class="bi bi-house-door"></i> Voltar ao início</a><a href="logout_user.php" class="btn btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Sair da conta</a></div></section>
<section class="painel"><h4 class="mb-3"><i class="bi bi-geo-alt"></i> Endereço cadastrado</h4>
<?php if ($endereco): ?><div class="dados"><div class="campo"><small>Logradouro</small><strong><?= e($endereco['logradouro_cli']) ?>, <?= e($endereco['numero_cli']) ?></strong></div><div class="campo"><small>Complemento</small><strong><?= $endereco['complemento_cli'] ? e($endereco['complemento_cli']) : 'Não informado' ?></strong></div><div class="campo"><small>Bairro</small><strong><?= e($endereco['bairro_cli']) ?></strong></div><div class="campo"><small>Cidade / Estado</small><strong><?= e($endereco['cidade_cli']) ?> - <?= e($endereco['estado_cli']) ?></strong></div><div class="campo"><small>CEP</small><strong><?= e($endereco['cep_cli']) ?></strong></div></div><?php else: ?><p class="sem-endereco">Nenhum endereço cadastrado.</p><?php endif; ?>
</section></main></body></html>
