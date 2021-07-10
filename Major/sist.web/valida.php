<?php
session_start();
include_once("conexaoo.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin)
{
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	
	if((!empty($usuario)) AND (!empty($senha))) 
	{
		//Pesquisar o usuário no BD
     	$result_usuario = "select id_login_adm, usuario, senha FROM login_adm WHERE usuario='$usuario' LIMIT 1";	
		$resultado_usuario =  mysqli_query($conn, $result_usuario); 
		if($resultado_usuario)
		{
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha']))
			{
				$_SESSION['id_login_adm'] =  $row_usuario['id_login_adm'];
				$_SESSION['usuario'] =  $row_usuario['usuario'];
				header("Location: home.html");
			}
			else
			{
				echo "<script> alert('Login ou senha incorreto !!!')</script>";
				echo ('<meta http-equiv="refresh"content=0;"index.html">');
			}
		}
	}
	else
	{
		echo "<script> alert('Login ou senha incorreto !!!')</script>";
		echo ('<meta http-equiv="refresh"content=0;"index.html">');
	}
}
else
{
	echo "<script> alert('Página não encontrada !!!')</script>";
	echo ('<meta http-equiv="refresh"content=0;"index.html">');
}

?>