<?php
session_start();
unset($_SESSION['id_login'], $_SESSION['email']);

$_SESSION['msg'] = "Deslogado com sucesso!";
header("Location: index.html");

?>                