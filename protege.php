<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: /tcc_ota/Painel%20adm/login_adm.php");
    exit;
}
?>