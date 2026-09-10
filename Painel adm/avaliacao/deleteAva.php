<?php
include "../../conexao.php";
$id_ava = $_GET['id_ava'];

$sql ="DELETE FROM avaliacao WHERE 
id_ava = $id_ava";
$conn->query($sql);
header("Location:formAva.php");
?>