<?php
include "../../conexao.php";
$id_prod = $_GET['id_prod'];

$sql ="DELETE FROM produtos WHERE 
id_prod = $id_prod";
$conn->query($sql);
header("Location:formProd.php");
?>