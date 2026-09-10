<?php
include "../../conexao.php";
$id_endereco = $_GET['id_endereco'];

$sql ="DELETE FROM endereco WHERE 
id_endereco = $id_endereco";
$conn->query($sql);
header("Location:formEnd.php");
?>