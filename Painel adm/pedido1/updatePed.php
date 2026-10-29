<?php
include "../../conexao.php";

$id_pedido = filter_input(INPUT_POST, 'id_pedido', FILTER_VALIDATE_INT);
$data_pedido = $_POST['data_pedido'] ?? '';
$horario_pedido = $_POST['horario_pedido'] ?? '';
$total_ped = filter_input(INPUT_POST, 'total_ped', FILTER_VALIDATE_FLOAT);

if (!$id_pedido || !$data_pedido || !$horario_pedido || $total_ped === false || $total_ped === null || $total_ped < 0) {
    echo "<script>alert('Dados inválidos. Confira os campos e tente novamente.'); window.location.href='VizuPed.php';</script>";
    exit;
}

$stmt = $conn->prepare("UPDATE pedido SET data_pedido = ?, horario_pedido = ?, total_ped = ? WHERE id_pedido = ?");
$stmt->bind_param("ssdi", $data_pedido, $horario_pedido, $total_ped, $id_pedido);

if ($stmt->execute()) {
    echo "<script>alert('Pedido atualizado com sucesso!'); window.location.href='VizuPed.php';</script>";
} else {
    echo "<script>alert('Erro ao atualizar o pedido.'); window.location.href='editarPed.php?id_pedido=" . (int)$id_pedido . "';</script>";
}
$stmt->close();
$conn->close();
?>
