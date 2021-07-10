<?php
session_start();
?>
<DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
	  <title>login</title>
   </head>
<body>
   <h2>Área restrita</h2>
   <?php
       if(isset($_SESSION['msg'])){
		   echo $_SESSION['msg'];
		   unset($_SESSION['msg']);
	   }	
	   if(isset($_SESSION['msgcad'])){
		   echo $_SESSION['msgcad'];
		   unset($_SESSION['msgcad']);
	   }		   	   
   ?>
   <form method="POST" action="valida.php">
       <label>Usuario</label>
	   <input type="text" name="usuario" placeholder="Digite o seu usuário"><br><br>
	   
	   <label>Senha</label>
	   <input type="password" name="senha" placeholder="Digite o sua senha"><br><br>
	   
	   <input type="submit"  name="btnLogin" value="Acessar">

	   <h4>Você ainda Não possui uma conta?</h4>
	   <a href="cadastrar.php">Crie grátis</a>
   </form>
</body>

</html>