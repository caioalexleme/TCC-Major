<?php
session_start();
include_once("conexaoo.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin)
{
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	
	if((!empty($email)) AND (!empty($senha))) 
	{
		//Pesquisar o usuário no BD
     	$result_email = "select id_login, email, senha FROM login WHERE email='$email' LIMIT 1";		
		$resultado_email =  mysqli_query($conn, $result_email); 
		if($resultado_email)
		{
			$row_usuario = mysqli_fetch_assoc($resultado_email);
			if(password_verify($senha, $row_usuario['senha']))
			{
				$_SESSION['id_login'] =  $row_usuario['id_login'];
				$_SESSION['email'] =  $row_usuario['email'];
				header("Location: servicos.php");
			}
			else
			{
				echo "<script> alert('Login ou senha incorreto !!!')</script>";
				echo ('<meta http-equiv="refresh"content=0;"entrar.html">');
			}
		}
	}
	else
	{
		$_SESSION['msg'] = "Login ou senha incorreto";
	    header("Location: entrar.html");
	}
}
else
{
	$_SESSION['msg'] = "Pagina não encontrada";
	header("Location: entrar.html");
}

?>