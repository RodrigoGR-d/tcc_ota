<?php
include "../../conexao.php";
$cpf_adm = $_GET['cpf_adm'];

$sql ="DELETE FROM adm WHERE
cpf_adm=$cpf_adm";
$conn->query($sql);
header("Location:formAdm.php");

?>