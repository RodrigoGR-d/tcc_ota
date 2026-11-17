<?php
include "../../protege.php";
include "../../conexao.php";

$sql = "SELECT
            p.id_pedido,
            p.data_pedido,
            p.horario_pedido,
            p.total_ped,
            pe.nome_cliente,
            pe.email,
            pe.telefone,
            pe.cep,
            pe.logradouro,
            pe.numero,
            pe.complemento,
            pe.bairro,
            pe.cidade,
            pe.estado,
            pe.referencia,
            pe.observacoes,
            pe.forma_pagamento,
            GROUP_CONCAT(
                CONCAT(pi.quantidade, 'x ', pi.nome_produto)
                ORDER BY pi.id_item SEPARATOR '\n'
            ) AS conteudo_pedido
        FROM pedido p
        LEFT JOIN pedido_entrega pe ON pe.id_pedido = p.id_pedido
        LEFT JOIN pedido_itens pi ON pi.id_pedido = p.id_pedido
        GROUP BY p.id_pedido
        ORDER BY p.id_pedido DESC";

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
        .caixa-pedidos{width:100%;max-width:1250px;margin:0 auto;padding:30px;background:#222;border:1px solid #444;border-radius:15px;box-shadow:0 8px 20px rgba(0,0,0,.25)}
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
        .btn-entrega{background:#ffc107;color:#222;border:0;border-radius:7px;padding:8px 12px;font-weight:bold}
        .btn-entrega:hover{background:#e0a800}
        .mensagem-vazia{text-align:center;padding:30px;color:#aaa}
        .rodape{margin-top:auto;padding:25px;background:#222;border-top:1px solid #444}
        .direitos{text-align:center;color:#999;font-size:14px}
        .modal-content{background:#222;color:#fff;border:1px solid #555}
        .modal-header,.modal-footer{border-color:#444}
        .modal-title{font-weight:bold}
        .modal-body strong{color:#ffc107}
        .conteudo-modal{white-space:pre-line}
        @media(max-width:768px){header{padding:15px}.header-content{min-height:150px;flex-direction:column;gap:12px}.logo-container{position:static}.logo{width:70px;height:70px}.tituloheader{font-size:23px}main{padding:30px 15px}.caixa-pedidos{padding:20px}.titulo-pedidos{font-size:25px}.tabela-pedidos{min-width:780px}}
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
            <a href="../menu.php" class="btn btn-outline-light"><i class="bi bi-arrow-left"></i> Voltar ao painel</a>
        </div>
        <div class="tabela-container">
            <table class="tabela-pedidos">
                <thead>
                    <tr><th>Nome do cliente</th><th>Horário</th><th>Conteúdo do pedido</th><th>Valor</th><th>Entrega</th></tr>
                </thead>
                <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($pedido = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= h($pedido['nome_cliente'] ?: 'Não informado') ?></td>
                        <td><?= h($pedido['horario_pedido']) ?></td>
                        <td class="text-start"><?= nl2br(h($pedido['conteudo_pedido'] ?: 'Itens não encontrados')) ?></td>
                        <td>R$ <?= number_format((float)$pedido['total_ped'], 2, ',', '.') ?></td>
                        <td>
                            <button type="button" class="btn-entrega" data-bs-toggle="modal" data-bs-target="#modalEntrega<?= (int)$pedido['id_pedido'] ?>">
                                <i class="bi bi-truck"></i> Ver entrega
                            </button>

                    <div class="modal fade" id="modalEntrega<?= (int)$pedido['id_pedido'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="bi bi-geo-alt-fill text-warning"></i> Informações da entrega - Pedido #<?= (int)$pedido['id_pedido'] ?></h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-md-6"><strong>Cliente:</strong><br><?= h($pedido['nome_cliente'] ?: 'Não informado') ?></div>
                                        <div class="col-md-6"><strong>Telefone:</strong><br><?= h($pedido['telefone'] ?: 'Não informado') ?></div>
                                        <div class="col-md-6"><strong>E-mail:</strong><br><?= h($pedido['email'] ?: 'Não informado') ?></div>
                                        <div class="col-md-6"><strong>Forma de pagamento:</strong><br><?= h($pedido['forma_pagamento'] ?: 'Não informado') ?></div>
                                        <div class="col-md-6"><strong>CEP:</strong><br><?= h($pedido['cep'] ?: 'Não informado') ?></div>
                                        <div class="col-md-6"><strong>Endereço:</strong><br><?= h($pedido['logradouro'] ?: 'Não informado') ?>, <?= h($pedido['numero'] ?: 's/n') ?><?= !empty($pedido['complemento']) ? ' - ' . h($pedido['complemento']) : '' ?></div>
                                        <div class="col-md-6"><strong>Bairro:</strong><br><?= h($pedido['bairro'] ?: 'Não informado') ?></div>
                                        <div class="col-md-6"><strong>Cidade/Estado:</strong><br><?= h($pedido['cidade'] ?: 'Não informado') ?><?= !empty($pedido['estado']) ? '/' . h($pedido['estado']) : '' ?></div>
                                        <div class="col-12"><strong>Ponto de referência:</strong><br><?= h($pedido['referencia'] ?: 'Não informado') ?></div>
                                        <div class="col-12"><strong>Observações:</strong><br><?= nl2br(h($pedido['observacoes'] ?: 'Nenhuma observação')) ?></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
