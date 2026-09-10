<?php
include "../../conexao.php";
$id_func = $_GET['id_func'];

$sql ="DELETE FROM horario_funcionamento WHERE 
id_func = $id_func";
$conn->query($sql);
header("Location:formHora.php");
?>