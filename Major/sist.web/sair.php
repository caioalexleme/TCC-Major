<?php
session_start();
unset($_SESSION['id_login_adm'], $_SESSION['usuario']);

$_SESSION['msg'] = "Deslogado com sucesso!";
 header("Location: index.html");

?>                