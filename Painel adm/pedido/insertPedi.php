<?php
include "../../conexao.php";

$id_pedido = filter_input(INPUT_POST, 'id_pedido', FILTER_VALIDATE_INT);
$data_pedido = $_POST['data_pedido'] ?? '';
$horario_pedido = $_POST['horario_pedido'] ?? '';
$total_ped = filter_input(INPUT_POST, 'total_ped', FILTER_VALIDATE_FLOAT);

if (!$id_pedido || !$data_pedido || !$horario_pedido || $total_ped === false || $total_ped === null || $total_ped < 0) {
    echo "<script>alert('Preencha todos os campos corretamente.'); window.location.href='formPedi.php';</script>";
    exit;
}

$stmt = $conn->prepare("INSERT INTO pedido (id_pedido, data_pedido, horario_pedido, total_ped) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issd", $id_pedido, $data_pedido, $horario_pedido, $total_ped);

if ($stmt->execute()) {
    echo "<script>alert('Pedido cadastrado com sucesso!'); window.location.href='VizuPed.php';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar pedido. Verifique se o ID já existe.'); window.location.href='formPedi.php';</script>";
}
$stmt->close();
$conn->close();
?>
