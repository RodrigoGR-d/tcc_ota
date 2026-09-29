<?php
include "../../conexao.php";

$id_prod = filter_input(INPUT_GET, 'id_prod', FILTER_VALIDATE_INT);

if (!$id_prod) {
    header("Location: vizuprod.php");
    exit;
}

$stmt = $conn->prepare("DELETE FROM produtos WHERE id_prod = ?");
$stmt->bind_param("i", $id_prod);
$stmt->execute();
$stmt->close();

header("Location: vizuprod.php");
exit;
?>
