<?php
session_start();
unset($_SESSION['clie'], $_SESSION['clie_id']);
header('Location: ../index.php');
exit;
