<?php
include "../../conexao.php";
$id_pedido = filter_input(INPUT_GET, 'id_pedido', FILTER_VALIDATE_INT);
if (!$id_pedido) { header("Location: VizuPed.php"); exit; }

$stmt = $conn->prepare("SELECT id_pedido, data_pedido, horario_pedido, total_ped FROM pedido WHERE id_pedido = ?");
$stmt->bind_param("i", $id_pedido);
$stmt->execute();
$result = $stmt->get_result();
$pedido = $result->fetch_assoc();
if (!$pedido) { echo "<script>alert('Pedido não encontrado.'); window.location.href='VizuPed.php';</script>"; exit; }
function h($valor) { return htmlspecialchars((string)($valor ?? ''), ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar pedido - Pastelaria OTA</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
*{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;background:#333;color:#fff;min-height:100vh;display:flex;flex-direction:column}header{background:#222;padding:15px 25px;border-bottom:1px solid #444}.header-content{min-height:90px;display:flex;align-items:center;justify-content:center;position:relative}.logo{position:absolute;left:0;width:85px;height:85px;object-fit:cover;border-radius:50%;border:3px solid #ffc107}.tituloheader{font-size:30px;font-weight:bold;margin:0;text-align:center}.tituloheader:after,.titulo-formulario:after{content:"";display:block;width:60px;height:4px;background:#ffc107;border-radius:10px;margin:10px auto 0}main{flex:1;padding:55px 20px 70px}.caixa-formulario{width:100%;max-width:800px;margin:0 auto;padding:30px;background:#222;border:1px solid #444;border-radius:15px;box-shadow:0 8px 20px rgba(0,0,0,.25)}.titulo-formulario{text-align:center;font-size:30px;font-weight:bold;margin-bottom:30px}.form-label{color:#eee}.form-control{background:#333;color:#fff;border:1px solid #555;border-radius:7px}.form-control:focus{background:#333;color:#fff;border-color:#ffc107;box-shadow:0 0 0 .2rem rgba(255,193,7,.15)}.botoes{display:flex;justify-content:center;gap:10px;flex-wrap:wrap;margin-top:25px}.btn-ota{background:#ffc107;color:#222;font-weight:bold;border:0}.btn-ota:hover{background:#e0a800;color:#222}.rodape{margin-top:auto;padding:25px;background:#222;border-top:1px solid #444;text-align:center;color:#999;font-size:14px}@media(max-width:768px){.header-content{min-height:150px;flex-direction:column;gap:12px}.logo{position:static;width:70px;height:70px}.tituloheader{font-size:23px}main{padding:30px 15px}.caixa-formulario{padding:20px}.titulo-formulario{font-size:25px}}
</style></head><body>
<header><div class="header-content"><a href="VizuPed.php"><img src="../../imagens/logoota.jpeg" class="logo" alt="Logo OTA"></a><h1 class="tituloheader">Editar Pedido</h1></div></header>
<main><section class="caixa-formulario"><h2 class="titulo-formulario">Alterar dados do pedido</h2>
<form method="post" action="updatePed.php">
<input type="hidden" name="id_pedido" value="<?= (int)$pedido['id_pedido'] ?>">
<div class="mb-3"><label class="form-label" for="id_visual">ID do pedido</label><input id="id_visual" class="form-control" value="<?= (int)$pedido['id_pedido'] ?>" disabled></div>
<div class="row"><div class="col-md-6 mb-3"><label class="form-label" for="data_pedido">Data do pedido</label><input type="date" name="data_pedido" id="data_pedido" class="form-control" value="<?= h($pedido['data_pedido']) ?>" required></div>
<div class="col-md-6 mb-3"><label class="form-label" for="horario_pedido">Horário do pedido</label><input type="time" name="horario_pedido" id="horario_pedido" class="form-control" value="<?= h($pedido['horario_pedido']) ?>" required></div></div>
<div class="mb-3"><label class="form-label" for="total_ped">Valor total (R$)</label><input type="number" min="0" step="0.01" name="total_ped" id="total_ped" class="form-control" value="<?= h($pedido['total_ped']) ?>" required></div>
<div class="botoes"><button type="submit" class="btn btn-ota px-4">Salvar alterações</button><a href="VizuPed.php" class="btn btn-secondary px-4">Cancelar</a></div>
</form></section></main><footer class="rodape">© 2026 Pastelaria OTA - Todos os direitos reservados.</footer></body></html>
