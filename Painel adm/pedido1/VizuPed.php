<?php
include "../../conexao.php";

$sql = "SELECT * FROM pedido ORDER BY id_pedido DESC";
$result = $conn->query($sql);

function h($valor) {
    return htmlspecialchars((string)($valor ?? ''), ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos cadastrados - Pastelaria OTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:Arial,sans-serif;background:#333;color:#fff;min-height:100vh;display:flex;flex-direction:column}
        header{background:#222;padding:15px 25px;border-bottom:1px solid #444;box-shadow:0 4px 15px rgba(0,0,0,.25)}
        .header-content{min-height:90px;display:flex;align-items:center;justify-content:center;position:relative}
        .logo-container{position:absolute;left:0}
        .logo{width:85px;height:85px;object-fit:cover;border-radius:50%;border:3px solid #ffc107}
        .tituloheader{color:#fff;font-size:30px;font-weight:bold;margin:0;text-align:center}
        .tituloheader:after,.titulo-pedidos:after{content:"";display:block;width:60px;height:4px;background:#ffc107;border-radius:10px;margin:10px auto 0}
        main{flex:1;padding:55px 20px 70px}
        .caixa-pedidos{width:100%;max-width:1200px;margin:0 auto;padding:30px;background:#222;border:1px solid #444;border-radius:15px;box-shadow:0 8px 20px rgba(0,0,0,.25)}
        .titulo-pedidos{text-align:center;font-size:30px;font-weight:bold;margin:0 0 30px}
        .area-botao{display:flex;justify-content:flex-end;gap:10px;flex-wrap:wrap;margin-bottom:20px}
        .btn-adicionar{background:#ffc107;color:#222;font-weight:bold;border:0;border-radius:8px;padding:11px 18px;text-decoration:none}
        .btn-adicionar:hover{background:#e0a800;color:#222}
        .tabela-container{width:100%;overflow-x:auto}
        .tabela-pedidos{width:100%;margin:0;border-collapse:separate;border-spacing:0;border-radius:8px;overflow:hidden;background:#222}
        .tabela-pedidos thead th{padding:14px;background:#ffc107;color:#222;border:0;text-align:center;white-space:nowrap}
        .tabela-pedidos tbody td{padding:14px;vertical-align:middle;border-bottom:1px solid #444;text-align:center;color:#ddd}
        .tabela-pedidos tbody tr:last-child td{border-bottom:0}
        .tabela-pedidos tbody tr:hover td{background:#333}
        .coluna-acao{width:120px;white-space:nowrap}
        .acao{display:inline-flex;align-items:center;justify-content:center;margin:0 5px;color:#ffc107;font-size:21px;text-decoration:none;transition:transform .2s}
        .acao:hover{transform:scale(1.15);color:#fff}
        .mensagem-vazia{text-align:center;padding:30px;color:#aaa}
        .rodape{margin-top:auto;padding:25px;background:#222;border-top:1px solid #444}
        .direitos{text-align:center;color:#999;font-size:14px}
        @media(max-width:768px){header{padding:15px}.header-content{min-height:150px;flex-direction:column;gap:12px}.logo-container{position:static}.logo{width:70px;height:70px}.tituloheader{font-size:23px}main{padding:30px 15px}.caixa-pedidos{padding:20px}.titulo-pedidos{font-size:25px}.tabela-pedidos{min-width:650px}}
    </style>
</head>
<body>
<header>
    <div class="header-content">
        <div class="logo-container"><a href="../menu.php"><img class="logo" src="../../imagens/logoota.jpeg" alt="Logo OTA"></a></div>
        <h1 class="tituloheader">Pedidos</h1>
    </div>
</header>
<main>
    <section class="caixa-pedidos">
        <h2 class="titulo-pedidos">Pedidos cadastrados</h2>
        <div class="area-botao">
            <a href="formPedi.php" class="btn-adicionar"><i class="bi bi-plus-lg"></i> Adicionar pedido</a>
            <a href="../menu.php" class="btn btn-outline-light"><i class="bi bi-arrow-left"></i> Voltar ao painel</a>
        </div>
        <div class="tabela-container">
            <table class="tabela-pedidos">
                <thead><tr><th>ID</th><th>Data</th><th>Horário</th><th>Total</th><th>Ação</th></tr></thead>
                <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($pedido = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= h($pedido['id_pedido']) ?></td>
                        <td><?= h($pedido['data_pedido']) ?></td>
                        <td><?= h($pedido['horario_pedido']) ?></td>
                        <td>R$ <?= number_format((float)$pedido['total_ped'], 2, ',', '.') ?></td>
                        <td class="coluna-acao">
                            <a class="acao" href="editarPed.php?id_pedido=<?= (int)$pedido['id_pedido'] ?>" title="Editar pedido" aria-label="Editar pedido"><i class="bi bi-pencil-square"></i></a>
                            <a class="acao" href="deletePed.php?id_pedido=<?= (int)$pedido['id_pedido'] ?>" title="Excluir pedido" aria-label="Excluir pedido" onclick="return confirm('Deseja realmente excluir o pedido #<?= (int)$pedido['id_pedido'] ?>?');"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="mensagem-vazia">Nenhum pedido cadastrado.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<footer class="rodape"><div class="direitos">© 2026 Pastelaria OTA - Todos os direitos reservados.</div></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
