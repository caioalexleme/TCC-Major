<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if ($btnCadUsuario) 
{
	include_once 'conexaoo.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

	$result_usuario = "INSERT INTO usuarios (nome, email, senha) 
	                   VALUES(?,?,?)";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (mysqli_insert_id($conn)) 
    {
    	$_SESSION['msg'] = " Usuário cadastrado com sucesso";
    	header("Location: entrar.html");
    }
    else
    {
    	$_SESSION['msg'] = "Erro ao cadastrar o usuario";
    }
   

 
}
?>
