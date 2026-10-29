<?php
session_start();

// Apaga todas as variáveis da sessão
$_SESSION = array();

// Encerra a sessão
session_destroy();

// Volta para o login
header("Location: Painel adm/login_adm.php");
exit;
?>