<?php
include "../../conexao.php";
$cpfAluno = $_GET['cpf_cli'];

$sql ="DELETE FROM cliente WHERE
cpf_adm=$cpf_cli";
$conn->query($sql);
header("Location:formCli.php");

?>