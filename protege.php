<?php
session_start();
if (!isset($_session['admin'])){
    header("location: Usuário Final/login_user.php");
    exit;
}
?>