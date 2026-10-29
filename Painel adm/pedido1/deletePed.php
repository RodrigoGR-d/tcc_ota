<?php
include "../../conexao.php";

$id_pedido = filter_input(INPUT_GET, 'id_pedido', FILTER_VALIDATE_INT);
if (!$id_pedido) {
    header("Location: VizuPed.php");
    exit;
}

$stmt = $conn->prepare("DELETE FROM pedido WHERE id_pedido = ?");
$stmt->bind_param("i", $id_pedido);

if ($stmt->execute()) {
    header("Location: VizuPed.php?excluido=1");
} else {
    echo "<script>alert('Não foi possível excluir o pedido. Pode haver outros registros relacionados a ele.'); window.location.href='VizuPed.php';</script>";
}
$stmt->close();
$conn->close();
exit;
?>
