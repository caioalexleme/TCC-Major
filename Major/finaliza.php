<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Compra Finalizada</title>


</head>

<?php

echo '<link rel="stylesheet" type="text/css" href="estilocar.css">';

	echo '<body>';

session_start();


	if($_GET['fim'] == 'som'){ 

      
  
		echo '<div id=msgfinal>';
		echo 'Parabéns pela sua compra!!!';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo 'Total da sua compra R$ '.$_SESSION['total']. ',00' .'<br>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
        echo 'Compra Finalizada com Sucesso';
		echo '<br><br>';
		echo '</div>';
	}
		
		
echo '</body>';
		?>