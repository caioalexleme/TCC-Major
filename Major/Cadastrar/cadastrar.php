<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if ($btnCadUsuario) 
{
	include_once 'conexao.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

	$result_usuario = "INSERT INTO login_adm (usuario, senha) 
	                   VALUES(
	                   	        '" .$dados['usuario']. "',
	                   	        '" .$dados['senha']. "'
		                      )";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (mysqli_insert_id($conn)) 
    {
    	$_SESSION['msg'] = " Usuário cadastrado com sucesso";
    	header("Location: login.php");
    }
    else
    {
    	$_SESSION['msg'] = "Erro ao cadastrar o usuario";
    }
   

 
}
?>
<DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
	  <title>Cadastrar</title>
   </head>
<body>
   <h2>Cadastro</h2>
   <?php
       if(isset($_SESSION['msgcad'])){
		   echo $_SESSION['msg'];
		   unset($_SESSION['msg']);
	   }		   
   ?>
   <form method="POST" action="">
       <label>Nome</label>
	   <input type="text" name="nome" placeholder="Digite o Nome e sobrenome"><br><br>

       <label>E-mail</label>
	   <input type="text" name="email" placeholder="Digite seu E-mail"><br><br>

       <label>Usuário</label>
	   <input type="text" name="usuario" placeholder="Digite o usuário"><br><br>
	   
	   <label>Senha</label>
	   <input type="password" name="senha" placeholder="Digite a senha"><br><br>
	   
	   <input type="submit"  name="btnCadUsuario" value="Cadastrar">
       <br><br> 
	   Lembrou?<a href="login.php">Clique aqui</a> 
   </form>
</body>

</html>